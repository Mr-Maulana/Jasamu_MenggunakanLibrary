<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DailyReport;
use App\Models\Service; // Import model Service
use Asantibanez\LivewireCharts\Models\ColumnChartModel;

class DailyInteractionReport extends Component
{
    public function render()
    {
        $dailyReports = DailyReport::all();
        $services = Service::all();
        $chart = (new ColumnChartModel())
            ->setTitle('Data Kunjungan');

        // Sum interactions for each day and store it in an array
        $interactionsPerDay = [];
        foreach ($dailyReports as $dailyReport) {
            $date = $dailyReport->created_at->format('d M');
            if (isset($interactionsPerDay[$date])) {
                $interactionsPerDay[$date] += $dailyReport->interactions;
            } else {
                $interactionsPerDay[$date] = $dailyReport->interactions;
            }
        }

        // Add the data to the chart
        foreach ($interactionsPerDay as $date => $interactions) {
            $chart->addColumn($date, $interactions, '#' . substr(md5(rand()), 0, 6));
        }

        // Get interactions per service
        $interactionsPerService = [];
        foreach ($services as $service) {
            $interactionsPerService[$service->name] = 0;
        }

        foreach ($dailyReports as $dailyReport) {
            $interactionsPerService[$dailyReport->service->name] += $dailyReport->interactions;
        }

        return view('livewire.daily-interaction-report', compact('chart', 'dailyReports', 'interactionsPerService'));
    }
}
