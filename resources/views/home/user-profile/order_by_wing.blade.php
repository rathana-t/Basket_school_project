@extends('application')

@section('content')
    <style>
        .payment button {
            width: 300px;
        }

    </style>
    <div class="container">
        {{-- <div class="deatail_page pt-4">
            <div class="card">
                <div class="row">
                    <div class="col-md-6 border-right">
                        <img id="main" src="{{ asset('wing_thumbnail.png') }}" alt="" class="img-fluid p-4">
                    </div>
                    <div class="col-md-6">
                        <div class="p-4">
                            <h5>
                                Payment Info
                            </h5>
                            <form action="{{ url('order-product') }}" method="POST">
                                @csrf
                                <input type="hidden" name="payment" value="{{ $payment }}" id="">
                                <input type="hidden" name="address" value="{{ $address }}" id="">
                                <label for="exampleInputEmail1" class="mt-2">Wing Account</label>
                                <input type="number" required class="form-control text-center" name="wing_account" id=""
                                    placeholder="##########">
                                <label for="exampleInputEmail1" class="mt-2">Year Of Birth</label>
                                <input type="number" required class="form-control text-center" name="year_birth" id=""
                                    placeholder="YYYY">
                                <label for="exampleInputEmail1" class="mt-2">PIN</label>
                                <input type="number" required class="form-control text-center" name="pin" id=""
                                    placeholder="PIN...">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary mt-3">
                                        Pay Now
                                    </button>
                                </div>
                            </form>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="pt-4 payment">
            <div class="card border-0 shadow-sm">
                <div class="row">
                    <div class="col-md-6 border-right">
                        <img id="main" src="{{ asset('wing_thumbnail.png') }}" alt="" class="img-fluid p-4">
                    </div>
                    <div class="col-md-6 align-self-center">
                        <div class="p-4">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Payment Info</strong>
                                </div>
                                <div class="card-body">
                                    @if ($card == '')
                                        <form action="{{ url('order-product-payment') }}" method="POSt">
                                            @csrf
                                            <input type="hidden" name="address" value="{{ $address }}" id="">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="mt-2">ID Card</label>
                                                <input type="number" class="form-control text-center" name="id_card"
                                                    value="{{ old('id_card') }}" id="exampleInputIDCARD"
                                                    placeholder="#### #### #### ####" maxlength="16">
                                                {!! $errors->first('id_card', "<span class='text-danger'>:message</span>") !!}
                                            </div>

                                            <label for="exampleInputEmail1" class="mt-2">Expiration</label>

                                            <div class="form-row cvv">
                                                <div class="col-md-2">
                                                    <select class="form-control form-control-sm" name="month">
                                                        @for ($i = 1; $i < 13; $i++)
                                                            @if ($i == '10' || $i == '11' || $i == '12')
                                                                <option value="{{ $i }}">
                                                                    {{ $i }}</option>
                                                            @else
                                                                <option value="{{ $i }}">
                                                                    0{{ $i }}
                                                                </option>
                                                            @endif
                                                        @endfor
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <select class="form-control form-control-sm" name="year">
                                                        <?php
                                                        $year = date('Y');
                                                        ?>
                                                        @for ($i = $year; $i < $year + 10; $i++)
                                                            <option value="{{ $i }}">
                                                                {{ $i }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="number" min="0" id="cvv" name="cvv"
                                                        class="form-control form-control-sm" placeholder="CVV"
                                                        value="{{ old('cvv') }}">
                                                </div>
                                                {!! $errors->first('cvv', "<span class='text-danger'>:message</span>") !!}
                                            </div>
                                            <hr>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    Pay Now
                                                </button>
                                            </div>
                                        </form>
                                    @else
                                        <form action="{{ url('order-product-payment') }}" method="POSt">
                                            @csrf
                                            <input type="hidden" name="address" value="{{ $address }}" id="">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="mt-2">ID Card</label>
                                                <input type="number" class="form-control text-center" name="id_card"
                                                    value="{{ old('id_card') == '' ? $card->number : old('id_card') }}"
                                                    id="exampleInputIDCARD" placeholder="#### #### #### ####"
                                                    maxlength="16">
                                                {!! $errors->first('id_card', "<span class='text-danger'>:message</span>") !!}
                                            </div>

                                            <label for="exampleInputEmail1" class="mt-2">Expiration</label>

                                            <div class="form-row cvv">
                                                <div class="col-md-2">
                                                    <select class="form-control form-control-sm" name="month">
                                                        @for ($i = 1; $i < 13; $i++)
                                                            @if ($i == '10' || $i == '11' || $i == '12')
                                                                <option value="{{ $i }}">
                                                                    {{ $i }}</option>
                                                            @else
                                                                <option value="{{ $i }}">
                                                                    0{{ $i }}
                                                                </option>
                                                            @endif
                                                        @endfor
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <select class="form-control form-control-sm" name="year">
                                                        <?php
                                                        $year = date('Y');
                                                        ?>
                                                        @for ($i = $year; $i < $year + 10; $i++)
                                                            <option value="{{ $i }}"
                                                                {{ $i == $card->year ? 'selected' : '' }}>
                                                                {{ $i }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="number" min="0" id="cvv" name="cvv"
                                                        class="form-control form-control-sm" placeholder="CVV"
                                                        value="{{ old('cvv') == '' ? $card->cvv : old('cvv') }}">
                                                </div>
                                                {!! $errors->first('cvv', "<span class='text-danger'>:message</span>") !!}
                                            </div>
                                            <hr>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    Pay Now
                                                </button>
                                            </div>
                                        </form>
                                    @endif



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
