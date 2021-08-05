@extends('application')

@section('content')

    @include('/home/components/navbar_user')
    <div class="container">
        <form action="">
            <div class="form-group mb-4 mt-4">
                <p>Name</p>
                <input type="text" placeholder="{{ $data_user->username }}">
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
