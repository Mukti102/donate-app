@props([
    'label' => '',
    'icon' => '',
    'name' => '',
    'placeholder' => '',
    'type' => 'text',
])

<div class="space-y-2">
    <label class="text-sm font-semibold text-gray-700  dark:text-gray-200 flex items-center">
        @if ($icon)
            <i class="{{ $icon }} text-primary mr-2"></i>
        @endif
        {{ $label }}
    </label>
    <input 
        type="{{ $type }}" 
        name="{{ $name }}" 
        id="{{$name}}"
        placeholder="{{ $placeholder }}"
        {{ $attributes->merge([
            'class' => 'form-input w-full px-4 dark:bg-gray-700 py-3 bg-white border dark:border-gray-700 border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent dark:text-gray-200 outline-none text-gray-700'
        ]) }}
        required
    >
</div>
