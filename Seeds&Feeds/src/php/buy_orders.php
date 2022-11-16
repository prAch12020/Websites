<?php
    $_SESSION['title'] = "Seeds & Feeds | Buyer";
    include_once 'header.php';
    require_once 'data/config.php';
?>
</section>
 <h2 class="animate__animated animate__fadeInDown">My Orders.</h2>
<main>
    <?php getPrevOrders(); ?>
</main>
<?php include_once 'footer.php'; ?>