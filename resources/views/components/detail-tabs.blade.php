<div class="bg-white bg-dark rounded-xl md:rounded-xl dark:border dark:border-gray-700 col-span-3 shadow-md p-2 md:p-5">
<div class="mb-4 border-b border-gray-200 dark:border-gray-700">
    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
        <li class="me-2" role="presentation">
            <button class="inline-block text-sm md:text-lg capitalize p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#story" type="button" role="tab" aria-controls="story" aria-selected="false">Cerita</button>
        </li>
        <li class="me-2" role="presentation">
            <button class="inline-block text-sm md:text-lg capitalize p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="Penyaluran-tab" data-tabs-target="#Penyaluran" type="button" role="tab" aria-controls="Penyaluran" aria-selected="false">Penyaluran</button>
        </li>
        <li class="me-2" role="presentation">
            <button class="inline-block text-sm md:text-lg capitalize p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="donasi-tab" data-tabs-target="#donasi" type="button" role="tab" aria-controls="donasi" aria-selected="false">donasi</button>
        </li>
        <li role="presentation">
            <button class="inline-block text-sm md:text-lg capitalize p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="doa-tab" data-tabs-target="#doa" type="button" role="tab" aria-controls="doa" aria-selected="false">doa</button>
        </li>
    </ul>
</div>
<div id="default-tab-content">
    <div class="hidden p-2 md:p-4 dark:bg-gray-800 rounded-lg bg-gray-50 " id="story" role="tabpanel" aria-labelledby="story-tab">
     <p class="text-sm text-gray-700 dark:text-gray-400">{!! $campaign->story !!}</p>

    </div>
    <div class="hidden p-2 md:p-4 dark:bg-gray-800 rounded-lg bg-gray-50 " id="Penyaluran" role="tabpanel" aria-labelledby="Penyaluran-tab">
        <p class="text-sm text-gray-500 dark:text-gray-400">{!! $campaign->penyaluran !!}</p>
    </div>
    <div class="hidden p-2 md:p-4 dark:bg-gray-800 rounded-lg bg-gray-50 " id="donasi" role="tabpanel" aria-labelledby="donasi-tab">
       <div class="grid grid-cols-1 gap-2">
        @foreach ($campaign->donaturs as $donatur )
            <x-card-donasi :donatur="$donatur"/>
        @endforeach
       </div>
    </div>
    <div class="hidden p-2 md:p-4 dark:bg-gray-800 rounded-lg bg-gray-50 " id="doa" role="tabpanel" aria-labelledby="doa-tab">
       <div class="grid grid-cols-1 gap-2">
        @foreach ($campaign->donaturs as $donatur )
            <x-card-doa :donatur="$donatur"/>
        @endforeach
       </div>
    </div>
</div>
</div>