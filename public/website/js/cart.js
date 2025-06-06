document.addEventListener("DOMContentLoaded", () => {
  // Initialize cart calculations
  calculateCartTotals()

  // Quantity buttons functionality
  const decreaseButtons = document.querySelectorAll(".qty-btn.decrease")
  const increaseButtons = document.querySelectorAll(".qty-btn.increase")
  const quantityInputs = document.querySelectorAll(".qty-input")
  const shippingSelect = document.getElementById("shipping-zone")

  // Debug: Log cart items to console
  console.log("Cart items found:", document.querySelectorAll(".cart-item").length)
  document.querySelectorAll(".cart-item").forEach((item) => {
    console.log("Item data:", {
      id: item.dataset.id,
      price: item.dataset.price,
      discount: item.dataset.discount,
    })
  })

  // Add event listeners to quantity inputs for direct changes
  quantityInputs.forEach((input) => {
    input.addEventListener("change", function () {
      // Ensure value is within min/max range
      const min = Number.parseInt(this.getAttribute("min") || "1", 10)
      const max = Number.parseInt(this.getAttribute("max") || "10", 10)
      if (this.value < min) this.value = min
      if (this.value > max) this.value = max

      // Update cart totals
      calculateCartTotals()
    })
  })

  // Fix: Properly handle decrease button clicks
  decreaseButtons.forEach((button) => {
    button.addEventListener("click", function () {
      console.log("Decrease button clicked")
      // Fix: Find the input within the same quantity control container
      const input = this.parentElement.querySelector(".qty-input")
      const value = Number.parseInt(input.value, 10)
      console.log("Current value:", value)
      if (value > 1) {
        input.value = value - 1
        calculateCartTotals()
      }
    })
  })

  // Fix: Properly handle increase button clicks
  increaseButtons.forEach((button) => {
    button.addEventListener("click", function () {
      console.log("Increase button clicked")
      // Fix: Find the input within the same quantity control container
      const input = this.parentElement.querySelector(".qty-input")
      const value = Number.parseInt(input.value, 10)
      const max = Number.parseInt(input.getAttribute("max") || "10", 10)
      console.log("Current value:", value, "Max:", max)
      if (value < max) {
        input.value = value + 1
        calculateCartTotals()
      }
    })
  })

  // Shipping zone change event
  if (shippingSelect) {
    shippingSelect.addEventListener("change", () => {
      calculateCartTotals()
    })
  }

  // Update item count function
  function updateItemCount() {
    const cartItems = document.querySelectorAll(".cart-item")
    const itemCount = document.querySelector(".item-count")
    if (itemCount) {
      itemCount.textContent = `(${cartItems.length})`
    }
  }

  // Fix: Improved cart totals calculation function
  function calculateCartTotals() {
    const cartItems = document.querySelectorAll(".cart-item")
    let subtotal = 0
    let totalDiscount = 0

    console.log("Calculating totals for", cartItems.length, "items")

    // Calculate subtotal and discount
    cartItems.forEach((item) => {
      // Get price and discount from data attributes
      const price = Number.parseFloat(item.dataset.price) || 0
      const discount = Number.parseFloat(item.dataset.discount) || 0

      // Get quantity from the input field
      const quantityInput = item.querySelector(".qty-input")
      const quantity = Number.parseInt(quantityInput.value, 10)

      console.log("Item calculation:", {
        price: price,
        discount: discount,
        quantity: quantity,
        itemSubtotal: price * quantity,
        itemDiscount: discount * quantity,
      })

      subtotal += price * quantity
      totalDiscount += discount * quantity
    })

    // Get shipping cost
    let shippingCost = 0
    if (shippingSelect) {
      const selectedOption = shippingSelect.options[shippingSelect.selectedIndex]
      if (selectedOption && selectedOption.dataset.cost) {
        shippingCost = Number.parseFloat(selectedOption.dataset.cost)
      }
    }

    // Calculate total
    const total = subtotal - totalDiscount + shippingCost

    console.log("Final calculations:", {
      subtotal: subtotal,
      totalDiscount: totalDiscount,
      shippingCost: shippingCost,
      total: total,
    })

    // Update the DOM
    const subtotalElement = document.querySelector(".summary-value.subtotal")
    const discountElement = document.querySelector(".summary-value.discount")
    const totalElement = document.querySelector(".summary-value.total-amount")

    if (subtotalElement) subtotalElement.textContent = `${subtotal.toFixed(2)} EGP`
    if (discountElement) discountElement.textContent = totalDiscount > 0 ? `-${totalDiscount.toFixed(2)} EGP` : "0 EGP"
    if (totalElement) totalElement.textContent = `${total.toFixed(2)} EGP`
  }

  // Show empty cart message
  function showEmptyCart() {
      const cartItemsContainer = document.querySelector(".cart-items")
      cartItemsContainer.innerHTML = `
          <div class="cart-header">
              <h2>Cart Items <span class="item-count">(0)</span></h2>
          </div>
          <div class="empty-cart">
              <div class="empty-cart-icon">
                  <i class="lni lni-cart"></i>
              </div>
              <h3>Your cart is empty</h3>
              <p>Looks like you haven't added anything to your cart yet.</p>
              <a href="/products" class="btn-shop-now">Start Shopping</a>
          </div>
      `
      
      // Reset cart summary
      const subtotalElement = document.querySelector(".summary-value.subtotal")
      const discountElement = document.querySelector(".summary-value.discount")
      const totalElement = document.querySelector(".summary-value.total-amount")
      
      if (subtotalElement) subtotalElement.textContent = "0 EGP"
      if (discountElement) discountElement.textContent = "0 EGP"
      if (totalElement) {
          const shippingCost = shippingSelect ? 
              Number.parseFloat(shippingSelect.options[shippingSelect.selectedIndex].dataset.cost) || 0 : 0
          totalElement.textContent = `${shippingCost.toFixed(2)} EGP`
      }
  }

  // Apply coupon button
  const applyButton = document.querySelector(".btn-apply-coupon")
  if (applyButton) {
    applyButton.addEventListener("click", () => {
      const couponInput = document.querySelector(".coupon-input")
      if (couponInput && couponInput.value.trim()) {
        // Here you would typically make an AJAX call to validate the coupon
        // For now, we'll just show an alert
        alert(`Coupon "${couponInput.value}" applied!`)

        // You could apply a discount here
        // For demonstration, let's just recalculate totals
        calculateCartTotals()
      }
    })
  }

  // Add to cart functionality for recommended products
  const addToCartButtons = document.querySelectorAll(".add-to-cart-btn")

  addToCartButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const productId = this.getAttribute("data-product-id")

      // Add loading state
      this.innerHTML = '<i class="lni lni-spinner-solid lni-spin"></i> Adding...'
      this.disabled = true

      // Simulate AJAX request to add product to cart
      setTimeout(() => {
        // Here you would make an actual AJAX call to add the product to the cart
        // For demonstration, we'll just show success state
        this.innerHTML = '<i class="lni lni-checkmark"></i> Added'
        this.classList.add("added")

        // Reset button after 2 seconds
        setTimeout(() => {
          this.innerHTML = '<i class="lni lni-cart"></i> Add to Cart'
          this.disabled = false
          this.classList.remove("added")
        }, 2000)
      }, 800)
    })
  })
})

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

  // Clear cart functionality
  $(document).on('click', '.clear-cart', function(e) {
      e.preventDefault();
      
      // Show confirmation dialog
      if (!confirm('هل أنت متأكد من إفراغ السلة؟')) {
          return;
      }
      
      const button = $(this);
      const originalText = button.html();
      
      // Show loading state
      button.html('<i class="lni lni-spinner-solid lni-spin"></i> جاري الإفراغ...');
      button.prop('disabled', true);
      
      $.ajax({
          type: 'POST',
          url: '/clear-cart',
          success: function(response) {
              if (response.status) {
                  toastr.success(response.message || 'تم إفراغ السلة بنجاح');
                  
                  // Update cart count
                  $('.cart-count').text('0');
                  
                  // Show empty cart message
                  showEmptyCart();
              } else {
                  if (response.auth_required) {
                      $('#loginModal').modal('show');
                  } else {
                      toastr.error(response.message || 'حدث خطأ أثناء إفراغ السلة');
                  }
              }
              location.reload();
          },
          error: function(xhr, status, error) {
              if (xhr.status === 401) {
                  $('#loginModal').modal('show');
              } else {
                  toastr.error('حدث خطأ أثناء إفراغ السلة');
              }
          },
          complete: function() {
              button.html(originalText);
              button.prop('disabled', false);
          }
      });
  });

  // Remove item from cart functionality
  $(document).on('click', '.remove-item', function(e) {
      e.preventDefault();
      
      const itemId = $(this).data('item-id');
      const cartItem = $(this).closest('.cart-item');
      const button = $(this);
      
      // Show confirmation dialog
      if (!confirm('هل أنت متأكد من حذف هذا المنتج؟')) {
          return;
      }
      
      // Show loading state
      button.html('<i class="lni lni-spinner-solid lni-spin"></i>');
      button.prop('disabled', true);
      
      $.ajax({
          type: 'POST',
          url: `/remove-from-cart/${itemId}`,
          success: function(response) {
              if (response.status) {
                  toastr.success(response.message || 'تم حذف المنتج من السلة بنجاح');
                  
                  // Update cart count
                  if (response.cart_count !== undefined) {
                      $('.cart-count').text(response.cart_count);
                  }
                  
                  // Add fade-out animation
                  cartItem.fadeOut(300, function() {
                      cartItem.remove();
                      
                      // Check if cart is empty
                      const remainingItems = document.querySelectorAll('.cart-item');
                      if (remainingItems.length === 0) {
                          showEmptyCart();
                      } else {
                          // Update item count
                          const itemCount = document.querySelector('.item-count');
                          if (itemCount) {
                              itemCount.textContent = `(${remainingItems.length})`;
                          }
                          
                          // Recalculate totals
                          calculateCartTotals();
                      }
                  });
              } else {
                  if (response.auth_required) {
                      $('#loginModal').modal('show');
                  } else {
                      toastr.error(response.message || 'حدث خطأ أثناء حذف المنتج');
                  }
                  
                  // Reset button
                  button.html('<i class="lni lni-trash"></i>');
                  button.prop('disabled', false);
              }
          },
          error: function(xhr, status, error) {
              if (xhr.status === 401) {
                  $('#loginModal').modal('show');
              } else {
                  toastr.error('حدث خطأ أثناء حذف المنتج');
              }
              
              // Reset button
              button.html('<i class="lni lni-trash"></i>');
              button.prop('disabled', false);
          }
      });
  });

  // Function to show empty cart (accessible globally)
  window.showEmptyCart = function() {
      const cartItemsContainer = document.querySelector(".cart-items");
      if (cartItemsContainer) {
          cartItemsContainer.innerHTML = `
              <div class="cart-header">
                  <h2>Cart Items <span class="item-count">(0)</span></h2>
              </div>
              <div class="empty-cart">
                  <div class="empty-cart-icon">
                      <i class="lni lni-cart"></i>
                  </div>
                  <h3>Your cart is empty</h3>
                  <p>Looks like you haven't added anything to your cart yet.</p>
                  <a href="/products" class="btn-shop-now">Start Shopping</a>
              </div>
          `;
      }
      
      // Reset cart summary
      const subtotalElement = document.querySelector(".summary-value.subtotal");
      const discountElement = document.querySelector(".summary-value.discount");
      const totalElement = document.querySelector(".summary-value.total-amount");
      const shippingSelect = document.getElementById("shipping-zone");
      
      if (subtotalElement) subtotalElement.textContent = "0 EGP";
      if (discountElement) discountElement.textContent = "0 EGP";
      if (totalElement) {
          const shippingCost = shippingSelect ? 
              Number.parseFloat(shippingSelect.options[shippingSelect.selectedIndex].dataset.cost) || 0 : 0;
          totalElement.textContent = `${shippingCost.toFixed(2)} EGP`;
      }
  };

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