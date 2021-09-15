@extends('application')

@section('content')

    @include('/home/components/navbar_user')
    <div class="container pt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card cs-shadow rounded border-0">
                    <div class="card-body">
                        <h4 class="pb-3">
                            Phone Number: {{ $data_user->phone }}
                        </h4>
                        <form action="{{ route('update-profile', $data_user->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="description">Name</label>
                                        <input type="text" name="username" value="{{ $data_user->username }}"
                                            class="form-control form-control-lg">
                                        {!! $errors->first('username', "<span class='text-danger'>username field is required.</span>") !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Email</label>
                                <input type="email" name="email" value="{{ $data_user->email }}"
                                    class="form-control form-control-lg" placeholder="Enter email...">
                                {{-- @if ($data_user->email == '')
                                    <small class='text-danger'>
                                        You should fill email, it can help when you forget your password!
                                    </small>
                                @endif --}}
                                {!! $errors->first('email', "<span class='text-danger'>:message</span>") !!}
                            </div>
                            <div class="form-group">
                                <label for="inputState">City/Province</label>
                                <select id="inputState" class="form-control form-control-lg" name="province">
                                    @if ($data_user->province_id == '')
                                        <option value="" selected>choose City/Province</option>
                                    @endif
                                    @foreach ($provinces as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id == $data_user->province_id ? 'selected' : '' }}>
                                            {{ $item->province }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Address</label>
                                <textarea rows="4" class="form-control" id=""
                                    name="address">{{ $data_user->address }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary col-12">
                                <div class="p-1">
                                    Update
                                </div>
                            </button>
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
