@extends('layouts.dashboard.layout')
@section('title', 'Users')

@section('content')
    @include('layouts.dashboard.breadcrumb', ['component' => 'Users'])
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
            <h2 class="h3 text-gray-800 mb-0">Users</h2>
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
                                placeholder="Search Users">
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
                                <th class="px-4 py-3 text-muted">Name</th>
                                <th class="px-4 py-3 text-muted">Email</th>
                                <th class="px-4 py-3 text-muted">Email Verified At</th>
                                <th class="px-4 py-3 text-muted">Phone</th>
                                <th class="px-4 py-3 text-muted">Role</th>
                                <th class="px-4 py-3 text-muted">Status</th>
                                <th class="px-4 py-3 text-muted">Gender</th>
                                <th class="px-4 py-3 text-muted">Last Login</th>
                                <th class="px-4 py-3 text-muted">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td class="px-4">
                                        <span class="text-primary fw-medium">{{ $user->id }}</span>
                                    </td>
                                    <td class="px-4">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-3">
                                                <img src="{{ asset($user->profile_image) }}"
                                                    alt="{{ $user->name_en }}" class="rounded-circle"
                                                    style="width: 40px; height: 40px; object-fit: cover;">
                                            </div>
                                            <div>
                                                <h6 class="mb-0">{{ $user->name_en ?? 'N/A' }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4">
                                        <span class="text-muted">{{ $user->email ?? 'N/A' }}</span>
                                    </td>
                                    <td class="px-4">
                                        <span class="text-muted">{{ Carbon\Carbon::parse($user->email_verified_at)->format('Y-m-d H:i') ?? 'N/A' }}</span>
                                    </td>
                                    <td class="px-4">
                                        <span class="text-muted">{{ $user->phone ?? 'N/A' }}</span>
                                    </td>
                                    <td class="px-4">
                                        <span class="text-muted">{{ $user->role ?? 'N/A' }}</span>
                                    </td>
                                    <td class="px-4">
                                        <span class="badge bg-{{ $user->is_active ? 'success' : 'danger' }} text-white">{{ $user->is_active ? 'Active' : 'In Active' }}</span>
                                    </td>
                                    <td class="px-4">
                                        <span class="text-muted">{{ $user->gender ?? 'N/A' }}</span>
                                    </td>
                                    <td class="px-4">
                                        <span class="text-muted">{{ Carbon\Carbon::parse($user->last_login_at)->format('Y-m-d H:i') ?? 'N/A' }}</span>
                                    </td>
                                    <td class="px-4">
                                        <div class="d-flex gap-2">
                                            <button type="button" class="btn btn-sm btn-light-danger"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal{{ $user->id }}"
                                                title="Delete User">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>  
                                    
                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel">Delete User</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete this user?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('users.destroy', $user->id) }}"
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
                                    <td colspan="20" class="text-center">No users found</td>
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
            .table-responsive::-webkit-scrollbar {
    display: none; /* Safari and Chrome */
}

.table-responsive {
    -ms-overflow-style: none;  /* IE and Edge */
    scrollbar-width: none;  /* Firefox */
}
.narrow-column {
    width: 80px;
}
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
