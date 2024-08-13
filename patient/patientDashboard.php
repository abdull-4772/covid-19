<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/custom-style.css">
</head>

<body>
    <div class="d-flex">
        <div class="sidebar">
            <div class="h2 mb-4 px-3">Patient</div>
            <ul class="list-unstyled">
                <li><a href="patientDashboard.php">Dashboard</a></li>
                <li><a href="./views/searchHospitals.php">Search Hospitals</a></li>
                <li><a href="./views/requestAppointment.php">Request Appointment</a></li>
                <li><a href="./views/requestTest_Vaccination.php">Request COVID-19 Test/Vaccination</a></li>
                <li><a href="./views/viewReports.php">View Reports</a></li>
                <li><a href="./views/myAppointments.php">My Appointments</a></li>
                <li><a href="./views/manageProfile.php">My Profile</a></li>
                <li><a href="./views/logout.php">Logout</a></li>
            </ul>
        </div>
        <div class="content my-4" >
            <div class="row" >
                <div class="col-md-3 my-4">
                    <div class="panel p-3 border rounded bg-light">
                        <h3>Upcoming Appointments</h3>
                        <p>3</p>
                        <button class="btn btn-purple"><a href="./views/myAppointments.php" class="text-white">View All</a></button>
                    </div>
                </div>
                <div class="col-md-3 my-4">
                    <div class="panel p-3 border rounded bg-light">
                        <h3>Test Results Available</h3>
                        <p>2</p>
                        <button class="btn btn-purple"><a href="./views/viewReports.php" class="text-white">View All</a></button>
                    </div>
                </div>
                <div class="col-md-3 my-4">
                    <div class="panel p-3 border rounded bg-light">
                        <h3>Vaccination Status</h3>
                        <p>1 Dose Pending</p>
                        <button class="btn btn-purple"><a href="./views/viewReports.php" class="text-white">View Status</a></button>
                    </div>
                </div>
                <div class="col-md-4 my-4">
                    <div class="panel p-3 border rounded bg-light">
                        <h3>Profile Completion</h3>
                        <p>80%</p>
                        <button class="btn btn-purple"><a href="./views/manageProfile.php" class="text-white">Complete Profile</a></button>
                    </div>
                </div>
                <div class="col-md-4 my-4">
                    <div class="panel p-3 border rounded bg-light">
                        <h3>Recent Activities</h3>
                        <ul>
                            <li>Requested appointment at Hospital XYZ</li>
                            <li>Viewed test result from 01/01/2024</li>
                            <li>Updated profile information</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>