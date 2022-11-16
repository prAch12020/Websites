<?php 
    $_SESSION['title'] = "Seeds & Feeds | Payment Information";
    include_once 'header.php';
    require_once 'data/config.php';
    $_SESSION['shopping_cart'] = [];
?>
</section>
<main class='main'><br><br>
    <h2 class="animate__animated animate__fadeInDown">Thank you.</h2>
    <div class="center">
        <p>Your payment will be verified within 12 hours and your order will be sent for processing.</p><br>
        <h3>Thank you for shopping with Seeds & Feeds.</h3><br>
        <a class='sec-button' href='index.php'>Home</a>
    </div>
</main>
<?php include_once 'footer.php'; ?>