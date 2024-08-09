<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css">
    <title>Hospital Admin Dashboard</title>
</head>

<body>
    <?php require_once './partial/sidebarHead.php'; ?>
    <div class="dashmain">
        <div class="container">
            <h1>Admin Dashboard</h1>

            <div class="dashboard">
                <div class="box">
                    <h2>Total Users</h2>
                    <p id="totalUsers"> <?php
                                        require_once '../controllers/userController.php';

                                        $user_con = new userController;
                                        $all_users = $user_con->readAll("user");
                                        $user_array = [];

                                        while ($row = $all_users->fetch_assoc()) {
                                            $user_array[] = $row['id'];
                                        }

                                        // Check if the result is an array and then count the users
                                        if (is_array($user_array)) {
                                            echo count($user_array);
                                        } else {
                                            echo "0"; // In case readAll doesn't return an array, display 0
                                        }
                                        ?></p>
                </div>
                <div class="box">
                    <h2>Total Patients</h2>
                    <p id="totalPatients">0</p>
                </div>
                <div class="box">
                    <h2>Total Hospitals</h2>
                    <p id="totalHospitals">0</p>
                </div>
                <div class="box">
                    <h2>Report Result</h2>
                    <p id="vaccineAvailability">0</p>
                </div>
            </div>
            <!-- 
        <div class="section">
            <h2>All Patient Details</h2>
        </div>

        <div class="section">
            <h2>View All Patient Profile Details</h2>
        </div>

        <div class="section">
            <h2>Report of COVID-19</h2>
        </div>

        <div class="section">
            <h2>Export Details</h2>
            <button class="button">Export by Date</button>
            <button class="button">Export by Week</button>
            <button class="button">Export by Month</button>
        </div>

        <div class="section">
            <h2>Approve Hospital Login</h2>
        </div>

        <div class="section">
            <h2>List of Hospitals</h2>
        </div>

        <div class="section">
            <h2>Booking Details</h2>
        </div> -->
        </div>
    </div>
    <?php require_once './partial/sidebarFoot.php'; ?>

    <script>
        // Example script to dynamically update counts (you would replace these with actual data from your database)
        // document.getElementById('totalUsers').innerText = 100; // Replace with actual total users count
        // document.getElementById('totalPatients').innerText = 50; // Replace with actual total patients count
        // document.getElementById('totalHospitals').innerText = 10; // Replace with actual total hospitals count
        // document.getElementById('vaccineAvailability').innerText = 20; // Replace with actual vaccine availability count
    </script>

</body>

</html>