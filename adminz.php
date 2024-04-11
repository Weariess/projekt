<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify</title>
    <link rel="stylesheet" href="styleaz.css">
</head>
<body>


<?php

$s="localhost";
$u="root";
$p="";
$d="biblioteka";

$conn=mysqli_connect($s,$u,$p,$d);



$id=$_POST['id'];
$login=$_POST['login'];
$name=$_POST['name'];
$sur=$_POST['surname'];
$upr=$_POST['upr'];

echo $id,$login,$name,$sur,$upr;

?>


</body>
</html>