
  <!-- Rank 2 -->
  <div class=" rounded-2xl bg-gray-100 dark:bg-gray-700 p-5 shadow-md  relative overflow-hidden">
    
    <div class="flex items-center space-x-3">
        <div class="flex-1 justify-between">
            <div class="flex items-center space-x-2">
                <h3 class="text-sm font-semibold text-primary capitalize text-gray-900">{{$donatur->name}}</h3>
            </div>
        </div>
        <div>
            <h3 class="text-sm text-gray-500 dark:text-gray-300">{{$donatur->created_at->diffForHumans()}}</h3>
        </div>
    </div>
    <div class="mt-2 font-medium text-sm text-gray-500 dark:text-gray-300">
       <p>
        {{$donatur->doa}}
       </p>
    </div>
    <div class="flex mt-4 text-xs gap-1 text-gray-500 dark:text-gray-300">
        <span>❤️</span>
        <span>Amiin..</span>
    </div>
</div>