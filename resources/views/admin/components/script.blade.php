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
    $(document).ready(function() {
        $(document).on('click', '.deletebtn', function() {
            var prod_id = $(this).val();
            // alert(prod_id);
            $('#DeleteModal').modal('show');
            $('#delete_id').val(prod_id);
        })
    });
    $(document).ready(function() {
        $(document).on('click', '.delete_brand_btn', function() {
            var prod_id = $(this).val();
            // alert(prod_id);
            $('#DeleteBrand').modal('show');
            $('#delete_brand_id').val(prod_id);
        })
    });
    $(document).ready(function() {
        $(document).on('click', '.delete_cate_btn', function() {
            var cate_id = $(this).val();
            // alert(prod_id);
            $('#Delete_cate_Modal').modal('show');
            $('#delete_cate_id').val(cate_id);
        })
    });
    (function($) {

        "use strict";

        var fullHeight = function() {

            $('.js-fullheight').css('height', $(window).height());
            $(window).resize(function() {
                $('.js-fullheight').css('height', $(window).height());
            });

        };
        fullHeight();

        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });

    })(jQuery);
</script>
