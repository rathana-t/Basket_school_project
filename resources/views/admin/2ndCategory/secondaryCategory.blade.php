@extends('admin\admin')

@section('sidebar-content')
    @include('/admin/components/modal')

    <div class="text-left">
        <a href="{{ url('/admin/add-secondarycategory') }}" class="btn btn-sm btn-success"> Add New Category </a>
    </div>
    {{-- <div style="min-height: 75vh">

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">ID</th>
                    <th scope="col">Secondary category name</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($seCategory as $item)
                    <tr class="list">
                        <td>
                            <a>
                                <img src="/images/secondCategory/{{ $item->secondarycategory_img }}" alt="">
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
                            <button type="button" value="{{ $item->id }}" class="delete_se_cate btn btn-danger">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $seCategory->links() }} --}}
    @foreach ($category as $item1)
        <div style="margin-top:10px;">
            <span style="color: black">{{ $item1->name }}</span>
            <div class="category pt-3 ">
                <div class="category-item">
                    <div class="row mt-3">
                        @foreach ($second_cate as $item)
                            @if ($item1->id == $item->category_id)
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="card mb-3">
                                        <div class="m-3">
                                            <p>{{ $item->name }}</p>
                                            {{-- <a href="/smallcate/{{ $item->id }}"> --}}
                                            <div class="text-center">
                                                <img src="/images/secondCategory/{{ $item->secondarycategory_img }}"
                                                    alt="" class="img-fluid mb-3">
                                            </div>
                                            {{-- </a> --}}
                                            <div class="text-right">
                                                <button type="button" value="{{ $item->id }}"
                                                    class="delete_se_cate btn btn-sm btn-outline-dark">
                                                    Delete
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@stop
