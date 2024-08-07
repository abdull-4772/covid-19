<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: #141e30;
            background: -webkit-linear-gradient(to right, #243b55, #141e30);
            background: linear-gradient(to right, #a884e9, #3d2862);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            position: relative;
            width: 100%;
            max-width: 400px;
            padding: 40px;
            background: #6f42c1;
            border-radius: 10px;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.6);
            text-align: center;
        }

        .login-box {
            position: relative;
            z-index: 1;
        }

        .login-box h2 {
            margin: 0 0 30px;
            padding: 0;
            color: #fff;
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
            color: #fff;
            margin-bottom: 30px;
            border: none;
            border-bottom: 1px solid #fff;
            outline: none;
            background: transparent;
        }

        .user-box label {
            position: absolute;
            top: 0;
            left: 0;
            padding: 10px 0;
            font-size: 16px;
            color: #fff;
            pointer-events: none;
            transition: 0.5s;
        }

        .user-box input:focus~label,
        .user-box input:valid~label {
            top: -20px;
            left: 0;
            color: #f686ff;
            font-size: 12px;
        }

        .button {
            position: relative;
            display: inline-block;
            padding: 10px 20px;
            color: #f686ff;
            background-color: transparent;
            border: none;
            font-size: 18px;
            text-decoration: none;
            text-transform: uppercase;
            overflow: hidden;
            transition: 0.5s;
            margin-top: 40px;
            letter-spacing: 4px;
            border-radius: 5px;
        }

        .button:hover {
            cursor: pointer;
            background: #f686ff;
            color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 5px #f686ff,
                0 0 25px #f686ff,
                0 0 50px #f686ff,
                0 0 100px #f686ff;
        }

        .button span {
            position: absolute;
            display: block;
        }

        .button span:nth-child(1) {
            top: 0;
            left: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, #f686ff);
            animation: btn-anim1 1s linear infinite;
        }

        .button span:nth-child(2) {
            top: -100%;
            right: 0;
            width: 2px;
            height: 100%;
            background: linear-gradient(180deg, transparent, #f686ff);
            animation: btn-anim2 1s linear infinite;
            animation-delay: 0.25s;
        }

        .button span:nth-child(3) {
            bottom: 0;
            right: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(270deg, transparent, #f686ff);
            animation: btn-anim3 1s linear infinite;
            animation-delay: 0.5s;
        }

        .button span:nth-child(4) {
            bottom: -100%;
            left: 0;
            width: 2px;
            height: 100%;
            background: linear-gradient(360deg, transparent, #f686ff);
            animation: btn-anim4 1s linear infinite;
            animation-delay: 0.75s;
        }

        @keyframes btn-anim1 {
            0% {
                left: -100%;
            }

            50%,
            100% {
                left: 100%;
            }
        }

        @keyframes btn-anim2 {
            0% {
                top: -100%;
            }

            50%,
            100% {
                top: 100%;
            }
        }

        @keyframes btn-anim3 {
            0% {
                right: -100%;
            }

            50%,
            100% {
                right: 100%;
            }
        }

        @keyframes btn-anim4 {
            0% {
                bottom: -100%;
            }

            50%,
            100% {
                bottom: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="login-box">
            <h2>Login</h2>
            <form action="../controllers/hospitalController.php" method="POST">
                <input type="hidden" name="action" value="login">
                <div class="user-box">
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>
                <div class="user-box">
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <button class="button" type="submit">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Login
                </button>
            </form>
        </div>
    </div>
</body>

</html>