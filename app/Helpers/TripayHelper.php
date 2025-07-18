<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class TripayHelper
{
    /**
     * Generate Tripay signature
     */
    public static function generateSignature($merchantRef, $amount)
    {
        $merchantCode = config('service.tripay.merchant_kode');
        $secretKey = config('service.tripay.private_key');

        return hash_hmac('sha256', $merchantCode . $merchantRef . $amount, $secretKey);
    }

    /**
     * Create transaction request to Tripay
     */
   public static function createTransaction(array $payload)
{   
    try {
        $apiKey = config('service.tripay.api_key');

        $response = Http::withoutVerifying()->withHeaders([
            'Authorization' => 'Bearer ' . $apiKey
        ])->post(env('TRIPAY_URL').'transaction/create', $payload);

        if ($response->successful()) {
            return $response->json();
        }

        // Tangani jika request tidak berhasil
        return [
            'success' => false,
            'message' => 'Gagal membuat transaksi',
            'status' => $response->status(),
            'body' => $response->json()
        ];
    } catch (\Exception $e) {
        return [
            'success' => false,
            'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
        ];
    }
}


    public static function getChanels(){
        $apiKey = config('service.tripay.api_key');
          $response = Http::withOptions([
            'verify' => false
          ])->withHeaders([
            'Authorization' => 'Bearer ' . $apiKey
        ])->get('https://tripay.co.id/api-sandbox/merchant/payment-channel');
    
        return $response->json();
    }
}
