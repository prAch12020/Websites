<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="../admincss/all_categories.css"> 

</head>
<body>



    <?php

require_once("connect.php");

    $sql = "SELECT category_name FROM category";
    $result = $conn-> query($sql);

    
    ?>

<h1>CATEGORIES</h1>


    <?php
    
    if($result-> num_rows > 0 )
    { ?>
        <?php while ($row = $result-> fetch_assoc()) {?>
            <div class="boxes">
                <div class="details">
                    <h2 class="category-title"><?php echo $row['category_name'];?></h2>
                    <a href="add_category.php" class="edit-btn">View</a>
                    <a href="" class= "edit-btn">Edit</a>
                    <a href="" class="del-btn">Delete</a>
                </div>
                <div class="edit_and_delete">

                </div>


            </div>
        <?php } ?>
    <?php } ?>
</body>
</html>