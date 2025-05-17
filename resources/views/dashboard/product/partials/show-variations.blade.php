<div class="variations-container">
    <div class="variation-card">
        <div class="d-flex align-items-center mb-3">
            <div class="variation-icon me-3">
                <i class="fas fa-palette fa-2x text-primary"></i>
            </div>
            <h6 class="mb-0">Available Colors</h6>
        </div>
        
        <div class="d-flex flex-wrap gap-2">
            @forelse($product->colors as $color)
            <div class="variation-badge d-flex align-items-center">
                <span class="color-dot me-2" style="
                    display: inline-block;
                    width: 12px;
                    height: 12px;
                    border-radius: 50%;
                    background-color: {{ $color->color->code ?? '#ccc' }};
                "></span>
                {{ $color->color->name_en }}
            </div>
            @empty
            <p class="text-muted">No colors available</p>
            @endforelse
        </div>
    </div>

    @if($product->sizes->count() > 0)
    <div class="variation-card">
        <div class="d-flex align-items-center mb-3">
            <div class="variation-icon me-3">
                <i class="fas fa-ruler fa-2x text-primary"></i>
            </div>
            <h6 class="mb-0">Available Sizes</h6>
        </div>
        <div class="d-flex flex-wrap gap-2">
            @forelse($product->sizes as $size)
            <div class="variation-badge">
                {{ $size->size->size ?? 'N/A' }}
                @if($size->additional_price > 0)
                    <span class="ms-1 text-primary">(+${{ number_format($size->additional_price, 2) }})</span>
                @endif
            </div>
            @empty
            <p class="text-muted">No sizes available</p>
            @endforelse
        </div>
    </div>
    @else
    <p class="text-muted">No sizes available</p>
    @endif
</div>