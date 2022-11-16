<?php 
session_start();

//Connect to database
function connect(){
    $conn = mysqli_connect("localhost", "root", "", "is_project");
    if(!$conn)
        die("The request couldn't be handled by the server! ".mysqli_error($conn));
    return $conn;
}

//Get previous page name
function getPreviousPage(){
    $url = $_SERVER ["HTTP_REFERER"] ; 
    $dot = strpos($url, ".");    
    $extension = substr($url, 0, $dot);    
    $slash= strrpos($extension, "/");    
    $file = substr($extension, $slash + 1);
    return $file;
}

//--------------------------------------------Authorization--------------------------------------------//
//Check if user exists 
function existsUser($em, $ph){
    $conn = connect();
    $sql = "select email FROM tbl_users WHERE email='$em'";
    $results = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $sql1 = "select phone FROM tbl_users WHERE phone='$ph'";
    $results1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
    if($row = $results->fetch_assoc())
        return true;
    else if($row = $results1->fetch_assoc()) 
        return true;
    else return false; 
}

//Check if farmer exists
function existsFarmer($email, $phone){
    $conn = connect();
    $sql = "select farmer_email FROM tbl_farmers WHERE farmer_email='$email'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $sql1 = "select farmer_phone FROM tbl_farmers WHERE farmer_phone ='$phone'";
    $result1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
    if($row = $result->fetch_assoc())
        return true;
    else if($row = $result1->fetch_assoc())
        return true;
    else return false;
}

//Sign up
function signup($fname, $lname, $email, $phone, $password, $role){
    $conn = connect();
    $roleId = 0;
    $message = "";
    $name = $fname." ".$lname;
    $que = "SELECT * FROM tbl_roles WHERE role_name = '$role'";
    $result = mysqli_query($conn,$que) or die(mysqli_error($conn));
    if($row = $result->fetch_assoc()){
        if(!existsUser($email, $phone)){
            $sql = "INSERT INTO tbl_users VALUES(DEFAULT, '$fname', '$lname', '$email', $phone, '$password', NULL, NULL, NULL, $row[role_id], NULL, NULL)";
            if(!mysqli_query($conn,$sql)){
                $message = "Server error! Please try again later.";            
                echo $message;
            }
            else{
                $message = "You are registered successfully. Proceed to log in</a>.";            
                echo $message;
            }
        } 
        else{
            $message = "Email/Phone already registered. Please log in.";        
            echo $message;
        }
    }
    else{
        if(!existsFarmer($email, $phone)){
            $sql1 = "INSERT INTO tbl_farmers VALUES(DEFAULT, '$name', '$email', '$phone', '$password', NULL, NULL, NULL, NULL, NULL)";
            if(!mysqli_query($conn,$sql1)){
                $message = "Server error! Please try again later.";            
                echo $message;
            }
            else{
                $message = "You are registered successfully. Proceed to log in.";
                echo $message;

            }
        }
        else{
            $message = "Email/Phone already registered. Please log in.";
            echo $message;
        }
    }
}


//Redirect to page based on role
function redirectToPage(){
    if($_SESSION['role_id'] == 1){?>
        <script>window.location.href='seller.php'</script>
    <?php } else if($_SESSION['role_id'] == 2){?>
        <script>window.location.href='buyer.php'</script>
    <?php } else if($_SESSION['role_id'] == 3){?>
        <script>window.location.href='vet.php'</script>
    <?php } else if($_SESSION['role_id'] == 4){?>
        <script>window.location.href='admin.php'</script>
    <?php } else if($_SESSION['role_id'] == 0){?>
        <script>window.location.href='farmer.php'</script>
    <?php }
}


//Log in
function login($email, $password){
    $conn = connect();
    $result=mysqli_query($conn,"SELECT * from tbl_users WHERE email='$email';");
    if($num = $result->fetch_assoc()){
        if(password_verify($password, $num['password'])){
            $_SESSION['userID'] = $num['user_id'];
            $_SESSION['name'] = $num['first_name']. " ". $num['last_name'];
            $_SESSION['phone'] = $num['phone'];
            $_SESSION['email'] = $num['email'];
            $_SESSION['address'] = $num['address'];
            $_SESSION['city'] = $num['city'];
            $_SESSION['country'] = $num['country'];
            $_SESSION['role_id'] = $num['role_id'];
            $_SESSION['lat'] = $num['latitude'];
            $_SESSION['long'] = $num['longitude'];
            if($num['address'] == NULL && $num['city'] == NULL && $num['country'] == NULL){?>
                <script src='../../assets/js/address.js'></script>
                <p>Logged in successfully. Please complete your details.</p>
            <?php }
            else/*{
                if($_SESSION['role_id'] == 1){?>
                    <script>window.location.href='seller.php'</script>
                <?php } else if($_SESSION['role_id'] == 2){?>
                    <script>window.location.href='buyer.php'</script>
                <?php } else if($_SESSION['role_id'] == 3){?>
                    <script>window.location.href='vet.php'</script>
                <?php } else if($_SESSION['role_id'] == 4){?>
                    <script>window.location.href='admin.php'</script>
                <?php }
            }*/
            redirectToPage();
        }
        else {
            echo "Incorrect password. Please try again.";
        }
    } 
    else {
        $result=mysqli_query($conn,"SELECT * from tbl_farmers WHERE farmer_email='$email';");
        if($row = $result->fetch_array()){
            if(password_verify($password, $row['farmer_password'])){
                $_SESSION['userID'] = $row['farmer_id'];
                $_SESSION['name'] = $row['farmer_name'];
                $_SESSION['phone'] = $row['farmer_phone'];
                $_SESSION['email'] = $row['farmer_email'];
                $_SESSION['address'] = $row['farmer_address'];
                $_SESSION['city'] = $row['farmer_city'];
                $_SESSION['country'] = $row['farmer_country'];
                $_SESSION['lat'] = $row['latitude'];
                $_SESSION['long'] = $row['longitude'];
                $_SESSION['role_id'] = 0;
                if($row['farmer_address'] == NULL && $row['farmer_city'] == NULL && $row['farmer_country'] == NULL){?>
                    <script src='../../assets/js/address.js'></script>
                    <p>Logged in successfully. Please complete your details.</p>
                <?php }
                else{
                    redirectToPage();
                }
            }
            else
                echo "Incorrect password. Please try again.";
        }
        else
            echo "Email does not exist. Please sign up.";
    }
    
}

//Save address of logged in user
function saveAddress($add, $city, $country, $lat, $long){
    $conn = connect();
    $sql = "UPDATE tbl_users SET address = '$add', city = '$city', country = '$country', latitude = $lat,
            longitude = $long WHERE user_id='$_SESSION[userID]'";
    $sql2 = "UPDATE tbl_farmers SET farmer_address = '$add', farmer_city = '$city', farmer_country = '$country', 
            latitude = $lat, longitude = $long WHERE farmer_id='$_SESSION[userID]'";
    if($_SESSION['role_id'] == 0){
        if(mysqli_query($conn,$sql2)){
            echo "Your address is saved successfully.";
            $_SESSION['address'] = $add;
            $_SESSION['city'] = $city;
            $_SESSION['country'] = $country;
            $_SESSION['lat'] = $latitude;
            $_SESSION['long'] = $longitude;
            redirectToPage();
        }
        else
            echo "Server error! Please try again later.";
    }
    else if($_SESSION['role_id'] != 0){
        if(mysqli_query($conn,$sql)){
            echo "Your address is saved successfully.";
            $_SESSION['address'] = $add;
            $_SESSION['city'] = $city;
            $_SESSION['country'] = $country;
            $_SESSION['lat'] = $latitude;
            $_SESSION['long'] = $longitude;
            redirectToPage();
        }
        else
            echo "Server error! Please try again later.";
    }
}

//Check if any user is logged in
function isLoggedIn(){
    if(isset($_SESSION['userID']))
        return true;
    else return false;
}

/*Get details of logged in user
function profile($userID){
  $query= mysqli_query($GLOBALS['conn'],"select * from tbl_users where user_id='$userID'");
  $result=mysqli_fetch_array($query);
  return $result;
}

//Update edited details of logged in user
function editProfile($userID,$firstname,$lastname,$email,$gender){
    $query= mysqli_query($GLOBALS['conn'],"update tbl_users set first_name = '$firstname', last_name = '$lastname', email = '$email', gender = '$gender' where user_id='$userID'");
    if ($query == TRUE) {
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;        
        $_SESSION['gender'] = $gender;
        $_SESSION['email'] = $email;
        echo "<script>alert('Update successful!');</script>";
        echo "<script>window.location.href='profile.php'</script>";
        profile($userID);
      } else {
        // Message for unsuccessfull insertion
        echo "<script>alert('Something went wrong. Please try again');</script>";
        echo "<script>window.location.href='editprofile.php'</script>";
      }
}*/

//--------------------------------------------Farmer--------------------------------------------//
//Display input items for sale in farmer's portal
function getInputs(){
    $conn = connect();
    $sql = "SELECT * FROM tbl_inputs JOIN tbl_users WHERE tbl_inputs.user_id = tbl_users.user_id";
    $results = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $count = 0;
    while($product = $results->fetch_assoc()){?>
        <div class="card col-12 col-sm-6 col-md-4">
            <img src='../../assets/images/<?php echo $product["image"] ?>' class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $product['name']?></h5>
                <p class="card-text"><?php echo $product['desc']. "<br>Ksh. ".$product['price']. "<br>Seller: ".$product['first_name']." ".$product['last_name']."<br><span class='material-symbols-outlined'>person_pin_circle</span>".$product['address'].", ".$product['city']?></p>
                <form method = "POST" action='trolley.php'>
                    <input type = "hidden" name="cart_product_id" value = <?php echo $product['input_id']?> >
                    <label>Quantity: </label>
                    <span class='sec-button quan-controls minus' id='minus' onClick='adjust(<?php echo $count; ?>)'>-</span>
                    <input type = "text" name="cart_product_quantity" value=1  class="quantity_input">
                    <span class='sec-button quan-controls plus' id='plus' onClick='adjust(<?php echo $count; ?>)'>+</span>
                    <span><?php echo $product['unit']; ?></span>
                    <button type = "submit" name = "cart_submit" title = "Add To Trolley" class="pri-button"><span class="material-symbols-outlined">shopping_cart</span></button><br>
                </form>
            </div>
        </div>    
    <?php $count++; }
    echo " </section>  ";
}

//Search for input
function searchForInput($item){
    $count = 0;
    $conn = connect();
    if(isset($_POST['search'])){
        $sql = "SELECT * FROM `tbl_inputs` JOIN tbl_users WHERE `desc` like '%$item%' AND tbl_inputs.user_id = tbl_users.user_id;";
        $sql2 = "SELECT * FROM `tbl_inputs` JOIN tbl_users WHERE `name` like '%$item%' AND tbl_inputs.user_id = tbl_users.user_id;";
        $result = mysqli_query($conn, $sql);
        $result2 = mysqli_query($conn, $sql2);
        if(mysqli_num_rows($result) > 0){
            echo "<h3>Search Results for $item</h3><section id='search-results'>";
            while($product = $result->fetch_assoc()){?>
                <div class="card col-12 col-sm-6 col-md-4">
                    <img src='../../assets/images/<?php echo $product["image"] ?>' class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product['name']?></h5>
                        <p class="card-text"><?php echo $product['desc']. "<br>Ksh. ".$product['price']. "<br>Seller: ".$product['first_name']." ".$product['last_name']."<br><span class='material-symbols-outlined'>person_pin_circle</span>".$product['address'].", ".$product['city']?></p>
                        <form method = "POST" action='trolley.php'>
                            <input type = "hidden" name="cart_product_id" value = <?php echo $product['input_id']?> >
                            <label>Quantity: </label>
                            <span class='sec-button quan-controls minus' id='minus' onClick='adjust(<?php echo $count; ?>)'>-</span>
                    <input type = "text" name="cart_product_quantity" value=1  class="quantity_input">
                    <span class='sec-button quan-controls plus' id='plus' onClick='adjust(<?php echo $count; ?>)'>+</span>
                            <span><?php echo $product['unit']; ?></span>
                            <button type = "submit" name = "cart_submit" title = "Add To Trolley" class="pri-button"><span class="material-symbols-outlined">shopping_cart</span></button><br>
                        </form>
                    </div>
                </div>    
           <?php $count++; }
        }
        else if(mysqli_num_rows($result2) > 0){
            echo "<h3>Search Results for $item</h3><section id='search-results'>";
            while($product = $result2->fetch_assoc()){?>
                <div class="card col-12 col-sm-6 col-md-4">
                    <img src='../../assets/images/<?php echo $product["image"] ?>' class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product['name']?></h5>
                        <p class="card-text"><?php echo $product['desc']. "<br>Ksh. ".$product['price']. "<br>Seller: ".$product['first_name']." ".$product['last_name']."<br><span class='material-symbols-outlined'>person_pin_circle</span>".$product['address'].", ".$product['city']?></p>
                        <form method = "POST" action='trolley.php'>
                            <input type = "hidden" name="cart_product_id" value = <?php echo $product['input_id']?> >
                            <label>Quantity: </label>
                            <span class='sec-button quan-controls minus' id='minus' onClick='adjust(<?php echo $count; ?>)'>-</span>
                    <input type = "text" name="cart_product_quantity" value=1  class="quantity_input">
                    <span class='sec-button quan-controls plus' id='plus' onClick='adjust(<?php echo $count; ?>)'>+</span>
                            <span><?php echo $product['unit']; ?></span>
                            <button type = "submit" name = "cart_submit" title = "Add To Trolley" class="pri-button"><span class="material-symbols-outlined">shopping_cart</span></button><br>
                        </form>
                    </div>
                </div>    
           <?php $count++;}
        }
        else
            echo "<p>No input found</p>";
    }
    echo "</section><br><a class='pri-button' href='farmer.php'>View All Inputs</a><br><br><br>";
}

//Add input to cart in farmer's portal
function addToCart(){
    $conn = connect();
    // If no cart exists, create a new one and add the item to it, otherwise add the item to the existing cart
    if(!(isset($_SESSION['shopping_cart']))) {
        $_SESSION['shopping_cart'] = [];
        if(isset($_POST['cart_product_id'])){
            array_push($_SESSION['shopping_cart'], [$_POST['cart_product_id'], $_POST['cart_product_quantity']]);
        }
    }
    if(isset($_POST['cart_product_id']) && $_POST['cart_product_quantity']){
        array_push($_SESSION['shopping_cart'], [$_POST['cart_product_id'], $_POST['cart_product_quantity']]);
    }
    // If the cart is not empty, get details for every item in the cart
    if(count($_SESSION['shopping_cart']) > 0){
        $_SESSION['is_cart_empty'] = false;
        $product_details = [];
        $_SESSION['tot'] = 0;
        $price = 0;
        foreach($_SESSION['shopping_cart'] as $index => $cart_product){
            $sql = "SELECT * FROM tbl_inputs WHERE input_id = ".$cart_product[0];
            $result = mysqli_query($conn, $sql);
            if ($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $row['quantity'] = $cart_product[1]; 
                    array_push($product_details, $row);
                    $_SESSION['product_details'] = $product_details;
                }
            }
        }
    }
    else{
        $_SESSION['is_cart_empty'] = true;
    }
}


//Get farm produce placed for sale in farmer's portal
function getFarmProduce(){
    $conn = connect();
    $sql = "SELECT * FROM tbl_farmproduce WHERE tbl_farmproduce.farmer_id = ".$_SESSION['userID'];
    $results = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    if(mysqli_num_rows($results) > 0){
        echo "<table class='table table-sm table-bordered'>
        <thead>
            <td>Produce #</td>
            <td>Produce Name</td>
            <td>Produce Description</td>
            <td>Produce Stock</td>
            <td>Produce Unit</td>
            <td>Produce Price</td>
            <td>Produce Image</td>
            <td>Actions</td>
        </thead>
        <tbody>";
        while($request = $results->fetch_assoc()){ 
            echo "<tr><td>".$request['produce_id'] ."</td>
            <td>".$request['name'] ."</td>
            <td>".$request['desc'] ."</td>
            <td>".$request['produce_stock'] ."</td>
            <td>".$request['unit'] ."</td>
            <td>Ksh. ".$request['price'] ."</td>
            <td><img src='../../assets/images/".$request['image'] ."' height=150px width=180px></td>
            <td><a href='data/delete.php?id=".$request['produce_id']."' class='sec-button'>Delete</a></td></tr>";
        }
        echo "</tbody>
        </table>";
    }
    else{
        echo "<h2>No products for sale</h2>";
    }
    echo " </section>  ";
}


//Check out and place order as Pending
function addOrder(){      
        $conn = connect();
        $total = $_SESSION['tot'];
        $sql = "INSERT INTO `tbl_inputorders` VALUES (NULL, $_SESSION[userID], $_POST[seller_id], $total, 'Pending', NULL)";
        $id = getOrder();
        if(mysqli_query($conn, $sql))
            echo "<script>window.location.href = 'shipping.php';</script>";//>Proceed to Shipping Information</a>";
    }

//Get Pending order information
function getOrder(){
    $conn = connect();
    $id = 0;
    $ql = "SELECT MAX(inputorder_id) FROM tbl_inputorders WHERE farmer_id = $_SESSION[userID]; ";
    $results = mysqli_query($conn,$ql) or die(mysqli_error($conn));
    if(mysqli_num_rows($results) > 0){
        if($row = mysqli_fetch_array($results))
            $id = $row['MAX(inputorder_id)'];
    }
    return $id;
}


//Get Pending product order information
function getProductOrder(){
    $conn = connect();
    $id = 0;
    $ql = "SELECT MAX(order_id) FROM tbl_orders WHERE user_id = $_SESSION[userID]; ";
    $results = mysqli_query($conn,$ql) or die(mysqli_error($conn));
    if(mysqli_num_rows($results) > 0){
        if($row = mysqli_fetch_array($results))
            $id = $row['MAX(order_id)'];
    }
    return $id;
}


//Save shipping information
function saveShipping(){
    $conn = connect();
    if(isset($_POST['save'])){
        $order = getOrder();
        $order1 = getProductOrder();
        $name = $_POST['client_name'];
        $phone = $_POST['client_phone'];
        $email = $_POST['client_email'];
        $location = $_POST['client_location'];
        $city = $_POST['client_city'];
        if(isset($_SESSION['farmer'])){
            $sql = "INSERT INTO `tbl_shippingdetails` (`shippingdetail_id`, `inputorder_id`,  `name`, `phone`, `email`, `street`, `city`, `country`) 
            VALUES (NULL, '$order','$name', '$phone', '$email', '$location', '$city', 'Kenya')";
                if(mysqli_query($conn, $sql)){
                    foreach($_SESSION['product_details'] as $id => $product) {
                        $price = $product['price'] * $product['quantity'];
                        $sq = "INSERT INTO `tbl_inputorderdetails` (`inputorderdetails_id`, `inputorder_id`, `input_id`, `quantity`, `total`) 
                        VALUES (NULL, '$order', '".$product['input_id']."', '".$product['quantity']."', '$price')";
                        mysqli_query($conn, $sq);       
                        $sq2 = "INSERT INTO `tbl_farminput` (`farmer_id`, `input_id`, `quantity`) 
                        VALUES ($_SESSION[userID], '".$product['input_id']."', '".$product['quantity']."')";
                        mysqli_query($conn, $sq2);            
                    }
                }
        }
        else if(isset($_SESSION['buyer'])){
            $sql1 = "INSERT INTO `tbl_shippingdetails` (`shippingdetail_id`, `order_id`,  `name`, `phone`, `email`, `street`, `city`, `country`)  
            VALUES (NULL, '$order1','$name', '$phone', '$email', '$location', '$city', '$country')";
            if(mysqli_query($conn, $sql1)){
                foreach($_SESSION['product_details'] as $id => $product) {
                    $price = $product['price'] * $product['quantity'];
                    $sq1 = "INSERT INTO `tbl_orderdetails` (`orderdetail_id`, `order_id`, `produce_id`, `quantity`, `total`) 
                    VALUES (NULL, '$order', '".$product['produce_id']."', '".$product['quantity']."', '$price')";
                    mysqli_query($conn, $sq1);
                }
            }
        }
        else{
            echo "Error in saving shipping details". mysqli_error($conn);
        }
    }

}
//Get saved shipping information
function getShipping(){
    $conn = connect();
    $id;
    $sql = "SELECT MAX(shippingdetail_id) FROM tbl_shippingdetails; ";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)){
        if($row = mysqli_fetch_array($result)){
            $id = $row['MAX(shippingdetail_id)'];
        }
    }
    return $id;
}

//Get saved payment information
function getPayment(){
    $conn = connect();
    $id;
    $sql = "SELECT MAX(paymentdetail_id) FROM tbl_paymentdetails; ";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)){
        if($row = mysqli_fetch_array($result)){
            $id = $row['MAX(paymentdetail_id)'];
        }
    }
    return $id;
}

//Update Order with payment detail and Process it
function savePayment(){
    $conn = connect();
    $id = getOrder();
    $id1 = getProductOrder();
    $pay = getPayment();
    $sql = "UPDATE `tbl_inputorders` SET `status`='Processing',`payment_detail`='".$pay."' WHERE inputorder_id = '$id'";
    $sql1 = "UPDATE `tbl_orders` SET `status`='Processing',`payment_detail`='".$pay."' WHERE order_id = '$id1'";
    if(isset($_SESSION['farmer'])){
        if(mysqli_query($conn, $sql))
            header('location:../../php/thanks.php');
        else
            echo "second: ".mysqli_error($conn);
    }   
    else if(isset($_SESSION['buyer'])){
        if(mysqli_query($conn, $sql1))
            header('location:../../php/thanks.php');
        else
            echo "second: ".mysqli_error($conn);
    }   
    
    else echo "first: ".mysqli_error($conn);
}

//View all vets nearby in farmer's portal
function getVets(){
    $conn = connect();
    $sql = "SELECT * FROM tbl_users WHERE role_id = 3";
    $results = mysqli_query($conn,$sql);
    echo "<script>let lats = [];
            let longs = [];
            let adds = []; 
            let names = [];
            let phones = [];
            let emails = [];
            let ids = [];
        </script>";?>
        <input name='vet' type="hidden" id="vet"><br><br>
        <input type="text" id='name'><br><br>
        <input type="text" id='phone'><br><br>
        <input type="text" id='email'><br><br>
        <input type="text" id='address'><br><br>
    <?php while($row = $results->fetch_assoc()){?>
        <?php $_SESSION['vet_lat'] = $row['latitude'];
        $_SESSION['vet_long'] = $row['longitude'];
        $_SESSION['vet_name'] = $row['first_name']." ".$row['last_name'];
        $_SESSION['vet_add'] = $row['address'].", ".$row['city'];
        echo("<script src='../../assets/js/map.js'></script><script>
            sendAddress(".$_SESSION['vet_lat'].", ".$_SESSION['vet_long'].",'".$_SESSION['vet_add']."',
            '".$_SESSION['vet_name']."',".$row['phone'].",'".$row['email']."',". $row['user_id'].");
            </script>");
    }
}

//Contact the vet in farmer's portal
function contactVet($vet, $msg, $date){
    $conn = connect();
    $sql = "INSERT INTO `tbl_requests` (`request_id`, `user_id`, `farmer_id`, `message`, `visit_date`, `visit`) 
    VALUES (NULL, $vet, $_SESSION[userID], '$msg', '$date', 'Pending')";
    if(mysqli_query($conn,$sql))
        echo "Your request has been sent to the veterinarian.";
    else
        echo "Server error! Please try again later.";
}


//Add farm produce for sale in farmer's portal
function addFarmProduce($name, $desc, $stock, $unit, $pri, $img){
    $conn = connect();
    $sql = "INSERT INTO `tbl_farmproduce` VALUES (NULL,  $_SESSION[userID], '$name', '$desc', '$stock', '$unit', '$pri', '$img')";
    if(mysqli_query($conn,$sql))
        echo "Your product has been added for sale.";
    else
        echo "Server error! Please try again later.";
}

//Get previous orders made in farmer's portal
function getPreviousOrders(){
    $conn = connect();
    $sql = "SELECT * FROM tbl_inputorders JOIN tbl_inputorderdetails WHERE tbl_inputorders.inputorder_id = tbl_inputorderdetails.inputorder_id AND tbl_inputorders.farmer_id = ".$_SESSION['userID'];
    $results = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    if(mysqli_num_rows($results) > 0){
        //echo "<div>";
            while($order = $results->fetch_assoc()){?>
                <div>
                    <h5>Order Id: <?php echo $order['inputorder_id'] ."<br>Total: Ksh. ".$order['amount']; ?></h5><br>
                    <?php $sql1 = "SELECT name, `desc`, price, unit, image FROM tbl_inputs JOIN tbl_inputorderdetails WHERE tbl_inputorderdetails.input_id = tbl_inputs.input_id AND tbl_inputorderdetails.inputorderdetails_id =".$order['inputorderdetails_id'];
                    $results2 = mysqli_query($conn,$sql1) or die(mysqli_error($conn));
                    while($product = $results2->fetch_assoc()){?>
                        <div class="card col-12 col-sm-6 col-md-4">
                            <img src='../../assets/images/<?php echo $product["image"] ?>' class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $product['name']?></h5>
                                <p class="card-text"><?php echo $product['desc']; ?>
                            
                    <?php } 
                    echo "<br>".$order['quantity']."&nbsp;<br>Ksh. ".$order['total'] ?></p> </div>
                        </div>   <br><br></div>
                <?php } 
                //echo "</div>";
        
    }
    else
        echo "<h3>No previous orders made</h3>";
        /*if(mysqli_num_rows($results) > 0){
        echo "<table>
        <thead>
            <td>Order #</td>
            <td>Order Details Name</td>
            <td>Input Description</td>
            <td>Order Total</td>
            <td>Order Status</td>
            <td>Actions</td>
        </thead>
        <tbody>";
        while($request = $results->fetch_assoc()){ 
            echo "<tr><td>".$request['input_id'] ."</td>
            <td>".$request['input_name'] ."</td>
            <td>".$request['input_desc'] ."</td>
            <td>Ksh. ".$request['input_price'] ."</td>
            <td><img src='../../assets/images/".$request['image'] ."' height=150px width=180px></td>
            <td><a href='data/edit.php?id=".$request['input_id']."' class='pri-button'>Edit</a>
                <a href='data/delete.php?id=".$request['input_id']."' class='sec-button'>Delete</a></td></tr>";
        }
        echo "</tbody>
        </table>";
    }
    else{
        echo "<h2>No inputs for sale</h2>";
    }*/

}

function track(){
    $conn = connect();
    $sql = "SELECT * FROM tbl_farminput JOIN tbl_inputs WHERE tbl_farminput.input_id = tbl_inputs.input_id AND tbl_farminput.farmer_id = ".$_SESSION['userID'];
    $results = mysqli_query($conn,$sql);
    $tot = 0;
    if(mysqli_num_rows($results) > 0){
        echo "<h5 style='text-align:center;' class='animate__animated animate__fadeInDown'>My Inputs</h5>
            <table class='table table-sm table-bordered'>
        <thead>
            <td>Input Name</td>
            <td>Input Price</td>
            <td>Input Quantity</td>
            <td>Input Total</td>
        </thead>
        <tbody>";
        while($request = $results->fetch_assoc()){ 
            echo "<tr><td>".$request['name'] ."</td>
            <td>".$request['price'] ."</td>
            <td>".$request['quantity'] ."</td>
            <td>".$request['price'] * $request['quantity']."</td></tr>";
            $tot += $request['price'] * $request['quantity'];
        }
        echo "<p class='pri-button'>Total: Ksh. ".$tot."</p></tbody>
    </table>";
    }
    else{
        echo "<h2>No inputs bought via Seeds & Feeds</h2>";
    }
    $ql = "SELECT * FROM tbl_orders WHERE tbl_orders.farmer_id = ".$_SESSION['userID'];
    $tot2 = 0;
    $res = mysqli_query($conn,$ql);
    if(mysqli_num_rows($res) > 0){
        while($row = $res->fetch_assoc()){ 
        $sql = "SELECT * FROM tbl_orderdetails JOIN tbl_farmproduce WHERE tbl_orderdetails.produce_id = tbl_farmproduce.produce_id AND tbl_orderdetails.order_id = ".$row['order_id'];
        $results = mysqli_query($conn,$sql);
        if(mysqli_num_rows($results) > 0){
            echo "<h5 style='text-align:center;' class='animate__animated animate__fadeInDown'>My Sales</h5>
                <table class='table table-sm table-bordered'>
            <thead>
                <td>Produce Name</td>
                <td>Produce Price</td>
                <td>Produce Quantity</td>
                <td>Produce Total</td>
            </thead>
            <tbody>";
            while($request = $results->fetch_assoc()){ 
                echo "<tr><td>".$request['name'] ."</td>
                <td>".$request['price'] ."</td>
                <td>".$request['quantity'] ."</td>
                <td>".$request['price'] * $request['quantity']."</td></tr>";
                $tot2 += $request['price'] * $request['quantity'];
            }
            echo "<p class='pri-button'>Total: Ksh. ".$tot2."</p></tbody>
        </table>";
        }
    }
    }
    else{
            echo "<h2>No farm product orders placed via Seeds & Feeds</h2>";
        }
}

//--------------------------------------------Seller--------------------------------------------//
//Get inputs placed for sale in seller's portal
function getSaleInputs(){
    $conn = connect();
    $sql = "SELECT * FROM tbl_inputs WHERE tbl_inputs.user_id = ".$_SESSION['userID'];
    $results = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    if(mysqli_num_rows($results) > 0){
        echo "<table class='table table-sm table-bordered'>
        <thead>
            <td>Input #</td>
            <td>Input Name</td>
            <td>Input Description</td>
            <td>Input Price</td>
            <td>Input Image</td>
            <td>Actions</td>
        </thead>
        <tbody>";
        while($request = $results->fetch_assoc()){ 
            echo "<tr><td>".$request['input_id'] ."</td>
            <td>".$request['name'] ."</td>
            <td>".$request['desc'] ."</td>
            <td>Ksh. ".$request['price'] ."</td>
            <td><img src='../../assets/images/".$request['image'] ."' height=150px width=180px></td>
            <td><a href='data/delete.php?id=".$request['input_id']."' class='sec-button'>Delete</a></td></tr>";
        }
        echo "</tbody>
        </table>";
    }
    else{
        echo "<h2>No inputs for sale</h2>";
    }
    echo " </section>  ";
}

//Add input for sale in seller's portal
function addInput($name, $desc, $pri, $unit, $img){
    $conn = connect();
    $sql = "INSERT INTO `tbl_inputs` VALUES (NULL, '$name', $_SESSION[userID], '$desc', '$unit', '$pri', '$img')";
    if(mysqli_query($conn,$sql))
        echo "Your item has been added for sale.";
    else
        echo "Server error! Please try again later.";
}


//--------------------------------------------Buyer--------------------------------------------//
//Display farm products for sale in buyer's portal
function getFarmProducts(){
    $conn = connect();
    $sql = "SELECT * FROM tbl_farmproduce JOIN tbl_farmers WHERE tbl_farmproduce.farmer_id = tbl_farmers.farmer_id";
    $results = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $count = 0;
    if(mysqli_num_rows($results) > 0){
        while($product = $results->fetch_assoc()){?>
            <div class="card col-12 col-sm-6 col-md-4">
                <img src='../../assets/images/<?php echo $product["image"] ?>' class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $product['name']?></h5>
                    <p class="card-text"><?php echo $product['desc']. "<br>Ksh. ".$product['price']. "<br>Farmer: ".$product['farmer_name']."<br><span class='material-symbols-outlined'>person_pin_circle</span>".$product['farmer_address'].", ".$product['farmer_city']?></p>
                    <form method = "POST" action='cart.php'>
                        <input type = "hidden" name="cart_produce_id" value = <?php echo $product['produce_id']?> >
                        <label>Quantity: </label>
                        <span class='sec-button quan-controls minus' id='minus' onClick='adjust(<?php echo $count; ?>)'>-</span>
                        <input type = "text" name="cart_produce_quantity" value=1  class="quantity_input">
                        <span class='sec-button quan-controls plus' id='plus' onClick='adjust(<?php echo $count; ?>)'>+</span>
                        <span><?php echo $product['unit']; ?></span>
                        <button type = "submit" name = "cart_add" title = "Add To Trolley" class="pri-button"><span class="material-symbols-outlined">shopping_cart</span></button><br>
                    </form>
                </div>
            </div>    
        <?php $count++; }
    }
    else{
        echo "<h2>No farm products available for sale";
    }
    echo " </section>  ";
}


//Search for farm produce
function searchForProduce($item){
    $count = 0;
    $conn = connect();
    if(isset($_POST['search'])){
        $sql = "SELECT * FROM `tbl_farmproduce` JOIN tbl_farmers WHERE `desc` like '%$item%' AND tbl_farmproduce.farmer_id = tbl_farmers.farmer_id;";
        $sql2 = "SELECT * FROM `tbl_farmproduce` JOIN tbl_farmers WHERE `name` like '%$item%' AND tbl_farmproduce.farmer_id = tbl_farmers.farmer_id;";
        $result = mysqli_query($conn, $sql);
        $result2 = mysqli_query($conn, $sql2);
        if(mysqli_num_rows($result) > 0){
            echo "<h3>Search Results for $item</h3><section id='search-results'>";
            while($product = $result->fetch_assoc()){?>
                <div class="card col-12 col-sm-6 col-md-4">
                    <img src='../../assets/images/<?php echo $product["image"] ?>' class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product['name']?></h5>
                        <p class="card-text"><?php echo $product['desc']. "<br>Ksh. ".$product['price']. "<br>Seller: ".$product['farmer_name']."<br><span class='material-symbols-outlined'>person_pin_circle</span>".$product['farmer_address'].", ".$product['farmer_city']?></p>
                        <form method = "POST" action='trolley.php'>
                            <input type = "hidden" name="cart_product_id" value = <?php echo $product['produce_id']?> >
                            <label>Quantity: </label>
                            <span class='sec-button quan-controls minus' id='minus' onClick='adjust(<?php echo $count; ?>)'>-</span>
                    <input type = "text" name="cart_product_quantity" value=1  class="quantity_input">
                    <span class='sec-button quan-controls plus' id='plus' onClick='adjust(<?php echo $count; ?>)'>+</span>
                            <span><?php echo $product['unit']; ?></span>
                            <button type = "submit" name = "cart_submit" title = "Add To Trolley" class="pri-button"><span class="material-symbols-outlined">shopping_cart</span></button><br>
                        </form>
                    </div>
                </div>    
           <?php $count++; }
        }
        else if(mysqli_num_rows($result2) > 0){
            echo "<h3>Search Results for $item</h3><section id='search-results'>";
            while($product = $result2->fetch_assoc()){?>
                <div class="card col-12 col-sm-6 col-md-4">
                    <img src='../../assets/images/<?php echo $product["image"] ?>' class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product['name']?></h5>
                        <p class="card-text"><?php echo $product['desc']. "<br>Ksh. ".$product['price']. "<br>Seller: ".$product['first_name']." ".$product['last_name']."<br><span class='material-symbols-outlined'>person_pin_circle</span>".$product['address'].", ".$product['city']?></p>
                        <form method = "POST" action='trolley.php'>
                            <input type = "hidden" name="cart_product_id" value = <?php echo $product['input_id']?> >
                            <label>Quantity: </label>
                            <span class='sec-button quan-controls minus' id='minus' onClick='adjust(<?php echo $count; ?>)'>-</span>
                            <input type = "text" name="cart_product_quantity" value=1  class="quantity_input">
                            <span class='sec-button quan-controls plus' id='plus' onClick='adjust(<?php echo $count; ?>)'>+</span>
                            <span><?php echo $product['unit']; ?></span>
                            <button type = "submit" name = "cart_submit" title = "Add To Trolley" class="pri-button"><span class="material-symbols-outlined">shopping_cart</span></button><br>
                        </form>
                    </div>
                </div>    
           <?php $count++;}
        }
        else
            echo "<p>No farm product found</p>";
    }
    echo "</section><br><a class='pri-button' href='buyer.php'>View All Products</a><br><br><br>";
}


//Add farm product to cart in buyer's portal
function addProductToCart(){
    $conn = connect();
    // If no cart exists, create a new one and add the item to it, otherwise add the item to the existing cart
    if(!(isset($_SESSION['shopping_cart']))) {
        $_SESSION['shopping_cart'] = [];
        if(isset($_POST['cart_produce_id'])){
            array_push($_SESSION['shopping_cart'], [$_POST['cart_produce_id'], $_POST['cart_produce_quantity']]);
        }
    }
    if(isset($_POST['cart_produce_id']) && $_POST['cart_produce_quantity']){
        array_push($_SESSION['shopping_cart'], [$_POST['cart_produce_id'], $_POST['cart_produce_quantity']]);
    }
    // If the cart is not empty, get details for every item in the cart
    if(count($_SESSION['shopping_cart']) > 0){
        $_SESSION['is_cart_empty'] = false;
        $product_details = [];
        $_SESSION['tot'] = 0;
        $price = 0;
        foreach($_SESSION['shopping_cart'] as $index => $cart_product){
            $sql = "SELECT * FROM tbl_farmproduce WHERE produce_id = ".$cart_product[0];
            $result = mysqli_query($conn, $sql);
            if ($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $row['quantity'] = $cart_product[1]; 
                    array_push($product_details, $row);
                    $_SESSION['product_details'] = $product_details;
                }
            }
        }
    }
    else{
        $_SESSION['is_cart_empty'] = true;
    }
}


//Check out and place order as Pending
function addProductOrder(){      
        $conn = connect();
        $total = $_SESSION['tot'];
        $sql = "INSERT INTO `tbl_orders` VALUES (DEFAULT, $_POST[farmer_id],  $_SESSION[userID], $total, 'Pending', NULL)";
        $id = getOrder();
        if(mysqli_query($conn, $sql))
            echo "<script>window.location.href = 'shipping.php';</script>";//>Proceed to Shipping Information</a>";
}


//Get previous orders made in buyer's portal
function getPrevOrders(){
    $conn = connect();
    $sql = "SELECT * FROM tbl_orders JOIN tbl_orderdetails WHERE tbl_orders.order_id = tbl_orderdetails.order_id AND tbl_orders.user_id = ".$_SESSION['userID'];
    $results = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    if(mysqli_num_rows($results) > 0){
            while($order = $results->fetch_assoc()){?>
                    <h5>Order Id: <?php echo $order['order_id']; ?> </h5><br>
                    <?php $sql1 = "SELECT name, `desc`, price, unit, image FROM tbl_farmproduce JOIN tbl_orderdetails WHERE tbl_orderdetails.produce_id = tbl_farmproduce.produce_id AND tbl_orderdetails.order_id =".$order['order_id'];
                    $results2 = mysqli_query($conn,$sql1) or die(mysqli_error($conn));
                    if($product = $results2->fetch_assoc()){?>
                        <div class="card col-12 col-sm-6 col-md-4">
                            <img src='../../assets/images/<?php echo $product["image"] ?>' class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $product['name']?></h5>
                                <p class="card-text"><?php echo $product['desc']. "&nbsp;".$product['unit'];
                    } 
                    echo "<br>".$order['quantity']."
                                <br>Ksh. ".$product['price'] ?></p>
                            </div>
                        </div>
        <?php }
    }
    else
        echo "<h3>No previous orders made</h3>";
}

//--------------------------------------------Veterinarian--------------------------------------------//
//Get requests for visit in vet's portal
function getVetRequests(){
    $conn = connect();
    $sql = "SELECT * FROM tbl_requests JOIN tbl_farmers WHERE 
    tbl_requests.farmer_id = tbl_farmers.farmer_id AND tbl_requests.user_id = ".$_SESSION['userID'];
    $results = mysqli_query($conn,$sql);
    if(mysqli_num_rows($results) > 0){
        echo "<h2 class='animate__animated animate__fadeInDown'>My Visit Requests</h2>
            <table class='table table-sm table-bordered'>
        <thead>
            <td>Farmer Name</td>
            <td>Farmer Phone</td>
            <td>Farmer Address</td>
            <td>Farmer City</td>
            <td>Visit Date</td>
            <td>Message</td>
            <td>Visit</td>
            <td>Actions</td>
        </thead>
        <tbody>";
        while($request = $results->fetch_assoc()){ 
            echo "<tr><td>".$request['farmer_name'] ."</td>
            <td>".$request['farmer_phone'] ."</td>
            <td>".$request['farmer_address'] ."</td>
            <td>".$request['farmer_city'] ."</td>
            <td>".$request['visit_date'] ."</td>
            <td>".$request['message'] ."</td>
            <td>".$request['visit'] ."</td>";
            if($request['visit'] == "Pending"){
                echo "<td><a href='data/schedule.php?id=".$request['request_id']."' class='pri-button'>Schedule Visit</a>
                <a href='data/visit.php?id=".$request['request_id']."' class='sec-button'>Mark as Visited</a></td></tr>";
            }
            else if($request['visit'] == "Scheduled"){
                echo "<td><a href='data/visit.php?id=".$request['request_id']."' class='pri-button'>Mark as Visited</a></td></tr>";
            }
            else if($request['visit'] == "Visited"){
                echo "<td>No actions available</td></tr>";
            }
        }
        echo "</tbody>
    </table>";
    }
    else{
        echo "<h2>No requests made</h2>";
    }
}

?>