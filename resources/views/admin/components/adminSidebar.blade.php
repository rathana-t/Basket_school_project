<nav id="sidebar">
    <div class="custom-menu">
        <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
        </button>
    </div>
    <div class="text-center mt-4">
        <a href=""><img src="https://wallpaperaccess.com/full/3143683.jpg" alt="" class="img-fluid"></a>
    </div>
    <div class="p-4">
        <ul class="mb-5 list-unstyled components">
            <li>
                <a clas href="{{ url('/admin') }}">
                    <div class=" {{ Request::is('admin/dashboard*') ? 'ac' : '' }}">
                        <img src="/images/sidebar-logo/1.svg" alt="">
                        <span class="pl-3">Dashboard</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="{{ url('/admin/user') }}">
                    <div class=" {{ Request::is('admin/user*') ? 'ac' : '' }}">
                        <img src="/images/sidebar-logo/4.svg" alt="">
                        <span class="pl-3">Users</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="{{ url('/admin/seller') }}">
                    <div class=" {{ Request::is('admin/seller*') ? 'ac' : '' }}">
                        <img src="/images/sidebar-logo/2.svg" alt="">
                        <span class="pl-3">Sellers</span>
                    </div>
                </a>
            </li>


            <li class="active">
                <a href="#products" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div>
                        <img src="/images/sidebar-logo/3.svg" alt="">
                        <span class="pl-3">Products</span>
                    </div>
                </a>
                <ul class="collapse list-unstyled" id="products">
                    <div class="cs-dropdown">
                        <a clas href="/admin/product">
                            <div class="pl-3 {{ Request::is('admin/product') ? 'ac' : '' }} mt-2">
                                Product
                            </div>
                        </a>
                        <a clas href="/admin/productPending">
                            <div class="pl-3 mt-2 {{ Request::is('admin/productPending') ? 'ac' : '' }}">
                                Request Products
                            </div>
                        </a>
                    </div>
                </ul>
            </li>

            <li>
                <a href="{{ url('/admin/brand') }}">
                    <div class=" {{ Request::is('admin/brand*') || Request::is('admin/add-brand') ? 'ac' : '' }}">
                        <img src="/images/sidebar-logo/5.svg" alt="">
                        <span class="pl-3">Brands</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="{{ url('/admin/category') }}">
                    <div
                        class=" {{ Request::is('admin/category*') || Request::is('admin/add-category') ? 'ac' : '' }}">
                        <img src="/images/sidebar-logo/6.svg" alt="">
                        <span class="pl-3">Categories</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="{{ url('/admin/secondary-category') }}">
                    <div
                        class="{{ Request::is('admin/secondary-category*') || Request::is('admin/add-secondarycategory') ? 'ac' : '' }}">
                        <img src="/images/sidebar-logo/6.svg" alt="">
                        <span class="pl-3">SubCategory</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="{{ url('/') }}">
                    <div class=" {{ Request::is('/') ? 'ac' : '' }}">
                        Go To Website PLP
                    </div>
                </a>
            </li>
        </ul>
    </div>
</nav>
