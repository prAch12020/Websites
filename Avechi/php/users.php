<?php 
require_once 'config.php';
include_once 'templates/header.php';
?>
<main><br><br><br><br>
  <div >
  <h1>Users</h1>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">ID</th>
        <th class="text-center">First Name</th>
        <th class="text-center">Last Name</th>
        <th class="text-center">Email</th>
        <th class="text-center">Gender</th>
        <th class="text-center" colspan="2">Actions</th>
      </tr>
    </thead>
    <?php
     
      $sql="SELECT * from tbl_users ";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    
        
        ?>
     
    <tr>
      <td><?=$count?></td>
             
      <td><?=$row['first_name']?></td>
      <td><?=$row['last_name']?></td>      
      <td><?=$row['email']?></td> 
      <td><?=$row['gender']?></td>  
    
    <td> <a href="edit_user.php?edit=<?php echo $row['user_id'];?>" class= "edit-btn"  style="height:20px">Edit</a></td>
      <td> <a href="delete_user.php?delete=<?php echo $row['user_id'];?>" class="del-btn"style="height:20px">Delete</a></td>
       
       
      <?php
            $count=$count+1;
          }
        }
      ?>
  </table>

  
  
</div>
</div>
                <div class="edit_and_delete">

                </div>

   