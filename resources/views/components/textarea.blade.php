@props([
    'label' => '',
    'icon' => '',
    'name' => '',
    'placeholder' => '',
    'rows' => 4,
])

<div class="space-y-2">
    <label class="text-sm font-semibold dark:text-gray-200 text-gray-700 flex items-center">
        @if ($icon)
            <i class="{{ $icon }} text-primary mr-2"></i>
        @endif
        {{ $label }}
    </label>
    <textarea 
        name="{{ $name }}" 
        placeholder="{{ $placeholder }}"
        rows="{{ $rows }}"
        {{ $attributes->merge([
            'class' => 'form-textarea w-full dark:bg-gray-700 dark:border-gray-700 dark:text-gray-200 px-4 py-3 bg-white border border-gray-200 rounded-xl focus:border-transparent outline-none text-gray-700'
        ]) }}
        required
    ></textarea>
</div>
