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
                <li><a href="./requestTest_Vaccination.php">Request COVID-19 Test/Vaccination</a></li>
                <li><a href="./viewReports.php">View Reports</a></li>
                <li><a href="./myAppointments.php">My Appointments</a></li>
                <li><a href="./manageProfile.php">My Profile</a></li>
                <li><a href="./logout.php">Logout</a></li>
            </ul>
        </div>
        <div class="content my-4">
            <h2>Request Appointment</h2>

            <?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
                <div class="alert alert-success">Appointment successfully booked!</div>
            <?php elseif (isset($_GET['status']) && $_GET['status'] === 'error'): ?>
                <div class="alert alert-danger">Failed to book the appointment. Please try again.</div>
            <?php endif; ?>

            <form action="../controllers/HospitalAppointmentController.php" method="post">
                <input type="hidden" name="action" value="book">    
                <input type="hidden" name="patient_id" value="<?php echo $_SESSION['user_id']; ?>" />

                <div class="form-group">
                    <label for="hospital">Select Hospital</label>
                    <select class="form-control" id="hospital" name="hospital_id">
                        <?php
                        require_once __DIR__ . '/../config/Database.php';
                        $db = new Database();
                        $conn = $db->getConnection();
                        $query = "SELECT id, name FROM hospital";
                        $result = $conn->query($query);

                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                        }

                        $db->closeConnection();
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="test_type">Select Type</label>
                    <select class="form-control" id="test_type" name="test_type">
                        <option value="Consultation">Consultation</option>
                        <option value="Treatment">Treatment</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="appointmentDate">Appointment Date</label>
                    <input type="date" class="form-control" id="appointmentDate" name="appointment_date" required>
                </div>
                <button type="submit" class="btn btn-primary">Request Appointment</button>
            </form>

        </div>
    </div>
</body>

</html>
