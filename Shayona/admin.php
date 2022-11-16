<?php
    $title = "BAPS SHAYONA | Admin";
    $p = "Administrator Portal";
    include('header.php');
    include('short-nav.php');
    require_once 'portal.php';
    require_once 'data.php';
    if(loggedIn()){
        if($_SESSION["Type"] == "Administrator"){
?>
    <main class="portalBody adminBody">
    <div>    
        <h3 id='user' class="h3" onmouseover="manageViews('users')">View Users</h3>
        <h3 id='menu' class='h3' onmouseover="manageViews('menu')">View Menu</h3>
        <h3 id='order' class='h3' onmouseover="manageViews('orders')">View Orders</h3>
        <h3 id='query' class='h3' onmouseover="manageViews('query')">View Queries</h3>
    </div>
    <div class="sections">
            <section id="viewUsers">
                <?php displayUsers(); ?>
                <br><a class="action" href="add-admin.php">Register an Administrator</a>
            </section>
            <br><br>
            <section id="viewMenu">
                <?php displayMenu(); ?>
                <br><p><a class="action" href="add-menu.php">Add New Menu</a></p>
            </section>
            <br><br>
            <section id="viewOrders">
                <?php @viewOrdersInAdmin(); ?>
            </section>
            <br><br>
            <section id="viewServices">
            <?php viewServices(); ?>
            </section>    
    </div>
    </main>
    <?php 
        }
        else{
            echo "<p style='color: var(--grey); font-size: 1.5em; margin: 20% 33%'>You are not authorized to access this portal</p> ";
        }
    }
    else{
        echo "<p style=\"color: var(--white); font-size: 1.5em; margin: 15% 33%\">Log in to verify your administrator status <br><br><a class=\"action\" style=\"background-color: var(--white); color: var(--marroon); margin: 5% 33%\" href=\"login.php\">Log In</a></p>";
    }
    ?>
    <script src="js/script2.js"></script> 
    <script src="js/short.js"></script>
</body>
</html>    