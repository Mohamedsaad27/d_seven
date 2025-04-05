<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
    <div class="sidebar-inner px-4 pt-3">
        <ul class="nav flex-column pt-3 pt-md-0 mt-4">
            <li class="nav-item active">
                <a href="../../pages/dashboard/dashboard.html" class="nav-link">
                    <span class="sidebar-icon">
                        <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                        </svg>
                    </span>
                    <span class="sidebar-text" data-i18n="dashboard">Dashboard</span>
                </a>
            </li>

            <!-- Category Section -->
            <li class="nav-item">
                <a href="#submenu-category" class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="submenu-category">
                    <span class="d-flex align-items-center">
                        <span class="sidebar-icon">
                            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                            </svg>
                        </span>
                        <span class="sidebar-text" data-i18n="category">Category</span>
                    </span>
                    <span class="link-arrow">
                        <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </span>
                </a>
                <div class="multi-level collapse" id="submenu-category" aria-expanded="false">
                    <ul class="flex-column nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('category.create')}}">
                                <span class="sidebar-text ms-3" data-i18n="add_category">Add Category</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('category.index')}}">
                                <span class="sidebar-text ms-3" data-i18n="category_list">Category List</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


              <!-- Brand Section -->
             <li class="nav-item">
                <a href="#submenu-brand" class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="submenu-brand">
                    <span class="d-flex align-items-center">
                        <span class="sidebar-icon">
                            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3 3h14v2H3zM3 9h14v2H3zM3 15h14v2H3z"></path>
                            </svg>
                        </span>
                        <span class="sidebar-text" data-i18n="brand">Brand</span>
                    </span>
                    <span class="link-arrow">
                        <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </span>
                </a>
                <div class="multi-level collapse" id="submenu-brand" aria-expanded="false">
                    <ul class="flex-column nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('brand.create')}}">
                                <span class="sidebar-text ms-3" data-i18n="add_brand">Add Brand</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('brand.index')}}">
                                <span class="sidebar-text ms-3" data-i18n="brand_list">Brand List</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            <!-- Product Section -->
            <li class="nav-item">
                <a href="#submenu-product" class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="submenu-product">
                    <span class="d-flex align-items-center">
                        <span class="sidebar-icon">
                            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3 3h14v2H3zM3 9h14v2H3zM3 15h14v2H3z"></path>
                            </svg>
                        </span>
                        <span class="sidebar-text" data-i18n="product">Product</span>
                    </span>
                    <span class="link-arrow">
                        <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </span>
                </a>
                <div class="multi-level collapse" id="submenu-product" aria-expanded="false">
                    <ul class="flex-column nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('products.create')}}">
                                <span class="sidebar-text ms-3" data-i18n="add_product">Add Product</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('products.index')}}">
                                <span class="sidebar-text ms-3" data-i18n="product_list">Product List</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

          
            <!-- Shipping Zones Section -->
            <li class="nav-item">
                <a href="#submenu-shipping" class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="submenu-shipping">
                    <span class="d-flex align-items-center">
                        <span class="sidebar-icon">
                            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3 3h14v2H3zM3 9h14v2H3zM3 15h14v2H3z"></path>
                            </svg>
                        </span>
                        <span class="sidebar-text" data-i18n="shipping_zone">Shipping Zones</span>
                    </span>
                    <span class="link-arrow">
                        <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </span>
                </a>
                <div class="multi-level collapse" id="submenu-shipping" aria-expanded="false">
                    <ul class="flex-column nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('shipping_zone.create')}}">
                                <span class="sidebar-text ms-3" data-i18n="add_shipping_zone">Add Shipping Zone</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('shipping_zone.index')}}">
                                <span class="sidebar-text ms-3" data-i18n="shipping_zone_list">Shipping Zone List</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Colors Section -->
            <li class="nav-item">
                <a href="#submenu-color" class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="submenu-color">
                    <span class="d-flex align-items-center">
                        <span class="sidebar-icon">
                            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3 3h14v2H3zM3 9h14v2H3zM3 15h14v2H3z"></path>
                            </svg>
                        </span>
                        <span class="sidebar-text" data-i18n="color">Colors</span>
                    </span>
                    <span class="link-arrow">
                        <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </span>
                </a>
                <div class="multi-level collapse" id="submenu-color" aria-expanded="false">
                    <ul class="flex-column nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('colors.create')}}">
                                <span class="sidebar-text ms-3" data-i18n="add_color">Add Color</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('colors.index')}}">
                                <span class="sidebar-text ms-3" data-i18n="color_list">Color List</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Sizes Section -->
            <li class="nav-item">
                <a href="#submenu-size" class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="submenu-size">
                    <span class="d-flex align-items-center">
                        <span class="sidebar-icon">
                            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3 3h14v2H3zM3 9h14v2H3zM3 15h14v2H3z"></path>
                            </svg>
                        </span>
                        <span class="sidebar-text" data-i18n="size">Sizes</span>
                    </span>
                    <span class="link-arrow">
                        <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </span>
                </a>
                <div class="multi-level collapse" id="submenu-size" aria-expanded="false">
                    <ul class="flex-column nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('sizes.create')}}">
                                <span class="sidebar-text ms-3" data-i18n="add_size">Add Size</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('sizes.index')}}">
                                <span class="sidebar-text ms-3" data-i18n="size_list">Size List</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>

</nav>
