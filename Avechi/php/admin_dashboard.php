
<?php
require_once 'config.php';
include_once 'templates/header.php';
if(!loggedIn()){
?>
    <main>
        <p>Please <a href='login.php'>log in</a>.</p>
    </main>
<?php
}else{
?>
    <main>
        <section id="whole">        
            <section id="dash">
                <div><a href="users.php">
                    <span class='material-icons'>people</span>
                    <h2>Users</h2></a>
                </div>
                <div><a href="orders.php">
                    <span class='material-icons'>note</span>
                    <h2>Orders</h2></a>
                </div>
                <div><a href="view_products.php">
                    <span class='material-icons'>smartphone</span>
                    <h2>Products</h2></a>
                </div>
                <div><a href="all_categories.php">
                    <span class='material-icons'>category</span>
                    <h2>Categories</h2></a>
                </div>
                <div><a href="view_payment.php">
                    <span class='material-icons'>credit_card</span>
                    <h2>Payments</h2></a>
                </div>
                <div><a href="view_shipping.php">
                    <span class='material-icons'>local_shipping</span>
                    <h2>Shipping</h2></a>
                </div>
        
            </section>
        </section>
    </main>

    <footer>

    </footer>
    
</body>
<?php
}
?>
</html>