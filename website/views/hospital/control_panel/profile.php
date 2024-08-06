<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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
    <div class="container my-4 profile-info">
        <h3>Profile Information</h3>
        <p><strong>Hospital Name:</strong> Hospital XYZ</p>
        <p><strong>Address:</strong> 1234 Main St.</p>
        <p><strong>Location:</strong> Cityville</p>
        <p><strong>Contact Number:</strong> 123-456-7890</p>
        <p><strong>Email:</strong> contact@hospitalxyz.com</p>
        <button class="btn btn-purple">Edit</button>
        <button class="btn btn-purple">Save Changes</button>
    </div>
</body>

</html>