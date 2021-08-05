@extends('application')

@section('content')

    @include('/home/components/navbar_user')
    <div class="container">
        <form action="{{ route('update-profile', $data_user->id) }}" method="POST">
            @csrf
            <div class="form-group mb-4 mt-4">
                <div class="form-group">
                    <strong>Name</strong>
                    <input type="text" name="username" value="{{ $data_user->username }}" class="form-control">
                    {!! $errors->first('username', "<span class='text-danger'>username field is required.</span>") !!}
                </div>
            </div>
            <div class="form-group">
                <p>Gender</p>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1"
                        checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Male
                    </label>
                </div>
                <div class="form-check form-check-inline ml-3">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                        Female
                    </label>
                </div>
                <div class="form-check form-check-inline ml-3">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3">
                    <label class="form-check-label" for="exampleRadios3">
                        Other
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="description">Shipping Address(Option)</label>
                <textarea rows="2" class="form-control" id="" name="description"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Change</button>
        </form>
    </div>
@endsection
