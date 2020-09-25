<?php
include"conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration from</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <style>
    .form1{
	border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;

	display: flex;
	justify-content: center;
}
        .form-control {
    display: block; 
    width: 150%;
   
    font-size: 1rem;
    /* line-height: 1.25; */
    color: #464a4c;
    background-color: #fff;
            background-image: none;}
        .form-check-label {
     padding-left: 0;
    margin-bottom: 0;
    cursor: pointer;
}
    </style>
</head>
<body>
<?php
   if(isset($_POST['reg_submit'])){
       $name = $_POST['username'];
       $email = $_POST['email'];
       $pass = $_POST['password'];
       $address = $_POST['address'];
       $city = $_POST['city'];       
       $hobbies = $_POST['hobbies'];
       $hobb=implode(",",$hobbies);       
       $date = $_POST['dob'];
       $gender= $_POST['gender'];
        $image = $_FILES['image']['tmp_name'];
       
                       $filename = rand(100,200)."_".$_FILES['image']['name'];
	                   $location = "image/".$filename;
       
        $ext = explode('.',$filename);
        $ext = end($ext);
         $ae = array("jpg","png");
    if(!in_array($ae,$ext)){
        $err[0] = "Extension Not allowed";
    }
    if(!move_uploaded_file($image,$location)){
    $err[1]="please upload image again";
     }
 
       
 $insert = "INSERT INTO resgistration_form(name,email,password,address,city,hobbies,date_of_birth,Gender,image) VALUES('$name','$email','$pass','$address','$city','$hobb','$date','$gender','$location')";
      // echo $insert;
       $run=mysqli_query($conn,$insert);
       if($run){
           echo"<script>alert('Done!!!');</script>";
       }
       else{
           echo"<script>alert('unsuccessful')</script>";
       }

   }
    ?>
 
    <div class="container form1">
      
        <form action="" method="post" enctype="multipart/form-data">
         <h3 align="center">REGISTRATION FROM</h3><br>
  <div class="form-group">
    <label >NAME</label>
    <input type="name" class="form-control" name="username" placeholder="Enter Your Name">
   </div>
  <div class="form-group">
    <label >EMAIL</label>
    <input type="email" class="form-control" name="email" placeholder="abc@gmail.com">
   </div>
   
   <div class="form-group">
    <label >PASSWORD</label>
    <input type="password" class="form-control" name="password" placeholder="******">
   </div>
   
   <div class="form-group">
    <label >ADDRESS</label>
    <textarea type="text" rows="5" cols="10" class="form-control" name="address" placeholder="Enter your address"></textarea>
   
   </div>
   
   <div class="form-group">
    <label >CITY</label>
    <input type="text" class="form-control" name="city" placeholder="Enter your City">
   </div>
   
          
<div class="form-group">
<label >HOBBIES</label><br>
<input class="form-check-input form-check form-check-inline" type="checkbox" name="hobbies[]" id="" value="music">Listening Music
 <input class="form-check-input form-check form-check-inline" type="checkbox" name="hobbies[]" id="" value="read">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Reading
 <input class="form-check-input form-check form-check-inline" type="checkbox" name="hobbies[]" id="" value="write">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;writing
  </div>
   
<div class="form-group">
<label >D.O.B</label>
<input type="date" class="form-control" name="dob" ]>
</div>
   
<div class="form-group">
<label >GENDER</label><br>
<input type="radio" id="male" name="gender" value="male">
<label for="male">Male</label><br>
<input type="radio" id="female" name="gender" value="female">
<label for="female">Female</label><br>
   </div>
   <div class="form-group">
<label >IMAGE</label>
<input type="file" class="form-control" name="image" >
</div>
  
  <button type="submit" name="reg_submit" class="btn btn-primary">Submit</button>
</form>
    </div>
    <br>
    <br>
    <br>
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
    
    </tr>
    <?php
     }
      
      ?>
</tbody>
</table> 
</div> 
     
   
</body>
</html>