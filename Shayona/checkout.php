<?php
    $title = "BAPS SHAYONA | Check Out";
    $p = "Check Out";
    include('header.php');
    include('short-nav.php');
    require_once 'data.php';
?>
    <main class="portalBody light">
        <section>
            <div>
            <?php
                    if(isset($_POST['place'])){
                        if(isset($_POST['pay']) && isset($_POST['time'])){
                            placeOrder($_POST['pay']);
                        }
                        else{
                            echo "<h5>Select Pick up Time and Payment Method</h5>";
                        }
                    }
                    else{
                ?>
                <form method="POST" class='orders-form'>
                    <div>
                        <h2>Order Summary</h2>
                        <p><?php getOrders(); ?></p>
                    </div>
                    <div>
                        <h5>Total: <span>Ksh. <?php echo getTotalForOrders(); ?>.00</span></h5>
                        <label>Pick Up Time: </label>
                        <input type="time" name="time">
                        <h3>Payment Method</h3>
                        <ul>
                            <li><input type="radio" name="pay" value="M-Pesa on Order">M-Pesa on Order</li>
                            <li><input type="radio" name="pay" value="Cash on Pick-Up">Cash on Pick-Up</li>
                            <li><input type="radio" name="pay" value="M-Pesa on Pick-Up">M-Pesa on Pick-Up</li>
                        </ul>
                        <h3>Steps to pay via M-Pesa: </h3>
                        <ol>
                            <li><h5>Go to M-PESA on your phone</h5></li>
                            <li><h5>Click on Lipa na M_PESA</h5></li>
                            <li><h5>Click on Pay Bill</h5></li>
                            <li><h5>Click on Enter business no. and enter: <span><strong>4048665</strong></span></h5></li>
                            <li><h5>Click on Account no. and type: <span><strong>PARKLANDS</strong></span></h5></li>
                            <li><h5>Enter Amount: <span><strong><?php echo getTotalForOrders(); ?></strong></span></h5></li>
                            <li><h5>Enter your M_PESA pin</h5></li>
                            <li><h5>Click OK</h5></li>
                        </ol>
                        <button name="place" style='font-size: 1.2em; color: var(--blue);' class='btns'>Place Order</button>
                    </div>
                </form>
                <?php } ?>
            </div>
        </section>
    </main>
    <?php include 'footer.php'; ?>
    <script src="js/short.js"></script>
</body>
</html>