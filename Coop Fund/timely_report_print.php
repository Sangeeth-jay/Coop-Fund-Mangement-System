<?php
        require("connection.php");

        $i=0;
        $sid=$_REQUEST['society_id'];
        $date1=$_REQUEST['date1'];
        $date2=$_REQUEST['date2'];

        $total=0;

        $sql = 'select * from coopfund where society_sid="' . $sid . '" ORDER BY date DESC LIMIT 1;';

        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
        
            $date = $row['date'];
            $st_balance = $row['Starting_balance'];
            $p_or_loss = $row['profit_loss'];
        };

        $sql2 = 'select * from coopfund.society where sid="' . $sid . '";';
        $result2 = mysqli_query($conn, $sql2);
        while ($row = mysqli_fetch_assoc($result2)) {
            $sname = $row['Society_name'];
        }

        if ($p_or_loss>0){
            $p_amount=$p_or_loss*10/100;
        }
        else{
            $p_amount=5;
        }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Timely Report</title>
    <link rel="stylesheet" type="text/css" href="styles/print.css" media="print">

    <style>
      ul{
        list-style: none;
      }
      li{
        margin: 1.5%;
      }
      table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    body{
        font-family:  Courier, monospace;
      }

    </style>
  </head>
  <body>
    <u><h2><center>Society Timely-Payment Report</center></h2></u><br><br>
    <ul>
      <li>Society Name : <?php echo $sname ?></li>
      <li>Year : <?php echo $date ?></li>
      <li>Starting Balance of Fund : <?php echo $st_balance ?></li>
      <li>Loss or Profit : <?php echo $p_or_loss ?></li>
      <li>Amount According to Profit : <?php echo $p_amount ?></li>
    </ul>

    <hr width="90%">

    <center><h3>Payments</h3></center>
    <center><table width="95%">
      <tr>
          <th width="20%">Voucher</th>
          <th >Amount</th>
          <th width="20%">Type</th>
          <th width="30%">Date</th>
      </tr>
      </table></center>

<?php      
      $sql3 = "select * from coopfund.payment where date between '".$date1."' and '".$date2."' and society_Society_ID = '".$sid."';";

      $result3=mysqli_query($conn,$sql3);
  
  
      if(mysqli_num_rows($result3)>0){
          while($row=mysqli_fetch_assoc($result3)){
              
            $total=$total+$row['amount'];
            if($i < 13){  
                echo '<center><table width="95%">
                        <tr>
                            <td width="20%">'.$row['invoice'].'</td>
                            <td>'.$row['amount'].'</td>
                            <td width="20%">'.$row['type'].'</td>
                            <td width="30%">'.$row['date'].'</td>
                        </tr>
                      </table> </center>';
                $i++;
            }
            else{
              echo '<center><table width="95%">
                      <tr>
                          <td width="20%">'.$row['invoice'].'</td>
                          <td>'.$row['amount'].'</td>
                          <td width="20%">'.$row['type'].'</td>
                          <td width="30%">'.$row['date'].'</td>
                      </tr>
                    </table> </center>';

              $i=0;
              echo '&nbsp;';
            }
          }
        }
?> 
            <br><hr width="90%">

        <br><center><h3>Total Payments According to Selected time period : <?php echo $total ?></h3></center>
        <center><button type="button" onclick="window.print()" id="print" style=" font-size: large; width: 13em; height: 2em; border-radius: 8px; background-color: #0386f8; cursor: pointer; color: #fff; border-color: #92c8ec;">Print</button></center>

    </body>
</html>

