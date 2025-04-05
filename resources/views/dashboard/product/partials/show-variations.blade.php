<div class="row">
    <div class="col-12">
        <h6 class="section-title">Product Variations</h6>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h6 class="mb-3">Available Colors</h6>
                <div class="d-flex flex-wrap">
                    @foreach($product->colors as $color)
                    <span class="variation-badge bg-light text-dark">
                        {{ $color->color->name_en }}
                    </span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h6 class="mb-3">Available Sizes</h6>
                <div class="d-flex flex-wrap">
                    @foreach($product->sizes as $size)
                    <span class="variation-badge bg-light text-dark">
                        {{ $size->size->size }}
                        @if($size->additional_price > 0)
                            <small class="text-muted">(+${{ number_format($size->additional_price, 2) }})</small>
                        @endif
                    </span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>