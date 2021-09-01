<div class="card1">
    <form action="">
        <div class="card">
            <div class="p-3 price">
                <h4>
                    Sort
                </h4>
                <div class="pt-2">
                    <select class="form-control" id="exampleFormControlSelect1" name="sort">
                        <option>High to Low</option>
                        <option>Low to High</option>
                    </select>
                </div>
            </div>
            <div class="border-bottom pt-3">
            </div>
            <div class="p-3">
                <h4>
                    Brand
                </h4>
                <div class="pt-2">
                    <?php
                    $i = 1;
                    ?>
                    <div class="brand">
                        @foreach ($brand as $item)
                            <?php
                            $i++;
                            ?>
                            <div class="custom-control custom-checkbox mb-2 pr-3">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <input type="checkbox" class="custom-control-input" id="{{ $i }}">
                                        <label class="custom-control-label" for="{{ $i }}">
                                            {{ $item->name }}
                                        </label>
                                    </div>
                                    <div>
                                        @foreach ($result as $a)
                                            @if ($a->brand_id == $item->id)
                                                <span class="badge badge-primary badge-pill">
                                                    {{ $a->total_pro }}
                                                </span>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="border-bottom pt-3">
            </div>
            <div class="p-3 price">
                <h4>
                    Price
                </h4>
                <div class="pt-2">
                    <div class="row">
                        <div class="col">
                            <label for="inputEmail4">Min</label>
                            <input type="number" class="form-control" placeholder="$0">
                        </div>
                        <div class="col">
                            <label for="inputEmail4">Max</label>
                            <input type="number" class="form-control" placeholder="$9999">
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-bottom pt-3">
            </div>
            <div class="p-3 apply">
                <div class="text-center">
                    <button class="btn btn-sm btn-primary" type="submit">
                        Apply
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
