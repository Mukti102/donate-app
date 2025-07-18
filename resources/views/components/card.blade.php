<a href="{{ route('campaign.show', Crypt::encrypt($campaign->id)) }}" class="swiper-slide bg-white rounded-xl shadow-lg card-hover bg-dark border border-gray-100 dark:border-gray-600 overflow-hidden">
    <div class="relative bg-gradient-primary">
        <img class="w-full h-40 sm:h-32 md:h-48 object-cover" src="{{ asset('storage/'.$campaign->thumbnail) }}" alt="Campaign Image" />
        
        <!-- Time Badge -->
        <div class="absolute top-2 sm:top-2 md:top-4 right-2 sm:right-2 md:right-4 bg-white/90 dark:bg-black/50 backdrop-blur-sm px-2 sm:px-2 md:px-3 py-1 sm:py-1 rounded-full">
            <span class="text-xs sm:text-xs md:text-sm font-semibold dark:text-gray-200 text-gray-700 flex items-center">
                <i class="fas fa-clock mr-1 text-orange-500 text-xs"></i>
                {{ $campaign->created_at->diffForHumans() }}
            </span>
        </div>
        
        <!-- Category Badge -->
        <div class="absolute top-2 sm:top-2 md:top-4 left-2 sm:left-2 md:left-4 text-xs sm:text-xs md:text-sm px-2 sm:px-2 md:px-3 py-1 sm:py-1 bg-emerald-500 text-white rounded-full">
            <span class="font-semibold">{{ $campaign->category->name }}</span>
        </div>
    </div>
    
    <div class="p-4 sm:p-3 md:p-4 bg-dark">
        <!-- Author Info -->
        
        <!-- Title -->
        <h3 class="text-lg sm:text-sm md:text-xl font-bold text-gray-900 dark:text-gray-100 mb-4 sm:mb-2 md:mb-3 line-clamp-2 hover:text-primary cursor-pointer transition-colors leading-tight">
            {{ $campaign->title }}
        </h3>
        
        <!-- Progress Section -->
        <div class="mb-4 sm:mb-3 md:mb-4">
            @php
            $donaturs = $campaign->donaturs->sum('amount');
            $formattedDonaturs = 'Rp ' . number_format($donaturs, 0, ',', '.');
            $target = $campaign->target;
            $formattedTarget = 'Rp ' . number_format($target, 0, ',', '.');
            $presentase = $target > 0 ? ($donaturs / $target) * 100 : 0;
            @endphp
        
            <div class="flex justify-between items-center mb-2 sm:mb-1.5 md:mb-2">
                <span class="text-sm sm:text-xs md:text-sm font-medium text-gray-700 dark:text-gray-300">Terkumpul</span>
                <span class="text-sm sm:text-xs md:text-sm font-bold text-emerald-600">{{ number_format($presentase, 0) }}%</span>
            </div>
            
            <!-- Progress Bar -->
            <div class="w-full bg-gray-200 dark:bg-gray-500 overflow-hidden rounded-full h-3 sm:h-2 md:h-3 mb-3 sm:mb-2 md:mb-3">
                <div class="progress-bar h-3 sm:h-2 md:h-3 rounded-full" style="width: {{ $presentase }}%"></div>
            </div>
            
            <!-- Amount Info - Mobile Layout Horizontal -->
            <div class="grid grid-cols-2 gap-4 sm:flex sm:justify-between sm:items-start text-sm sm:text-[10px] md:text-base">
                <div class="text-left">
                    <span class="text-gray-600 dark:text-gray-200 block mb-1">Terkumpul:</span>
                    <span class="font-bold text-emerald-600 block text-base sm:text-xs md:text-base">{{ $formattedDonaturs }}</span>
                </div>
                <div class="text-right">
                    <span class="text-gray-600 dark:text-gray-200 block mb-1">Target:</span>
                    <span class="font-bold dark:text-gray-200 text-gray-900 block text-base sm:text-xs md:text-base">{{ $formattedTarget }}</span>
                </div>
            </div>
        </div>
        
        <!-- Stats -->
        <div class="flex justify-between items-center py-3 sm:py-2 md:py-3 px-4 sm:px-3 md:px-4 dark:border-1 dark:border-gray-700 bg-gray-50 bg-dark rounded-lg">
            <div class="text-center flex-1">
                <div class="font-bold text-gray-900 dark:text-gray-200 text-lg sm:text-xs md:text-sm">{{ $campaign->donaturs->count() ?? 0 }}</div>
                <div class="text-sm sm:text-[10px] md:text-xs dark:text-gray-300 text-gray-600 mt-1">Donatur</div>
            </div>
            <div class="w-px h-10 sm:h-7 md:h-8 bg-gray-300 mx-4"></div>
            <div class="text-center flex-1">
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

                <div class="font-bold text-gray-900 text-lg sm:text-xs md:text-sm dark:text-gray-200">{{ $hariTersisa }}</div>
                <div class="text-sm sm:text-[10px] md:text-xs text-gray-600 dark:text-gray-300 mt-1">Hari Tersisa</div>
            </div>
        </div>
    </div>
</a>