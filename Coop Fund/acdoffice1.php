<?php
session_start();
include("connection.php");

if ($_SESSION['state'] == 4) {
    header("location:index.php");
}

$acid = $_SESSION['state'];

$uname = $_SESSION['uname'];
$pass =  $_SESSION['pass'];

$total = 0;
$p_amount = 0;
$sid = 0;




$sql2 = "SELECT * FROM ac_office where idAC_office='" . $acid . "';";
$result2 = mysqli_query($conn, $sql2);
if (mysqli_num_rows($result2)) {
    while ($row = mysqli_fetch_assoc($result2)) {
        $acname = $row['office_name'];
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AC Office</title>
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="styles/acoffice.css">
    <script src="js/jquery.min.js"></script>

</head>

<body>
    <div class="con"></div>
    <header>
        <div class="coop">
            <div>
                <h2>Co-Operative Development Department</h2>
                Southern
            </div>
            <div>
                <section></section>
                <section></section>
                <section></section>
            </div>
        </div>

    </header>

    <div class="main">

        <div class="side-nav">
            <center> <img src="images/user.png" alt="" width="65%" id="uid">
            </center>
            <br>
            <center><label for="User"><?php echo $uname; ?></label>
            </center><br>
            <center><label for=""><?php echo $acname; ?></label><br></center><br>

            <center>
                <hr class="tp-hr">
            </center>

            <br />
            <div class="tab-container">
                <ol>
                    <li data-value="Tab1" id="tab1" class="selected">Main</li>
                    <li data-value="Tab2" id="tab2">Timely Report</li>
                    <li data-value="Tab3" id="tab3">Full Payments</li>
                    <!-- <li data-value="Tab4" id="tab4">Fund Report</li> -->
                    <!-- <li data-value="Tab5" id="tab5">Tab5</li> -->
                </ol>
            </div>
            <br />
            <center>
                <hr class="bt-hr">
            </center>
            <form action="index.php">
                <center><input type="submit" value="Log out" class="log-btn"> </center>
            </form>
            <div class="revery">
                <h6>powered by<br></h6>
                <img src="images/revery.png" alt="" srcset="" width="75px">
            </div>
        </div>

        <div class="Tab1">
            <!-- main -->

            <div class="tab-main">

                <br>
                <center>
                    <h2>ගෙවීම් ඇතුලත් කිරීම්</h2>
                </center><br>

                <?php
                $sql = "SELECT * from society where AC_office_idAC_office = '" . $acid . "';";
                $reqult = mysqli_query($conn, $sql);
                ?>


                <form action="insert_pays.php" method="get">
                    <div class="dtadd">
                        <div class="lbl">
                            <div>
                                <label for="">සමිතියේ නම -</label><br>
                            </div>
                            <div>
                                <label for="">රිසිටි පත් අංකය - </label><br>
                            </div>
                            <div> <label for="" id="">මුදල - </label><br>
                            </div>
                            <div><label for="">ගෙවූ ආකාරය - </label><br>
                            </div>
                            <div> <label for="">දිනය - </label>
                            </div>

                        </div>
                        <div class="inpts">
                            <input type="text" placeholder="Search Society here..." id="aa" required>
                            <div id="response"></div>
                            <input type="hidden" name="sid" id="sid" value="">

                            <input type="text" id="innvoice" name="invoice" required><br>
                            <input type="text" id="amount" name="amount" required><br>
                            <select name="type" id="type" class="type">
                                <option value="by Cheque">by Cheque</option>
                                <option value="by Cash">by Cash</option>
                            </select><br>
                            <input type="date" id="date" name="date" required><br>


                        </div>
                    </div>
                    <center><input type="submit" value="Add Payment" class="addbtn"></center>
                    <input type="hidden" name="society_id" id="ma_in_sid">

                    <input type="hidden" name="acid" <?php echo 'value="' . $acid . '"' ?>>
                    <input type="hidden" name="uname1" <?php echo 'value="' . $uname . '"' ?>>
                    <input type="hidden" name="password1" <?php echo 'value="' . $password . '"' ?>>

                </form>


                <center>
                    <hr>
                </center>

                <div class="dtshow">
                    <br>
                    <center>
                        <h2 class="nm">ගෙවීමි තොරතුරු </h2>
                    </center>

                    <center>
                        <table border="1" width="95%">
                            <tr>
                                <th width="200px">Voucher</th>
                                <th width="200px">Amount</th>
                                <th width="200px">Type</th>
                                <th width="200px">Date</th>
                            </tr>
                        </table>
                        <div class="scroll-bg">
                            <div class="scroll-div">
                                <div class="result2" id="result2"></div>
                            </div>
                        </div>
                    </center>
                    <form action="society_report_print.php" method="post" target="_blank">
                        <input type="hidden" name="society_id" id="in_sid">

                        <center><input type="submit" value="Print" class="print"></center>
                    </form>
                </div>


            </div>
            <div class="sview">
                <div class="auto" id="result1">


                </div>
                <br>
                <center>
                    <hr>
                </center><br>
                <div class="new">
                    <form action="new_found_year.php" method="get">
                        <input type="hidden" name="society_id" id="society_id">
                        <input type="hidden" name="acid" <?php echo 'value="' . $acid . '"' ?> id="acid">
                        <input type="hidden" name="uname1" <?php echo 'value="' . $uname . '"' ?>>
                        <input type="hidden" name="password1" <?php echo 'value="' . $password . '"' ?>>


                        <center><input type="submit" value="Add New" id="addnewbtn"></center>
                    </form>
                </div>

            </div>

        </div>
        <div class="Tab2">
            <div class="tform-container">
                <br>
                <center>
                    <h2>කාල පරාසයකට අදාළව ගෙවීම්</h2>
                </center>
                <div class="tform-date">
                    <input type="date" name="date1" id="date1">
                    <input type="date" name="date2" id="date2">
                </div>
                <div class="tform-btn">
                    <button class="" onclick="myFunction2()">Search</button>
                </div>
                <center>
                    <div class="tform-result">
                        <table border="1" width="75%">
                            <tr>
                                <th width="200px">Voucher</th>
                                <th width="200px">Amount</th>
                                <th width="200px">Type</th>
                                <th width="200px">Date</th>
                            </tr>
                        </table>
                    </div>
                    <div class="scroll-bg">
                        <div class="scroll-div">
                            <div class="tform-result-a" id="tform-result-a"></div>
                        </div>
                    </div>
                    <form action="timely_report_print.php" method="post" target="_blank">
                        <input type="hidden" name="society_id" id="print_sid">
                        <input type="hidden" name="date1" id="pdf_date1">
                        <input type="hidden" name="date2" id="pdf_date2">
                        <center><input type="submit" value="Print" class="print"></center>

                    </form>
                </center>
            </div>


        </div>

        <input type="hidden" name="acid" id="acid" value="">


        <div class="Tab3">
            <div class="fform-container">
                <br>
                <center>
                    <h2>සම්පූර්ණ ගෙවීම් විස්තරය</h2>
                </center>
                <div class="fform-date">
                    <input type="date" name="" id="date3">
                    <input type="date" name="" id="date4">
                </div>
                <div class="fform-btn">
                    <button class="" onclick="myFunction3()">Search</button>
                </div>
                <center>
                    <div class="fform-result">
                        <table border="1" width="75%">
                            <tr>
                                <th width="250px">සමිතිය</th>
                                <th width="150px">ගෙවූ මුදල</th>

                            </tr>

                        </table>
                    </div>
                    <div class="scroll-bg">
                        <div class="scroll-div">
                            <div class="fform-result-a" id="fform-result-a"></div>
                        </div>
                    </div>
                </center>
                <form action="Full_payments_report_print.php" method="post" target="_blank">
                    <input type="hidden" name="acid" id="print_acid">
                    <input type="hidden" name="date1" id="print_d1">
                    <input type="hidden" name="date2" id="print_d2">
                    <center><input type="submit" value="Print" class="print"></center>

                </form>

            </div>

        </div>







    </div>

    <!-- autocomplete -->
    <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#aa").keyup(function() {
                var query = $("#aa").val();

                if (query.length > 0) {
                    $.ajax({
                        url: 'autocomplete.php',
                        method: 'POST',
                        data: {
                            search: 1,
                            q: query
                        },
                        success: function(data) {
                            $("#response").html(data);
                        },
                        dataType: 'text'
                    });
                }
            });

            $(document).on('click', 'li', function() {
                var society = $(this).text();
                $("#aa").val(society);
                $("#response").html("");
                console.log($(this).attr('data-sid'));
                $("#in_sid").val($(this).attr('data-sid'));
                $("#ma_in_sid").val($(this).attr('data-sid'));
                $("#print_sid").val($(this).attr('data-sid'));
                $("#society_id").val($(this).attr('data-sid'));

            });
        });
    </script>

    <!-- autocomplete -->

    <!-- ajax -->
    <script>
        var sid;

        function myFunction(id) {
            sid = id;
            const xhttp = new XMLHttpRequest();
            const xhttp2 = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("result1").innerHTML = this.responseText;
            }
            xhttp.open("GET", "auto.php?sid=" + sid);
            xhttp.send();

            xhttp2.onload = function() {
                document.getElementById("result2").innerHTML = this.responseText;

            }
            xhttp2.open("GET", "result2.php?sid=" + id);
            xhttp2.send();
        }

        function myFunction2() {
            console.log(sid);
            var idd1 = document.getElementById('date1').value;
            var idd2 = document.getElementById('date2').value;

            document.getElementById("pdf_date1").value = idd1;
            document.getElementById("pdf_date2").value = idd2;

            const xhttp3 = new XMLHttpRequest();
            xhttp3.onload = function() {
                document.getElementById("tform-result-a").innerHTML = this.responseText;
            }
            xhttp3.open("GET", "timely_report.php?aa=" + sid + "&date1=" + idd1 + "&date2=" + idd2);
            xhttp3.send();
        }

        function myFunction3() {
            var idd1 = document.getElementById('date3').value;
            var idd2 = document.getElementById('date4').value;
            var acid = document.getElementById('acid').value;

            document.getElementById("print_acid").value = acid;
            document.getElementById("print_d1").value = idd1;
            document.getElementById("print_d2").value = idd2;

            const xhttp3 = new XMLHttpRequest();
            xhttp3.onload = function() {
                document.getElementById("fform-result-a").innerHTML = this.responseText;
            }
            xhttp3.open("GET", "full_amount.php?date3=" + idd1 + "&date4=" + idd2 + "&acid=" + acid);
            xhttp3.send();

        }
    </script>
    <!-- ajax -->

        <!-- tabs -->
    <script type="text/javascript">
        $(document).ready(function() {
            $("#tab2").click(function() {
                $(this).addClass("selected").siblings().removeClass("selected");
                $(".Tab2").css("visibility", "visible");
                $(".Tab1").css("visibility", "hidden");
                $(".Tab3").css("visibility", "hidden");
                $(".Tab4").css("visibility", "hidden");
                $(".Tab5").css("visibility", "hidden");
            });
            $("#tab1").click(function() {
                $(this).addClass("selected").siblings().removeClass("selected");
                $(".Tab2").css("visibility", "hidden");
                $(".Tab1").css("visibility", "visible");
                $(".Tab3").css("visibility", "hidden");
                $(".Tab4").css("visibility", "hidden");
                $(".Tab5").css("visibility", "hidden");
            });
            $("#tab3").click(function() {
                $(this).addClass("selected").siblings().removeClass("selected");
                $(".Tab2").css("visibility", "hidden");
                $(".Tab1").css("visibility", "hidden");
                $(".Tab3").css("visibility", "visible");
                $(".Tab4").css("visibility", "hidden");
                $(".Tab5").css("visibility", "hidden");
            });
        });
    </script>

</body>

</html>