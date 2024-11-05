$(document).ready(function () {
    $('.increment-btn').click(function (e) { 
        e.preventDefault();
        var $qtyInput = $(this).closest('.product_data').find('.input-qty');
        var qty = parseInt($qtyInput.val(), 10);
        qty = isNaN(qty) ? 0 : qty;

        if (qty < 10) {
            qty++;
            $qtyInput.val(qty);
        }
    });

    $('.decrement-btn').click(function (e) { 
        e.preventDefault();
        var $qtyInput = $(this).closest('.product_data').find('.input-qty');
        var qty = parseInt($qtyInput.val(), 10);
        qty = isNaN(qty) ? 0 : qty;

        if (qty > 1) {
            qty--;
            $qtyInput.val(qty);
        }
    });

    $('.add-to-cart').click(function (e) { 
        e.preventDefault();
        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var prod_id = $(this).data('prod_id');
        var button = $(this);

        button.prop('disabled', true);

        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data: {
                "prod_id": prod_id,
                "prod_qty": qty,
                "scope": "add"
            },
            dataType: "json",
            success: function (response) {
                console.log("Response:", response); 
                if (response.status == 201) {
                    alertify.success("Product added to cart");
                } else if (response.status == 401) {
                    alertify.error("Log-In to Continue");
                } else if (response === "existing") {
                    alertify.error("Product already in cart");
                } else if (response.status == 500) {
                    alertify.error("Something went wrong: " + (response.error || "unknown error"));
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error("AJAX Error: " + textStatus + ": " + errorThrown);
                console.error("Response Text: " + jqXHR.responseText); 
                alertify.error("AJAX request failed");
            },
            complete: function () {
                button.prop('disabled', false);
            }
        });
    });
    $(document).on('click','.updateQty', function () {
        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var prod_id = $(this).closest('.product_data').find('.prodid').val();
    
        $.ajax({
            method:"POST",
            url: "functions/handlecart.php",
            data: {
                "prod_id": prod_id,
                "prod_qty": qty,
                "scope": "update"
            },
            success: function (response) {
            }
        });
    });

});
