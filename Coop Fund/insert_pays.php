<?php

require ('connection.php');

$uname=$_GET['uname1'];
$password=$_GET['password1'];

$sid=$_GET['society_id'];
$invoice=$_GET['invoice'];
$amount=$_GET['amount'];
$type=$_GET['type'];
$date=$_GET['date'];
$acid=$_GET['acid'];





$sql='INSERT ignore INTO payment VALUES ('.$invoice.', '.$amount.',"'.$type.'","'.$date.'", '.$sid.', '.$acid.');';


$result=mysqli_query($conn,$sql);

if($result){

    header("location:acdoffice1.php?uname1=$uname&password1=$password");
}

?>