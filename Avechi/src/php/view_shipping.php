<?php 
require_once 'config.php';
include_once 'templates/header.php';
?>
<main><br><br><br><br>
  <div >
  <h1>Shipping</h1>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">Shipping Detail ID</th>
        <th class="text-center">Order Id</th>
        <th class="text-center">Name</th>
        <th class="text-center">Phone</th>
        <th class="text-center">Street</th>
        <th class="text-center">City</th>
        <th class="text-center">Country</th>
        <th class="text-center" colspan="2">Actions</th>
      </tr>
    </thead>
    <?php
     
      $sql="SELECT * from tbl_shippingdetails ";
      $result=$conn-> query($sql);
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    
        
        ?>
     
    <tr>
             
      <td><?=$row['shippingdetail_id']?></td>
      <td><?=$row['order_id']?></td>      
      <td><?=$row['name']?></td> 
      <td><?=$row['phone']?></td>  
      <td><?=$row['street']?></td>      
      <td><?=$row['city']?></td> 
      <td><?=$row['country']?></td> 
    
    <?php
          }
        }
      ?>
  </table>

  
  
</div>
</div>
                <div class="edit_and_delete">

                </div>

   