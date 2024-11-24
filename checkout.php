<?php session_start(); ?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css" />
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="admin/assets/js/custom.js"></script>
</head>
<?php
include 'navbar.php';
include 'functions/cartfunc.php';
?>
<div class="py-5">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="functions/placeorder.php" method="post">
                    <div class="row">
                        <div class="col-md-7">
                            <h5>Basic Details</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md6 mb-3">
                                    <label class="fw-bold">Name:</label>
                                    <input type="text" name="name" id="name" required placeholder="Enter Your full name"
                                        class="form-control">
                                    <small class="text-danger name"></small>
                                </div>
                                <div class="col-md6 mb-3">
                                    <label class="fw-bold">Email:</label>
                                    <input type="email" name="email" id="email" required placeholder="Enter Your Email"
                                        class="form-control">
                                    <small class="text-danger email"></small>
                                </div>
                                <div class="col-md6 mb-3">
                                    <label class="fw-bold">Phone:</label>
                                    <input type="number" name="phone" id="phone" required
                                        placeholder="Enter Your Phone Number" class="form-control">
                                    <small class="text-danger phone"></small>
                                </div>
                                <div class="col-md6 mb-3">
                                    <label class="fw-bold">Pincode:</label>
                                    <input type="number" name="pincode" id="pincode" required
                                        placeholder="Enter Your Pincode" class="form-control">
                                    <small class="text-danger pincode"></small>

                                </div>
                                <div class="col-md6 mb-3">
                                    <label class="fw-bold">Address:</label>
                                    <textarea name="address" id="address" required class="form-control"
                                        rows="5"></textarea>
                                    <small class="text-danger address"></small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <h5>Order Details</h5>
                            <hr>
                            <?php $items = getCartItems();
                            $totalprice = 0;
                            foreach ($items as $citem) {
                                ?>
                                <div class="mb-1 border">
                                    <div class="row align-items-center">
                                        <div class="col-md-2">
                                            <img src="uploads/<?= $citem['img'] ?>" alt="Image" width="60px">
                                        </div>
                                        <div class="col-md-3">
                                            <label><?= $citem['name'] ?></label>
                                        </div>
                                        <div class="col-md-3">
                                            <label><?= $citem['price'] ?></label>
                                        </div>
                                        <div class="col-md-3">
                                            <label>x <?= $citem['prod_qty'] ?></label>
                                        </div>

                                    </div>
                                </div>
                                <?php
                                $totalprice += $citem['price'] * $citem['prod_qty'];

                            }
                            ?>
                            <hr>
                            <h5>Total Price: <span class="float-end fw-bold"><?= $totalprice ?></span></h5>
                            <div class="">
                                <input type="hidden" name="payment_mode" value="COD">
                                <!-- <input type="hidden" name="payment_id" value="NULL"> -->
                                <button type="submit" name="placeOrderBtn" class="btn btn-primary w-100">Proceed with
                                    COD</button>
                                <div id="paypal-button-container" class="mt-3"></div>
                                <p id="result-message"></p>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Initialize the JS-SDK -->
    <script
        src="https://www.paypal.com/sdk/js?client-id=Ab3kduZG6O-naMQl1SVxsepEERmrdRgZn_eJaehn9eplY3hy5fMRb-RxcBFOZ8ziWv51SQhQZhLiDNDF&buyer-country=US&currency=USD&components=buttons&enable-funding=venmo,paylater,card"
        data-sdk-integration-source="developer-studio"></script>
        <script>
    window.paypal
        .Buttons({
            // Validate form before creating the order
            onClick: function () {
                let isValid = true;

                const name = $('#name').val();
                const email = $('#email').val();
                const phone = $('#phone').val();
                const pincode = $('#pincode').val();
                const address = $('#address').val();

                // Validate fields and show error messages
                if (name.trim().length === 0) {
                    $('.name').text("*This field is required");
                    isValid = false;
                } else {
                    $('.name').text("");
                }
                if (email.trim().length === 0) {
                    $('.email').text("*This field is required");
                    isValid = false;
                } else {
                    $('.email').text("");
                }
                if (phone.trim().length === 0) {
                    $('.phone').text("*This field is required");
                    isValid = false;
                } else {
                    $('.phone').text("");
                }
                if (pincode.trim().length === 0) {
                    $('.pincode').text("*This field is required");
                    isValid = false;
                } else {
                    $('.pincode').text("");
                }
                if (address.trim().length === 0) {
                    $('.address').text("*This field is required");
                    isValid = false;
                } else {
                    $('.address').text("");
                }

                // Prevent PayPal button click if validation fails
                if (!isValid) {
                    return false;
                }
            },

            // Create order
            createOrder: async (data, actions) => {
                return actions.order.create({
                    purchase_units: [
                        {
                            amount: {
                                currency_code: 'USD',
                                value: <?= $totalprice; ?>, 
                            },
                        },
                    ],
                });
            },

            // Capture order
            onApprove: async (data, actions) => {
                return actions.order.capture().then(function (orderData) {
                    console.log('Capture result:', orderData, JSON.stringify(orderData, null, 2));
                    const transaction = orderData.purchase_units[0].payments.captures[0]; // Fixed typo 'paymments' to 'payments'

                    const name = $('#name').val();
                    const phone = $('#phone').val();
                    const pincode = $('#pincode').val();
                    const address = $('#address').val();

                    // Prepare data for Fetch request
                    const formData = {
                        name: name,
                        phone: phone,
                        pincode: pincode,
                        address: address,
                        payment_mode: "Paid by PayPal",
                        payment_id: transaction.id,
                        placeOrderBtn: true,
                    };

                    // Send data using Fetch API
                    fetch("functions/placeorder.php", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                        },
                        body: JSON.stringify(formData),
                    })
                        .then((response) => response.json()) // Expecting JSON response
                        .then((data) => {
                            if (data.status === 201) {
                                console.log("Order Placed Successfully:", data);
                                alertify.success("Order Placed Successfully");
                                window.location.href = '/index.php';
                            } else {
                                console.error("Error placing order:", data);
                                alertify.error("Failed to place order. Please try again.");
                            }
                        })
                        .catch((error) => {
                            console.error("Fetch Error:", error);
                            alert("An error occurred while placing the order.");
                        });
                }).catch(function (error) {
                    console.error('Capture error:', error);
                    alert('Something went wrong during the capture process.');
                });
            },

            // Handle errors
            onError: (err) => {
                console.error('PayPal Checkout Error:', err);
                // alert('An error occurred while processing the payment. Please try again.');
            },
        })
        .render("#paypal-button-container"); // Render the PayPal button
</script>
