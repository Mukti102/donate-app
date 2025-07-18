@extends('layouts.main')
@section('title',"About")
@section('content')
    <div class="pt-10">
        <div class="md:p-10 p-2">
            <x-thumbnails :sliders="$sliders"/>
            
            {{-- Company Description Section --}}
            <div class="max-w-7xl mx-auto mt-10 md:mt-16">
                <div class="bg-white bg-dark rounded-2xl shadow-xl overflow-hidden">
                    <div class="relative bg-gradient-primary px-8 py-12">
                        <div class="absolute inset-0 bg-black/10"></div>
                        <div class="relative z-10">
                            <h2 class="md:text-4xl text-2xl font-bold text-white mb-4 text-center">Tentang Kami</h2>
                            <div class="w-24 h-1 bg-white/80 mx-auto rounded-full"></div>
                        </div>
                    </div>
                    
                    <div class="md:px-8 px-5 py-5 md:py-12">
                        <div class="max-w-4xl mx-auto">
                            <div class="prose prose-lg max-w-none  text-gray-700 leading-relaxed">
                                <article class="md:text-xl text-lg dark:text-gray-200 text-gray-600 mb-8 text-center font-light">
                                    Panti Asuhan Diponegoro berlokasi di RT 01 RW 38, Sembego, Maguwoharjo, Depok, Sleman, Yogyakarta. Didirikan sejak tahun 1997 dan resmi terdaftar di Departemen Sosial pada 15 Juli 1998. Panti ini berada di bawah naungan Yayasan Pondok Pesantren Pangeran Diponegoro, yang berkomitmen memberikan manfaat bagi sesama—khususnya keluarga kurang mampu, anak-anak yatim piatu, dan kaum duafa—agar tetap dapat mengenyam pendidikan yang layak dan meraih mimpi mereka.
                                </article>
                                
                                <div class="grid md:grid-cols-2 gap-8 mb-12">
                                    <div class="space-y-6">
                                        <h3 class="md:text-2xl text-xl font-semibold dark:text-gray-200 text-gray-800 mb-4">Visi Kami</h3>
                                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                                           Meningkatkan keimanan, ketaqwaan, keilmuan dan persaudaraan umat yang dihiasi dengan al-akhlaqul karimah serta menumbuhkan kepedulian sosial, agar tercipta kesejahteraan bangsa yang adil, makmur dan merata.
                                        </p>
                                    </div>
                                    
                                    <div class="space-y-6">
                                        <h3 class="md:text-2xl text-xl font-semibold dark:text-gray-200 text-gray-800 mb-4">Misi Kami</h3>
                                        <ul class="space-y-3 dark:text-gray-300 text-gray-600">
                                            Membentuk lembaga bimbingan, pembinaan pendidikan ilmu pengetahuan dan teknologi, ilmu agama dan keterampilan sebagai bekal untuk kehidupan mereka di masa depan, agar tercipta sumber daya manusia yang berkualitas, berbudi pekerti luhur, mandiri, agamis dan pancasilais.
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Donation Information Section --}}
            <div class="max-w-6xl mx-auto mt-10 md:mt-16 mb-5 md:mb-16">
                <div class="bg-gradient-to-br from-emerald-50 to-teal-50 rounded-2xl shadow-xl overflow-hidden border border-emerald-100 dark:border-emerald-200">
                    <div class="relative bg-gradient-to-r from-emerald-600 to-teal-600 px-8 py-10">
                        <div class="absolute inset-0 bg-black/5"></div>
                        <div class="relative z-10 text-center">
                            <div class="inline-flex items-center justify-center w-16 h-16 bg-white/20 rounded-full mb-4">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            </div>
                            <h2 class="text-3xl font-bold text-white mb-2">Dukung Kami</h2>
                            <p class="text-emerald-100 text-lg">Kontribusi Anda sangat berarti untuk kemajuan bersama</p>
                        </div>
                    </div>
                    
                    <div class="md:px-8 px-5 py-10 bg-white  bg-dark">
                        <div class="text-center mb-8">
                            <p class="text-gray-600 dark:text-gray-300 text-lg leading-relaxed max-w-3xl mx-auto">
                                Setiap donasi yang Anda berikan akan digunakan untuk mengembangkan program-program sosial dan memberikan manfaat langsung bagi masyarakat yang membutuhkan.
                            </p>
                        </div>
                        
                        <div class="max-w-xl mx-auto">
                            {{-- Bank Account 1 --}}
                            <div class="bg-white bg-dark  rounded-xl shadow-lg p-6 border dark:border-gray-700 border-gray-100 hover:shadow-xl transition-all duration-300 group">
                                <div class="flex items-center mb-4">
                                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center group-hover:bg-blue-200 transition-colors">
                                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 dark:text-gray-100">{{setting('bank.name')}}</h3>
                                        <p class="text-sm text-gray-500 dark:text-gray-200">{{setting('bank.name')}}</p>
                                    </div>
                                </div>
                                <div class="space-y-3">
                                    <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                        <span class="text-sm font-medium text-gray-600 dark:text-gray-300">Nomor Rekening</span>
                                        <span class="font-mono text-lg font-semibold text-gray-800 dark:text-gray-200 dark:text-gray-100">{{setting('bank.no_rekening')}}</span>
                                    </div>
                                    <div class="flex justify-between items-center py-2">
                                        <span class="text-sm font-medium text-gray-600 dark:text-gray-300">Atas Nama</span>
                                        <span class="font-semibold text-gray-800 dark:text-gray-200">{{setting('bank.username')}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        {{-- Additional Info --}}
                        <div class="mt-8 p-3 md:p-6 bg-amber-50 border border-amber-200 rounded-xl">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="w-6 h-6 text-amber-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h4 class="md:text-sm text-xs font-semibold text-amber-800 mb-1">Informasi Penting</h4>
                                    <p class="md:text-sm text-xs text-amber-700 leading-relaxed">
                                        Setelah melakukan transfer, mohon konfirmasi melalui WhatsApp ke nomor <span class="font-semibold">{{setting('general.phone')}}</span> dengan melampirkan bukti transfer untuk verifikasi donasi Anda.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
<script>
    // Add smooth scrolling animation
    document.addEventListener('DOMContentLoaded', function() {
        // Animate elements on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in');
                }
            });
        }, observerOptions);

        // Observe all sections
        document.querySelectorAll('.bg-white, .bg-gradient-to-br').forEach(el => {
            observer.observe(el);
        });
    });
</script>
@endpush