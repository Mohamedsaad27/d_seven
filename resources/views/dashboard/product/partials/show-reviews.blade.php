<div class="reviews-container">
    <div class="review-summary">
        <div class="review-rating">{{ number_format($product->calculateRating(), 1) }}</div>
        <div class="star-rating">
            @for($i = 1; $i <= 5; $i++)
                <i class="fas fa-star{{ $i <= $product->calculateRating() ? '' : '-o' }}"></i>
            @endfor
        </div>
        <div class="text-muted mb-3">Based on {{ $product->reviews->count() }} reviews</div>
        
        <div class="rating-bars">
            @php
                $ratings = [5, 4, 3, 2, 1];
                $totalReviews = $product->reviews->count();
            @endphp
            
            @foreach($ratings as $rating)
                @php
                    $count = $product->reviews->where('rating', $rating)->count();
                    $percentage = $totalReviews > 0 ? ($count / $totalReviews) * 100 : 0;
                @endphp
                <div class="rating-bar-item d-flex align-items-center mb-2">
                    <div class="rating-label me-2">{{ $rating }} <i class="fas fa-star text-warning small"></i></div>
                    <div class="progress flex-grow-1" style="height: 8px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $percentage }}%" 
                             aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="rating-count ms-2 small">{{ $count }}</div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="reviews-list">
        <h6 class="section-title">Customer Feedback</h6>
        
        @forelse($product->reviews as $review)
        <div class="review-card">
            <div class="review-meta">
                <div>
                    <div class="review-author">{{ $review->user->name }}</div>
                    <div class="star-rating" style="font-size: 0.875rem;">
                        @for($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star{{ $i <= $review->rating ? '' : '-o' }}"></i>
                        @endfor
                    </div>
                </div>
                <div class="review-date">{{ $review->created_at->diffForHumans() }}</div>
            </div>
            <p class="mb-0">{{ $review->comment }}</p>
        </div>
        @empty
        <div class="text-center p-5 bg-light rounded">
            <i class="fas fa-comment-slash fa-3x text-muted mb-3"></i>
            <p class="mb-0">No reviews yet for this product</p>
        </div>
        @endforelse
    </div>
</div>