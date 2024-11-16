<?php session_start(); ?>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css"/>
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
                        <input type="text" name="name" required placeholder="Enter Your full name" class="form-control">
                    </div>
                    <div class="col-md6 mb-3">
                        <label class="fw-bold">Email:</label>
                        <input type="email" name="email" required placeholder="Enter Your Email" class="form-control">
                    </div>
                    <div class="col-md6 mb-3">
                        <label class="fw-bold">Phone:</label>
                        <input type="number" name="phone" required placeholder="Enter Your Phone Number" class="form-control">
                    </div>
                    <div class="col-md6 mb-3">
                        <label class="fw-bold">Pincode:</label>
                        <input type="number" name="pincode" required placeholder="Enter Your Pincode" class="form-control">
                    </div>
                    <div class="col-md6 mb-3">
                        <label class="fw-bold">Address:</label>
                        <textarea name="address" required class="form-control" rows="5"></textarea>
                    </div>
                </div>
                </div>
                <div class="col-md-5">
                    <h5>Order Details</h5>
                    <hr>
                    <?php $items=getCartItems();
                    $totalprice=0;
                    foreach($items as $citem)
                    {
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
                        $totalprice+=$citem['price']* $citem['prod_qty'];
                        
                    }
                    ?>
                    <hr>
                    <h5>Total Price: <span class="float-end fw-bold"><?= $totalprice ?></span></h5>
                    <div class="">
                        <input type="hidden" name="payment_mode" value="COD">
                        <!-- <input type="hidden" name="payment_id" value="NULL"> -->
                        <button type="submit" name="placeOrderBtn" class="btn btn-primary w-100">Proceed to pay</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>
</div>
