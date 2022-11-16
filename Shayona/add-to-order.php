<?php
    $title = "BAPS SHAYONA | Add to Order";
    $p = "Add to Order Now";
    include('header.php');
    include('short-nav.php');
?>
    <main class="portalBody">
        <section>
            <div>
                <form method="POST">
                <?php
                    require_once 'portal.php';
                    if(loggedIn()){
                        require_once 'data.php';
                        getMenuItem($_GET['id']);
                        addToOrder();
                    }
                    else{
                        echo "<p>Sign up/Log in to order</p>";
                    }
                ?>
                </form>
            </div>
        </section>
    </main>
    <?php include 'footer.php'; ?>
    <script src="js/short.js"></script>
</body>
</html>