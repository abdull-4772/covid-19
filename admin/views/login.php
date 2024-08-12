<?php
session_start();
if (isset($_SESSION['admin_user'])) {
    header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: #f0f0f0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #333;
        }

        .container {
            width: 100%;
            max-width: 400px;
            padding: 40px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .login-box h2 {
            margin-bottom: 30px;
            color: #007bff;
            text-transform: uppercase;
        }

        .user-box {
            position: relative;
            margin-bottom: 30px;
        }

        .user-box input {
            width: 100%;
            padding: 10px 0;
            font-size: 16px;
            color: #333;
            margin-bottom: 5px;
            border: none;
            border-bottom: 1px solid #007bff;
            outline: none;
            background: transparent;
        }

        .user-box label {
            position: absolute;
            top: 0;
            left: 0;
            padding: 10px 0;
            font-size: 16px;
            color: #333;
            pointer-events: none;
            transition: 0.5s;
        }

        .user-box input:focus~label,
        .user-box input:valid~label {
            top: -20px;
            left: 0;
            color: #007bff;
            font-size: 12px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            background-color: #007bff;
            border: none;
            font-size: 16px;
            text-decoration: none;
            transition: 0.3s;
            margin-top: 20px;
            border-radius: 5px;
            font-weight: 700;
            text-align: center;
        }

        .btn:hover {
            background-color: #005bff;
        }
    </style>
</head>

<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            require_once '../controllers/adminController.php';
            $username = $_POST['username'];
            $password = $_POST['password'];
            $form = new adminController();
            $form->login($username, $password);
        }
    }
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['status']) && $_GET['status'] === 'invaliduser') {
            echo '<script>alert("Invalid username or password. Please try again.");</script>';
        }
    }
    ?>

    <div class="container">
        <div class="login-box">
            <h2>Admin Login</h2>
            <form action="./login.php" method="POST">

                <div class="user-box">
                    <input type="text" name="username" required>
                    <label>Username</label>
                </div>
                <div class="user-box">
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <button class="btn" type="submit">Login</button>
            </form>
            <br>
            <small>Don't have an account? <a href="./register.php">Sign up now</a>.</small>
        </div>
    </div>
</body>

</html>