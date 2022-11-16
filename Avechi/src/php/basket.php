<?php
require_once 'config.php';
addToCart();
include_once 'templates/header.php';
?>
    <main>
        <br><br><br><br><br>
        <form method='POST'>
            
        <div>
           <!-- If the cart is empty -->
           <?php if($_SESSION['is_cart_empty']){?> 
                <h3>Your shopping basket is empty!</h3><br>
                <p>Once you add any product to your cart, it will appear here</p>
           <?php } else if(!$_SESSION['is_cart_empty']){ ?>
                <?php foreach($_SESSION['product_details'] as $id => $product) :
                    $price = $product['product_price'] * $product['quantity'];
                    $_SESSION['tot']+=$price;
                ?>
                <div class = "all_cart_items">
                    <div class="card mb-2" style="max-width: 400px;">
                        <div class="product-container row g-0"> 
                            <?php echo "<img src='data:image/jpeg;base64,".base64_encode($product['product_image'] )."'/>";?>
                            
                            <div class="card-body">
                                <div>
                                <h5 class="card-title"><?php echo $product['quantity'] ." ". $product['manufacturer']. ' '.$product['product_name']?></h5>
                                <p class="card-title"><strong><?php echo "KES. ". $product['product_price']?></strong></p>
                                <p class="card-title"><?php echo 'Total : KES. '.$price?></p>
                                </div>
                            
                                <form method = "POST">
                                    <input type = "hidden" name = "cart_delete_id" value = <?php echo $id?>>
                                    <a ttile='Delete' href='delete.php?item=<?=$id?>'><span class='delete material-icons'>delete</span></a><br>
                                </form> 
                            </div>  
                        </div>
                    </div>                
                <?php endforeach; ?>
                <div class='totals-div'>
                <p class="card-title"><?php echo 'Total : KES. '.$_SESSION['tot']?></p>
                <button type='submit' name='submit' class ="btn btn-dark">Check Out</button><br>
                <?php 
                    if(isset($_POST['submit'])){
                        addOrder();
                    } 
                ?>
            </div>
            <?php } ?>
        </div>
        <div class='totals-div'>
        <br><a href = "products.php" class = "btn btn-dark btns">Continue Shopping</a><br><br>
        </div></div>
        </form>
    </main>
<?php include_once 'templates/footer.php'; ?>