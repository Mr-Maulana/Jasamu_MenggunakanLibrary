<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Service;
use Livewire\WithPagination;

class ServiceSearch extends Component
{
    public $searchTerm = '';
    public $showDetail = false;
    public $selectedServiceId = null;

    use WithPagination;

    public function render()
    {
        $services = Service::paginate(8);

        $services = [];

        if (!empty($this->searchTerm)) {
            $services = Service::where('name', 'like', '%' . $this->searchTerm . '%')
                ->orWhere('category', 'like', '%' . $this->searchTerm . '%')
                ->get();
        }

        return view('livewire.service-search', [
            'services' => $services,
        ], compact('services'));
    }
    public function showServiceDetail($serviceId)
    {
        $this->showDetail = true;
        $this->selectedServiceId = $serviceId;
    }

    public function backToIndex()
    {
        $this->showDetail = false;
        $this->selectedServiceId = null; // Tambahkan ini untuk menghapus ID layanan yang dipilih

        return redirect()->route('services.index');
    }
}
