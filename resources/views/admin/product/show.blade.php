@extends('admin\admin')

@section('sidebar-content')
    <div class="text-center">
        <h1>
            this is show page
        </h1>
        @foreach ($detail_pro as $item)
            <p>
                {{ $item->name }}

            </p>
            <p>
                {{ $item->price }}

            </p>
            <p>
                {{ $item->stock }}

            </p>
            <p>
                {{ $item->cat_name }}

            </p>
            <p>
                {{ $item->brand_name }}

            </p>
            <p>
                {{ $item->seller_id }}

            </p>
            <p>
                {{ $item->store_name }}

            </p>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Launch demo modal
            </button>

            <form method="POST" enctype="multipart/form-data" action="{{ route('category_store') }}">
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ,,
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endforeach
    </div>
@stop
