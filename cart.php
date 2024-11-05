<?php session_start(); ?>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="admin/assets/js/custom.js"></script>
</head>
<?php
include 'navbar.php';
include 'functions/cartfunc.php';
?>
<div class="py-5">
<div class="container">
    <div class="">
    <div class="row">
        <div class="col-md-12">
        <div class="row align-items-center">
                    <div class="col-md-5">
                        <h6>Product</h6>
                    </div>

                    <div class="col-md-3">
                        <h6>Price</h6>
                    </div>
                    <div class="col-md-2">
                        <h6>Quantity</h6>
                    </div>
                    <div class="col-md-2">
                       <h6>Remove</h6>
                    </div>
                    
                </div>
            <?php $items=getCartItems();
            
            foreach($items as $citem)
            {
                ?>
                <div class="card product_data shadow-sm mb-3">
                <div class="row align-items-center">
                    <div class="col-md-2">
                        <img src="uploads/<?= $citem['img'] ?>" alt="Image" width="80px" height="80px">
                    </div>
                    <div class="col-md-3">
                        <h5><?= $citem['name'] ?></h5>
                    </div>
                    <div class="col-md-3">
                        <h5><?= $citem['price'] ?></h5>
                    </div>
                    <div class="col-md-2">
                        <input type="hidden" class="prodid" value="<?= $citem['pid'] ?>">
                    <div class="input-group mb-3" style="width: 130px">
                <button class="input-group-text decrement-btn updateQty" data-prod_id="<?= $citem['cid'] ?>">-</button>
                <input type="text" class="form-control text-center input-qty bg-white" value="<?= $citem['prod_qty'] ?>" disabled autocomplete="off" data-prod_id="<?= $citem['cid'] ?> ">
                <button class="input-group-text increment-btn updateQty" data-prod_id="<?= $citem['cid'] ?>">+</button>
            </div>
                    </div>
                    <div class="col-md-2">
                        <div class="btn btn-danger btn-sm">
                            <i class="fa fa-trash me-2"></i>Remove</div>
                    </div>
                    
                </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    </div>
</div>
</div>
