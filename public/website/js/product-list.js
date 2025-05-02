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
        const brandId = $(this).data('brand-id');
        
        if ($(this).is(':checked')) {
            filterByBrand(brandId);
        } else {
            // If unchecked, reload all products
            reloadAllProducts();
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
                    updateProductCount(response.products.length);
                    
                    // Replace products in both grid and list views
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
    function filterByBrand(brandId) {
        $.ajax({
            url: `/get-products-by-brand/${brandId}`,
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
                    updateProductCount(response.products.length);
                    
                    // Replace products in both grid and list views
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
                    updateProductCount(response.products.length);
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
        $('#nav-list .row').empty();
        
        if (!products || products.length === 0) {
            const noProductsMessage = `
                <div class="col-12 text-center py-5">
                    <h4>No products found</h4>
                    <p>Try selecting different filters or browse all products.</p>
                </div>
            `;
            
            $('#nav-grid .row').html(noProductsMessage);
            $('#nav-list .row').html(noProductsMessage);
            return;
        }
        
        // Add products to grid view
        products.forEach(function(product) {
            const gridItem = createGridProductCard(product);
            $('#nav-grid .row').append(gridItem);
            
            const listItem = createListProductCard(product);
            $('#nav-list .row').append(listItem);
        });
        
        // Reinitialize tooltips and hover effects
        $('[data-bs-toggle="tooltip"]').tooltip();
        initProductCardHover();
    }
    
    // Function to create a grid product card HTML
    function createGridProductCard(product) {
        const imageUrl = product.product_images && product.product_images.length > 0 
                        ? product.product_images[0].image_url 
                        : 'https://via.placeholder.com/335x335';
        
        return `
            <div class="col-lg-4 col-md-6 col-12">
                <div class="product-card rounded-3 overflow-hidden bg-white shadow-sm h-100">
                    <div class="product-image position-relative">
                        <span class="badge bg-primary position-absolute top-0 end-0 m-3">New</span>
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
                            <button class="btn btn-sm btn-outline-light rounded-circle" data-bs-toggle="tooltip" title="Quick View">
                                <i class="lni lni-eye"></i>
                            </button>
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
                                    <i class="lni lni-star-filled text-warning"></i>
                                    <i class="lni lni-star-filled text-warning"></i>
                                    <i class="lni lni-star-filled text-warning"></i>
                                    <i class="lni lni-star-filled text-warning"></i>
                                    <i class="lni lni-star text-warning"></i>
                                </div>
                                <span class="text-muted small">(4.0)</span>
                            </div>
                        </div>
                        <div class="product-price d-flex justify-content-between align-items-center">
                            <span class="new-price fw-bold text-primary">$${parseFloat(product.price).toFixed(2)}</span>
                            <button class="btn btn-primary btn-sm add-to-cart">
                                <i class="lni lni-cart me-1"></i> Add
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }
    
    // Function to create a list product card HTML
    function createListProductCard(product) {
        const imageUrl = product.product_images && product.product_images.length > 0 
                        ? product.product_images[0].image_url 
                        : 'https://via.placeholder.com/335x335';
        
        const description = product.description_ar || product.description || 'No description available';
        
        return `
            <div class="col-12">
                <div class="product-card-horizontal rounded-3 overflow-hidden bg-white shadow-sm">
                    <div class="row g-0">
                        <div class="col-md-4 position-relative">
                            <span class="badge bg-primary position-absolute top-0 start-0 m-3">New</span>
                            <img src="${imageUrl}" 
                                 class="img-fluid h-100 object-fit-cover" 
                                 alt="${product.name_ar}">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body d-flex flex-column h-100 p-4">
                                <div class="mb-1">
                                    <span class="text-muted small">${product.category ? product.category.name_ar : 'Category'}</span>
                                </div>
                                <h4 class="product-title mb-2">
                                    <a href="/product/${product.id}" class="text-dark text-decoration-none">${product.name_ar}</a>
                                </h4>
                                <div class="product-rating mb-2">
                                    <div class="d-flex align-items-center">
                                        <div class="ratings me-2">
                                            <i class="lni lni-star-filled text-warning"></i>
                                            <i class="lni lni-star-filled text-warning"></i>
                                            <i class="lni lni-star-filled text-warning"></i>
                                            <i class="lni lni-star-filled text-warning"></i>
                                            <i class="lni lni-star text-warning"></i>
                                        </div>
                                        <span class="text-muted small">(4.0)</span>
                                    </div>
                                </div>
                                <p class="text-muted mb-4">${description}</p>
                                <div class="mt-auto d-flex justify-content-between align-items-center">
                                    <div class="product-price">
                                        <span class="new-price fw-bold text-primary fs-4">$${parseFloat(product.price).toFixed(2)}</span>
                                    </div>
                                    <div class="product-actions d-flex gap-2">
                                        <button class="btn btn-primary">
                                            <i class="lni lni-cart me-1"></i> Add to Cart
                                        </button>
                                        <button class="btn btn-outline-secondary">
                                            <i class="lni lni-heart"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }
    
    // Function to update the product count display
    function updateProductCount(count) {
        $('.text-muted.mb-0.small').html(`Showing <span class="fw-bold">1-${Math.min(count, 12)}</span> of <span class="fw-bold">${count}</span> products`);
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
            const productPrice = parseFloat($(this).find('.new-price').text().replace('$', ''));
            
            currentProducts.push({
                id: productId,
                name_ar: productName,
                price: productPrice,
                element: $(this).parent()
            });
        });
        
        // Sort the products based on selected option
        switch(sortOption) {
            case 'Price: Low to High':
                currentProducts.sort((a, b) => a.price - b.price);
                break;
            case 'Price: High to Low':
                currentProducts.sort((a, b) => b.price - a.price);
                break;
            case 'Name: A to Z':
                currentProducts.sort((a, b) => a.name_ar.localeCompare(b.name_ar));
                break;
            case 'Name: Z to A':
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

document.addEventListener('DOMContentLoaded', function() {
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
        const viewButtons = document.querySelectorAll('.view-options .btn');
    viewButtons.forEach(button => {
        button.addEventListener('click', function() {
            viewButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
        });
    });
});