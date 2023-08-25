<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                <div class="mt-8 text-2xl">
                    <div>
                        <center><h1 class="text-3xl font-bold mb-8">Menu Layanan Jasa</h1></center>
                        <div class="mt-8">
                            @if (Auth::user()->role == 'admin')
                                <button wire:click="$set('showCreateForm', true)" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">Add Service</button>
                            @endif
                        </div>
                            <div class="center">{{ $services->links() }}</div>
                        <br>
                        @if ($showCreateForm)
                            <livewire:create-service />
                        @elseif ($showDetail)
                            <!-- untuk menampilkan detil -->
                            <div>
                                @livewire('service-detail', ['serviceId' => $selectedServiceId])
                            </div>
                        @else
                            @if (session()->has('success'))
                                <div class="bg-green-500 text-white p-4 mb-4">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                @foreach ($services as $service)
                                    <div class="max-w-sm rounded overflow-hidden shadow-lg">
                                        <img src="{{ $service->image }}" class="w-full" alt="{{ $service->name }}">
                                        <div class="px-6 py-4">
                                            <div class="font-bold text-xl mb-2">{{ $service->name }}</div>
                                            <p class="text-gray-700 text-base">{{ $service->category }}</p>
                                        </div>
                                        <div class="px-6 py-4">
                                            <center>
                                                <a href="#" wire:click="showServiceDetail({{ $service->id }})" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Detail</a>
                                                @if (Auth::user()->role == 'admin')
                                                    <button wire:click="deleteService({{ $service->id }})" class="inline-block bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded">Hapus</button>
                                                @endif
                                            </center>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
