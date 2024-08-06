<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="custom-style.css">
</head>
<body>
    <header class="header bg-purple text-white py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="logo h4">Hospital Name</div>
            <nav>
                <a href="/views/hospital/control_panel/hospitalDashboard.php" class="text-white mx-2">Dashboard</a>
                <a href="/views/hospital/control_panel/patientsList.php" class="text-white mx-2">Patient Requests</a>
                <a href="/views/hospital/control_panel/testResults.php" class="text-white mx-2">Test Results</a>
                <a href="/views/hospital/control_panel/vaccination.php" class="text-white mx-2">Vaccination Status</a>
                <a href="/views/hospital/control_panel/profile.php" class="text-white mx-2">Profile</a>
                <a href="/views/hospital/control_panel/logout.php" class="text-white mx-2">Logout</a>
            </nav>
        </div>
    </header>
    <div class="container my-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Patient ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Contact Number</th>
                    <th>Test/Vaccination Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>30</td>
                    <td>Male</td>
                    <td>123-456-7890</td>
                    <td>Pending</td>
                    <td>
                        <button class="btn btn-purple">View Details</button>
                        <button class="btn btn-purple">Approve</button>
                        <button class="btn btn-purple">Reject</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
