<div class="container">
    <div class="col-lg-9">
        @foreach ($category as $itemA)
            <h5 class="mb-1">
                {{ $itemA->name }}
            </h5>
            @foreach ($second_cate as $itemB)
                @if ($itemA->id == $itemB->category_id)
                    {{ $itemB->name }}
                    <div class="card ">
                        <table class="table-borderless">
                            <tbody>
                                <tr class="mb-3">
                                    <td colspan="3">
                                        <a href="">
                                            <img style="width: 100px;" src="{{ asset('img_null.jpg') }}" alt=""
                                                class="img-fluid">
                                            name
                                        </a>
                                    </td>
                                    <td>
                                        <a href="">
                                            $ 100
                                        </a>
                                    </td>
                                    <td>
                                        <button class="btn btn-secondary mt-4 add_item" data-toggle="modal"
                                            data-target="#myModal" data-id="{{ $itemB->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                                <path
                                                    d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                                <path
                                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                            </svg>
                                        </button>
                                        <button type="button" value="" class="btn-sm remove_cart btn btn-light border">
                                            Remove
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @endif
            @endforeach
        @endforeach
    </div>
</div>

<div class="modal" tabindex="-1" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="product-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="product-desc"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous">
</script>


<script>
    $('#myModal').modal('hide');


    $(document).ready(function() {
        $('.add_item').click(function() {
            const id = $(this).attr('data-id');
            $.ajax({
                url: 'product_detail/' + id,
                type: 'GET',
                data: {
                    "id": id
                },
                success: function(data) {
                    console.log(data);
                    $('#product-title').html(data.title);
                    $('#product-desc').html(data.description);
                }
            })
        });
    });
</script>
{{-- <div class="col-lg-9">
                            <h5 class="mb-1">
                                Core Components
                            </h5>
                            CPU
                            <div class="card ">
                                <table class="table-borderless">
                                    <tbody>
                                        <tr class="mb-3">
                                            <td colspan="3">
                                                <a href="">
                                                    <img style="width: 100px;" src="{{ asset('img_null.jpg') }}" alt=""
                                                        class="img-fluid">
                                                    name
                                                </a>
                                            </td>
                                            <td>
                                                <a href="">
                                                    $ 100
                                                </a>
                                            </td>
                                            <td>
                                                <button class="btn-sm btn btn btn-light border add_CPU">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                                        <path
                                                            d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                                        <path
                                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                    </svg>
                                                </button>
                                                <button type="button" value=""
                                                    class="btn-sm remove_cart btn btn-light border">
                                                    Remove
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            Motherboard
                            <div class="card ">
                                <table class="table-borderless">
                                    <tbody>
                                        <tr class="mb-3">
                                            <td colspan="3">
                                                <a href="">
                                                    <img style="width: 100px;" src="{{ asset('img_null.jpg') }}" alt=""
                                                        class="img-fluid">
                                                    name
                                                </a>
                                            </td>
                                            <td>
                                                <a href="">
                                                    $ 100
                                                </a>
                                            </td>
                                            <td>
                                                <a href="" class="btn-sm btn btn btn-light border">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                                        <path
                                                            d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                                        <path
                                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                    </svg>
                                                </a>
                                                <button type="button" value=""
                                                    class="btn-sm remove_cart btn btn-light border">
                                                    Remove
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            RAM
                            <div class="card ">
                                <table class="table-borderless">
                                    <tbody>
                                        <tr class="mb-3">
                                            <td colspan="3">
                                                <a href="">
                                                    <img style="width: 100px;" src="{{ asset('img_null.jpg') }}" alt=""
                                                        class="img-fluid">
                                                    name
                                                </a>
                                            </td>
                                            <td>
                                                <a href="">
                                                    $ 100
                                                </a>
                                            </td>
                                            <td>
                                                <a href="" class="btn-sm btn btn btn-light border">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                                        <path
                                                            d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                                        <path
                                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                    </svg>
                                                </a>
                                                <button type="button" value=""
                                                    class="btn-sm remove_cart btn btn-light border">
                                                    Remove
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            Case
                            <div class="card ">
                                <table class="table-borderless">

                                    <tbody>
                                        <tr class="mb-3">
                                            <td colspan="3">
                                                <a href="">
                                                    <img style="width: 100px;" src="{{ asset('img_null.jpg') }}" alt=""
                                                        class="img-fluid">
                                                    name
                                                </a>
                                            </td>
                                            <td>
                                                <a href="">
                                                    $ 100
                                                </a>
                                            </td>
                                            <td>
                                                <a href="" class="btn-sm btn btn btn-light border">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                                        <path
                                                            d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                                        <path
                                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                    </svg>
                                                </a>
                                                <button type="button" value=""
                                                    class="btn-sm remove_cart btn btn-light border">
                                                    Remove
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            Power Supply
                            <div class="card ">
                                <table class="table-borderless">

                                    <tbody>
                                        <tr class="mb-3">
                                            <td colspan="3">
                                                <a href="">
                                                    <img style="width: 100px;" src="{{ asset('img_null.jpg') }}" alt=""
                                                        class="img-fluid">
                                                    name
                                                </a>
                                            </td>
                                            <td>
                                                <a href="">
                                                    $ 100
                                                </a>
                                            </td>
                                            <td>
                                                <a href="" class="btn-sm btn btn btn-light border">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                                        <path
                                                            d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                                        <path
                                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                    </svg>
                                                </a>
                                                <button type="button" value=""
                                                    class="btn-sm remove_cart btn btn-light border">
                                                    Remove
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            Hard Drive
                            <div class="card ">
                                <table class="table-borderless">
                                    <tbody>
                                        <tr class="mb-3">
                                            <td colspan="3">
                                                <a href="">
                                                    <img style="width: 100px;" src="{{ asset('img_null.jpg') }}" alt=""
                                                        class="img-fluid">
                                                    name
                                                </a>
                                            </td>
                                            <td>
                                                <a href="">
                                                    $ 100
                                                </a>
                                            </td>
                                            <td>
                                                <a href="" class="btn-sm btn btn btn-light border">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                                        <path
                                                            d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                                        <path
                                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                    </svg>
                                                </a>
                                                <button type="button" value=""
                                                    class="btn-sm remove_cart btn btn-light border">
                                                    Remove
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>



                        <div class="col-lg-9">
                            <h5 class="mb-1">
                                Peripherals
                            </h5>
                            Keyboard
                            <div class="card ">
                                <table class="table-borderless">
                                    <tbody>
                                        <tr class="mb-3">
                                            <td colspan="3">
                                                <a href="">
                                                    <img style="width: 100px;" src="{{ asset('img_null.jpg') }}" alt=""
                                                        class="img-fluid">
                                                    name
                                                </a>
                                            </td>
                                            <td>
                                                <a href="">
                                                    $ 100
                                                </a>
                                            </td>
                                            <td>
                                                <a href="" class="btn-sm btn btn btn-light border">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                                        <path
                                                            d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                                        <path
                                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                    </svg>
                                                </a>
                                                <button type="button" value=""
                                                    class="btn-sm remove_cart btn btn-light border">
                                                    Remove
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            Monitors
                            <div class="card ">
                                <table class="table-borderless">

                                    <tbody>
                                        <tr class="mb-3">
                                            <td colspan="3">
                                                <a href="">
                                                    <img style="width: 100px;" src="{{ asset('img_null.jpg') }}" alt=""
                                                        class="img-fluid">
                                                    name
                                                </a>
                                            </td>
                                            <td>
                                                <a href="">
                                                    $ 100
                                                </a>
                                            </td>
                                            <td>
                                                <a href="" class="btn-sm btn btn btn-light border">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                                        <path
                                                            d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                                        <path
                                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                    </svg>
                                                </a>
                                                <button type="button" value=""
                                                    class="btn-sm remove_cart btn btn-light border">
                                                    Remove
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            Wireless Routers
                            <div class="card ">
                                <table class="table-borderless">

                                    <tbody>
                                        <tr class="mb-3">
                                            <td colspan="3">
                                                <a href="">
                                                    <img style="width: 100px;" src="{{ asset('img_null.jpg') }}" alt=""
                                                        class="img-fluid">
                                                    name
                                                </a>
                                            </td>
                                            <td>
                                                <a href="">
                                                    $ 100
                                                </a>
                                            </td>
                                            <td>
                                                <a href="" class="btn-sm btn btn btn-light border">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                                        <path
                                                            d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                                        <path
                                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                    </svg>
                                                </a>
                                                <button type="button" value=""
                                                    class="btn-sm remove_cart btn btn-light border">
                                                    Remove
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            Mouse
                            <div class="card ">
                                <table class="table-borderless">

                                    <tbody>
                                        <tr class="mb-3">
                                            <td colspan="3">
                                                <a href="">
                                                    <img style="width: 100px;" src="{{ asset('img_null.jpg') }}" alt=""
                                                        class="img-fluid">
                                                    name
                                                </a>
                                            </td>
                                            <td>
                                                <a href="">
                                                    $ 100
                                                </a>
                                            </td>
                                            <td>
                                                <a href="" class="btn-sm btn btn btn-light border">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                                        <path
                                                            d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                                        <path
                                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                    </svg>
                                                </a>
                                                <button type="button" value=""
                                                    class="btn-sm remove_cart btn btn-light border">
                                                    Remove
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            Mouse Pads
                            <div class="card ">
                                <table class="table-borderless">

                                    <tbody>
                                        <tr class="mb-3">
                                            <td colspan="3">
                                                <a href="">
                                                    <img style="width: 100px;" src="{{ asset('img_null.jpg') }}" alt=""
                                                        class="img-fluid">
                                                    name
                                                </a>
                                            </td>
                                            <td>
                                                <a href="">
                                                    $ 100
                                                </a>
                                            </td>
                                            <td>
                                                <a href="" class="btn-sm btn btn btn-light border">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                                        <path
                                                            d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                                        <path
                                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                    </svg>
                                                </a>
                                                <button type="button" value=""
                                                    class="btn-sm remove_cart btn btn-light border">
                                                    Remove
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            Speakers
                            <div class="card ">
                                <table class="table-borderless">

                                    <tbody>
                                        <tr class="mb-3">
                                            <td colspan="3">
                                                <a href="">
                                                    <img style="width: 100px;" src="{{ asset('img_null.jpg') }}" alt=""
                                                        class="img-fluid">
                                                    name
                                                </a>
                                            </td>
                                            <td>
                                                <a href="">
                                                    $ 100
                                                </a>
                                            </td>
                                            <td>
                                                <a href="" class="btn-sm btn btn btn-light border">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                                        <path
                                                            d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                                        <path
                                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                    </svg>
                                                </a>
                                                <button type="button" value=""
                                                    class="btn-sm remove_cart btn btn-light border">
                                                    Remove
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            Headsets
                            <div class="card ">
                                <table class="table-borderless">

                                    <tbody>
                                        <tr class="mb-3">
                                            <td colspan="3">
                                                <a href="">
                                                    <img style="width: 100px;" src="{{ asset('img_null.jpg') }}" alt=""
                                                        class="img-fluid">
                                                    name
                                                </a>
                                            </td>
                                            <td>
                                                <a href="">
                                                    $ 100
                                                </a>
                                            </td>
                                            <td>
                                                <a href="" class="btn-sm btn btn btn-light border">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                                        <path
                                                            d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                                        <path
                                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                    </svg>
                                                </a>
                                                <button type="button" value=""
                                                    class="btn-sm remove_cart btn btn-light border">
                                                    Remove
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div> --}}



{{-- Case Fans
                        <div class="card ">
                            <table class="table-borderless">
                                <tbody>
                                    <tr class="mb-3">
                                        <td colspan="3">
                                            <a href="">
                                                <img style="width: 100px;" src="{{ asset('img_null.jpg') }}" alt=""
                                                    class="img-fluid">
                                                name
                                            </a>
                                        </td>
                                        <td>
                                            <a href="">
                                                $ 100
                                            </a>
                                        </td>
                                        <td>
                                            <a href="" class="btn-sm btn btn btn-light border">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                                    <path
                                                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                                    <path
                                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                </svg>
                                            </a>
                                            <button type="button" value=""
                                                class="btn-sm remove_cart btn btn-light border">
                                                Remove
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        USB Flash Drives
                        <div class="card ">
                            <table class="table-borderless">
                                <tbody>
                                    <tr class="mb-3">
                                        <td colspan="3">
                                            <a href="">
                                                <img style="width: 100px;" src="{{ asset('img_null.jpg') }}" alt=""
                                                    class="img-fluid">
                                                name
                                            </a>
                                        </td>
                                        <td>
                                            <a href="">
                                                $ 100
                                            </a>
                                        </td>
                                        <td>
                                            <a href="" class="btn-sm btn btn btn-light border">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                                    <path
                                                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                                    <path
                                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                </svg>
                                            </a>
                                            <button type="button" value=""
                                                class="btn-sm remove_cart btn btn-light border">
                                                Remove
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> --}}
