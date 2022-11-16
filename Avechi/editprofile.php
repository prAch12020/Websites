<?php
require_once('config.php');

$id = $_SESSION['userID'];
$row = profile($id);

if (isset($_POST['edit'])) {
  //access Values
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['emailAddress'];
  $gender = $_POST['gender'];


  editProfile($id,$fname, $lname, $email,$gender);

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
                <p class="text-muted mb-4">EDIT PROFILE!</p>
                <form   method="post">
                  <div class="form-group mb-3">
                    <input id="inputFirstName" type="text" placeholder="First Name" name="fname" id="fname" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4" value="<?php echo $row['first_name']; ?>" required>
                  </div>
                  <div class="form-group mb-3">
                    <input id="inputLasttName" type="text" placeholder="Last Name" name="lname" id="lname" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4" value="<?php echo $row['last_name']; ?>"required>
                  </div>
                  <div class="form-group mb-3">
                    <input id="inputEmail" type="email" placeholder="Email address" name="emailAddress"  autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4" value="<?php echo $row['email']; ?>"required>
                    <!-- <span id="emailAvailability"></span> -->
                  </div>
                  <div class="form-group mb-4 px-3">
                    <p class="text-muted mb-3">Gender</p>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male" <?php if($row['gender']== 'Male'){echo 'checked="checked"';}; ?> />
                      <label class="form-check-label" for="gender">Male</label>
                    </div>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female" <?php if($row['gender']== 'Female'){echo 'checked="checked"';}; ?> />
                      <label class="form-check-label" for="gender">Female</label>
                    </div>
                  </div>
                  <?php 
                    /*if($_SESSION['gender'] == "Male"){
                      echo "<script>
                      console.log('".$_SESSION['gender']."');
                      document.getElementById('inlineRadio1').setAttribute('checked', true);
                      document.getElementById('inlineRadio2').removeAttribute('checked');</script>";
                    }
                    else if($_SESSION['gender'] == "Female"){
                      echo "<script>
                      console.log('".$_SESSION['gender']."');
                      document.getElementById('inlineRadio2').setAttribute('checked', true);
                      document.getElementById('inlineRadio1').removeAttribute('checked');</script>";
                    }*/
                  ?>
                  <button type="submit" class="btn btn-danger btn-block text-uppercase mb-2 rounded-pill shadow px-3" name="edit" >Edit</button>
                  <div class="text-center d-flex justify-content-between mt-4">
                    <p><a href="profile.php" class="font-italic text-danger">Cancel</a></p>
                  </div>
                </form>
              </div>
            </div>
          </div><!-- End -->

        </div>
      </div><!-- End -->

    </div>
  </div>

  <!-- <script>
function checkEmail(va) {
  $.ajax({
  type: "POST",
  url: "../check_availability.php",
  data:'emailAddress='+va,
  success: function(data){
  $("#emailAvailblty").html(data);
  }
  });
 
}
</script> -->
  <?php include_once 'templates/footer.php'; ?>