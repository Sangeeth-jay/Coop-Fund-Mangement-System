<?php
session_start();
include("connection.php");

if ($_SESSION['state']!=4){
  header("location:index.php");
}

$uname = $_SESSION['uname'];
$pass =  $_SESSION['pass'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Head Office</title>
  <link rel="stylesheet" href="styles/headoffice.css">
  <style>
    .log-btn {
      margin-top: 1em;
      width: 7em;
      height: 2em;
      background-color: #fff;
      border-color: #fff;
      border-radius: 6px;
      cursor: pointer;
      color: #0c2cbb;
      font-weight: bold;

    }



    .scroll-div {

      height: 250px;
      overflow: hidden;
      overflow-y: scroll;
    }

    .print {
      width: 10em;
      height: 1.5em;
      background-color: #0386f8;
      border-color: #92c8ec;
      border-radius: 10px;
      cursor: pointer;
      color: #fff;
      transition: all 0.2s ease-in-out;
      font-size: 1.5em;
      margin-left: 6px;
      margin-top: 0.5em;
    }

    .revery {
      color: #fff;
      position: absolute;
      top: 91vh;
      margin-left: 2.3em;
    }

    .revery h6 {
      font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
      font-size: 7px;
      margin-bottom: -3px;
    }
    .show_society .scroll-div-s{
      position: absolute;
      height: 250px;
      overflow: hidden;
      overflow-y: scroll;
      top: 26.5em;
      /* left: 42em; */
    }
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    .search-division{
      margin-top: 2em;
      display: flex;
      justify-content: center;
      gap: 15em;
    }
    .search-division select{
      width: 20em;
      height: 23px;
      margin-bottom: 0.75em;
      border: 2px solid #f0f0f0;
      border-radius: 4px;
     }
     #tab4-search{
      margin-left: 2em;
      margin-top: 1em;
      width: 20em;
      height: 2.5em;
      background-color: #0386f8;
      border-color: #92c8ec;
      border-radius: 10px;
      cursor: pointer;
      color: #fff;
      transition: all 0.2s ease-in-out;
     }
  </style>
  <script src="js/jquery.min.js"></script>
</head>

<body>
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
  <div class="main-container">
    <div class="side-nav">
      <center>
        <img src="images/user.png" alt="" width="65%" id="uid" />
      </center>
      <br />
      <center>
        <label for="User">
          <?php echo $uname ; ?>
        </label>
      </center>
      <br />
      <!-- <center>
        <label for="">
          <?php echo $acname; ?>
        </label><br />
      </center> -->
      <br />

      <hr class="tp-hr" />
      <br />
      <div class="container">
        <ol>
          <li data-value="Tab1" id="tab1" class="selected">Add</li>
          <li data-value="Tab2" id="tab2">Timely Report</li>
          <li data-value="Tab3" id="tab3">Society Report</li>
          <li data-value="Tab4" id="tab4">Fund Report</li>
          <!-- <li data-value="Tab5" id="tab5">Tab5</li> --> 
        </ol>
      </div>
      <br />

      <hr class="bt-hr" />
      <form action="index.php">
      <center><input type="submit" value="Log out" class="log-btn"></center>
      </form>
      <div class="revery">
        <h6>powered by<br></h6>
        <img src="images/revery.png" alt="" srcset="" width="75px">
      </div>

    </div>
    <div class="middle-container">
      <div class="Tab1">
        <div class="one">
          <h1 style="
                text-align: center;
                margin-top: 0.75em;
                margin-bottom: 0.75em;
              ">
            Add New Society
          </h1>
          <form action="society_insert.php" method="post">
            <div class="form">
              <div class="lbl">
                <label for="">AC Ofice Name:</label><br /><br />
                <label for="">Registered No :</label><br /><br />
                <label for="">Society Name :</label>
              </div>
              <div class="inpt">
                <select name="acid" id="aacid" onchange="society()">
                  <option value="1">ගාල්ල</option>
                  <option value="2">මාතර</option>
                  <option value="3">හම්බන්තොට</option>
                </select><br />
                <input type="text" name="rNo" id="" placeholder="Registered No..." required><br />
                <input type="text" name="sName" id="" placeholder="Society Name..." required>
                <input type="hidden" name="uname" <?php echo 'value="' . $uname . '"' ?>>
                <input type="hidden" name="password" <?php echo 'value="' . $pass . '"' ?>>

              </div>
            </div>
            <center>
              <input type="submit" value="Add" class="society-add-btn" />
            </center>
          </form>
          <center>
            <hr style="width: 90%;margin-top: 2.5em;margin-bottom:2.3em">
          </center>
          <div class="show_society">
            <h1 style="color: #dde2e2; display: flex; justify-content: center; margin-top: 25%;">Select Society</h1>
            <div class="scroll-bg">
              <div class="scroll-div-s">
                <div class="society_names" id="society_names"></div>

              </div>
            </div>
          </div>

        </div>
        <div class="two">
          <h1 style="text-align: center; margin: 0.75em">New User</h1>
          <form action="add_new_user.php" method="post">
            <div class="new-user-form">
              <label for="">User Name :</label><br />
              <input type="text" name="uname_new_user" id="" placeholder="username" required><br />
              <label for="">Password</label><br />
              <input type="text" name="password_new_user" id="" placeholder="Password" required>
              <input type="hidden" name="uname" <?php echo 'value="' . $uname . '"' ?>>
              <input type="hidden" name="password" <?php echo 'value="' . $pass . '"' ?>>

            </div>
            <center>
              <input type="submit" value="Add" class="user-add-btn" />
            </center>
          </form>
          <center>
            <hr style="width: 90%;margin-top: 2.5em;">
          </center>
          <h1 style="text-align: center; margin: 0.75em">AC Office New User</h1>
          <form action="add_new_ac_user.php" method="post">
            <div class="new-user-form">
              <label for="">AC Office: </label><br>
              <select name="acid" id="acid" style="    width: 20em; height: 23px; margin-bottom: 0.75em; border: 2px solid #f0f0f0; border-radius: 4px;">
                <option value="1">ගාල්ල</option>
                <option value="2">මාතර</option>
                <option value="3">හම්බන්තොට</option>
              </select><br>

              <label for="">User Name :</label><br />
              <input type="text" name="uname_new_ac_user" id="" placeholder="username" required><br />
              <label for="">Password</label><br />
              <input type="text" name="password_new_ac_user" id="" placeholder="Password" required>
              <input type="hidden" name="uname" <?php echo 'value="' . $uname . '"' ?>>
              <input type="hidden" name="password" <?php echo 'value="' . $pass . '"' ?>>

            </div>
            <center>
              <input type="submit" value="Add" class="user-add-btn" />
            </center>
          </form>


        </div>
        <div class="three">
        <center><h1 style="color: #dde2e2; display: flex; justify-content: center; margin-top: 65%;">This Feature Not Available</h1></center>

        </div>
      </div>
      <div class="Tab2">
        <u><h1 style="text-align: center; margin: 0.75em">කාල-පරාසයකට අදාළව සහකාර කොමසාරිස් කාර්යාලයක වාර්තාව</h1></u>
        <!-- <form action="" method="POST"> -->
        <center>

          <select name="acid_tab3" id="acid_tab3">
            <option value="1">ගාල්ල</option>
            <option value="2">මාතර</option>
            <option value="3">හම්බන්තොට</option>
            <option value="4">All</option>
          </select>
        </center>
        <div class="date">
          <input type="date" name="date1" id="date1" required>
          <input type="date" name="date2" id="date2" required>
        </div>
        <center>
          <input type="submit" value="Search" class="tab2-search-btn" onclick="timelyReport()">
        </center>
        <!-- </form> -->
        <center>
          <hr>
        </center>
        <center>
          <table border="1" width="75%">
            <tr>
              <th width="100px">ලියාපදිංචි අංකය</th>
              <th width="250px">සමිතිය</th>
              <th width="150px">ගෙවූ මුදල</th>

            </tr>

        </center>
        </table>
        <div class="scroll-bg">
          <div class="scroll-div">
            <div class="timely-report-result" id="timely-report-result"></div>

          </div>
        </div>

        <form action="Full_payments_report_print.php" method="get" target="_blank">
          <input type="hidden" name="acid" id="print_acid">
          <input type="hidden" name="date1" id="print_d1">
          <input type="hidden" name="date2" id="print_d2">
          <center><input type="submit" value="Print" class="print"></center>

        </form>


      </div>
      <div class="Tab3">
        <u><h1 style="text-align:center ;margin: 0.75em;">කාල-පරාසයකට අදාළව සමිතියක වාර්තාව</h1></u>
        <center>

          <input type="text" id="aa" class="society" placeholder="Search here...">
          <div id="response" class="response"></div>
          <input type="hidden" name="" id="sid">
        </center>
        <div class="date">
          <input type="date" name="" id="date3" required>
          <input type="date" name="" id="date4" required>
        </div>
        <center>
          <input type="submit" value="Search" class="tab3-search-btn" onclick="societyReport()">
        </center>
        <center>
          <hr>
        </center>
        <center>
          <table border="1" width="75%">
            <tr>
              <th width="200px">Voucher</th>
              <th width="200px">Amount</th>
              <th width="200px">Type</th>
              <th width="200px">Date</th>
            </tr>
          </table>
        </center>
        <div class="scroll-bg">
          <div class="scroll-div">
            <div class="society-timely-report-result" id="society-timely-report-result"></div>
          </div>
        </div>
        <form action="timely_report_print.php" method="post" target="_blank">
          <input type="hidden" name="society_id" id="print_sid">
          <input type="hidden" name="date1" id="pdf_date1">
          <input type="hidden" name="date2" id="pdf_date2">
          <center><input type="submit" value="Print" class="print"></center>

        </form>
      </div>
      <div class="Tab4">

          <u><center><h1 style="margin-top: 1em; margin-left: 1em;">අරමුදලේ වාර්තාව </h1></center></u>
          <div class="search-division">
            <div>
            <label for="">Search by AC office :</label>
            <select name="" id="acid2">
              <option value="1">ගාල්ල</option>
              <option value="2">මාතර</option>
              <option value="3">හම්බන්තොට</option>
              <option value="4">All</option>
            </select>
            </div>
            <div>
            <label for="">Search by Year :</label>
            <select name="" id="year">
              <option value="">Last</option>
              <option value="2019">2019</option>
              <option value="2020">2020</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
            </select>
            </div>
          </div>
          <center><button id="tab4-search" onclick="fund_report()">Search</button></center>
          <center><hr width="95%" style="margin-top: 1em; margin-bottom: 1em;"></center>
          <center>
        <table border="1" width="95%" >
            <th width="20%">සමිතියේ නම</th>
            <th width="10%">වර්ෂය</th>
            <th width="13%">ආරම්භක ශේෂය</th>
            <th width="11%">ලාභය/අලාභය</th>
            <th width="10%">වෙන්කිරීම්</th>
            <th width="13%" >ආරම්භක ශේෂය + වෙන්කිරීම්</th>
            <th width="13%" >ගෙවූ මුදල</th>
            <th width="10%" >ශේෂය</th>




        </table>
    </center>
          <div class="scroll-bg">
          <div class="scroll-div">
            <div class="fund-report-result" id="fund-report-result"></div>

          </div>
          <form action="fund_report_print.php" method="get" target="_blank">
            <input type="hidden" name="acid" id="acid_hidden">
            <input type="hidden" name="year" id="year_hidden">
          <center><input type="submit" value="Print" class="print"></center>
          </form>
        </div>

      </div>
      <div class="Tab5">
        <h1>tab5</h1>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente
        enim, reprehenderit placeat laboriosam omnis vel molestiae, libero nam
        praesentium rerum sequi assumenda culpa, voluptatem quas tenetur
        laudantium aperiam totam! Earum, inventore facilis blanditiis odio id
        voluptatum voluptate, perspiciatis sequi qui eligendi tenetur unde ad
        non aperiam suscipit, consequatur doloremque error.
      </div>
    </div>
  </div>

  <!-- autocomplete -->
  <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $("#aa").keyup(function() {
        var acid = $("#acid").val();
        var query = $("#aa").val();

        if (query.length > 0) {
          $.ajax({
            url: 'autocomplete2.php',
            method: 'POST',
            data: {
              search: 1,
              q: query,
              r: acid
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
        // console.log($(this).attr('data-sid'));
        $("#sid").val($(this).attr('data-sid'));
        // $("#ma_in_sid").val($(this).attr('data-sid'));
        $("#print_sid").val($(this).attr('data-sid'));

      });
    });
  </script>

  <!-- autocomplete -->


  <script type="text/javascript">

    function fund_report(){
      var acid = document.getElementById('acid2').value;
      var year = document.getElementById('year').value;

      document.getElementById("acid_hidden").value=acid;
      document.getElementById("year_hidden").value=year;
      
      const xhttp0 = new XMLHttpRequest();
      xhttp0.onload = function() {
        document.getElementById("fund-report-result").innerHTML = this.responseText;
      }
      xhttp0.open("GET","fund_report.php?acid="+ acid +"&year=" + year);
      xhttp0.send();
    }

    function timelyReport() {
      var idd1 = document.getElementById('date1').value;
      var idd2 = document.getElementById('date2').value;
      var acid = document.getElementById("acid_tab3").value;

      document.getElementById("print_acid").value = acid;
      document.getElementById("print_d1").value = idd1;
      document.getElementById("print_d2").value = idd2;

      const xhttp = new XMLHttpRequest();
      xhttp.onload = function() {
        document.getElementById("timely-report-result").innerHTML = this.responseText;
      }
      xhttp.open("GET", "head_office_timely_report.php?acid=" + acid + "&date1=" + idd1 + "&date2=" + idd2);
      xhttp.send();

    }

    function societyReport() {
      var sid = document.getElementById('sid').value;

      var idd3 = document.getElementById('date3').value;
      var idd4 = document.getElementById('date4').value;

      document.getElementById("pdf_date1").value = idd3;
      document.getElementById("pdf_date2").value = idd4;


      const xhttp2 = new XMLHttpRequest();
      xhttp2.onload = function() {
        document.getElementById("society-timely-report-result").innerHTML = this.responseText;
      }
      xhttp2.open("GET", "timely_report.php?aa=" + sid + "&date1=" + idd3 + "&date2=" + idd4);
      xhttp2.send();
    }

    function society(){
      var acid=document.getElementById('aacid').value;
      const xhttp3 = new XMLHttpRequest();
      xhttp3.onload=function(){
        document.getElementById("society_names").innerHTML=this.responseText;
      }
      xhttp3.open("GET","scoiety_names.php?acid="+acid);
      xhttp3.send();
    }

    // tab transforms
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
      $("#tab4").click(function() {
        $(this).addClass("selected").siblings().removeClass("selected");
        $(".Tab2").css("visibility", "hidden");
        $(".Tab1").css("visibility", "hidden");
        $(".Tab3").css("visibility", "hidden");
        $(".Tab4").css("visibility", "visible");
        $(".Tab5").css("visibility", "hidden");
      });
      $("#tab5").click(function() {
        $(this).addClass("selected").siblings().removeClass("selected");
        $(".Tab2").css("visibility", "hidden");
        $(".Tab1").css("visibility", "hidden");
        $(".Tab3").css("visibility", "hidden");
        $(".Tab4").css("visibility", "hidden");
        $(".Tab5").css("visibility", "visible");
      });
    });
  </script>
</body>

</html>



<!-- '; 

    }else{
  echo'Ivalid username or password';
}

?> -->