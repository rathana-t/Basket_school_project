@extends('admin\admin')

@section('sidebar-content')
    <h5>
        Add Province
    </h5>
    <form action="">
        <div class="form-row">
            <div class="form-group col-md-4">
                <input class="form-control form-control-lg" type="text" placeholder="...">
            </div>
            <div class="form-group col-md-4">
                <button class="btn btn-lg btn-dark">
                    Add
                </button>
            </div>
        </div>
    </form>
    {{-- <hr style="width: 70%"> --}}
    <div class="row mt-2">
        @foreach ($provinces as $item)
            <div class="col-md-3">
                <div class="card cs-shadow border-0">
                    <div class="card-body text-center">
                        {{ $item->province }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop
