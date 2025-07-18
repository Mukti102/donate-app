<div>


    <label for="{{ $name }}" class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">{{ $slot }}</label>
    <select id="{{ $name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
      
      <!-- Placeholder option -->
      <option value="" disabled selected>{{ $placeholder }}</option>
    
      <!-- Loop through options -->
      @foreach($options as $option)
        <option value="{{ $option }}">{{ $option }}</option>
      @endforeach
    </select>
</div>
