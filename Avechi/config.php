<?php 
session_start();
$hash = 1;
//Connect to database
function connect(){
    $con = mysqli_connect('localhost', 'root', '', 'hci_project');
    if(!$con){
        echo "<p>Error: Cannot connect to the server</p>";
    }
    return $con;
}
$conn = connect();

//Get page name
function getPage(){
    $url = $_SERVER['REQUEST_URI']; 
    $dot = strpos($url, ".");    
    $extension = substr($url, 0, $dot);    
    $slash= strrpos($extension, "/");    
    $file = substr($extension, $slash + 1);
    return $file;
}

//Check if email exists
function checkEmailAvailability($email){
    $sql = "select email FROM tbl_users WHERE email='$email'";
    $results = $GLOBALS['conn']->query($sql) or die($GLOBALS['conn']->error);
    if($row = $results->fetch_assoc())
        return true;
    else return false; 
}

//registration
function registerUser($fname,$lname,$email,$password,$gender){    
    //check if Email exists
    if(checkEmailAvailability($email)){
        echo "<script>alert('Email already exists. Please log in.');window.location.href='login.php'</script>";
    }
    else{
        $results = mysqli_query($GLOBALS['conn'],"insert into tbl_users(first_name,last_name,email,password,gender, role_id) values('$fname','$lname','$email','$password','$gender', 1)");
        if($results) {
            echo "<script>alert('Registration successful! Proceed to log in.');window.location.href='login.php'</script>";
        }
        else{
            echo "<script>alert('Something went wrong. Please try again');//window.location.href='signup.php'</script>";
        }        
    }
}

//sign in
function signIn($email, $password){
    $result=mysqli_query($GLOBALS['conn'],"SELECT * from tbl_users WHERE email='$email';");
    if($num = $result->fetch_array()){
        if(password_verify($password, $num['password'])){
            $_SESSION['userID'] = $num['user_id'];
            $_SESSION['firstname'] = $num['first_name'];
            $_SESSION['lastname'] = $num['last_name'];
            $_SESSION['gender'] = $num['gender'];
            $_SESSION['email'] = $num['email'];;
            $_SESSION['role_id'] = $num['role_id'];
            if($num['role_id'] == 1)
                echo "<script>window.location.href='products.php'</script>";
            else if($num['role_id'] == 2)
                echo "<script>window.location.href='admin_dashboard.php'</script>";
        }
        else
            echo "<script>alert('Incorrect Password. Please log in using the correct password.');window.location.href='login.php'</script>";
    } else 
        echo "<script>alert('Email does not exist. Please sign up');window.location.href='signup.php'</script>";
}
//Check if user is logged in
function loggedIn(){
    if(isset($_SESSION['userID']))        
        return true;
    else
        return false;
}
//Get details of logged in user
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
}
//Handler function for displaying category name and products
function getCatId(){
    $query = "SELECT category_id FROM tbl_categories;";
    $results = $GLOBALS['conn']->query($query) or die($GLOBALS['conn']->error);
    while($row = $results->fetch_assoc()){
        getCat($row['category_id']);
        $GLOBALS['hash']++;
    }
}

//Display Category Name
function getCat($catId){
    $conn = connect();
    $query = "SELECT category_name FROM tbl_categories WHERE category_id = '" . $catId . "'";
    $result = $conn->query($query) or die($conn->error);
    while($row = $result->fetch_assoc()){
        $cat = $row["category_name"];
        echo "<section class='sect' id='div".$GLOBALS['hash']."'><h3>".$cat."</h3>"; 
        getProducts($catId);
    }             
}   

//Display all Products
function getProducts($catId){
    $conn = connect();
    $sql = "SELECT * FROM tbl_products WHERE tbl_products.category_id = '".$catId."'";
    $results = $conn->query($sql) or die($conn->error);
    while($product = $results->fetch_assoc()){?>
        <div class="card col-12 col-sm-6 col-md-4">
            <?php
            if($product['product_image'] == ""){
                echo "<p>No Image</p>";
            }
            else{
                echo "<img src='data:image/jpeg;base64,".base64_encode($product['product_image'] )."' height='200' width='200'/>";
            }?>
            <div class="card-body">
                <h5 class="card-title"><?php echo $product['manufacturer'].' '.$product['product_name']?></h5>
                <p class="card-text"><?php echo "Ksh. ".$product['product_price']?></p>
                <form method = "POST" action='basket.php'>
                    <input type = "hidden" name = "cart_product_id" value = <?php echo $product['product_id']?> class="btn btn-dark">
                    <label>Quantity: </label>
                    <input type = "number" name = "cart_product_quantity" value=1 min = 1 class = "quantity_input"><br>
                    <button type = "submit" name = "cart_submit" title = "Add To Basket" class="btn btn-dark"><span class="material-icons">shopping_basket</span></button><br>
                </form>
                <form method = "POST" action = "wishlist.php">
                    <input type = "hidden" name = "wishlist_product_id" value = <?php echo $product['product_id']?> class="btn btn-dark">
                    <button type = "submit" name = "wishlist_submit" title = "Add To Wishlist" class="btn btn-dark"><span class="material-icons">favorite_border</span></button><br>
                </form>
            </div>
        </div>    
    <?php }
    echo " </section>  ";
}

//Add product to Cart
function addToCart(){
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
        $price= 0;
        foreach($_SESSION['shopping_cart'] as $index => $cart_product){
            $sql = "SELECT * FROM tbl_categories JOIN tbl_products ON tbl_categories.category_id = tbl_products.category_id WHERE product_id = ".$cart_product[0];
            $result = $GLOBALS['conn']->query($sql);
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
//Add product to Wishlist
function addToWishlist(){
    // If no cart exists, create a new one and add the item to it, otherwise add the item to the existing cart
    if(!(isset($_SESSION['wishlist']))) {
        $_SESSION['wishlist'] = [];
        if(isset($_POST['wishlist_product_id'])){
            array_push($_SESSION['wishlist'], $_POST['wishlist_product_id']);
        }
    }
    if(isset($_POST['wishlist_product_id'])){
        array_push($_SESSION['wishlist'], $_POST['wishlist_product_id']);
    }
    // If the cart is not empty, get details for every item in the cart
    if(count($_SESSION['wishlist']) > 0){
        $_SESSION['is_wish_empty'] = false;
        $item_details = [];
        foreach($_SESSION['wishlist'] as $index => $cart_product){
            $sql = "SELECT * FROM tbl_categories JOIN tbl_products ON tbl_categories.category_id = tbl_products.category_id WHERE product_id = ".$cart_product[0];
            $result = $GLOBALS['conn']->query($sql);
            if ($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    array_push($item_details, $row);
                    $_SESSION['item_details'] = $item_details;
                }
            }
        }
    }
    else{
        $_SESSION['is_wish_empty'] = true;
    }
}

//Check out and place Order as Pending
function addOrder(){      
        $total = $_SESSION['tot'];
        $sql = "INSERT INTO `tbl_order` (customer_id, order_amount, order_status, payment_type) VALUES ($_SESSION[userID], ".$total.", 'Pending', NULL)";
        $id = getOrder();
        if(mysqli_query($GLOBALS['conn'], $sql))
            echo "<div class='popup'><br><br><br><br><br><br><br><p>Order Summary<br>Total: ".$total."</p><a href='shipping.php'>Proceed to Shipping Information</a></div>";
}
//Get Pending order information
function getOrder(){
    $id = 0;
    $ql = "SELECT MAX(order_id) FROM tbl_order; ";
    $result = mysqli_query($GLOBALS['conn'], $ql);
    if(mysqli_num_rows($result)){
        if($row = mysqli_fetch_array($result))
            $id = $row['MAX(order_id)'];
    }
    return $id;
}
//Save shipping information
function saveShipping(){
        $order = getOrder();
        $name = $_POST['client_name'];
        $phone = $_POST['client_phone'];
        $email = $_POST['client_email'];
        $location = $_POST['client_location'];
        $city = $_POST['client_city'];
        $country = $_POST['client_country'];
        echo $order,$name, $phone, $email, $location, $city, $country;
        $sql = "INSERT INTO `tbl_shippingdetails` VALUES (DEFAULT, $order,'$name', $phone, '$email', '$location', '$city', '$country')";
        foreach($_SESSION['product_details'] as $id => $product) {
            $price = $product['product_price'] * $product['quantity'];
            $sq = "INSERT INTO `tbl_orderdetails` (`order_id`, `product_id`, `order_quantity`, `orderdetails_total`) VALUES ('$order', '".$product['product_id']."', '".$product['quantity']."', '$price')";
            mysqli_query($GLOBALS['conn'], $sq);
            $sql = "SELECT product_id, available_quantity FROM tbl_products WHERE tbl_products.product_id = $product[product_id]";
            $result = mysqli_query($GLOBALS['conn'], $sql);
            if(mysqli_num_rows($result)){
                if($row = mysqli_fetch_array($result)){
                    $quan = $row['available_quantity'];
                    $sql1 = "UPDATE tbl_products SET available_quantity = ".$quan-$product['quantity']." WHERE product_id = ".$row['product_id'];
                    mysqli_query($GLOBALS['conn'], $sql1);
                }
            }
            
        }
        if(mysqli_query($GLOBALS['conn'], $sql)){
            $sql = "SELECT MAX(shippingdetail_id) FROM tbl_shippingdetails; ";
            $result = mysqli_query($GLOBALS['conn'], $sql);
            if(mysqli_num_rows($result)){
                if($row = mysqli_fetch_array($result)){
                    $id = $row['MAX(shippingdetail_id)'];
                    echo "<script>window.location.href='payment.php?id=".$id."';</script>";
                }
            }
        }
        else{
            echo "Error in saving shipping details". mysqli_error($GLOBALS['conn']);
        }
    
    mysqli_close($GLOBALS['conn']);
}
//Get saved shipping information
function getShipping(){
    $id;
	$sql = "SELECT MAX(shippingdetail_id) FROM tbl_shippingdetails; ";
	$result = mysqli_query($GLOBALS['conn'], $sql);
	if(mysqli_num_rows($result)){
		if($row = mysqli_fetch_array($result)){
			$id = $row['MAX(shippingdetail_id)'];
		}
	}
    return $id;
}
//Save Card details
function insertCard($id){
    $order = getOrder();
    $nameoncard = $_POST['name_card'];
	$card_no =$_POST['card_no'];
	$date = $_POST['date'];
	$cvv = $_POST['cvv'];
	$city = $_POST['city'];
	$country = $_POST['country'];
	$sql = "INSERT INTO tbl_paymentdetails(`shippingdetail_id`, `order_id`, payment_details) VALUES ('$id', $order, \"['$nameoncard','$card_no','$date','$cvv','$city','$country']\"); ";
	if(mysqli_query($GLOBALS['conn'], $sql)){
        savePayment();
		header('location:thanks.php');
     } else
		echo "Error in processing payment". mysqli_error($GLOBALS['conn']);
	mysqli_close($GLOBALS['conn']);
}
//Get the payment type to update order
function getPaymentType(){
    $sql = "SELECT paymenttype_id, paymenttype_name FROM tbl_paymenttypes";

}

//Get Payment Id
function getPayment(){
    $id;
	$sql = "SELECT MAX(paymentdetail_id) FROM tbl_paymentdetails; ";
	$result = mysqli_query($GLOBALS['conn'], $sql);
	if(mysqli_num_rows($result)){
		if($row = mysqli_fetch_array($result)){
			$id = $row['MAX(paymentdetail_id)'];
		}
	}
    return $id;
}

//Update Order with payment type and Process it
function savePayment(){
    $id = getOrder();
    $sql = "UPDATE `tbl_order` SET `order_status`='Processing',`payment_type`=".getPayment()." WHERE order_id = $id";
    echo $sql;
    if(mysqli_query($GLOBALS['conn'], $sql)){
        if(mysqli_query($GLOBALS['conn'], $sql))
            header('location:thanks.php');
        else
            echo "second: ".mysqli_error($GLOBALS['conn']);
    }   
    else echo "first: ".mysqli_error($GLOBALS['conn']);
}

?>

