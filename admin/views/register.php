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
            color: #6f42c1;
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
            border-bottom: 1px solid #6f42c1;
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
            color: #6f42c1;
            font-size: 12px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            background-color: #6f42c1;
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
            background-color: #6f42c1;
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
            $form->register($username, $password);
        }
    }
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['status']) && $_GET['status'] === 'failed') {
            echo '<script>alert("Registration failed. Please try again.");</script>';
        }
    }
    ?>

    <div class="container">
        <div class="login-box">
            <h2>Admin Register</h2>
            <form action="./register.php" method="POST">

                <div class="user-box">
                    <input type="text" name="username" required>
                    <label>Username</label>
                </div>
                <div class="user-box">
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <button class="btn" type="submit">Register</button>
            </form>
            <br>
            <small>If you already have an account, <a href="./login.php">please log in here</a>.</small>
        </div>
    </div>
</body>

</html>