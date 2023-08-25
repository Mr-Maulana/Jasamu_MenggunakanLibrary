<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="mt-8 text-2xl text-center">
                        <h1 class="text-3xl font-bold mb-8">Selamat datang di website JASAMU, ayo cari Jasa yang kamu butuhkan segera!</h1>
                    </div>
                    <div class="mt-4 flex justify-center">
                        <div class="mt-8 text-2xl">
                            <livewire:service-search />
                        </div>
                    </div>
                    <br>
                    <div class="font-bold text-xl mb-2"><center>
                        Kategori Jasa Terpopuler
                    </center></div>
                    @livewire('clustered-services')
                    <br>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
