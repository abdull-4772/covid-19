<?php
$current_page = basename($_SERVER['PHP_SELF']);
$dashboard = "";
$patient = "";
$report = "";
$list_vaccine = "";

if ($current_page == 'index.php') {
    $dashboard = 'active';
} elseif ($current_page == 'patient.php') {
    $patient = 'active';
} elseif ($current_page == 'report.php') {
    $report = 'active';
} elseif ($current_page == 'list_vaccine.php') {
    $list_vaccine = 'active';
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
        <li><a class="<?php echo $report ?>" href="/covid-19/admin/views/report.php">Report</a></li>
        <li><a class="<?php echo $list_vaccine ?>" href="/covid-19/admin/views/list_vaccine.php">List of Vaccine</a></li>
        <li><a href="">Logout</a></li>
    </ul>
</div>
<div class="main-content">
    <button id="openBtn" class="open-btn">&#9776; Open Sidebar</button>
    <div class="content">