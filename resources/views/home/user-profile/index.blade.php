@extends('application')

@section('content')

    @include('/home/components/navbar_user')
    <h4 class="text-warning mt-2">Welcome back {{ $data_user->username }}</h4>
@endsection
