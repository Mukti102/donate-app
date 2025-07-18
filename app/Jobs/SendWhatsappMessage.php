<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SendWhatsappMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $phone;
    protected $message;

    /**
     * Create a new job instance.
     */
    public function __construct($phone, $message)
    {
        $this->phone = $phone;
        $this->message = $message;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Format nomor WA: ubah dari 08xx atau +62xx ke 8xxxxxxxxx
        $phoneFormat = $this->phone;

        // Hapus semua spasi, tanda +, atau karakter lain
        $phoneFormat = preg_replace('/[^0-9]/', '', $phoneFormat);

        // Jika diawali 0, ubah jadi tanpa 0
        if (substr($phoneFormat, 0, 1) === '0') {
            $phoneFormat = substr($phoneFormat, 1);
        }

        // Jika diawali 62, ubah ke format lokal (tanpa 62)
        if (substr($phoneFormat, 0, 2) === '62') {
            $phoneFormat = substr($phoneFormat, 2);
        }

        $response = Http::withHeaders([
            'Authorization' => setting('wa.fonte_token') ??  env('FONTE_TOKEN')
        ])->asForm()->post('https://api.fonnte.com/send', [
            'target' => $phoneFormat,
            'message' => $this->message,
            'delay' => 1,
            'countryCode' => '62', // default Indonesia
        ]);

        Log::info("Fonnte WA sent to {$phoneFormat}", [
            'response' => $response->json()
        ]);
    }
}
