@extends('admin\admin')

@section('sidebar-content')

    <div class="container">
        <div class="text-center">
            @if (Session::has('brand_add'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('brand_add') }}
                </div>
            @endif
        </div>
    </div>

    <div class="dashboard">
        <div class="small-card">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="/admin/user">
                        <div class="color1">
                            <div class="card shadow-sm rounded">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                                    fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                    <path fill-rule="evenodd"
                                                        d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                                                    <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <h5 class="q">
                                                User
                                            </h5>
                                            <div>
                                                {{ $countUser }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="/admin/shop">
                        <div class="color2">
                            <div class="card shadow-sm rounded">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                                    fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
                                                    <path
                                                        d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <h5 class="q">
                                                Shop
                                            </h5>
                                            <div>
                                                {{ $countShop }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="/admin/shopPending">
                        <div class="color2-1">
                            <div class="card shadow-sm rounded">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                                    fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
                                                    <path
                                                        d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <h5 class="q">
                                                Shop Pending
                                            </h5>
                                            <div>
                                                {{ $countShopPending }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 mb-3">
                    <a href="/admin/product">
                        <div class="color3">
                            <div class="card shadow-sm rounded">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                                    fill="currentColor" class="bi bi-box" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5 8.186 1.113zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <h5 class="q">
                                                Products
                                            </h5>
                                            <div>
                                                {{ $countPruduct }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 ">
                    <a href="/admin/productRequest">
                        <div class="color4">
                            <div class="card shadow-sm rounded">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                                    fill="currentColor" class="bi bi-box" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5 8.186 1.113zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <h5 class="q">
                                                Pending
                                            </h5>
                                            <div>
                                                {{ $countPruductPending }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="/admin/category">
                        <div class="color5">
                            <div class="card shadow-sm rounded">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                                    fill="currentColor" class="bi bi-box" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5 8.186 1.113zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <h5 class="q">
                                                Categories
                                            </h5>
                                            <div>
                                                {{ $countCate }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="/admin/secondary-category">
                        <div class="color6">
                            <div class="card shadow-sm rounded">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                                    fill="currentColor" class="bi bi-box" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5 8.186 1.113zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <h5 class="q">
                                                Small
                                            </h5>
                                            <div>
                                                {{ $countSmallCate }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="/admin/brand">
                        <div class="color7">
                            <div class="card shadow-sm rounded">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                                    fill="currentColor" class="bi bi-box" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5 8.186 1.113zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <h5 class="q">
                                                Brands
                                            </h5>
                                            <div>
                                                {{ $countBrand }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="row pt-3">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <div>
                            <h5>
                                Total Order
                            </h5>
                        </div>
                        <div>
                            <span><strong>{{ $sumTotalOrder }}$</strong></span> /{{ $countOrder }} orders
                        </div>
                        <div>
                            {{ $totalProductOrder }} Items
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <div>
                            <h5>
                                Order In Pending
                            </h5>
                        </div>
                        <div>
                            <span><strong>{{ $sumOrderPending }}$</strong></span> / {{ $countOrderPending }} orders
                        </div>
                        <div>
                            {{ $pendingProductOrder }} Items
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <div>
                            <h5>
                                Order In Proccessing
                            </h5>
                        </div>
                        <div>
                            <span><strong>{{ $sumOrderProccess }}$</strong></span> / {{ $countOrderProccess }} orders
                        </div>
                        <div>
                            {{ $proccessProductOrder }} Items
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <div>
                            <h5>
                                Old Order
                            </h5>
                        </div>
                        <div>
                            <span><strong>{{ $sumOrderDelivery }}$</strong></span> / {{ $countOrderDelivery }} orders
                        </div>
                        <div>
                            {{ $deliveryProduct }} Items
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        $no = 1;
        $no2 = 1;
        ?>
        <div class="big-card mt-4">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="card shadow rounded">
                        <div class="p-3">
                            <h5 class="pl-2">
                                Best Sale
                            </h5>
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Subcategory</th>
                                        <th scope="col">Sale</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < 5; $i++)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>....</td>
                                            <td>....</td>
                                            <td>....</td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-dark">
                                                    View
                                                </button>
                                            </td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                        <div class="pl-3">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="card shadow rounded">
                        <div class="p-3">
                            <h5 class="pl-2">
                                Out Of Stock
                            </h5>
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Subcategory</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < 5; $i++)
                                        <tr>
                                            <td>{{ $no2++ }}</td>
                                            <td>....</td>
                                            <td>....</td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-dark">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-chat-square-dots"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1h-2.5a2 2 0 0 0-1.6.8L8 14.333 6.1 11.8a2 2 0 0 0-1.6-.8H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                                        <path
                                                            d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                        <div class="pl-3">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
