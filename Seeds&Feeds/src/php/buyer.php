<?php
    $_SESSION['title'] = "Seeds & Feeds | Buyer";
    include_once 'header.php';
?>
</section>
<h2 class="animate__animated animate__fadeInDown">All Products.</h2>
<main >
    <form class="search" method="post">
        <input type ="search" name='search-item' placeholder="Search" class='search-input'>
        <button type='submit' class='sec-button' name='search'><span class='material-symbols-outlined'>search</span></button>
    </form>
    <?php if(isset($_POST['search'])){
        searchForProduce($_POST['search-item']);
    } else {
    ?>
    <section class='prev-orders'>
        <?php getFarmProducts(); }?>
    </section>
</main>
<?php include_once 'footer.php'; ?>