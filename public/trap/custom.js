$(document).ready(function (){
    loadcart();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        function loadcart()
        {
            $.ajax({
                method: "GET",
                url: "/load-cart-data",
                success: function (response){
                    $('.cart-count').html('');
                    $('.cart-count').html(response.count);

                }
            });
        }

        loadwishlist();
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        function loadwishlist()
        {
            $.ajax({
                method: "GET",
                url: "/load-wishlist-data",
                success: function (response){
                    $('.wishlist-count').html('');
                    $('.wishlist-count').html(response.count);

                }
            });
        }

    $('.incerement-btn').click(function (e){
            e.preventDefault();

            var inc_value = $(this).closest('.product_data').find('.qty-input').val();
            var value = parseInt(inc_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value < 10 ){
                value++;
                $(this).closest('.product_data').find('.qty-input').val(value);
        }

    });
    $('.decrement-btn').click(function (e){
        e.preventDefault();

        var dec_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;
        if(value > 1 ){
            value--;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });
    $('.delete-cart-item').click(function (e){
        e.preventDefault();

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
        $.ajax({
            method: "POST",
            url: "delete-cart-item",
            data: {
                'prod_id':prod_id,

            },
            success: function (response){
                window.location.reload();
                Swal.fire(
                'Success',
                response.status,
                'success',
                )
                loadcart();
            }
        });
    });
    $('.changeQuantity').click(function (e){
            e.preventDefault();

            var prod_id = $(this).closest('.product_data').find('.prod_id').val();
            var qty = $(this).closest('.product_data').find('.qty-input').val();
            data = {
                'prod_id': prod_id,
                'prod_qty': qty,
            }
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            $.ajax({
                method: "POST",
                url: "update-cart",
                data: data,
                success: function (response){
                    window.location.reload();
                },
          });
    });
    $('.add-to-cart').click(function (e){
        e.preventDefault();
                var product_id = $(this).closest('.product_data').find('.prod_id').val();
                $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            $.ajax({
                method: "POST",
                url: "/add-to-carts",
                data: {
                    'product_id': product_id,
                },
                success: function (response){
                    Swal.fire(
                    'Success',
                    response.status,
                    'success',
                    )
                    loadcart();
                },
            });
    });
    $('.incerement-btn').click(function (e){
        e.preventDefault();
            var inc_value = $('.qty-input').val();
            var value = parseInt(inc_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value < 10 ){
                value++;
                $('.qty-input').val(value);
                }
    });
    $('.addcart').click(function (e){
            e.preventDefault();

            var product_id = $(this).closest('.product_data').find('.prod_id').val();
            var product_qty = $(this).closest('.product_data').find('.qty-input').val();


            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            $.ajax({
                method: "POST",
                url: "/add-to-cart",
                data: {
                    'product_id': product_id,
                    'product_qty': product_qty,
                },
                success: function (response){
                    Swal.fire(
                    'Success',
                    response.status,
                    'success',
                    )
                    loadcart();
                },

            });
    });
    $('.btnwishlist').click(function (e) {
        e.preventDefault();

        var product_id = $(this).closest('.product_data').find('.prod_id').val();

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
            method: "POST",
            url: "/add-to-wishlist",
            data: {
                'product_id': product_id,
            },
            success: function (response){
                Swal.fire(
                'Success',
                response.status,
                'success',
                )
                loadcart();
            },


        });

    });
    $('.delete-wishlist-item').click(function (e){
        e.preventDefault();

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
        $.ajax({
            method: "POST",
            url: "delete-wishlist-item",
            data: {
                'prod_id':prod_id,

            },
            success: function (response){
                Swal.fire(
                'Success',
                response.status,
                'success',
                )
                window.location = "/cart";
                loadcart();
            }
        });
    });





});
