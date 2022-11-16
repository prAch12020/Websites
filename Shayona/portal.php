<?php
    require_once 'process-login.php';
    function loggedIn(){
        if(isset($_SESSION["UserId"])){
            return true;
        }
        else{
            return false;
        }
    }
    function profile(){
        if(loggedIn()){
            $div1 = "<div id=\"div_portal\">
            <i id=\"acc\" onclick=\"dispProfile()\" class=\"far fa-user-circle fa-2x\"></i>
            <span class=\"names\" onclick=\"dispProfile()\">".$_SESSION["FirstName"]. " " .$_SESSION["LastName"]. "</span>";
            
            echo $div1;

            if($_SESSION["Type"] == "Administrator"){
                adminPortal();
            }
            else{
                clientPortal();
            }
        } 
        else{
            $div2 = "<div class=\"link\">
            <a class=\"action\" href=\"signup.php\">Sign Up</a> &nbsp;  
            <a class=\"action\" href=\"login.php\">Log In</a> &nbsp; 
            </div>";
            echo $div2;
        }
    }
    function linksToDisplay(){
        if(loggedIn()){
            echo "<a class=\"action\" href=\"menu.php\">Order Now</a>";
        } 
        else{
            echo "<a class=\"action\" href=\"signup.php\">Sign Up</a> &nbsp; &nbsp; <a class=\"action\" href=\"login.php\">Log In</a>";
        }
    }
    function clientPortal(){
        require_once 'data.php'; 
        echo "<a href='order.php' title='My Menu'><i class='menu-icon fas fa-clipboard-list'></i></a><span class='count'>";
        countItems();
        echo "</span></div>";
        $client = "<div id=\"dropDiv\" class='dropDiv1'> 
            <p><a class=\"action\" href=\"purchases.php\">My Orders</a></p>
            <p><a class=\"action\" href=\"profile.php\">Profile</a></p>
            <p><a class=\"action\" href=\"logout.php\">Log Out</a></p>
            </div>";
        echo $client;
    }
    function adminPortal(){
        echo "</div>";
        $admin = "<div id=\"dropDiv\" class='dropDiv2'> 
            <p><a class=\"action\" href=\"admin.php\">Admin</a></p>
            <p><a class=\"action\" href=\"logout.php\">Log Out</a></p>
            </div>";
        echo $admin;
    }
?>