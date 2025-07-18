<div class="px-5 py-4 ">
    <div class="swiper mySwiper py-8 px-4">
        <div class="flex justify-between">
            <x-heading1>Campaigns</x-heading1>
            {{-- buutons slide --}}
        </div>
        <div class="swiper-wrapper mt-6">
            @forelse ($campaigns->take(10) as $campaign )
            <x-card :campaign="$campaign"/>
            @empty
                <h1>Tidak ada Data</h1>  
            @endforelse
        </div>
    
      </div>
</div>
<!-- Swiper Container -->
@push('script')
<script>
  document.addEventListener('DOMContentLoaded', () => {
      const swiper = new Swiper('.mySwiper', {
          slidesPerView: 1,
          spaceBetween: 20,
          navigation: {
              nextEl: '.swiper-button-next',
              prevEl: '.swiper-button-prev',
          },
          breakpoints: {
              640: { slidesPerView: 3 },
              1024: { slidesPerView: 3 },
          },
      });
  });
</script>
@endpush
