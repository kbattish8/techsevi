<?php
include 'includes/header.php';
include '../middleware/adminmiddle.php';

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

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <span class="text-white fs-4">View Order</span>
                    <a href="order-history.php" class="btn btn-success float-end"><i class="fa fa-history"></i> Order history </a>
                    
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
                                    <div class="border p-1"><?= htmlspecialchars($data['name']); ?></div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="fw-bold">Email</label>
                                    <div class="border p-1"><?= htmlspecialchars($data['email']); ?></div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="fw-bold">Phone</label>
                                    <div class="border p-1"><?= htmlspecialchars($data['phone']); ?></div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="fw-bold">Tracking No</label>
                                    <div class="border p-1"><?= htmlspecialchars($data['tracking_no']); ?></div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="fw-bold">Address</label>
                                    <div class="border p-1"><?= htmlspecialchars($data['address']); ?></div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="fw-bold">Pincode</label>
                                    <div class="border p-1"><?= htmlspecialchars($data['pincode']); ?></div>
                                </div>
                            </div>
                        </div>

                        <!-- Order Details -->
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
                                    $order_query = "SELECT o.id AS oid, o.tracking_no, o.user_id, oi.qty AS oqty, p.* 
                                                    FROM orders o 
                                                    JOIN order_items oi ON oi.order_id = o.id 
                                                    JOIN product p ON p.pid = oi.prod_id 
                                                    WHERE o.tracking_no = '$tracking_no'";
                                    $query_run = mysqli_query($con, $order_query);

                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $row) {
                                            ?>
                                            <tr>
                                                <td class="align-middle">
                                                    <img src="../uploads/<?= htmlspecialchars($row['img']); ?>" 
                                                         alt="<?= htmlspecialchars($row['name']); ?>" 
                                                         width="50px" height="50px">
                                                    <?= htmlspecialchars($row['name']); ?>
                                                </td>
                                                <td class="align-middle"><?= htmlspecialchars($row['price']); ?></td>
                                                <td class="align-middle"><?= htmlspecialchars($row['oqty']); ?></td>
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
                            <h5>Total Price: <span class="float-end fw-bold"><?= htmlspecialchars($data['total_price']); ?></span></h5>
                            <hr>
                            <div class="border p-1 mb-3">
                                <label class="fw-bold">Payment Mode:</label>
                                <?= htmlspecialchars($data['payment_mode']); ?>
                            </div>
                            <label class="fw-bold">Status:</label>
                            <div class="mb-3">
                                <form action="code.php" method="post">
                                    <input type="hidden" name="tracking_no" value="<?= $data['tracking_no']; ?>">
                                    <select name="order-status" class="form-select">
                                        <option value="0"<?= $data['status'] == 0 ? ' selected' : ''; ?>>Pending</option>
                                        <option value="1"<?= $data['status'] == 1 ? ' selected' : ''; ?>>Completed</option>
                                        <option value="2"<?= $data['status'] == 2 ? ' selected' : ''; ?>>Cancelled</option>
                                    </select>
                                    <button type="submit" name="update_order_btn" class="btn btn-primary mt-2">Update Status</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
