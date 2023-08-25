<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Service;
use Livewire\Component;
use App\Models\YearlyReport;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;

class YearlyInteractionReport extends Component
{
    public function render()
    {
        $currentYear = Carbon::now()->year;

        // Ambil data kunjungan tahunan berdasarkan tahun saat ini
        $yearlyReports = YearlyReport::where('year', $currentYear)->get();

        $services = Service::all();
        $chart = (new ColumnChartModel())
            ->setTitle('Data Kunjungan Tahunan - ' . $currentYear);

        // Inisialisasi variabel untuk menyimpan total kunjungan tahunan
        $totalInteractionsPerYear = [];

        // Hitung total kunjungan per tahun dari data tahunan yang diperoleh
        foreach ($yearlyReports as $yearlyReport) {
            $totalInteractionsPerYear[$currentYear] = isset($totalInteractionsPerYear[$currentYear]) ? $totalInteractionsPerYear[$currentYear] + $yearlyReport->interactions : $yearlyReport->interactions;
        }

        // Jika data kunjungan tahunan kosong, inisialisasi total kunjungan untuk tahun ini sebagai 0
        if (!isset($totalInteractionsPerYear[$currentYear])) {
            $totalInteractionsPerYear[$currentYear] = 0;
        }

        // Tambahkan data total kunjungan tahunan ke dalam chart
        $chart->addColumn($currentYear, $totalInteractionsPerYear[$currentYear], '#' . substr(md5(rand()), 0, 6));

        return view('livewire.yearly-interaction-report', compact('chart', 'services', 'yearlyReports'));
    }
}
