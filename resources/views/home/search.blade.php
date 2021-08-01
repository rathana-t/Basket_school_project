@extends('application')
@section('content')
    <div class="container">
        @include('home/components/selectbyBrand')
        <button class="btn btn-secondary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
            aria-controls="collapseExample">
            Filter
        </button>


        <div class="" id="collapseExample">
            <div class="card card-body">
                <form action="{{ route('search-filter') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="d-flex justify-content-between">
                            <div class="col-md-4 list-style">

                                <h5 class="border-bottom">ProductName</h5>
                                <input type="text" class="form-control" id="exampleInputPhone" value="{{ $pro_name }}"
                                    name="pro_name">
                            </div>
                            <div class="col-md-4 list-style">
                                <h5 class="border-bottom">Price</h5>

                                <div class="min-max-slider" data-legendnum="2">
                                    <label for="min">Minimum price</label>
                                    <input id="min" class="min" name="min" type="range" step="5" min="0" max="3000" />
                                    <label for="max">Maximum price</label>
                                    <input id="max" class="max" name="max" type="range" step="-5" min="0" max="3000" />
                                </div>
                                {{-- <li><a href="#"></a></li> --}}
                            </div>
                            <div class="col-md-4 list-style">
                                <h5 class="border-bottom">Brand Name</h5>
                                <select class="form-control" id="exampleFormControlSelect1" name="brand_id">
                                    <option value="{{ $brand_id }}">All Brands</option>
                                    @foreach ($brand as $item)
                                        <option value="{{ $item->id }}" @if ($item->id == $brandId) selected @endif>
                                            {{ $item->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-md-4 list-style">
                                <ul>
                                    <h5 class="border-bottom">Top</h5>
                                    <li><a href="#">Cras justo odio</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary mb-5">
                            search
                        </button>
                    </div>

                </form>
            </div>
        </div>

        <div class="category mt-4">
            <div class="row">
                @foreach ($data as $item)
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="card shadow-sm">
                            <div class="m-3">
                                <p>{{ $item->name }}</p>
                                <?php foreach (json_decode($item->img_product)as $picture) { ?>
                                <img src="/images/imgProduct/{{ $picture }}" alt="" class="mb-1 img-fluid">
                                <?php break; } ?>
                                <a href="{{ route('detail', $item->id) }}">See all</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>















    <script>
        var thumbsize = 14;

        function draw(slider, splitvalue) {

            /* set function vars */
            var min = slider.querySelector('.min');
            var max = slider.querySelector('.max');
            var lower = slider.querySelector('.lower');
            var upper = slider.querySelector('.upper');
            var legend = slider.querySelector('.legend');
            var thumbsize = parseInt(slider.getAttribute('data-thumbsize'));
            var rangewidth = parseInt(slider.getAttribute('data-rangewidth'));
            var rangemin = parseInt(slider.getAttribute('data-rangemin'));
            var rangemax = parseInt(slider.getAttribute('data-rangemax'));

            /* set min and max attributes */
            min.setAttribute('max', splitvalue);
            max.setAttribute('min', splitvalue);

            /* set css */
            min.style.width = parseInt(thumbsize + ((splitvalue - rangemin) / (rangemax - rangemin)) * (rangewidth - (2 *
                thumbsize))) + 'px';
            max.style.width = parseInt(thumbsize + ((rangemax - splitvalue) / (rangemax - rangemin)) * (rangewidth - (2 *
                thumbsize))) + 'px';
            min.style.left = '0px';
            max.style.left = parseInt(min.style.width) + 'px';
            min.style.top = lower.offsetHeight + 'px';
            max.style.top = lower.offsetHeight + 'px';
            legend.style.marginTop = min.offsetHeight + 'px';
            slider.style.height = (lower.offsetHeight + min.offsetHeight + legend.offsetHeight) + 'px';

            /* correct for 1 off at the end */
            if (max.value > (rangemax - 1)) max.setAttribute('data-value', rangemax);

            /* write value and labels */
            max.value = max.getAttribute('data-value');
            min.value = min.getAttribute('data-value');
            lower.innerHTML = min.getAttribute('data-value');
            upper.innerHTML = max.getAttribute('data-value');

        }

        function init(slider) {
            /* set function vars */
            var min = slider.querySelector('.min');
            var max = slider.querySelector('.max');
            var rangemin = parseInt(min.getAttribute('min'));
            var rangemax = parseInt(max.getAttribute('max'));
            var avgvalue = (rangemin + rangemax) / 2;
            var legendnum = slider.getAttribute('data-legendnum');

            /* set data-values */
            min.setAttribute('data-value', rangemin);
            max.setAttribute('data-value', rangemax);

            /* set data vars */
            slider.setAttribute('data-rangemin', rangemin);
            slider.setAttribute('data-rangemax', rangemax);
            slider.setAttribute('data-thumbsize', thumbsize);
            slider.setAttribute('data-rangewidth', slider.offsetWidth);

            /* write labels */
            var lower = document.createElement('span');
            var upper = document.createElement('span');
            lower.classList.add('lower', 'value');
            upper.classList.add('upper', 'value');
            lower.appendChild(document.createTextNode(rangemin));
            upper.appendChild(document.createTextNode(rangemax));
            slider.insertBefore(lower, min.previousElementSibling);
            slider.insertBefore(upper, min.previousElementSibling);

            /* write legend */
            var legend = document.createElement('div');
            legend.classList.add('legend');
            var legendvalues = [];
            for (var i = 0; i < legendnum; i++) {
                legendvalues[i] = document.createElement('div');
                var val = Math.round(rangemin + (i / (legendnum - 1)) * (rangemax - rangemin));
                legendvalues[i].appendChild(document.createTextNode(val));
                legend.appendChild(legendvalues[i]);

            }
            slider.appendChild(legend);

            /* draw */
            draw(slider, avgvalue);

            /* events */
            min.addEventListener("input", function() {
                update(min);
            });
            max.addEventListener("input", function() {
                update(max);
            });
        }

        function update(el) {
            /* set function vars */
            var slider = el.parentElement;
            var min = slider.querySelector('#min');
            var max = slider.querySelector('#max');
            var minvalue = Math.floor(min.value);
            var maxvalue = Math.floor(max.value);

            /* set inactive values before draw */
            min.setAttribute('data-value', minvalue);
            max.setAttribute('data-value', maxvalue);

            var avgvalue = (minvalue + maxvalue) / 2;

            /* draw */
            draw(slider, avgvalue);
        }

        var sliders = document.querySelectorAll('.min-max-slider');
        sliders.forEach(function(slider) {
            init(slider);
        });
    </script>
@endsection
