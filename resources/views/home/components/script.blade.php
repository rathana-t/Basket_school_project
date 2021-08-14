<script>
    $(document).ready(function() {
        $(document).on('click', '.remove_cart', function() {
            var cart_id = $(this).val();
            // alert(cart_id);
            $('#remove_cart_modal').modal('show');
            $('#remove_cart_id').val(cart_id);
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
</script>
