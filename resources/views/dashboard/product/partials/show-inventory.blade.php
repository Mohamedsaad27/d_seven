<div class="row">
    <div class="col-12">
        <h6 class="section-title">Inventory Status</h6>
    </div>

    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-bordered inventory-table">
                <thead>
                    <tr>
                        <th>Color</th>
                        <th>Size</th>
                        <th>Quantity</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($product->inventory as $item)
                    <tr>
                        <td>{{ $item->productColor->name_en ?? 'N/A' }}</td>
                        <td>{{ $item->productSize->size ?? 'N/A' }}</td>
                        <td>{{ $item->quantity ?? '0' }}</td>
                        <td>
                            @if($item->quantity > 10)
                                <span class="badge bg-success">In Stock</span>
                            @elseif($item->quantity > 0)
                                <span class="badge bg-warning">Low Stock</span>
                            @else
                                <span class="badge bg-danger">Out of Stock</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>