 @php
     use App\Models\Donatur;
     use App\Helpers\TripayHelper;
     $donaturs = Donatur::all();
 @endphp
 {{-- resources/views/components/footer.blade.php --}}
 <footer class="bg-dark bg-gray-100">
     <!-- Main Footer Content -->
     <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-8">
         <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">

             <!-- Company Info -->
             <div class="lg:col-span-1">
                 <div class="mb-6">
                     <!-- Logo -->
                     <div class="flex items-center space-x-3 mb-4">
                         <div
                             class="w-10 h-10 rounded-lg flex items-center justify-center">
                               <img src="{{asset('storage/'.setting('general.logo'))}}" alt="
                              {{setting('general.logo')}}">
                         </div>
                         <h3 class="text-xl text-gray-700 dark:text-gray-200 font-bold">{{ setting('general.brand_name') }}</h3>
                     </div>

                     <p class="dark:text-gray-300 text-gray-500 leading-relaxed mb-6 text-sm">
                         Panti Asuhan Diponegoro anak-anak dibina dengan kasih sayang, dididik dengan nilai keislaman dan pengetahuan, serta didorong untuk tumbuh mandiri.
                     </p>

                     <!-- Social Media -->
                     <div class="flex space-x-4">
                         <!-- YouTube -->
                         <a href="{{setting('sosialMedia.youtube')}}" target="_blank"
                             class="group p-2 w-10 text-center dark:bg-gray-800 bg-slate-400 rounded-lg hover:bg-red-600 transition-all duration-300 transform hover:scale-110">
                             <i class="fab fa-youtube text-white text-xl"></i>
                         </a>

                         <!-- TikTok -->
                         <a href="{{setting('sosialMedia.tiktok')}}" target="_blank"
                             class="group p-2 w-10 text-center flex justify-centter items-center dark:bg-gray-800 bg-slate-400 rounded-lg hover:bg-black transition-all duration-300 transform hover:scale-110">
                             <i class="fab fa-tiktok text-white text-xl"></i>
                         </a>

                         <!-- Facebook -->
                         <a href="{{setting('sosialMedia.facebook')}}" target="_blank"
                             class="group  p-2 w-10 text-center dark:bg-gray-800 bg-slate-400 rounded-lg hover:bg-blue-600 transition-all duration-300 transform hover:scale-110">
                             <i class="fab fa-facebook-f text-white text-xl"></i>
                         </a>

                         <!-- Instagram -->
                         <a href="{{setting('sosialMedia.instagram')}}" target="_blank"
                             class="group p-2 w-10 text-center dark:bg-gray-800 bg-slate-400 rounded-lg hover:bg-pink-500 transition-all duration-300 transform hover:scale-110">
                             <i class="fab fa-instagram text-white text-xl"></i>
                         </a>
                     </div>

                 </div>
             </div>

             <!-- Quick Links -->
             <div>
                 <h4 class="text-lg font-semibold dark:text-gray-100 text-gray-800 mb-6 ">Tautan Cepat</h4>
                 <ul class="space-y-3 dark:text-gray-300 text-gray-500">
                     <li><a href="/" class=" transition-colors duration-200 text-sm flex items-center group">
                             <span
                                 class="w-1.5 h-1.5 bg-blue-500 rounded-full mr-3 group-hover:bg-white transition-colors duration-200"></span>
                             Beranda
                         </a></li>
                     <li><a href="{{ route('campaign.index') }}"
                             class=" transition-colors duration-200 text-sm flex items-center group">
                             <span
                                 class="w-1.5 h-1.5 bg-blue-500 rounded-full mr-3 group-hover:bg-white transition-colors duration-200"></span>
                             Campaign
                         </a></li>
                     <li><a href="{{ route('article.index') }}"
                             class=" transition-colors duration-200 text-sm flex items-center group">
                             <span
                                 class="w-1.5 h-1.5 bg-blue-500 rounded-full mr-3 group-hover:bg-white transition-colors duration-200"></span>
                             Article
                         </a></li>
                 </ul>
             </div>

             <!-- Support -->
             <div>
                 <h4 class="text-lg font-semibold mb-6 dark:text-gray-100 text-gray-800">Dukungan</h4>
                 <ul class="space-y-3">
                     <li><a href="#"
                             class="dark:text-gray-300 text-gray-600 hover:text-white transition-colors duration-200 text-sm flex items-center group">
                             <span
                                 class="w-1.5 h-1.5 bg-green-500 rounded-full mr-3 group-hover:bg-white transition-colors duration-200"></span>
                             Pusat Bantuan
                         </a></li>
                     <li><a href="#"
                             class="dark:text-gray-300 text-gray-600 hover:text-white transition-colors duration-200 text-sm flex items-center group">
                             <span
                                 class="w-1.5 h-1.5 bg-green-500 rounded-full mr-3 group-hover:bg-white transition-colors duration-200"></span>
                             Kebijakan Privasi
                         </a></li>
                     <li><a href="#"
                             class="dark:text-gray-300 text-gray-600 hover:text-white transition-colors duration-200 text-sm flex items-center group">
                             <span
                                 class="w-1.5 h-1.5 bg-green-500 rounded-full mr-3 group-hover:bg-white transition-colors duration-200"></span>
                             Syarat & Ketentuan
                         </a></li>
                     <li><a href="#"
                             class="dark:text-gray-300 text-gray-600 hover:text-white transition-colors duration-200 text-sm flex items-center group">
                             <span
                                 class="w-1.5 h-1.5 bg-green-500 rounded-full mr-3 group-hover:bg-white transition-colors duration-200"></span>
                             Keamanan
                         </a></li>
                     <li><a href="#"
                             class="dark:text-gray-300 text-gray-600 hover:text-white transition-colors duration-200 text-sm flex items-center group">
                             <span
                                 class="w-1.5 h-1.5 bg-green-500 rounded-full mr-3 group-hover:bg-white transition-colors duration-200"></span>
                             Laporan Keuangan
                         </a></li>
                 </ul>
             </div>

             <!-- Contact Info -->
             <div>
                 <h4 class="text-lg font-semibold mb-6 dark:text-gray-100 text-gray-800">Hubungi Kami</h4>
                 <div class="space-y-4 dark:text-gray-300 text-gray-600">
                     <div class="flex items-start space-x-3">
                         <div
                             class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                             <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                 </path>
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                             </svg>
                         </div>
                         <div>
                             <p class="text-sm  leading-relaxed">
                                    {{ setting('general.address') }}
                             </p>
                         </div>
                     </div>

                     <div class="flex items-center space-x-3">
                         <div class="w-8 h-8 bg-green-600 rounded-lg flex items-center justify-center flex-shrink-0">
                             <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                 </path>
                             </svg>
                         </div>
                         <p class="text-sm ">{{setting('general.phone')}}</p>
                     </div>

                     <div class="flex items-center space-x-3">
                         <div class="w-8 h-8 bg-purple-600 rounded-lg flex items-center justify-center flex-shrink-0">
                             <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M3 8l7.89 7.89a2 2 0 002.83 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                 </path>
                             </svg>
                         </div>
                         <p class="text-sm ">{{setting('general.email')}}</p>
                     </div>
                 </div>

             </div>
         </div>
     </div>

     <!-- Trust Badges -->
     <div class="border-t dark:border-gray-600 border-gray-300 dark:text-gray-300 text-gray-600">
         <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
             <div class="flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0">
                 <div class="flex items-center space-x-6">
                     <div class="flex items-center space-x-2">
                         <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center">
                             <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                 viewBox="0 0 24 24">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                             </svg>
                         </div>
                         <span class="text-sm ">Terverifikasi OJK</span>
                     </div>
                     <div class="flex items-center space-x-2">
                         <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center">
                             <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                 viewBox="0 0 24 24">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                     d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                 </path>
                             </svg>
                         </div>
                         <span class="text-sm ">SSL Secured</span>
                     </div>
                 </div>

                 <div class="text-center md:text-right">

                     <p class="text-sm dark:text-gray-300 text-gray-600 mb-1">Total Donasi Terkumpul</p>
                     <p class="text-2xl font-bold text-green-400">Rp
                         {{ number_format($donaturs->sum('amount'), 0, ',', '.') }}</p>
                 </div>
             </div>
         </div>
     </div>

     <!-- Bottom Bar -->
     <div class="border-t dark:border-gray-700 border-gray-300 bg-slate-100 bg-dark">
         <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
             <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                 <div class="flex flex-col md:flex-row items-center space-y-2 md:space-y-0 md:space-x-6">
                     <p class="text-sm text-gray-400">
                         © {{ date('Y') }} Panti Asuhan Diponegoro. Hak Cipta Dilindungi.
                     </p>
                     <div class="flex items-center space-x-4 text-xs text-gray-500">
                         <span>Made with ❤️ in Indonesia</span>
                         <span>•</span>
                         <span>v{{ config('app.version', '1.0.0') }}</span>
                     </div>
                 </div>

                 <!-- Payment Methods -->
             </div>
         </div>
     </div>
 </footer>

 {{-- Back to Top Button --}}
 <button id="backToTop"
     class="fixed bottom-6 right-6 w-12 h-12 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-full shadow-lg hover:shadow-xl transform hover:scale-110 transition-all duration-300 opacity-0 invisible z-50"
     onclick="scrollToTop()" aria-label="Kembali ke atas">
     <svg class="w-6 h-6 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
     </svg>
 </button>

 <script>
     // Back to Top functionality
     window.addEventListener('scroll', function() {
         const backToTop = document.getElementById('backToTop');
         if (window.pageYOffset > 300) {
             backToTop.classList.remove('opacity-0', 'invisible');
             backToTop.classList.add('opacity-100', 'visible');
         } else {
             backToTop.classList.add('opacity-0', 'invisible');
             backToTop.classList.remove('opacity-100', 'visible');
         }
     });

     function scrollToTop() {
         window.scrollTo({
             top: 0,
             behavior: 'smooth'
         });
     }

 </script>

 <style>
     /* Additional animations */
     @keyframes pulse-slow {

         0%,
         100% {
             opacity: 1;
         }

         50% {
             opacity: 0.8;
         }
     }

     .animate-pulse-slow {
         animation: pulse-slow 3s infinite;
     }

     /* Hover effects for social media */
     .group:hover .w-1\.5 {
         transform: scale(1.2);
     }

     /* Custom scrollbar for better UX */
     ::-webkit-scrollbar {
         width: 8px;
     }

     ::-webkit-scrollbar-track {
         background: #1f2937;
     }

     ::-webkit-scrollbar-thumb {
         background: linear-gradient(to bottom, #3b82f6, #8b5cf6);
         border-radius: 4px;
     }

     ::-webkit-scrollbar-thumb:hover {
         background: linear-gradient(to bottom, #2563eb, #7c3aed);
     }
 </style>
