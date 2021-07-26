@extends('application')

@section('content')
    <div class="container">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        Are you sure?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <form action="/logout" method="GET">
                            <button type="submit" class="btn btn-primary">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <div class="mt-5">
                <h3>{{ $data_user->username }}</h3>
                <h3>{{ $data_user->phone }}</h3>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                    Logout
                </button>
            </div>
            <br>
            <br>
            <a href="{{ url('/sellerLogInPage') }}">Register a Seller</a>
        </div>
    </div>
@endsection
