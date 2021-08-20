@extends('admin\admin')

@section('sidebar-content')
    @include('/admin/components/modal')

    {{-- <div style="min-height: 75vh">

        <table class="table table-hover seller-list">
            <thead>
                <tr class="text-center">
                    <th scope="col" class="text-left">Image</th>
                    <th scope="col" class="text-left">ID</th>
                    <th scope="col" class="text-left">Brand</th>
                    <th scope="col" class="text-left">Created at</th>
                    <th scope="col" class="text-left">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($brands as $item)
                    <tr>
                        <td>
                            <a>
                                <img src="/images/brandImages/{{ $item->brand_img }}" alt="" style="object-fit: contain">
                            </a>
                        </td>
                        <td>
                            <a>
                                {{ $item->id }}
                            </a>
                        </td>
                        <td>
                            <a>
                                {{ $item->name }}
                            </a>
                        </td>
                        <td>
                            <a>
                                {{ $item->created_at }}
                            </a>
                        </td>
                        <td>
                            <a href="product/{{ $item->id }}">
                                <button type="button" class="btn btn-info">View</button>
                            </a>
                            <button type="button" value="{{ $item->id }}" class="delete_brand_btn btn btn-danger">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> --}}
    <div class="text-left">
        <a href="{{ url('/admin/add-brand') }}" class="btn btn-sm btn-success"> Add New Brand </a>
    </div>
    <div class="brand pt-3">
        <div class="brand-item">
            <div class="row">
                @foreach ($brands as $item)
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="card mb-3">
                            <div class="p-3 text-center">
                                {{-- <a href="/brand/{{ $item->id }}"> --}}
                                <img src="/images/brandImages/{{ $item->brand_img }}" alt="" class="img-fluid">
                                <div class="border-bottom pb-2 pt-1"></div>
                                <div class="pt-2">
                                    @foreach ($result as $a)
                                        @if ($a->brand_id == $item->id)
                                            {{ $a->total_pro }}
                                        @endif
                                    @endforeach
                                    <span>Products</span>
                                </div>
                                {{-- </a> --}}
                                <div class="text-right">
                                    <button type="button" value="{{ $item->id }}"
                                        class="delete_brand_btn btn btn-sm btn-outline-dark">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop
