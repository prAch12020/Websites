<?php
    $_SESSION['title'] = "Seeds & Feeds | Seller";
    include_once 'header.php';
?>
</section>
<h2 class="animate__animated animate__fadeInDown">My Farm Inputs</h2>
<main>
    <section id="hero" class="back-popup">
        <div class='hero-content'>
            <a onClick='openPage("input")' class="pri-button">Add Item</a><br><br>
            <?php getSaleInputs(); ?>
        </div>
    </section>
</main>
<?php include_once 'footer.php'; ?>