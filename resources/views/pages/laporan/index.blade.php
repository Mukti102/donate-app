@extends('layouts.main')

@section('title', 'Laporan Keuangan')

@section('content')
    <div class="container mx-auto px-4 py-8 pt-24">
        <x-heading1>Laporan Keuangan</x-heading1>
        <div
            class="bg-gray-50 dark:bg-gray-800 mt-5 border  dark:border-gray-800 border-gray-300 rounded-lg shadow-lg overflow-hidden">
            <!-- Header -->
            <div class="bg-gray-50 dark:bg-gray-700 px-6 py-4 border-b border-gray-200 dark:border-gray-600">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Daftar File</h2>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full table-auto">
                    <!-- Table Header -->
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Periode
                            </th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Jenis File
                            </th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Ukuran
                            </th>
                            <th
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>

                    <!-- Table Body -->
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-600">
                        @forelse ($laporans as $item)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                                        {{ \Carbon\Carbon::parse($item->periode)->translatedFormat('F Y') }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="inline-flex items-center capitalize px-2.5 py-0.5 rounded-full text-xs font-medium 
                                @if (strtolower($item->file_type) == 'pdf') bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300
                                @elseif(strtolower($item->file_type) == 'xlsx') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300
                                @elseif(strtolower($item->file_type) == 'txt') bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300
                                @elseif(strtolower($item->file_type) == 'docx') bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-300
                                @else bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300 @endif">
                                        {{ $item->file_type }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    {{ $item->size }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <a href="{{ asset('storage/' . $item->file_path) }}" download
                                        class="inline-flex items-center px-4 py-2 bg-gradient-primary hover:opacity-80 text-white text-sm font-medium rounded-md transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                            </path>
                                        </svg>
                                        UNDUH
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-8 text-center text-gray-500 dark:text-gray-400">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-12 h-12 mb-4 text-gray-300 dark:text-gray-600" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                            </path>
                                        </svg>
                                        <p class="text-lg font-medium">Tidak ada data</p>
                                        <p class="text-sm">Belum ada file yang tersedia</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if ($laporans->hasPages())
                <div class="bg-white dark:bg-gray-800 px-6 py-3 border-t border-gray-200 dark:border-gray-600">
                    <div class="flex flex-col sm:flex-row items-center justify-between space-y-3 sm:space-y-0">
                        <div class="text-sm text-gray-500 dark:text-gray-400">
                            Menampilkan {{ $laporans->firstItem() }}-{{ $laporans->lastItem() }} dari
                            {{ $laporans->total() }} file
                        </div>

                        <!-- Pagination Links -->
                        <div class="flex items-center space-x-1">
                            {{-- Previous Page Link --}}
                            @if ($laporans->onFirstPage())
                                <span
                                    class="px-3 py-2 text-sm bg-gray-100 dark:bg-gray-700 text-gray-400 dark:text-gray-500 rounded cursor-not-allowed">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                </span>
                            @else
                                <a href="{{ $laporans->previousPageUrl() }}"
                                    class="px-3 py-2 text-sm bg-gray-200 dark:bg-gray-600 text-gray-600 dark:text-gray-300 rounded hover:bg-gray-300 dark:hover:bg-gray-500 transition-colors duration-200">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                </a>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($laporans->getUrlRange(1, $laporans->lastPage()) as $page => $url)
                                @if ($page == $laporans->currentPage())
                                    <span
                                        class="px-3 py-2 text-sm bg-blue-600 text-white rounded font-medium">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}"
                                        class="px-3 py-2 text-sm bg-gray-200 dark:bg-gray-600 text-gray-600 dark:text-gray-300 rounded hover:bg-gray-300 dark:hover:bg-gray-500 transition-colors duration-200">{{ $page }}</a>
                                @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($laporans->hasMorePages())
                                <a href="{{ $laporans->nextPageUrl() }}"
                                    class="px-3 py-2 text-sm bg-gray-200 dark:bg-gray-600 text-gray-600 dark:text-gray-300 rounded hover:bg-gray-300 dark:hover:bg-gray-500 transition-colors duration-200">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            @else
                                <span
                                    class="px-3 py-2 text-sm bg-gray-100 dark:bg-gray-700 text-gray-400 dark:text-gray-500 rounded cursor-not-allowed">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('script')
    <script>
        // Script untuk handling download button
        document.addEventListener('DOMContentLoaded', function() {
            const downloadButtons = document.querySelectorAll('button[class*="bg-blue-600"]');

            downloadButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Tambahkan logika download di sini
                    const row = this.closest('tr');
                    const periode = row.querySelector('td:first-child').textContent.trim();
                    const fileType = row.querySelector('span').textContent.trim();

                    // Example: alert untuk demo
                    alert(`Mengunduh file ${fileType} untuk periode ${periode}`);

                    // Ganti dengan logika download yang sebenarnya
                    // window.location.href = '/download/' + fileId;
                });
            });
        });
    </script>
@endpush
