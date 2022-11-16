<?php
  require_once('config.php');
  if (isset($_POST['login'])) {
    $email = $_POST['emailAddress'];
    $password = $_POST['pass'];
    signIn($email, $password);  
  }
  include_once 'templates/header.php';
?>

  <div class="container-fluid">
    <div class="row no-gutter">
      <!-- The image half -->
      <div class="col-md-6 d-none d-md-flex bg-image"></div>


      <!-- The content half -->
      <div class="col-md-6 bg-light">
        <div class="login d-flex align-items-center py-5">

          <!-- Demo content-->
          <div class="container">
            <div class="row">
              <div class="col-lg-10 col-xl-7 mx-auto">
                <h3 class="display-4">AVECHI</h3>
                <p class="text-muted mb-4">WELCOME BACK!</p>
                <form method="post">
                  <div class="form-group mb-3">
                    <input id="inputEmail" type="email" placeholder="Email address" name="emailAddress" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                  </div>
                  <div class="form-group mb-3">
                    <input id="inputPassword" type="password" placeholder="Password" name="pass" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                  </div>

                  <button type="submit" class="btn btn-danger btn-block text-uppercase mb-2 rounded-pill shadow px-3" name="login" id="login">Log in</button>
                  <div class="text-center d-flex justify-content-between mt-4">
                    <p>Not a member?<a href="signup.php" class="font-italic text-danger">
                        <u>Register here</u></a></p>
                  </div>
                </form>
              </div>
            </div>
          </div><!-- End -->

        </div>
      </div><!-- End -->

    </div>
  </div>

  <script src="../jquery/jquery.min.js"></script>
  <!-- Vendor JS Files -->
  <script src="../../assets/vendor/purecounter/purecounter.js"></script>
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../../assets/vendor/php-email-form/validate.js"></script>

</body>

</html>