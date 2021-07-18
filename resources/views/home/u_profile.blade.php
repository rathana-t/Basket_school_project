@extends('application')

@section('content')

<h3>{{ $data_user->username }}</h3>
<h3>{{ $data_user->phone }}</h3>

<button class="btn btn-danger" onclick="document.getElementById('id01').style.display='block'">Log Out</button>























<div id="id01" class="modal">
    <form class="modal-content" action="/action_page.php">
      <div class="con">
        <h1>Delete this</h1>
        <p>Are you sure! you want to logOut?</p>
        <div class="clearfix">
          <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn tmenh">Cancel</button>
                                      {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}
          <button type="submit" onclick="document.getElementById('id01').style.display='none'" class="deletebtn tmenh"><a href="{{ url('logout') }}">LogOut</a></button>
        </div>
      </div>
    </form>
  </div>


<script>
    // Get the modal
    var modal = document.getElementById('id01');
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
    </script>

@endsection {{-- @stop  --}}

