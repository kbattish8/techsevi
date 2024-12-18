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
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Tracking No</th>
                            <th>Price</th>
                            <th>Date</th>
                            <th>View</th>
                        </thead>
                        <tbody>
                            <?php
                            $orders = getOrders();
                            if ($orders) {
                                if (mysqli_num_rows($orders) > 0) {
                                    foreach ($orders as $order) {
                                        ?>
                                        <tr>
                                            <td><?= $order['id'] ?></td>
                                            <td><?= $order['tracking_no'] ?></td>
                                            <td><?= $order['total_price'] ?></td>
                                            <td><?= $order['created_at'] ?></td>
                                            <td>
                                                <a href="view-order.php?t=<?= $order['tracking_no']?>" class="btn btn-primary">View details</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }

                                }

                            } else {
                                ?>
                                <tr>
                                    <td colspan="5">No orders yet</td>
                                </tr>
                                <?php

                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>