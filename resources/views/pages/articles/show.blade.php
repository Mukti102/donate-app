@push('style')
<style>
    .gradient-text {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    .glass-effect {
        backdrop-filter: blur(10px);
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    .reading-progress {
        position: fixed;
        top: 0;
        left: 0;
        width: 0%;
        height: 4px;
        background: linear-gradient(90deg, #667eea, #764ba2);
        z-index: 9999;
        transition: width 0.3s ease;
    }
    .floating-action {
        position: fixed;
        right: 2rem;
        bottom: 2rem;
        z-index: 1000;
    }
</style>
@endpush
@extends('layouts.main')
@section('title',$article->title)
@section('content')
<div class="reading-progress " id="progress-bar"></div>
    <!-- Main Content -->
    <main class="max-w-6xl  mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Breadcrumb -->
        <nav class="flex items-center space-x-2 text-sm dark:text-slate-300 text-slate-600 mb-8 animate-fade-in">
            <a href="#" class="hover:text-indigo-600 transition-colors">Home</a>
            <i class="fas fa-chevron-right text-xs"></i>
            <a href="#" class="hover:text-indigo-600 transition-colors">Articles</a>
            <i class="fas fa-chevron-right text-xs"></i>
            <span class="text-slate-800 dark:text-slate-300 ">{{$article->title}}</span>
        </nav>

        <!-- Article Header -->
        <header class="mb-12 animate-slide-up">
            <!-- Category Badge -->
            <div class="mb-6">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gradient-primary text-white shadow-lg ">
                    <i class="fas fa-robot mr-2"></i>
                    {{$article->category->name}}
                </span>
            </div>

            <!-- Title -->
            <h1 class="text-4xl md:text-5xl dark:text-slate-200 capitalize  lg:text-6xl font-bold text-slate-900 leading-tight mb-6">
                {{$article->title}}
            </h1>

            <!-- Subtitle -->
            <p class="text-xl text-slate-600 dark:text-slate-400  leading-relaxed mb-8 max-w-3xl">
                {{$article->subtitle}}
            </p>

            <!-- Author & Meta Info -->
            <div class="flex flex-wrap items-center gap-6 py-6 border-t border-b dark:border-gray-600 border-slate-200">
                <div class="flex items-center space-x-3 ">
                    <img src="
                    {{ asset('storage/'.$article->avatar) }}" 
                         alt="Author" class="w-12 h-12 rounded-full object-cover ring-2 ring-indigo-500">
                    <div>
                        <p class="font-semibold dark:text-gray-200 text-slate-900">{{$article->author}}</p>
                        <p class="text-sm dark:text-gray-400 text-slate-600">author</p>
                    </div>
                </div>
                <div class="flex items-center space-x-6 dark:text-slate-300 text-sm text-slate-600">
                    <span class="flex items-center">
                        <i class="fas fa-calendar mr-2"></i>
                        {{$article->created_at}}
                    </span>
                    <span class="flex items-center">
                        <i class="fas fa-clock mr-2"></i>
                        8 min read
                    </span>
                    <span class="flex items-center">
                        <i class="fas fa-eye mr-2"></i>
                        2.4k views
                    </span>
                </div>
            </div>
        </header>

        <!-- Featured Image -->
        <div class="mb-12 animate-fade-in">
            <div class="relative overflow-hidden rounded-2xl shadow-2xl">
                <img src="
                {{ asset('storage/'.$article->tumbnail) }}
                " 
                     alt="AI Technology" class="w-full h-64 md:h-96 object-cover transition-transform duration-700 hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
            </div>
        </div>

        <!-- Article Content -->
        <article class="prose prose-lg max-w-none animate-fade-in">
            <div class="bg-gray-100 bg-dark backdrop-blur-sm text-gray-800 rounded-xl p-8 md:p-12 shadow-md border border-white/20">
                {!! $article->content !!}
            </div>
        </article>

        <!-- Tags -->
        <div class="mt-12 animate-fade-in">
            <h3 class="text-lg font-semibold dark:text-gray-200 text-slate-900 mb-4">Tags:</h3>
            <div class="flex flex-wrap gap-3">
            @foreach ($article->tags as $item)

                <span class="px-4 py-2 bg-gray-200 dark:bg-gray-600 backdrop-blur-sm text-slate-700 rounded-full text-sm border border-white/50 dark:border-white/20 dark:text-gray-200 hover:bg-indigo-50 hover:text-indigo-700 transition-colors cursor-pointer">
                    #{{$item}}
                </span>
                @endforeach
            </div>
        </div>

        <!-- Social Share & Actions -->
        <div class="mt-12 flex flex-wrap items-center justify-between gap-6 animate-fade-in">
            <div class="flex items-center space-x-4">
                <span class="text-slate-600 font-medium dark:text-gray-200">Share artikel:</span>
                <div class="flex space-x-3">
                    <button class="w-10 h-10 bg-blue-600 hover:bg-blue-700 text-white rounded-full flex items-center justify-center transition-colors">
                        <i class="fab fa-facebook-f"></i>
                    </button>
                    <button class="w-10 h-10 bg-sky-500 hover:bg-sky-600 text-white rounded-full flex items-center justify-center transition-colors">
                        <i class="fab fa-twitter"></i>
                    </button>
                    <button class="w-10 h-10 bg-blue-700 hover:bg-blue-800 text-white rounded-full flex items-center justify-center transition-colors">
                        <i class="fab fa-linkedin-in"></i>
                    </button>
                    <button class="w-10 h-10 bg-green-600 hover:bg-green-700 text-white rounded-full flex items-center justify-center transition-colors">
                        <i class="fab fa-whatsapp"></i>
                    </button>
                </div>
            </div>
            
        </div>

        <!-- Related Articles -->
        <section class="mt-20 animate-fade-in">
            <h2 class="text-3xl font-bold text-slate-900 dark:text-gray-200 mb-8">Artikel Terkait</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($related as $item )
                <x-card-article :article="$item"/>
                @endforeach
            </div>
        </section>
    </main>

    <!-- Floating Action Buttons -->
    <div class="floating-action">
        <div class="flex flex-col space-y-3">
            <button id="scroll-top" class="w-12 h-12 bg-gradient-primary text-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-110 flex items-center justify-center opacity-0 transform translate-y-4">
                <i class="fas fa-arrow-up"></i>
            </button>
        </div>
    </div>
@endsection
@push('script')
<script>
    // Reading Progress Bar
    window.addEventListener('scroll', () => {
        const article = document.querySelector('article');
        const progressBar = document.getElementById('progress-bar');
        const scrollTop = window.pageYOffset;
        const docHeight = document.body.offsetHeight - window.innerHeight;
        const scrollPercent = (scrollTop / docHeight) * 100;
        
        progressBar.style.width = scrollPercent + '%';
    });

    // Scroll to Top Button
    const scrollTopBtn = document.getElementById('scroll-top');
    
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 500) {
            scrollTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    // Smooth scroll for internal links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Animation on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in');
            }
        });
    }, observerOptions);

    // Observe all sections for animation
    document.querySelectorAll('section, .animate-fade-in').forEach(el => {
        observer.observe(el);
    });

    // Like button functionality
    document.querySelectorAll('button').forEach(button => {
        if (button.innerHTML.includes('fa-heart')) {
            button.addEventListener('click', function() {
                const icon = this.querySelector('i');
                const count = this.querySelector('span');
                
                if (icon.classList.contains('far')) {
                    icon.classList.remove('far');
                    icon.classList.add('fas');
                    this.classList.add('text-red-500');
                    count.textContent = parseInt(count.textContent) + 1;
                } else {
                    icon.classList.remove('fas');
                    icon.classList.add('far');
                    this.classList.remove('text-red-500');
                    count.textContent = parseInt(count.textContent) - 1;
                }
            });
        }
    });

    // Mobile menu toggle
    const mobileMenuBtn = document.querySelector('.md\\:hidden button');
    if (mobileMenuBtn) {
        mobileMenuBtn.addEventListener('click', () => {
            // Mobile menu functionality can be added here
            console.log('Mobile menu clicked');
        });
    }

    // Newsletter subscription
    const newsletterForm = document.querySelector('footer .flex');
    if (newsletterForm) {
        const input = newsletterForm.querySelector('input');
        const button = newsletterForm.querySelector('button');
        
        button.addEventListener('click', (e) => {
            e.preventDefault();
            if (input.value && input.value.includes('@')) {
                button.innerHTML = '<i class="fas fa-check"></i>';
                button.classList.add('bg-green-500');
                setTimeout(() => {
                    button.innerHTML = '<i class="fas fa-paper-plane"></i>';
                    button.classList.remove('bg-green-500');
                    input.value = '';
                }, 2000);
            }
        });
    }

    // Add hover effects to cards
    document.querySelectorAll('.group').forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-8px)';
        });
        
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(0)';
        });
    });

    // Dynamic text effect for title
    const title = document.querySelector('h1');
    if (title) {
        title.addEventListener('mouseenter', () => {
            title.style.textShadow = '0 0 20px rgba(99, 102, 241, 0.5)';
        });
        
        title.addEventListener('mouseleave', () => {
            title.style.textShadow = 'none';
        });
    }
</script>
@endpush