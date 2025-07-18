@extends('layouts.main')
@section('title',"Article")
@section('content')
    <div class="pt-10">
        {{-- filter --}}
        <div>
             <form action="{{route('article.index')}}" id="form-filter-article" method="GET" class="flex pt-10   gap-3 px-4 py-3 rounded-md">
                @csrf
                <div class="space-y-2">
                    <label class="text-sm font-semibold text-gray-700 flex dark:text-gray-200 items-center">
                        <i class="fas fa-venus-mars text-primary mr-2"></i>
                        Category
                    </label>
                    <select 
                        name="category_id" 
                        class="form-input custom-select w-full px-4 py-3 bg-white border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none text-gray-700 appearance-none dark:bg-gray-700 dark:border-gray-700 dark:text-gray-200"
                    >
                        <option value="">Pilih Category</option>
                        @foreach ($categories as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="space-y-2">
                    <label class="text-sm font-semibold dark:text-gray-200 text-gray-700 flex items-center">
                        <i class="fas fa-venus-mars text-primary mr-2"></i>
                        Waktu
                    </label>
                    <select 
                        name="time" 
                        class="form-input custom-select w-full px-4 py-3 bg-white border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none text-gray-700 appearance-none dark:bg-gray-700 dark:border-gray-700 dark:text-gray-200"
                    >
                        <option value="">Pilih Waktu</option>
                        <option value="terbaru">Terbaru</option>
                        <option value="terlama">Terlama</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label class="text-sm font-semibold text-gray-700 flex items-center">
                        <br/>
                    </label>
                    <button 
                    id="submit-filter-article"
                    class="w-full bg-gradient-primary text-white font-bold py-3 px-4 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200 flex items-center justify-center space-x-2 "
                >
                    <i class="fas fa-users"></i>
                    <span>Filter</span>
                    <i class="fas fa-arrow-right"></i>
                </button>
                </div>
            </form>
        </div>
       <div class="grid grid-cols-2 pb-20 px-2 md:px-5 mt-5 gap-3 md:grid-cols-4">
        @forelse ($articles as $article )
        <x-card-article :article="$article"/>
        @empty
            <h1>Tidak ada Data</h1>  
        @endforelse
        <div>
    </div>
@endsection
@push('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('form-filter-article');
        const button = document.getElementById('submit-filter-article');

        if (!form || !button) return;

        button.addEventListener('click', function () {
            form.submit();
        });
    });
</script>
@endpush
