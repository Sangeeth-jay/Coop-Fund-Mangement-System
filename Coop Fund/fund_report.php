<?php 
    require ('connection.php');

    $acid = $_REQUEST['acid'];
    $year = $_REQUEST['year'];

    $total_fund=0;
    $total_profit=0;
    $total_allocation=0;

    if ($acid == 4 && $year == ''){
        // echo 'all society last year fund';
        $sql ='SELECT s.Society_name, MAX(c.date) AS date, ROUND(c.Starting_balance, 2) AS st_balance, ROUND(c.profit_loss, 2) AS profit, ROUND(c.pl_amount, 2) AS allowance, ROUND((c.Starting_balance + c.pl_amount), 2) AS total, SUM(p.amount) AS pays, (ROUND((c.Starting_balance + c.pl_amount), 2) - SUM(p.amount)) AS final_balance FROM society s JOIN coopfund c ON s.sid = c.society_sid LEFT JOIN payment p ON p.society_Society_ID = s.sid GROUP BY s.Society_name order by date asc;';
    }
    elseif($year == ''){
            // echo 'last year according to selected ac office';
            $sql ='SELECT s.Society_name, MAX(c.date) AS date, ROUND(c.Starting_balance, 2) AS st_balance, ROUND(c.profit_loss, 2) AS profit, ROUND(c.pl_amount, 2) AS allowance, ROUND((c.Starting_balance + c.pl_amount), 2) AS total, SUM(p.amount) AS pays, (ROUND((c.Starting_balance + c.pl_amount), 2) - SUM(p.amount)) AS final_balance FROM society s JOIN coopfund c ON s.sid = c.society_sid LEFT JOIN payment p ON p.society_Society_ID = s.sid WHERE c.society_AC_office_idAC_office = "'.$acid.'" GROUP BY s.Society_name order by date asc;';
        }
         elseif ($acid>=4){
                // echo 'all society according to selected year';
                $sql ='SELECT s.Society_name, c.date, ROUND(c.Starting_balance, 2) AS st_balance, ROUND(c.profit_loss, 2) AS profit, ROUND(c.pl_amount, 2) AS allowance, ROUND((c.Starting_balance + c.pl_amount), 2) AS total, SUM(p.amount) AS pays, (ROUND((c.Starting_balance + c.pl_amount), 2)-SUM(p.amount)) as final_balance FROM society s JOIN coopfund c ON s.sid = c.society_sid LEFT JOIN payment p ON p.society_Society_ID = s.sid  WHERE c.date between "'.$year.'-01-01" and "'.$year.'-12-31" GROUP BY s.Society_name;';
            }else{
                // echo 'selected year and selected ac';
                $sql='SELECT s.Society_name, c.date, ROUND(c.Starting_balance, 2) AS st_balance, ROUND(c.profit_loss, 2) AS profit, ROUND(c.pl_amount, 2) AS allowance, ROUND((c.Starting_balance + c.pl_amount), 2) AS total, SUM(p.amount) AS pays, (ROUND((c.Starting_balance + c.pl_amount), 2)-SUM(p.amount)) as final_balance FROM society s JOIN coopfund c ON s.sid = c.society_sid LEFT JOIN payment p ON p.society_Society_ID = s.sid  WHERE c.society_AC_office_idAC_office = "'.$acid.'" and c.date between "'.$year.'-01-01" and "'.$year.'-12-31" GROUP BY s.Society_name;';

            }
 //echo $sql;
    
            $result=mysqli_query($conn,$sql);

            if (mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){

                    $total_fund = $total_fund + $row['st_balance'];
                    $total_profit = $total_profit + $row['profit'];
                    $total_allocation = $total_allocation + $row['allowance'];
                            
                    echo '
                    <center>
                    <table border="1" width="96.3%" style="margin-left: 1em;">
                    <td width="20%">'.$row['Society_name'].'</td>
                    <td width="10%" style="text-align: center;">'.$row['date'].'</td>
                    <td width="13%" style="text-align: right;">'.$row['st_balance'].'</td>
                    <td width="11%" style="text-align: right;">'.$row['profit'].'</td>
                    <td width="10%" style="text-align: right;">'.$row['allowance'].'</td>
                    <td width="13%" style="text-align: right;">'.$row['total'].'</td>
                    <td width="13%" style="text-align: right;">'.$row['pays'].'</td>
                    <td width="10%" style="text-align: right;">'.$row['final_balance'].'</td>
        
        
                    </table>
                    </center>
                    
                    ';
                }
            }

            echo '<center><br><h2>තෝරාගත් දිනයන්ට අදාළව අරමුදලේ ශේෂය : '.$total_fund.'</h2>';
            echo '<br><h2>තෝරාගත් දිනයන්ට අදාළව සමිති මුලු ලාබය : '.$total_profit.'</h2>';
            echo '<br><h2>තෝරාගත් දිනයන්ට අදාළව මුලු අරමුදලට වෙන්කිරීම් : '.$total_allocation.'</h2></center>';

        
?>