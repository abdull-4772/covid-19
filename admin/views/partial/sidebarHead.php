<?php
$current_page = basename($_SERVER['PHP_SELF']);
$dashboard = "";
$patient = "";
$report = "";
$list_vaccine = "";
$b_details = "";

if ($current_page == 'index.php') {
    $dashboard = 'active';
} elseif ($current_page == 'patient.php') {
    $patient = 'active';
} elseif ($current_page == 'report.php') {
    $report = 'active';
} elseif ($current_page == 'list_vaccine.php') {
    $list_vaccine = 'active';
} elseif ($current_page == 'appointment_approvel.php') {
    $appointment_approvel = 'active';
} elseif ($current_page == 'list_hospital.php') {
    $list_hospital = 'active';
} elseif ($current_page == 'booking_details.php') {
    $b_details = 'active';
}
?>
<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <h2>Admin Panel</h2>
        <button id="closeBtn" class="close-btn">&times;</button>
    </div>
    <ul class="sidebar-menu">
        <li><a class="<?php echo $dashboard ?>" href="/covid-19/admin/index.php">Dashboard</a></li>
        <li><a class="<?php echo $patient ?>" href="/covid-19/admin/views/patient.php">Patient</a></li>
        <li><a class="<?php echo $appointment_approvel ?>" href="/covid-19/admin/views/appointment_approvel.php">Appointment Approvel</a></li>
        <li><a class="<?php echo $report ?>" href="/covid-19/admin/views/report.php">Report</a></li>
        <li><a class="<?php echo $list_hospital ?>" href="/covid-19/admin/views/list_hospital.php">List of Hospital</a></li>
        <li><a class="<?php echo $list_vaccine ?>" href="/covid-19/admin/views/list_vaccine.php">List of Vaccine</a></li>
        <li><a class="<?php echo $b_details ?>" href="/covid-19/admin/views/booking_details.php">Covid 19 Booking Details</a></li>
        <li><a href="/covid-19/admin/controllers/logout.php">Logout</a></li>
        <li><a href="/covid-19/admin/views/login.php">Login</a></li>
        <li><a href="/covid-19/admin/views/register.php">Register</a></li>
    </ul>
</div>
<div class="main-content">
    <button id="openBtn" class="open-btn">&#9776; Open Sidebar</button>
    <div class="content">