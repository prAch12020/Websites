<?php
    $title = "BAPS SHAYONA | Order";
    $p = "Order Now";
    include('header.php');
    include('short-nav.php');
?>
    <main class="portalBody">
        <section>
            <div>
                <?php
                    require_once 'portal.php';
                    if(loggedIn()){
                        inCart();
                        getOrderItems();
                        
                ?>
                <?php
                    }
                    else{
                        echo "<p>Sign up/Log in to order</p>";
                    }
                ?>
            </div>
        </section>
    </main>
    <?php include 'footer.php'; ?>
    <script src="js/short.js"></script>
</body>
</html>