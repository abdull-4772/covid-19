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
<div class="d-flex">
        <div class="sidebar">
            <div class="h4 mb-4 px-3">Hospital Name</div>
            <ul class="list-unstyled">
                <li><a href="./hospitalDashboard.php">Dashboard</a></li>
                <li><a href="./patientsList.php">Patient Requests</a></li>
                <li><a href="./testResults.php">Test Results</a></li>
                <li><a href="./vaccination.php">Vaccination Status</a></li>
                <li><a href="./profile.php">Profile</a></li>
                <li><a href="./logout.php">Logout</a></li>
            </ul>
        </div>
        <div class="content my-4">
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
