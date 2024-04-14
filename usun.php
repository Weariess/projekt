<?php
session_start();

$login = $_POST['login'];

$s="localhost";
$u="root";
$p="";
$d="biblioteka";

$conn = mysqli_connect($s, $u, $p, $d);

if(!$conn){
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "DELETE FROM users WHERE login='$login'";

if (mysqli_query($conn, $sql)) {
    header('Location: admin.php');
} else {
  echo mysqli_error($conn);
}

mysqli_close($conn);
?>