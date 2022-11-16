<?php
    $_SESSION['title'] = "Seeds & Feeds";
    include_once 'header.php';
    require_once 'data/config.php';
?>
<main id='main'>
  <section id="hero" class='back-popup glass'>
      <div class='hero-content'>
          <h2 class="animate__animated animate__fadeInDown">Beyond Basic.</h2>
          <p class="animate__animated animate__fadeInUp">For a new variety of farm inputs for top quality farm produce.</p>
          <div>
            <?php if(!isLoggedIn()){?>
            <a onclick='openPage("sign")' id='sign' class="pri-button animate__animated animate__fadeInUp scrollto">Sign up</a>&nbsp;&nbsp;
            <a onclick='openPage("log")' id='log' class="sec-button animate__animated animate__fadeInUp scrollto">Log In</a>
          <?php } else { ?>
            <a href='services.php' id='sign' class="pri-button animate__animated animate__fadeInUp scrollto">View our Services</a>
          <?php } ?>
          </div>
          <div class='picture'></div>
      </div>
  </section>
</section>
  <section id="why-us" class="back-popup why-us">
    <div class="container"><br><br><br><br>
      <div class="section-title">
        <h2 style='color: var(--blue);'>Why Us</h2>
        <p>Seeds & Feeds is an online platform for farmers in Kenya. We offer fast, secure and convenient online shopping experience with a wide range of offerings.</p>
      </div>

      <div class="row">

        <div class="col-md-4 ">
          <div class="box">
            <span>01</span>
            <h4>Fast</h4>
            <p>We ensure our customers receive their purchases on time.</p>
          </div>
        </div>

        <div class="col-md-4 ">
          <div class="box">
            <span>02</span>
            <h4>Secure</h4>
            <p>We safeguard customer and transaction details to guarantee a safe transaction experience.</p>
          </div>
        </div>

        <div class="col-md-4 ">
          <div class="box">
            <span>03</span>
            <h4> Convenient</h4>
            <p>We offer a hassle-free shopping experience and an income tracking functionality for our farmers.</p>
          </div>
        </div>

      </div>

    </div>
  </section>


        
  <section id="contact" class="back-popup contact">
    <div class="container"><br><br><br>

      <div class="section-title">
        <h2 style='color: var(--blue);'>Contact Us</h2>
      </div>

      <div class="row contact-info">

        <div class="col-md-6">
          <div class="contact-phone">
            <i class="bi bi-phone"></i><br>
            <h3>Phone Number</h3>
            <p><a href="tel:+254 797039969"> 0797039969</a></p>
          </div>
        </div>

        <div class="col-md-6">
          <div class="contact-email">
            <i class="bi bi-envelope"></i><br>
            <h3>Email</h3>
            <p><a href="mailto:seeds.a.n.d.feeds@gmail.com">seeds.a.n.d.feeds@gmail.com</a></p>
          </div>
        </div>

      </div>
    </div>
  </section>
</main>
<?php include_once 'footer.php'; ?>