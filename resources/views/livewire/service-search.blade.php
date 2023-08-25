<div>
    <div class="search-container">
        <input type="text" wire:model="searchTerm" placeholder="Search services" class="search-input">
        <span class="search-icon"><i class="fas fa-search"></i></span>
    </div><br>
    @if ($showDetail)
        <!-- untuk menampilkan detil -->
        <div>
            @livewire('service-detail', ['serviceId' => $selectedServiceId])
        </div>
    @endif
    <ul class="grid grid-cols-1 md:grid-cols-4 gap-4">
        @foreach ($services as $service)
            <li>
                <div class="max-w-sm rounded overflow-hidden shadow-lg">
                    <img src="{{ $service->image }}" class="w-full" alt="{{ $service->name }}">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">{{ $service->name }}</div>
                        <p class="text-gray-700 text-base">{{ $service->category }}</p>
                    </div>
                    <div class="px-6 py-4">
                        <center>
                            <a href="#" wire:click="showServiceDetail({{ $service->id }})" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Detail</a>
                        </center>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
