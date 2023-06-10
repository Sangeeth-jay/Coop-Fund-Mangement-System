<?php
    require('connection.php');

    // $uname=$_GET['uname1'];
    // $password=$_GET['password1']; 

    $sid=$_REQUEST['society_id'];
    $ac_id=$_REQUEST['ac_office_id'];
    $st_date=$_REQUEST['starting_date'];
    $st_balance=$_REQUEST['Starting_balance'];
    $proOlos=$_REQUEST['ProfitOloss'];


    
    if ($proOlos > 0){
        $present=$proOlos*(10/100);
       

        $sql='INSERT ignore INTO coopfund VALUES ("'.$st_date.'", '.$st_balance.', '.$proOlos.', '.$present.', '.$sid.', '.$ac_id.');';
        $result=mysqli_query($conn,$sql);

    }

   else{
        $present=5;

        $sql='INSERT ignore INTO coopfund VALUES ('.$st_date.', '.$st_balance.', '.$proOlos.', '.$present.', '.$sid.', '.$ac_id.');';
        $result=mysqli_query($conn,$sql);
   }

   if($result){
    header("location:acdoffice1.php");
}






?>