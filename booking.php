<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trial Booking</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="booking_style.css">
</head>

<body>
    <!-- <nav id="navbar">
        <div id="logo">
            <img src="1.png" alt="TechHome">
        </div>
        <ul>
            <li class="item"><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li class="item"><a href="index.php"><i class="fa fa-bars"></i> Products</a></li>
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
        </ul>
        <div class="icons">
            <a href="#"><i class="fa fa-facebook-f fa-2x"></i></a>
            <a href="#"><i class="fa fa-instagram fa-2x"></i></a>
            <a href="#"><i class="fa fa-twitter fa-2x"></i></a>
            <a href="#"><i class="fa fa-youtube fa-2x"></i></a>
        </div>
    </nav> -->
    <?php include 'navbar.php' ?>
    <section class="Booking">
        <div class="book">
            <div class="form">
                <form action="#" method="post" class="form1">
                    <h2 class="head">
                        Start Booking
                    </h2>
                    <div class="form-group">
                        <input type="text" class="input" placeholder="Full Name" name=t1 id="name">
                        <label for="name" class="form-label">Full Name</label>
                    </div>
                    <div class="form-group">
                        <input type="email" class="input" placeholder="Eamil Address" name=t2 id="Email">
                        <label for="email" class="form-label">Email Address</label>
                    </div>
                    <div class="form-group">
                        <input type="date" class="input" placeholder="Date" name=t3 id="Email">
                        <label for="email" class="form-label">Date</label>
                    </div>

                    <button type=submit class="button" name=b1>Book Trial</button>
            </div>
            </form>
        </div>
        </div>
    </section>
    <footer>
        <div class="center">
            Copyright &copy; www.techsevi.com. All rights reserved!
        </div>
    </footer>

</body>
<?php
if(isset($_POST['b1']))
{
    if(!empty($_POST['t1']&&$_POST['t2']&&$_POST['t3']))
    {
        $a=$_POST['t1'];
        $b=$_POST['t2'];
        $c=$_POST['t3'];
        $con=new mysqli("localhost","root","","technology");
        $q="insert into booking(name,email,date) values ('$a','$b','$c')";
        if($con->query($q)==true)
        {
            echo "Booking Succesfull";
        }
        else
        {
            echo "Query prob";
        }
    }
    else
    {
        echo "Name or Email or Date cannot be empty";
    }
}
?>

</html>
