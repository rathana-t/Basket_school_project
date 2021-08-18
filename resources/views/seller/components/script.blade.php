<script>
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
    var modal = document.getElementById('id01');
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
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
    // $(document).ready(function() {
    //     $(document).on('click', '.delete_cate_btn', function() {
    //         var cate_id = $(this).val();
    //         // alert(prod_id);
    //         $('#Delete_cate_Modal').modal('show');
    //         $('#delete_cate_id').val(cate_id);
    //     })
    // });
    // imageFile
    $(document).ready(function() {
        if (window.File && window.FileList && window.FileReader) {
            $("#images").on("change", function(e) {
                var files = e.target.files,
                    filesLength = files.length;
                for (var i = 0; i < filesLength; i++) {
                    var f = files[i]
                    var fileReader = new FileReader();
                    fileReader.onload = (function(e) {
                        var file = e.target;
                        $("<span class=\"pip\">" +
                            "<img class=\"imageThumb\" src=\"" + e.target.result +
                            "\" title=\"" + file.name + "\"/>" +
                            "<br/><span class=\"remove\">Remove image</span>" +
                            "</span>").insertAfter("#images");
                        $(".remove").click(function() {
                            $(this).parent(".pip").remove();
                        });
                    });
                    fileReader.readAsDataURL(f);
                }
            });
        } else {
            alert("Your browser doesn't support to File API")
        }
    });
    $(document).ready(function() {
        $(document).on('click', '.Address', function() {
            var prod_id = $(this).text();
            // alert(prod_id);
            $('#Test').modal('show');
            $('#data').text(prod_id);
        })
    });
</script>
