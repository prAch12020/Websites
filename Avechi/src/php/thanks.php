<?php 
    include_once 'templates/header.php';
    require_once 'config.php';
    $_SESSION['shopping_cart'] = [];
?>
<main class='main'><br><br>
    <div class="center">
        <p>Payment made successfully</p><br>
        <h3>Thank you for shopping with Avechi</h3><br>
        <a href='index.php'>Home</a>
    </div>
</main>
<?php include_once 'templates/footer.php'; ?>