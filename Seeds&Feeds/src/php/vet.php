<?php
    $_SESSION['title'] = "Seeds & Feeds | Veterinarian";
    include_once 'header.php';
?>
</section>
<main>
    <section id="hero">
        <div class='hero-content'>
            <?php require_once 'data/config.php'; getVetRequests(); ?>
        </div>
    </section>
</main>
<?php include_once 'footer.php'; ?>