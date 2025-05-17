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
  
    // Remove item functionality
    const removeButtons = document.querySelectorAll(".remove-item")
  
    removeButtons.forEach((button) => {
      button.addEventListener("click", function () {
        const item = this.closest(".cart-item")
  
        // Add fade-out animation
        item.style.opacity = "0"
        item.style.transform = "translateX(20px)"
  
        // Remove the item after animation completes
        setTimeout(() => {
          item.remove()
  
          // Check if cart is empty
          const cartItems = document.querySelectorAll(".cart-item")
          if (cartItems.length === 0) {
            const emptyCart = document.createElement("div")
            emptyCart.className = "empty-cart"
            emptyCart.innerHTML = `
              <div class="empty-cart-icon">
                  <i class="lni lni-cart"></i>
              </div>
              <h3>Your cart is empty</h3>
              <p>Looks like you haven't added anything to your cart yet.</p>
              <a href="/products" class="btn-shop-now">Start Shopping</a>
            `
            document.querySelector(".cart-items").appendChild(emptyCart)
          }
  
          // Update item count and cart totals
          updateItemCount()
          calculateCartTotals()
        }, 300)
      })
    })
  
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
  

 