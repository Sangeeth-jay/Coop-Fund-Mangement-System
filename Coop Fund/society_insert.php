<?php
    include("connection.php");

    $rNo=$_REQUEST['rNo'];
    $sName=$_REQUEST['sName'];
    $acid=$_REQUEST['acid'];

    $uname=$_REQUEST['uname'];
    $password=$_REQUEST['password'];

    $sql="INSERT ignore INTO coopfund.society VALUES ('','$rNo','$sName',$acid);";
    $result=mysqli_query($conn,$sql);

    if($result){
        header("location:headoffice.php?uname2=$uname&password2=$password");
    }
?>