$(document).ready(function() {
    // Initialize tooltips
    $('[data-bs-toggle="tooltip"]').tooltip();
    
    // Add hover effect for product cards
    $('.product-card').hover(
        function() {
            $(this).find('.product-action').addClass('opacity-100');
        },
        function() {
            $(this).find('.product-action').removeClass('opacity-100');
        }
    );
    
    // Category filter
    $('.category-item a').on('click', function(e) {
        e.preventDefault();
        
        const categoryId = $(this).data('category-id');
        $('.category-item a').removeClass('active');
        $(this).addClass('active');
        
        filterByCategory(categoryId);
    });
    
    // Brand filter
    $('.form-check-input[id^="brand-"]').on('change', function() {
        // Get all checked brand IDs
        const checkedBrands = [];
        $('.form-check-input[id^="brand-"]:checked').each(function() {
            checkedBrands.push($(this).data('brand-id'));
        });
        
        if (checkedBrands.length > 0) {
            // Filter by selected brands
            filterByBrand(checkedBrands);
        } else {
            // If no brands selected, reload all products
            reloadAllProducts();
        }
    });

    // Search products
    let searchTimeout;
    $('.search-form input').on('keyup', function() {
        const query = $(this).val();
        
        // Clear any existing timeout
        clearTimeout(searchTimeout);
        
        // Set a timeout to prevent too many requests
        searchTimeout = setTimeout(function() {
            if (query.length >= 2) {
                searchProducts(query);
            } else if (query.length === 0) {
                reloadAllProducts();
            }
        }, 500);
    });

    // Search button click
    $('.search-form button').on('click', function() {
        const query = $('.search-form input').val();
        if (query.length >= 2) {
            searchProducts(query);
        }
    });
    
    // Function to filter products by category
    function filterByCategory(categoryId) {
        $.ajax({
            url: `/get-products-by-category/${categoryId}`,
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                // Show loading indicator
                showLoading();
            },
            success: function(response) {
                if (response.success) {
                    // Update product count
                    updateProductCount(response.count);
                    
                    // Replace products in grid view
                    replaceProducts(response.products);
                }
            },
            error: function(xhr) {
                console.error('Error filtering products:', xhr.responseText);
                
                // Show error message
                showErrorMessage('Failed to load products. Please try again.');
            },
            complete: function() {
                // Hide loading indicator
                hideLoading();
            }
        });
    }
    
    // Function to filter products by brand
    function filterByBrand(brandIds) {
        $.ajax({
            url: `/get-products-by-brand/${brandIds[0]}`, // We'll improve this to handle multiple brands in the backend
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                brand_ids: brandIds
            },
            beforeSend: function() {
                // Show loading indicator
                showLoading();
            },
            success: function(response) {
                if (response.success) {
                    // Update product count
                    updateProductCount(response.count);
                    
                    // Replace products in grid view
                    replaceProducts(response.products);
                }
            },
            error: function(xhr) {
                console.error('Error filtering products:', xhr.responseText);
                
                // Show error message
                showErrorMessage('Failed to load products. Please try again.');
            },
            complete: function() {
                // Hide loading indicator
                hideLoading();
            }
        });
    }
    
    // Function to search products
    function searchProducts(query) {
        $.ajax({
            url: '/search-products',
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                query: query
            },
            beforeSend: function() {
                showLoading();
            },
            success: function(response) {
                if (response.success) {
                    updateProductCount(response.count);
                    replaceProducts(response.products);
                }
            },
            error: function(xhr) {
                console.error('Error searching products:', xhr.responseText);
                showErrorMessage('Failed to search products. Please try again.');
            },
            complete: function() {
                hideLoading();
            }
        });
    }
    
    // Function to reload all products (default state)
    function reloadAllProducts() {
        $.ajax({
            url: '/get-all-products',
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                showLoading();
            },
            success: function(response) {
                if (response.success) {
                    updateProductCount(response.count);
                    replaceProducts(response.products);
                }
            },
            error: function(xhr) {
                console.error('Error loading all products:', xhr.responseText);
                showErrorMessage('Failed to load products. Please try again.');
            },
            complete: function() {
                hideLoading();
            }
        });
    }
    
    // Function to replace products in the DOM
    function replaceProducts(products) {
        // Clear existing products
        $('#nav-grid .row').empty();
        
        if (!products || products.length === 0) {
            const noProductsMessage = `
                <div class="col-12 text-center py-5">
                    <h4>No products found</h4>
                    <p>Try selecting different filters or browse all products.</p>
                </div>
            `;
            
            $('#nav-grid .row').html(noProductsMessage);
            return;
        }
        
        // Add products to grid view
        products.forEach(function(product) {
            const gridItem = createGridProductCard(product);
            $('#nav-grid .row').append(gridItem);
        });
        
        // Reinitialize tooltips and hover effects
        $('[data-bs-toggle="tooltip"]').tooltip();
        initProductCardHover();
    }
    
    // Function to create a grid product card HTML
    function createGridProductCard(product) {
        // Check if product has images
        const imageUrl = product.product_images && product.product_images.length > 0 
                        ? product.product_images[0].image_url 
                        : 'uploads/default-product-image.jpg';
                        
        // Check if product is new (created today)
        const newBadge = isProductNew(product.created_at) 
                        ? '<span class="badge bg-primary position-absolute top-0 end-0 m-3">New</span>' 
                        : '';
        
        // Calculate rating
        const rating = product.rating ? parseFloat(product.rating).toFixed(1) : '0.0';
        
        // Generate rating stars
        const ratingStars = generateRatingStars(rating);
        
        return `
            <div class="col-lg-4 col-md-6 col-12">
                <div class="product-card rounded-3 overflow-hidden bg-white shadow-sm h-100">
                    <div class="product-image position-relative">
                        ${newBadge}
                        <img src="${imageUrl}" 
                            alt="${product.name_ar}" 
                            class="img-fluid w-100 product-img">
                        <div class="product-action position-absolute bottom-0 start-0 w-100 p-3 d-flex gap-2 justify-content-center opacity-0">
                            <button class="btn btn-sm btn-primary rounded-circle" data-bs-toggle="tooltip" title="Add to Cart">
                                <i class="lni lni-cart"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-light rounded-circle" data-bs-toggle="tooltip" title="Add to Wishlist">
                                <i class="lni lni-heart"></i>
                            </button>
                            <a href="/product/${product.id}" class="btn btn-sm btn-outline-light rounded-circle" data-bs-toggle="tooltip" title="Quick View">
                                <i class="lni lni-eye"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product-info p-3">
                        <div class="product-category mb-1">
                            <span class="text-muted small">${product.category ? product.category.name_ar : 'Category'}</span>
                        </div>
                        <h5 class="product-title mb-2">
                            <a href="/product/${product.id}" class="text-dark text-decoration-none">${product.name_ar}</a>
                        </h5>
                        <div class="product-rating mb-2">
                            <div class="d-flex align-items-center">
                                <div class="ratings me-2">
                                    ${ratingStars}
                                </div>
                                <span class="text-muted small">(${rating})</span>
                            </div>
                        </div>
                        <div class="product-price d-flex justify-content-between align-items-center">
                            <span class="new-price fw-bold text-primary">${parseFloat(product.price).toFixed(2)} EGP</span>
                            <button class="btn btn-primary btn-sm add-to-cart" data-product-id="${product.id}">
                                <i class="lni lni-cart me-1"></i> Add
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }
    
    // Function to generate rating stars HTML
    function generateRatingStars(rating) {
        const fullStars = Math.floor(rating);
        const hasHalfStar = (rating - fullStars) >= 0.5;
        let starsHtml = '';
        
        for (let i = 1; i <= 5; i++) {
            if (i <= fullStars) {
                starsHtml += '<i class="lni lni-star-filled text-warning"></i>';
            } else if (hasHalfStar && i === fullStars + 1) {
                starsHtml += '<i class="lni lni-star-half text-warning"></i>';
            } else {
                starsHtml += '<i class="lni lni-star text-warning"></i>';
            }
        }
        
        return starsHtml;
    }
    
    // Function to check if product is new (created today)
    function isProductNew(createdAt) {
        if (!createdAt) return false;
        
        const today = new Date();
        const productDate = new Date(createdAt);
        
        return today.toDateString() === productDate.toDateString();
    }
    
    // Function to update the product count display
    function updateProductCount(count) {
        // Update count in the top bar
        $('.text-muted.mb-0.small').html(`Showing <span class="fw-bold">1-${Math.min(count, 12)}</span> of <span class="fw-bold">${count}</span> products`);
        
        // Update count in pagination info
        $('.pagination-info .text-muted').html(`Showing 1 to ${Math.min(count, 12)} of ${count} products`);
    }
    
    // Function to initialize hover effects for product cards
    function initProductCardHover() {
        $('.product-card').hover(
            function() {
                $(this).find('.product-action').addClass('opacity-100');
            },
            function() {
                $(this).find('.product-action').removeClass('opacity-100');
            }
        );
    }
    
    // Function to show loading indicator
    function showLoading() {
        // Create a loading overlay if it doesn't exist
        if ($('.loading-overlay').length === 0) {
            $('<div class="loading-overlay position-fixed top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center bg-white bg-opacity-75" style="z-index: 9999;">' +
                '<div class="spinner-border text-primary" role="status">' +
                    '<span class="visually-hidden">Loading...</span>' +
                '</div>' +
            '</div>').appendTo('body');
        }
    }
    
    // Function to hide loading indicator
    function hideLoading() {
        $('.loading-overlay').remove();
    }
    
    // Function to show error message
    function showErrorMessage(message) {
        // Remove any existing error messages
        $('.alert-danger').alert('close');
        
        const errorAlert = `
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `;
        
        // Add before the product grid
        $('.products-top-wrapper').after(errorAlert);
        
        // Auto-dismiss after 5 seconds
        setTimeout(function() {
            $('.alert').alert('close');
        }, 5000);
    }

    // Sorting functionality
    $('#sortingOptions').on('change', function() {
        const sortOption = $(this).val();
        
        // Get current products
        let currentProducts = [];
        
        // Get the products from the current view
        $('#nav-grid .product-card').each(function() {
            const productId = $(this).find('.product-title a').attr('href').split('/').pop();
            const productName = $(this).find('.product-title a').text();
            const productPrice = parseFloat($(this).find('.new-price').text().replace('EGP', ''));
            
            currentProducts.push({
                id: productId,
                name_ar: productName,
                price: productPrice,
                element: $(this).parent()
            });
        });
        
        // Sort the products based on selected option
        switch(sortOption) {
            case 'price-asc':
                currentProducts.sort((a, b) => a.price - b.price);
                break;
            case 'price-desc':
                currentProducts.sort((a, b) => b.price - a.price);
                break;
            case 'name-asc':
                currentProducts.sort((a, b) => a.name_ar.localeCompare(b.name_ar));
                break;
            case 'name-desc':
                currentProducts.sort((a, b) => b.name_ar.localeCompare(a.name_ar));
                break;
            default:
                // Default (Popularity) - No sorting needed
                break;
        }
        
        // Reorder the products in the DOM
        const gridRow = $('#nav-grid .row');
        gridRow.empty();
        
        currentProducts.forEach(function(product) {
            gridRow.append(product.element);
        });
    });
    
    

});

// AJAX Setup with CSRF token
$(document).ready(function() {
    // Get fresh CSRF token function
    function refreshCSRFToken() {
        return $.get('/csrf-token').then(function(data) {
            $('meta[name="csrf-token"]').attr('content', data.csrf_token);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': data.csrf_token
                }
            });
        }).catch(function() {
            // If route doesn't exist, try to get from form
            console.warn('CSRF refresh route not found');
        });
    }

    // Initial CSRF setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'X-Requested-With': 'XMLHttpRequest'
        }
    });

    // Add to cart functionality
    $(document).on('click', '.add-to-cart', function(e) {
        e.preventDefault();

        const productId = $(this).data('product-id');
        const url = $(this).attr('href');

        $.ajax({
            type: 'POST',
            url: url,
            data: {
                product_id: productId
            },
            success: function(response) {
                if (response.status) {
                    toastr.success(
                        '<div class="text-center">' +
                        '<div>تمت إضافة المنتج إلى سلة التسوق بنجاح</div>' +
                        '</div>'
                    );

                    if (response.cart_count) {
                        $('.cart-count').text(response.cart_count);
                    }
                } else {
                    if (response.auth_required) {
                        $('#loginModal').modal('show');
                        $('#loginModal').data('product-id', productId);
                        $('#loginModal').data('product-url', url);
                    } else {
                        toastr.error(
                            '<div class="text-center">' +
                            '<div>' + (response.message || 'حدث خطأ أثناء إضافة المنتج، يرجى المحاولة مرة أخرى') + '</div>' +
                            '</div>'
                        );
                    }
                }
                location.reload();
            },
            error: function(xhr, status, error) {
                if (xhr.status === 401) {
                    $('#loginModal').modal('show');
                } else if (xhr.status === 302) {
                    toastr.error(
                        '<div class="text-center">' +
                        '<div>انتهت الجلسة، يرجى تسجيل الدخول مرة أخرى</div>' +
                        '</div>'
                    );
                    $('#loginModal').modal('show');
                } else {
                    toastr.error(
                        '<div class="text-center">' +
                        '<div>حدث خطأ ما، يرجى المحاولة مرة أخرى</div>' +
                        '</div>'
                    );
                }
            }
        });
    });

    // Handle login form submission
    $('#loginForm').on('submit', function(e) {
        e.preventDefault();
        
        const $form = $(this);
        const $submitBtn = $form.find('.btn-login');
        const $loginText = $submitBtn.find('.login-text');
        const $loginSpinner = $submitBtn.find('.login-spinner');
        
        // Show loading state
        $submitBtn.prop('disabled', true);
        $loginText.addClass('d-none');
        $loginSpinner.removeClass('d-none');
        
        // Get fresh CSRF token before login
        const formData = new FormData(this);
        
        $.ajax({
            type: 'POST',
            url: $form.attr('action'),
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            },
            success: function(response) {
                if (response.success || response.status) {
                    $('#loginModal').modal('hide');
                    toastr.success('تم تسجيل الدخول بنجاح');
                    location.reload();
                    // Update CSRF token after successful login
                    refreshCSRFToken().then(function() {
                        // Retry adding product to cart if there was a pending request
                        const productId = $('#loginModal').data('product-id');
                        const productUrl = $('#loginModal').data('product-url');
                        
                        if (productId && productUrl) {
                            setTimeout(function() {
                                $.ajax({
                                    type: 'POST',
                                    url: productUrl,
                                    data: {
                                        product_id: productId
                                    },
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                        'X-Requested-With': 'XMLHttpRequest'
                                    },
                                    success: function(response) {
                                        if (response.status) {
                                            toastr.success('تمت إضافة المنتج إلى سلة التسوق بنجاح');
                                            if (response.cart_count) {
                                                $('.cart-count').text(response.cart_count);
                                            }
                                        }
                                    },
                                    error: function() {
                                        toastr.error('حدث خطأ أثناء إضافة المنتج');
                                    }
                                });
                            }, 1000);
                        }
                    });
                    
                    $('#loginModal').removeData('product-id product-url');
                    
                } else {
                    toastr.error(response.message || 'خطأ في تسجيل الدخول');
                }
            },
            error: function(xhr) {
                console.log('Login error:', xhr); // Debug log
                
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON?.errors;
                    if (errors) {
                        let errorMessage = 'يرجى تصحيح الأخطاء التالية:<br>';
                        for (let field in errors) {
                            errorMessage += '- ' + errors[field][0] + '<br>';
                        }
                        toastr.error(errorMessage);
                    } else {
                        toastr.error('بيانات غير صحيحة');
                    }
                } else if (xhr.status === 419) {
                    toastr.error('انتهت صلاحية الصفحة، يرجى إعادة تحميل الصفحة');
                    // Refresh CSRF token
                    refreshCSRFToken();
                } else {
                    toastr.error('حدث خطأ أثناء تسجيل الدخول');
                }
            },
            complete: function() {
                $submitBtn.prop('disabled', false);
                $loginText.removeClass('d-none');
                $loginSpinner.addClass('d-none');
            }
        });
    });

    // Clear stored data when modal is closed
    $('#loginModal').on('hidden.bs.modal', function () {
        $(this).removeData('product-id product-url');
        $('#loginForm')[0].reset();
    });

    // Refresh CSRF token when modal opens
    $('#loginModal').on('shown.bs.modal', function () {
        refreshCSRFToken();
    });
});