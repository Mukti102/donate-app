  <!-- Navigation -->
  <nav style="z-index: 50"
      class=" top-0 w-full bg-white fixed bg-dark shadow-lg border-b border-gray-200/20 dark:border-gray-700/20 animate-fade-in">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="flex items-center justify-between h-16">
              <!-- Logo Section -->
              <div class="flex items-center group">
                  <a href="/" class="flex items-center space-x-3 transition-transform duration-300 hover:scale-105">
                      <div class="relative">
                          <div
                              class="w-10 h-10 rounded-xl flex items-center justify-center shadow-lg animate-glow">
                              <img src="{{asset('storage/'.setting('general.logo'))}}" alt="
                              {{setting('general.logo')}}">
                          </div>
                      </div>
                      <div class="hidden sm:block">
                          <h1 class="text-2xl font-bold bg-gradient-primary bg-clip-text text-transparent">
                              {{ setting('general.brand_name') }}
                          </h1>
                          <p class="text-xs text-gray-500 dark:text-gray-400 -mt-1">Caring, Educating, Transforming</p>
                      </div>
                  </a>
              </div>

              <!-- Desktop Navigation -->
              <div class="hidden md:block">
                  <div class="ml-10 flex items-baseline space-x-1">
                      <a href="/"
                          class="nav-link px-4 py-2 rounded-lg text-sm font-medium {{ request()->is('/') ? 'nav-active' : '' }}">

                          <span class="flex items-center space-x-2">
                              <span>Beranda</span>
                          </span>
                      </a>
                      <a href="{{route('about')}}"
                          class="nav-link px-4 py-2 rounded-lg text-sm font-medium {{ request()->is('about*') ? 'nav-active' : '' }}">

                          <span class="flex items-center space-x-2">
                              <span>Profil</span>
                          </span>
                      </a>

                      <a href="{{ route('campaign.index') }}" @class([
                          'nav-link px-4 py-2 rounded-lg text-sm font-medium  hover:text-blue-600 dark:hover:text-primary transition-all duration-300',
                          'nav-active' => request()->is('campaign*'),
                      ])>

                          <span class="flex items-center  space-x-2 ">
                              <span>Campaign</span>
                          </span>
                      </a>

                      <a href="{{ route('article.index') }}" @class([
                          'nav-link px-4 py-2 rounded-lg text-sm font-medium  hover:text-blue-600 dark:hover:text-primary transition-all duration-300',
                          'nav-active' => request()->is('article*'),
                      ])>
                          <span class="flex items-center  space-x-2">
                              <span>Laporan Kegiatan</span>
                          </span>
                      </a>
                      <a href="{{ route('laporan-keuangan.index') }}" @class([
                          'nav-link px-4 py-2 rounded-lg text-sm font-medium  hover:text-blue-600 dark:hover:text-primary transition-all duration-300',
                          'nav-active' => request()->is('laporan-keuangan*'),
                      ])>
                          <span class="flex items-center  space-x-2">
                              <span>Laporan Keuangan</span>
                          </span>
                      </a>

                      {{-- <a href="#"
                          class="nav-link px-4 py-2 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-all duration-300">
                          <span class="flex items-center space-x-2">
                              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                  <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                      clip-rule="evenodd"></path>
                              </svg>
                              <span>Inspirator</span>
                          </span>
                      </a> --}}
                  </div>
              </div>

              <!-- Right Side Actions -->
              <div class="hidden md:flex items-center space-x-4">
                  <!-- Dark Mode Toggle -->
                  <button 
                      class=" dark-toggle p-2 rounded-lg text-gray-800 dark:text-white hover:scale-105 transition-all duration-300">
                      <i id="darkModeIcon" class="fas fa-moon"></i>
                  </button>

              </div>


              <!-- Mobile menu button -->
              <div class="md:hidden flex items-center space-x-2">
                 <button 
                  class="p-2 dark-toggle  rounded-lg md:hidden block text-gray-800 dark:text-white hover:scale-105 transition-all duration-300">
                  <i id="darkModeIcon" class="fas fa-moon"></i>
              </button>
                  <button onclick="toggleMobileMenu()"
                      class="inline-flex items-center justify-center p-2 rounded-lg text-gray-500 dark:text-gray-400 hover:text-gray-900  hover:bg-gray-100 focus:outline-none transition-all duration-300">
                      <span class="sr-only">Open main menu</span>
                      <svg id="menu-icon" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                          viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                      </svg>
                      <svg id="close-icon" class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                          viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                      </svg>
                  </button>
              </div>
          </div>
      </div>

      <!-- Mobile menu -->
      <div id="mobile-menu" class="md:hidden hidden">
          <div
              class="mobile-menu-overlay px-2 pt-2 pb-3 space-y-1 sm:px-3 border-t border-gray-200/20 dark:border-gray-700/20">
              <a href="/"
                  class="flex items-center text-gray-800 dark:text-gray-200 space-x-3   px-3 py-2 rounded-lg text-base font-medium ">
                  <span>Beranda</span>
              </a>
              <a href="{{route('about')}}"
                  class="flex items-center text-gray-800 dark:text-gray-200 space-x-3 {{ request()->is('about*') ? 'nav-active' : '' }}  px-3 py-2 rounded-lg text-base font-medium ">
                  <span>Profil</span>
              </a>

              <a href="{{ route('campaign.index') }}"
                  class="flex items-center space-x-3 text-gray-800 dark:text-gray-300 
                  {{ request()->is('campaign*') ? 'nav-active' : '' }} hover:text-primary px-3 py-2 rounded-lg text-base font-medium transition-all duration-300">
                  <span>Campaign</span>
              </a>

              <a href="{{ route('article.index') }}"
                  class="flex items-center dark:text-gray-200 text-gray-800 space-x-3 text-gray-700 
                  {{ request()->is('articles*') ? 'nav-active' : '' }}
                  dark:text-gray-300 hover:bg-blue-50 dark:hover:bg-blue-900/20 hover:text-blue-600 dark:hover:text-blue-400 px-3 py-2 rounded-lg text-base font-medium transition-all duration-300">
                  <span>Laporan Kegiatan</span>
              </a>
              <a href="{{ route('laporan-keuangan.index') }}"
                  class="flex items-center text-gray-800 dark:text-gray-200 space-x-3 text-gray-700 
                  {{ request()->is('laporan-keuangan*') ? 'nav-active' : '' }}
                  dark:text-gray-300 hover:bg-primary dark:hover:bg-blue-900/20 hover:text-blue-600 dark:hover:text-blue-400 px-3 py-2 rounded-lg text-base font-medium transition-all duration-300">
                  <span>Laporan Keuangan</span>
              </a>

              {{-- <a href="#"
                  class="flex items-center dark:text-gray-200 space-x-3 text-gray-700 dark:text-gray-300 hover:bg-blue-50 dark:hover:bg-blue-900/20 hover:text-blue-600 dark:hover:text-blue-400 px-3 py-2 rounded-lg text-base font-medium transition-all duration-300">
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                          clip-rule="evenodd"></path>
                  </svg>
                  <span>Inspirator</span>
              </a> --}}

              <!-- Dark Mode Toggle -->
             
          </div>
      </div>
  </nav>
 @push('script')
<script>
    const toggleBtns = document.querySelectorAll('.dark-toggle');
    const icons = document.querySelectorAll('.dark-icon');

    // Cek dan terapkan mode tersimpan saat load
    if (localStorage.getItem('theme') === 'dark' || 
        (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
        icons.forEach(icon => {
            icon.classList.remove('fa-moon');
            icon.classList.add('fa-sun');
        });
    }

    toggleBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const html = document.documentElement;
            const isDark = html.classList.contains('dark');

            html.classList.toggle('dark');
            localStorage.setItem('theme', isDark ? 'light' : 'dark');

            icons.forEach(icon => {
                icon.classList.toggle('fa-moon', isDark); // jika dark => moon
                icon.classList.toggle('fa-sun', !isDark); // jika light => sun
            });
        });
    });
</script>
@endpush

