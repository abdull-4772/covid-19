<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Dashboard</title>
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
        <div class="row">
            <div class="col-md-2">
                <div class="panel p-3 border rounded bg-light">
                    <h3>Total Patients</h3>
                    <p>100</p>
                </div>
            </div>
            <div class="col-md-2">
                <div class="panel p-3 border rounded bg-light">
                    <h3>Pending Requests</h3>
                    <p>10</p>
                </div>
            </div>
            <div class="col-md-2">
                <div class="panel p-3 border rounded bg-light">
                    <h3>Approved Requests</h3>
                    <p>20</p>
                </div>
            </div>
            <div class="col-md-2">
                <div class="panel p-3 border rounded bg-light">
                    <h3>Test Results Pending</h3>
                    <p>5</p>
                </div>
            </div>
            <div class="col-md-2">
                <div class="panel p-3 border rounded bg-light">
                    <h3>Vaccinations Pending</h3>
                    <p>8</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>