<?php
    $title = "BAPS SHAYONA | Update Menu Item";
    $p = "Update Menu Item";
    include('header.php');
    include('short-nav.php');
?>
    <main class="admin portalBody">
        <section>
            <form class="update-form" method="POST" enctype="multipart/form-data">
                <h3 style='color: var(--blue);'>Update Menu Item</h3><hr>
                <section>
                <div>
                    <div>
                    <label>Menu Item Id</label><br>
                    <?php echo '<input type="text" readonly value="'. $_GET['id']. '" name="menu-item-id">'; ?>
                    </div><br>
                    <div>
                    <label>Menu Item Name</label><br>
                    <?php echo '<input required type="text" value="'. $_GET['mn']. '" name="menu-item-name">'; ?>
                    </div><br>
                    <div>
                    <label>Menu Item Size</label><br>
                    <?php echo '<select name="menu-item-size">
                    <option>'. $_GET['size']. '</option>';
                    if($_GET['size'] == "REG"){
                        echo '<option>LAR</option>';
                    }
                    else if($_GET['size'] == "LAR"){
                        echo '<option>REG</option>';
                    }
                    echo "</select>";
                    ?>
                    </div><br>
                </div>
                <div>
                    <div>
                    <label>Menu Item Category</label><br>
                    <?php echo '<input required type="text" value="'. $_GET['cat']. '" name="menu-item-cat">'; ?>
                    </div><br>
                    <div>
                    <label>Menu Item Price</label><br>
                    <?php echo '<input type="text" value="'. $_GET['pr']. '" name="menu-item-price">'; ?>
                    </div><br>
                    <div>
                    <label>Menu Item Image</label><br><br>
                    <?php echo '<input type="file" value="'. $_GET['img']. '" name="menu-item-image">'; ?>
                    </div><br>
                </div>
                </section><br>
                <button type="submit" name="update" class="action">Update Menu</button>
                <a class="action" style="color: var(--white); font-family: Jua; padding: 5px;" href="admin.php">View Menu</a>
            <?php
                if(isset($_POST['update'])){
                    require_once 'data.php';
                    $conn = connect();
                    if($_POST['menu-item-size'] == " "){
                        $size = NULL;
                    }
                    else{
                        $size = $_POST['menu-item-size'];
                    }
                    $id = $_POST['menu-item-id'];
                    $name = $_POST['menu-item-name'];
                    $price = $_POST['menu-item-price'];
                    $cat = $_POST['menu-item-cat'];
                    if($_FILES['menu-item-image']['name'] != ""){
                        $file = addslashes(file_get_contents($_FILES["menu-item-image"]["tmp_name"]));
                    }   
                    else{
                        $file = '';
                    }
                    $query = "UPDATE `menu_items` SET `MenuName`='$name',`Size`='$size',`Price`='$price',`CatId`='$cat',`MenuImage`='$file' WHERE MenuId = $id";
                    if(mysqli_query($conn, $query)){
                        echo "<p style='color: var(--marroon);'>Menu Item updated successfully</p>";
                    }
                    else{
                        echo '<script>alert("Cannot delete order due to a technical error. Try again later");</script>';
                    }
                }                           
            ?>
            </form>
        </section>
    </main>
    <script src="js/script2.js"></script>
    <script src="js/short.js"></script>
</body>
</html>