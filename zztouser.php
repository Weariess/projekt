<?php
session_start();

$login=$_POST['login'];

$s="localhost";
$u="root";
$p="";
$d="biblioteka";

$conn=mysqli_connect($s,$u,$p,$d);
$sql="UPDATE `users` SET `upr`='user' WHERE login='$login';";

if(mysqli_query($conn,$sql)){
    header('Location: admin.php');
}else{
    header('Location: zout.php');
}

mysqli_close($conn);
?>