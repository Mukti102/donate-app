@extends('layouts.main')
@section('title',$campaign->title)
@push('style')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

        * {
            font-family: 'Inter', sans-serif;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .card-gradient {
            background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
        }

        .progress-bar {
            background: linear-gradient(90deg, #10b981, #059669, #047857);
            box-shadow: 0 2px 10px rgba(16, 185, 129, 0.3);
        }

        .floating-animation {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .pulse-animation {
            animation: pulse 2s infinite;
        }

        .stat-card {
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .demo-button {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 25px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .demo-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        }

        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(8px);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 1000;
            padding: 20px;
        }

        .modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .modal-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.25);
            width: 100%;
            max-width: 450px;
            max-height: 90vh;
            overflow: hidden;
            transform: scale(0.8) translateY(20px);
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
            position: relative;
        }

        .modal-overlay.active .modal-container {
            transform: scale(1) translateY(0);
        }

        .modal-header {
            color: white;
            padding: 24px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .modal-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            animation: shimmer 3s infinite;
        }

        @keyframes shimmer {
            0% {
                transform: translateX(-100%) translateY(-100%) rotate(45deg);
            }

            100% {
                transform: translateX(100%) translateY(100%) rotate(45deg);
            }
        }

        .modal-title {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 8px;
            position: relative;
            z-index: 1;
        }

        .modal-subtitle {
            font-size: 14px;
            opacity: 0.9;
            position: relative;
            z-index: 1;
        }

        .close-button {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(255, 255, 255, 0.2);
            border: none;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            z-index: 2;
        }

        .close-button:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: scale(1.1);
        }

        .modal-body {
            padding: 24px;
            max-height: 400px;
            overflow-y: auto;
        }

        .channel-grid {
            display: grid;
            gap: 12px;
        }

        .channel-item {
            display: flex;
            align-items: center;
            padding: 16px;
            border: 2px solid #f0f0f0;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
            position: relative;
            overflow: hidden;
        }

        .channel-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(102, 126, 234, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .channel-item:hover::before {
            left: 100%;
        }

        .channel-item:hover {
            border-color: #667eea;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.15);
            transform: translateY(-2px);
        }

        .channel-item.selected {
            border-color: #667eea;
            background: linear-gradient(135deg, #667eea10, #764ba210);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.2);
        }

        .channel-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 16px;
            font-weight: bold;
            color: white;
            font-size: 18px;
        }

        .channel-info {
            flex: 1;
        }

        .channel-name {
            font-weight: 600;
            font-size: 16px;
            color: #333;
            margin-bottom: 4px;
        }

        .channel-desc {
            color: #666;
            font-size: 14px;
        }

        .channel-fee {
            color: #667eea;
            font-weight: 600;
            font-size: 14px;
        }

        .modal-footer {
            padding: 20px 24px;
            border-top: 1px solid #f0f0f0;
            display: flex;
            gap: 12px;
            justify-content: flex-end;
        }

        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        .btn-secondary {
            background: #f8f9fa;
            color: #666;
        }

        .btn-secondary:hover {
            background: #e9ecef;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }

        .btn-primary:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }
        
        .aspect-rasio{
            height:500px;
        }

        /* Mobile responsive */
        @media (max-width: 480px) {
            .modal-container {
                margin: 10px;
                max-width: calc(100vw - 20px);
            }

            .modal-header {
                padding: 20px;
            }

            .modal-body {
                padding: 20px;
            }

            .channel-item {
                padding: 12px;
            }

            .channel-icon {
                width: 40px;
                height: 40px;
                margin-right: 12px;
                font-size: 16px;
            }
            
             .aspect-rasio{
            height:200px;
        }
        }

        /* Scrollbar styling */
        .modal-body::-webkit-scrollbar {
            width: 6px;
        }

        .modal-body::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 3px;
        }

        .modal-body::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 3px;
        }

        .modal-body::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }
    </style>
@endpush
@section('content')
    @php
        $donaturs = $campaign->donaturs->sum('amount');
        $formattedDonaturs = 'Rp ' . number_format($donaturs, 0, ',', '.');
        $target = $campaign->target;
        $formattedTarget = 'Rp ' . number_format($target, 0, ',', '.');
        $presentase = $target > 0 ? ($donaturs / $target) * 100 : 0;
    @endphp
    <div class="py-5">
        <!-- Hero Section -->
        <div class="gradient-bg pb-20 relative overflow-hidden">
            <div class="absolute inset-0 bg-black opacity-10"></div>
            <div class="absolute top-10 left-10 w-32 h-32 bg-white bg-dark opacity-10 rounded-full floating-animation"></div>
            <div class="absolute bottom-10 right-10 w-24 h-24 bg-white bg-dark opacity-10 rounded-full floating-animation"
                style="animation-delay: 1s;"></div>

            <div class="relative z-10 container mx-auto px-6 pt-16">
                <div class="text-center text-white mb-12">
                    <h1 class="text-4xl md:text-6xl font-bold mb-4 leading-tight">
                        Bersama Membangun <br>
                        <span class="bg-gradient-to-r from-yellow-400 to-orange-500 bg-clip-text text-transparent">
                            Masa Depan Cerah
                        </span>
                    </h1>
                    <p class="text-xl opacity-90 max-w-2xl mx-auto">
                        Setiap donasi Anda adalah harapan baru untuk anak-anak Indonesia
                    </p>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container mx-auto px-2 md:px-6 -mt-16 relative z-20">
            <!-- Campaign Card -->
            <div
                class="bg-white bg-dark bg-dark rounded-3xl shadow-md p-4 md:p-8 mb-8 border dark:border-gray-600 border-white">
                <div class="grid lg:grid-cols-2 gap-8 items-center">
                    <!-- Image Section -->
                    <div class="relative">
                        <div class="bg-gradient-primary rounded-2xl h-80 flex items-center justify-center overflow-hidden">
                            <img src="{{asset('storage/'.$campaign->thumbnail)}}"
                                alt="Bantuan Pendidikan" class="w-full h-full object-cover rounded-2xl opacity-90">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent rounded-2xl"></div>
                            <div class="absolute bottom-4 left-4 text-white">
                                <div class="glass-effect px-4 py-2 rounded-lg">
                                    <span
                                        class="text-sm font-semibold  text-cyan-600">{{ $campaign->category->name }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Section -->
                    <div class="space-y-6">
                        <div>
                            <h2 class="text-3xl font-bold dark:text-gray-300 text-gray-900 mb-4 leading-tight">
                                {{ $campaign->title }}
                            </h2>

                            <!-- Author Info -->
                            <div class="flex items-center mb-6">

                                <div>
                                   
                                    <p class="font-semibold dark:text-gray-200 text-gray-800">{{ $campaign->name_lembaga }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Stats Grid -->
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-3 md:mb-6">
                            @php
                                use Carbon\Carbon;

                                $deadline = Carbon::parse($campaign->dedline);
                                $now = Carbon::now();

                                // Hitung hari tersisa, hasil bisa negatif kalau sudah lewat
                                $hariTersisa = round($now->diffInDays($deadline, false));

                                // Kalau negatif (deadline sudah lewat), set jadi 0
                                if ($hariTersisa < 0) {
                                    $hariTersisa = 0;
                                }
                            @endphp
                            <div
                                class="stat-card bg-white bg-dark p-4 rounded-xl shadow-md text-center border border-gray-200 dark:border-gray-600">
                                <div class="text-2xl font-bold text-red-500 mb-1">{{ $hariTersisa }}</div>
                                <div class="text-xs text-gray-600 dark:text-gray-400">Hari Tersisa</div>
                            </div>

                            <div
                                class="stat-card bg-white bg-dark p-4 rounded-xl shadow-md text-center border border-gray-200 dark:border-gray-600">
                                <div class="text-2xl font-bold text-blue-500 mb-1"> {{ $campaign->donaturs->count() ?? 0 }}
                                </div>
                                <div class="text-xs text-gray-600 dark:text-gray-400">Donatur</div>
                            </div>
                            <div
                                class="stat-card bg-white bg-dark p-4 rounded-xl shadow-md text-center border border-gray-200 dark:border-gray-600">
                                <div class="text-2xl font-bold text-green-500 mb-1">43</div>
                                <div class="text-xs text-gray-600 dark:text-gray-400">Inspirator</div>
                            </div>
                            <div
                                class="stat-card bg-white bg-dark p-4 rounded-xl shadow-md text-center border border-gray-200 dark:border-gray-600">
                                <div class="text-2xl font-bold text-pri mb-1">12</div>
                                <div class="text-xs text-gray-600 dark:text-gray-400">Rating</div>
                            </div>
                        </div>

                        <!-- Progress Section -->
                        <div class="bg-white bg-dark p-6 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-600">
                            <div class="flex justify-between items-center mb-3">
                                <span class="text-sm font-semibold dark:text-gray-300 text-gray-700">Terkumpul</span>
                                <div class="flex items-center">
                                    <span class="text-2xl font-bold text-emerald-600">{{ $presentase }}%</span>
                                    <i class="fas fa-chart-line text-emerald-500 ml-2"></i>
                                </div>
                            </div>

                            <!-- Progress Bar -->
                            <div class="w-full bg-gray-200 rounded-full h-4 mb-4 overflow-hidden">
                                <div class="progress-bar  h-4 rounded-full relative" style="width: {{ $presentase }}%">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-r from-transparent via-white/30 to-transparent animate-pulse">
                                    </div>
                                </div>
                            </div>

                            <!-- Amount Info -->
                            <div class="flex justify-between items-center">
                                <div>
                                    <span class="text-sm text-gray-600 dark:text-gray-300">Terkumpul</span>
                                    <div class="text-xl font-bold text-emerald-600">{{ $formattedDonaturs }}</div>
                                </div>
                                <div class="text-right">
                                    <span class="text-sm dark:text-gray-300 text-gray-600">Target</span>
                                    <div class="text-xl font-bold dark:text-gray-200 text-gray-900">{{ $formattedTarget }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-3 bg-gray-50 bg-dark dark:border dark:border-gray-700 shadow-md p-5 md:p-10 rounded-xl">
                 <!-- Form -->
                    <form action="{{ route('campaign.store') }}"  method="POST" class="space-y-6">
                        @csrf
                        <input type="hidden" id="campaign_id" name="campaign_id" value="{{ $campaign->id }}">

                        <!-- Name Input -->
                        <x-text-input label="Nama Lengkap" icon="fas fa-user" name="name"
                            placeholder="Masukkan nama lengkap Anda" />

                         <x-text-input label="Kota" icon="fas fa-user" name="city"
                            placeholder="Masukkan Kota/Kabupaten Anda" />
                        <!-- Gender and Phone Row -->
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <label class="text-sm font-semibold dark:text-gray-100 text-gray-700 flex items-center">
                                    <i class="fas fa-venus-mars text-primary  mr-2"></i>
                                    Jenis Kelamin
                                </label>
                                <select name="gender"
                                    class="form-input custom-select w-full px-4 py-3 bg-white border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none text-gray-700 appearance-none dark:bg-gray-700 dark:border-gray-700 dark:text-gray-200"
                                    required>
                                    <option value="">Pilih jenis kelamin</option>
                                    <option value="laki-laki">Laki-laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>

                            <x-text-input label="Nomor Whatsapp" icon="fab fa-whatsapp" name="phone" type="number"
                                placeholder="pesan akan di kirim ke nomor ini" />

                        </div>

                        <!-- Email and Amount Row -->
                        <div class="grid md:grid-cols-2 gap-4">
                            <x-text-input label="Email" icon="fab fa-email" name="email" type="email"
                                placeholder="@example.com" />

                            <x-text-input label="Nominal Donasi" icon="fas fa-money-bill-wave" name="amount"
                                type="number" placeholder="10000" />
                        </div>

                          <!-- Quick Amount Buttons -->
                        <x-quick-amount label="Pilih Nominal" :amounts="[10000, 20000, 50000, 100000]" />

                        <x-textarea label="Do'a Dan Harapan" name="doa" placeholder="Tulis Doa ..."
                            icon="fas fa-align-left" rows="5" />


                      


                        <!-- Anonymous Checkbox -->
                        <x-chekcbox-label id="anonymous" name="hamba_allah" icon="fas fa-user-secret"
                            label="Donasi sebagai" highlight="Hamba Allah" />


                        <!-- Submit Button -->
                        <button type="submit"
                            class="w-max bg-gradient-primary text-white font-bold py-4 px-8 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200 flex items-center justify-center space-x-2">
                            <i class="fas fa-heart"></i>
                            <span>Donasi Sekarang</span>
                            <i class="fas fa-arrow-right"></i>
                        </button>

                        <!-- Security Notice -->
                        <div class="text-center pt-4">
                            <p class="text-xs text-gray-500 flex items-center justify-center">
                                <i class="fas fa-lock mr-1"></i>
                                Data Anda aman dan terlindungi dengan enkripsi SSL
                            </p>
                        </div>
                    </form>
            </div>


            {{-- modal --}}
           <div style="z-index: 1000" id="payment-modal" class="modal-overlay fixed inset-0 z-[1000]">
                    <div class="modal-container">
                        <div class="modal-header bg-gradient-primary">
                            <button class="close-button" onclick="closeModal()">
                                <i data-lucide="x" size="20" color="white"></i>
                            </button>
                            <h2 class="modal-title">Pilih Channel Pembayaran</h2>
                            <p class="modal-subtitle">Pilih metode pembayaran yang paling sesuai untuk Anda</p>
                        </div>

                        <div class="modal-body">
                            <div id="channel-list" class="channel-grid">
                                <!-- Akan diisi dengan JavaScript -->
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-secondary" onclick="closeModalHandler()">
                                <i data-lucide="x" size="16"></i>
                                Batal
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- YouTube Embed Display -->
<div class="bg-white dark:bg-gray-800 shadow-md rounded-lg mt-6 overflow-hidden p-4">
   <div class="w-full aspect-rasio" >
        <iframe 
            class="w-full h-full rounded-md"
            src="{{$campaign->youtube_link}}" 
            title="YouTube video"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen>
        </iframe>
    </div>
</div>



            <div class="grid grid-cols-1 gap-5  mt-7 rounded-sm md:rounded-md p-1 md:p-3">
                {{-- <x-inspirators /> --}}
                {{-- tabs --}}
                <x-detail-tabs :campaign="$campaign" />
            </div>
        </div>
    @endsection
