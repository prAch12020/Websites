<?php
    $title = "BAPS SHAYONA | Profile";
    $p = "View profile";
    include('header.php');
    include('short-nav.php');
?>
    <main class="portalBody">
    <?php
        if(loggedIn()){
            require_once 'process-login.php';
            echo "<div style='display: flex; flex-direction: column;' class='orderSect'>
                    <p><span>Name: </span>" .$_SESSION["FirstName"]. " "
                    .$_SESSION["LastName"]. "</p><p><span>Phone: </span>0"
                    .$_SESSION["PhoneNo"].  "</p>
                </div>";
        }
        else{
            echo "<p><a class=\"action\" style=\"background-color: var(--white); color: var(--marroon);\" href=\"login.php\">Log In</a></p>";
        }
    ?>
    </main>
    <?php include 'footer.php'; ?>
    <script src="js/short.js"></script>
</body>
</html>