<?php

    require ('connection.php');
    $sid=$_GET['sid'];
    $total=0;
    $p_amount=0;
    

    $sql='select * from coopfund where society_sid="'.$sid.'" ORDER BY date DESC LIMIT 1;';
    $result=mysqli_query($conn,$sql);

    

    while($row=mysqli_fetch_assoc($result)){
        $date=$row['date'];
        // echo $date;
        // echo $sid;
    
        }


    $sql='SELECT * FROM payment WHERE society_Society_ID="'.$sid.'" AND date>'.$date.';';
    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            
            $total=$total+$row['amount'];
            echo'
            <table border="1" width="97%" style="margin-left: 1em;">
                    <tr>
                        <td width="200px">'.$row['invoice'].'</td>
                        <td width="200px">'.$row['amount'].'</td>
                        <td width="200px">'.$row['type'].'</td>
                        <td width="200px">'.$row['date'].'</td>
                    </tr>
            </table>';
            
        }
    }  
    
 
    
    echo '<br><h2>Total Payments : '.$total.'</h2>';


    $sid=$_GET['sid'];
    $sql='select * from coopfund where society_sid="'.$sid.'" ORDER BY date DESC LIMIT 1;';

    $result=mysqli_query($conn,$sql);

    while($row=mysqli_fetch_assoc($result)){
        $amount=$row['Starting_balance'];
    }

    $sid=$_GET['sid'];
    $sql='select * from coopfund where society_sid="'.$sid.'" ORDER BY date DESC LIMIT 1;';

    $result=mysqli_query($conn,$sql);

    while($row=mysqli_fetch_assoc($result)){
        $p_amount=$row['pl_amount'];


    }
    echo '<br><h2>Balance : '.($amount+$p_amount) - $total.'</h2>';


?>