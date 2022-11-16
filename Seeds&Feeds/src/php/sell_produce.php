<?php
    $_SESSION['title'] = "Seeds & Feeds | Farmer";
    include_once 'header.php';
?>
</section>

    <h2 class="animate__animated animate__fadeInDown">My Farm Produce</h2>
<main >
    <section id="hero">
        <div class='hero-content'>
            <a onClick='openPage("produce")' class="pri-button">Add Produce</a>
            <?php getFarmProduce(); ?>
        </div>
    </section>
</main>
<?php include_once 'footer.php'; ?>
