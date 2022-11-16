<?php 


require_once "config.php";
include_once "templates/header.php";

    $sql = "SELECT product_id, manufacturer, product_name, product_image, product_price, available_quantity, category_name FROM tbl_products JOIN tbl_categories WHERE tbl_products.category_id = tbl_categories.category_id";
    $results = $GLOBALS['conn']->query($sql) or die($GLOBALS['conn']->error);
    
    ?>

<br><br><br><h1>Products</h1>
<a href="add_product.php" class="btn btn-primary">Add</a>
<table class="table ">
    <thead>
      <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Product</th>
        <th class="text-center">Image</th>
        <th class="text-center">Price</th>
        <th class="text-center">Available Quantity </th>
        <th class="text-center" colspan="2">Actions</th>
      </tr>
    </thead>
        <?php 
        while ($row = $results-> fetch_assoc()) { ?>
                <tr>
                <td><h3><?php echo $row['product_id'];?></h3></td>
                
                    <td><h3 class="product-title"><?php echo $row['manufacturer']." ".$row['product_name'];?></h3></td>
                    
                    <td><?php echo "<img src='data:image/jpeg;base64,".base64_encode($row['product_image'])."' height='150' width='200'/>"; ?> </td>
                    <td><h3><?php echo $row['product_price'];?></h3></td>
                    <td><h3><?php echo $row['available_quantity'];?></h3></td>
                    <td><a href="edit_product_page.php?edit=<?php echo $row['product_id'];?>" class= "edit-btn">Edit</a></td>

        </tr>

    <?php } ?>
</body>
</html>