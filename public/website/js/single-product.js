document.addEventListener('DOMContentLoaded', function() {
    // Product Gallery
    const currentImage = document.getElementById('currentImage');
    const thumbnails = document.querySelectorAll('.thumbnail');
    
    thumbnails.forEach(thumbnail => {
        thumbnail.addEventListener('click', function() {
            // Update main image
            currentImage.src = this.getAttribute('data-src');
            
            // Update active thumbnail
            thumbnails.forEach(thumb => thumb.classList.remove('active'));
            this.classList.add('active');
        });
    });
    
    // Color Options
    const colorOptions = document.querySelectorAll('.color-option');
    const selectedColorInput = document.getElementById('selectedColor');
    
    if (colorOptions.length > 0) {
        colorOptions.forEach(option => {
            option.addEventListener('click', function() {
                // Update active color
                colorOptions.forEach(opt => opt.classList.remove('active'));
                this.classList.add('active');
                
                // Update hidden input
                selectedColorInput.value = this.getAttribute('data-color');
            });
        });
    }
    
    // Quantity Selector
    const quantityInput = document.querySelector('.quantity-input');
    const decreaseBtn = document.querySelector('.decrease-btn');
    const increaseBtn = document.querySelector('.increase-btn');
    
    if (quantityInput && decreaseBtn && increaseBtn) {
        decreaseBtn.addEventListener('click', function() {
            let value = parseInt(quantityInput.value);
            if (value > 1) {
                quantityInput.value = value - 1;
            }
        });
        
        increaseBtn.addEventListener('click', function() {
            let value = parseInt(quantityInput.value);
            let max = parseInt(quantityInput.getAttribute('max'));
            if (value < max) {
                quantityInput.value = value + 1;
            }
        });
        
        quantityInput.addEventListener('change', function() {
            let value = parseInt(this.value);
            let max = parseInt(this.getAttribute('max'));
            
            if (isNaN(value) || value < 1) {
                this.value = 1;
            } else if (value > max) {
                this.value = max;
            }
        });
    }
    
    // Tabs
    const tabButtons = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-content');
    
    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            const tabId = this.getAttribute('data-tab');
            
            // Update active tab button
            tabButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Update active tab content
            tabContents.forEach(content => content.classList.remove('active'));
            document.getElementById(`${tabId}-tab`).classList.add('active');
        });
    });
    
    // Add to Wishlist
    const wishlistButtons = document.querySelectorAll('.add-to-wishlist');
    
    wishlistButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const productId = this.getAttribute('data-product-id');
            
            // Add animation
            this.classList.add('animate__animated', 'animate__heartBeat');
            
            // AJAX request to add to wishlist
            fetch(`#`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ product_id: productId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success message
                    alert(data.message || 'Added to wishlist');
                } else {
                    // Show error message
                    alert(data.message || 'Error adding to wishlist');
                }
                
                // Remove animation
                setTimeout(() => {
                    this.classList.remove('animate__animated', 'animate__heartBeat');
                }, 1000);
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error adding to wishlist');
                
                // Remove animation
                setTimeout(() => {
                    this.classList.remove('animate__animated', 'animate__heartBeat');
                }, 1000);
            });
        });
    });
    
    // Share Button
    const shareButton = document.querySelector('.share-btn');
    
    if (shareButton && navigator.share) {
        shareButton.addEventListener('click', async () => {
            try {
                await navigator.share({
                    title: '{{ $product->name_en }}',
                    text: '{{ $product->description_en }}',
                    url: window.location.href
                });
            } catch (error) {
                console.error('Error sharing:', error);
            }
        });
    } else if (shareButton) {
        // Fallback for browsers that don't support Web Share API
        shareButton.addEventListener('click', () => {
            // Create a temporary input to copy the URL
            const input = document.createElement('input');
            input.value = window.location.href;
            document.body.appendChild(input);
            input.select();
            document.execCommand('copy');
            document.body.removeChild(input);
            
            alert('Link copied to clipboard');
        });
    }
});
document.addEventListener('DOMContentLoaded', function() {
    const sliderContainer = document.querySelector('.related-products-slider');
    const prevButton = document.getElementById('prev-related');
    const nextButton = document.getElementById('next-related');
    
    if (!sliderContainer || !prevButton || !nextButton) return;

    // Get all product cards
    const productCards = sliderContainer.querySelectorAll('.product-card');
    if (productCards.length === 0) return;

    // Determine number of products to show based on screen size
    let productsToShow = 4; // Default for desktop
    
    function updateProductsToShow() {
        if (window.innerWidth < 768) {
            productsToShow = 2; // For mobile
        } else if (window.innerWidth < 1024) {
            productsToShow = 3; // For tablet
        } else {
            productsToShow = 4; // For desktop
        }
        
        // Hide all products initially
        productCards.forEach(card => {
            card.style.display = 'none';
        });
        
        // Show only the first batch
        for (let i = 0; i < Math.min(productsToShow, productCards.length); i++) {
            productCards[i].style.display = 'flex';
        }
        
        // Update the slider's grid-template-columns based on productsToShow
        sliderContainer.style.gridTemplateColumns = `repeat(${productsToShow}, 1fr)`;
        
        // Update button states
        updateButtonStates();
    }
    
    // Initial setup
    let currentIndex = 0;
    updateProductsToShow();
    
    // Function to update which products are visible
    function updateVisibleProducts() {
        productCards.forEach(card => {
            card.style.display = 'none';
        });
        
        for (let i = currentIndex; i < currentIndex + productsToShow && i < productCards.length; i++) {
            productCards[i].style.display = 'flex';
        }
        
        updateButtonStates();
    }
    
    // Function to update button states (enabled/disabled)
    function updateButtonStates() {
        prevButton.disabled = currentIndex === 0;
        nextButton.disabled = currentIndex + productsToShow >= productCards.length;
        
        // Visual indication of disabled state
        if (prevButton.disabled) {
            prevButton.classList.add('disabled');
        } else {
            prevButton.classList.remove('disabled');
        }
        
        if (nextButton.disabled) {
            nextButton.classList.add('disabled');
        } else {
            nextButton.classList.remove('disabled');
        }
    }
    
    // Event listeners for buttons
    prevButton.addEventListener('click', function() {
        if (currentIndex > 0) {
            currentIndex -= 1;
            updateVisibleProducts();
        }
    });
    
    nextButton.addEventListener('click', function() {
        if (currentIndex + productsToShow < productCards.length) {
            currentIndex += 1;
            updateVisibleProducts();
        }
    });
    
    // Listen for window resize to adjust layout
    window.addEventListener('resize', function() {
        updateProductsToShow();
    });
});

$(document).ready(function() {
    // Color badge selection
    $('.color-badge').on('click', function() {
        // Remove active class from all badges
        $('.color-badge').removeClass('active');
        
        // Add active class to the clicked badge
        $(this).addClass('active');
        
        // Update the hidden input with the selected color ID
        const colorId = $(this).data('color');
        $('#selectedColor').val(colorId);
        
        // If you need to trigger any additional events or updates
        // Add them here
    });
});
document.addEventListener('DOMContentLoaded', function() {
    // Product form submission
    const productForm = document.querySelector('.product-options');
    
    if (productForm) {
        productForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form data
            const formData = new FormData(this);
            const productId = formData.get('product_id');
            const colorId = formData.get('color_id');
            const quantity = formData.get('quantity');
            
            // Add loading state to button
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="lni lni-spinner lni-spin-effect"></i> Adding...';
            submitBtn.disabled = true;
            
            // AJAX request to add to cart
            fetch(`/add-to-cart/${productId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    product_id: productId,
                    color_id: colorId,
                    quantity: quantity
                })
            })
            .then(response => response.json())
            .then(data => {
                // Reset button state
                submitBtn.innerHTML = originalBtnText;
                submitBtn.disabled = false;
                
                if (data.status) {
                    // Show success toast notification
                    if (typeof toastr !== 'undefined') {
                        toastr.success(
                            '<div class="text-center">' +
                            '<div>' + (data.message || 'تمت إضافة المنتج إلى سلة التسوق بنجاح') + '</div>' +
                            '</div>'
                        );
                    } else {
                        alert(data.message || 'Product added to cart successfully');
                    }
                    
                    // Update cart count in the header if you have one
                    if (data.cart_count) {
                        const cartCountElements = document.querySelectorAll('.cart-count');
                        cartCountElements.forEach(element => {
                            element.textContent = data.cart_count;
                            
                            // Add animation
                            element.classList.add('animate__animated', 'animate__heartBeat');
                            setTimeout(() => {
                                element.classList.remove('animate__animated', 'animate__heartBeat');
                            }, 1000);
                        });
                    }
                } else {
                    // Show error toast notification
                    if (typeof toastr !== 'undefined') {
                        toastr.error(
                            '<div class="text-center">' +
                            '<div>حدث خطأ أثناء إضافة المنتج، يرجى المحاولة مرة أخرى</div>' +
                            '</div>'
                        );
                    } else {
                        alert('Error adding product to cart');
                    }
                }
            })
            .catch(error => {
                console.error('Error:', error);
                
                // Reset button state
                submitBtn.innerHTML = originalBtnText;
                submitBtn.disabled = false;
                
                // Show error message
                if (typeof toastr !== 'undefined') {
                    toastr.error(
                        '<div class="text-center">' +
                        '<div>حدث خطأ ما، يرجى المحاولة مرة أخرى</div>' +
                        '</div>'
                    );
                } else {
                    alert('Error adding product to cart');
                }
            });
        });
    }
    
    // Color badge selection - moved from jQuery to vanilla JS
    const colorBadges = document.querySelectorAll('.color-badge');
    const selectedColorInput = document.getElementById('selectedColor');
    
    if (colorBadges.length > 0 && selectedColorInput) {
        colorBadges.forEach(badge => {
            badge.addEventListener('click', function() {
                // Remove active class from all badges
                colorBadges.forEach(b => b.classList.remove('active'));
                
                // Add active class to the clicked badge
                this.classList.add('active');
                
                // Update the hidden input with the selected color ID
                const colorId = this.getAttribute('data-color');
                selectedColorInput.value = colorId;
            });
        });
    }
    
    // Quantity Selector functionality
    const quantityInput = document.querySelector('.quantity-input');
    const decreaseBtn = document.querySelector('.decrease-btn');
    const increaseBtn = document.querySelector('.increase-btn');
    
    if (quantityInput && decreaseBtn && increaseBtn) {
        decreaseBtn.addEventListener('click', function() {
            let value = parseInt(quantityInput.value);
            if (value > 1) {
                quantityInput.value = value - 1;
            }
        });
        
        increaseBtn.addEventListener('click', function() {
            let value = parseInt(quantityInput.value);
            let max = parseInt(quantityInput.getAttribute('max'));
            if (value < max) {
                quantityInput.value = value + 1;
            }
        });
        
        quantityInput.addEventListener('change', function() {
            let value = parseInt(this.value);
            let max = parseInt(this.getAttribute('max'));
            
            if (isNaN(value) || value < 1) {
                this.value = 1;
            } else if (value > max) {
                this.value = max;
            }
        });
    }
});
