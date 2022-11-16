<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="../admincss/add_product.css">
</head>
<body>


<?php

if (isset ($_GET["edit"])) {
        require_once("connect.php");
        $user_id = $_GET["edit"]; // get id through query string


        $qry = mysqli_query($conn,"select * from tbl_users where user_id='$user_id'"); // select query

        $data = mysqli_fetch_array($qry); // fetch data

        

?>

    <h1 class="head"> Edit User Details</h1>
    <section id="add-product">
        <form action="process_editUser.php" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="user_id" value="<?php echo $data['user_id']; ?>">

            <label for="product_name" class="labels">First Name</label>
            <input type="text" name="first_name" id="first_name" class="inputs" value="<?php echo $data['first_name']?>">

            <label for="product_description" class="labels">last Name</label>
            <input type="text" name="last_name" id="last_name" class="inputs" value="<?php echo $data['last_name']?>">
            <label for="product_description" class="labels">Email</label>
            <input type="text" name="email" id="email" class="inputs" value="<?php echo $data['email']?>">


            <label for="price" class="labels">Gender</label>
            <input type="text" name="gender" id="gender" class="inputs" value="<?php echo $data['gender']?>">

           

            <input type="submit" value="Save" name="submit_product" class="btn-add">
        </form>

    </section>
    <?php }  ?>

</body>
</html>