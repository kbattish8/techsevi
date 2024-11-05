<?php session_start();
header("Cache-Control: no-cache, must-revalidate"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="nav.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css"/>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
    <script src="admin/assets/js/custom.js"></script>  
</head>
<body>
    
<?php 
include 'navbar.php';

$host = "localhost";
$username = "root";
$password = "";
$dbname = "technology";

$con = mysqli_connect($host, $username, $password, $dbname);
if (!$con) {
    die("Could not connect to database: " . mysqli_connect_error());
}

function getproduct($table, $id) {
    global $con;
    $query = "SELECT * FROM $table WHERE pid = ? LIMIT 1";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    return mysqli_stmt_get_result($stmt);
}

if (isset($_GET['pid'])) {
    $product_data = getproduct('product', $_GET['pid']);
    $product = mysqli_fetch_array($product_data);
    if ($product) {
?>
        <div class="br-light py-4">
            <div class="container mt-3 product_data">
                <div class="row">
                    <div class="col-md-4">
                        <div class="shadow">
                            <img src="uploads/<?= htmlspecialchars($product['img']) ?>" alt="" class="w-100">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h4 class="fw-bold"><?= htmlspecialchars($product['name']) ?></h4>
                        <hr>
                        <h6>Product Description:</h6>
                        <p><?= htmlspecialchars($product['description']) ?></p>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Rs. <?= htmlspecialchars($product['price']); ?></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group mb-3" style="width: 130px">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" class="form-control text-center input-qty bg-white" id="product-qty-<?= $product['pid'] ?>" name="product_qty[<?= $product['pid'] ?>]" value="1" disabled autocomplete="off">
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <button class="btn btn-primary px-4 add-to-cart" data-prod_id="<?= $product['pid'] ?>"><i class="fa fa-shopping-cart me-2"></i>Add To Cart</button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-danger px-4"><i class="fa fa-heart me-2"></i>Add To Wishlist</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    } else {
        echo "Product Not Found";
    }
} else {
    echo "Product Not Found";
}
?>
<script>
    alertify.set('notifier', 'position', 'top-right'); 

    <?php if (isset($_SESSION['message'])) { ?>
        alertify.success('<?= $_SESSION['message'] ?>');
        <?php unset($_SESSION['message']); ?>
        $.ajax({
            method: "POST",
            url: "clear_message.php",
            success: function () {
                console.log("Session message cleared");
            },
            error: function () {
                console.log("Failed to clear session message");
            }
        });
    <?php } ?>
</script>

</body>
</html>
