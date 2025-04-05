<div class="row mb-4">
    <div class="col-12">
        <h6 class="section-title">Inventory Management</h6>
    </div>

    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Color</th>
                        <th>Size</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody id="inventoryTableBody">
                    <tr>
                        <td>
                            <select name="inventory_colors[]" class="form-select" required>
                                <option value="" disabled selected>Select Color</option>
                                @foreach($colors as $color)
                                    <option value="{{ $color->id }}">{{ $color->name_en }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select name="inventory_sizes[]" class="form-select" required>
                                <option value="" disabled selected>Select Size</option>
                                @foreach($sizes as $size)
                                    <option value="{{ $size->id }}">{{ $size->size }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="number" placeholder="Quantity" name="quantities[]" class="form-control" min="0" required>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button type="button" class="btn btn-secondary btn-sm mt-3" id="addInventoryRow">Add More Combinations</button>
        </div>
    </div>
</div>
<script>

    document.addEventListener('DOMContentLoaded', function() {
        const addInventoryRowBtn = document.getElementById('addInventoryRow');
        const inventoryTableBody = document.getElementById('inventoryTableBody');
    
        function updateInventoryTable() {
            const sizes = Array.from(document.querySelectorAll('input[name="sizes[]"]')).map(input => input.value).filter(Boolean);
    
            const sizeSelects = document.querySelectorAll('select[name="inventory_sizes[]"]');
            sizeSelects.forEach(select => {
                const currentValue = select.value;
                select.innerHTML = '<option value="">Select Size</option>';
                sizes.forEach(size => {
                    const option = new Option(size, size);
                    select.add(option);
                });
                select.value = currentValue;
            });

        }
    
        addInventoryRowBtn.addEventListener('click', function() {
            const newRow = `
                <tr>
                    <td>
                        <select name="inventory_colors[]" class="form-select" required>
                            @foreach($colors as $color)
                                <option value="{{ $color->id }}">{{ $color->name_en }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select name="inventory_sizes[]" class="form-select" required>
                            @foreach($sizes as $size)
                                <option value="{{ $size->id }}">{{ $size->size }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="number" name="quantities[]" class="form-control" placeholder="Quantity" min="0" required>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm delete-row">Delete</button>
                    </td>
                </tr>
            `;
            inventoryTableBody.insertAdjacentHTML('beforeend', newRow);
            updateInventoryTable();
        });
    
        // Update inventory table when colors or sizes change
        document.addEventListener('input', function(e) {
            if (e.target.matches('input[name="colors[]"]') || e.target.matches('input[name="sizes[]"]')) {
                updateInventoryTable();
            }
        });

        // Delete row functionality
        inventoryTableBody.addEventListener('click', function(e) {
            if (e.target.classList.contains('delete-row')) {
                e.target.closest('tr').remove();
                updateInventoryTable();
            }
        });
    });
</script>