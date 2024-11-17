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

if (isset($_GET['t'])) {
    $tracking_no = $_GET['t'];
    $order_data = CheckTrackingNOVaild($tracking_no);

    if (mysqli_num_rows($order_data) <= 0) {
        echo 'Something went wrong';
        exit;
    }
} else {
    echo 'Something went wrong';
    exit;
}

$data = mysqli_fetch_array($order_data);
?>

<div class="py-5">
    <div class="container">
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <span class="text-white fs-4"> View Order</span>
                            <a href="myorder.php" class="btn btn-warning float-end"><i class="fa fa-reply"></i>Back</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Delivery Details -->
                                <div class="col-md-6">
                                    <h4>Delivery Details</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <label for="">Name</label>
                                            <div class="border p-1">
                                                <?= htmlspecialchars($data['name']) ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Email</label>
                                            <div class="border p-1">
                                                <?= htmlspecialchars($data['email']) ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Phone</label>
                                            <div class="border p-1">
                                                <?= htmlspecialchars($data['phone']) ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Tracking No</label>
                                            <div class="border p-1">
                                                <?= htmlspecialchars($data['tracking_no']) ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Address</label>
                                            <div class="border p-1">
                                                <?= htmlspecialchars($data['address']) ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Pincode</label>
                                            <div class="border p-1">
                                                <?= htmlspecialchars($data['pincode']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                                <div class="col-md-6">
                                    <h4>Order Details</h4>
                                    <hr>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Qty</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $user_id = $_SESSION['auth_user']['user_id'];
                                            $order_query = "SELECT o.id as oid, o.tracking_no, o.user_id, oi.*,oi.qty as oqty , p.* 
                                                            FROM orders o, order_items oi, product p 
                                                            WHERE o.user_id='$user_id' AND oi.order_id=o.id 
                                                            AND p.pid=oi.prod_id AND o.tracking_no='$tracking_no'";
                                            $query_run = mysqli_query($con, $order_query);
                                            if (mysqli_num_rows($query_run) > 0) {
                                                foreach ($query_run as $row) {
                                                    ?>
                                                    <tr>
                                                        <td class="align-middle">
                                                            <img src="uploads/<?= $row['img']; ?>" alt="<?= $row['name']; ?>" width="50px" height="50px">
                                                            <?= htmlspecialchars($row['name']) ?>
                                                        </td>
                                                        <td class="align-middle"><?= htmlspecialchars($row['price']) ?></td>
                                                        <td class="align-middle"><?= htmlspecialchars($row['oqty']) ?></td>
                                                    </tr>
                                                    <?php
                                                }
                                            } else {
                                                echo "<tr><td colspan='3'>No order details found.</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <h5>Total Price: <span class="float-end fw-bold"><?= $data['total_price'] ?></span></h5>
                                    <hr>
                                    <div class="border p-1 mb-3">
                                        <label class="fw-bold">Payment Mode:</label>
                                        <?= $data['payment_mode'] ?>
                                    </div>
                                    <div class="border p-1 mb-3">
                                        <label class="fw-bold">Status:</label>
                                        <?php
                                        if( $data['status']==0)
                                        {
                                            echo "Pending";
                                        }elseif($data['status']==1)
                                        {
                                            echo 'Completed';
                                        } 
                                        elseif($data['status']==2)
                                        {
                                            echo 'Cancled';
                                        } 

                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
