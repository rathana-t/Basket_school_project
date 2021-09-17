<script>
    $(document).ready(function() {
        $(document).on('click', '.remove_cart', function() {
            var cart_id = $(this).val();
            // alert(cart_id);
            $('#remove_cart_id').val(cart_id);
            $('#remove_cart_modal').modal('show');
        })
    });
    $(document).ready(function() {
        $(document).on('click', '.edit_cart', function() {
            var cart_id = $(this).val();
            // alert(cart_id);
            $('#edit_cart_modal').modal('show');
            $('#edit_cart_id').val(cart_id);
        })
    });
    // $(document).ready(function() {
    //     $(document).on('click', '.fill_address', function() {
    //         var cart_id = $(this).val();
    //         // alert(cart_id);
    //         $('#address_user_modal').modal('show');
    //         // $('#edit_cart_id').val(cart_id);
    //     })
    // });


    // $(document).ready(function() {
    //     $('#link2').on('click', function() {
    //         var id_cart = $(this).val();
    //         window.location.href = '{{ url('/product') }}'.val(cart_id);
    //     });
    // });



    function main() {
        $('#main_sub').show();
        $('#main').show();

        $('#sub_img1').show();
        $('#sub_img2').show();
        $('#sub_img3').show();
        $('#sub_img4').show();
        $('#sub_img5').show();
        $('#sub_img6').show();
        $('#sub_img7').show();

        $('#sub_img1_main').hide();
        $('#sub_img2_main').hide();
        $('#sub_img3_main').hide();
        $('#sub_img4_main').hide();
        $('#sub_img5_main').hide();
        $('#sub_img6_main').hide();
        $('#sub_img7_main').hide();
    }

    function sub_img1() {
        $('#main_sub').show();
        $('#main').hide();

        $('#sub_img1').show();
        $('#sub_img2').show();
        $('#sub_img3').show();
        $('#sub_img4').show();
        $('#sub_img5').show();
        $('#sub_img6').show();
        $('#sub_img7').show();

        $('#sub_img1_main').show();
        $('#sub_img2_main').hide();
        $('#sub_img3_main').hide();
        $('#sub_img4_main').hide();
        $('#sub_img5_main').hide();
        $('#sub_img6_main').hide();
        $('#sub_img7_main').hide();
    }

    function sub_img2() {
        $('#main_sub').show();
        $('#main').hide();

        $('#sub_img1').show();
        $('#sub_img2').show();
        $('#sub_img3').show();
        $('#sub_img4').show();
        $('#sub_img5').show();
        $('#sub_img6').show();
        $('#sub_img7').show();

        $('#sub_img1_main').hide();
        $('#sub_img2_main').show();
        $('#sub_img3_main').hide();
        $('#sub_img4_main').hide();
        $('#sub_img5_main').hide();
        $('#sub_img6_main').hide();
        $('#sub_img7_main').hide();
    }

    function sub_img3() {
        $('#main_sub').show();
        $('#main').hide();

        $('#sub_img1').show();
        $('#sub_img2').show();
        $('#sub_img3').show();
        $('#sub_img4').show();
        $('#sub_img5').show();
        $('#sub_img6').show();
        $('#sub_img7').show();

        $('#sub_img1_main').hide();
        $('#sub_img2_main').hide();
        $('#sub_img3_main').show();
        $('#sub_img4_main').hide();
        $('#sub_img5_main').hide();
        $('#sub_img6_main').hide();
        $('#sub_img7_main').hide();
    }

    function sub_img4() {
        $('#main_sub').show();
        $('#main').hide();

        $('#sub_img1').show();
        $('#sub_img2').show();
        $('#sub_img3').show();
        $('#sub_img4').show();
        $('#sub_img5').show();
        $('#sub_img6').show();
        $('#sub_img7').show();

        $('#sub_img1_main').hide();
        $('#sub_img2_main').hide();
        $('#sub_img3_main').hide();
        $('#sub_img4_main').show();
        $('#sub_img5_main').hide();
        $('#sub_img6_main').hide();
        $('#sub_img7_main').hide();
    }

    function sub_img5() {
        $('#main_sub').show();
        $('#main').hide();

        $('#sub_img1').show();
        $('#sub_img2').show();
        $('#sub_img3').show();
        $('#sub_img4').show();
        $('#sub_img5').show();
        $('#sub_img6').show();
        $('#sub_img7').show();

        $('#sub_img1_main').hide();
        $('#sub_img2_main').hide();
        $('#sub_img3_main').hide();
        $('#sub_img4_main').hide();
        $('#sub_img5_main').show();
        $('#sub_img6_main').hide();
        $('#sub_img7_main').hide();
    }

    function sub_img6() {
        $('#main_sub').show();
        $('#main').hide();

        $('#sub_img1').show();
        $('#sub_img2').show();
        $('#sub_img3').show();
        $('#sub_img4').show();
        $('#sub_img5').show();
        $('#sub_img6').show();
        $('#sub_img7').show();

        $('#sub_img1_main').hide();
        $('#sub_img2_main').hide();
        $('#sub_img3_main').hide();
        $('#sub_img4_main').hide();
        $('#sub_img5_main').hide();
        $('#sub_img6_main').show();
        $('#sub_img7_main').hide();
    }

    function sub_img7() {
        $('#main_sub').show();
        $('#main').hide();

        $('#sub_img1').show();
        $('#sub_img2').show();
        $('#sub_img3').show();
        $('#sub_img4').show();
        $('#sub_img5').show();
        $('#sub_img6').show();
        $('#sub_img7').show();

        $('#sub_img1_main').hide();
        $('#sub_img2_main').hide();
        $('#sub_img3_main').hide();
        $('#sub_img4_main').hide();
        $('#sub_img5_main').hide();
        $('#sub_img6_main').hide();
        $('#sub_img7_main').show();
    }
</script>
