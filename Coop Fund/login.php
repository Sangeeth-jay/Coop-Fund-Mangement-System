<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
      .container {
        display: flex;
        justify-content: center;
      }
      .main {
        border: 1px solid black;
        width: 21em;
        height: 12em;
        border-radius: 1em;
        padding: 1rem;
        display: flex;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
      }
      .lbl label {
        color: black;
        display: block;
        margin-top: 10px;
        margin-right: 10px;
        margin-bottom: 10px;
        font-size: 20px;
      }
      .inpts input {
        border: 2px solid #f0f0f0;
        border-radius: 4px;
        display: block;
        width: 100%;
        padding: 10px;
        font-size: 14px;
        margin-bottom: 1rem;
      }

      /* .uname{
            margin-bottom: 1rem;
        } */
      .btn {
        cursor: pointer;
        background-color: #3498db;
        border: 2px solid #3498db;
        border-radius: 4px;
        color: #fff;
        display: block;
        font-size: 16px;
        /* margin-top: 20px; */
        width: 80%;
        height: 40px;
        /* margin-bottom: 20px; */
        margin-left: 40px;
      }
      .btndiv{
        display: flex;
        justify-content: center;

      }

    </style>
  </head>
  <body>
    <center><h1>Log In</h1></center>
    <div class="container">
      <div class="main1">
        
        <div class="lbl">
          <label for="" class="uname">User Name :</label><br />
          <label for="">Password :</label>
        </div>
        <form action="">
          <div class="inpts">
            <input type="text" class="uname" id="uname"><br />
            <input type="text" id="password">
          </div>
          <div class="btndiv">
            <input type="submit" value="Log In" class="btn" />
          </div>
        </form>
    
      </div>
    </div>
  </body>
</html>
