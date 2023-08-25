<div id="serviceModal" class="modal">
    <div class="service-details">
        <h1 class="text-3xl font-bold mb-4">{{ $service->name }}</h1>
        <div class="mb-4">
            <img src="{{ $service->image }}" class="w-full" alt="{{ $service->name }}">
        </div>
        <p class="text-gray-700 text-base">{{ $service->description }}</p>
        <ul class="mt-4">
            <li><span class="font-bold">Kategori:</span> {{ $service->category }}</li>
            <li><span class="font-bold">Nomor:</span> {{ $service->contact }}</li>
        </ul>
        <div class="mt-4">
            <button wire:click="goBack" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded">Tutup</button>
            <a href="tel:{{ $service->contact }}"><button type="button" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded">Hubungi</button></a>
        </div>
        <br>
        <div class="mt-4">
        @livewire('review-component', ['service' => $service])

        <a href="{{ route('services.review', ['serviceId' => $service->id]) }}">
        </div>
    </div>
</div>
<br>
