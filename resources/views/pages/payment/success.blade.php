@extends('layouts.main')
@section('title', 'Success - Pembayaran Donasi')

@section('content')
<div class="container mx-auto px-4 py-8 mt-14">
    <div class="max-w-2xl mx-auto">
        <!-- Success Icon and Message -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-green-100 rounded-full mb-4">
                <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h1 class="text-3xl font-bold dark:text-gray-200 text-gray-800 mb-2">Pembayaran Berhasil!</h1>
            <p class="text-gray-600 dark:text-gray-300">Terima kasih atas donasi Anda. Kontribusi Anda sangat berarti.</p>
        </div>

        <!-- Donation Details Card -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Detail Donasi</h2>
            
            <div class="space-y-4">
                <!-- Donation ID -->
                <div class="flex justify-between items-center py-2 border-b border-gray-100">
                    <span class="text-gray-600">ID Donasi</span>
                    <span class="font-medium text-gray-800">#{{ $donatur->id }}</span>
                </div>

                <!-- Donor Name -->
                <div class="flex justify-between items-center py-2 border-b border-gray-100">
                    <span class="text-gray-600">Nama Donatur</span>
                    <span class="font-medium text-gray-800 capitalize">{{ $donatur->name }}</span>
                </div>

                <!-- Campaign Name -->
                <div class="flex justify-between items-center py-2 border-b border-gray-100">
                    <span class="text-gray-600">Kampanye</span>
                    <span class="font-medium md:text-base text-sm text-end text-gray-800">{{ $donatur->campaign->title }}</span>
                </div>

                <!-- Donation Amount -->
                <div class="flex justify-between items-center py-2 border-b border-gray-100">
                    <span class="text-gray-600">Jumlah Donasi</span>
                    <span class="font-semibold text-green-600 text-lg">Rp {{ number_format($donatur->amount, 0, ',', '.') }}</span>
                </div>

                <!-- Email -->
                <div class="flex justify-between items-center py-2 border-b border-gray-100">
                    <span class="text-gray-600">Email</span>
                    <span class="font-medium text-gray-800">{{ $donatur->email  }}</span>
                </div>

                <!-- Phone -->
                @if($donatur->phone)
                <div class="flex justify-between items-center py-2 border-b border-gray-100">
                    <span class="text-gray-600">Telepon</span>
                    <span class="font-medium text-gray-800">{{ $donatur->phone }}</span>
                </div>
                @endif

                 <!-- Date -->
                <div class="flex justify-between items-center py-2">
                    <span class="text-gray-600">Tanggal Donasi</span>
                    <span class="font-medium text-gray-800">{{ $donatur->created_at->format('d F Y, H:i') }}</span>
                </div>

                <!-- Message -->
                @if($donatur->doa)
                <div class="py-2">
                    <span class="text-gray-600 block mb-2">Pesan</span>
                    <div class="bg-gray-50 p-3 rounded-lg">
                        <p class="text-gray-800">{{ $donatur->doa }}</p>
                    </div>
                </div>
                @endif

               
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <a href="{{ route('campaign.show', $donatur->campaign->slug ?? $donatur->campaign->id) }}" 
               class="bg-gradient-primary text-white px-6 py-3 rounded-lg font-medium transition duration-200 inline-flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Kembali ke Kampanye
            </a>
            
            <a href="/" 
               class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg font-medium transition duration-200 inline-flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                Beranda
            </a>
        </div>

        <!-- Additional Info -->
        <div class="mt-8 text-center">
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                <div class="flex items-center justify-center mb-2">
                    <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="font-medium text-blue-800">Informasi Penting</h3>
                </div>
                <p class="text-blue-700 text-sm">
                    Bukti donasi telah dikirim ke whatsapp Anda. Jika tidak menerima pesan dalam 5 menit, 
                    silakan periksa folder spam atau hubungi customer service kami.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection