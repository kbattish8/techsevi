<?php
if(isset($_POST["b1"]))
{
    $t=0;
    if(!empty($_POST['t1'])&&is_numeric($_POST['t1']))
    {
        $n=strlen((string)$_POST['t1']);
        if($n==16)
        {
            $cn=$_POST['t1'];
        }
        else
        {
            $t=1;
            echo "Enter valid card number";
        }
    }
    else
    {
        $t=1;
        echo "Card number cannot be empty";
    }
    if(!empty($_POST['t2']))
    {
        $mn=$_POST['t2'];
    }
    else
    {
        $t=1;
        echo "This field cannot be empty";
    }
    if(!empty($_POST['t3']))
    {
        $n=strlen((string)$_POST['t3']);
        if($n==3)
        {
            $cn=$_POST['t3'];
        }
        else
        {
            $t=1;
            echo "Enter valid CVV";
        }
    }
    else
    {
        $t=1;
        echo "CVV cannot be empty";
    }
    if(!empty($_POST['t4']))
    {
      $nm=$_POST['t4'];
    }
    else
    {
        $t=1;
        echo "Name cannot be empty";
    }
    if($t==0)
{
    $con=new mysqli("localhost","root","","technology");
    if($con==true)
    {
        $q="delete FROM product";
        $t=$con->query($q);
        echo"<script>window.location.href='index.php'</script>";
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="payment.css">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>

<div class="container">
        <!-- <div class="row">
            <div class="col-lg-4 mb-lg-0 mb-3">
                <div class="card p-3">
                    <div class="img-box">
                        <img src="https://www.freepnglogos.com/uploads/visa-logo-download-png-21.png" alt="">
                    </div>
                    <div class="number">
                        <label class="fw-bold" for="">**** **** **** 1060</label>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <small><span class="fw-bold">Expiry date:</span><span>10/16</span></small>
                        <small><span class="fw-bold">Name:</span><span>Kumar</span></small>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-lg-0 mb-3">
                <div class="card p-3">
                    <div class="img-box">
                        <img src="https://www.freepnglogos.com/uploads/mastercard-png/file-mastercard-logo-svg-wikimedia-commons-4.png"
                            alt="">
                    </div>
                    <div class="number">
                        <label class="fw-bold">**** **** **** 1060</label>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <small><span class="fw-bold">Expiry date:</span><span>10/16</span></small>
                        <small><span class="fw-bold">Name:</span><span>Kumar</span></small>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-lg-0 mb-3">
                <div class="card p-3">
                    <div class="img-box">
                        <img src="https://www.freepnglogos.com/uploads/discover-png-logo/credit-cards-discover-png-logo-4.png"
                            alt="">
                    </div>
                    <div class="number">
                        <label class="fw-bold">**** **** **** 1060</label>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <small><span class="fw-bold">Expiry date:</span><span>10/16</span></small>
                        <small><span class="fw-bold">Name:</span><span>Kumar</span></small>
                    </div>
                </div>
            </div> -->
            <div class="col-12 mt-4">
                <div class="card p-3">
                    <p class="mb-0 fw-bold h4">Payment Methods</p>
                </div>
            </div>
            <div class="col-12">
                <div class="card p-3">
                    <div class="card-body border p-0">
                        <p>
                            <a class="btn btn-primary w-100 h-100 d-flex align-items-center justify-content-between"
                                data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true"
                                aria-controls="collapseExample">
                                <span class="fw-bold">PayPal</span>
                                <span class="fab fa-cc-paypal">
                                </span>
                            </a>
                        </p>
                        <div class="collapse p-3 pt-0" id="collapseExample">
                            <div class="row">
                                <div class="col-8">
                                    <p class="h4 mb-0">Summary</p>
                                    <p class="mb-0"><span class="fw-bold">Product:</span><span class="c-green">:</span></p>
                                    <p class="mb-0"><span class="fw-bold">Price:</span><span
                                            class="c-green">:$452.90</span></p>
                                    <p class="mb-0">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque
                                        nihil neque
                                        quisquam aut
                                        repellendus, dicta vero? Animi dicta cupiditate, facilis provident quibusdam ab
                                        quis,
                                        iste harum ipsum hic, nemo qui!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border p-0">
                        <p>
                            <a class="btn btn-primary p-2 w-100 h-100 d-flex align-items-center justify-content-between"
                                data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true"
                                aria-controls="collapseExample">
                                <span class="fw-bold">Credit/Debit Card</span>
                                <span class="">
                                    <span class="fab fa-cc-amex"></span>
                                    <span class="fab fa-cc-mastercard"></span>
                                    <span class="fab fa-cc-discover"></span>
                                </span>
                            </a>
                        </p>
                        <div class="collapse show p-3 pt-0" id="collapseExample">
                            <div class="row">
                                <div class="col-lg-5 mb-lg-0 mb-3">
                                    <?php
                                    $con=new mysqli("localhost","root","","technology");
                                    if($con==true)
                                    {
                                        $q="SELECT * FROM product where pid=$_GET[id]";
                                        $t=$con->query($q);
                                        if($t->num_rows>0)
                                        {
                                            while($row = $t->fetch_assoc()) {
                                                echo"<p class='h4 mb-0'>Summary</p>
                                                <p class='mb-0'><span class='fw-bold'>Product:</span><span class='c-green'>". $row["name"]."</span>
                                                </p>
                                                <p class='mb-0'>
                                                    <span class='fw-bold'>Price:</span>
                                                    <span class='c-green'>".$row["price"]."</span>
                                                </p>
                                                <p class='mb-0'>".$row["description"]."</p>";
                                            }
                                        }
                                        else
                                        {
                                            echo "query prob";
                                        }
                                    }
                                    else
                                    {
                                        echo "connection problem";
                                    }
                                   
                                     ?>
                                </div>
                                <div class="col-lg-7">
                                    <form action="#" method=post class="form">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form__div">
                                                    <input type="text" class="form-control" placeholder=" " name=t1>
                                                    <label for="" class="form__label">Card Number</label>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form__div">
                                                    <input type="text" class="form-control" placeholder=" " name=t2>
                                                    <label for="" class="form__label">MM / yy</label>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form__div">
                                                    <input type="password" class="form-control" placeholder=" " name=t3>
                                                    <label for="" class="form__label">cvv code</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form__div">
                                                    <input type="text" class="form-control" placeholder=" " name=t4>
                                                    <label for="" class="form__label">name on the card</label>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <input type=submit class="btn btn-primary payment" value="Make Payment" name=b1 >
                
            </div>
            </form>
        </div>
    </div>


</body>

</html>