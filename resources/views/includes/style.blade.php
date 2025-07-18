  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
  {{-- flowbite --}}
  <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />

  <!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<link rel="icon" type="image/png" href="{{asset('storage/'.setting('general.favicon'))}}">

{{-- 
@php
    $manifestPath = public_path('build/manifest.json');
    $manifest = file_exists($manifestPath) ? json_decode(file_get_contents($manifestPath), true) : null;
@endphp

@if ($manifest)
    <link rel="stylesheet" href="{{ asset('build/' . $manifest['resources/css/app.css']['file']) }}">
    <script src="{{ asset('build/' . $manifest['resources/js/app.js']['file']) }}" defer></script>
@else
    <link rel="stylesheet" href="{{ asset('css/fallback.css') }}">
    <script src="{{ asset('js/fallback.js') }}" defer></script>
@endif --}}


{{-- dev --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

