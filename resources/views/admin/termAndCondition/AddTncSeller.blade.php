@extends('admin\admin')

@section('sidebar-content')
    @include('/admin/components/modal')
    <div class="dashboard">
        <div class="small-card">
            <div class="text-center">
                <strong>
                    Term and Condition
                </strong>

            </div>
            <div class="row justify-content-center">
                <div class="col-md-3 col-sm-6 col-xs-12 mb-3">
                    <a href="/admin/addTNCuser" class="Product-btn" role="button">
                        <div class="card shadow-sm rounded bg-light">
                            <div class="card-body text-dark">
                                <div class="q text-center">
                                    USER
                                </div>
                                <div class="text-center">
                                    {{ $countTNC }}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 ">
                    <a href="/admin/addTNCseller">
                        <div class="card shadow-sm rounded bg-dark">
                            <div class="card-body text-white">
                                <div class="q text-center">
                                    SELLER
                                </div>
                                <div class="text-center">
                                    {{ $countTNCseller }}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <div>
        <h5 class="mt-3">
            Add Term and Condition for seller
        </h5>
        <form action="{{ url('/admin/add-TNC-seller') }}" method="POST">
            @csrf
            <div class="form-group  text-center">
                <input class="form-control" name="title" type="text" placeholder="title" required>
            </div>
            <div class="form-group  text-center">
                <textarea class="form-control" rows="6" name="description" type="text" placeholder="description"
                    required></textarea>
            </div>
            <div class="form-group  text-center">
                <button type="submit" class="btn btn-dark" style="width: 300px">
                    Add
                </button>
            </div>
            {!! $errors->first('province', "<span class='text-danger'>:message</span>") !!}
        </form>
    </div>

    <div class="row mt-2">
        <div class="col-md-12">
            <div class="card cs-shadow border-0">
                <div class="card-body">
                    <div class="border-bottom text-center">
                        <h2>Term and Conditions <a target="blank" href="/Term_and_Condition/seller">
                                <button class="btn btn-success">view</button>
                            </a>
                            <h2>
                    </div>
                    @foreach ($getTNC as $item)
                        <br>
                        <a href="{{ url('admin/edit_t_n_c', $item->id) }}" style="text-decoration: none">
                            <button class="btn btn-sm btn-primary ">
                                Edit
                            </button>
                        </a>
                        <a href="{{ url('admin/delete_term_condition', $item->id) }}" style="text-decoration: none">
                            <button class="btn btn-sm btn-danger ">
                                Delete
                            </button>
                        </a>
                        <br>

                        <br>
                        <h2>{{ $item->title }}</h2>
                        <div class="text-left mt-3">
                            <div>
                                <?php
                                echo nl2br(e($item->text));
                                ?>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
