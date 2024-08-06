<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>

    <link rel="stylesheet" href="../public/css/style.css">
</head>

<body>

    <div class="main">
        <table>
            <h1>Web Users</h1>
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
                    <th>Edit / Delete</th>
                </tr>
            </thead>
            <tbody>

                <?php
                require_once "../controllers/userController.php";
                $users = new UserController;
                $getUsers = $users->readAll("user");
                if ($getUsers !== false) {
                    while ($row = $getUsers->fetch_assoc()) {
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
                        <td>
                            <a href="/admin/views/edit/edit.php?id=' . $row['id'] . '" id="edit">Edit</a>
                            /
                            <a href="/admin/views/delete/delete.php?id=' . $row['id'] . '" id="delete" >Delete</a>
                        </td>
                        </tr>';
                    }
                } else {
                    echo '<tr>
                <td> user not found </td>
                </tr>';
                }
                ?>

            </tbody>
        </table>
    </div>

</body>

</html>