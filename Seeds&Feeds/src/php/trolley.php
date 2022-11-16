<?php
    require_once 'data/config.php';
    $_SESSION['title'] = "Seeds & Feeds | Farmer";
    include_once 'header.php';
    addToCart(); 
?>
</section>
<main>
    <form method='POST'>
        <div>
           <!-- If the cart is empty -->
           <?php if($_SESSION['is_cart_empty']){?> 
                    <h3>Your shopping trolley is empty!</h3><br>
                    <p>Once you add any product to your trolley, it will appear here</p>
           <?php } 
                else if(!$_SESSION['is_cart_empty']){ ?>
                    <h2 class="animate__animated animate__fadeInDown">My Trolley</h2>
                    <div class = "all_cart_items all-products">
                    <?php foreach($_SESSION['product_details'] as $id => $product) :
                            $price = $product['price'] * $product['quantity'];
                            $_SESSION['tot']+=$price;
                        ?>
                            <div class="card mb-2" style="max-width: 400px;">
                                <div class="product-container row g-0">
                                    <img src=<?='../../assets/images/'.$product['image']?> class="img-fluid rounded-start card-img-top" alt="...">
                                    
                                    <div class="card-body">
                                        <div>
                                        <h5 class="card-title"><?php echo $product['quantity'] ." ". $product['desc']. ' '.$product['name']?></h5>
                                        <p class="card-title"><strong><?php echo "KES. ". $product['price']?></strong>&nbsp;
                                            <span><?php echo $product['unit']; ?></span>
                                        </p>
                                        <p class="card-title"><?php echo 'Total : KES. '.$price?></p>
                                        </div>
                                    
                                        <form method = "POST">
                                            <input type = "hidden" name="cart_delete_id" value = <?php echo $id?>>
                                            <input type = "hidden" name="seller_id" value = <?php echo $product['user_id']?>>
                                            <a ttile='Delete' href='data/delete.php?id=<?php echo $id; ?>'>
                                                <span class='material-symbols-outlined'>delete</span>
                                            </a><br>
                                        </form> 
                                    </div>  
                                </div>
                            </div>                
                        <?php endforeach; ?>

                    </div>
                    <div class='totals-div'>
                        <p class="card-title"><?php echo 'Total : KES. '.$_SESSION['tot']?></p>
                        <button type='submit' name='submit' class ="btn btn-dark">Check Out</button><br>
                        <?php 
                            if(isset($_POST['submit'])){
                                addOrder();
                            } 
                        ?>
                    </div>
                <?php  
                 }?>
            <div class='totals-div'><br>
                <a href = "farmer.php" class = "btn btn-dark btns">Continue Shopping</a>
                <br><br>
            </div>
        </div>
    </form>
</main>
<?php include_once 'footer.php'; ?>