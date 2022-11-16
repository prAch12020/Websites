<?php
    $title = "BAPS SHAYONA | Log In";
    $p = "Log in to order";
    include('header.php');
?>
<nav class="shortNav">
    <a href="index.php">HOME</a>
    <a href="menu.php">MENU</a>
    <a href="products.php">PRODUCTS</a>
    <a href="services.php">SERVICES</a>
</nav>
    <main class="form">
        <?php 
            require_once 'portal.php';
            if(!loggedIn()){
        ?>
        <fieldset>
            <legend>Sign in to BAPS Shayona</legend>
            <p>Not signed up yet? <a href="signup.php"> Sign up </a></p>
            <form action="" method="POST" class="login"><br>
                <div>
                    <br>
                    <input required name="phone_number" type="tel">
                    <label>Phone Number</label>
                    <br>
                </div><br>
                <div>
                    <br>
                    <p><input id='pass' required name="password" type="password">
                    <i id="eye" class="fa fa-eye" onclick='showPassword1()'></i></p>
                    <label class='pass-label' for='pass'>Password</label>
                    <br>
                </div>
                <button name="login" type="submit" value="login">Log in</button>
            </form>
            <?php 
                    require_once 'process-login.php';
            ?>
        </fieldset>    
        <?php
        }
        ?>
    </main>
    <script src="js/script2.js"></script>
    <script src="js/short.js"></script>
</body>
</html>