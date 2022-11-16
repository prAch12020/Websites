<?php
    $title = "BAPS SHAYONA | My Orders";
    $p = "My Orders";
    include('header.php');
    include('short-nav.php');
    require_once 'data.php';
?>
    <main class="portalBody light">
        <section>
            <?php viewOrdersInClient(); ?>
        </section>
    </main>
    <?php include 'footer.php'; ?>
    <script src="js/short.js"></script>
</body>
</html>