<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Subcategory</title>
    <link rel="stylesheet" href="../admincss/add_subcategory.css">
</head>
<body>
    <h1 class="head">Add Subcategory</h1>
    <section id="add-subcategory">
        <div>
            <form action="subcategory_addition.php" method="POST">
                <label for="subcategory_name" class="label-subcategory">Subcategory Name</label>
                <input type="text" class="input-name" name="subcategory_name">
                <input type="submit" value="Add" class="btn-add" name="submit_subcategory">
            </form>
        </div>
    </section>
</body>
</html>