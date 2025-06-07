document.addEventListener('DOMContentLoaded', function() {
    // CSRF Token Setup
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    // Form elements
    const checkoutForm = document.getElementById('checkoutForm');
    const shippingSelect = document.getElementById('shipping_zone_id');
    const submitBtn = checkoutForm.querySelector('.btn-checkout');
    const checkoutText = submitBtn.querySelector('.checkout-text');
    const checkoutSpinner = submitBtn.querySelector('.checkout-spinner');
    
    // Modal elements
    const firstOrderModal = new bootstrap.Modal(document.getElementById('firstOrderModal'));
    const successModal = new bootstrap.Modal(document.getElementById('successModal'));
    
    // Calculate shipping cost when zone changes
    shippingSelect.addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const shippingCost = selectedOption.dataset.cost || 0;
        
        updateShippingCost(parseFloat(shippingCost));
    });
    
    // Update shipping cost in summary
    function updateShippingCost(cost) {
        const shippingElement = document.querySelector('.shipping-cost');
        const totalElement = document.querySelector('.total-amount');
        
        if (shippingElement && totalElement) {
            // Update shipping cost display
            shippingElement.textContent = cost > 0 ? `${cost} EGP` : 'Free';
            
            // Calculate new total
            const subtotal = parseFloat(document.querySelector('.subtotal').textContent.replace(' EGP', ''));
            const discount = parseFloat(document.querySelector('.discount').textContent.replace('-', '').replace(' EGP', ''));
            const newTotal = subtotal - discount + cost;
            
            totalElement.textContent = `${newTotal.toFixed(2)} EGP`;
        }
    }
    
    // Handle form submission
    checkoutForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Validate form
        if (!validateForm()) {
            return;
        }
        
        // Show loading state
        showLoadingState();
        
        // Prepare form data
        const formData = new FormData(this);
        
        // Submit order
        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            hideLoadingState();
            
            if (data.status) {
                // Success - show appropriate modal
                if (data.is_first_order) {
                    showFirstOrderModal(data);
                } else {
                    showSuccessModal(data);
                }
            } else {
                // Error
                showError(data.message || 'حدث خطأ أثناء إنشاء الطلب');
                
                if (data.errors) {
                    showValidationErrors(data.errors);
                }
            }
        })
        .catch(error => {
            hideLoadingState();
            console.error('Checkout error:', error);
            showError('حدث خطأ في الاتصال. يرجى المحاولة مرة أخرى');
        });
    });
    
    // Validate form
    function validateForm() {
        const shippingZone = document.getElementById('shipping_zone_id').value;
        const termsAccepted = document.getElementById('terms').checked;
        
        if (!shippingZone) {
            showError('يرجى اختيار منطقة الشحن');
            document.getElementById('shipping_zone_id').focus();
            return false;
        }
        
        if (!termsAccepted) {
            showError('يرجى الموافقة على الشروط والأحكام');
            document.getElementById('terms').focus();
            return false;
        }
        
        return true;
    }
    function handleNavigation(url) {
    // Close modal first, then navigate
    const modal = bootstrap.Modal.getInstance(document.querySelector('.modal'));
    if (modal) {
        modal.hide();
    }
    setTimeout(() => {
        window.location.href = url;
    }, 300); // Wait for modal to close
}
    // Show loading state
    function showLoadingState() {
        submitBtn.disabled = true;
        checkoutText.classList.add('d-none');
        checkoutSpinner.classList.remove('d-none');
    }
    
    // Hide loading state
    function hideLoadingState() {
        submitBtn.disabled = false;
        checkoutText.classList.remove('d-none');
        checkoutSpinner.classList.add('d-none');
    }
    
    // Show first order modal
    function showFirstOrderModal(data) {
        document.getElementById('orderNumber').textContent = `#${data.order_id}`;
        document.getElementById('orderTotal').textContent = `${data.total_price} EGP`;
        
        // Set up view order button
        const viewOrderBtn = document.getElementById('viewOrderBtn');
        viewOrderBtn.onclick = function() {
            handleNavigation(`/orders/${data.order_id}`);
        };
        
        firstOrderModal.show();
    }
    
    // Show success modal
    function showSuccessModal(data) {
        document.getElementById('regularOrderNumber').textContent = `#${data.order_id}`;
        document.getElementById('regularOrderTotal').textContent = `${data.total_price} EGP`;
        
        // Set up view order button
        const viewRegularOrderBtn = document.getElementById('viewRegularOrderBtn');
        viewRegularOrderBtn.onclick = function() {
            handleNavigation(`/orders/${data.order_id}`);
        };
        
        successModal.show();
    }
    
    // Show error message
    function showError(message) {
        // You can replace this with your preferred notification system
        if (typeof toastr !== 'undefined') {
            toastr.error(message);
        } else {
            alert(message);
        }
    }
    
    // Show validation errors
    function showValidationErrors(errors) {
        if (Array.isArray(errors)) {
            errors.forEach(error => showError(error));
        } else if (typeof errors === 'object') {
            Object.values(errors).forEach(errorArray => {
                if (Array.isArray(errorArray)) {
                    errorArray.forEach(error => showError(error));
                }
            });
        }
    }
    
    // Handle modal close events
    document.getElementById('firstOrderModal').addEventListener('hidden.bs.modal', function() {
        // Redirect to home or products page
        handleNavigation('/');
    });
    
    document.getElementById('successModal').addEventListener('hidden.bs.modal', function() {
        // Redirect to home or products page
        handleNavigation('/');
    });
    
    // Continue shopping buttons
    document.querySelectorAll('[data-bs-dismiss="modal"]').forEach(button => {
        if (button.textContent.includes('Continue Shopping')) {
            button.addEventListener('click', function() {
                handleNavigation('/product');
            });
        }
    });
    
    // Auto-focus first form field
    const firstInput = checkoutForm.querySelector('select, input[type="text"], textarea');
    if (firstInput && !firstInput.hasAttribute('readonly')) {
        firstInput.focus();
    }
    
    // Form validation styling
    const formControls = checkoutForm.querySelectorAll('.form-control');
    formControls.forEach(control => {
        control.addEventListener('blur', function() {
            if (this.hasAttribute('required') && !this.value.trim()) {
                this.classList.add('is-invalid');
            } else {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
            }
        });
        
        control.addEventListener('input', function() {
            if (this.classList.contains('is-invalid') && this.value.trim()) {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
            }
        });
    });
    
    // Initialize shipping cost calculation
    if (shippingSelect.selectedIndex > 0) {
        const selectedOption = shippingSelect.options[shippingSelect.selectedIndex];
        const shippingCost = selectedOption.dataset.cost || 0;
        updateShippingCost(parseFloat(shippingCost));
    }
});