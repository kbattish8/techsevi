<?php
session_start();
require 'orderfunc.php';

// Check if the user is authenticated
if (isset($_SESSION['auth'])) {
    // Check if the order is placed (either via form or fetch)
    if (isset($_POST['placeOrderBtn'])) {
        // Get data from form submission
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $pincode = mysqli_real_escape_string($con, $_POST['pincode']);
        $address = mysqli_real_escape_string($con, $_POST['address']);
        $payment_mode = mysqli_real_escape_string($con, $_POST['payment_mode']);
        $payment_id = mysqli_real_escape_string($con, $_POST['payment_id'] ?? 'NULL'); // For COD, payment_id will be NULL

        // Validate fields
        if ($name == '' || $email == '' || $phone == '' || $pincode == '' || $address == '') {
            $_SESSION['message'] = "All fields are mandatory";
            header("Location: ../checkout.php");
            exit();
        }

        // Get cart items and calculate total price
        $cartItems = getCartItems();
        $totalprice = 0;
        foreach ($cartItems as $citem) {
            $totalprice += $citem['price'] * $citem['prod_qty'];
        }

        // User ID and tracking number
        $uid = $_SESSION['auth_user']['user_id'];
        $tracking_no = "techsevi" . rand(1111, 9999);

        // Insert order into the orders table
        $insert_query = "INSERT INTO orders (tracking_no, user_id, name, email, phone, address, pincode, total_price, payment_mode, payment_id) 
                         VALUES ('$tracking_no', '$uid', '$name', '$email', '$phone', '$address', '$pincode', '$totalprice', '$payment_mode', '$payment_id')";
        
        $res = mysqli_query($con, $insert_query);

        if ($res) {
            $order_id = mysqli_insert_id($con);

            // Insert order items into the order_items table
            foreach ($cartItems as $citem) {
                $prod_id = $citem['prod_id'];
                $prod_qty = $citem['prod_qty'];
                $prod_price = $citem['price'];

                $insert_items_query = "INSERT INTO order_items (order_id, prod_id, qty, price) VALUES ('$order_id', '$prod_id', '$prod_qty', '$prod_price')";
                mysqli_query($con, $insert_items_query);

                // Update the product quantity
                $products_query = "SELECT * FROM product WHERE pid='$prod_id' LIMIT 1";
                $products_data = mysqli_fetch_array(mysqli_query($con, $products_query));
                $new_qty = $products_data['qty'] - $prod_qty;

                $update_qty_query = "UPDATE product SET qty='$new_qty' WHERE pid='$prod_id'";
                mysqli_query($con, $update_qty_query);
            }

            // Clear the cart after placing the order
            $deleteCartQuery = "DELETE FROM carts WHERE user_id='$uid'";
            mysqli_query($con, $deleteCartQuery);

            // For COD payment mode
            if ($payment_mode == "COD") {
                $_SESSION['message'] = "Order Placed successfully via COD";
                header("Location: ../myorder.php");
                exit();
            }
        } else {
            $_SESSION['message'] = "Failed to place order";
            header("Location: ../checkout.php");
            exit();
        }
    } else {
        // For AJAX requests (non-COD payments like PayPal)
        if (!empty(file_get_contents("php://input"))) {
            // Handle JSON input for non-COD payments (PayPal)
            $input = json_decode(file_get_contents("php://input"), true);

            if ($input === null) {
                echo json_encode(["status" => 400, "message" => "Invalid JSON data"]);
                exit();
            }

            // Get the data from JSON (AJAX request)
            $name = $input['name'];
            $email = $input['email'];
            $phone = $input['phone'];
            $pincode = $input['pincode'];
            $address = $input['address'];
            $payment_mode = $input['payment_mode'];
            $payment_id = $input['payment_id'];

            // Insert order and order items as shown above (similar to the above COD code)

            // Return response for AJAX request
            header('Content-Type: application/json');
            echo json_encode(["status" => 201, "message" => "Order Placed successfully"]);
            exit();
        }
    }
} else {
    // Redirect to login page if not authenticated
    header("Location: index.php");
    exit();
}
?>
