<?php
            require("connection.php");
    
            $acid=$_REQUEST['acid'];
            $date1=$_REQUEST['date1'];
            $date2=$_REQUEST['date2'];
            $acname='';

            $i=0;

            $sql;
            $total=0;

            $sql0='SELECT * FROM coopfund.ac_office where idAC_office ='.$acid.';';
            $result0=mysqli_query($conn,$sql0);

            while ($row = mysqli_fetch_assoc($result0)) {
              $acname = $row['office_name'];
          }
?>

<!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Full Payments Report</title>
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
        <u><h2><center>Full Payment Report</center></h2></u><br>
        <ul>
        <li>Assistant Commissioner Office : <?php echo $acname ?></li>
        <li>Time Period : <?php echo $date1 ?> to <?php echo $date2 ?></li>
  
      </ul>
  
      <hr width="90%">
      <center><h3>Payments</h3></center>
      <center><table width="95%">
        <tr>
            <th width="15%">Register No.</th>
            <th width="55%">Scociety Name</th>
            <th width="30%">Payments</th>
        </tr>
        </table></center>

<?php
  
            if ($acid<4){
                $sql="select s.Society_ID, s.Society_name, sum(p.amount) from coopfund.payment p, coopfund.society s where date between '".$date1."' and '". $date2 ."' and s.sid=p.society_Society_ID and society_AC_office_idAC_office='".$acid."' GROUP BY society_Society_ID;";
                $result=mysqli_query($conn,$sql);
            }
            else{
                $sql="select s.Society_ID, s.Society_name, sum(p.amount) from coopfund.payment p, coopfund.society s where date between '".$date1."' and '". $date2 ."' and s.sid=p.society_Society_ID GROUP BY society_Society_ID;";
                $result=mysqli_query($conn,$sql);
            }

            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    
                    $total=$total+$row['sum(p.amount)'];
                    if ($i < 12){
                    echo '<center><table width="95%">
                                    <tr>
                                        <td width="15%">'.$row['Society_ID'].'</td>
                                        <td width="55%">'.$row['Society_name'].'</td>
                                        <td width="30%" style="text-align: right;">'.$row['sum(p.amount)'].'</td>

                                    </tr>
                            </table> </center>
                            ';
                            $i++;
                    }
                    else{
                      echo '<center><table width="95%">
                                    <tr>
                                        <td width="15%">'.$row['Society_ID'].'</td>
                                        <td width="55%">'.$row['Society_name'].'</td>
                                        <td width="30%" style="text-align: right;">'.$row['sum(p.amount)'].'</td>

                                    </tr>
                            </table> </center>
                            ';
                            $i=0;
                            echo '&nbsp;';
                    }

                }}

?>
      
      <br><hr width="90%">
      <ul>
        <li >Total Payments : <?php echo $total ?></li>

      </ul>
      <center><button type="button" onclick="window.print()" id="print" style=" font-size: large; width: 13em; height: 2em; border-radius: 8px; background-color: #0386f8; cursor: pointer; color: #fff; border-color: #92c8ec;">Print</button></center>

  </body>
</html>

