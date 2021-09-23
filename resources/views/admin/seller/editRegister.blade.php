@extends('seller/components/register')
@section('content')

    <style>
        .test1 {
            min-height: 380px;
            transition: all 2s linear;
        }

        .test2 {
            min-height: 380px;
            transition: all 2s linear;
            display: none;
        }

    </style>

    <div class="container mt-4 seller-reg">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card border-0 cs-shadow rounded">
                    <div class="card-body">
                        <h5 class="pb-3">
                            Register
                        </h5>
                        @if (session('success_regiter_seller'))
                            <div class="text-success text-center" role="alert">
                                {{ session('success_regiter_seller') }}
                            </div>
                        @endif

                        <form action="{{ url('admin/sellerEditRegister/' . $token) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-row pb-4">
                                <div class="col">
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="store_name"
                                        value="{{ $seller->store_name }}" placeholder="Shop Name">
                                    {!! $errors->first('store_name', "<span class='text-danger'>:message</span>") !!}

                                </div>
                                <div class="col">
                                    <input type="number" class="form-control" id="exampleInputPhone" name="phone"
                                        value="{{ $seller->phone }}" placeholder="Phone Number">
                                    {!! $errors->first('phone', "<span class='text-danger'>:message</span>") !!}

                                </div>
                            </div>
                            <div class="form-group pb-2">
                                <input type="email" class="form-control" id="exampleInputPhone" name="email"
                                    value="{{ $seller->email }}" placeholder="Email">
                                <small class="text-muted">
                                    We will never share your email with anyone else.
                                </small>
                                {!! $errors->first('email', "<span class='text-danger'>:message</span>") !!}

                            </div>

                            <div class="form-row pb-2">
                                <div class="col">
                                    <select class="custom-select" id="validationDefault04" name="province_id">
                                        <option value="" selected>City/Province</option>
                                        @foreach ($provinces as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $seller->province_id == $item->id ? 'selected' : '' }}>
                                                {{ $item->province }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <small class="form-text text-muted pb-2">
                                        You Can Change Your information Later.
                                    </small>
                                    {!! $errors->first('province_id', "<span class='text-danger'>Please select this field</span>") !!}

                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="address"
                                        value="{{ $seller->address }}" id="exampleInputEmail1" placeholder="Address">
                                    {!! $errors->first('address', "<span class='text-danger'>:message</span>") !!}

                                </div>
                            </div>
                            <div class="form-row pb-4">
                                <div class="col">
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="password"
                                        placeholder="Password">
                                    {!! $errors->first('password', "<span class='text-danger'>:message</span>") !!}

                                </div>
                                <div class="col">
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                        name="con_password" placeholder="Confirm Password">
                                    {!! $errors->first('con_password', "<span class='text-danger'>:message</span>") !!}

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Citizen Card</label>
                                <div class="previewImage">
                                    <div class="row">
                                        <div class="col-md-6 imgUp">
                                            <div class="card">
                                                <div class="imagePreview2"
                                                    style="background-image: url('{{ asset('images/sellerImg1') }}/{{ $seller->img1 }}')">
                                                    <div class="hero-text">
                                                        <div class="d-flex justify-content-center">
                                                            <label class="btn btn-dark btn-sm">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-plus-circle" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                                    <path
                                                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                                </svg>
                                                                <input type="file" class="uploadFile img"
                                                                    value="Upload Photo" accept="image/*" name="img1"
                                                                    style="width: 0px;height: 0px;overflow: hidden;">
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {!! $errors->first('img1', "<span class='text-danger'>:message</span>") !!}

                                        </div>
                                        <div class="col-md-6 imgUp">
                                            <div class="card">
                                                <div class="imagePreview2"
                                                    style="background-image: url('{{ asset('images/sellerImg2') }}/{{ $seller->img2 }}')">
                                                    <div class="hero-text">
                                                        <div class="d-flex justify-content-center">
                                                            <label class="btn btn-dark btn-sm">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-plus-circle" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                                    <path
                                                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                                </svg>
                                                                <input type="file" class="uploadFile img"
                                                                    value="Upload Photo" accept="image/*" name="img2"
                                                                    style="width: 0px;height: 0px;overflow: hidden;">
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {!! $errors->first('img2', "<span class='text-danger'>:message</span>") !!}

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary col-12">Submit</button>
                            <small class="text-muted">
                                By clicking the 'Submit' button, you confirm that you accept our Terms of use and Privacy
                                Policy.
                                <span>
                                    <a target="blank" href="/Term_and_Condition/seller">
                                        Term and Condition
                                    </a>
                                </span>
                            </small>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#next").click(function() {
                $(".test1").hide();
                $(".test2").show();
            });
            $("#pre").click(function() {
                $(".test2").hide();
                $(".test1").show();
            });
        });
        $(function() {
            $(document).on("change", ".uploadFile", function() {
                var uploadFile = $(this);
                var files = !!this.files ? this.files : [];
                if (!files.length || !window.FileReader)
                    return; // no file selected, or no FileReader support

                if (/^image/.test(files[0].type)) { // only image file
                    var reader = new FileReader(); // instance of the FileReader
                    reader.readAsDataURL(files[0]); // read the local file

                    reader.onloadend = function() { // set image data as background of div
                        //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
                        uploadFile.closest(".imgUp").find('.imagePreview2').css("background-image",
                            "url(" + this.result + ")");
                    }
                }
            });
        });
    </script>
@stop
