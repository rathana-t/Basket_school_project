@extends('admin\admin')

@section('sidebar-content')
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <h5>
        Add TermAndCondition
    </h5>
    <form action="/admin/add-TNC" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-4">
                <input class="form-control form-control-lg" name="TNC" type="text" placeholder="...">
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
        <div class="col-md-12">
            <div class="card cs-shadow border-0">
                <div class="card-body">
                    <div class="border-bottom text-center">
                        <h2>Term and Conditions<h2>
                    </div>
                    @foreach ($getTNC as $item)
                        <div class="text-left mt-3">
                            {{ $item->text }}
                            <br>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop
