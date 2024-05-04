<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login page</title>
</head>

<body>
    <div id="form">
        <h1>Online library</h1>

    <form action="login.php" method="post">
        <input type="text" name="login" maxlength="30" placeholder="Login">
        <input type="password" name="pass" maxlength="32" placeholder="Password">
        <input type="hidden" value="user" name="upr">
        <input type="submit" value="Log in">
    </form>

    <?php

    if(@$_POST["login"]==null || $_POST["pass"]==null){
        echo "";
    }else if(isset($_POST["login"]) && isset($_POST["pass"])){

    $s="localhost";
    $u="root";
    $p="";
    $d="biblioteka";

    $login=$_POST["login"];
    $pas=$_POST["pass"];
    $pass=md5($_POST["pass"]);
    $upr=$_POST["upr"];

    $conn=mysqli_connect($s,$u,$p,$d);

    $sql="SELECT * FROM users WHERE login='$login' AND pass='$pass'";
    $result=mysqli_query($conn,$sql);
    
    if(mysqli_num_rows($result) > 0 ){
        $_SESSION['logged'] = true;

        $row = mysqli_fetch_assoc($result);

        $_SESSION['user'] = $row['login'];
        $_SESSION['upr'] = $row['upr'];

        header('Location: index.php');
    }else{
        $_SESSION['logged'] = false;
        $_SESSION['user'] = "";
        $_SESSION['upr'] = "";

        echo mysqli_error($conn);
        echo mysqli_connect_error();
        echo "Wrong login or password";

    

    mysqli_close($conn);
    }
    
}
    ?>

</div>

<div id="new">
    <h3>Make an account</h3>
<input type="button" onclick="location.href='rejestracja.php';" value="Sign up" />
</div>
</body>
</html>
