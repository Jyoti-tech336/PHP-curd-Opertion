<?php
include"conn.php";
$id=$_GET['id'];
$select="select * from resgistration_form where user_id='$id'";
$exe=mysqli_query($conn,$select);
$fetch1= mysqli_fetch_array($exe);
$a=$fetch1["hobbies"];
$hobb=explode(",",$a);

if(isset($_POST['regup_submit'])){
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
 
    $regupdte="update resgistration_form set name ='$name',email='$email',password='$pass',address='$address',city='$city',hobbies='$hobb',date_of_birth='$date',Gender='$gender',image='$location' where user_id='$id'";
    $exe=mysqli_query($conn,$regupdte);
    if($exe){
         echo "<script>alert('User Update sucessful'); window.location.href='registration.php';</script>";

    }
    else{
         echo "<script>alert('User Update Unsucessful'); window.location.href='update.php';</script>";

    }
       
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
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
    <div class="container form1">
      
        <form action="" method="post" enctype="multipart/form-data">
         <h3 align="center">REGISTRATION FROM</h3><br>
           <div class="form-group">
    <label >USERNAME</label>
    <input type="text" class="form-control" name="userid"  value="<?php echo $fetch1['user_id'];?>">
   </div>
  <div class="form-group">
    <label >NAME</label>
    <input type="name" class="form-control" name="username" value="<?php echo $fetch1['name'];?>" >
   </div>
  <div class="form-group">
    <label >EMAIL</label>
    <input type="email" class="form-control" name="email" value="<?php echo $fetch1['email'];?>">
   </div>
   
   <div class="form-group">
    <label >PASSWORD</label>
    <input type="password" class="form-control" name="password" value="<?php echo $fetch1['password'];?>">
   </div>
   
   <div class="form-group">
    <label >ADDRESS</label>
    <textarea type="text" rows="5" cols="10" class="form-control" name="address" value=""><?php echo $fetch1['address'];?></textarea>
   
   </div>
   
   <div class="form-group">
    <label >CITY</label>
    <input type="text" class="form-control" name="city" value="<?php echo $fetch1['city'];?>">
   </div>
   
 <div class="form-group">
<label >HOBBIES</label><br>
<input class="form-check-input form-check form-check-inline" type="checkbox" name="hobbies[]" id="" value="music" <?php if(in_array("music",$hobb)){echo "checked";} ?>>Listening Music
 <input class="form-check-input form-check form-check-inline" type="checkbox" name="hobbies[]" id="" value="read" <?php if(in_array("read",$hobb)){echo "checked";} ?>> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;Reading
<input class="form-check-input form-check form-check-inline" type="checkbox" name="hobbies[]" id="" value="write"<?php if(in_array("write",$hobb)){echo "checked";} ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;writing
  </div>
   
<div class="form-group">
<label >D.O.B</label>
<input type="date" class="form-control" name="dob" value="<?php echo $fetch1['date_of_birth'];?>">
</div>
   
<div class="form-group">
<label >GENDER</label><br>
<input type="radio" id="male" name="gender" value="male" <?php if($fetch1['Gender']=='male'){echo "checked";} ?>>
<label for="male">Male</label><br>
<input type="radio" id="female" name="gender" value="female" <?php if($fetch1['Gender']=='female'){echo "checked";} ?>>
<label for="female">Female</label><br>
   </div>
   <div class="form-group">
<label >IMAGE</label>

<input type="file" class="form-control" name="image"  >
 <img src="<?php echo $fetch1['image']?>" width="200px">
</div>
  
  <button type="submit" name="regup_submit" class="btn btn-primary">Submit</button>
</form>
    </div>
    
    
</body>
</html>