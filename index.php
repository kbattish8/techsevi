<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TechSevi</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="favicon.ico">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="product.css">
</head>

<body>
    <?php include 'navbar.php'; ?>

    <section id="home">
        <h1 class="h-primary">Technology</h1>
        <p>That Keeps On Evolving</p>
        <button class="btn">Explore</button>
    </section>

    <section id='services-container'>
        <h1 class='h-primary center' id='head1'>Products</h1>
        <div id='product-items'>
            <?php
            $con = new mysqli("localhost", "root", "", "technology");

            if ($con->connect_error) {
                die("Connection failed: " . $con->connect_error);
            }

            $q = "SELECT * FROM product";
            $t = $con->query($q);

            while ($row = $t->fetch_assoc()) {
                $pid = $row['pid'];
                $pname = $row['name'];
                $pcat = $row['category'];
                $price = $row['price'];
                $img = $row['img'];

                echo "

                <div class='product'>
                    <div class='product-content'>
                        <a href='product-view.php?pid=$pid'> 
                       <div class='product-img'>
                            <img src='uploads/$img' alt='not available'>
                        </div>
                        </a>
                        
                    </div>
                    <div class='product-info'>
                        <div class='product-info-top'>
                        <a href='product-view.php?pid=$pid' class='product-name'> 
                            <h2 class='sm-title'>$pcat</h2>
                            <div class='rating'>
                                <span><i class='fa fa-star'></i></span>
                                <span><i class='fa fa-star'></i></span>
                                <span><i class='fa fa-star'></i></span>
                                <span><i class='fa fa-star-half-empty'></i></span>
                                <span><i class='fa fa-star-o'></i></span>
                            </div>
                        </div>
                        <a href='#' class='product-name'>$pname</a>
                         </a>
                        <p>₹ $price</p>
                    </div>
                </div>";
            }

            $con->close();
            ?>
        </div>
    </section>

    <footer>
        <div class="center">
            Copyright &copy; www.techsevi.com. All rights reserved!
        </div>
    </footer>
</body>
</html>

<!-- <div class='product-btns'>
<button type='button' class='btn-cart'>Add to cart
    <span><i class='fa fa-plus'></i></span>
</button>
<a href='payment.php?id=$pid' class='btn-buy'> Buy now
    <span><i class='fa fa-shopping-cart'></i></span>
</a>
</div> -->