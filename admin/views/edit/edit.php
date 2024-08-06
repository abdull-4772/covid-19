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
            background: #243b55;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            position: relative;
            width: 100%;
            max-width: 600px;
            padding: 40px;
            background: rgba(0, 0, 0, 0.5);
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
            margin-bottom: 5px;
            border: none;
            border-bottom: 1px solid grey;
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
            color: #03e9f4;
            font-size: 12px;
        }

        .btn {
            position: absolute;
            bottom: -30px;
            display: inline-block;
            line-height: 33px;
            width: 100px;
            color: #fff;
            background-color: rgba(0, 0, 0, 0.555);
            border: none;
            font-size: 16px;
            text-decoration: none;
            transition: 0.5s;
            margin-top: 40px;
            letter-spacing: 1.5px;
            border-radius: 5px;
            font-weight: 700;
        }

        .btn:hover {
            background-color: #000;
            border-radius: 5px;

        }

        form {
            margin-top: 50px;
            display: flex;
            justify-content: center;
            gap: 80px;
        }
    </style>
</head>

<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        require_once "../../controllers/userController.php";
        $userId = $_GET['id'];
        $userReadCont = new userController;
        $getResult = $userReadCont->readOne("user", "$userId");
    } else {
        header("Location: ./views/users.php");
    }

    $id;
    $name;
    $email;
    $password;
    $age;
    $gender;
    $address;
    $phonenbr;

    if ($userId !== "") {
        while ($row = $getResult->fetch_assoc()) {

            $name = $row['id'];
            $name = $row['name'];
            $email = $row['email'];
            $password = $row['password'];
            $age = $row['age'];
            $gender = $row['gender'];
            $address = $row['address'];
            $phonenbr = $row['phone_number'];
        }
    }
    ?>
    <div class="container">
        <div class="login-box">
            <h2>Edit</h2>
            <form action="./confirmEdit.php" method="POST" onsubmit="return checkForm()">
                <div>
                    <div class="user-box">
                        <input type="number" name="id" value="<?php echo $id; ?>" hidden>
                        <input type="text" name="name" class="inputVal" placeholder="<?php echo $name; ?>">
                        <label>Name</label>
                    </div>
                    <div class="user-box">
                        <input type="email" name="email" class="inputVal" placeholder="<?php echo $email; ?>">
                        <label>Email</label>
                    </div>
                    <div class="user-box">
                        <input type="password" name="password" class="inputVal" placeholder="<?php echo $password; ?>" id="pass">
                        <label>Password</label>
                    </div>
                    <div class="user-box">
                        <input type="number" name="age" class="inputVal" placeholder="<?php echo $age; ?>">
                        <label>Age</label>
                    </div>
                </div>
                <div>
                    <div class="user-box">
                        <input type="text" name="gender" class="inputVal" placeholder="<?php echo $gender; ?>">
                        <label>Gender</label>
                    </div>
                    <div class="user-box">
                        <input type="text" name="address" class="inputVal" placeholder="<?php echo $address; ?>">
                        <label>Address</label>
                    </div>
                    <div class="user-box">
                        <input type="text" name="phonenumber" class="inputVal" placeholder="<?php echo $phonenbr; ?>">
                        <label>Phone number</label>
                    </div>
                </div>
                <button class="btn" type="submite">Save the Change</button>
            </form>
        </div>
    </div>

    <script>
        let password = document.querySelector("#pass");
        window.addEventListener("click", (e) => {
            if (e.target == password) {
                password.type = "text";
            } else {
                password.type = "password";

            }
        })
        let checkForm = () => {
            let input = document.querySelectorAll(".inputVal");
            input.forEach((val) => {
                let valueOfInput = val.placeholder;
                if (input.value == "") {
                    input.value = valueOfInput;
                }
                console.log(input.value);
            })
        }
    </script>
</body>

</html>