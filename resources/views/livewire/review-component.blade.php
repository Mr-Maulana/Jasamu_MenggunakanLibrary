<div class="review-form">
    <h2>Reviews</h2>

    <div class="mb-4">
        <textarea wire:model="comment" class="form-control" placeholder="Add your review"></textarea>
        @error('comment') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>

    <div class="mb-4">
    <div class="rating">
        <input type="radio" wire:model="rating" id="star1" name="rating" value="5"><label for="star1"></label>
        <input type="radio" wire:model="rating" id="star2" name="rating" value="4"><label for="star2"></label>
        <input type="radio" wire:model="rating" id="star3" name="rating" value="3"><label for="star3"></label>
        <input type="radio" wire:model="rating" id="star4" name="rating" value="2"><label for="star4"></label>
        <input type="radio" wire:model="rating" id="star5" name="rating" value="1"><label for="star5"></label>
    </div>
        @error('rating') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>


    <div class="mb-4">
        <button wire:click="addReview" class="btn btn-success">Kirim Ulasan</button>
    </div>

    <div>
        @foreach ($reviews as $review)
            <div class="mb-2 review-item">
                <strong class="review-rating">Rating: {{ $review->rating }}</strong>
                <p>{{ $review->comment }}</p>
            </div>
        @endforeach
    </div>
</div>
