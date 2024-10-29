$(document).ready(function () {
    
    $('.increment-btn').click(function (e) { 
        e.preventDefault();
        
        // Find the closest input field with the class 'input-qty'
        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var value = parseInt(qty, 10);
        
        value = isNaN(value) ? 0 : value;
        
        
        if (value < 10) {
            value++;

            $(this).closest('.product_data').find('.input-qty').val(value);
        }
    });
    
});
$(document).ready(function () {
    
    $('.decrement-btn').click(function (e) { 
        e.preventDefault();
        
        
        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var value = parseInt(qty, 10);
        
        value = isNaN(value) ? 0 : value;
        
        
        if (value > 1) {
            value--;

            $(this).closest('.product_data').find('.input-qty').val(value);
        }
    });
    
    $('.add-to-cart').click(function (e) { 
        e.preventDefault();
        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var prod_id=$(this).val();
        $.ajax({
            type: "POST",
            url: "functons/handelcart.php",
            data: {
                "prod_id":prod_id,
                "prod_qty":qty,
                "scope":add
            },
            dataType: "dataType",
            success: function (response) {
                if(response ==201)
                {
                    alertify.success("product added to cart");
                }
                else if(response ==401)
                {
                    alert("Log-In to Continue");
                    alertify.success("product added to cart");
                }
            }
        });
    });


});
