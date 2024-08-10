<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #a884e9, #3d2862);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
        }

        .container {
            width: 100%;
            max-width: 400px;
            padding: 10px 35px;
            background: #6f42c1;
            border-radius: 10px;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.6);
            text-align: center;
        }

        .login-box h2 {
            margin-bottom: 25px;
            font-size: 24px;
            text-transform: uppercase;
            color: #fff;
        }

        .user-box input,
        .user-box label {
            width: 100%;
            font-size: 16px;
        }

        .user-box input[type="text"],
        .user-box input[type="email"],
        .user-box input[type="password"],
        .user-box input[type="number"] {
            padding: 8px;
            border: none;
            border-bottom: 1px solid #fff;
            outline: none;
            background: transparent;
            color: #fff;
            margin-bottom: 10px;
        }

        .user-box label {
            display: block;
            color: #fff;
            text-align: left;
        }

        .gender-box {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 15px 0px;
        }

        .gender-option {
            display: flex;
            align-items: center;
        }

        .gender-option input[type="radio"] {
            margin-right: 5px;
        }

        .gender_section_line {
            width: 330px;
            background: white;
            height: 1px;
            margin-bottom: 10px;
        }

        .user-box .gender-box input[type="radio"] {
            appearance: none;
            background-color: #fff;
            margin: 0 0.5em 0 0;
            font: inherit;
            color: currentColor;
            width: 1.6em;
            height: 1.1em;
            border: 0.15em solid currentColor;
            border-radius: 50%;
            display: grid;
            place-content: center;
            cursor: pointer;
        }

        .user-box .gender-box input[type="radio"]::before {
            content: "";
            width: 0.65em;
            height: 0.65em;
            border-radius: 50%;
            transform: scale(0);
            transition: 120ms transform ease-in-out;
            background-color: #fff;
            box-shadow: inset 1em 1em #6f42c1;
        }

        .user-box .gender-box input[type="radio"]:checked::before {
            transform: scale(1);
        }

        .user-box .gender-box input[type="radio"]:focus {
            outline: 2px solid #f686ff;
            outline-offset: 2px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            color: #f686ff;
            background-color: transparent;
            border: none;
            font-size: 18px;
            text-transform: uppercase;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border-radius: 5px;
            position: relative;
            overflow: hidden;
        }

        .button:hover {
            background-color: #f686ff;
            color: #fff;
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
            <h2>Register</h2>
            <form action="../controllers/registerController.php" method="POST">
                <input type="hidden" name="action" value="register">
                <div class="user-box">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="user-box">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="user-box">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="user-box">
                    <label for="age">Age</label>
                    <input type="number" id="age" name="age">
                </div>
                <div class="user-box">
                    <label>Gender</label>
                    <div class="gender-box">
                        <div class="gender-option">
                            <input type="radio" id="male" name="gender" value="Male" required>
                            <label for="male">Male</label>
                        </div>
                        <div class="gender-option">
                            <input type="radio" id="female" name="gender" value="Female" required>
                            <label for="female">Female</label>
                        </div>
                        <div class="gender-option">
                            <input type="radio" id="other" name="gender" value="Other" required>
                            <label for="other">Other</label>
                        </div>
                    </div>
                </div>
                <div class="gender_section_line"></div>
                <div class="user-box">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address">
                </div>
                <div class="user-box">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" id="phone_number" name="phone_number">
                </div>
                <button type="submit" class="button">
                    Register
                    <span></span><span></span><span></span><span></span>
                </button>
            </form>
        </div>
    </div>
</body>

</html>