@extends('layouts\admin_sidebar')

@section('sidebar-content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        Add New Category
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('category_store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Category</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="file"> Choose image</label>
                                <input type="file" name="category_img" class="form-control" onchange="previewFile(this)">
                                <img src="" alt="brand img" id="previewImg" style="max-width: 130px; margin-top:20px">
                            </div>
                            <button class="btn btn-primary" type="submit"> Submit </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewFile(input) {
            var file = $("input[type=file]").get(0).files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function() {
                    $('#previewImg').attr("src", reader.result);
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
@stop
