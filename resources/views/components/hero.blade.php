<section class="min-h-screen pt-24 overflow-hidden py-16 px-2 md:px-4 bg-gradient-primary">
    <div class="max-w-7xl mx-auto">
        <div class="grid lg:grid-cols-2 gap-12  items-center">

            <!-- Left Side - Image/Poster -->
            <div class="slide-in-left">
                <div class="relative">
                    <!-- Background decoration -->
                    <div class="absolute -top-4 -left-4 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>
                    <div class="absolute -bottom-4 -right-4 w-96 h-96 bg-purple-300/20 rounded-full blur-3xl"></div>

                    <!-- Main image container -->
                    <div class="relative bg-white/20 backdrop-blur-sm rounded-3xl p-8 shadow-2xl floating-animation">
                        <div
                            class="bg-gradient-to-br from-white to-gray-100 dark:bg-gray-800 rounded-2xl overflow-hidden shadow-inner">
                            <img src="{{ asset('assets/thumbnail.jpeg') }}" alt="{{ $campaign->title }}"
                                class="w-full h-52 md:h-96 object-cover" />
                        </div>

                        <!-- Floating stats -->
                        <div class="absolute -top-6 bg-dark -right-6 bg-white rounded-2xl p-4 shadow-xl">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-purple-600">1M+</div>
                                <div class="text-sm dark:text-gray-200 text-gray-600">Donatur</div>
                            </div>
                        </div>

                        <div class="absolute -bottom-6 -left-6 bg-emerald-500 text-white rounded-2xl p-4 shadow-xl">
                            <div class="text-center">
                                <div class="text-2xl font-bold">15B+</div>
                                <div class="text-sm">Terkumpul</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Form -->
            <div class="slide-in-right">
                <div class="bg-white bg-dark rounded-xl md:rounded-3xl p-4 md:p-8 shadow-2xl border border-white/20">
                    <!-- Header -->
                    <div class="text-center mb-8">
                        <div
                            class="inline-flex items-center justify-center w-16 h-16  rounded-2xl mb-4">
                              <img src="{{asset('storage/'.setting('general.logo'))}}" alt="
                              {{setting('general.logo')}}">
                        </div>
                        <h1 class="text-4xl font-black text-gray-800 mb-2  dark:text-gray-200">
                            <span
                                class="bg-gradient-primary bg-clip-text text-transparent">{{ setting('general.brand_name') }}</span>
                        </h1>
                        <p class="text-gray-600 text-lg leading-relaxed  dark:text-gray-400 max-w-md mx-auto">
                            Selamat datang di Website Donasi Panti Asuhan Diponegoro ! Solusi terbaik untuk berdonasi dengan mudah dan cepat. Mari bersama menebar kebaikan.
                        </p>
                    </div>

                    <!-- Trust Indicators -->
                    <div
                        class="flex justify-center items-center gap-8 mb-8 py-4 bg-dark dark:border dark:border-gray-700 bg-gray-50/50 rounded-2xl">
                        <div class="text-center">
                            <i class="fas fa-shield-alt text-primary text-xl mb-1"></i>
                            <div class="text-xs text-gray-600">Aman</div>
                        </div>
                        <div class="text-center">
                            <i class="fas fa-lock text-blue-500 text-xl mb-1"></i>
                            <div class="text-xs text-gray-600">Terpercaya</div>
                        </div>
                        <div class="text-center">
                            <i class="fas fa-bolt text-yellow-500 text-xl mb-1"></i>
                            <div class="text-xs text-gray-600">Cepat</div>
                        </div>
                        <div class="text-center">
                            <i class="fas fa-hand-holding-heart text-red-500 text-xl mb-1"></i>
                            <div class="text-xs text-gray-600">Mudah</div>
                        </div>
                    </div>

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

            </div>
        </div>
    </div>
    </div>
</section>

@push('style')
    <style>
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
