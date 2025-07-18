@props([
    'id' => '',
    'name' => '',
    'label' => '',
    'icon' => '',
    'highlight' => '',
])

<div class="flex items-center space-x-3 dark:bg-gray-700 dark:border-gray-700 dark:text-gray-200 p-4 bg-gray-50 rounded-xl">
    <input 
        type="checkbox" 
        name="{{ $name }}" 
        id="{{ $id }}"
        {{ $attributes->merge([
            'class' => 'w-5 h-5 text-primary dark:bg-gray-300 bg-white border-gray-300 rounded focus:ring-green-500 focus:ring-2'
        ]) }}
    >
    <label for="{{ $id }}" class="text-sm font-medium dark:text-gray-200 text-gray-700 flex items-center cursor-pointer">
        @if ($icon)
            <i class="{{ $icon }} text-gray-500 dark:text-gray-300 mr-2"></i>
        @endif
        {{ $label }}
        @if ($highlight)
            <strong class="text-primary ml-1">{{ $highlight }}</strong>
        @endif
    </label>
</div>
