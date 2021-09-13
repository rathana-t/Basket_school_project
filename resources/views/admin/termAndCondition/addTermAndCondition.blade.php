@extends('admin\admin')

@section('sidebar-content')
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <h5>
        Add Title to user Term and Condition
    </h5>
    <form action="{{ url('/admin/add-title-u') }}" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-4">
                <input class="form-control form-control-lg" name="title" type="text" placeholder="title">
            </div>
            <div class="form-group col-md-4">
                <input class="form-control form-control-lg" name="description" type="text" placeholder="description">
            </div>
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-lg btn-dark">
                    Add
                </button>
            </div>
        </div>
        {!! $errors->first('province', "<span class='text-danger'>:message</span>") !!}
    </form>
    <h5>
        Add Term and Condition to user
    </h5>
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="card cs-shadow border-0">
                <div class="card-body">
                    <div class="border-bottom text-center">
                        <h2>Term and Conditions<h2>
                    </div>
                    @foreach ($getTNC as $item)
                        <br>
                        <a href="{{ url('admin/edit_t_n_c', $item->id) }}">
                            <button>
                                Edit
                            </button>
                        </a>
                        <br>
                        <h2>{{ $item->title }}<h2>
                                {{-- <div class="text-left mt-3"> --}}
                                <br>
                                <div>{{ $item->text }}</div>
                                {{-- </div> --}}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{-- <hr style="width: 70%"> --}}
    <h5 class="mt-3">
        Add Term and Condition to seller
    </h5>
    <form action="/admin/add-TNC-seller" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-4">
                <input class="form-control form-control-lg" name="TNCSeller" type="text" placeholder="...">
            </div>
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-lg btn-dark">
                    Add
                </button>
            </div>
        </div>
        {!! $errors->first('province', "<span class='text-danger'>:message</span>") !!}
    </form>
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="card cs-shadow border-0">
                <div class="card-body">
                    <div class="border-bottom text-center">
                        <h2>Term and Conditions<h2>
                    </div>
                    @foreach ($getTNCseller as $item)
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
