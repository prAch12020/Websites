<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="../admincss/view_products.css"> 

</head>
<body>



    <?php

require_once("connect.php");

    $sql = "SELECT product_id, product_name, product_description, product_image, product_price, available_quantity FROM product";
    $result = $conn-> query($sql);

    
    ?>

<h1>Products</h1>


    <?php
    
    if($result-> num_rows > 0 )
    { ?>
        <?php while ($row = $result-> fetch_assoc()) {?>
            <div class="boxes">
                <div class="images">
                <img src='data:image/jpeg;base64,"<?php echo base64_encode($row['product_image'] ); ?>"' height='150' width='200'/>
                </div>
                <div class="details">
                    <h3 class="product-title"><?php echo $row['product_name'];?></h3>
                    <h3>Description: <?php echo $row['product_description'];?></h3>
                    <h3>Price(Kshs): <?php echo $row['product_price'];?></h3>
                    <h3>Available Quantity: <?php echo $row['available_quantity'];?></h3>
                    <a href="edit_product_page.php?edit=<?php echo $row['product_id'];?>" class= "edit-btn">Edit</a>
                    <a href="delete_product.php?delete=<?php echo $row['product_id'];?>" class="del-btn">Delete</a>

                </div>
                <div class="edit_and_delete">

                </div>


            </div>

        <?php } ?>
    <?php } ?>
</body>
</html>