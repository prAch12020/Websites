<?php
    $_SESSION['title'] = "Seeds & Feeds | Farmer";
    include_once 'header.php';
    require_once 'data/config.php';
?>
</section>

    <h2 class="animate__animated animate__fadeInDown">All Inputs</h2>
<main >
    <form class="search" method="post">
        <input type ="search" name='search-item' placeholder="Search" class='search-input'>
        <button type='submit' class='sec-button' name='search'><span class='material-symbols-outlined'>search</span></button>
    </form>
    <?php if(isset($_POST['search'])){
        searchForInput($_POST['search-item']);
    } else {
    ?>
    <section class="all-products prev-orders">
        <?php getInputs(); } ?>
    </section>
</main>
<?php include_once 'footer.php'; ?>