<?php
    $title = "BAPS SHAYONA | Add Menu Item";
    $p = "Add New Menu Item";
    include('header.php');
    include('short-nav.php');
?>
    <main class="admin portalBody">
        <section>
            <form class="update-form" method="POST" enctype="multipart/form-data">
                <h3 style='color: var(--blue);'>Add Menu Item</h3><hr>
                <section>
                <div>
                    <div>
                    <label>Menu Item Id</label><br>
                    <input type="text" value=" <?php echo rand(100000, 999999); ?>" name="menu-item-id">
                    </div><br>
                    <div>
                    <label>Menu Item Name</label><br>
                    <input type="text" required="true" name="menu-item-name">
                    </div><br>
                    <div>
                    <label>Menu Item Size</label><br>
                    <input type="text" name="menu-item-size">
                    </div><br>
                </div>
                <div>
                    <div>
                    <label>Menu Item Category</label><br>
                    <input type="text" name="menu-item-cat">
                    </div><br>
                    <div>
                    <label>Menu Item Price</label><br>
                    <input type="text" required="true" name="menu-item-price">
                    </div><br>
                    <div>
                    <label>Menu Item Image</label><br><br>
                    <input type="file" name="menu-item-image">
                    </div><br>
                </div>
                </section><br>
                <button type="submit" name="add" class="action">Add Menu</button>
                <a class="action" style="color: var(--white); font-family: Jua; padding: 5px;" href="admin.php">View Menu</a>
                        
            </form>
            <?php
                if(isset($_POST['add'])){
                    addMenu();
                }                           
            ?>
        </section>
    </main>
    <script src="js/script2.js"></script>
    <script src="js/short.js"></script>
</body>
</html>