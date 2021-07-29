@extends('layouts\sidebar')

@section('sidebar-content')
    <div class="container">
        <div class="text-center">
            heloo
            <div>
                {{ $message->msg }}
            </div>
        </div>
    </div>
@stop
