<div>
    <br>
    <div>
        @foreach ($popularCategories as $category)
            <div>
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2 text-center">{{ $category }}</div>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        @php
                            $rankedServices = array_filter($services, function($service) use ($category) {
                                return $service['category'] === $category;
                            });
                            usort($rankedServices, function($a, $b) {
                                $aRank = ($a['normalized_rating'] + $a['normalized_interactions']) / 2;
                                $bRank = ($b['normalized_rating'] + $b['normalized_interactions']) / 2;
                                return $bRank - $aRank;
                            });
                        @endphp
                        @foreach ($rankedServices as $service)
                            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                                <br>
                                <div class="px-6 py-4">
                                    <div class="font-bold text-xl mb-2">{{ $service['name'] }}</div>
                                    <p class="text-gray-700 text-base">{{ $service['category'] }}</p>
                                </div>
                                <div class="px-6 py-4">
                                    <center>
                                        <a href="#" wire:click="showServiceDetail({{ $service['id'] }})" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Detail</a>
                                    </center>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <br>
        @endforeach
    </div>
</div>
