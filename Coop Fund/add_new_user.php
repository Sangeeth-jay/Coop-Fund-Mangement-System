<?php
include("connection.php");

$uname=$_REQUEST['uname_new_user'];
$password=$_REQUEST['password_new_user'];
$loged_uname=$_REQUEST['uname'];
$loged_password=$_REQUEST['password'];

$sql = "INSERT ignore INTO coopfund.user VALUES ('','$uname','$password',4);";
$result=mysqli_query($conn,$sql);

if($result){
    header("location:headoffice.php");
}


?>