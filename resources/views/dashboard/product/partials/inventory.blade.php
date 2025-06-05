<div class="row mb-4">
    <div class="col-12">
        <h5 class="section-title mb-3 text-primary">
            <i class="fas fa-boxes me-2"></i>Inventory Management
        </h5>
    </div>

    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th class="ps-3">Color</th>
                                <th>Quantity</th>
                                <th class="text-end pe-3">Action</th>
                            </tr>
                        </thead>
                        <tbody id="inventoryTableBody" class="border-top-0">
                            @if(isset($inventory) && count($inventory) > 0)
                                @foreach($inventory as $item)
                                    <tr>
                                        <td class="ps-3">
                                            <select name="inventory_colors[]" class="form-select shadow-none" >
                                                <option value="" disabled>Select Color</option>
                                                @foreach($colors as $color)
                                                    <option value="{{ $color->id }}" {{ $color->id == $item['color_id'] ? 'selected' : '' }}>
                                                        {{ $color->name_en }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="quantities[]" class="form-control shadow-none" placeholder="0"
                                                value="{{ $item['quantity'] }}" min="0" >
                                        </td>
                                        <td class="text-end pe-3">
                                            <button type="button" class="btn btn-outline-danger btn-sm delete-row rounded-circle">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="ps-3">
                                        <select name="inventory_colors[]" class="form-select shadow-none" >
                                            <option value="" disabled selected>Select Color</option>
                                            @foreach($colors as $color)
                                                <option value="{{ $color->id }}">{{ $color->name_en }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" placeholder="0" name="quantities[]" class="form-control shadow-none" min="0" >
                                    </td>
                                    <td class="text-end pe-3">
                                        <button type="button" class="btn btn-outline-danger btn-sm delete-row rounded-circle">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-outline-primary btn-sm mt-2" id="addInventoryRow">
                        <i class="fas fa-plus-circle me-1"></i> Add Color Variant
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<template id="inventoryRowTemplate">
    <tr>
        <td class="ps-3">
            <select name="inventory_colors[]" class="form-select shadow-none" >
                <option value="" disabled selected>Select Color</option>
                @foreach($colors as $color)
                    <option value="{{ $color->id }}">{{ $color->name_en }}</option>
                @endforeach
            </select>
        </td>
        <td>
            <input type="number" name="quantities[]" class="form-control shadow-none" placeholder="0" min="0" >
        </td>
        <td class="text-end pe-3">
            <button type="button" class="btn btn-outline-danger btn-sm delete-row rounded-circle">
                <i class="fas fa-trash-alt"></i>
            </button>
        </td>
    </tr>
</template>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const addInventoryRowBtn = document.getElementById('addInventoryRow');
        const inventoryTableBody = document.getElementById('inventoryTableBody');
        const template = document.getElementById('inventoryRowTemplate');

        // Add new row
        addInventoryRowBtn.addEventListener('click', function () {
            const newRow = template.content.cloneNode(true);
            inventoryTableBody.appendChild(newRow);
        });

        // Delete row
        inventoryTableBody.addEventListener('click', function (e) {
            if (e.target.closest('.delete-row')) {
                e.target.closest('tr').remove();
            }
        });
    });
</script>
