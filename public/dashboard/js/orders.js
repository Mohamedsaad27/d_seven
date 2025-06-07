$(document).ready(function() {
    // CSRF Token Setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'X-Requested-With': 'XMLHttpRequest'
        }
    });

    // Select All Functionality
    $('#selectAll').on('change', function() {
        const isChecked = $(this).is(':checked');
        $('.order-checkbox').prop('checked', isChecked);
        toggleBulkActions();
    });

    // Individual Checkbox Change
    $(document).on('change', '.order-checkbox', function() {
        const totalCheckboxes = $('.order-checkbox').length;
        const checkedCheckboxes = $('.order-checkbox:checked').length;
        
        $('#selectAll').prop('checked', totalCheckboxes === checkedCheckboxes);
        toggleBulkActions();
    });

    // Toggle Bulk Actions Visibility
    function toggleBulkActions() {
        const checkedCount = $('.order-checkbox:checked').length;
        if (checkedCount > 0) {
            $('#bulkDeleteBtn').show();
            $('#selectedCount').text(checkedCount);
        } else {
            $('#bulkDeleteBtn').hide();
        }
    }

    // Status Update Functionality
    $(document).on('change', '.status-select', function() {
        const orderId = $(this).data('order-id');
        const newStatus = $(this).val();
        const statusBadge = $(this).siblings('.status-badge');
        const originalStatus = statusBadge.attr('class').match(/status-(\w+)/)[1];
        
        // Show confirmation
        if (!confirm(`Are you sure you want to change the order status to "${newStatus}"?`)) {
            $(this).val(originalStatus);
            return;
        }

        // Show loading state
        $(this).prop('disabled', true);
        
        $.ajax({
            url: `/dashboard/orders/${orderId}/status`,
            method: 'PATCH',
            data: {
                status: newStatus
            },
            success: function(response) {
                if (response.status) {
                    // Update status badge
                    statusBadge.removeClass(`status-${originalStatus}`)
                              .addClass(`status-${newStatus}`)
                              .text(newStatus.charAt(0).toUpperCase() + newStatus.slice(1));
                    
                    // Show success message
                    showNotification('success', response.message);
                } else {
                    showNotification('error', response.message || 'Failed to update status');
                    // Revert select value
                    $(this).val(originalStatus);
                }
            },
            error: function(xhr) {
                console.error('Status update error:', xhr);
                showNotification('error', 'Failed to update order status');
                // Revert select value
                $(this).val(originalStatus);
            },
            complete: function() {
                $(this).prop('disabled', false);
            }
        });
    });

    // Status Badge Click to Show Select
    $(document).on('click', '.status-badge', function() {
        const container = $(this).parent();
        const select = container.find('.status-select');
        
        $(this).hide();
        select.show().focus();
    });

    // Hide select on blur
    $(document).on('blur', '.status-select', function() {
        const container = $(this).parent();
        const badge = container.find('.status-badge');
        
        $(this).hide();
        badge.show();
    });

    // Delete Single Order
    $(document).on('click', '.delete-order', function() {
        const orderId = $(this).data('order-id');
        const row = $(this).closest('tr');
        
        if (!confirm('Are you sure you want to delete this order? This action cannot be undone.')) {
            return;
        }

        // Show loading state
        $(this).prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i>');
        
        $.ajax({
            url: `/dashboard/orders/${orderId}`,
            method: 'DELETE',
            success: function(response) {
                if (response.status) {
                    // Animate row removal
                    row.fadeOut(300, function() {
                        $(this).remove();
                        
                        // Check if table is empty
                        if ($('.orders-table tbody tr').length === 0) {
                            location.reload();
                        }
                    });
                    
                    showNotification('success', response.message);
                } else {
                    showNotification('error', response.message || 'Failed to delete order');
                }
            },
            error: function(xhr) {
                console.error('Delete error:', xhr);
                showNotification('error', 'Failed to delete order');
            },
            complete: function() {
                $(this).prop('disabled', false).html('<i class="fas fa-trash"></i>');
            }
        });
    });

    // Bulk Delete Button
    $('#bulkDeleteBtn').on('click', function() {
        const selectedIds = $('.order-checkbox:checked').map(function() {
            return $(this).val();
        }).get();

        if (selectedIds.length === 0) {
            showNotification('warning', 'Please select orders to delete');
            return;
        }

        $('#bulkActionForm select[name="action"]').val('delete');
        $('#bulkActionModal').modal('show');
    });

    // Bulk Action Form
    $('#bulkActionForm select[name="action"]').on('change', function() {
        const action = $(this).val();
        if (action === 'update_status') {
            $('#statusGroup').show();
        } else {
            $('#statusGroup').hide();
        }
    });

    // Execute Bulk Action
    $('#executeBulkAction').on('click', function() {
        const action = $('#bulkActionForm select[name="action"]').val();
        const status = $('#bulkActionForm select[name="status"]').val();
        const selectedIds = $('.order-checkbox:checked').map(function() {
            return $(this).val();
        }).get();

        if (!action) {
            showNotification('warning', 'Please select an action');
            return;
        }

        if (action === 'update_status' && !status) {
            showNotification('warning', 'Please select a status');
            return;
        }

        if (selectedIds.length === 0) {
            showNotification('warning', 'No orders selected');
            return;
        }

        // Confirmation
        const actionText = action === 'delete' ? 'delete' : `update status to ${status} for`;
        if (!confirm(`Are you sure you want to ${actionText} ${selectedIds.length} selected orders?`)) {
            return;
        }

        // Show loading state
        $(this).prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Processing...');
        
        $.ajax({
            url: '/dashboard/orders/bulk-action',
            method: 'POST',
            data: {
                action: action,
                status: status,
                order_ids: selectedIds
            },
            success: function(response) {
                if (response.status) {
                    $('#bulkActionModal').modal('hide');
                    showNotification('success', response.message);
                    
                    // Reload page after successful bulk action
                    setTimeout(function() {
                        location.reload();
                    }, 1500);
                } else {
                    showNotification('error', response.message || 'Bulk action failed');
                }
            },
            error: function(xhr) {
                console.error('Bulk action error:', xhr);
                showNotification('error', 'Bulk action failed');
            },
            complete: function() {
                $(this).prop('disabled', false).html('Execute');
            }
        });
    });

    // Export Orders
    window.exportOrders = function() {
        const params = new URLSearchParams(window.location.search);
        
        showNotification('info', 'Export functionality will be implemented soon');
        
        // You can implement actual export here
        // window.location.href = '/dashboard/orders/export?' + params.toString();
    };

    // Reset Bulk Action Modal
    $('#bulkActionModal').on('hidden.bs.modal', function() {
        $('#bulkActionForm')[0].reset();
        $('#statusGroup').hide();
        $('#executeBulkAction').prop('disabled', false).html('Execute');
    });

    // Notification Function
    function showNotification(type, message) {
        // You can replace this with your preferred notification system
        if (typeof toastr !== 'undefined') {
            toastr[type](message);
        } else {
            alert(message);
        }
    }

    // Auto-refresh functionality (optional)
    let autoRefreshInterval;
    
    function startAutoRefresh() {
        autoRefreshInterval = setInterval(function() {
            // Only refresh if no modals are open and no forms are being submitted
            if (!$('.modal').hasClass('show') && !$('form').hasClass('submitting')) {
                location.reload();
            }
        }, 30000); // Refresh every 30 seconds
    }

    function stopAutoRefresh() {
        if (autoRefreshInterval) {
            clearInterval(autoRefreshInterval);
        }
    }

    // Start auto-refresh (uncomment if needed)
    // startAutoRefresh();

    // Stop auto-refresh when user is interacting
    $(document).on('focus', 'input, select, textarea', function() {
        stopAutoRefresh();
    });

    // Restart auto-refresh after interaction
    $(document).on('blur', 'input, select, textarea', function() {
        setTimeout(function() {
            // startAutoRefresh();
        }, 5000);
    });

    // Search functionality enhancement
    let searchTimeout;
    $('input[name="search"]').on('input', function() {
        clearTimeout(searchTimeout);
        const searchTerm = $(this).val();
        
        searchTimeout = setTimeout(function() {
            if (searchTerm.length >= 3 || searchTerm.length === 0) {
                // Auto-submit form after 500ms of no typing
                $('form.filters-form').submit();
            }
        }, 500);
    });

    // Enhanced table interactions
    $('.orders-table tbody tr').hover(
        function() {
            $(this).addClass('table-hover-highlight');
        },
        function() {
            $(this).removeClass('table-hover-highlight');
        }
    );

    // Keyboard shortcuts
    $(document).on('keydown', function(e) {
        // Ctrl/Cmd + A to select all
        if ((e.ctrlKey || e.metaKey) && e.key === 'a' && !$(e.target).is('input, textarea')) {
            e.preventDefault();
            $('#selectAll').prop('checked', true).trigger('change');
        }
        
        // Delete key to delete selected
        if (e.key === 'Delete' && $('.order-checkbox:checked').length > 0) {
            $('#bulkDeleteBtn').click();
        }
        
        // Escape to clear selection
        if (e.key === 'Escape') {
            $('#selectAll').prop('checked', false).trigger('change');
        }
    });
});