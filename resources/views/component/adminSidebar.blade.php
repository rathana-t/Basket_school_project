<div class="wrapper">
    <div class="sidebar shadow-sm">
        <div class="text-center mt-4 mb-4">
            <a href=""><img src="https://wallpaperaccess.com/full/3143683.jpg" alt="" class="img-fluid"></a>
        </div>
        <ul class="text-center">
            <li>
                <a clas href="{{ url('/admin') }}">
                    <img src="/images/sidebar-logo/1.svg" alt="">
                    <div class=" {{ Request::is('admin/dashboard') ? 'ac' : '' }}">
                        Dashboard
                    </div>
                </a>
            </li>

            <li>
                <a href="{{ url('/admin/user') }}">
                    <img src="/images/sidebar-logo/4.svg" alt="">
                    <div class=" {{ Request::is('admin/user*') ? 'ac' : '' }}">
                        User
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ url('/admin/seller') }}">
                    <img src="/images/sidebar-logo/2.svg" alt="">
                    <div class=" {{ Request::is('admin/seller*') ? 'ac' : '' }}">
                        Seller
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ url('/admin/product') }}">
                    <img src="/images/sidebar-logo/3.svg" alt="">
                    <div class=" {{ Request::is('admin/product') ? 'ac' : '' }}">
                        Product
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ url('/admin/brand') }}">
                    <img src="/images/sidebar-logo/5.svg" alt="">
                    <div class=" {{ Request::is('admin/brand') || Request::is('admin/add-brand') ? 'ac' : '' }}">
                        Brand
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ url('/admin/category') }}">
                    <img src="/images/sidebar-logo/6.svg" alt="">
                    <div
                        class=" {{ Request::is('admin/category') || Request::is('admin/add-category') ? 'ac' : '' }}">
                        Category
                    </div>
                </a>
            </li>

            <li>
                <a href="{{ url('/admin/secondary-category') }}">
                    <img src="/images/sidebar-logo/6.svg" alt="">
                    <div
                        class=" {{ Request::is('admin/secondary-category') || Request::is('admin/add-secondarycategory') ? 'ac' : '' }}">
                        SecondaryCategory
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
</div>
