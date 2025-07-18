@push('style')
    <style>
        .category-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .category-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .gradient-bg-1 {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .gradient-bg-2 {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }

        .gradient-bg-3 {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }

        .gradient-bg-4 {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        }

        .gradient-bg-5 {
            background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        }

        .gradient-bg-6 {
            background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
        }

        .gradient-bg-7 {
            background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
        }

        .gradient-bg-8 {
            background: linear-gradient(135deg, #a18cd1 0%, #fbc2eb 100%);
        }

        .floating-animation {
            animation: float 6s ease-in-out infinite;
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

        .fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
            opacity: 0;
            transform: translateY(30px);
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .stagger-delay-1 {
            animation-delay: 0.1s;
        }

        .stagger-delay-2 {
            animation-delay: 0.2s;
        }

        .stagger-delay-3 {
            animation-delay: 0.3s;
        }

        .stagger-delay-4 {
            animation-delay: 0.4s;
        }

        .stagger-delay-5 {
            animation-delay: 0.5s;
        }

        .stagger-delay-6 {
            animation-delay: 0.6s;
        }

        .stagger-delay-7 {
            animation-delay: 0.7s;
        }

        .stagger-delay-8 {
            animation-delay: 0.8s;
        }
    </style>
@endpush
<section class="md:py-16 py-12 px-4">
    <div class="max-w-7xl mx-auto">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <div
                class="inline-flex items-center justify-center w-16 h-16 bg-gradient-primary rounded-2xl mb-6 floating-animation">
                <i class="fas fa-th-large text-white text-2xl"></i>
            </div>
            <h2 class="text-4xl md:text-5xl font-black dark:text-gray-100 text-gray-800 mb-4">
                Kategori <span class="bg-gradient-primary bg-clip-text text-transparent">Galang Dana</span>
            </h2>
            <p class="md:text-xl text-sm dark:text-gray-400 text-gray-600 max-w-3xl mx-auto leading-relaxed">
                Pilih kategori yang sesuai dengan kebutuhan donasi Anda. Setiap kategori memiliki fokus khusus untuk
                membantu mereka yang membutuhkan.
            </p>
            <div class="w-24 h-1 bg-gradient-primary mx-auto mt-6 rounded-full"></div>
        </div>

        <!-- Categories Grid -->
        <div class="grid grid-cols-3 sm:grid-cols-2 lg:grid-cols-4 gap-2 md:gap-8">

            @foreach ($categories as $index => $item)
                @php
                    $gradientIndex = ($index % 8) + 1;
                @endphp

                <!-- Education Category -->
                <div class="category-card fade-in-up stagger-delay-1 group cursor-pointer">
                    <div
                        class="bg-white bg-dark rounded-xl md:rounded-3xl p-3.5 md:p-8 shadow-lg border border-gray-100 dark:border-gray-600 text-center relative overflow-hidden">
                        <!-- Background decoration -->
                        <div
                            class="absolute top-0 right-0 w-32 h-32 gradient-bg-{{ $gradientIndex }} rounded-full opacity-10 transform translate-x-16 -translate-y-16">
                        </div>

                        <!-- Icon container -->
                        <div
                            class="inline-flex items-center justify-center w-12 h-12 md:w-20 md:h-20 gradient-bg-{{ $gradientIndex }} md:rounded-2xl rounded-md mb-3 md:mb-6 group-hover:scale-110 transition-transform duration-300">
                            <i class="{{ $item->icon }} text-white text-2xl"></i>
                        </div>

                        <!-- Category info -->
                        <h3 class="md:text-xl text-[11px] text-gray-800 dark:text-gray-200 font-bold mb-1 md:mb-3">{{ $item->name }}</h3>
                        <p class="text-gray-600 dark:text-gray-400 md:text-sm text-[7px] mb-4">{{ $item->subtitle }}</p>

                        <!-- Stats -->
                        <div
                            class="flex text-gray-600 dark:text-gray-400 justify-between text-[6px] md:text-xs md:pt-4 border-t border-gray-100 dark:border-gray-300">
                            <span>{{ $item->campaigns->count() }} Campaign</span>
                            <span>Rp 2.4M</span>
                        </div>
                    </div>
                </div>
            @endforeach


            {{-- <!-- Health Category -->
            <div class="category-card fade-in-up stagger-delay-2 group cursor-pointer">
                <div
                    class="bg-white rounded-3xl p-8 shadow-lg border border-gray-100 text-center relative overflow-hidden">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 gradient-bg-2 rounded-full opacity-10 transform translate-x-16 -translate-y-16">
                    </div>

                    <div
                        class="inline-flex items-center justify-center w-20 h-20 gradient-bg-2 rounded-2xl mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-heartbeat text-white text-2xl"></i>
                    </div>

                    <h3 class="text-xl font-bold text-gray-800 mb-3">Kesehatan</h3>
                    <p class="text-gray-600 text-sm mb-4">Dukung pengobatan dan perawatan medis yang dibutuhkan</p>

                    <div class="flex justify-between text-xs text-gray-500 pt-4 border-t border-gray-100">
                        <span>189 Campaign</span>
                        <span>Rp 5.2M</span>
                    </div>
                </div>
            </div>

            <!-- Disaster Relief Category -->
            <div class="category-card fade-in-up stagger-delay-3 group cursor-pointer">
                <div
                    class="bg-white rounded-3xl p-8 shadow-lg border border-gray-100 text-center relative overflow-hidden">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 gradient-bg-3 rounded-full opacity-10 transform translate-x-16 -translate-y-16">
                    </div>

                    <div
                        class="inline-flex items-center justify-center w-20 h-20 gradient-bg-3 rounded-2xl mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-hands-helping text-white text-2xl"></i>
                    </div>

                    <h3 class="text-xl font-bold text-gray-800 mb-3">Bencana Alam</h3>
                    <p class="text-gray-600 text-sm mb-4">Bantuan darurat untuk korban bencana alam</p>

                    <div class="flex justify-between text-xs text-gray-500 pt-4 border-t border-gray-100">
                        <span>56 Campaign</span>
                        <span>Rp 8.1M</span>
                    </div>
                </div>
            </div>

            <!-- Environment Category -->
            <div class="category-card fade-in-up stagger-delay-4 group cursor-pointer">
                <div
                    class="bg-white rounded-3xl p-8 shadow-lg border border-gray-100 text-center relative overflow-hidden">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 gradient-bg-4 rounded-full opacity-10 transform translate-x-16 -translate-y-16">
                    </div>

                    <div
                        class="inline-flex items-center justify-center w-20 h-20 gradient-bg-4 rounded-2xl mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-leaf text-white text-2xl"></i>
                    </div>

                    <h3 class="text-xl font-bold text-gray-800 mb-3">Lingkungan</h3>
                    <p class="text-gray-600 text-sm mb-4">Aksi pelestarian dan perlindungan lingkungan hidup</p>

                    <div class="flex justify-between text-xs text-gray-500 pt-4 border-t border-gray-100">
                        <span>78 Campaign</span>
                        <span>Rp 1.8M</span>
                    </div>
                </div>
            </div>

            <!-- Social Category -->
            <div class="category-card fade-in-up stagger-delay-5 group cursor-pointer">
                <div
                    class="bg-white rounded-3xl p-8 shadow-lg border border-gray-100 text-center relative overflow-hidden">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 gradient-bg-5 rounded-full opacity-10 transform translate-x-16 -translate-y-16">
                    </div>

                    <div
                        class="inline-flex items-center justify-center w-20 h-20 gradient-bg-5 rounded-2xl mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-users text-white text-2xl"></i>
                    </div>

                    <h3 class="text-xl font-bold text-gray-800 mb-3">Sosial</h3>
                    <p class="text-gray-600 text-sm mb-4">Program bantuan untuk masyarakat kurang mampu</p>

                    <div class="flex justify-between text-xs text-gray-500 pt-4 border-t border-gray-100">
                        <span>167 Campaign</span>
                        <span>Rp 3.7M</span>
                    </div>
                </div>
            </div>

            <!-- Animal Welfare Category -->
            <div class="category-card fade-in-up stagger-delay-6 group cursor-pointer">
                <div
                    class="bg-white rounded-3xl p-8 shadow-lg border border-gray-100 text-center relative overflow-hidden">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 gradient-bg-6 rounded-full opacity-10 transform translate-x-16 -translate-y-16">
                    </div>

                    <div
                        class="inline-flex items-center justify-center w-20 h-20 gradient-bg-6 rounded-2xl mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-paw text-white text-2xl"></i>
                    </div>

                    <h3 class="text-xl font-bold text-gray-800 mb-3">Hewan</h3>
                    <p class="text-gray-600 text-sm mb-4">Perlindungan dan perawatan hewan terlantar</p>

                    <div class="flex justify-between text-xs text-gray-500 pt-4 border-t border-gray-100">
                        <span>92 Campaign</span>
                        <span>Rp 956K</span>
                    </div>
                </div>
            </div>

            <!-- Religion Category -->
            <div class="category-card fade-in-up stagger-delay-7 group cursor-pointer">
                <div
                    class="bg-white rounded-3xl p-8 shadow-lg border border-gray-100 text-center relative overflow-hidden">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 gradient-bg-7 rounded-full opacity-10 transform translate-x-16 -translate-y-16">
                    </div>

                    <div
                        class="inline-flex items-center justify-center w-20 h-20 gradient-bg-7 rounded-2xl mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-mosque text-white text-2xl"></i>
                    </div>

                    <h3 class="text-xl font-bold text-gray-800 mb-3">Keagamaan</h3>
                    <p class="text-gray-600 text-sm mb-4">Pembangunan dan renovasi tempat ibadah</p>

                    <div class="flex justify-between text-xs text-gray-500 pt-4 border-t border-gray-100">
                        <span>145 Campaign</span>
                        <span>Rp 4.2M</span>
                    </div>
                </div>
            </div>

            <!-- Technology Category -->
            <div class="category-card fade-in-up stagger-delay-8 group cursor-pointer">
                <div
                    class="bg-white rounded-3xl p-8 shadow-lg border border-gray-100 text-center relative overflow-hidden">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 gradient-bg-8 rounded-full opacity-10 transform translate-x-16 -translate-y-16">
                    </div>

                    <div
                        class="inline-flex items-center justify-center w-20 h-20 gradient-bg-8 rounded-2xl mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-laptop-code text-white text-2xl"></i>
                    </div>

                    <h3 class="text-xl font-bold text-gray-800 mb-3">Teknologi</h3>
                    <p class="text-gray-600 text-sm mb-4">Akses teknologi untuk pendidikan dan pemberdayaan</p>

                    <div class="flex justify-between text-xs text-gray-500 pt-4 border-t border-gray-100">
                        <span>43 Campaign</span>
                        <span>Rp 1.3M</span>
                    </div>
                </div>
            </div> --}}
        </div>


        <!-- Stats Section -->
        <div class="md:mt-20 mt-10 bg-white bg-dark rounded-xl md:rounded-3xl p-4 md:p-8 shadow-lg border dark:border-gray-600 border-gray-100">
            <div class="grid grid-cols-4 md:grid-cols-4 gap-4 md:gap-8">
                <div class="text-center">
                    <div class="text-xl md:text-3xl font-bold text-purple-600 mb-1 md:mb-2">{{ $campaigns->count() }}</div>
                    <div class="text-gray-600 dark:text-gray-400 text-[10px] md:text-lg">Total Campaign</div>
                </div>
                 @php
                    function formatShortNumber($number)
                    {
                        if ($number >= 1000000000) {
                            return round($number / 1000000000, 1) . 'B'; // Miliar
                        } elseif ($number >= 1000000) {
                            return round($number / 1000000, 1) . 'M'; // Juta
                        } elseif ($number >= 1000) {
                            return round($number / 1000, 1) . 'K'; // Ribu
                        }

                        return $number;
                    }

                @endphp

                <div class="text-center">
                    <div class="text-xl md:text-3xl font-bold text-green-600 mb-1 md:mb-2">
                        {{ formatShortNumber($donaturs->sum('amount')) }}
                    </div>

                    <div class="text-gray-600 dark:text-gray-400 text-[10px] md:text-lg">Dana Terkumpul</div>
                </div>
               
                <div class="text-center">
                    <div class="text-xl md:text-3xl font-bold text-blue-600 mb-1 md:mb-2">
                        {{ number_format($donaturs->count(), 0, ',', '.') }}
                    </div>
                    <div class="text-gray-600 dark:text-gray-400 text-[10px] md:text-lg">Total Donatur</div>
                </div>
                <div class="text-center">
                    <div class="text-xl md:text-3xl font-bold text-orange-600 mb-1 md:mb-2">98.5%</div>
                    <div class="text-gray-600 dark:text-gray-400 text-[10px] md:text-lg">Tingkat Kepuasan</div>
                </div>
            </div>
        </div>
    </div>
</section>
