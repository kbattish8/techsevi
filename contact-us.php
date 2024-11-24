<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>

    <!-- External CSS and Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="contact.css">
</head>

<body>

    <!-- Navbar Section -->
    <section>
        <?php include 'navbar.php'; ?>
    </section>

    <!-- Form Section -->
    <div class="container">
        <form action="" method="POST">
            <div class="Contactform">
                <h2>Send Feedback</h2>

                <div class="formbox">
                    <div class="inputbox w50">
                        <input type="text" name="t1" required>
                        <span>First Name</span>
                    </div>
                    <div class="inputbox w50">
                        <input type="text" name="t2" required>
                        <span>Last Name</span>
                    </div>
                    <div class="inputbox w50">
                        <input type="email" name="t3" required>
                        <span>Email Address</span>
                    </div>
                    <div class="inputbox w50">
                        <input type="text" name="t4" required>
                        <span>Mobile No</span>
                    </div>
                    <div class="inputbox w100">
                        <textarea name="t5" required></textarea>
                        <span>Write Your Message</span>
                    </div>
                </div>

                <div class="inputbox w100">
                    <input type="submit" value="Send" name="b1">
                </div>
            </div>
        </form>
    </div>

    <!-- Footer Section -->
    <footer>
        <div class="center">
            Copyright &copy; www.techsevi.com. All rights reserved!
        </div>
    </footer>

    <!-- PHP Form Submission -->
    <?php
    if (isset($_POST['b1'])) {
        $errors = 0;

        // Form validation
        $fn = !empty($_POST['t1']) ? $_POST['t1'] : $errors++;
        $ln = !empty($_POST['t2']) ? $_POST['t2'] : $errors++;
        $email = !empty($_POST['t3']) ? $_POST['t3'] : $errors++;
        $mobile = !empty($_POST['t4']) ? $_POST['t4'] : $errors++;
        $message = !empty($_POST['t5']) ? $_POST['t5'] : $errors++;

        if ($errors == 0) {
            // Database connection
            $con = new mysqli("localhost", "root", "", "technology");

            if ($con->connect_error) {
                echo "<script>alert('Database connection failed!');</script>";
            } else {
                $q = "INSERT INTO feedback (fname, lname, email, mobile, message) VALUES ('$fn', '$ln', '$email', '$mobile', '$message')";
                if ($con->query($q) === TRUE) {
                    echo "<script>alert('Feedback submitted successfully!');</script>";
                } else {
                    echo "<script>alert('Error submitting feedback.');</script>";
                }
                $con->close();
            }
        } else {
            echo "<script>alert('Please fill in all fields.');</script>";
        }
    }
    ?>

</body>

</html>
