<div class="row">
    <div class="col-12">
        <h6 class="section-title">Product Images</h6>
    </div>

    <div class="col-md-6">
        <div class="main-image-container mb-3">
            <img src="{{ asset($product->productImages->first()->image_url) }}" 
                 alt="{{ $product->name_en }}" 
                 class="product-image" 
                 id="mainImage">
        </div>
        <div class="d-flex flex-wrap gap-2">
            @foreach($product->productImages as $image)
            <img src="{{ asset($image->image_url) }}" 
                 alt="{{ $product->name_en }}"
                 class="thumbnail-image {{ $loop->first ? 'active' : '' }}"
                 onclick="updateMainImage(this)">
            @endforeach
        </div>
    </div>
</div>

<script>
function updateMainImage(thumbnail) {
    const mainImage = document.getElementById('mainImage');
    mainImage.src = thumbnail.src;
    
    // Update active state
    document.querySelectorAll('.thumbnail-image').forEach(thumb => {
        thumb.classList.remove('active');
    });
    thumbnail.classList.add('active');
}
</script>