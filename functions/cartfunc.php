<?php
include 'config/dbcon.php';
function getCartItems()
{
    global $con;
    $uid = $_SESSION['auth_user']['user_id'];
    $query = "SELECT c.id as cid, c.prod_id, c.prod_qty, p.pid as pid, p.name, p.img, p.price 
              FROM carts as c, product as p
              WHERE c.prod_id = p.pid AND c.user_id = '$uid' 
              ORDER BY c.id DESC";
    return $res = mysqli_query($con, $query);
}

function getOrders()
{
    global $con;
    $uid = $_SESSION["auth_user"]["user_id"];
    $query = "SELECT * FROM orders WHERE user_id='$uid' ORDER BY id DESC";
    return $query_run = mysqli_query($con, $query);

}

function CheckTrackingNOVaild($trackingNo)
{
    global $con;
    $uid = $_SESSION["auth_user"]["user_id"];
    $query = "SELECT * FROM orders Where tracking_no='$trackingNo' AND user_id='$uid'";
    return mysqli_query($con, $query);
}

?>