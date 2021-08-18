@extends('application')

@section('content')

    @include('/home/components/navbar_user')
    @if (Session::has('completed'))
        
    @endif
    <div class="container pt-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="p-4">
                        <form action="{{ route('update-profile', $data_user->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="description">Name</label>
                                <input type="text" name="username" value="{{ $data_user->username }}" class="form-control"
                                    style="width: 300px">
                                {!! $errors->first('username', "<span class='text-danger'>username field is required.</span>") !!}
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="inputState">Province</label>
                                        <select id="inputState" class="form-control">
                                            <option selected>Choose province</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Address</label>
                                <textarea rows="4" class="form-control" id=""
                                    name="address">{{ $data_user->address }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
