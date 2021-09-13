@extends('admin\admin')

@section('sidebar-content')
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    Edit Term and Condition
    <form class="form-group" action="{{ url('admin/update_TNC') }}" method="POST">
        @csrf
        <input type="text" hidden value="{{ $getTNC->id }}" name="id" class="input">
        <input type="text" name="title" value="{{ $getTNC->title }}" class="input">
        <textarea name="description" id="" cols="30" rows="10">{{ $getTNC->text }}</textarea>
        <button type="submit">
            update
        </button>
    </form>
@stop
