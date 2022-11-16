<?php
    $title = "BAPS SHAYONA | Register Administrator";
    $p = "Register Administrator";
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
            if(loggedIn()){
                if($_SESSION['Type'] == "Administrator"){
        ?>
           <fieldset><legend>Register an Administrator</legend>
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
                    <input id="pwd" name="pwd" type="password">
                    <label for="pwd">Password</label>
                    <br>
                    </div>
                    <div>
                    <input id="pass" name="pass" type="password">
                    <label for="pass">Confirm Password</label>
                    <br>
                    </div>
                    <div>
                    <select id="type" name="type">
                        <option id="admin" value="Administrator">Administrator</option>
                    </select>
                    <label for="type" class="user">User</label>
                    <br>
                    </div>
                    <div id="staff-div">
                    <input id="staff" name="staff" type="text">
                    <label for="staff">Staff Id</label>
                    </div>
                </div>
                </section>
                <button name="submit" type="submit">Register</button>
            </form>
            <?php
                    if(isset($_POST['submit'])){
                        require_once "data.php";
                        registerUser();
                    }
                ?>
           </fieldset>
            <?php
            }
        }
        else{
            header('location:menu.php');
        }
        ?>
    </main>
    <script src="js/short.js"></script>
</body>
</html>