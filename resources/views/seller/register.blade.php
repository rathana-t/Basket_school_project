@extends('seller/components/register')
@section('content')
    <div class="container mt-3">
        <div class="login">
            <h1 class="text-center mt-5 mb-4">
                Register
            </h1>
            <div class="row justify-content-center">
                <div class="col-md-6">

                    <form action="{{ url('sellerRegister') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card shadow-sm">
                            <div class="m-4">
                                <div class="form-group">
                                    <label for="text">Store name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="store_name"
                                        value="{{ old('store_name') }}">
                                    {!! $errors->first('store_name', "<span class='text-danger'>:message</span>") !!}
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="exampleInputPhone" name="email"
                                        value="{{ old('email') }}">
                                    {!! $errors->first('email', "<span class='text-danger'>:message</span>") !!}
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone number</label>
                                    <input type="number" class="form-control" id="exampleInputPhone" name="phone"
                                        value="{{ old('phone') }}">
                                    {!! $errors->first('phone', "<span class='text-danger'>:message</span>") !!}
                                </div>
                                <div class="form-group">
                                    <label for="address">Address or Location</label>
                                    <input type="text" class="form-control" id="exampleInputPhone" name="address"
                                        value="{{ old('address') }}">
                                    {!! $errors->first('address', "<span class='text-danger'>:message</span>") !!}
                                </div>
                                <div class="previewImage">
                                    <div class="row">
                                        <div class="col-3 imgUp">
                                            <div class="card border-0 shadow-sm rounded">
                                                <div class="imagePreview">
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
                                        </div>
                                        <div class="col-3 imgUp">
                                            <div class="card border-0 shadow-sm rounded">
                                                <div class="imagePreview">
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
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                        name="password">
                                    {!! $errors->first('password', "<span class='text-danger'>:message</span>") !!}
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Confirm Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                        name="con_password">
                                    {!! $errors->first('con_password', "<span class='text-danger'>:message</span>") !!}
                                </div>
                                {{-- <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Remember me!</label>
                                </div> --}}

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
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
                        uploadFile.closest(".imgUp").find('.imagePreview').css("background-image",
                            "url(" + this.result + ")");
                    }
                }

            });
        });
    </script>
@stop
