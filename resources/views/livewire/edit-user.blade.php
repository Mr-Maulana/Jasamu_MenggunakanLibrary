<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                <div class="mt-8 text-2xl">
                    <div>
                        <h1 class="text-3xl font-bold mb-8">Edit User User</h1>
                        <br>
                        <div class="py-2" style="background-color: white">
                            <form style="width: 70%" wire:submit.prevent="updateUser">
                                <input type="hidden" wire:model="userId">
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full px-3">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                                            Name
                                        </label>
                                        <input wire:model="name" id="name" class="form-control @error('name') is-invalid @enderror appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Name">
                                        @error('name')
                                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full px-3">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                                            Email
                                        </label>
                                        <input wire:model="email" id="email" class="form-control @error('email') is-invalid @enderror appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="email" placeholder="User Email">
                                        @error('email')
                                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full px-3">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="password">
                                            Password
                                        </label>
                                        <input wire:model="password" id="password" class="form-control @error('password') is-invalid @enderror appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="password" placeholder="User Password">
                                        @error('password')
                                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full px-3">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="role">
                                            Roles
                                        </label>
                                        <input wire:model="role" id="role" class="form-control @error('role') is-invalid @enderror appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="User Role">
                                        @error('role')
                                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full px-3 text-right">
                                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                            Save User
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
