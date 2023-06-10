<?php
require('connection.php');

$acid = $_REQUEST['acid'];
$year = $_REQUEST['year'];

$i=0;

$total_fund = 0;
$total_profit = 0;
$total_allocation = 0;

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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fund report</title>
    <!-- <link rel="stylesheet" type="text/css" href="styles/print.css" > -->

    <style type="text/css">
        ul {
            list-style: none;
        }

        li {
            margin: 1.5%;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        body {
            font-family: Courier, monospace;
        }

        @media print {


			button {
				display: none;
			}
		}

        
        
    </style>
</head>

<body>

    <center>
        <h1><u> අරමුදල් වාර්තාව </u></h1>
    </center>
    <br>
    <ul>
        <li>Assistant Commissioner Office : <?php 
                                            switch ($acid){
                                                case 1:
                                                    echo 'ගාල්ල';
                                                    break;
                                                case 2:
                                                    echo 'මාතර';
                                                    break;
                                                case 3:
                                                    echo 'හම්බන්තොට';
                                                    break;
                                                default:
                                                    echo 'All';
                                            }
                                             ?></li>
        <li>Selected Year : <?php
                            if ($year == '') {
                                echo 'Last Year of every society';
                            } else {
                                echo $year;
                            } ?></li>
    </ul>


    <center>
        <hr width="95%" style="margin-top: 1em; margin-bottom: 1em;">
    </center>
    <center>
        <table border="1" width="95%">
        <th width="20%">සමිතියේ නම</th>
            <th width="10%">වර්ෂය</th>
            <th width="13%">ආරම්භක ශේෂය</th>
            <th width="11%">ලාභය/අලාභය</th>
            <th width="10%">වෙන්කිරීම්</th>
            <th width="13%" >ආරම්භක ශේෂය + වෙන්කිරීම්</th>
            <th width="10%" >ගෙවූ මුදල</th>
            <th width="13%" >ශේෂය</th>

        </table>
    </center>

    <?php
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            $total_fund = $total_fund + $row['st_balance'];
            $total_profit = $total_profit + $row['profit'];
            $total_allocation = $total_allocation + $row['allowance'];


            echo '
                    <center>
                    <table border="1" width="95%">
                    <td width="20%">'.$row['Society_name'].'</td>
                    <td width="10%" style="text-align: center;">'.$row['date'].'</td>
                    <td width="13%" style="text-align: right;">'.$row['st_balance'].'</td>
                    <td width="11%" style="text-align: right;">'.$row['profit'].'</td>
                    <td width="10%" style="text-align: right;">'.$row['allowance'].'</td>
                    <td width="13%" style="text-align: right;" >'.$row['total'].'</td>
                    <td width="10%" style="text-align: right;" >'.$row['pays'].'</td>
                    <td width="13%" style="text-align: right;" >'.$row['final_balance'].'</td>
        
                    </table>
                    </center>
                    
                    ';
        }
    }


    ?>
        <center>
        <hr width="95%" style="margin-top: 1em; margin-bottom: 1em;">
    </center>
    <ul>
        <li><b> Total Fund amount :</b> <?php echo $total_fund ?>/=</li>
        <li><b> Total profit :</b><?php echo $total_profit ?>/=</li>
        <li><b> Total amount of Allocations (වෙන්කිරීම්) : </b><?php echo $total_allocation ?>/=</li>

    </ul>

    <center><button type="button" onclick="window.print()" id="print" style=" font-size: large; width: 13em; height: 2em; border-radius: 8px; background-color: #0386f8; cursor: pointer; color: #fff; border-color: #92c8ec;">Print</button></center>


    

</body>

</html>