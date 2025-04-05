<div class="row">
    <div class="col-12">
        <h6 class="section-title">Customer Reviews</h6>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body text-center">
                <h2 class="mb-0">{{ number_format($product->calculateRating(), 1) }}</h2>
                <div class="star-rating mb-2">
                    @for($i = 1; $i <= 5; $i++)
                        <i class="fas fa-star{{ $i <= $product->calculateRating() ? '' : '-o' }}"></i>
                    @endfor
                </div>
                <p class="text-muted mb-0">{{ $product->reviews->count() }} reviews</p>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        @forelse($product->reviews as $review)
        <div class="review-card">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <div>
                    <strong>{{ $review->user->name }}</strong>
                    <div class="star-rating">
                        @for($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star{{ $i <= $review->rating ? '' : '-o' }}"></i>
                        @endfor
                    </div>
                </div>
                <small class="text-muted">{{ $review->created_at->diffForHumans() }}</small>
            </div>
            <p class="mb-0">{{ $review->comment }}</p>
        </div>
        @empty
        <div class="text-center text-muted">
            <p>No reviews yet</p>
        </div>
        @endforelse
    </div>
</div>