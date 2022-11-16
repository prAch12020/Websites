<?php
    $title = "BAPS SHAYONA | Register";
    $p = "Sign up to order";
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
            <legend>Register to BAPS Shayona</legend>
            <p>Already registered? <a href="login.php"> Log in </a></p>
            <form action="" method="POST" class="register">
                <section>
                <div>
                    <br>
                    <div>
                    <input id="fName" name="fName" type="text">
                    <label for="fName">First Name</label>
                    <br>
                    </div>
                    <div>
                    <input id="lName" name="lName" type="text">
                    <label for="lName">Last Name</label>
                    <br>
                    </div>
                    <div>
                    <input id="num" name="num" type="tel">
                    <label for="num">Phone Number</label>
                    <br>
                    </div>
                </div>
                <div>
                    <br>
                    <div>
                    <p><input id="pass" name="pwd" type="password">
                    <i id="eye" class="fa fa-eye" onclick='showPassword1()'></i></p>
                    <label class='label-pass'for="pass">Password</label>
                    <br>
                    </div>
                    <div>
                    <p><input id="field-pass" name="pass" type="password">
                    <i id="eye2" class="fa fa-eye" onclick='showPassword2()'></i></p>
                    <label class='label-pass' for="field-pass">Confirm Password</label>
                    <br>
                    </div>
                </div>
                </section>
                <button name="submit" type="submit">Register</button>
                <?php
                    if(isset($_POST['submit'])){
                        require_once "data.php";
                        registerUser();
                    }
                ?>
            </form>
        </fieldset>
        <?php
        }
        else{
            header('location:menu.php');
        }
        ?>
    </main>
    <script src="js/script2.js"></script>
    <script src="js/short.js"></script>
</body>
</html>