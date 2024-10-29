<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>About-Us</title>
    <link rel="stylesheet" href="about.css">
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>

<body>
    <section>
      <?php include 'navbar.php'; ?>
        <div class="container">
            <div class="info">
                <h1 class="title">ABOUT-US</h1>
                <div class="content">
                <div class="artical">
    <h3>Welcome to TechSevi</h3>
    <p class="para">
        At TechSevi, we bring you the latest and most innovative electronics at unbeatable prices. From the 
        newest smartphones to high-performance laptops, cutting-edge gadgets, and accessories, we’re dedicated 
        to providing top-quality products that keep you connected, entertained, and empowered.
        <br><br>
        Our mission is to offer a seamless shopping experience, with a user-friendly interface, secure checkout, 
        and prompt delivery services. Browse our products page for an exclusive selection of gadgets and explore 
        our Book Trial option to experience our offerings firsthand.
    </p>
    <!-- <div class="btn">
        <a href="products.php">Explore Products</a>
    </div> -->
</div>

                </div>
            </div>

            <div class="image">
                <img src="about-us.jpg" alt="image not available">
            </div>
            <br>
            
        </div>
        <div class="social">
            <a href="#"><i class="fa fa-facebook-f fa-2x"></i></a>
            <a href="#"><i class="fa fa-instagram fa-2x"></i></a>
            <a href="#"><i class="fa fa-twitter fa-2x"></i></a>
            <a href="#"><i class="fa fa-youtube fa-2x"></i></a>
        </div>
        <footer>
            <div class="center">
                Copyright &copy; www.techsevi.com. All rights reserved!
            </div>
        </footer>

</body>

</html>