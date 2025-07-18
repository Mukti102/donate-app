@props([
    'label' => 'Nominal Cepat',
    'amounts' => [], // Contoh: [25000, 50000, 100000, 250000]
    'onclickFunction' => 'setAmount', // nama fungsi JS yang akan dipanggil
])

<div class="space-y-2">
    <label class="text-sm font-semibold dark:text-gray-200 text-gray-700">{{ $label }}</label>
    <div class="flex flex-wrap gap-2">
        @foreach ($amounts as $amount)
            <button 
                type="button" 
                onclick="{{ $onclickFunction }}({{ $amount }})" 
                class="px-4 py-2 bg-pink-50 dark:bg-gray-700 dark:border-gray-700 dark:text-gray-200  text-primary rounded-lg border border-purple-200 transition-colors text-sm font-medium"
            >
                Rp {{ number_format($amount, 0, ',', '.') }}
            </button>
        @endforeach
    </div>
</div>
