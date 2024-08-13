<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update user</title>
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
            max-width: 600px;
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

        form {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        form>div {
            width: 45%;
        }
    </style>
</head>

<body>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        require_once  "../../controllers/userController.php";
        $userId = $_GET['id'];
        $userReadCont = new userController;
        $getResult = $userReadCont->readOne("patient", "$userId");
    } else {
        header("Location: ./views/patient.php");
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
            $id = $row['id'];
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
            <form action="./confirmEdit.php" method="POST">
                <div>
                    <div class="user-box">
                        <input type="number" name="id" value="<?php echo $id; ?>" hidden>
                        <input type="text" name="name" value="<?php echo $name; ?>" required>
                        <label>Name</label>
                    </div>
                    <div class="user-box">
                        <input type="email" name="email" value="<?php echo $email; ?>" required>
                        <label>Email</label>
                    </div>
                    <div class="user-box">
                        <input type="password" name="password" value="<?php echo $password; ?>" id="pass" required>
                        <label>Password</label>
                    </div>
                    <div class="user-box">
                        <input type="number" name="age" value="<?php echo $age; ?>" required>
                        <label>Age</label>
                    </div>
                </div>
                <div>
                    <div class="user-box">
                        <input type="text" name="gender" value="<?php echo $gender; ?>" required>
                        <label>Gender</label>
                    </div>
                    <div class="user-box">
                        <input type="text" name="address" value="<?php echo $address; ?>" required>
                        <label>Address</label>
                    </div>
                    <div class="user-box">
                        <input type="text" name="phonenumber" value="<?php echo $phonenbr; ?>" required>
                        <label>Phone number</label>
                    </div>
                </div>
                <button class="btn" type="submit">Save the Change</button>
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
        });
    </script>
</body>

</html>