    <?php

require_once("config.php");
include_once 'templates/header.php';


    $sql = "SELECT * FROM tbl_categories";
    $result = $conn-> query($sql);

    
    ?>
<br><br><br><br>
<h1>CATEGORIES</h1>


<a href="add_category.php" class="btn btn-primary">Add</a>
<table class="table ">
    <thead>
      <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Category Name</th>
        <th class="text-center" colspan="2">Actions</th>
      </tr>
    </thead>
    <?php
    
    if($result-> num_rows > 0 )
    { ?>
        <?php while ($row = $result-> fetch_assoc()) {?>
            
                
                    <tr>
                        <td class="category-title"><?php echo $row['category_id'];?></td>
                        <td class="category-title"><?php echo $row['category_name'];?></td>
                        
                    </tr>
                

        <?php } ?>
    <?php } ?>
    </div>
</body>
</html>