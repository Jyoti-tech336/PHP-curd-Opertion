<?php
include'conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
 <h3 align=center>Registration Details</h3>
  <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">USER_ID</th>
      <th scope="col">USERNAME</th>
      <th scope="col">EMAIL</th>
      <th scope="col">PASSWORD</th>
   
    <th scope="col">ADDRESS</th>
    <th scope="col">CITY</th>
      <th scope="col">HOBBIES</th>
        <th scope="col">D.O.B</th>
          <th scope="col">GENDER</th>
          <th scope="col">IMAGE</th>
          <th>UPDATE</th>
          <th>DELETE</th>
    </tr>
  </thead>
  <tbody>
   <?php
      $fetch1="select * from resgistration_form";
      $result=mysqli_query($conn,$fetch1);
      while($row=mysqli_fetch_assoc($result))
      {
          ?>
     
    <tr>
      <th scope="row"><?php echo $row['user_id'];?></th>
      <td><?php echo $row['name'];?></td>
      <td><?php echo $row['email'];?></td>
      <td><?php echo $row['password'];?></td>
      <td><?php echo $row['address'];?></td>
      <td><?php echo $row['city'];?></td>
      <td><?php echo $row['hobbies'];?></td>
      <td><?php echo $row['date_of_birth'];?></td>
      <td><?php echo $row['Gender'];?></td>
       
        <td><img src="<?php echo $row['image']; ?>" width="100" height="100"></td>
       
      <td><button class="btn btn-success"><a style="color:white;" href="update.php?id=<?php echo $row ['user_id'];?>">UPDATE</a></button></td>
    <td><button class="btn btn-danger"><a style="color:white;" href="regdelete.php?delid=<?php echo $row['user_id'];?>">DELETE</a></button></td>
    
    </tr>
    <?php
     }
      
      ?>
</tbody>
</table> 
</div> 
</body>
</html>