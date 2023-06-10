<?php

    require ('connection.php');

    

    $sid=$_GET['sid'];
    $sql='select * from coopfund where society_sid="'.$sid.'" ORDER BY date DESC LIMIT 1;';

    $result=mysqli_query($conn,$sql);

    while($row=mysqli_fetch_assoc($result)){

    echo'
        <h2>විඝණන වර්ෂය</h2><br>
        <label for="">'.$row['date'].'</label>
        <h2>අරමුදලේ ආරමිභක ශේෂය</h2><br>
        <label for="">'.$row['Starting_balance'].'</label>
        <h2>ලාභය හෝ අලාභය</h2><br>
        <label for="">'.$row['profit_loss'].'</label><br>
        <h2>අරමුදලට වෙන්කිරීම්</h2>
        <label for="">'.$row['pl_amount'].'</label><br>

        
        ';

    }



    

?>
