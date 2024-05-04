<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="wylogujj.css">
    <title>Log out?</title>
</head>
<body>



<div>

    <h1>Are you sure you want to log out?</h1>
    <input id="yes" type="button" value="Yes" onclick="location.href='zout.php';">



    <input id="no" type="button" onclick="location.href='index.php';" value="No">

    

</div>




    
</body>
</html>