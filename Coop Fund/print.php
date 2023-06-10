<?php
require("connection.php");

$total = 0;

$sid = 1;
$sql = 'select * from coopfund where society_Society_ID="' . $sid . '" ORDER BY date DESC LIMIT 1;';

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

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Document</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <center>
        <h1><?php echo $sname; ?></h1>
    </center>
    <h2>විඝණන වර්ෂය :</h2>
    <h2><?php echo $date; ?></h2><br>
    <h2>අරමුදලේ ආරමිභක ශේෂය :</h2>
    <h2><?php echo $st_balance; ?></h2><br>
    <h2>ලාභය හෝ අලාභය :</h2>
    <h2><?php echo $p_or_loss; ?></h2><br>


    <center>
        <h2 class="nm">ගෙවීමි තොරතුරු </h2>
    </center>

    <table width="50%">
        <tr>
            <th width="200px">Voucher</th>
            <th width="200px">Amount</th>
            <th width="200px">Type</th>
            <th width="200px">Date</th>
        </tr>
    </table>
    <?php
    $sql = 'SELECT * FROM payment WHERE society_Society_ID="' . $sid . '" AND date>' . $date . ';';
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            $total = $total + $row['amount'];
            echo '
    <table width="50%">
        <tr>
            <td width="200px">' . $row['invoice'] . '</td>
            <td width="200px">' . $row['amount'] . '</td>
            <td width="200px">' . $row['type'] . '</td>
            <td width="200px">' . $row['date'] . '</td>
        </tr>
    </table>';
        }
    }

    echo '<br><h2>Total Payments : ' . $total . '</h2>';


    // $sid=$_GET['sid'];
    $sql = 'select * from coopfund where society_Society_ID="' . $sid . '" ORDER BY date DESC LIMIT 1;';

    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $amount = $row['Starting_balance'];
    }

    echo '<br><h2>Balance : ' . $amount - $total . '</h2>';


    ?>


</body>

</html>