@extends('layouts.dashboard.layout')
@section('title', 'Categories')

@section('content')
    @include('layouts.dashboard.breadcrumb', ['component' => 'Categories'])
    @if (session('success'))
        <script>
            iziToast.success({
                title: 'Success',
                message: '{{ session('success') }}',
                position: 'topRight'
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            iziToast.error({
                title: 'Error',
                message: '{{ session('error') }}',
                position: 'topRight'
            });
        </script>
    @endif
    <div class="container-fluid px-4">
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h3 text-gray-800 mb-0">Categories</h2>
            <a href="{{ route('category.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Add Category
            </a>
        </div>

        <!-- Main Card -->
        <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
            <div class="card-header bg-white py-3">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0">
                                <i class="fas fa-search text-muted"></i>
                            </span>
                            <input type="text" class="form-control border-0 bg-light"
                                placeholder="Search Categories">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="px-4 py-3 text-muted">#</th>
                                <th class="px-4 py-3 text-muted">Category</th>
                                <th class="px-4 py-3 text-muted">Description</th>
                                <th class="px-4 py-3 text-muted">Image</th>
                                <th class="px-4 py-3 text-muted">Status</th>
                                <th class="px-4 py-3 text-muted">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td class="px-4">
                                        <span class="text-primary fw-medium">{{ $category->id }}</span>
                                    </td>
                                    <td class="px-4">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-3">
                                                <img src="{{ asset($category->image) }}"
                                                    alt="{{ $category->name_en }}" class="rounded-circle"
                                                    style="width: 40px; height: 40px; object-fit: cover;">
                                            </div>
                                            <div>
                                                <h6 class="mb-0">{{ $category->name_en ?? 'N/A' }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4">
                                        <div class="d-flex flex-column">
                                            <span class="text-dark">
                                                {{ $category->description_en ?? 'N/A' }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-4">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-3">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal{{ $category->id }}">
                                                    <img src="{{ asset($category->image) }}"
                                                        alt="{{ $category->name_en }}" class="rounded-circle"
                                                        style="width: 40px; height: 40px; object-fit: cover;">
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <!-- Image Modal -->
                                    <div class="modal fade" id="imageModal{{ $category->id }}" tabindex="-1"
                                        aria-labelledby="imageModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body text-center">
                                                    <img src="{{ asset($category->image) }}"
                                                        alt="{{ $category->name_en }}" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <td class="px-4">
                                        <div class="d-flex flex-column">
                                            <span class="text-dark">
                                                @if($category->is_active === 1)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-4">
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('category.show', $category->id) }}"
                                                class="btn btn-sm btn-light-primary" data-bs-toggle="tooltip"
                                                title="Show Category">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                                <a href="{{ route('category.edit', $category->id) }}"
                                                class="btn btn-sm btn-light-primary" data-bs-toggle="tooltip"
                                                title="Edit Category">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-light-danger"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal{{ $category->id }}"
                                                title="Delete Category">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>  
                                    
                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModal{{ $category->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete this category?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('category.destroy', $category->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No categories found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add required CSS -->
    @push('styles')
        <style>
            .btn-light-primary {
                color: #556ee6;
                background-color: rgba(85, 110, 230, 0.1);
                border-color: transparent;
            }

            .btn-light-primary:hover {
                color: #fff;
                background-color: #556ee6;
            }

            .btn-light-danger {
                color: #f46a6a;
                background-color: rgba(244, 106, 106, 0.1);
                border-color: transparent;
            }

            .btn-light-danger:hover {
                color: #fff;
                background-color: #f46a6a;
            }

            .avatar-sm {
                width: 40px;
                height: 40px;
            }

            .table> :not(caption)>*>* {
                padding: 1rem 0.75rem;
            }

            .modal-content {
                box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
            }
        </style>
    @endpush
    
@endsection
