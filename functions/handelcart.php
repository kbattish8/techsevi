<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css"/>
    <script src="admin/assets/js/custom.js"></script>  
</head>
<body>

<?php 
session_start();
include('config/dbcon.php');

if(isset($_SESSION['auth']))
{
    if(isset($_SESSION['scope']))
    {
        $scope=$_POST['scope'];
        switch($scope)
        {
            case "add":
                $prod_id=$_POST['prod_id'];
                $prod_qty=$_POST['prod_qty'];
                $user_id=$_SESSION['auth_user']['user_id'];
                $insert_query="INSERT INTO carts (user_id,prod_id,prod_qty) VALUES('$user_id','$prod_id','$prod_qty')";
                $res=mysqli_query($con,$insert_query);
                if($res)
                {
                    echo 201;
                }
                else
                {
                    echo 500;
                }
                break;
            default:
                echo 500;

        }

    }
}
else{
    echo  401;
}
?>
<!-- alertify js -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
  <script>
    <?php if(isset($_SESSION['message'])){?>
    alertify.set('notifier','position', 'top-right');
    alertify.success('<?= $_SESSION['message'] ?>');
  <?php 
    unset($_SESSION['message']);
} ?>
</script>
</body>
</html>