<?php 
  include_once 'templates/header.php';
?>

<section id="hero">
  <div class="hero-container">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active" style="background-image: url(../../images/slide/slide-2.jpg);">
          <div class="carousel-container">
            <div class="carousel-content">
              <h2 class="animate__animated animate__fadeInDown">Beyond Basic.</h2>
              <p class="animate__animated animate__fadeInUp">For a new generation of photographers.</p>
              <div>
                <a href="products.php#div12" class="btn-get-started animate__animated animate__fadeInUp scrollto">Shop now</a>
              </div>
            </div>
          </div>
        </div>

        <div class="carousel-item" style="background-image: url(../../images/slide/slide-1.jpg);">
          <div class="carousel-container">
            <div class="carousel-content">
              <h2 class="animate__animated animate__fadeInDown">Associated Electronics, Satisfaction Guaranteed</h2>
              <p class="animate__animated animate__fadeInUp">Check out our latest products.</p>
              <div>
                <a href="products.php#div3" class="btn-get-started animate__animated animate__fadeInUp scrollto">Shop now</a>
              </div>
            </div>
          </div>
        </div>
       
        <div class="carousel-item" style="background-image: url(../../images/slide/slide-3.jpg);">
          <div class="carousel-container">
            <div class="carousel-content">
              <h2 class="animate__animated animate__fadeInDown">Electronics, the original</h2>
              <p class="animate__animated animate__fadeInUp">Don't miss out.</p>
              <div>
                <a href="products.php#div1" class="btn-get-started animate__animated animate__fadeInUp scrollto">Shop now</a>
              </div>
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </div>
</section>

<main id="main">
  <section id="why-us" class="why-us">
    <div class="container">

      <div class="section-title">
        <h2>Why Us</h2>
        <p>Avechi Kenya is a popular online electronics shop in Kenya.We offer fast, secure and convenient online shopping experience with a broad product offering.</p>
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
            <p>We offer a hassle-free shopping experience and a variety of payment options.</p>
          </div>
        </div>

      </div>

    </div>
  </section>


  <section id="portfolio" class="portfolio">
    <div class="container">
      <div class="section-title">
        <h2>Latest Products</h2>
      </div>
      <div class="row portfolio-container">
      <?php 
        $sql = "SELECT * FROM tbl_products LIMIT 30";
        $results = $conn->query($sql) or die($conn->error);
        while($product = $results->fetch_assoc()){ ?>
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <div class="portfolio-wrap">
              <?php echo "<img src='data:image/jpeg;base64,".base64_encode($product['product_image'] ). "'"; ?> style="width: 250px; height: 200px;" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4><?php echo $product['manufacturer']." ". $product['product_name']; ?></h4>
                  <p>Ksh. <?php echo $product['product_price']; ?></p>
                  <div class="portfolio-links">
                    <a href="#shop" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Add to Basket"><span class="material-icons">shopping_basket</span></a>
                    <a href="#wishlist" title="wishlist"><span class="material-icons">favorite_border</span></a>
                  </div>
                </div>
              </div>
            </div>
      <?php } ?>
      </div>
    </div>
  </section>
        
  <section id="contact" class="contact">
    <div class="container">

      <div class="section-title">
        <h2>Contact Us</h2>
      </div>

      <div class="row contact-info">

        <div class="col-md-4">
          <div class="contact-address">
            <i class="bi bi-geo-alt"></i>
            <h3>Address</h3>
            <address>Pioneer House, Moi Avenue (above Quickmart Pioneer) 4th Floor Shop 402, Nairobi</address>
          </div>
        </div>

        <div class="col-md-4">
          <div class="contact-phone">
            <i class="bi bi-phone"></i>
            <h3>Phone Number</h3>
            <p><a href="tel:+254 701 10 10 10"> 0701 10 10 10</a></p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="contact-email">
            <i class="bi bi-envelope"></i>
            <h3>Email</h3>
            <p><a href="mailto:customer.avechi@gmail.com">customer.avechi@gmail.com</a></p>
          </div>
        </div>

      </div>
    </div>
  </section><

</main>
<?php include_once 'templates/footer.php'; ?>
