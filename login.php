<?php
session_start();

if (isset($_SESSION['auth'])) {
    header('Location: index.php');
    exit();
}

if (isset($_POST['b1'])) {
    if (!empty($_POST['t1']) && !empty($_POST['t2'])) {
        $a = $_POST['t1'];
        $b = $_POST['t2'];

        $con = new mysqli("localhost", "root", "", "technology");

        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }

        $a = $con->real_escape_string($a);
        $b = $con->real_escape_string($b);

        $q = "SELECT * FROM login WHERE username='$a' AND password='$b'";
        $query_run = $con->query($q);

        if ($query_run && $query_run->num_rows > 0) {
            $_SESSION['auth'] = true;
            $userdata = $query_run->fetch_assoc();
            $user_id=$userdata['id'];
            $uname = $userdata['name'];
            $uemail = $userdata['email'];
            $role = $userdata['role'];
            
            $_SESSION['auth_user'] = [
                'user_id'=>$user_id,
                'name' => $uname,
                'email' => $uemail,
            ];
            $_SESSION['role'] = $role;

           
            if ($role == 1) {  
                header('Location: admin/index.php');
            } else {
                header('Location: index.php');  
            }
            exit();
        } else {
            echo "<div style='color:red; text-align:center;'>Invalid Username or Password</div>";
        }
        
        $con->close();
    } else {
        echo "<div style='color:red; text-align:center;'>Username & Password cannot be empty</div>";
    }
}
?>


< html>
<head>
    <title>Login Page</title>
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
            font-weight: 600;
            margin-top: 25px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .or {
            color: rgba(255, 255, 255, 0.733);
            margin-top: 20px;
            text-align: center;
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
            margin-right: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .icon-button span:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        a {
            color: #00aaff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        footer {
            text-align: center;
            margin-top: 20px;
            color: white;
            font-size: 14px;
            position: relative;
            bottom: 10px;
            width: 100%;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="text">Login</div>
            <form action="#" method="post"> 
                <div class="field">
                    <span class="fa fa-user"></span>
                    <input type="text" placeholder="Email Id" name="t1">
                </div>
                <div class="field">
                    <span class="fa fa-lock"></span>
                    <input type="password" placeholder="Password" name="t2">
                </div>
                <button type="submit" name="b1">Log in</button>
                <div style="margin-top: 20px; text-align:center;">
                    <a href="signup.php">Not an existing user? Sign up</a>
                </div>
            </form>
            
        </div>
    </div>
    <footer>
        Copyright &copy; www.techsevi.com. All rights reserved!
    </footer>

   
</body>
    </html>
