<?php
    $title = "BAPS SHAYONA | Update Users";
    $p = "Edit user details";
    include('header.php');
    include('short-nav.php');
?>
    <main class="admin portalBody">
        <section>
            <?php 
                if(isset($_SESSION["UserId"])){
                    echo '<form class="form" method="POST">
                    <form action="" method="POST" class="register">
                        <section>
                        <div>
                            <br>
                            <div>
                            <input id="fName" name="fName" value="' .$_GET['fn']. '"type="text">
                            <label for="fName">First Name</label>
                            <br>
                            </div>
                            <div>
                            <input id="lName" name="lName" value="' .$_GET['ln']. '"type="text">
                            <label for="lName">Last Name</label>
                            <br>
                            </div>
                        </div>
                        <div>
                            <br>
                            <div>
                            <input id="num" name="num" value="0' .$_GET['pn']. '"type="tel">
                            <label for="num">Phone Number</label>
                            <br>
                            </div>
                            <br>
                            <div>
                            <select id="type" style="margin-top: -15px;" name="type" value="' .$_GET['tp']. '">
                                <option id="client" value="Client" selected>Client</option>
                                <option id="admin" value="Administrator">Administrator</option>
                            </select>
                            <label for="type" style="margin-top: -50px;" class="user">User</label>
                            <br>
                            </div>
                            <div id="staff-div">
                            <input id="staff" name="staff" type="text">
                            <label for="staff">Staff Id</label>
                            </div>
                        </div>
                        </section>
                        <button name="update" type="submit">Update</button>&nbsp;
                        <a class="action" style="color: var(--white); font-family: Jua; padding: 5px;" href="admin.php">View Users</a>';
                        
                        if(isset($_POST['update'])){
                            require_once 'data.php';
                            $conn = connect();
                            $sql = "UPDATE `users` SET `FirstName`='" .$_POST['fName']. "',`LastName`='" .$_POST['lName']. "',`PhoneNo`='" .$_POST['num']. "',`Type`='" .$_POST['type']. "',`StaffId`='" .$_POST['staff']. "' WHERE `UserId`= " .$_GET['id'];
                            insert($sql, "<p style='color: var(--marroon);'>User updated successfully</p>");
                        }
                    echo "</form>";
                }
                else{
                    echo "<p><a class=\"action\" style=\"background-color: var(--white); color: var(--marroon); \" href=\"login.php\">Log In</a> to verify your administator status</p>";
                }
            ?>
            
        </section>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#type').on('change.states', function() {
                $("#staff-div").toggle($(this).val() == 'Administrator');
            }).trigger('change.states');
        });
    </script>
    <script src="js/short.js"></script>
</body>
</html>