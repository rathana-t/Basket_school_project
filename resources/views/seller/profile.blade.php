@extends('layouts\sidebar')

@section('sidebar-content')
    <div class="container">
        <div class="text-center">
            <h1>
                This is profile page
            </h1>
            {{ $data_seller->store_name }}
            <br>
            {{ $data_seller->email }}
            <br>
            {{ $data_seller->address }}

        </div>
    </div>

   
            <button class="btn btn-danger" onclick="document.getElementById('id01').style.display='block'">Log Out</button>

        <div id="id01" class="modal">
            <div class="container">
                <div class="alert alert-warning" role="alert">
                    <p>Are you sure! you want to logout?</p>
                    <div class="d-flex justify-content-center">
                        <button type="button" onclick="document.getElementById('id01').style.display='none'"
                            class="btn btn-secondary">Cancel</button>
                        <form action="/logout_seller" method="GET">
                            <button type="submit" onclick="document.getElementById('id01').style.display='none'"
                                class="btn btn-danger">LogOut</button>
                        </form>
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
@stop
