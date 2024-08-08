<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Appointment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/custom-style.css">
</head>

<body>
    <div class="d-flex">
        <div class="sidebar">
            <div class="h2 mb-4 px-3">Patient</div>
            <ul class="list-unstyled">
                <li><a href="../patientDashboard.php">Dashboard</a></li>
                <li><a href="./searchHospitals.php">Search Hospitals</a></li>
                <li><a href="./requestAppointment.php">Request Appointment</a></li>
                <li><a href="./viewReports.php">View Reports</a></li>
                <li><a href="./myAppointments.php">My Appointments</a></li>
                <li><a href="./manageProfile.php">My Profile</a></li>
                <li><a href="./logout.php">Logout</a></li>
            </ul>
        </div>
        <div class="content my-4">
            <h2>Request Appointment</h2>
            <form action="requestAppointment.php" method="post">
                <!-- Appointment request form fields -->
                <div class="form-group">
                    <label for="hospital">Select Hospital</label>
                    <select class="form-control" id="hospital" name="hospital">
                        <option value="hospital1">Hospital 1</option>
                        <option value="hospital2">Hospital 2</option>
                        <option value="hospital3">Hospital 3</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="appointmentDate">Appointment Date</label>
                    <input type="date" class="form-control" id="appointmentDate" name="appointment_date" required>
                </div>
                <div class="form-group">
                    <label for="appointmentTime">Appointment Time</label>
                    <input type="time" class="form-control" id="appointmentTime" name="appointment_time" required>
                </div>
                <button type="submit" class="btn btn-primary">Request Appointment</button>
            </form>
        </div>
    </div>
</body>

</html>