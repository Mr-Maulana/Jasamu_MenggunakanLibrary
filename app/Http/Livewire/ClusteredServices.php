<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ClusteringController;
use Livewire\Component;
use App\Models\Service;

class ClusteredServices extends Component
{
    public $mostPopularCategories;
    public $popularCategories;
    public $lessPopularCategories;
    public $leastPopularCategories;
    public $services;

    public $showCreateForm = false;
    public $showDetail = false;
    public $selectedServiceId = null;

    public function mount()
    {
        $clusteringController = new ClusteringController();
        $clusteringResults = $clusteringController->clusterServices();

        $this->services = $clusteringResults['services'];
        $this->mostPopularCategories = $clusteringResults['mostPopularCategories'];
        $this->popularCategories = $clusteringResults['popularCategories'];
        $this->lessPopularCategories = $clusteringResults['lessPopularCategories'];
        $this->leastPopularCategories = $clusteringResults['leastPopularCategories'];
    }

    public function render()
    {
        return view('livewire.clustered-services');
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
