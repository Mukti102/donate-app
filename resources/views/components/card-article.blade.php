@push('style')
    
{{-- CSS Utility Classes (Add to your Tailwind config or CSS file) --}}
<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .stretched-link::after {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 1;
        content: "";
    }
</style>
@endpush
{{-- Article Card Component --}}
<div class="group relative overflow-hidden rounded-md md:rounded-2xl bg-white shadow-lg transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 border dark:border-gray-700 border-gray-100 bg-dark">
    {{-- Featured Image --}}
    <div class="relative overflow-hidden h-36 md:h-48 bg-gradient-to-br from-blue-500 to-purple-600">
        @if(isset($article->tumbnail))
            <img src="{{ asset('storage/'.$article->tumbnail) }}" 
                 alt="{{ $article->title }}" 
                 class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
        @else
            <div class="w-full h-full flex items-center justify-center">
                <svg class="w-16 h-16 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                </svg>
            </div>
        @endif
        
        {{-- Category Badge --}}
        @if(isset($article->category))
            <div class="absolute md:top-4 top-2 md:left-4 left-2">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-white/90 text-gray-800 backdrop-blur-sm">
                    {{ $article->category->name }}
                </span>
            </div>
        @endif
        
        {{-- Reading Time --}}
        @if(isset($article->reading_time))
            <div class="absolute top-4 right-4">
                <span class="inline-flex items-center px-2 py-1 rounded-lg text-xs font-medium bg-black/50 text-white backdrop-blur-sm">
                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    {{ $article->reading_time }} min
                </span>
            </div>
        @endif
    </div>
    
    {{-- Card Content --}}
    <div class="md:p-6 p-3">
        {{-- Article Title --}}
        <h3 class="mb-3 textlg md:text-xl font-bold dark:text-gray-200 text-gray-900 leading-tight line-clamp-2 group-hover:text-primary transition-colors duration-200">
            <a href="{{ route('article.show',Crypt::encrypt($article->id)) }}" class="stretched-link">
                {{ $article->title }}
            </a>
        </h3>
        
        {{-- Article Excerpt --}}
       @php
    use Illuminate\Support\Str;
@endphp
<p class="text-gray-600 text-sm leading-relaxed dark:text-gray-300 mb-2 md:mb-4 line-clamp-3">
    {{ Str::limit(strip_tags($article->content), 150, '...') }}
</p>
        
        {{-- Article Meta --}}
        <div class="flex items-center justify-between pt-2 md:pt-4 border-t dark:border-gray-500 border-gray-100">
            {{-- Author Info --}}
            <div class="flex items-center space-x-2 md:space-x-3">
                <time datetime="{{ $article->created_at->format('Y-m-d') }}" 
                      class="md:text-sm text-[11px] dark:text-gray-400 font-medium text-gray-700">
                    {{ $article->created_at->format('M d, Y') }}
                </time>
            </div>
            
            {{-- Article Date --}}
            <div class="flex flex-col items-end text-right">
                
                <span class="md:text-xs text-[9px] text-gray-500 dark:text-gray-400">
                    {{ $article->created_at->diffForHumans() }}
                </span>
            </div>
        </div>
    </div>
</div>
