@extends('admin\admin')

@section('sidebar-content')
    <div class="text-center">
        <h1>
            This is product request page
        </h1>
        @foreach ($detail_pro as $item)
            <p>{{ $item->name }}</p>
            <p>{{ $item->price }}</p>
            <p>{{ $item->stock }}</p>
            <p>{{ $item->cat_name }}</p>
            <p>{{ $item->brand_name }}</p>
            <p>{{ $item->seller_id }}</p>
            <p>{{ $item->store_name }}</p>

            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#confirm_product">
                Send report
            </button>

            <div class="modal fade" id="confirm_product" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            Are you sure?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a href="/admin/productRequestUpdate/{{ $item->id }}" class="btn btn-primary">
                                Confirm
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop
