
<?php
require_once '../../config.php';
include_once '../templates/header.php';
if(!loggedIn()){
?>
    <main>
        <p>Please <a href='login.php'>log in</a>.</p>
    </main>
<?php
}else{
?>
  <header>
        <div class="header">
            <a href="#default" id="logo">AVECHI</a>
                <div class="header-right">
                <!-- <a class="active" href="#home">Home</a> -->
                <!-- <a href="#adminname">Admin Name</a> -->
                <a class="getstarted scrollto" href=""><?php echo $_SESSION['firstname'];?></a>
                <a href="../adminlogout.php">Logout</a>

                </div>
        </div>
    </header>

    <main>
        <section id="whole">
            <!-- <section id="logo">
                <div class="avechi">
                    AVECHI
                </div>
        
            </section> -->

            <!-- <section id="name-and-logout">
                    <p >Admin Name<p>
                    <a href="#">Logout</a>
</section> -->

        
            <section id="function">
                <div class="users">
                    <a href="../adminphp/users.php">View Users</a>
                </div>
                <div class="orders">
                    <a href="">View Orders</a>
                </div>
                <div class="category">
                    <a href="add_product.php"> Add Product</a>
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