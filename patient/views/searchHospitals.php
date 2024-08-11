<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Hospitals</title>
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
            <h2>Search Hospitals</h2>
            <form action="../controllers/searchHospital.php" method="get">
                <div class="form-group">
                    <label for="searchQuery">Search Hospitals</label>
                    <input type="text" class="form-control" id="searchQuery" name="query" placeholder="Enter location or hospital name" value="<?= isset($_GET['query']) ? htmlspecialchars($_GET['query']) : ''; ?>">
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>

            <h3>Available Hospitals</h3>
            <?php if (!empty($hospitals)): ?>
                <ul class="list-unstyled">
                    <?php foreach ($hospitals as $hospital): ?>
                        <li class="mb-2">
                            <div class="hospital-item">
                                <strong><?= htmlspecialchars($hospital['name']) ?></strong> - <?= htmlspecialchars($hospital['address']) ?>
                                <a href="../views/requestAppointment.php?hospital_id=<?= $hospital['id']; ?>" class="btn btn-secondary ml-3">Book Appointment</a>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>No hospitals found.</p>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>