<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
/* information */
.container {
            width: 23em;
            height: 18em;
            background-color: rgb(191, 197, 197);
            border-radius: 25px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .container h2{
            margin-top: 5px;
        }

        .container label {
            font-size: 22px;
            margin-left: 30px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        #ab {
            margin-left: 40px;
            width: 220px;
            height: 20px;
        }

        #ac {
            margin-bottom: 20px;
            height: 20px;
            margin-left: -1px;
        }

        #ad {
            margin-bottom: 20px;
            width: 220px;
            margin-left: 10px;
            height: 20px;
        }

        #ae {
            width: 220px;
            margin-left: 75px;
            height: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <center>
            <h2>Information</h2>
        </center><br>
        <label for="">විඝණන වර්ෂය - </label>
        <label for="" id="ab">2016</label><br><br>
        <label for="">අරමුදලේ ආරමිභක ශේෂය - </label>
        <label for="" id="ac">1000.00</label><br><br>
        <label for="">ලාභය හෝ අලාභය - </label>
        <label for="" id="ad">10.00</label><br><br>
        <label for="">ගෙවූ මුදල - </label>
        <label for="" id="ae">10.00</label>
    </div>
</body>
</html>