@extends('layouts\sidebar')

@section('sidebar-content')
    <div class="container">
        <div class="text-center">
            heloo
            <h1>
                {{ $message->msg }}
            </h1>
        </div>
    </div>
@stop
