<?php

namespace App\Http\Controllers;

use App\Helpers\TripayHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Campaign;
use App\Models\CategoryCampaign;
use App\Models\Donatur;
use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Midtrans\Snap;
use RealRashid\SweetAlert\Facades\Alert;

use function PHPUnit\Framework\isEmpty;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categoryId = $request->input('category_id');
        $time = $request->input('time'); // 'terbaru' atau 'terlama'
        $categories = CategoryCampaign::all();

        $query = Campaign::query();

        if ($categoryId) {
            $query->where('category_campaign_id', $categoryId);
        }

        if ($time === 'terbaru') {
            $query->orderBy('created_at', 'desc');
        } elseif ($time === 'terlama') {
            $query->orderBy('created_at', 'asc');
        }

        $campaigns = $query->get();

        return view('pages.campaigns', compact('campaigns', 'categories'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {   
        $request->validate([
            'name' => "required",
            'campaign_id' => "required",
            'amount' => "required|numeric",
            'city' => "required",
            'email' => 'nullable',
            'hamba_allah' => 'nullable',
            'doa' => "nullable",
            'phone' => 'required',
        ]);

        try {
            \Midtrans\Config::$serverKey = setting('midrants.server_key') ?? config('service.midtrans.server_key');
            \Midtrans\Config::$isProduction = setting('midrants.is_producion') ?? config('service.midtrans.isProduction');
            \Midtrans\Config::$isSanitized = setting('midrants.is_sanitized') ?? config('service.midtrans.isSanitized');
            \Midtrans\Config::$is3ds = setting('midrants.is_IS3DS') ?? config('service.midtrans.is3ds');

            // Buat Snap Token
            $orderId = 'DON-' . uniqid();
            $payload = [
                'transaction_details' => [
                    'order_id' => $orderId,
                    'gross_amount' => $request->amount,
                ],
                'customer_details' => [
                    'first_name' => $request->name,
                    'phone' => $request->phone,
                    'email' => 'donatur@example.com', // Jika belum ada email dari user
                ]
            ];

            $snapToken = Snap::getSnapToken($payload);

            // Simpan ke database
            $donatur = Donatur::create([
                'name' => empty($request->hamba_allah) ? $request->name : "Hamba Allah",
                'campaign_id' => $request->campaign_id,
                'amount' => $request->amount,
                'city' => $request->city,
                'doa' => $request->doa ?? "Tidak ada",
                'phone' => $request->phone,
                'email' => $request->email,
                'snap_token' => $snapToken,
                'status_pembayaran' => 'pending'
            ]);
            session(['donatur' => $donatur]);
            // Redirect ke halaman pembayaran atau tampilkan snap
            return redirect()->route('payment.detail',['reference' => $snapToken ]);
        } catch (Exception $th) {
            Log::log('error',$th->getMessage());
            Alert::toast('Gagal', $th->getMessage());
            return back();
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $id = decrypt($id);
        $campaign = Campaign::findOrFail($id);
        return view('pages.detailCampaign', compact('campaign'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
