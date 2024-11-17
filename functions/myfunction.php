<?php
include('../config/dbcon.php');

function redirect($url, $msg)
{
    $_SESSION['message'] = $msg;
    header("Location: $url");  
    exit();
}
function getAll($table)
{
    global $con;
    $query="SELECT * FROM $table";
    return $res=mysqli_query($con,$query);
}
function getbyId($table,$id)
{
    global $con;
    $query="SELECT * FROM $table WHERE pid='$id'";
    return $res=mysqli_query($con,$query);
}

function getALLOrders()
{
    global $con;
    $uid = $_SESSION["auth_user"]["user_id"];
    $query = "SELECT * FROM orders WHERE status='0'";
    return $query_run = mysqli_query($con, $query);

}
function getOrdersHistory()
{
    global $con;
    $uid = $_SESSION["auth_user"]["user_id"];
    $query = "SELECT * FROM orders WHERE status!='0'";
    return $query_run = mysqli_query($con, $query);

}

function CheckTrackingNOVaild($trackingNo)
{
    global $con;
    $uid = $_SESSION["auth_user"]["user_id"];
    $query = "SELECT * FROM orders Where tracking_no='$trackingNo'";
    return mysqli_query($con, $query);
}

?>
