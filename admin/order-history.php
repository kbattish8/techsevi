<?php
include 'includes/header.php';
include '../middleware/adminmiddle.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> Orders History </h4>
                    <a href="orders.php" class="btn btn-warning float-end">
                        <i class="fa fa-reply"></i> Back
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>ID</th>
                            <th>User</th>
                            <th>Tracking No</th>
                            <th>Price</th>
                            <th>Date</th>
                            <th>View</th>
                        </thead>
                        <tbody>
                            <?php
                            $orders = getOrdersHistory();
                            if ($orders) {
                                if (mysqli_num_rows($orders) > 0) {
                                    foreach ($orders as $order) {
                                        ?>
                                        <tr>
                                            <td><?= $order['id'] ?></td>
                                            <td><?= $order['name'] ?></td>
                                            <td><?= $order['tracking_no'] ?></td>
                                            <td><?= $order['total_price'] ?></td>
                                            <td><?= $order['created_at'] ?></td>
                                            <td>
                                                <a href="view-order.php?t=<?= $order['tracking_no'] ?>" class="btn btn-primary">View
                                                    details</a>
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