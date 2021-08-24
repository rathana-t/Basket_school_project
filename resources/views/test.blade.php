{{-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
    .center {
        width: 150px;
        margin: 40px auto;

    }

</style>
<div class="center">
    <div class="input-group">
        <span class="input-group-btn">
            <button style="height: 34px" type="button" class="btn btn-danger btn-number" data-type="minus"
                data-field="quantity">
                <span class="glyphicon glyphicon-minus"></span>
            </button>
        </span>
        <input type="text" name="quantity" class="form-control input-number" value="1" min="1" max="100">
        <span class="input-group-btn">
            <button style="height: 34px" type="button" class="btn btn-success btn-number" data-type="plus"
                data-field="quantity">
                <span class="glyphicon glyphicon-plus"></span>
            </button>
        </span>
    </div>
</div>

<script>
    //plugin bootstrap minus and plus
    //http://jsfiddle.net/laelitenetwork/puJ6G/
    $('.btn-number').click(function(e) {
        e.preventDefault();

        fieldName = $(this).attr('data-field');
        type = $(this).attr('data-type');
        var input = $("input[name='" + fieldName + "']");
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            if (type == 'minus') {

                if (currentVal > input.attr('min')) {
                    input.val(currentVal - 1).change();
                }
                if (parseInt(input.val()) == input.attr('min')) {
                    $(this).attr('disabled', true);
                }

            } else if (type == 'plus') {

                if (currentVal < input.attr('max')) {
                    input.val(currentVal + 1).change();
                }
                if (parseInt(input.val()) == input.attr('max')) {
                    $(this).attr('disabled', true);
                }

            }
        } else {
            input.val(0);
        }
    });
    $('.input-number').focusin(function() {
        $(this).data('oldValue', $(this).val());
    });
    $('.input-number').change(function() {

        minValue = parseInt($(this).attr('min'));
        maxValue = parseInt($(this).attr('max'));
        valueCurrent = parseInt($(this).val());

        name = $(this).attr('name');
        if (valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            alert('Sorry, the minimum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        if (valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            alert('Sorry, the maximum value was reached');
            $(this).val($(this).data('oldValue'));
        }


    });
    $(".input-number").keydown(function(e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
            // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
            // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
</script>
<img alt="Logo" src="{{ URL::asset('mee_tnam.jpg') }}"
    style="display: block; font-family: &apos;Lato&apos;, Helvetica, Arial, sans-serif; color: #ffffff; font-size: 18px;"
    border="0"> --}}

<div style="width: 1000">
    <div class="form">
        <div class="grid">
            <div class="form-element">
                <input type="file" id="file-1" accept="image/*">
                <label for="file-1" id="file-1-preview">
                    <img src="https://bit.ly/3ubuq5o" alt="">
                    <div>
                        <span>+</span>
                    </div>
                </label>
            </div>
            <div class="form-element">
                <input type="file" id="file-2" accept="image/*">
                <label for="file-2" id="file-2-preview">
                    <img src="https://bit.ly/3ubuq5o" alt="">
                    <div>
                        <span>+</span>
                    </div>
                </label>
            </div>
            <div class="form-element">
                <input type="file" id="file-3" accept="image/*">
                <label for="file-3" id="file-3-preview">
                    <img src="https://bit.ly/3ubuq5o" alt="">
                    <div>
                        <span>+</span>
                    </div>
                </label>
            </div>
            <div class="form-element">
                <input type="file" id="file-3" accept="image/*">
                <label for="file-3" id="file-3-preview">
                    <img src="https://bit.ly/3ubuq5o" alt="">
                    <div>
                        <span>+</span>
                    </div>
                </label>
            </div>
            <div class="form-element">
                <input type="file" id="file-3" accept="image/*">
                <label for="file-3" id="file-3-preview">
                    <img src="https://bit.ly/3ubuq5o" alt="">
                    <div>
                        <span>+</span>
                    </div>
                </label>
            </div>
            <div class="form-element">
                <input type="file" id="file-3" accept="image/*">
                <label for="file-3" id="file-3-preview">
                    <img src="https://bit.ly/3ubuq5o" alt="">
                    <div>
                        <span>+</span>
                    </div>
                </label>
            </div>
            <div class="form-element">
                <input type="file" id="file-3" accept="image/*">
                <label for="file-3" id="file-3-preview">
                    <img src="https://bit.ly/3ubuq5o" alt="">
                    <div>
                        <span>+</span>
                    </div>
                </label>
            </div>
            <div class="form-element">
                <input type="file" id="file-3" accept="image/*">
                <label for="file-3" id="file-3-preview">
                    <img src="https://bit.ly/3ubuq5o" alt="">
                    <div>
                        <span>+</span>
                    </div>
                </label>
            </div>
        </div>
    </div>
</div>
<style>
    .form {
        margin: 80px 0px 20px;
        padding: 0px 0px;
    }

    .form .grid {
        margin-top: 50px;
        display: flex;

        justify-content: space-around;
        flex-wrap: wrap;
        gap: 20px;
    }

    .form .grid .form-element {
        width: 200px;
        height: 150px;
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
</script>
