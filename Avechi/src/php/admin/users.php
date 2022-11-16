<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="../admincss/sty.css"></link>
  </head>
<div >
  <h2>Users</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">id</th>
        <th class="text-center">First Name</th>
        <th class="text-center">Last Name</th>
        <th class="text-center">Email</th>
        <th class="text-center">Gender</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
     
     
 

    require_once("connect.php");
  
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

   