@push('style')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
    
    * {
        font-family: 'Inter', sans-serif;
    }
    
    .glass-effect {
        backdrop-filter: blur(16px);
        background: rgba(255, 255, 255, 0.9);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .inspirator-card {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        background: linear-gradient(145deg, #ebeaea 0%, #f8fafc 100%);
    }
    
    .inspirator-card:hover {
        transform: translateY(-8px) scale(1.01);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
    }
    
    .tab-button {
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    
    .tab-button::before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        width: 0;
        height: 3px;
        background: linear-gradient(90deg, #667eea, #764ba2);
        transition: all 0.3s ease;
        transform: translateX(-50%);
    }
    
    .tab-button.active::before {
        width: 100%;
    }
    
    .tab-button:hover::before {
        width: 50%;
    }
    
    .tab-content {
        animation: fadeIn 0.5s ease-in-out;
    }
    
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .floating-animation {
        animation: float 3s ease-in-out infinite;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }
    
    .pulse-animation {
        animation: pulse 2s infinite;
    }
    
    .gradient-text {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .amount-highlight {
        background: linear-gradient(135deg, #10b981, #059669);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .story-card {
        background: linear-gradient(145deg, #f0f9ff 0%, #e0f2fe 100%);
        border-left: 4px solid #0ea5e9;
    }
    
    .distribution-card {
        background: linear-gradient(145deg, #f0fdf4 0%, #dcfce7 100%);
        border-left: 4px solid #22c55e;
    }
    
    .donation-card {
        background: linear-gradient(145deg, #fef3c7 0%, #fde68a 100%);
        border-left: 4px solid #f59e0b;
    }
    
    .prayer-card {
        background: linear-gradient(145deg, #fce7f3 0%, #fbcfe8 100%);
        border-left: 4px solid #ec4899;
    }
    
    .rank-badge {
        background: linear-gradient(135deg, #ffd700, #ffed4e);
        box-shadow: 0 4px 15px rgba(255, 215, 0, 0.3);
    }
    
    .rank-2 {
        background: linear-gradient(135deg, #c0c0c0, #e5e5e5);
        box-shadow: 0 4px 15px rgba(192, 192, 192, 0.3);
    }
    
    .rank-3 {
        background: linear-gradient(135deg, #cd7f32, #daa520);
        box-shadow: 0 4px 15px rgba(205, 127, 50, 0.3);
    }
</style>
@endpush
<div class="w-full col-span-2">
    <div class="grid lg:grid-cols-1 glass-effect rounded-3xl p-8 shadow-md">
        
        <!-- Top Inspirator Section -->
        <div class="space-y-6">
            <div class="text-center lg:text-left">
                <h1 class="text-3xl font-bold gradient-text mb-2 flex items-center justify-center lg:justify-start">
                    <i class="fas fa-trophy mr-3 text-yellow-500"></i>
                    Top Inspirator
                </h1>
                <p class="text-gray-600">Para donatur termurah hati dalam campaign ini</p>
            </div>

            <!-- Top 3 Inspirators -->
            <div class="space-y-4">
                <!-- Rank 1 -->
                <div class="inspirator-card  rounded-2xl p-6 shadow-lg  relative overflow-hidden">
                    <div class="rank-badge absolute top-4 right-4 w-10 h-10 rounded-full flex items-center justify-center">
                        <i class="fas fa-crown text-yellow-800 text-lg"></i>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1494790108755-2616b15e4e28?w=100&h=100&fit=crop&crop=face" 
                                 alt="Wantika" 
                                 class="w-16 h-16 rounded-full object-cover border-4 border-yellow-400 shadow-lg">
                            <div class="absolute -top-2 -right-2 w-6 h-6 bg-green-500 rounded-full border-2 border-white flex items-center justify-center">
                                <i class="fas fa-check text-white text-xs"></i>
                            </div>
                        </div>
                        
                        <div class="flex-1">
                            <div class="flex items-center space-x-2">
                                <h2 class="text-xl font-bold text-gray-900">Wantika</h2>
                                <span class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-semibold rounded-full">
                                    Perorangan
                                </span>
                            </div>
                            <p class="text-gray-600 text-sm mb-2">Donatur Setia • 5 kali donasi</p>
                            <h4 class="text-2xl font-bold amount-highlight">Rp 300.000</h4>
                        </div>
                    </div>
                    
                    <div class="mt-4 flex items-center justify-between">
                        <div class="flex items-center space-x-4 text-sm text-gray-600">
                            <span class="flex items-center">
                                <i class="fas fa-calendar mr-1"></i>
                                2 hari lalu
                            </span>
                            <span class="flex items-center">
                                <i class="fas fa-heart mr-1 text-red-500"></i>
                                142 likes
                            </span>
                        </div>
                        <button class="px-4 py-2 bg-gradient-to-r from-purple-500 to-purple-600 text-white text-sm font-semibold rounded-lg hover:shadow-lg transform hover:scale-105 transition-all duration-200">
                            <i class="fas fa-comment mr-1"></i>
                            Ucapkan Terima Kasih
                        </button>
                    </div>
                </div>

              {{-- rank 2 --}}
                <x-card-inspirator/>
                <x-card-inspirator/>
            </div>

            <!-- View All Button -->
            <div class="text-center">
                <button class="px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200">
                    <i class="fas fa-users mr-2"></i>
                    Lihat Semua Donatur (156)
                </button>
            </div>
        </div>
    </div>
</div>

    