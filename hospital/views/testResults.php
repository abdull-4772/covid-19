<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Test Results</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/custom-style.css">
</head>

<body>
    <div class="d-flex">
        <div class="sidebar">
            <div class="h4 mb-4 px-3">Hospital Name</div>
            <ul class="list-unstyled">
                <li><a href="../hospitalDashboard.php">Dashboard</a></li>
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
                        <th>Test Date</th>
                        <th>Current Status</th>
                        <th>Update Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>John Doe</td>
                        <td>2024-08-01</td>
                        <td>Pending</td>
                        <td>
                            <select class="form-control">
                                <option value="positive">Positive</option>
                                <option value="negative">Negative</option>
                                <option value="pending">Pending</option>
                            </select>
                        </td>
                        <td><button class="btn btn-purple">Update</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
</body>

</html>