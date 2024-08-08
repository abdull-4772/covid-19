<footer class="site-footer">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="mb-4">
          <h3 class="footer-heading mb-4">About Us</h3>
          <p>We are dedicated to providing reliable information and resources for COVID-19 testing and vaccination. Our goal is to support public health and safety during the pandemic.</p>
        </div>
      </div>
      <div class="col-lg-4 mb-5 mb-lg-0">
        <div class="row mb-3">
          <div class="col-md-12">
            <h3 class="footer-heading mb-4">Navigations</h3>
          </div>
          <div class="col-md-6 col-lg-6">
            <ul class="list-unstyled">
              <li><a href="#">Home</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Privacy</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
          </div>
          <div class="col-md-6 col-lg-6">
            <ul class="list-unstyled">
              <li><a href="#">News</a></li>
              <li><a href="#">Advertise</a></li>
              <li><a href="#">Careers</a></li>
              <li><a href="#">Partnership</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="mb-4">
          <h3 class="footer-heading mb-4">Follow Us</h3>
          <p>
            <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
            <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
            <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
            <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
          </p>
        </div>
      </div>
    </div>
  </div>
</footer>

<script>
  const mainDropBox = document.querySelector(".main-dropbox");
  const dropBox = document.querySelector(".dropBox");

  function toggleDropBox() {
    mainDropBox.style.display = "block";
    dropBox.style.top = "45%";
  }

  function removeDropBox() {
    mainDropBox.style.display = "none";
    dropBox.style.top = "-120%";
  }
</script>


<script src="./app/js/jquery-3.3.1.min.js"></script>
<script src="./app/js/popper.min.js"></script>
<script src="./app/js/bootstrap.min.js"></script>
<script src="./app/js/jquery.sticky.js"></script>
<script src="../js/main.js"></script>

</body>

</html>