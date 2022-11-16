<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <body>
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
      include_once "config.php";
     
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
      <td><button class="btn btn-primary" style="height:40px" onclick="userEditForm('<?=$row['user_id']?>')">Edit</button></td>
      <td><button class="btn btn-danger" style="height:40px" onclick="itemDelete('<?=$row['user_id']?>')">Delete</button></td>
      </tr>
      <?php
            $count=$count+1;
          }
        }
      ?>
  </table>

 
  </div>
  <script type="text/javascript" src=".../avechi/assets/js/ajaxWork.js"></script> 
  
  <script type="text/javascript" src=".../avechi/assets/js/ajaxWork.js"></script> 
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
      </body>
      </html>
  

   