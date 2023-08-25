<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Service;

class CreateService extends Component
{
    public $name;
    public $category;
    public $image;
    public $contact;
    public $description;

    // Daftar opsi kategori
    public $categories = [
        "Perawatan Rumah Tangga dan Gedung",
        "Bisnis dan Ekonomi",
        "Kesehatan dan Keuangan",
        "Transportasi dan Travelling",
        "Pendidikan dan Pelatihan",
        "Perawatan Barang dan Kendaraan",
        "Dokumen dan Percetakan",
        "Jasa Kreatif dan Multimedia",
        "Fashion dan Aksesoris",
        "Penitipan dan Penyewaan",
        "Event dan Advertising",
        "Agrikultur dan Pertambangan",
        "Konsultan dan Bimbingan",
        "Everything Else"
    ];

    public function render()
    {
        return view('livewire.create-service');
    }

    public function createService()
    {
        // Validasi data input
        $validatedData = $this->validate([
            'name' => 'required',
            'category' => 'required',
            'image' => 'required',
            'contact' => 'required',
            'description' => 'required',
        ]);

        // Simpan data ke dalam tabel services
        Service::create([
            'name' => $validatedData['name'],
            'category' => $this->category,
            'image' => $validatedData['image'],
            'contact' => $validatedData['contact'],
            'description' => $validatedData['description'],
        ]);

        // Reset input setelah penyimpanan
        $this->reset();

        session()->flash('message', 'Service created successfully.');

        return redirect()->to('/services');
    }
}
