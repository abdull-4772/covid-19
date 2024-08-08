<!doctype html>
<html lang="en">

<head>
  <title>COVID Test & Vaccination Booking</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="./app/css/bootstrap.min.css">
  <link rel="stylesheet" href="./app/css/jquery-ui.css">
  <link rel="stylesheet" href="./app/css/owl.carousel.min.css">
  <link rel="stylesheet" href="./app/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="./app/css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="./app/css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="./app/fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="./app/fonts/flaticon-covid/font/flaticon.css">
  <link rel="stylesheet" href="./app/css/aos.css">
  <link rel="stylesheet" href="./app/css/style.css">

  <!-- font awesome cdn -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;700;900&display=swap" rel="stylesheet">

  <style>
    .dropbtn {
      display: inline-block;
      color: #000;
      text-align: center;
      padding: 10px 10px;
      border: 1px solid #6f42c1;
      border-radius: 24px;
      transition: all 0.3s;
    }


    .dropbtn:hover {
      background-color: #6f42c1;
      cursor: pointer;
      color: #fff;
    }
  </style>

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar light js-sticky-header site-navbar-target" role="banner">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-6 col-xl-2">
            <div class="mb-0 site-logo"><a href="about.php" class="mb-0">COVID<span class="text-primary">-19</span></a></div>
          </div>

          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li class="active"><a href="index.php" class="nav-link">Home</a></li>
                <li><a href="../../views/hospital/control_panel/hospitalDashboard.php" class="nav-link">Hospital</a></li>
                <li><a href="blog.php" class="nav-link">Patient</a></li>
                <li><a href="../contact.php" class="nav-link">Contact</a></li>

                <li class="dropbtn" onclick="toggleDropBox()">
                  Login / Register
                </li>

              </ul>
            </nav>
          </div>

          <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3 text-black"></span></a></div>
        </div>
      </div>
    </header>
    