@extends('component\sidebar')

@section('sidebar-content')
    <div class="container">
        <div class="text-center">
            <h1>
                This is add new product page
            </h1>
        </div>
        <form action="{{ url('sellerLogIn') }}" method="POST">
            @csrf
            <div class="card shadow-sm">
                <div class="m-4">
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" class="form-control" id="exampleInputPhone" name="name">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" id="exampleInputPhone" name="price">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea rows="3" class="form-control" id="exampleInputPhone" name="description" {{ old('description') }}></textarea>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" class="form-control" id="" name="stock">
                    </div>
                    <div class="form-group">
                        
                    <div class="row">
                        <div class="col">
                         <label for="exampleFormControlSelect1" >Brand</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="brand_id">
                            <option value="{{ old('brand_id') }}">{{ old('brand_id') }}</option>
                            <option value="1">ASUS</option>
                           <option value="2">DELL</option>
                           <option value="3">Another action</option>
                        </select>
                     </div>
                        <div class="col">

                             <label for="exampleFormControlSelect1" >Category</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                                <option value="{{ old('category_id') }}">{{ old('category_id') }}</option>
                                <option value="1">KeyBoard</option>
                             <option value="2">Mouse</option>
                              <option value="3">Another action</option>
                            </select>
                        </div>
                    </div>
                    </div>
                    <label for="img_product">Image Product</label>
                   
                    <div class="custom-file mb-3">
                        
                        <input type="file" class="custom-file-input" id="validatedCustomFile"   onchange="previewFile(this)"  value="{{ old('img_product') }}" required>
                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                      </div>
                      <img id="previewImg" style="max-width: 130px" alt="">

                    {{-- <div class="form-group">
                        <label for="img_product">Image Product</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="img_product">
                    </div> --}}
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>

    <script>
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
      </script>
@stop