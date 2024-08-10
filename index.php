<?php include("./app/partials/header.php"); ?>

<!-- drop box start -->
<div class="main-dropbox">
  <div class="dropBox">
    <i class="fa-solid fa-xmark" onclick="removeDropBox()"></i>
    <div class="card hospital">
      <div class="header">
        <div class="content">
          <span class="title">Hospital Login</span>
          <p class="message">Access the hospital administration panel. Please login with your hospital credentials.</p>
        </div>
        <div class="actions">
          <a href="./hospital/views/register.php" class="register">Register</a>
          <a href="./hospital/views/login.php" class="login">Login</a>
        </div>
      </div>
    </div>
    <div class="card patient">
      <div class="header">
        <div class="content">
          <span class="title">Patient Login</span>
          <p class="message">Access your patient account. Please login to view your health records.</p>
        </div>
        <div class="actions">
        <a href="./patient/views/register.php" class="register">Register</a>
        <a href="./patient/views/login.php" class="login">Login</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- drop box end -->

<!-- Hero -->
<div class="hero-v1">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 mr-auto text-center text-lg-left">
        <span class="d-block subheading">Together, We Can Fight COVID-19</span>
        <h1 class="heading mb-3">Book Your Test or Vaccine Now</h1>
        <p class="mb-5">Join us in the fight against COVID-19. Our web app simplifies test and vaccination booking, connecting you with hospitals and providing essential information.</p>
        <p class="mb-4"><a href="patient-registration.php" class="btn btn-primary">Book Appointment</a></p>
      </div>
      <div class="col-lg-6">
        <figure class="illustration">
          <img src="./app/images/illustration.png" alt="Image" class="img-fluid">
        </figure>
      </div>
    </div>
  </div>
</div>

<!-- Statistics -->
<div class="site-section stats">
  <div class="container">
    <div class="row mb-3">
      <div class="col-lg-7 text-center mx-auto">
        <h2 class="section-heading">COVID-19 Statistics</h2>
        <p>Stay updated with the latest COVID-19 statistics. We provide accurate data to help you stay informed.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4">
        <div class="data">
          <span class="icon text-primary">
            <span class="flaticon-virus"></span>
          </span>
          <strong class="d-block number">14,112,077</strong>
          <span class="label">Active Cases</span>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="data">
          <span class="icon text-primary">
            <span class="flaticon-virus"></span>
          </span>
          <strong class="d-block number">595,685</strong>
          <span class="label">Deaths</span>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="data">
          <span class="icon text-primary">
            <span class="flaticon-virus"></span>
          </span>
          <strong class="d-block number">8,397,665</strong>
          <span class="label">Recovered Cases</span>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- What is COVID-19? -->
<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 mb-4 mb-lg-0">
        <figure class="img-play-vid">
          <img src="./app/images/hero_1.jpg" alt="Image" class="img-fluid">
          <div class="absolute-block d-flex">
            <span class="text">Watch the Video</span>
            <a href="" data-fancybox class="btn-play">
              <span class="icon-play"></span>
            </a>
          </div>
        </figure>
      </div>
      <div class="col-lg-5 ml-auto">
        <h2 class="mb-4 section-heading">What is COVID-19?</h2>
        <p>COVID-19 is a respiratory illness caused by the coronavirus SARS-CoV-2. It can cause mild to severe symptoms and spread from person to person.</p>
        <ul class="list-check list-unstyled mb-5">
          <li>Symptoms range from mild to severe</li>
          <li>Spread through respiratory droplets</li>
          <li>Preventable through vaccines and precautions</li>
        </ul>
        <p><a href="#" class="btn btn-primary">Learn more</a></p>
      </div>
    </div>
  </div>
</div>

<!-- About -->
<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center mx-auto">
        <h2 class="section-heading">About Our Platform</h2>
        <p class="mb-4">Our web application is designed to facilitate online COVID-19 test and vaccination bookings. It connects patients with hospitals and the administration to streamline the process of scheduling appointments, tracking vaccination history, and providing essential COVID-19 guidelines.</p>
        <p class="mb-4">The platform offers an Online Registration System (ORS) that links various hospitals across the country, allowing users to register and book appointments based on their mobile numbers. Hospitals can manage their appointment slots, patient flow, and update test results and vaccination statuses.</p>
        <h3 class="section-subheading">Services We Provide:</h3>
        <ul class="list-check list-unstyled mb-5">
          <li>Online registration and appointment booking for COVID-19 tests and vaccinations.</li>
          <li>Detailed reports showing test and vaccination appointments.</li>
          <li>Easy management of patient registration and appointments for hospitals.</li>
          <li>Real-time updates on test results and vaccination statuses.</li>
          <li>Guidelines and information on COVID-19 symptoms, prevention, and treatments.</li>
        </ul>
        <p><a href="#" class="btn btn-primary">Learn More</a></p>
      </div>
    </div>
  </div>
</div>

<!-- Hospital -->
<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 text-center mx-auto">
        <h2 class="section-heading">Hospital</h2>
        <p>Register and manage hospital details, view and update patient information, and handle requests for COVID-19 tests and vaccinations.</p>
        <a href="hospital-dashboard.php" class="btn btn-primary">Hospital Dashboard</a>
      </div>
    </div>
  </div>
</div>

<!-- Patient -->
<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 text-center mx-auto">
        <h2 class="section-heading">Patient</h2>
        <p>Register, search for hospitals, book appointments, and view test and vaccination reports.</p>
        <a href="patient-dashboard.php" class="btn btn-primary">Patient Dashboard</a>
      </div>
    </div>
  </div>
</div>

<!-- Cautions -->
<div class="container pb-5">
  <div class="row">
    <div class="col-lg-3">
      <div class="feature-v1 d-flex align-items-center">
        <div class="icon-wrap mr-3">
          <span class="flaticon-protection"></span>
        </div>
        <div>
          <h3>Protection</h3>
          <span class="d-block">Learn how to protect yourself from COVID-19.</span>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="feature-v1 d-flex align-items-center">
        <div class="icon-wrap mr-3">
          <span class="flaticon-patient"></span>
        </div>
        <div>
          <h3>Prevention</h3>
          <span class="d-block">Follow guidelines to prevent infection.</span>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="feature-v1 d-flex align-items-center">
        <div class="icon-wrap mr-3">
          <span class="flaticon-hand-sanitizer"></span>
        </div>
        <div>
          <h3>Treatments</h3>
          <span class="d-block">Explore treatment options for COVID-19.</span>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="feature-v1 d-flex align-items-center">
        <div class="icon-wrap mr-3">
          <span class="flaticon-virus"></span>
        </div>
        <div>
          <h3>Symptoms</h3>
          <span class="d-block">Know the symptoms of COVID-19.</span>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- QNA -->
<div class="site-section bg-primary-light">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mx-auto text-center">
        <h2 class="mb-4 section-heading">Have Any Questions?</h2>
        <p class="mb-4">Our team is here to help. Get in touch with us for any questions or support regarding COVID-19 testing and vaccination.</p>
        <p><a href="contact.php" class="btn btn-primary">Contact Us</a></p>
      </div>
    </div>
  </div>
</div>

<?php include("./app/partials/footer.php"); ?>