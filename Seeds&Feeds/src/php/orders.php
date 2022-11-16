<?php
    $_SESSION['title'] = "Seeds & Feeds | Farmer";
    include_once 'header.php';
    require_once 'data/config.php';
?>
</section>
    <h2 class="animate__animated animate__fadeInDown">My Orders</h2>
<main >
    <section class='prev-orders'>
        <?php getPreviousOrders(); ?>
    </section>
</main>
<?php include_once 'footer.php'; ?>