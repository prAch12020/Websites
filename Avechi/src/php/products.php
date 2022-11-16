<?php
require_once 'config.php';
include_once 'templates/header.php';
?>
    <main>
        <br><br><br><br><br>
        <h2 id = "category_name">All Products</h2>
        <div class="search">
            <input type ="search" placeholder="Search">
            <button type='submit' name='search'><span class='material-icons'>search</span></button>
        </div>
        <div class = "all_products">
            <?php getCatId(); ?>
            </section>
        </div>
    </main>    
<?php include_once 'templates/footer.php'; ?>
    