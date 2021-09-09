@extends('admin\admin')

@section('sidebar-content')
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <h5>
        Add Province
    </h5>
    <form action="{{ route('addProvince') }}" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-4">
                <input class="form-control form-control-lg" name="province" type="text" placeholder="...">
            </div>
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-lg btn-dark">
                    Add
                </button>
            </div>
        </div>
        {!! $errors->first('province', "<span class='text-danger'>:message</span>") !!}
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
