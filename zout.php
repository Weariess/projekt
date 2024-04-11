<?php
session_start();


$_SESSION['logged'] = false;

$_SESSION['user'] = "";

$_SESSION['upr'] = "";

header('Location: login.php');

?>