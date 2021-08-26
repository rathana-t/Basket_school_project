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
                                name="name">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="exampleInputPhone" value="{{ $pro->price }}"
                                name="price">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea rows="3" class="form-control" id="exampleInputPhone" name="description"
                                {{ old('description') }}>{{ $pro->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="number" class="form-control" id="" value="{{ $pro->stock }}" name="stock">
                        </div>
                        <div class="form-group">

                            <div class="row">
                                <div class="col">
                                    <label for="exampleFormControlSelect1">Brand</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="brand_id">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}" @if ($brand->id == $pro->brand_id) selected @endif>
                                                {{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlSelect1">Secondary Category</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                                        @foreach ($cats as $cat)
                                            <option value="{{ $cat->id }}" @if ($cat->id == $pro->s_cat_id) selected @endif>{{ $cat->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <label for="img_product">Image Product</label>

                        <div class="form" style="height: 400px">
                            <div class="grid">
                                <div class="form-element">
                                    <input type="file" id="file-1" accept="image/*" name="cover_img"
                                        value="{{ $pro->img_product }}">
                                    <label for="file-1" id="file-1-preview">
                                        @if ($pro->img_product == '')
                                            <img src="{{ asset('img_null.jpg') }}" alt="">
                                        @else
                                            <img src="{{ asset('images/imgProduct') }}/{{ $pro->img_product }}"
                                                alt="">
                                        @endif
                                        <div>
                                            <span>+</span>
                                        </div>
                                        <span>cover image</span>
                                    </label>
                                </div>
                                <div class="form-element">
                                    <input type="file" id="file-2" accept="image/*" name="sub_img1"
                                        value="{{ $pro->sub_img1 }}">
                                    <label for="file-2" id="file-2-preview">
                                        @if ($pro->sub_img1 == '')
                                            <img src="{{ asset('img_null.jpg') }}" alt="">
                                        @else
                                            <img src="{{ asset('images/imgProduct') }}/{{ $pro->sub_img1 }}" alt="">
                                        @endif
                                        <div>
                                            <span>+</span>
                                        </div>
                                        <span>sub image</span>
                                    </label>
                                </div>
                                <div class="form-element">
                                    <input type="file" id="file-3" accept="image/*" name="sub_img2"
                                        value="{{ $pro->sub_img2 }}">
                                    <label for="file-3" id="file-3-preview">
                                        @if ($pro->sub_img2 == '')
                                            <img src="{{ asset('img_null.jpg') }}" alt="">
                                        @else
                                            <img src="{{ asset('images/imgProduct') }}/{{ $pro->sub_img2 }}" alt="">
                                        @endif
                                        <div>
                                            <span>+</span>
                                        </div>
                                        <span>sub image</span>

                                    </label>
                                </div>
                                <div class="form-element">
                                    <input type="file" id="file-4" accept="image/*" name="sub_img3"
                                        value="{{ $pro->sub_img3 }}">
                                    <label for="file-4" id="file-4-preview">
                                        @if ($pro->sub_img3 == '')
                                            <img src="{{ asset('img_null.jpg') }}" alt="">
                                        @else
                                            <img src="{{ asset('images/imgProduct') }}/{{ $pro->sub_img3 }}" alt="">
                                        @endif
                                        <div>
                                            <span>+</span>
                                        </div>
                                        <span>sub image</span>

                                    </label>
                                </div>
                                <div class="form-element">
                                    <input type="file" id="file-5" accept="image/*" name="sub_img4"
                                        value="{{ $pro->sub_img4 }}">
                                    <label for="file-5" id="file-5-preview">
                                        @if ($pro->sub_img4 == '')
                                            <img src="{{ asset('img_null.jpg') }}" alt="">
                                        @else
                                            <img src="{{ asset('images/imgProduct') }}/{{ $pro->sub_img4 }}" alt="">
                                        @endif
                                        <div>
                                            <span>+</span>
                                        </div>
                                        <span>sub image</span>

                                    </label>
                                </div>
                                <div class="form-element">
                                    <input type="file" id="file-6" accept="image/*" name="sub_img5"
                                        value="{{ $pro->sub_img5 }}">
                                    <label for="file-6" id="file-6-preview">
                                        @if ($pro->sub_img5 == '')
                                            <img src="{{ asset('img_null.jpg') }}" alt="">
                                        @else
                                            <img src="{{ asset('images/imgProduct') }}/{{ $pro->sub_img5 }}" alt="">
                                        @endif
                                        <div>
                                            <span>+</span>
                                        </div>
                                        <span>sub image</span>

                                    </label>
                                </div>
                                <div class="form-element">
                                    <input type="file" id="file-7" accept="image/*" name="sub_img6"
                                        value="{{ $pro->sub_img6 }}">
                                    <label for="file-7" id="file-7-preview">
                                        @if ($pro->sub_img6 == '')
                                            <img src="{{ asset('img_null.jpg') }}" alt="">
                                        @else
                                            <img src="{{ asset('images/imgProduct') }}/{{ $pro->sub_img6 }}" alt="">
                                        @endif
                                        <div>
                                            <span>+</span>
                                        </div>
                                        <span>sub image</span>

                                    </label>
                                </div>
                                <div class="form-element">
                                    <input type="file" id="file-8" accept="image/*" name="sub_img7"
                                        value="{{ $pro->sub_img7 }}">
                                    <label for="file-8" id="file-8-preview">
                                        @if ($pro->sub_img7 == '')
                                            <img src="{{ asset('img_null.jpg') }}" alt="">
                                        @else
                                            <img src="{{ asset('images/imgProduct') }}/{{ $pro->sub_img7 }}" alt="">
                                        @endif
                                        <div>
                                            <span>+</span>
                                        </div>
                                        <span>sub image</span>

                                    </label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        @endforeach

    </div>
    <script>
        function previewBeforeUpload(id) {
            document.querySelector("#" + id).addEventListener("change", function(e) {
                if (e.target.files.length == 0) {
                    return;
                }
                let file = e.target.files[0];
                let url = URL.createObjectURL(file);
                {{-- document.querySelector("#" + id + "-preview div").innerText = file.name; --}}
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
    </script>
    <style>
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

    </style>

@stop
