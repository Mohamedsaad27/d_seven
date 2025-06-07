$(document).ready(function() {
    // CSRF Token Setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'X-Requested-With': 'XMLHttpRequest'
        }
    });

    // Status Update Functionality
    $('.update-status-btn').on('click', function() {
        const orderId = $(this).data('order-id');
        const newStatus = $('.status-select').val();
        const currentBadge = $('.current-status .status-badge');
        const originalStatus = currentBadge.text().toLowerCase();
        
        if (newStatus === originalStatus) {
            showNotification('info', 'Status is already set to ' + newStatus);
            return;
        }

        // Show confirmation
        if (!confirm(`Are you sure you want to change the order status to "${newStatus}"?`)) {
            return;
        }

        // Show loading state
        $(this).prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Updating...');
        
        $.ajax({
            url: `/dashboard/orders/${orderId}/status`,
            method: 'PATCH',
            data: {
                status: newStatus
            },
            success: function(response) {
                if (response.status) {
                    // Update status badge
                    currentBadge.removeClass(`status-${originalStatus}`)
                              .addClass(`status-${newStatus}`)
                              .text(newStatus.charAt(0).toUpperCase() + newStatus.slice(1));
                    
                    // Update timeline if needed
                    updateTimeline(newStatus);
                    
                    // Show success message
                    showNotification('success', response.message);
                } else {
                    showNotification('error', response.message || 'Failed to update status');
                }
            },
            error: function(xhr) {
                console.error('Status update error:', xhr);
                showNotification('error', 'Failed to update order status');
            },
            complete: function() {
                $(this).prop('disabled', false).html('Update Status');
            }
        });
    });

    // Update Timeline Based on Status
    function updateTimeline(status) {
        const timelineItems = $('.timeline-item');
        
        // Reset all items
        timelineItems.removeClass('active cancelled');
        
        // Order placed is always active
        timelineItems.eq(0).addClass('active');
        
        switch(status) {
            case 'processing':
                timelineItems.eq(1).addClass('active');
                break;
            case 'completed':
                timelineItems.eq(1).addClass('active');
                timelineItems.eq(2).addClass('active');
                break;
            case 'cancelled':
                timelineItems.eq(1).addClass('cancelled');
                break;
        }
    }

    // Delete Order Functionality
    $('.delete-order').on('click', function() {
        const orderId = $(this).data('order-id');
        
        if (!confirm('Are you sure you want to delete this order? This action cannot be undone.')) {
            return;
        }

        // Show loading state
        $(this).prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Deleting...');
        
        $.ajax({
            url: `/dashboard/orders/${orderId}`,
            method: 'DELETE',
            success: function(response) {
                if (response.status) {
                    showNotification('success', response.message);
                    
                    // Redirect to orders list after successful deletion
                    setTimeout(function() {
                        window.location.href = '/dashboard/orders';
                    }, 1500);
                } else {
                    showNotification('error', response.message || 'Failed to delete order');
                }
            },
            error: function(xhr) {
                console.error('Delete error:', xhr);
                showNotification('error', 'Failed to delete order');
            },
            complete: function() {
                $(this).prop('disabled', false).html('<i class="fas fa-trash"></i> Delete Order');
            }
        });
    });

    // Print Functionality
    window.print = function() {
        window.print();
    };

    // Send Email to Customer
    $('.quick-actions .btn:contains("Send Email")').on('click', function() {
        // You can implement email functionality here
        showNotification('info', 'Email functionality will be implemented');
    });

    // Add Order Note
    $('.quick-actions .btn:contains("Add Order Note")').on('click', function() {
        const note = prompt('Enter order note:');
        if (note && note.trim()) {
            // You can implement note functionality here
            showNotification('success', 'Order note added successfully');
        }
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

    // Enhanced interactions
    $('.order-item').hover(
        function() {
            $(this).addClass('item-hover');
        },
        function() {
            $(this).removeClass('item-hover');
        }
    );

    // Keyboard shortcuts
    $(document).on('keydown', function(e) {
        // Ctrl/Cmd + P to print
        if ((e.ctrlKey || e.metaKey) && e.key === 'p') {
            e.preventDefault();
            window.print();
        }
        
        // Ctrl/Cmd + Backspace to go back
        if ((e.ctrlKey || e.metaKey) && e.key === 'Backspace') {
            e.preventDefault();
            window.location.href = '/dashboard/orders';
        }
    });

    // Auto-save status changes
    let statusChangeTimeout;
    $('.status-select').on('change', function() {
        clearTimeout(statusChangeTimeout);
        const button = $('.update-status-btn');
        
        // Highlight the update button
        button.addClass('btn-warning').removeClass('btn-primary');
        
        statusChangeTimeout = setTimeout(function() {
            button.removeClass('btn-warning').addClass('btn-primary');
        }, 3000);
    });

    // Smooth scrolling for long pages
    $('a[href^="#"]').on('click', function(e) {
        e.preventDefault();
        const target = $($(this).attr('href'));
        if (target.length) {
            $('html, body').animate({
                scrollTop: target.offset().top - 100
            }, 500);
        }
    });

    // Image zoom functionality for product images
    $('.item-image img').on('click', function() {
        const src = $(this).attr('src');
        const modal = $(`
            <div class="modal fade" id="imageModal" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Product Image</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body text-center">
                            <img src="${src}" class="img-fluid" alt="Product Image">
                        </div>
                    </div>
                </div>
            </div>
        `);
        
        $('body').append(modal);
        modal.modal('show');
        
        modal.on('hidden.bs.modal', function() {
            modal.remove();
        });
    });

    // Copy order ID to clipboard
    $('.order-title').on('click', function() {
        const orderText = $(this).text();
        navigator.clipboard.writeText(orderText).then(function() {
            showNotification('success', 'Order ID copied to clipboard');
        }).catch(function() {
            showNotification('error', 'Failed to copy order ID');
        });
    });

    

    // Add loading states to all buttons
    $('.btn').on('click', function() {
        if (!$(this).hasClass('no-loading')) {
            const originalText = $(this).html();
            $(this).data('original-text', originalText);
            
            setTimeout(function() {
                if ($(this).data('original-text')) {
                    $(this).html($(this).data('original-text'));
                }
            }.bind(this), 2000);
        }
    });
});