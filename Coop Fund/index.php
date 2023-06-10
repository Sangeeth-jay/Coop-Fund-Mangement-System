<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Log In</title>
  <script src="js/jquery.min.js"></script>
  <link rel="stylesheet" href="styles/background.css">
  <link rel="stylesheet" href="styles/index.css">

</head>

<body>

    <header>
      <img src="images/pngegg.png" alt="Government logo" width="4%">
      <h1>Co-operative Development Department</h1>
      <img src="images/logo.png" alt="Coop logo" width="5%" height="5%">
    </header>


  <div class="main"></div>
  <input type="submit" value="x" class="close">
  <div class="container">

    <div class="hoffice" id="btn1">
      <h1>කොමසාරිස් <br> කාර්යාලය</h1>
    </div>
    </a>

    <div class="acoffice" id="btn2">
      <h1>
        සහකාර කොමසාරිස් <br />
        කාර්යාලය
      </h1>
    </div>

  </div>
  <div class="container2">
    <div class="main2">
      <form action="log.php" method="get">
        <div class="username">
          <label for="" class="uname">User Name :</label>
          <input type="text" class="uname" id="uname1" name="uname1">
        </div>
        <div class="password">
          <label for="" class="pw">Password :</label>
          <input type="text" id="password1" name="password1">
        </div>
        <div class="btndiv">
          <input type="submit" value="Log In" class="btn" id="btn">

        </div>
      </form>

    </div>
  </div>

  <!-- <div class="container3">
    <div class="main3">
      <form action="log.php" method="get">
        <div class="username">
          <label for="" class="uname" >User Name :</label>
          <input type="text" class="uname" id="uname2" name="uname2">
        </div>
        <div class="password">
          <label for="" class="pw">Password :</label>
          <input type="text" id="password2" name="password2">
        </div>
        <div class="btndiv">
          <input type="submit" value="Log In" class="btn1" id="btn">

        </div>
      </form>

    </div>
  </div> -->


  <script type="text/javascript">
    $(document).ready(function() {
      $('#btn2').click(function() {
        $('.main2').css("visibility", "visible");
        $('.main').css("visibility", "visible");
        $('.close').css("visibility", "visible");
      });
      $('#btn1').click(function() {
        $('.main2').css("visibility", "visible");
        $('.main').css("visibility", "visible");
        $('.close').css("visibility", "visible");
      })
      $('.close').click(function() {
        $('.main3').css("visibility", "hidden");
        $('.main').css("visibility", "hidden");
        $('.main2').css("visibility", "hidden");
        $('.main').css("visibility", "hidden");
        $('.close').css("visibility", "hidden");

      })
    });
  </script>



</body>

</html>