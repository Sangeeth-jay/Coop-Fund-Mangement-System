<?php
    include("connection.php");

    $sid=$_GET['aa'];
    $date1=$_GET['date1'];
    $date2=$_GET['date2'];

    $total=0;
    $amount=0;
    $p_amount=0;

    $sql = "select * from coopfund.payment where date between '".$date1."' and '".$date2."' and society_Society_ID = '".$sid."';";

    $result=mysqli_query($conn,$sql);


    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            
            $total=$total+$row['amount'];
            echo'
            
            <center><table border="1" width="76%" style="margin-left: 15px;">
                    <tr>
                        <td width="200px">'.$row['invoice'].'</td>
                        <td width="200px">'.$row['amount'].'</td>
                        <td width="200px">'.$row['type'].'</td>
                        <td width="200px">'.$row['date'].'</td>
                    </tr>
            </table> </center>';
            
        }
    } 

    echo '<br><center><h2>මුලු මුදල : '.$total.'</h2></center>';


    $sql2='select * from coopfund where society_sid="'.$sid.'" ORDER BY date DESC LIMIT 1;';

    $result2=mysqli_query($conn,$sql2);

    while($row=mysqli_fetch_assoc($result2)){
        $amount=$row['Starting_balance'];
        $p_amount=$row['pl_amount'];
    }

    echo '<br><center><h2>ගෙවිය යුතු ඉතිරි මුදල : '.($amount+$p_amount) - $total.'</h2></center>';
?>

