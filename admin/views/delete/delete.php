<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    require_once "../../controllers/userController.php";
    $userId = $_GET['id'];
    $userReadCont = new userController;
    $getResult = $userReadCont->readOne("user", "$userId");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../../public/css/style.css">
</head>

<body>
    <div class="main">
        <table>
            <h1>Delete User</h1>
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                    <th>password</th>
                    <th>age</th>
                    <th>gender</th>
                    <th>address</th>
                    <th>Phone number</th>
                    <th>Creates at</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if ($userId !== "") {
                    while ($row = $getResult->fetch_assoc()) {
                        echo '<tr>
            <td>' . $row['id'] . '</td>
            <td>' . $row['name'] . '</td>
            <td>' . $row['email'] . '</td>
            <td>' . $row['password'] . '</td>
            <td>' . $row['age'] . '</td>
            <td>' . $row['gender'] . '</td>
            <td>' . $row['address'] . '</td>
            <td>' . $row['phone_number'] . '</td>
            <td>' . $row['created_at'] . '</td>
            </tr>';
                    }
                }
                ?>

            </tbody>
        </table>
        <form action="./confirmDelete.php" method="POST">
            <input type="text" name="id" value="<?php echo $userId; ?>" hidden>
            <input type="submit" value="Delete" class="btn">
        </form>
    </div>


    <?php
    // if ($_SERVER['REQUEST_METHOD'] === "GET") {
    //     $status = $_GET['status'];
    //     if ($status == "1") {
    //         echo '<script>alert("the user is sucessfully deleted.");</script>';
    //     } else if ($status == "0") {
    //         echo '<script>alert("Sorry deleting the user is unsucessful.");</script>';
    //     }
    // }
     ?>
</body>

</html>