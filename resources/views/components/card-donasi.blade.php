  
  <!-- Rank 2 -->
  <div class=" rounded-2xl bg-gray-100 dark:bg-gray-700 p-5 shadow-md  relative overflow-hidden">
    
    <div class="flex items-center space-x-3">
        <img src="https://claritycareconsulting.co.uk/wp-content/uploads/2023/05/Blank-Profile-Picture.jpg" 
             alt="Ahmad Rifai" 
             class="w-12 h-12 rounded-full object-cover border-2 border-gray-300 shadow-md">
        
        <div class="flex-1">
            <div class="flex items-center space-x-2">
                <h3 class="md:text-lg text-sm font-semibold dark:text-gray-300 text-gray-900">{{$donatur->name}}</h3>
            </div>
            <h3 class="md:text-sm text-xs dark:text-gray-400 text-gray-500">{{$donatur->created_at->diffForHumans()}}</h3>
        </div>
        <div>
            <h4 class="md:text-lg text-xs font-bold text-gray-700 dark:text-gray-200 amount-highlight">{{$donatur->city}}</h4>
        </div>
    </div>
</div>