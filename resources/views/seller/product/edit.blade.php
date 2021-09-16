@extends('seller\seller')

@section('sidebar-content')
    <div class="container">
        <div class="text-center">
            <h5 class="mb-3">
                Update Info
            </h5>
        </div>
        @foreach ($pros as $pro)

            <form action="{{ route('update_pro', $pro->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card shadow-sm">
                    <div class="m-4">
                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input type="text" class="form-control" id="exampleInputPhone" value="{{ $pro->name }}"
                                name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="exampleInputPhone" value="{{ $pro->price }}"
                                name="price" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea rows="3" class="form-control" id="exampleInputPhone" name="description" required
                                {{ old('description') }}>{{ $pro->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="number" class="form-control" id="" value="{{ $pro->stock }}" name="stock"
                                min="0" required>
                        </div>
                        <div class="form-group">

                            <div class="row">
                                <div class="col">
                                    <label for="exampleFormControlSelect1">Brand</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="brand_id" required>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}" @if ($brand->id == $pro->brand_id) selected @endif>
                                                {{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlSelect1">Secondary Category</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="category_id"
                                        required>
                                        @foreach ($cats as $cat)
                                            <option value="{{ $cat->id }}" @if ($cat->id == $pro->s_cat_id) selected @endif>{{ $cat->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 mb-3">
                            Images
                        </div>


                        <div class="previewImage">
                            <div class="row">
                                <div class="col-3 imgUp">
                                    <div class="card border-0 shadow-sm rounded">
                                        <div class="imagePreview"
                                            style="background-image:url('{{ asset('images/imgProduct') }}/{{ $pro->img_product }}')">
                                            <div class="hero-text">
                                                <div class="d-flex justify-content-center">
                                                    <label class="btn btn-dark btn-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-plus-circle"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                            <path
                                                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                        </svg>
                                                        <input type="file" class="uploadFile img" value="Upload Photo"
                                                            accept="image/*" name="cover_img"
                                                            style="width: 0px;height: 0px;overflow: hidden;">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 imgUp">
                                    <div class="card border-0 shadow-sm rounded">
                                        <div class="imagePreview"
                                            style="background-image:url('{{ asset('images/imgProduct') }}/{{ $pro->sub_img1 }}')">
                                            <div class="hero-text">
                                                <div class="d-flex justify-content-center">
                                                    <label class="btn btn-dark btn-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-plus-circle"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                            <path
                                                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                        </svg>
                                                        <input type="file" class="uploadFile img" value="Upload Photo"
                                                            accept="image/*" name="sub_img1"
                                                            style="width: 0px;height: 0px;overflow: hidden;">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 imgUp">
                                    <div class="card border-0 shadow-sm rounded">
                                        <div class="imagePreview"
                                            style="background-image:url('{{ asset('images/imgProduct') }}/{{ $pro->sub_img2 }}')">
                                            <div class="hero-text">
                                                <div class="d-flex justify-content-center">
                                                    <label class="btn btn-dark btn-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-plus-circle"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                            <path
                                                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                        </svg>
                                                        <input type="file" class="uploadFile img" value="Upload Photo"
                                                            accept="image/*" name="sub_img2"
                                                            style="width: 0px;height: 0px;overflow: hidden;">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 imgUp">
                                    <div class="card border-0 shadow-sm rounded">
                                        <div class="imagePreview"
                                            style="background-image:url('{{ asset('images/imgProduct') }}/{{ $pro->sub_img3 }}')">
                                            <div class="hero-text">
                                                <div class="d-flex justify-content-center">
                                                    <label class="btn btn-dark btn-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-plus-circle"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                            <path
                                                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                        </svg>
                                                        <input type="file" class="uploadFile img" value="Upload Photo"
                                                            accept="image/*" name="sub_img3"
                                                            style="width: 0px;height: 0px;overflow: hidden;">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 imgUp">
                                    <div class="card border-0 shadow-sm rounded">
                                        <div class="imagePreview"
                                            style="background-image:url('{{ asset('images/imgProduct') }}/{{ $pro->sub_img4 }}')">
                                            <div class="hero-text">
                                                <div class="d-flex justify-content-center">
                                                    <label class="btn btn-dark btn-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-plus-circle"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                            <path
                                                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                        </svg>
                                                        <input type="file" class="uploadFile img" value="Upload Photo"
                                                            accept="image/*" name="sub_img4"
                                                            style="width: 0px;height: 0px;overflow: hidden;">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 imgUp">
                                    <div class="card border-0 shadow-sm rounded">
                                        <div class="imagePreview"
                                            style="background-image:url('{{ asset('images/imgProduct') }}/{{ $pro->sub_img5 }}')">
                                            <div class="hero-text">
                                                <div class="d-flex justify-content-center">
                                                    <label class="btn btn-dark btn-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-plus-circle"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                            <path
                                                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                        </svg>
                                                        <input type="file" class="uploadFile img" value="Upload Photo"
                                                            accept="image/*" name="sub_img5"
                                                            style="width: 0px;height: 0px;overflow: hidden;">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 imgUp">
                                    <div class="card border-0 shadow-sm rounded">
                                        <div class="imagePreview"
                                            style="background-image:url('{{ asset('images/imgProduct') }}/{{ $pro->sub_img6 }}')">
                                            <div class="hero-text">
                                                <div class="d-flex justify-content-center">
                                                    <label class="btn btn-dark btn-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-plus-circle"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                            <path
                                                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                        </svg>
                                                        <input type="file" class="uploadFile img" value="Upload Photo"
                                                            accept="image/*" name="sub_img6"
                                                            style="width: 0px;height: 0px;overflow: hidden;">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 imgUp">
                                    <div class="card border-0 shadow-sm rounded">
                                        <div class="imagePreview"
                                            style="background-image:url('{{ asset('images/imgProduct') }}/{{ $pro->sub_img7 }}')">
                                            <div class="hero-text">
                                                <div class="d-flex justify-content-center">
                                                    <label class="btn btn-dark btn-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-plus-circle"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                            <path
                                                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                        </svg>
                                                        <input type="file" class="uploadFile img" value="Upload Photo"
                                                            accept="image/*" name="sub_img7"
                                                            style="width: 0px;height: 0px;overflow: hidden;">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
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

                        <div class="text-left">
                            <input type="checkbox" name="term_condition" required>
                            <span>Agree with <a href="/Term_and_Condition/seller">Term & Condition</a></span>
                        </div>
                        <div class="text-right mt-3">
                            <button onclick="return IsEmpty();" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        @endforeach
    </div>
    <script>
        function IsEmpty() {
            var cover_img = document.forms['frm'].cover_img.value;
            var sub_img1 = document.forms['frm'].sub_img1.value;
            var sub_img2 = document.forms['frm'].sub_img2.value;
            var sub_img3 = document.forms['frm'].sub_img3.value;
            var sub_img4 = document.forms['frm'].sub_img4.value;
            var sub_img5 = document.forms['frm'].sub_img5.value;
            var sub_img6 = document.forms['frm'].sub_img6.value;
            var sub_img7 = document.forms['frm'].sub_img7.value;
            if (cover_img === "" && sub_img1 === "" && sub_img2 === "" && sub_img3 === "" && sub_img4 === "" && sub_img5 ===
                "" && sub_img6 === "" && sub_img7 === "") {
                alert("Please add picture for your product!");
                return false;
            }
            return true;
        }
    </script>


@stop
