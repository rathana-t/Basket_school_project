@extends('seller\seller')

@section('sidebar-content')
    <div class="container">
        <div class="text-center">
            <h1>
                Update Info
            </h1>
        </div>
        @foreach ($pros as $pro)

            <form action="{{ route('edit_product', $pro->id) }}" method="POST" enctype="multipart/form-data">
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
                                        <option value="{{ $pro->brand_id }}">{{ $pro->brand_name }}</option>

                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlSelect1">Secondary Category</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                                        <option value="{{ $pro->category_id }}">{{ $pro->cat_name }}</option>

                                        @foreach ($cats as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <label for="img_product">Image Product</label>

                        <div class="custom-file mb-3">

                            <input type="file" class="custom-file-input" id="images" name="imageFile[]"
                                onchange="previewFile(this)" value="{{ old('img_product') }}" required
                                multiple="multiple">
                            <label class="custom-file-label" for="images">Choose picture...</label>
                        </div>
                        <div class="user-image mb-3 text-center">
                            <?php foreach (json_decode($pro->img_product)as $picture) { ?>
                            <img src="{{ asset('imgProduct') }}/{{ $picture }}" alt="" class="img-fluid"
                                style="height: 150px;margin:5px;">
                            <?php } ?>
                            <div class="imgPreview"> </div>
                        </div>

                        {{-- <img id="previewImg" style="max-width: 130px" alt=""> --}}

                        {{-- <div class="form-group">
                        <label for="img_product">Image Product</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="img_product">
                    </div> --}}
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        @endforeach

    </div>
    <style>
        .container {
            max-width: 900px;
        }

        /* dl, ol, ul {
                                                                                                                    margin: 0;
                                                                                                                    padding: 0;
                                                                                                                    list-style: none;
                                                                                                                } */
        .imgPreview img {
            padding: 8px;
            max-width: 100px;
        }

    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        $(function() {
            // Multiple images preview with JavaScript
            var multiImgPreview = function(input, imgPreviewPlaceholder) {

                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(
                                imgPreviewPlaceholder);
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };

            $('#images').on('change', function() {
                multiImgPreview(this, 'div.imgPreview');
            });
        });
    </script>

    {{-- <script>
        function previewFile(input){
          var file=$("input[type=file]").get(0).files[0];
          if(file)
          {
            var reader = new FileReader();
            reader.onload=function(){
              $('#previewImg').attr("src",reader.result);
            }
            reader.readAsDataURL(file);
          }
        }
      </script> --}}
@stop
