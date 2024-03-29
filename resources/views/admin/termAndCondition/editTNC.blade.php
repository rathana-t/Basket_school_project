@extends('admin\admin')

@section('sidebar-content')
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <h4 class="text-center">Edit Term and Condition</h4>
    <form class="form-group" action="{{ url('admin/update_TNC') }}" method="POST">
        @csrf
        <input type="text" hidden value="{{ $getTNC->id }}" name="id" class="input">
        <strong for="">Title</strong>
        <input type="text" name="title" value="{{ $getTNC->title }}" class="input form-control" required>
        <strong for="">Description</strong>
        <textarea name="description" id="" cols="30" rows="10" class="form-control"
            required>{{ $getTNC->text }}</textarea>
        <div class="text-center" style="margin-top: 10px ">
            <button type="submit" class="btn btn-primary col-4">
                Update
            </button>
        </div>
    </form>
@stop
