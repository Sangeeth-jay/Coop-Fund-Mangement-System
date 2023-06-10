<?php
session_start();
require('connection.php');

$uname = $_REQUEST['uname1'];
$password = $_REQUEST['password1'];

$sid = $_REQUEST['society_id'];
$acid = $_SESSION['state'];

$total = 0;
$p_amount = 0;
$date = '';
$last_balance = 0;
$sname = '';

$sql = 'select * from coopfund where society_sid="' . $sid . '" ORDER BY date DESC LIMIT 1;';
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $date = $row['date'];
}

$sql1 = 'select * from coopfund.society where sid="' . $sid . '";';
$result1 = mysqli_query($conn, $sql1);

while ($row = mysqli_fetch_assoc($result1)) {
    $sname = $row['Society_name'];
}

$sql2 = 'SELECT * FROM payment WHERE society_Society_ID="' . $sid . '" AND date>' . $date . ';';
$result2 = mysqli_query($conn, $sql2);

if (mysqli_num_rows($result2) > 0) {
    while ($row = mysqli_fetch_assoc($result2)) {

        $total = $total + $row['amount'];
    }
}


$sql3 = 'select * from coopfund where society_sid="' . $sid . '" ORDER BY date DESC LIMIT 1;';
$result3 = mysqli_query($conn, $sql3);

while ($row = mysqli_fetch_assoc($result3)) {
    $amount = $row['Starting_balance'];
    $p_amount = $row['pl_amount'];
}

$last_balance = ($amount + $p_amount) - $total;

// echo $total.'<br>'.$p_amount.'<br>'.$date.'<br>'.$last_balance;


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <style>
        body {
            background-color: #82d2f7;
        }

        .main-container {
            padding: 2em;
            width: 50vw;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 2em;
            background-color: #fff;
        }

        .container {
            display: flex;
        }

        ul {
            list-style: none;
        }

        .lbl {
            margin-right: 5em;
        }

        ul li {
            margin-bottom: 1em;
            font-size: 1.5em;
        }

        .inpts {

            margin-right: 1em;
        }

        .inpts input {
            margin: 0.5em;
            width: 16em;

            font-size: 1.5em;
            border: 2px solid #f0f0f0;
            border-radius: 4px;
        }

        .add-new-btn {
            width: 15em;
            height: 2.5em;
            background-color: #0386f8;
            border-color: #92c8ec;
            border-radius: 10px;
            cursor: pointer;
            color: #fff;
            transition: all 0.2s ease-in-out;
            margin-top: 1em;
            margin-bottom: 2em;
            font-size: 1em;
        }
    </style>
</head>

<body>
    <div class="main-container">
        <form action="insert.php" method="post">
            <center>
                <h1 style="color: #b6c7d7;">Update Fund Details</h1>
            </center>

            <div class="container">
                <div class="lbl">
                    <ul>
                        <li><label for="">සමිතියේ නම - </label></li>
                        <li><label for="">දිනය - </label></li>
                        <li><label for="">ආරමිභක ශේෂය - </label></li>
                        <li><label for="">ලාභය හෝ අලාභය - </label></li>
                    </ul>
                </div>
                <div class="inpts">
                    <input type="text" name="s_name" id="" <?php echo 'value="' . $sname . '"' ?>><br>
                    <input type="hidden" name="society_id" <?php echo 'value="' . $sid . '"' ?>>
                    <input type="hidden" name="ac_office_id" <?php echo 'value="' . $acid . '"' ?>>
                    <input type="date" name="starting_date" id="" placeholder="Date here..." required><br>
                    <input type="text" name="Starting_balance" id="" <?php echo 'value="' . $last_balance . '"' ?>><br>
                    <input type="text" name="ProfitOloss" id="" placeholder="Profit or Loss here..." required>
                    <input type="hidden" name="uname1" <?php echo 'value="' . $uname . '"' ?>>
                    <input type="hidden" name="password1" <?php echo 'value="' . $password . '"' ?>>

                </div>
            </div>
            <center><input type="submit" value="Add" class="add-new-btn" /></center>
        </form>
    </div>
</body>

</html>