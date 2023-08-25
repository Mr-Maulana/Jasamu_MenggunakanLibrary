<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserCountReport extends Component
{
    public function render()
    {
        // Simulate chart data
        $userCountChartData = [
            'labels' => ['January', 'February', 'March', 'April', 'May'],
            'datasets' => [
                [
                    'label' => 'User Count',
                    'data' => [100, 200, 150, 300, 250],
                    'backgroundColor' => 'rgba(255, 99, 132, 0.5)',
                ],
            ],
        ];

        $this->dispatchBrowserEvent('userCountChart', $userCountChartData);

        return view('livewire.user-count-report');
    }
}
