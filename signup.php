<?php
session_start();
if(isset($_SESSION['auth'])) {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        html, body {
            height: 100%;
            background: rgba(0, 0, 0, 0.7) url("uploads/background.png") no-repeat center center/cover;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .container {
            width: 100%;
            max-width: 450px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            border: 1px solid #00aaff;
        }

        .content {
            padding: 40px 30px;
        }

        .content .text {
            font-size: 28px;
            font-weight: 700;
            color: #00aaff;
            margin-bottom: 35px;
            text-align: center;
        }

        .field {
            height: 50px;
            width: 100%;
            display: flex;
            position: relative;
            margin-bottom: 25px;
        }

        .field input {
            height: 100%;
            width: 100%;
            padding-left: 45px;
            font-size: 18px;
            outline: none;
            border: none;
            color: white;
            background: rgba(105, 105, 105, 0.2);
            border-radius: 8px;
            border: 1px solid #00aaff;
        }

        .field input::placeholder {
            color: #00aaff;
        }

        .field span {
            position: absolute;
            left: 10px;
            line-height: 50px;
            color: #00aaff;
        }

        button {
            width: 100%;
            height: 50px;
            background-color: rgba(105, 105, 105, 0.2);
            border: 2px solid #00aaff;
            border-radius: 8px;
            color: white;
            font-size: 18px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .or {
            color: rgba(255, 255, 255, 0.7);
            text-align: center;
            margin-top: 20px;
        }

        .icon-button {
            margin-top: 15px;
            text-align: center;
        }

        .icon-button span {
            display: inline-block;
            padding: 10px 20px;
            color: #00aaff;
            border: 1px solid #00aaff;
            border-radius: 8px;
            margin: 5px;
            cursor: pointer;
        }

        .icon-button span:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        a {
            color: #00aaff;
            text-decoration: none;
            text-align: center;
            display: block;
            margin-top: 20px;
        }

        footer {
            /* background: black; */
            color: white;
            padding: 10px 0;
            text-align: center;
            margin-top: 40px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="content">
        <div class="text">Sign Up</div>
        <form action="#" method="post">
            <div class="field">
                <span class="fa fa-user"></span>
                <input type="text" placeholder="Name" name="t1">
            </div>
            <div class="field">
                <span class="fa fa-user"></span>
                <input type="text" placeholder="Email" name="t2">
            </div>
            <div class="field">
                <span class="fa fa-user"></span>
                <input type="text" placeholder="Username" name="t3">
            </div>
            <div class="field">
                <span class="fa fa-lock"></span>
                <input type="password" placeholder="Password" name="t4">
            </div>
            <button type="submit" name="b1">Sign Up</button>
        </form>
        <a href="login.php">Existing User? Login</a>
    </div>
</div>

<footer>
        Copyright &copy; www.techsevi.com. All rights reserved!
</footer>

</body>
<?php
if (isset($_POST['b1'])) {
    if (!empty($_POST['t1']) && !empty($_POST['t2'])) {
        $a = $_POST['t1'];
        $b = $_POST['t2'];
        $c = $_POST['t3'];
        $d = $_POST['t4'];
        $con = new mysqli("localhost", "root", "", "technology");
        $q = "INSERT INTO login(name, email, username, password) VALUES ('$a', '$b', '$c', '$d')";
        $t = $con->query($q);
        if ($t == true) {
            echo "<script> window.location.href='login.php'</script>";
        } else {
            echo "Query problem";
        }
    } else {
        echo "Username & Password cannot be empty";
    }
}
?>
</html>
