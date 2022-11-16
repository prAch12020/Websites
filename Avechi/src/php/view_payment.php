<?php 
require_once 'config.php';
include_once 'templates/header.php';
?>
<main><br><br><br><br>
  <div >
  <h1>Payments</h1>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">Payment Detail ID</th>
        <th class="text-center">Order Id</th>
        <th class="text-center">Shipping Id</th>
        <th class="text-center">Payment Details</th>
        <th class="text-center" colspan="2">Actions</th>
      </tr>
    </thead>
    <?php
     
      $sql="SELECT * from tbl_paymentdetails ";
      $result=$conn-> query($sql);
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    
        
        ?>
     
    <tr>
             
      <td><?=$row['paymentdetail_id']?></td>
      <td><?=$row['order_id']?></td>      
      <td><?=$row['shippingdetail_id']?></td> 
      <td><?=$row['payment_details']?></td>  
    
    <?php
          }
        }
      ?>
  </table>

  
  
</div>
</div>
                <div class="edit_and_delete">

                </div>

   