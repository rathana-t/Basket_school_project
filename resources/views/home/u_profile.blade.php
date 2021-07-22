@extends('application')

@section('content')
    <div class="container text-center">
        <div class="mt-5">
            <h3>{{ $data_user->username }}</h3>
            <h3>{{ $data_user->phone }}</h3>
            <button class="btn btn-danger" onclick="document.getElementById('id01').style.display='block'">Log Out</button>
        </div>
        <br>
        <br>
            <a href="{{ url('/sellerLogInPage') }}">Register a Seller</a>
        <div id="id01" class="modal">
            <div class="container">
                <div class="alert alert-warning" role="alert">
                    <p>Are you sure! you want to logout?</p>
                    <div class="d-flex justify-content-center">
                        <button type="button" onclick="document.getElementById('id01').style.display='none'"
                            class="btn btn-secondary">Cancel</button>
                        <form action="/logout" method="GET">
                            <button type="submit" onclick="document.getElementById('id01').style.display='none'"
                                class="btn btn-danger">LogOut</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        var modal = document.getElementById('id01');
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

@endsection
