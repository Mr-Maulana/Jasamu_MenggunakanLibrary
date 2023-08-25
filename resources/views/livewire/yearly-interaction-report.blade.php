<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                
                <div class="mt-8 text-l">
                <h1><center>Report Analisis</center></h1>
                <br>
                <center><h1>
                <x-nav-link  href="{{ route('daily-interaction') }}" :active="request()->routeIs('daily-interaction')">
                        {{ __('Daily') }}
                </x-nav-link>
                <x-nav-link  href="{{ route('monthly-interaction') }}" :active="request()->routeIs('daily-interaction')">
                        {{ __('Monthly') }}
                    </x-nav-link>
                <x-nav-link  href="{{ route('yearly-interaction') }}" :active="request()->routeIs('daily-interaction')">
                        {{ __('Yearly') }}
                </x-nav-link>
                </h1>
                </center>
                <div>
                        <div style="height: 32rem;">
                            <livewire:livewire-column-chart
                            :column-chart-model="$chart"
                        />
                        </div>
                    <center>
                        <table>
                            <thead>
                                <tr>
                                    <th>Service</th>
                                    <th>Kunjungan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $service)
                                    <tr>
                                        <td>{{ $service->name }}</td>
                                        <td><center>
                                            @php
                                                $totalInteractions = $yearlyReports->where('service_id', $service->id)->sum('interactions');
                                            @endphp
                                            {{ $totalInteractions }}
                                        </center></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


