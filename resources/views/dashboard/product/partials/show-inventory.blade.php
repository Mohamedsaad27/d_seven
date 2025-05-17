<div class="inventory-section">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h6 class="section-title mb-0">Stock Information</h6>
        <div class="inventory-summary">
            <span class="badge bg-info rounded-pill">
                {{ $product->inventory->sum('quantity') }} Total Items
            </span>
        </div>
    </div>

    <div class="table-responsive">
        <table class="inventory-table">
            <thead>
                <tr>
                    <th>Color</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($product->inventory as $item)
                <tr>
                    <td>
                        {{ $item->color->name_en ?? 'N/A' }}
                    </td>
                    <td class="text-center"> 
                        <span class="fw-medium">{{ $item->quantity ?? '0' }}</span>
                    </td>
                    <td class="text-center">
                        @if($item->quantity > 10)
                            <span class="badge bg-success">In Stock</span>
                        @elseif($item->quantity > 0)
                            <span class="badge bg-warning">Low Stock</span>
                        @else
                            <span class="badge bg-danger">Out of Stock</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center py-4">
                        <div class="text-muted">No inventory data available</div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>