<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <link rel="stylesheet" href="../admincss/add_category.css">
</head>
<body>
    <h1 class="head">Add Category</h1>

    <section id="add-category">
        <div>
            <form action="category_addition.php" method="POST">
                <label for="category_name" class="label-category">Category Name</label>
                <input type="text" class="input-name" name="category_name">
                <input type="submit" value="Add" class="btn-add" name="submit_category">
            </form>
        </div>
    </section>
</body>
</html>