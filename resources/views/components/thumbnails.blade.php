{{-- Hero Banner Section --}}
<div class="px-4 py-6 relative">
    <div class="swiper mySwiper1 rounded-2xl overflow-hidden shadow-2xl relative group">
        {{-- Loading Skeleton --}}
        <div class="swiper-loading absolute inset-0 bg-gray-200 animate-pulse z-10 hidden">
            <div class="w-full h-[40rem] bg-gray-300"></div>
        </div>

        <div class="swiper-wrapper h-10">
            @foreach ($sliders as $item)
                {{-- Banner 1 --}}
                <div class="swiper-slide relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-black/30 to-transparent z-10"></div>
                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}"
                        class="w-full h-[30rem] object-cover transition-transform duration-700 hover:scale-105"
                        loading="lazy">


                </div>
            @endforeach
        </div>

        {{-- Custom Navigation Buttons --}}
        <div
            class="swiper-button-next !text-white !w-12 !h-12 !mt-0 !top-1/2 !transform !-translate-y-1/2 !right-4 
            bg-black/20 md:p-8 p-5 text-sm hover:bg-black/40 !rounded-full backdrop-blur-sm transition-all duration-300 
            opacity-0 group-hover:opacity-100 hover:scale-110 flex  items-center justify-center">
            <span class="md:text-3xl text-xl">
                <i class="fa-solid fa-chevron-right"></i>
            </span>
        </div>

        <div
            class="swiper-button-prev !text-white !w-12 !h-12 !mt-0 !top-1/2 !transform !-translate-y-1/2 !left-4 
            bg-black/20 md:p-8 p-5 text-sm hover:bg-black/40 !rounded-full backdrop-blur-sm transition-all duration-300 
            opacity-0 group-hover:opacity-100 hover:scale-110 flex items-center justify-center">
             <span class="md:text-3xl text-xl">
                <i class="fa-solid fa-chevron-left"></i>
            </span>
        </div>


        {{-- Custom Pagination --}}
        <div class="swiper-pagination !bottom-6 !left-1/2 !transform !-translate-x-1/2"></div>

        {{-- Progress Bar --}}
        <div class="absolute bottom-0 left-0 w-full h-1 bg-black/20 z-20">
            <div class="swiper-progress h-full bg-red-500 transition-all duration-300 ease-out" style="width: 0%"></div>
        </div>

        {{-- Slide Counter --}}
        <div
            class="absolute top-6 right-6 z-20 bg-black/30 backdrop-blur-sm text-white px-3 py-1 rounded-full text-sm font-medium">
            <span class="current-slide">1</span> / <span class="total-slides">3</span>
        </div>
    </div>

    {{-- Thumbnail Navigation (Optional) --}}
    <div class="flex justify-center mt-6 space-x-4">
        @foreach ($sliders as $index => $item)
            <button
                class="thumbnail-btn w-20 h-12 rounded-lg overflow-hidden border-2 border-transparent hover:border-red-500 transition-all duration-300 opacity-50 hover:opacity-100"
                data-slide="{{ $index }}">
                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}"
                    class="w-full h-full object-cover">
            </button>
        @endforeach
    </div>
</div>

@push('style')
    <style>
        .swiper-pagination-bullet {
            @apply w-3 h-3 bg-white/50 opacity-100;
        }

        .swiper-pagination-bullet-active {
            @apply bg-red-500 scale-125;
        }

        .swiper-button-next::after,
        .swiper-button-prev::after {
            display: none;
        }

        .thumbnail-btn.active {
            @apply opacity-100 border-red-500 scale-105;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .swiper-slide img {
                height: 16rem;
            }

            .swiper-slide .absolute div {
                @apply text-center left-4 right-4 max-w-none;
            }

            .swiper-slide h2 {
                @apply text-2xl;
            }

            .swiper-slide p {
                @apply text-base;
            }

            .swiper-button-next,
            .swiper-button-prev {
                @apply !w-10 !h-10;
            }

            .swiper-button-next svg,
            .swiper-button-prev svg {
                @apply w-5 h-5;
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
                swiperInstance = new Swiper('.mySwiper1', {
                    loop: true,
                    slidesPerView: 1,
                    spaceBetween: 0,
                    speed: 800,

                    // Auto play configuration
                    autoplay: {
                        delay: 5000,
                        disableOnInteraction: false,
                        pauseOnMouseEnter: true,
                    },

                    // Effects
                    effect: 'fade',
                    fadeEffect: {
                        crossFade: true
                    },

                    // Navigation
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },

                    // Pagination
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                        renderBullet: function(index, className) {
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
                    grabCursor: true,

                    // Lazy loading
                    lazy: {
                        loadPrevNext: true,
                        loadPrevNextAmount: 1,
                    },

                    // Breakpoints for responsive design
                    breakpoints: {
                        640: {
                            slidesPerView: 1,
                        },
                        768: {
                            slidesPerView: 1,
                        },
                        1024: {
                            slidesPerView: 1,
                        },
                    },

                    // Event callbacks
                    on: {
                        init: function() {
                            updateSlideCounter(this);
                            updateProgressBar(this);
                            updateThumbnails(this);
                            hideLoading();
                        },

                        slideChange: function() {
                            updateSlideCounter(this);
                            updateProgressBar(this);
                            updateThumbnails(this);
                        },

                        autoplayTimeLeft: function(swiper, time, progress) {
                            updateProgressBar(swiper, progress);
                        },

                        slideChangeTransitionStart: function() {
                            // Add animation classes to slide content
                            const activeSlide = this.slides[this.activeIndex];
                            const content = activeSlide.querySelector('.absolute > div');
                            if (content) {
                                content.classList.add('animate-fade-in-up');
                            }
                        },

                        slideChangeTransitionEnd: function() {
                            // Remove animation classes
                            this.slides.forEach(slide => {
                                const content = slide.querySelector('.absolute > div');
                                if (content) {
                                    content.classList.remove('animate-fade-in-up');
                                }
                            });
                        }
                    },
                });
            };

            // Update slide counter
            const updateSlideCounter = (swiper) => {
                const currentSlideEl = document.querySelector('.current-slide');
                const totalSlidesEl = document.querySelector('.total-slides');

                if (currentSlideEl && totalSlidesEl) {
                    currentSlideEl.textContent = swiper.realIndex + 1;
                    totalSlidesEl.textContent = swiper.slides.length;
                }
            };

            // Update progress bar
            const updateProgressBar = (swiper, progress = 0) => {
                const progressBar = document.querySelector('.swiper-progress');
                if (progressBar) {
                    const percentage = progress ? (1 - progress) * 100 : ((swiper.realIndex + 1) / swiper.slides
                        .length) * 100;
                    progressBar.style.width = percentage + '%';
                }
            };

            // Update thumbnail navigation
            const updateThumbnails = (swiper) => {
                const thumbnails = document.querySelectorAll('.thumbnail-btn');
                thumbnails.forEach((thumb, index) => {
                    thumb.classList.toggle('active', index === swiper.realIndex);
                });
            };

            // Hide loading skeleton
            const hideLoading = () => {
                const loading = document.querySelector('.swiper-loading');
                if (loading) {
                    loading.classList.add('hidden');
                }
            };

            // Thumbnail click handlers
            const setupThumbnailNavigation = () => {
                const thumbnails = document.querySelectorAll('.thumbnail-btn');
                thumbnails.forEach((thumb, index) => {
                    thumb.addEventListener('click', () => {
                        if (swiperInstance) {
                            swiperInstance.slideToLoop(index);
                        }
                    });
                });
            };

            // Pause autoplay on hover
            const setupHoverControls = () => {
                const swiperContainer = document.querySelector('.mySwiper1');
                if (swiperContainer) {
                    swiperContainer.addEventListener('mouseenter', () => {
                        if (swiperInstance && swiperInstance.autoplay) {
                            swiperInstance.autoplay.stop();
                        }
                    });

                    swiperContainer.addEventListener('mouseleave', () => {
                        if (swiperInstance && swiperInstance.autoplay) {
                            swiperInstance.autoplay.start();
                        }
                    });
                }
            };

            // Keyboard navigation
            const setupKeyboardNavigation = () => {
                document.addEventListener('keydown', (e) => {
                    if (!swiperInstance) return;

                    switch (e.key) {
                        case 'ArrowLeft':
                            swiperInstance.slidePrev();
                            break;
                        case 'ArrowRight':
                            swiperInstance.slideNext();
                            break;
                        case ' ':
                            e.preventDefault();
                            if (swiperInstance.autoplay.running) {
                                swiperInstance.autoplay.stop();
                            } else {
                                swiperInstance.autoplay.start();
                            }
                            break;
                    }
                });
            };

            // Initialize everything
            initSwiper();
            setupThumbnailNavigation();
            setupHoverControls();
            setupKeyboardNavigation();

            // Error handling for images
            const images = document.querySelectorAll('.swiper-slide img');
            images.forEach(img => {
                img.addEventListener('error', (e) => {
                    console.warn('Image failed to load:', e.target.src);
                    e.target.src =
                        'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAwIiBoZWlnaHQ9IjMwMCIgdmlld0JveD0iMCAwIDQwMCAzMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSI0MDAiIGhlaWdodD0iMzAwIiBmaWxsPSIjRjNGNEY2Ii8+CjxwYXRoIGQ9Ik0yMDAgMTUwTDE2MCAyMDBIMjQwTDIwMCAxNTBaIiBmaWxsPSIjOUI5QjlCIi8+CjxjaXJjbGUgY3g9IjE2MCIgY3k9IjEyMCIgcj0iMTAiIGZpbGw9IiM5QjlCOUIiLz4KPC9zdmc+';
                });
            });

            // Intersection Observer for lazy loading
            const observerOptions = {
                root: null,
                rootMargin: '50px',
                threshold: 0.1
            };

            const imageObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        if (img.dataset.src) {
                            img.src = img.dataset.src;
                            img.removeAttribute('data-src');
                            imageObserver.unobserve(img);
                        }
                    }
                });
            }, observerOptions);

            // Observe all images with data-src
            const lazyImages = document.querySelectorAll('img[data-src]');
            lazyImages.forEach(img => imageObserver.observe(img));
        });
    </script>
@endpush
