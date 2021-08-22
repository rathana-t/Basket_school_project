@extends('application')

@section('content')

    @include('/home/components/navbar_user')
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
                                <label for="description">Email</label>
                                <input type="email" name="email" value="{{ $data_user->email }}" class="form-control"
                                    style="width: 300px" placeholder="Enter email...">
                                @if ($data_user->email == '')
                                    <span class='text-danger'>You should fill email, it can help when you forget your
                                        password!</span>
                                @endif
                                {!! $errors->first('email', "<span class='text-danger'>Email field is required.</span>") !!}
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
    @if (Session::has('done'))
        <script>
            $(document).ready(function() {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Your profile has been updated',
                    showConfirmButton: false,
                    timer: 1500
                })
            });
        </script>
    @endif
@endsection
