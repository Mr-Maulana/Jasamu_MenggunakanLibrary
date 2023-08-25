<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Service;
use Livewire\WithPagination;

class ServiceIndex extends Component
{
    public $showCreateForm = false;
    public $showDetail = false;
    public $selectedServiceId = null; // Tambahkan variabel ini

    use WithPagination;

    public function render()
    {
        $services = Service::paginate(8);

        return view('livewire.service-index', compact('services'));
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
    public function deleteService($serviceId)
    {
        $service = Service::findOrFail($serviceId);
        $service->delete();

        session()->flash('success', 'Service berhasil dihapus.');
    }
}