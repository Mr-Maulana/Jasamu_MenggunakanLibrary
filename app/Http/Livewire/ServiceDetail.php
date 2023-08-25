<?php

// ServiceDetail.php
namespace App\Http\Livewire;

use App\Models\DailyReport;
use App\Models\MonthlyReport;
use App\Models\YearlyReport;
use App\Models\Service;
use Livewire\Component;

class ServiceDetail extends Component
{
    public $serviceId;

    public function mount($serviceId)
    {
        $this->serviceId = $serviceId;
        $this->recordVisit(); // Call the function to record the visit
    }

    public function recordVisit()
    {
        $service = Service::findOrFail($this->serviceId);
        $visitorIp = request()->ip();

        // Check if the visitor has already visited this service (optional)
        $visited = $service->visits()->where('visitor_ip', $visitorIp)->exists();
        if (!$visited) {
            $service->visits()->create([
                'visitor_ip' => $visitorIp,
                'visited_at' => now(),
            ]);

            // Generate and save daily report for this service
            $dailyReport = DailyReport::generateDailyReport($this->serviceId);
            foreach ($dailyReport as $report) {
                DailyReport::saveDailyReport($this->serviceId, $report->date, $report->interactions);
            }

            // Generate and save monthly report for this service
            $monthlyReport = MonthlyReport::generateMonthlyReport($this->serviceId);
            foreach ($monthlyReport as $report) {
                MonthlyReport::saveMonthlyReport($this->serviceId, $report->year, $report->month, $report->interactions);
            }

            // Generate and save yearly report for this service
            $yearlyReport = YearlyReport::generateYearlyReport($this->serviceId);
            foreach ($yearlyReport as $report) {
                YearlyReport::create([
                    'service_id' => $this->serviceId,
                    'year' => $report->year,
                    'interactions' => $report->interactions,
                ]);
            }
        }
    }

    public function render()
    {
        $service = Service::findOrFail($this->serviceId);

        // Load daily reports for the service
        $dailyReports = DailyReport::where('service_id', $this->serviceId)->get();

        // Load monthly reports for the service
        $monthlyReports = MonthlyReport::where('service_id', $this->serviceId)->get();

        // Load yearly reports for the service
        $yearlyReports = YearlyReport::where('service_id', $this->serviceId)->get();

        return view('livewire.service-detail', compact('service', 'dailyReports', 'monthlyReports', 'yearlyReports'));
    }

    public function goBack()
    {
        return redirect()->to(route('service-index'));
    }
}
