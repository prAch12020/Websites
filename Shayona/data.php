<?php

//Connect to database using procedural way
function connect(){
    try{
        $conn = mysqli_connect("localhost", "root", "", "restaurant");
        if(!$conn){
            die("<p class=\"error\">Error: Connection to Server Failed </p>".mysqli_connect_error());
        }
    }
    catch(Exception $e){
        echo "<p class=\"error\">Error: Unable to execute </p>". mysqli_error($conn);
    }
    return $conn;
}

//Perform Create function in database
function insert(String $sql, String $msg){
    $conn = connect();
    if(mysqli_query($conn, $sql)){
        echo $msg;
    } 
    else{
        echo "<p>Error: Unable to execute " . mysqli_error($conn). "</p>";
    }
}

//Search for menu
function searchMenu(){
    $conn = connect();
    if(isset($_POST['search'])){
        $sql = "SELECT * FROM `menu_items` WHERE `menu_items`.`MenuName` LIKE '%$_POST[searchMenu]%'";
        $result = mysqli_query($conn, $sql);
        if($result -> num_rows > 0){
            echo "<h3>Search Results for $_POST[searchMenu]</h3><section id='search-results'>";
            while($row = $result-> fetch_assoc()){
                $size = $row['Size'];
                $name = $row["MenuName"];
                $price = $row["Price"];
                if($size != NULL){
                    echo "<p> " .$name. "........................<span id=\"size\">" .$size. ":</span> Ksh. " .$price. "<a href=\"add-to-order.php?id=$row[MenuId]&size=$row[Size]\"><img class=\"img\" title=\"Add to order\" src=\"images/order.png\"></a>";  
                }
                else{
                    echo "<p> " .$name. "...............................Ksh. " .$price. "<a href=\"add-to-order.php?id=$row[MenuId]\"><img class=\"img\" title=\"Add to order\" src=\"images/order.png\"></a>";  
                }
            }
            echo "</section><br><a class='action' href='menu.php'>View Menu</a>";
        }
        else{
            echo "<p>No item found</p>";
        }
    }
}

//Check if user already exists
function exists($num){
    $conn = connect();
    $sql_select = "Select * FROM users";
    $results = $conn->query($sql_select);
    if($results-> num_rows > 0){
        while($row = $results->fetch_assoc()){
            if($row["PhoneNo"] == $num){
                return true;
                break;
            }
            else {
                return false;
            }
        }
    }
}

//Register User
function registerUser(){
    if($_POST['pwd'] != $_POST['pass']){
        echo "<br><hr><p style=\"color: red\">Passwords do not match</p>";
    }
    else if($_POST['lName'] == "" || $_POST['num'] == "" || $_POST['pwd'] == ""){
        echo "<br><hr><p style=\"color: red\">Error: Please enter all fields correctly</p>";
    }
    else if(exists($_POST['num'])){
        echo "<br><hr><p style=\"color: red\">User with the same phone number already exists</p>";
    }
    else{
                $userDt = "INSERT INTO Users(FirstName, LastName, PhoneNo, Password, Type) VALUES ('" . $_POST['fName'] . "', '" . $_POST['lName'] . "', " . $_POST['num'] . ",'" . $_POST['pwd'] . "', 'Client');";
                $sucMsg = "<p class=\"message\">Signed up successfully!</p> <a class=\"action loglog\" href=\"login.php\">Log In</a>";
                insert($userDt, $sucMsg);
    }
}

//Display users in admin portal
function displayUsers(){
    try{
        $conn = connect();
        $sql_select = "Select * FROM users";
        $results = mysqli_query($conn, $sql_select);
        if($results-> num_rows > 0){
            echo "<table id='table'>
            <tr>
                <th>User Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone Number</th>
                <th>Type</th>
            </tr>";
            while($row = $results->fetch_assoc()){
                $table = "<tr>
                                <td>" . $row["UserId"] . "</td>
                                <td>" . $row["FirstName"] . "</td>
                                <td>" . $row["LastName"] . "</td>
                                <td>0" . $row["PhoneNo"] . "</td>
                                <td>" . $row["Type"] . "</td>
                                <td><a class=\"action\" href=\"update-user.php?id=$row[UserId]&fn=$row[FirstName]&ln=$row[LastName]&pn=$row[PhoneNo]&tp=$row[Type]\">Edit</a></td>
                                <td><a class=\"action\" href=\"delete-user.php?id=$row[UserId]\">Delete</a></td>
                            </tr>";
                echo $table;
            }
            echo "</table>";
        }
        else{
            echo "<p>No records found</p>";
        }
    }
    catch(Exception){
        echo "<p style = \"color: var(--brown)\"> Error: " . mysqli_error($conn) . " </p>";
    } 
}

//Display menu in admin portal
function displayMenu(){
    try{
        $conn = connect();
        $menuInPage = 10;

        if (isset($_GET["menu"])) {    
            $menu  = $_GET["menu"];    
        }    
        else {    
          $menu = 1;    
        }  
        $firstResults = ($menu - 1) * $menuInPage;   
        $sql_select = "Select * FROM menu_items LIMIT $firstResults, $menuInPage";
        $result = mysqli_query($conn, $sql_select);
        
            echo "<table>
            <tr>
                <th>Menu Id</th>
                <th>Menu Name</th>
                <th>Size</th>
                <th>Price</th>
                <th>Category</th>
                <th>Image</th>
            </tr>";
            while ($row = mysqli_fetch_array($result)) {
                $table = "<tr>
                                <td>" . $row["MenuId"] . "</td>
                                <td>" . $row["MenuName"] . "</td>
                                <td>" . $row["Size"] . "</td>
                                <td>" . $row["Price"] . "</td>
                                <td>" . $row["CatId"] . "</td>";
                echo $table;
                                if($row['MenuImage'] == ""){
                                    echo "<td>No Image</td>
                                    <td><a class=\"action\" href=\"update-menu.php?id=$row[MenuId]&mn=$row[MenuName]&size=$row[Size]&pr=$row[Price]&cat=$row[CatId]&img=null\">Edit</a></td>";
                                }
                                else{
                                    echo "<td><img src='data:image/jpeg;base64,".base64_encode($row['MenuImage'] )."' height='200' width='200'/></td>
                                    <td><a class=\"action\" href=\"update-menu.php?id=$row[MenuId]&mn=$row[MenuName]&size=$row[Size]&pr=$row[Price]&cat=$row[CatId]&img=\">Edit</a></td>";
                                }
                                echo "
                                <td><a class=\"action\" href=\"delete-menu.php?id=$row[MenuId]\">Delete</a></td>
                            </tr>";
            } 
            echo "</table><div style='margin-top: 3%;'>";
            $query = "SELECT COUNT(*) FROM menu_items";     
            $result = mysqli_query($conn, $query);     
            $row = mysqli_fetch_row($result);     
            $allRecords = $row[0];

            $allPages = ceil($allRecords / $menuInPage);     
            $pagLink = "";       
        
            if($menu >= 2){   
                echo "<a class='btns' href='admin.php?menu=".($menu - 1)."'>  Prev </a>";   
            }       
                    
            for ($i = 1; $i <= $allPages; $i++) {   
                if ($i == $menu) {   
                    $pagLink .= "<a class='page' id='page-active' href='admin.php?menu=".$i."'>".$i." </a>";   
                }               
                else  {   
                    $pagLink .= "<a class='page' href='admin.php?menu=".$i."'>".$i." </a>";     
                }   
            } 
            echo $pagLink;   
    
            if($menu < $allPages){   
                echo "<a class='btns' href='admin.php?menu=".($menu + 1)."'>  Next </a>";   
            }   
            echo '</div>';
    }
    catch(Exception){
        echo "<p style = \"color: var(--brown)\"> Error: Unable to fetch menu details.Please try again later </p>";
    } 
}

//Read services queries
function viewServices(){
    $conn = connect();
    $query = "SELECT * FROM services WHERE Contacted = 'NO'";
    $result = $conn->query($query) or die($conn->error);
    if($result -> num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<div class='orderSect'><div><div><h4>$row[Name]</h4>
            <a class='btns' href='tel:0$row[Mobile]'><span style='display: inline; margin-top: 3%;' class=\"material-icons\">call</span>&nbsp;0$row[Mobile]</a></div>
            <div><h5><span>Cater for: </span>$row[Cater]</h5>
            <h5><span>Number of people: </span>$row[People]</h5>
            <h5><span>Order: </span>$row[Orders]</h5>
            <h5><span>Date of cater: </span>$row[Date]</h5>
            <h5><span>Time of cater: </span>$row[Time]</h5></div></div>
            <a class='action' href='contact-services.php?id=$row[ServiceId]'>Mark query as Answered</a></div>";
        } 
    }
    else{
        echo "<p  style='color: var(--grey); font-size: 1.5em; margin-left: 10%;'> No pending queries </p>";
    }
}

//Add Menu Item to Database
function addMenu(){
    if($_POST['menu-item-size'] == " "){
        $size = NULL;
    }
    else{
        $size = $_POST['menu-item-size'];
    }
    $id = $_POST['menu-item-id'];
    $name = $_POST['menu-item-name'];
    $price = $_POST['menu-item-price'];
    $cat = $_POST['menu-item-cat'];
    $file = addslashes(file_get_contents($_FILES["menu-item-image"]["tmp_name"]));
    $menuDt = "INSERT INTO `menu_items` (`MenuId`, `MenuName`, `Size`, `Price`, `CatId`, `MenuImage`) VALUES ('$id', '$name', '$size' , '$price', '$cat', '$file')";
    $sucMsg = "<script> alert('Menu updated successfully'); </script>";
    insert($menuDt, $sucMsg);
}

//Print Category Name
function getCat($catId){
    $conn = connect();
    $query = "SELECT * FROM menu_categories WHERE CatId = '" . $catId . "'";
    $result = $conn->query($query) or die($conn->error);
    if($row = $result->fetch_assoc()){
        $cat = $row["CatName"];
        echo $cat;
    }             
}   

//Print Menu Items
function getMenu($catId){
    $conn = connect();
    $query = "SELECT * FROM menu_items WHERE CatId = '" . $catId . "'";
    $results = $conn->query($query) or die($conn->error);
    while($row = $results->fetch_assoc()){
        $size = $row['Size'];
        $name = $row["MenuName"];
        $price = $row["Price"];
        if($size != NULL){
            echo "<p> " .$name. "........................<span id=\"size\">" .$size. ":</span> Ksh. " .$price. "<a href=\"add-to-order.php?id=$row[MenuId]&size=$row[Size]\"><img class=\"img\" title=\"Add to order\" src=\"images/order.png\"></a>";  
        }
        else{
            echo "<p> " .$name. "...............................Ksh. " .$price. "<a href=\"add-to-order.php?id=$row[MenuId]\"><img class=\"img\" title=\"Add to order\" src=\"images/order.png\"></a>";  
        }
    }      
} 

//Get menu item details for addition of menu item to orders
function getMenuItem($id){
    $conn = connect();
    $sql = "SELECT * FROM menu_items WHERE MenuId = ". $id;
    $result = $conn -> query($sql) or die($conn->error);
    if($row = $result -> fetch_assoc()){
        $_SESSION['name'] = $row['MenuName'];
        $_SESSION['size'] = $row['Size'];
        $_SESSION['price'] = $row["Price"];
        if($row['MenuImage'] != NULL){
            echo '<div class="sects"><div><img src="data:image/jpeg;base64,'.base64_encode($row['MenuImage'] ).'" height="200" width="200"/>';
        }    
        echo "<div><p>&nbsp;&nbsp;&nbsp;$_SESSION[name]</p>
              <p>&nbsp;&nbsp;&nbsp;$_SESSION[size]</p>
              <p>&nbsp;&nbsp;&nbsp;Ksh.$_SESSION[price].00</p>
              <h5>&nbsp;&nbsp;&nbsp;Quantity: &nbsp;&nbsp;<input name='quantity' type='number' value=1 min=1 max=10></h5>
              &nbsp;&nbsp;&nbsp;<button type='submit' style='font-size: 1.1em; color: var(--brown);' name='order' class='btns'>Add to order</button></div></div></div>";
    }                                           
}

//Confirm addition of menu item to orders
function addToOrder(){
    if(isset($_POST['order'])){
        if ($_SESSION['size'] == ''){
            $size = NULL;
        }
        else {
            $size = $_SESSION['size'];
        }
        $total = $_SESSION['price'] * $_POST['quantity'];
        $sql = 'INSERT INTO `order_items` (`UserId`, `Quantity`, `MenuId`, `Size`, `Total`, `InCart`) VALUES ("' .$_SESSION["UserId"]. '","' .$_POST["quantity"]. '","' .$_GET['id']. '","' .$size. '","' .$total. '","NO")';
        insert($sql, "<p>$_POST[quantity] $_SESSION[size] $_SESSION[name] is added to your order</p><a class='action' href='menu.php'>Add More Food Items</a> <a class='action' href='order.php'>Proceed to Order</a>");
    }
}

//Check if order is in cart
function inCart(){
    $conn = connect();
    $sql = "SELECT InCart FROM `order_items` WHERE order_items.UserId = $_SESSION[UserId]";
    $result = mysqli_query($conn, $sql) or die($conn -> error);
    if($result -> num_rows > 0){
        while($row = $result->fetch_assoc()){
            if($row['InCart'] != "NO"){
                break;
            }
        }
    }                  
}

//Get orders for checkout
function getOrderItems(){
    $conn = connect();
    $sql = "SELECT order_items.OrderItemId, menu_items.MenuName, menu_items.MenuImage, order_items.Size, order_items.Quantity, order_items.Total FROM order_items JOIN menu_items WHERE order_items.UserId = $_SESSION[UserId] AND order_items.MenuId = menu_items.MenuId AND order_items.InCart = 'NO'";
    $result = $conn -> query($sql) or die($conn->error);
    if($result -> num_rows > 0){
        while($row = $result -> fetch_assoc()){
            $_SESSION['id'] = $row['OrderItemId'];
            $_SESSION['name'] = $row['MenuName'];
            $_SESSION['size'] = $row['Size'];
            $_SESSION['num'] = $row['Quantity'];
            $_SESSION['price'] = $row["Total"];
            echo  "
            <form method='POST' class='orders-form' action='update-order.php?id=$row[OrderItemId]'>";
            if($row['MenuImage'] != NULL){
                echo '<img src="data:image/jpeg;base64,'.base64_encode($row['MenuImage'] ).'" height="200" width="200"/>';
            } 
            echo "
            <input class='id' style='display: none;' readonly name='id' value='".$_SESSION['id']. "'>
            <div><h5>&nbsp;&nbsp;&nbsp;<input readonly name='newName' value='".$_SESSION['name']. "'></h5>";
            if($_SESSION['size'] != ''){
                echo "<h5>&nbsp;&nbsp;&nbsp;<input readonly name='newSize' value='".$_SESSION['size']. "'></h5>";
            }
            echo "<h5>&nbsp;&nbsp;&nbsp;Quantity: <input class='num' readonly name='newNum' type='number' min=1 max=10 value='". $_SESSION['num']. "' ></h5>
            <h5>&nbsp;&nbsp;&nbsp;Price: Ksh.<input class='price' readonly name='newPrice' value='". $_SESSION['price']. "'></h5>
            <a title='Edit order' class=\"icon1\" onclick='enableInputs(" .$_SESSION['id']. ")'>&nbsp;&nbsp;&nbsp;<i class='fas fa-pen-square'></i></a>
            <a id=\"icon2\" title='Remove order' href='delete-order.php?id=$row[OrderItemId]'><i class='fas fa-trash'></i></a></div>    
            <input class='action btnUpdate' type='submit' name='updateOrder' value='Update Order'>
            </form>";
        }
        echo "<div>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Total: </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input readonly id='total' value='Ksh.".getTotalForOrders(). ".00'></h3>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><a style='margin-left: 30%;' class='btns' href='menu.php'>Add more items</a>
        <a style='margin-left: 20%;' class='btns' href='checkout.php'>Check Out</a>
        </div>";
        return true;
    }
    else{
        echo "<p  style='color: var(--grey); font-size: 1.5em; margin-left: 25%;'>Haven't placed any order yet? Worry Not! <a class=\"action\" style=\"background-color: var(--white); color: var(--marroon);\" href=\"menu.php\">View Menu</a></p>";
        return false;
    }
}

//Get orders summary
function getOrders(){
    $conn = connect();
    $sql = "SELECT order_items.OrderItemId, menu_items.MenuName, menu_items.MenuImage, order_items.Size, order_items.Quantity, order_items.Total FROM order_items JOIN menu_items WHERE order_items.UserId = $_SESSION[UserId] AND order_items.MenuId = menu_items.MenuId AND order_items.InCart = 'NO'";
    $result = $conn -> query($sql) or die($conn->error);
    if($result -> num_rows > 0){
        while($row = $result -> fetch_assoc()){
            $_SESSION['id'] = $row['OrderItemId'];
            $_SESSION['name'] = $row['MenuName'];
            $_SESSION['size'] = $row['Size'];
            $_SESSION['num'] = $row['Quantity'];
            $_SESSION['price'] = $row["Total"];
            echo "<div>";
            if($row['MenuImage'] != NULL){
                echo '<img src="data:image/jpeg;base64,'.base64_encode($row['MenuImage'] ).'" height="200" width="200"/>';
            } 
            echo "<div><input class='num' readonly name='newNum' type='number' min=1 max=10 value='". $_SESSION['num']. "' >";
            if($_SESSION['size'] != ''){
                echo "<input readonly name='newSize' value='".$_SESSION['size']. "'>";
            }
            echo "<input readonly name='newName' value='".$_SESSION['name']. "'>
            <h5>Ksh. <input class='price' readonly name='newPrice' value='". $_SESSION['price']. "'></h5>
            </div></div>";
        }
    }
    else{
        echo "<p  style='color: var(--grey); font-size: 1.5em; margin-left: 25%;'>Haven't placed any order yet? Worry Not! <a class=\"action\" style=\"background-color: var(--white); color: var(--marroon);\" href=\"menu.php\">View Menu</a></p>";
    }
}

//Get total of orders
function getTotalForOrders(){
    $conn = connect();
    $sql = "SELECT Total FROM `order_items` WHERE UserId = $_SESSION[UserId] AND InCart = 'NO'";
    $result = $conn->query($sql);
    $total = 0;
    if($result -> num_rows > 0){
        while($row = $result->fetch_assoc()){
            $totalPerItem = $row['Total'];
            $total += $totalPerItem;
        }
        return $total;
    }
}

//Get total of items in cart
function getTotalForCart(){
    $conn = connect();
    $sql = "SELECT Total FROM `order_items` WHERE UserId = $_SESSION[UserId] AND InCart = 'YES'";
    $result = $conn->query($sql);
    $total = 0;
    if($result -> num_rows > 0){
        while($row = $result->fetch_assoc()){
            $totalPerItem = $row['Total'];
            $total += $totalPerItem;
        }
        return $total;
    }
}

//Place order and send it to database
function placeOrder($pay){
    $orders = array();
    $conn = connect();
    $query = "SELECT OrderItemId FROM order_items WHERE UserId = $_SESSION[UserId] AND InCart = 'NO';";
    $result = mysqli_query($conn, $query) or die($conn -> error);
    if($result -> num_rows > 0){
        while($row = $result->fetch_assoc()){
            $_SESSION['orderItem'] = $row['OrderItemId'];
            array_push($orders, $_SESSION['orderItem']);
        }
        foreach($orders as $orderItem){
            $sql = "UPDATE `order_items` SET `InCart` = 'YES' WHERE `order_items`.`OrderItemId` = $orderItem;";
            insert($sql, " ");
        }
    }
    $orderItems = implode(",", $orders);
    $total = getTotalForCart();
    $sql = 'INSERT INTO orders (UserId, OrderItemsIds, Total, `Payment Method`, PickUpTime, Completed) VALUES (' .$_SESSION['UserId']. ',"' .$orderItems. '", ' .$total. ',"' .$pay. '", "'.$_POST['time']. '",  "NO");';
    insert($sql, "<h5>Your order is placed successfully</h5>");
}

//Read placed orders of users in client portal
function viewOrdersInClient(){
    $conn = connect(); 
    $sql = "SELECT users.UserId, orders.OrderId, orders.Total, orders.`OrderDateTime`, orders.`Payment Method`, orders.PickUpTime FROM users JOIN orders WHERE users.UserId = orders.UserId";
    $results = mysqli_query($conn, $sql) or die($conn->error);
    if($results -> num_rows > 0){
        while($row = $results->fetch_assoc()){
            if($row['UserId'] == $_SESSION['UserId']){
                $_SESSION["OrderId"] = $row['OrderId'];
                $_SESSION["Total"] = $row['Total'];
                $_SESSION["OrderTime"] = $row['OrderDateTime'];
                $_SESSION["PickTime"] = $row['PickUpTime'];
                $_SESSION["Pay"] = $row['Payment Method'];
                echo "<div class='orderSect'><div><div><p><span>Order Reference No.: &nbsp;&nbsp;</span>" .$_SESSION["OrderId"]. "</p><p><span>Order Date: &nbsp;&nbsp;</span>" .$_SESSION["OrderTime"]. "</p><p>";
                getRespectiveOrderItem($_SESSION['OrderId'], $_SESSION['UserId'], "image");
                echo "</p><p><span>Total: &nbsp;&nbsp;</span>Ksh. ".$_SESSION["Total"]. ".00</p><p><span>Payment Method: &nbsp;&nbsp;</span>" .$_SESSION["Pay"]. "</p><p><span>Pickup Time: &nbsp;&nbsp;</span>" .$_SESSION["PickTime"]. "</p></div></div></div>";
            }  
        }  
    }
    else{
        echo "<p  style='color: var(--grey); font-size: 1.5em; margin-left: 10%;'> No placed orders </p>";
    }     
}

//Read respective users and placed orders in admin portal
function viewOrdersInAdmin(){
    $conn = connect(); 
    $sql = "SELECT users.UserId, users.FirstName, users.LastName, users.PhoneNo, orders.OrderId, orders.Total, orders.`OrderDateTime`, orders.`Payment Method`, orders.PickUpTime, orders.Completed FROM users JOIN orders WHERE users.UserId = orders.UserId AND orders.Completed = 'NO'";
    $results = mysqli_query($conn, $sql) or die($conn->error);
    if($results -> num_rows > 0){
        while($row = $results->fetch_assoc()){
            $_SESSION["uId"] = $row['UserId'];
            $_SESSION["fName"] = $row['FirstName'];
            $_SESSION["lName"] = $row['LastName'];
            $_SESSION["pNo"] = $row['PhoneNo'];
            $_SESSION["ttl"] = $row['Total'];
            $_SESSION["oTime"] = $row['OrderDateTime'];
            $_SESSION["pTime"] = $row['PickUpTime'];
            $_SESSION["pMeth"] = $row['Payment Method'];
            echo "<div class='orderSect'><div><div><h4>" .$_SESSION["fName"]. " " .$_SESSION["lName"]. "</h4><h5>0" .$_SESSION["pNo"]. "</h5></div><div><h5>" .$_SESSION["oTime"].
            "</h5><p>Order Reference No." .$_SESSION["OrderId"]. "</p><h5>"; 
            getRespectiveOrderItem($row['OrderId'], $_SESSION["uId"], "");
            echo "</h5><h5><span>Total: </span>Ksh. ".$_SESSION["ttl"]. ".00</h5><h5><span>Payment Method: </span>" .$_SESSION["pMeth"]. "</h5><h5><span>Pickup Time: </span>" .$_SESSION["pTime"]. "</h5></div></div>
            <a class='action' href='complete-order.php?id=$row[OrderId]'>Mark Order as Completed</a></div>";
        }   
    }
    else{
        echo "<p  style='color: var(--grey); font-size: 1.5em; margin-left: 10%;'> No placed orders </p>";
    }     
}

//Get the respective order item from the orders details
function getRespectiveOrderItem($orderId, $userId, $image){
    $conn = connect();
    $query = 'SELECT OrderItemsIds FROM orders JOIN users WHERE orders.OrderId = '. $orderId. ' AND orders.UserId = ' .$userId;
    $result = mysqli_query($conn, $query) or die($conn->error);
    if($result -> num_rows > 0){
        while($row = $result->fetch_assoc()){
            $orderItems = explode(",", $row['OrderItemsIds']);
            foreach($orderItems as $orderItem){
                $query = 'SELECT MenuName, MenuImage, order_items.Quantity, order_items.Total FROM menu_items JOIN order_items WHERE menu_items.MenuId = order_items.MenuId AND order_items.OrderItemId ='. $orderItem;
                $result = mysqli_query($conn, $query) or die($conn->error);
                if($result -> num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $_SESSION['quant'] = $row['Quantity'];
                        $_SESSION['price'] = $row['Total'];
                        $_SESSION['menu'] = $row['MenuName'];
                        if($image == "image"){
                            echo '<img src="data:image/jpeg;base64,'.base64_encode($row['MenuImage'] ).'" height="200" width="200"/>&nbsp;&nbsp;&nbsp;&nbsp;';
                        }
                        echo $_SESSION['quant']. " ". $_SESSION['menu'] . " &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ksh." .$_SESSION['price']. ".00<br>";
                    }
                }
            }
        }
    }
}

//Get the number of items in the client's menu
function countItems(){
    $conn = connect();
    inCart();
    $sql = "SELECT COUNT(order_items.OrderItemId) FROM order_items JOIN menu_items WHERE order_items.UserId = $_SESSION[UserId] AND order_items.MenuId = menu_items.MenuId AND order_items.InCart = 'NO'";
    $result = mysqli_query($conn, $sql);     
    $row = mysqli_fetch_row($result); 
    echo $row[0];
}
?>