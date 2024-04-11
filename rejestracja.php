<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="form">
    <h1 style="margin-bottom:0px;">Registration</h1>
    <h2 style="padding-bottom:20px;">Fill in the form to create an account</h2>


    <form action="rejestracja.php" method="post">

        <input type="text" name="login" maxlength="30" placeholder="Username"> <!--LOGIN-->

        <input type="password" name="pass" maxlength="32" placeholder="Password"> <!--PASSWORD-->

        <input type="text" name="name" maxlength="30" placeholder="Name"> <!--NAME-->

        <input type="text" name="sur" maxlength="35" placeholder="Surname"> <!--SURNAME-->

        <input type="hidden" value="user" name="upr">

        <input type="submit" value="Sign up">
    </form>

    <?php

    if(@$_POST["login"]==null || $_POST["pass"]==null || $_POST["name"]==null || $_POST["sur"]==null){

        echo "";
        
    }else{

    if(isset($_POST["login"]) && isset($_POST["pass"]) && isset($_POST["name"]) && isset($_POST["sur"])){

    $s="localhost";
    $u="root";
    $p="";
    $d="biblioteka";

    @$login=$_POST["login"];
    $pas=$_POST["pass"];
    $pass=md5($_POST["pass"]);

    $name=$_POST["name"];
    $sur=$_POST["sur"];
    $upr=$_POST["upr"];

    $conn=mysqli_connect($s,$u,$p,$d);
    

    $sql="INSERT INTO `users`(`id`, `login`, `pass`, `imie`, `nazwisko`, `upr`) VALUES ('[value-1]','$login','$pass','$name','$sur','$upr')";
    $sqll="SELECT * FROM users WHERE login='$login'";
    

    //Sprawdzanie czy login juz istnieje
    $result=mysqli_query($conn,$sqll);

    if(mysqli_num_rows($result) == 0 ){

        $results=mysqli_query($conn,$sql);
        if($results){
    
            header('Location: login.php');
        }else{
            echo "Błąd";
        }

    }else{

        echo "This username is taken, please use a different one!";
    }


    mysqli_close($conn);
    }
}
    ?>
    </div>

    <div id="new">
    <h3>You have an account?</h3>
    <input type="button" onclick="location.href='login.php';" value="Log in" />
    </div>

</body>
</html>