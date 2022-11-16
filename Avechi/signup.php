<?php
  require_once('config.php');
  if (isset($_POST['signup'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['emailAddress'];
    $gender = $_POST['gender'];
    $password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    registerUser($fname, $lname, $email, $password, $gender);
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
                <p class="text-muted mb-4">CREATE AN ACCOUNT!</p>
                <form   method="post">
                  <div class="form-group mb-3">
                    <input id="inputFirstName" type="text" placeholder="First Name" name="fname" id="fname" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4" required>
                  </div>
                  <div class="form-group mb-3">
                    <input id="inputLasttName" type="text" placeholder="Last Name" name="lname" id="lname" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4" required>
                  </div>
                  <div class="form-group mb-3">
                    <input id="inputEmail" type="email" placeholder="Email address" name="emailAddress"  autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4" required>
                    <!-- <span id="emailAvailability"></span> -->
                  </div>
                  <div class="form-group mb-4 px-3">
                    <p class="text-muted mb-3">Gender</p>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male" />
                      <label class="form-check-label" for="gender">Male</label>
                    </div>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female" />
                      <label class="form-check-label" for="gender">Female</label>
                    </div>
                  </div>

                  <div class="form-group mb-3">
                    <input id="inputPassword" type="password" placeholder="Password" name="pass" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary" required>
                  </div>
                  <div class="form-group mb-3">
                    <input id="inputPassword" type="password" placeholder="Confirm password" name="cpass" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary" required>
                  </div>


                  <button type="submit" class="btn btn-danger btn-block text-uppercase mb-2 rounded-pill shadow px-3" name="signup" >Sign up</button>
                  <div class="text-center d-flex justify-content-between mt-4">
                    <p>Already a member?<a href="login.php" class="font-italic text-danger">
                        <u>Log in here</u></a></p>
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