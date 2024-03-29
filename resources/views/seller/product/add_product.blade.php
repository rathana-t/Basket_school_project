@extends('seller\seller')

@section('sidebar-content')
    @include('/seller/components/product')

    <div class="container mt-4">
        @foreach ($cat as $item)
            <form action="{{ route('sellerpostProduct', $item->main_cat_id) }}" name="frm" method="POST"
                enctype="multipart/form-data">

        @endforeach
        @csrf
        <div class="card shadow-sm">
            <div class="m-4">
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" class="form-control" id="exampleInputPhone" name="name" required>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">$</div>
                        </div>
                        <input type="number" class="form-control" id="exampleInputPhone" name="price" step="0.01" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea rows="3" class="form-control" id="exampleInputPhone" name="description" required
                        {{ old('description') }}></textarea>
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" class="form-control" id="" name="stock" required min="0">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="exampleFormControlSelect1">Brand</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="brand_id" required>
                                <option value="{{ old('brand_id') }}">{{ old('category_id') }}</option>

                                @foreach ($brand as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col">
                            <label for="exampleFormControlSelect1">Category</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="category_id" required>
                                <option value="{{ old('category_id') }}">{{ old('category_id') }}</option>
                                @foreach ($cat as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mt-3 mb-3">
                    Images
                </div>
                @include('/seller/components/preViewImg')
                {{-- <div class="form" style="height: 400px">
                    <div class="grid">
                        <div class="form-element">
                            <input type="file" id="file-1" accept="image/*" name="cover_img" required>
                            <label for="file-1" id="file-1-preview">
                                <img src="{{ asset('img_null.jpg') }}" alt="">
                                <div>
                                    <span>+</span>
                                </div>
                                <span>cover image</span>
                            </label>
                        </div>
                        <div class="form-element">
                            <input type="file" id="file-2" accept="image/*" name="sub_img1">
                            <label for="file-2" id="file-2-preview">
                                <img src="{{ asset('img_null.jpg') }}" alt="">
                                <div>
                                    <span>+</span>
                                </div>
                                <span>sub image</span>
                            </label>
                        </div>
                        <div class="form-element">
                            <input type="file" id="file-3" accept="image/*" name="sub_img2">
                            <label for="file-3" id="file-3-preview">
                                <img src="{{ asset('img_null.jpg') }}" alt="">
                                <div>
                                    <span>+</span>
                                </div>
                                <span>sub image</span>

                            </label>
                        </div>
                        <div class="form-element">
                            <input type="file" id="file-4" accept="image/*" name="sub_img3">
                            <label for="file-4" id="file-4-preview">
                                <img src="{{ asset('img_null.jpg') }}" alt="">
                                <div>
                                    <span>+</span>
                                </div>
                                <span>sub image</span>

                            </label>
                        </div>
                        <div class="form-element">
                            <input type="file" id="file-5" accept="image/*" name="sub_img4">
                            <label for="file-5" id="file-5-preview">
                                <img src="{{ asset('img_null.jpg') }}" alt="">
                                <div>
                                    <span>+</span>
                                </div>
                                <span>sub image</span>

                            </label>
                        </div>
                        <div class="form-element">
                            <input type="file" id="file-6" accept="image/*" name="sub_img5">
                            <label for="file-6" id="file-6-preview">
                                <img src="{{ asset('img_null.jpg') }}" alt="">
                                <div>
                                    <span>+</span>
                                </div>
                                <span>sub image</span>

                            </label>
                        </div>
                        <div class="form-element">
                            <input type="file" id="file-7" accept="image/*" name="sub_img6">
                            <label for="file-7" id="file-7-preview">
                                <img src="{{ asset('img_null.jpg') }}" alt="">
                                <div>
                                    <span>+</span>
                                </div>
                                <span>sub image</span>

                            </label>
                        </div>
                        <div class="form-element">
                            <input type="file" id="file-8" accept="image/*" name="sub_img7">
                            <label for="file-8" id="file-8-preview">
                                <img src="{{ asset('img_null.jpg') }}" alt="">
                                <div>
                                    <span>+</span>
                                </div>
                                <span>sub image</span>

                            </label>
                        </div>
                    </div>
                </div> --}}
                <div class="text-left">
                    <input type="checkbox" name="term_condition" required>
                    <span>Agree with <a target="blank" href="/Term_and_Condition/seller">Term & Condition</a></span>
                </div>
                <div class="text-right mt-3">
                    <button onclick="return IsEmpty();" type="submit" class="btn btn-primary">Post</button>
                </div>
            </div>
        </div>
        </form>
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
    {{-- <script>
        function previewBeforeUpload(id) {
            document.querySelector("#" + id).addEventListener("change", function(e) {
                if (e.target.files.length == 0) {
                    return;
                }
                let file = e.target.files[0];
                let url = URL.createObjectURL(file);
                document.querySelector("#" + id + "-preview div").innerText = file.name;
                document.querySelector("#" + id + "-preview img").src = url;
            });
        }

        previewBeforeUpload("file-1");
        previewBeforeUpload("file-2");
        previewBeforeUpload("file-3");
        previewBeforeUpload("file-4");
        previewBeforeUpload("file-5");
        previewBeforeUpload("file-6");
        previewBeforeUpload("file-7");
        previewBeforeUpload("file-8");
    </script> --}}
    {{-- <style>
        .form {
            margin: 0px;
            padding: 0px;
        }

        .form .grid {
            margin: 20px;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px;
        }

        .form .grid .form-element {
            margin-bottom: 50px;
            width: 170px;
            height: 130px;
            box-shadow: 0px 0px 20px 5px rgba(100, 100, 100, 0.1);
        }

        .form .grid .form-element input {
            display: none;
        }

        .form .grid .form-element img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .form .grid .form-element div {
            position: relative;
            height: 40px;
            margin-top: -40px;
            background: rgba(0, 0, 0, 0.5);
            text-align: center;
            line-height: 40px;
            font-size: 13px;
            color: #f5f5f5;
            font-weight: 600;
        }

        .form .grid .form-element div span {
            font-size: 40px;
        }

    </style> --}}

@stop
