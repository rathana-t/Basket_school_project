@extends('admin\admin')

@section('sidebar-content')
    <div class="text-center">
        <h1>
            This is product request page
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

            <a href="/admin/productRequestUpdate/{{ $item->id }}" class="btn btn-success">
                Confirm
            </a>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Send report
            </button>

            <form method="POST" enctype="multipart/form-data" action="{{ route('sendMsg') }}">
                @csrf
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
                                <input type="hidden" value="{{ $item->seller_id }}" name="seller_id">
                                <input type="hidden" value="1" name="sent">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Message</label>
                                    <textarea type="text" class="form-control" id="exampleFormControlTextarea1" rows="3"
                                        name="msg"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endforeach
    </div>
@stop
