<h5 class="mt-3">
    Add Term and Condition to seller
</h5>
<form action="{{ url('/admin/add-TNC-seller') }}" method="POST">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-4">
            <input class="form-control " name="title" type="text" placeholder="title">
        </div>
        <div class="form-group col-md-4">
            <input class="form-control " name="description" type="text" placeholder="description">
        </div>
        <div class="form-group col-md-4">
            <button type="submit" class="btn btn-dark">
                Add
            </button>
        </div>
    </div>
    {!! $errors->first('province', "<span class='text-danger'>:message</span>") !!}
</form>
<div class="row mt-2">
    <div class="col-md-12">
        <div class="card cs-shadow border-0">
            <div class="card-body">
                <div class="border-bottom text-center">
                    <h2>Term and Conditions<h2>
                </div>
                @foreach ($getTNCseller as $item)
                    <div class="text-left mt-3">
                        {{ $item->text }}
                        <br>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
