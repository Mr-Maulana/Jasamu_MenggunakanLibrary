<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Service;
use Livewire\Component;
use App\Models\MonthlyReport;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;

class MonthlyInteractionReport extends Component
{
    public function render()
    {
        // Ambil data kunjungan bulanan dari semua layanan
        $monthlyReports = MonthlyReport::all();

        $chart = (new ColumnChartModel())
            ->setTitle('Data Kunjungan Bulanan - ' . Carbon::now()->format('F Y'));

        // Inisialisasi variabel untuk menyimpan total kunjungan per bulan
        $totalInteractionsPerMonth = [];

        // Inisialisasi variabel untuk menyimpan daftar layanan
        $services = Service::all();

        // Hitung total kunjungan per bulan dari data bulanan yang diperoleh
        foreach ($monthlyReports as $monthlyReport) {
            $monthLabel = Carbon::create($monthlyReport->year, $monthlyReport->month)->format('F Y');
            if (isset($totalInteractionsPerMonth[$monthLabel])) {
                $totalInteractionsPerMonth[$monthLabel][$monthlyReport->service->name] = $monthlyReport->interactions;
            } else {
                $totalInteractionsPerMonth[$monthLabel] = [$monthlyReport->service->name => $monthlyReport->interactions];
            }
        }

        // Tambahkan data total kunjungan per bulan ke dalam chart
        foreach ($totalInteractionsPerMonth as $monthLabel => $interactionsPerService) {
            $chart->addColumn($monthLabel, array_sum($interactionsPerService), '#' . substr(md5(rand()), 0, 6));
        }

        return view('livewire.monthly-interaction-report', compact('chart', 'services', 'totalInteractionsPerMonth'));
    }
}
