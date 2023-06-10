<?php
    include("connection.php");

    $acid=$_GET['acid'];
    $date1=$_GET['date3'];
    $date2=$_GET['date4'];

    $total=0;

    $sql="select s.Society_name, sum(p.amount) from coopfund.payment p, coopfund.society s where date between '".$date1."' and '". $date2 ."' and s.sid=p.society_Society_ID and society_AC_office_idAC_office='".$acid."' GROUP BY society_Society_ID;";
    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            
            $total=$total+$row['sum(p.amount)'];
            echo'
            
            <center><table border="1" width="76%" style="margin-left: 15px;">
                    <tr>
                        <td width="250px">'.$row['Society_name'].'</td>
                        <td width="150px">'.$row['sum(p.amount)'].'</td>

                    </tr>
            </table> </center>';
            
        }
    } 

    echo '<br><center><h2>මුලු මුදල : '.$total.'</h2></center>';

?>