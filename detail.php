<head>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

#navbar {
    display: flex;
    align-items: center;
    position: absolute;
    z-index: 1;
    width: 100%;
    height: 98px;
    margin-bottom: 10px;
}

#logo {
    margin: 10px 34px;
}

#logo img {
    height: 59px;
    margin: 3px 6px;
}

#navbar::before {
    content: "";
    background-color: black;
    position: absolute;
    top: 0px;
    left: 0px;
    height: 100%;
    width: 100%;
    z-index: -1;
    opacity: 0.7;
}

#navbar ul {
    font-size: 1.5rem;
    display: flex;
    font-family: 'Baloo Bhai', cursive;
}

#navbar ul li {
    list-style: none;
    font-size: 1.3rem;
}

#navbar ul li a {
    color: white;
    display: block;
    padding: 3px 22px;
    border-radius: 20px;
    text-decoration: none;
    font-size: 1.3rem;
}

#navbar ul li a:hover {
    color: black;
    background-color: white;
}
footer {
    background: black;
    color: white;
    padding: 9px 20px;
    text-align: center;
}
#head1
{
    color: rgb(8 220 208);

}
    </style>
</head>
<?php
$con=new mysqli("localhost","root","","technology");

$id="";
    $id=$_GET['id'];
$q="SELECT * FROM product where pid=$id";
$t=mysqli_query($con,$q);


?>
<body>
    <!-- <nav id="navbar">
        <div id="logo">
            <img src="1.png" alt="TechHome">
        </div>
        
        <ul>
            <li class="item"><a href="#home"><i class="fa fa-home"></i> Home</a></li>
            <li class="item"><a href="#services-container"><i class="fa fa-bars"></i> Products</a></li>
            <li class="item"><a href="aboutus.php">About</a></li>
            <li class="item"><a href="booking.php">Book Trial</a></li>
            <li class="item"><a href="contact-us.php">Contact-Us</a></li>
        </ul>
        <div class="icons">
            <a href="#"><i class="fa fa-facebook-f fa-2x"></i></a>
            <a href="#"><i class="fa fa-instagram fa-2x"></i></a>
            <a href="#"><i class="fa fa-twitter fa-2x"></i></a>
            <a href="#"><i class="fa fa-youtube fa-2x"></i></a>
        </div>
    </nav> -->
    <div class="container">
    <h1 class='h-primary center' id='head1'>Product Details</h1>
    <?php
    while($row =mysqli_fetch_assoc($t)) 
    {
        $pid=$row['pid'];
        $pname=$row['name'];
        $pcat=$row['category'];
        $price=$row['price'];
        $img=$row['img'];
        
    ?>
    <div class='row'>
        <div class='col-md-5'>
        <img src="<?php echo $img; ?>" width=200 height=200  alt='not available'>
        </div>
        <div class='col-md-7'>


        </div>
    </div>

  <?php     
    }
    ?>
    
    </div>
    <footer>
        <div class="center">
            Copyright &copy; www.techsevi.com. All rights reserved!
        </div>
    </footer>
    </body>