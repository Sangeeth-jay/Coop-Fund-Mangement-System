<?php
    session_start();
    require('connection.php');

    $username=$_REQUEST['uname1'];
    $password=$_REQUEST['password1'];



    $sql = 'SELECT * FROM coopfund.user where username="'.$username.'" and password="'.$password.'";';
    $result=mysqli_query($conn,$sql);

    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['uname']=$row['username'];
            $_SESSION['pass']=$row['password'];

            $_SESSION['state']=$row['state'];
        }
    }

    if ($_SESSION['state']<=3){
        if($username==$_SESSION['uname'] && $password==$_SESSION['pass']){
            header("location:acdoffice1.php");
        }
        else{
            echo '<script>alert("Incorrect Username and Password!")</script>';
            header("location:index.php");
        }
    }else{
        if($username==$_SESSION['uname'] && $password== $_SESSION['pass']){
            header("location:headoffice.php");
        }
        else{
            echo '<script>alert("Incorrect Username and Password!")</script>';
            header("location:index.php");
        }
    }
?>