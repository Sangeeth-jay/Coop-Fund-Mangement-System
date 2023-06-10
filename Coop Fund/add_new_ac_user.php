<?php
include("connection.php");

$acid = $_REQUEST['acid'];
$uname = $_REQUEST['uname_new_ac_user'];
$password = $_REQUEST['password_new_ac_user'];
$loged_uname = $_REQUEST['uname'];
$loged_password = $_REQUEST['password'];

$sql = "INSERT ignore INTO coopfund.user VALUES('','$uname','$password',$acid);";
$result=mysqli_query($conn, $sql);

if($result){
    header("location:headoffice.php");
}

?>
