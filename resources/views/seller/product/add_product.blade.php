@extends('seller\seller')

@section('sidebar-content')
    <div class="container">
        @foreach ($cat as $item)
            <form action="{{ route('sellerpostProduct', $item->main_cat_id) }}" method="POST"
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
                <label for="img_product">Image Product</label>

                <div class="custom-file mb-3">

                    <input type="file" class="custom-file-input" id="images" name="imageFile[]" required
                        multiple="multiple" />
                    <label class="custom-file-label" for="images">Choose picture...</label>
                </div>
                {{-- <div class="user-image mb-3 text-center">
                    <div class="imgPreview"> </div>
                </div> --}}

                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        </form>
    </div>


@stop
