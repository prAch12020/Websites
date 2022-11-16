<?php
require_once 'config.php';
addToWishlist();
include_once 'templates/header.php';
?>
    <main>
        <br><br><br><br><br>
        <form method='POST'>
        <div>
           <!-- If the cart is empty -->
           <?php if($_SESSION['is_wish_empty']){?> 
                <h3>Your wishlist is empty!</h3>
                <p>Once you favorite any product, it will appear here</p>
           <?php } else if(!$_SESSION['is_wish_empty']){ ?>
            <div class="all_wish_items">
                <?php foreach($_SESSION['item_details'] as $id => $product) :
                ?>
                    <div class="card mb-2">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src=<?='../../images/'.$product['product_image']?> class="img-fluid rounded-start card-img-top" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $product['manufacturer']. ' '.$product['product_name']?></h5>
                                    <p class="card-title"><?php echo "KES. ". $product['product_price']?></p>
                                    <form method = "POST">
                                        <input type = "hidden" name = "cart_delete_id" value = <?php echo $id?>>
                                        <a href='delete.php?item=<?=$id?>'><span class='delete material-icons'>delete</span></a><br>
                                    </form> 
                                    
                                </div>
                            </div>
                        </div>
                    </div>                
                <?php endforeach; } ?>
                
                </div>
        <div class='totals-div'>
        <br><a href = "products.php" class = "btn btn-dark btns">View all products</a><br><br>
        </div>
        </div>
        </form>
    </main>
<?php include_once 'templates/footer.php'; ?>