{{-- Inspirational Videos Section --}}
<div class="px-5 py-4">
    <div class="max-w-7xl mx-auto">
        <div class="swiper mySwiper  py-8 px-4 relative">
            {{-- Header Section --}}
            <div class="flex justify-between items-center mb-6">
                <div class="flex items-center gap-4">
                    <x-heading1 >Inspirational Shorts</x-heading1>
                    <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                        {{ count($videos ?? []) > 0 ? count($videos) : '3' }} Videos
                    </span>
                </div>
                
                {{-- Custom Navigation --}}
                <div class="flex items-center gap-3">
                    {{-- View All Button --}}
                    <a href="" 
                       class="text-sm dark:text-gray-100 text-gray-600 hover:text-red-500 font-medium transition-colors duration-200 hidden md:block">
                        Lihat Semua
                    </a>
                    
                    {{-- Navigation Buttons --}}
                    <div class="flex gap-2">
                        <button class="swiper-button-prev-custom group w-10 h-10 bg-white shadow-lg rounded-full flex items-center justify-center hover:bg-red-50 hover:shadow-xl transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed">
                            <svg class="w-5 h-5 text-gray-600 group-hover:text-red-500 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </button>
                        <button class="swiper-button-next-custom group w-10 h-10 bg-white shadow-lg rounded-full flex items-center justify-center hover:bg-red-50 hover:shadow-xl transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed">
                            <svg class="w-5 h-5 text-gray-600 group-hover:text-red-500 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            
            
            {{-- Swiper Container --}}
            <div class="swiper-wrapper">
                {{-- Video 1 --}}
                @foreach ($videos as $item)       
                <div class="swiper-slide group">
                    <div class="bg-white bg-dark rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden">
                        <div class="relative overflow-hidden">
                            {{-- Thumbnail with Play Button --}}
                            <div class="video-thumbnail relative cursor-pointer" data-video-id="7Y0NoudU6co">
                                <div class="h-48">
                                    
                                </div>
                                <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-all duration-300"></div>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="play-button bg-red-500 hover:bg-red-600 text-white w-16 h-16 rounded-full flex items-center justify-center shadow-2xl transform group-hover:scale-110 transition-all duration-300">
                                        <svg class="w-8 h-8 ml-1" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M8 5v14l11-7z"/>
                                        </svg>
                                    </div>
                                </div>
                                {{-- Video Duration --}}
                                <div class="absolute bottom-2 right-2 bg-black/80 text-white px-2 py-1 rounded text-xs">
                                    3:45
                                </div>
                            </div>
                            
                            {{-- Video Iframe (Hidden by default) --}}
                            <div class="video-iframe hidden">
                                <iframe class="w-full h-48 rounded-t-2xl"
                                        data-src="{{$item->video}}"
                                        title="Inspirational Video 1"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen>
                                </iframe>
                            </div>
                        </div>
                        
                        {{-- Video Info --}}
                        <div class="p-4">
                            <h3 class="font-bold dark:text-gray-300 text-gray-800 mb-2 line-clamp-2 group-hover:text-red-500 transition-colors duration-200">
                                {{$item->name}}
                            </h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-3 line-clamp-2">
                                {{$item->description}}
                            </p>
                            <div class="flex items-center justify-between dark:text-gray-300 text-xs text-gray-500">
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                    </svg>
                                    1.2K views
                                </span>
                                <span>{{$item->created_at->diffForHumans()}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            {{-- Pagination Dots --}}
            <div class="swiper-pagination mt-8 flex justify-center"></div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .swiper-pagination-bullet {
        @apply w-3 h-3 bg-gray-300 opacity-100 mx-1;
    }
    
    .swiper-pagination-bullet-active {
        @apply bg-red-500 scale-125;
    }
    
    .play-button {
        backdrop-filter: blur(10px);
    }
    
    .video-thumbnail:hover .play-button {
        animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.1); }
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .swiper-slide .h-48 {
            height: 12rem;
        }
        
        .play-button {
            @apply w-12 h-12;
        }
        
        .play-button svg {
            @apply w-6 h-6;
        }
    }
</style>
@endpush

@push('script')
<script>
document.addEventListener('DOMContentLoaded', () => {
    let swiperInstance;
    
    // Initialize Swiper
    const initSwiper = () => {
        swiperInstance = new Swiper('.mySwiper', {
            slidesPerView: 1,
            spaceBetween: 20,
            speed: 600,
            grabCursor: true,
            
            // Custom navigation
            navigation: {
                nextEl: '.swiper-button-next-custom',
                prevEl: '.swiper-button-prev-custom',
            },
            
            // Pagination
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                renderBullet: function (index, className) {
                    return '<span class="' + className + '"></span>';
                },
            },
            
            // Keyboard control
            keyboard: {
                enabled: true,
                onlyInViewport: true,
            },
            
            // Touch gestures
            touchRatio: 1,
            touchAngle: 45,
            
            // Responsive breakpoints
            breakpoints: {
                480: {
                    slidesPerView: 1,
                    spaceBetween: 15,
                },
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 25,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
                1280: {
                    slidesPerView: 4,
                    spaceBetween: 30,
                },
            },
            
            // Event callbacks
            on: {
                init: function() {
                    updateProgress(this);
                    updateNavigationState(this);
                },
                
                slideChange: function() {
                    updateProgress(this);
                    updateNavigationState(this);
                    pauseAllVideos();
                },
                
                reachBeginning: function() {
                    updateNavigationState(this);
                },
                
                reachEnd: function() {
                    updateNavigationState(this);
                }
            },
        });
    };
    
    // Update progress bar
    const updateProgress = (swiper) => {
        const progressBar = document.querySelector('.swiper-progress');
        if (progressBar) {
            const progress = (swiper.activeIndex + 1) / swiper.slides.length * 100;
            progressBar.style.width = progress + '%';
        }
    };
    
    // Update navigation button states
    const updateNavigationState = (swiper) => {
        const prevBtn = document.querySelector('.swiper-button-prev-custom');
        const nextBtn = document.querySelector('.swiper-button-next-custom');
        
        if (prevBtn) {
            prevBtn.disabled = swiper.isBeginning;
            prevBtn.classList.toggle('opacity-50', swiper.isBeginning);
        }
        
        if (nextBtn) {
            nextBtn.disabled = swiper.isEnd;
            nextBtn.classList.toggle('opacity-50', swiper.isEnd);
        }
    };
    
    // Video thumbnail click handler
    const setupVideoHandlers = () => {
        const thumbnails = document.querySelectorAll('.video-thumbnail');
        
        thumbnails.forEach(thumbnail => {
            thumbnail.addEventListener('click', function() {
                const videoId = this.getAttribute('data-video-id');
                const thumbnailContainer = this;
                const iframeContainer = this.parentElement.querySelector('.video-iframe');
                const iframe = iframeContainer.querySelector('iframe');
                
                // Pause all other videos first
                pauseAllVideos();
                
                // Load and show the clicked video
                if (iframe && !iframe.src) {
                    iframe.src = iframe.getAttribute('data-src');
                }
                
                // Hide thumbnail, show iframe
                thumbnailContainer.style.display = 'none';
                iframeContainer.classList.remove('hidden');
                
                // Track video play event
                trackVideoPlay(videoId);
            });
        });
    };
    
    // Pause all videos
    const pauseAllVideos = () => {
        const iframes = document.querySelectorAll('.video-iframe iframe');
        const thumbnails = document.querySelectorAll('.video-thumbnail');
        const iframeContainers = document.querySelectorAll('.video-iframe');
        
        iframes.forEach(iframe => {
            if (iframe.src) {
                // Send pause command to YouTube iframe
                iframe.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
            }
        });
        
        // Reset to thumbnail view
        thumbnails.forEach(thumbnail => {
            thumbnail.style.display = 'block';
        });
        
        iframeContainers.forEach(container => {
            container.classList.add('hidden');
        });
    };
    
    // Track video play events (for analytics)
    const trackVideoPlay = (videoId) => {
        console.log('Video played:', videoId);
        
        // Add your analytics tracking here
        if (typeof gtag !== 'undefined') {
            gtag('event', 'video_play', {
                'video_id': videoId,
                'content_type': 'inspirational_video'
            });
        }
    };
    
    // Keyboard shortcuts
    const setupKeyboardShortcuts = () => {
        document.addEventListener('keydown', (e) => {
            if (!swiperInstance) return;
            
            switch(e.key) {
                case 'ArrowLeft':
                    e.preventDefault();
                    swiperInstance.slidePrev();
                    break;
                case 'ArrowRight':
                    e.preventDefault();
                    swiperInstance.slideNext();
                    break;
                case 'Escape':
                    e.preventDefault();
                    pauseAllVideos();
                    break;
            }
        });
    };
    
    // Intersection Observer for lazy loading
    const setupIntersectionObserver = () => {
        const observerOptions = {
            root: null,
            rootMargin: '50px',
            threshold: 0.1
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                        img.removeAttribute('data-src');
                        observer.unobserve(img);
                    }
                }
            });
        }, observerOptions);
        
        // Observe all images with data-src
        const lazyImages = document.querySelectorAll('img[data-src]');
        lazyImages.forEach(img => observer.observe(img));
    };
    
    // Handle window visibility change
    const handleVisibilityChange = () => {
        document.addEventListener('visibilitychange', () => {
            if (document.hidden) {
                pauseAllVideos();
            }
        });
    };
    
    // Error handling for thumbnails
    const setupErrorHandling = () => {
        const images = document.querySelectorAll('.video-thumbnail img');
        images.forEach(img => {
            img.addEventListener('error', (e) => {
                console.warn('Thumbnail failed to load:', e.target.src);
                e.target.src = 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAwIiBoZWlnaHQ9IjMwMCIgdmlld0JveD0iMCAwIDQwMCAzMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSI0MDAiIGhlaWdodD0iMzAwIiBmaWxsPSIjRjNGNEY2Ii8+CjxwYXRoIGQ9Ik0yMDAgMTUwTDE2MCAyMDBIMjQwTDIwMCAxNTBaIiBmaWxsPSIjOUI5QjlCIi8+CjxjaXJjbGUgY3g9IjE2MCIgY3k9IjEyMCIgcj0iMTAiIGZpbGw9IiM5QjlCOUIiLz4KPC9zdmc+';
            });
        });
    };
    
    // Initialize everything
    initSwiper();
    setupVideoHandlers();
    setupKeyboardShortcuts();
    setupIntersectionObserver();
    handleVisibilityChange();
    setupErrorHandling();
    
    // Cleanup on page unload
    window.addEventListener('beforeunload', () => {
        pauseAllVideos();
    });
});
</script>
@endpush