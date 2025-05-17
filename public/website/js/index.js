document.addEventListener('DOMContentLoaded', function() {
    // Add parallax effect to hero slider
    const heroSlider = document.querySelector('.hero-slider-item');

    if (heroSlider) {
        window.addEventListener('scroll', function() {
            const scrollPosition = window.scrollY;
            if (scrollPosition < 600) {
                heroSlider.style.backgroundPositionY = `calc(50% + ${scrollPosition * 0.1}px)`;
            }
        });

        // Optional: Add mouse move parallax effect
        heroSlider.addEventListener('mousemove', function(e) {
            const rect = this.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            const xPercent = x / rect.width;
            const yPercent = y / rect.height;

            // Subtle movement of background
            this.style.backgroundPosition = `${50 + (xPercent - 0.5) * 5}% ${50 + (yPercent - 0.5) * 5}%`;
        });

        // Reset position on mouse leave
        heroSlider.addEventListener('mouseleave', function() {
            this.style.backgroundPosition = 'center';
        });
    }

    // Add hover effects to small banners
    const smallBanners = document.querySelectorAll('.small-banner');

    smallBanners.forEach(banner => {
        banner.addEventListener('mouseenter', function() {
            // Add a subtle scale effect to the background
            if (this.style.backgroundImage) {
                this.style.backgroundSize = '105%';
            }
        });

        banner.addEventListener('mouseleave', function() {
            // Reset the background size
            if (this.style.backgroundImage) {
                this.style.backgroundSize = 'cover';
            }
        });
    });

    // Add animation to weekly sale banner
    const weeklySale = document.querySelector('.weekly-sale');

    if (weeklySale) {
        // Create a subtle floating animation
        let floatY = 0;
        let floatDirection = 1;

        function animateFloat() {
            if (floatY > 5) floatDirection = -1;
            if (floatY < -5) floatDirection = 1;

            floatY += 0.1 * floatDirection;
            weeklySale.style.transform = `translateY(${floatY}px)`;

            requestAnimationFrame(animateFloat);
        }

        // Start the animation
        animateFloat();
    }
});
    document.addEventListener('DOMContentLoaded', function() {
    // Initialize countdown timer
    initCountdownTimer();
});
document.addEventListener('DOMContentLoaded', function() {
    // Clone brand items for infinite scroll effect
    const brandsWrapper = document.querySelector('.brands-wrapper');

    if (brandsWrapper) {
        const brandItems = document.querySelectorAll('.brand-item');

        // Clone the first set of brand items and append to the end
        brandItems.forEach(item => {
            const clone = item.cloneNode(true);
            brandsWrapper.appendChild(clone);
        });

        // Pause animation on hover
        brandsWrapper.addEventListener('mouseenter', function() {
            this.style.animationPlayState = 'paused';
        });

        brandsWrapper.addEventListener('mouseleave', function() {
            this.style.animationPlayState = 'running';
        });
    }

    // Add hover effects to shipping info items
    const shippingItems = document.querySelectorAll('.shipping-info-item');

    shippingItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            // Add a subtle pulse effect to the icon
            const icon = this.querySelector('.info-icon');
            icon.style.transform = 'scale(1.1) rotateY(180deg)';

            // Highlight the text
            const title = this.querySelector('h4');
            title.style.color = '#ff6b6b';
        });

        item.addEventListener('mouseleave', function() {
            const icon = this.querySelector('.info-icon');
            icon.style.transform = '';

            const title = this.querySelector('h4');
            title.style.color = '';
        });
    });
});
function initCountdownTimer() {
    // Set the countdown date (7 days from now)
    const countdownDate = new Date();
    countdownDate.setDate(countdownDate.getDate() + 7);

    // Update the countdown every second
    const countdownTimer = setInterval(function() {
        // Get current date and time
        const now = new Date().getTime();

        // Find the distance between now and the countdown date
        const distance = countdownDate - now;

        // Time calculations for days, hours, minutes and seconds
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result
        document.getElementById('days').textContent = days < 10 ? '0' + days : days;
        document.getElementById('hours').textContent = hours < 10 ? '0' + hours : hours;
        document.getElementById('minutes').textContent = minutes < 10 ? '0' + minutes : minutes;
        document.getElementById('seconds').textContent = seconds < 10 ? '0' + seconds : seconds;

        // If the countdown is finished, show the deal ended alert
        if (distance < 0) {
            clearInterval(countdownTimer);
            document.getElementById('days').textContent = '00';
            document.getElementById('hours').textContent = '00';
            document.getElementById('minutes').textContent = '00';
            document.getElementById('seconds').textContent = '00';

            // Show the deal ended alert
            document.querySelector('.deal-ended-alert').style.display = 'block';
            document.querySelector('.deal-counter-wrapper').style.display = 'none';
            document.querySelector('.offer-btn').style.display = 'none';
        }
    }, 1000);

    // Add hover effects to product images
    const productImages = document.querySelectorAll('.product-img');
    productImages.forEach(img => {
        img.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.05)';
        });

        img.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });
}

$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
                    // Show success toast notification with centered large icon and Arabic message
                    toastr.success(
                        '<div class="text-center">' +
                        '<div>تمت إضافة المنتج إلى سلة التسوق بنجاح</div>' +
                        '</div>'
                    );

                    // Update cart count in the header if you have one
                    if (response.cart_count) {
                        $('.cart-count').text(response.cart_count);
                    }
                } else {
                    // Show error toast notification with centered large icon and Arabic message
                    toastr.error(
                        '<div class="text-center">' +
                        '<div>حدث خطأ أثناء إضافة المنتج، يرجى المحاولة مرة أخرى</div>' +
                        '</div>'
                    );
                }
            },
            error: function(xhr, status, error) {
                if (xhr.status === 302) {
                    toastr.error(
                        '<div class="text-center">' +
                        '<div>انتهت الجلسة أو تحتاج إلى تسجيل الدخول. يرجى تحديث الصفحة</div>' +
                        '</div>'
                    );
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
});
