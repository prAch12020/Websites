<?php include_once 'templates/header.php'; ?>
<main><br><br><br>    
    <a class='getstarted' href='all_categories.php'>Back</a><br><br>
    <h1>Add Category</h1>
    <section id="sect">
        <div>
            <form class='add-form' action="category_addition.php" method="POST">
                <label for="category_id" class="label-category">Category Id</label>
                <input type="text" class="input-name" name="category_id">
                <label for="category_name" class="label-category">Category Name</label>
                <input type="text" class="input-name" name="category_name">
                <input type="submit" value="Add" class="btn btn-primary" name="submit_category">
            </form>
        </div>
    </section>
</body>
</html>