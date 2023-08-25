<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Service;
use App\Models\Review;

class ReviewComponent extends Component
{
    public $service;
    public $comment;
    public $rating;

    public function mount(Service $service)
    {
        $this->service = $service;
    }

    public function addReview()
    {
        $this->validate([
            'comment' => 'required',
            'rating' => 'required|numeric|min:1|max:5',
        ]);

        $this->service->reviews()->create([
            'comment' => $this->comment,
            'rating' => $this->rating,
        ]);

        $this->comment = '';
        $this->rating = null;

        // Refresh the component after adding a review
        $this->render();
    }

    public function render()
    {
        return view('livewire.review-component', [
            'reviews' => $this->service->reviews()->orderByDesc('created_at')->get(),
        ]);
    }
}

