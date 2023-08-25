<div class="flex justify-center items-center h-screen bg-gray-200 p-8 rounded-lg">
    @if (session()->has('message'))
        <div class="bg-green-200 text-green-800 p-4 mb-4 rounded-md">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="createService" class="space-y-4">
        <div class="flex flex-col">
            <label for="name" class="text-gray-800">Name:</label>
            <input type="text" wire:model="name" id="name" class="border border-gray-300 rounded-md px-4 py-2">
            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="flex flex-col">
            <label for="category" class="text-gray-800">Category:</label>
            <select wire:model="category" id="category" class="border border-gray-300 rounded-md px-4 py-2">
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category }}">{{ $category }}</option>
                @endforeach
            </select>
            @error('category') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="flex flex-col">
            <label for="image" class="text-gray-800">Image:</label>
            <input type="text" wire:model="image" id="image" class="border border-gray-300 rounded-md px-4 py-2" placeholder="Link Gambar">
            @error('image') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="flex flex-col">
            <label for="contact" class="text-gray-800">Contact:</label>
            <input type="text" wire:model="contact" id="contact" class="border border-gray-300 rounded-md px-4 py-2" placeholder="Format: +62XXXXXXXXXXX">
            @error('contact') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        
        <div class="flex flex-col">
            <label for="description" class="text-gray-800">Description:</label>
            <textarea wire:model="description" id="description" class="border border-gray-300 rounded-md px-4 py-2" placeholder="Alamat dan lainnya"></textarea>
            @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-md px-4 py-2">Create</button>
        </div>
    </form>
</div>
