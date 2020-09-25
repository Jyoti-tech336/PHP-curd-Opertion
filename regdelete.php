<?php
include'conn.php';
$id = $_GET['delid'];
$regdelete = "DELETE FROM `resgistration_form` WHERE user_id='$id'";

$exe=mysqli_query($conn,$regdelete);
if($exe){
    echo "<script>confirm('User Record deleted'); window.location.href='registration.php';</script>";
}
else"<script>alert('not delete')window.location.href='registration.php';</script>";
?>