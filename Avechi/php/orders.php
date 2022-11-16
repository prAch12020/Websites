<?php 
require_once 'config.php';
$conn = connect();
include_once 'templates/header.php';
?>
<main><br><br><br><br>
  <div >
  <h1>Orders</h1>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">Order ID</th>
        <th class="text-center">Product ID</th>
        <th class="text-center">Quantity</th>
        <th class="text-center">Order Status</th>
        <th class="text-center">Payment Type</th>
        <th class="text-center">Order Total</th>
      </tr>
    </thead>
    <?php
     
      $sql="SELECT * from tbl_order JOIN tbl_orderdetails WHERE tbl_order.order_id = tbl_orderdetails.order_id; ";
      $result = mysqli_query($conn, $sql);
      if(mysqli_num_rows($result)){
        while($row = mysqli_fetch_array($result)){
    
        
        ?>
     
    <tr>
             
      <td><?=$row['order_id']?></td>
      <td><?=$row['product_id']?></td>     
      <td><?=$row['order_quantity']?></td>      
      <td><?=$row['order_status']?></td> 
      <td><?=$row['payment_type']?></td>  
      <td><?=$row['orderdetails_total']?></td>  
    
    
      <?php
            
          
        }}
      ?>
  </table>

  
  
</div>
</div>
                <div class="edit_and_delete">

                </div>

   