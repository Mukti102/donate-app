<?php

namespace App\Http\Controllers;

use App\Helpers\TripayHelper;
use App\Jobs\SendWhatsappMessage;
use App\Models\Donatur;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class PaymentController extends Controller
{

    public function detail($reference)
    {
        $donatur = session('donatur');
        $snapToken = $reference;
        Log::info('Snap Token: '.$snapToken);
        return view('pages.payment.index', compact('donatur', 'snapToken'));
    }

    public function updateStatus(Request $request)
    {
        Log::info('request', $request->all());

        try {
            $donatur = Donatur::find($request->donatur_id);

            if (!$donatur) {
                return response()->json(['error' => 'Donatur tidak ditemukan'], 404);
            }

            // Ambil status transaksi dari Midtrans
            $midtransStatus = $request->response_data['transaction_status'];
            
            Log::info('midrants status', $midtransStatus) ;
            
            // Mapping status Midtrans ke enum internal kita
            $mappedStatus = match ($midtransStatus) {
                'settlement', 'capture' => 'success',
                'pending' => 'pending',
                'deny', 'cancel', 'expire', 'failure' => 'failed',
                default => 'pending'
            };
            
            
        Log::inf('mappedStatus',$mappedStatus);


            // Simpan ke database
            $donatur->update([
                'status_pembayaran' => $mappedStatus,
                'payment_response' => json_encode($request->response_data),
            ]);

            return response()->json(['message' => 'Status berhasil diupdate']);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    /**
     * Halaman sukses pembayaran
     */
    public function success($id)
    {
        $donatur = Donatur::with('campaign')->find($id);

        $donatur->status_pembayaran = 'success';
        $donatur->save();

        if (!$donatur) {
            Alert::error('Error', 'Data donatur tidak ditemukan');
            return redirect()->route('home');
        }

        SendWhatsappMessage::dispatch($donatur->phone, 'Terima kasih atas donasi Anda!');

        return view('pages.payment.success', compact('donatur'));
    }

    /**
     * Halaman pending pembayaran
     */
    public function pending($id)
    {
        $donatur = Donatur::with('campaign')->find($id);

        if (!$donatur) {
            Alert::error('Error', 'Data donatur tidak ditemukan');
            return redirect()->route('home');
        }

        return view('pages.payment.pending', compact('donatur'));
    }

    /**
     * Webhook untuk notifikasi dari Midtrans
     */
    public function webhook(Request $request)
    {
        try {
            // Konfigurasi Midtrans
            \Midtrans\Config::$serverKey = config('service.midrants.server_key');
            \Midtrans\Config::$isProduction = config('service.midrants.isProduction');

            // Ambil notifikasi dari Midtrans
            $notif = new \Midtrans\Notification();

            $transaction = $notif->transaction_status;
            $type = $notif->payment_type;
            $order_id = $notif->order_id;
            $fraud = $notif->fraud_status;

            // Cari donatur berdasarkan order_id atau transaction_id
            $donatur = Donatur::where('transaction_id', $order_id)
                ->orWhere('snap_token', 'LIKE', '%' . $order_id . '%')
                ->first();

            if (!$donatur) {
                return response()->json(['message' => 'Donatur tidak ditemukan'], 404);
            }

            // Update status berdasarkan response Midtrans
            if ($transaction == 'capture') {
                if ($type == 'credit_card') {
                    if ($fraud == 'challenge') {
                        $donatur->status_pembayaran = 'challenge';
                    } else {
                        $donatur->status_pembayaran = 'success';
                    }
                }
            } elseif ($transaction == 'settlement') {
                $donatur->status_pembayaran = 'success';
            } elseif ($transaction == 'pending') {
                $donatur->status_pembayaran = 'pending';
            } elseif ($transaction == 'deny') {
                $donatur->status_pembayaran = 'denied';
            } elseif ($transaction == 'expire') {
                $donatur->status_pembayaran = 'expired';
            } elseif ($transaction == 'cancel') {
                $donatur->status_pembayaran = 'cancelled';
            }

            // Simpan detail transaksi
            $donatur->transaction_id = $order_id;
            $donatur->payment_type = $type;
            $donatur->payment_response = json_encode($notif);
            $donatur->save();

            return response()->json(['message' => 'Webhook berhasil diproses']);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
