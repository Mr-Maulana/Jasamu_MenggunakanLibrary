<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clustered Services') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <center>
                        <h1>Clustered Services</h1>

                        <table>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Normalized Rating</th>
                                    <th>Normalized Interactions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $service)
                                    <tr>
                                        <td>{{ $service['name'] }}</td>
                                        <td>{{ $service['category'] }}</td>
                                        <td><center>{{ $service['normalized_rating'] }}</center></td>
                                        <td><center>{{ $service['normalized_interactions'] }}</center></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <br>

                        <h1>Hasil Analisis Clustering K-Means</h1>

                        <h2>Kategori Terpopuler:</h2>
                        <ul>
                            @foreach ($mostPopularCategories as $category)
                                <li>{{ $category }}</li>
                            @endforeach
                        </ul>

                        <h2>Kategori Populer:</h2>
                        <ul>
                            @foreach ($popularCategories as $category)
                                <li>{{ $category }}</li>
                            @endforeach
                        </ul>

                        <h2>Kategori Kurang Populer:</h2>
                        <ul>
                            @foreach ($lessPopularCategories as $category)
                                <li>{{ $category }}</li>
                            @endforeach
                        </ul>

                        <h2>Kategori Tidak Populer:</h2>
                        <ul>
                            @foreach ($leastPopularCategories as $category)
                                <li>{{ $category }}</li>
                            @endforeach
                        </ul>
                    </center>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
