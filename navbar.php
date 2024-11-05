<head>
<link rel="stylesheet" href="nav.css">
</head>
<nav id="navbar">
    <div id="logo">
        <img src="1.png" alt="TechHome">
    </div>
    
    <ul>
        <li class="item"><a href="index.php#home"><i class="fa fa-home"></i> Home</a></li>
        <li class="item"><a href="index.php#services-container"><i class="fa fa-bars"></i> Products</a></li>
        <li class="item"><a href="aboutus.php">About</a></li>
        <li class="item"><a href="booking.php">Book Trial</a></li>
        <li class="item"><a href="contact-us.php">Contact-Us</a></li>
        
        <?php
        if (isset($_SESSION['auth'])) {
            echo "<li class='item' style= 'color:white;'>" . $_SESSION['auth_user']['name'] . "</li>";
            echo "<li class='item'><a href='logout.php'>Logout</a></li>";
        } else {
            echo "<li class='item'><a href='login.php'>Log-in</a></li>";
        }
        ?>
        
        <li class="item"><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
    </ul>
</nav>
