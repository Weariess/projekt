<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="stylea.css">
</head>
<body>
<div id="all">
    <div id="up">
        <h1>ADMIN PAGE</h1>
        <input type="button" onclick="location.href=`wyloguj.php`;" value="Log out">

        
    
    </div>
<div id="down">

<?php

    $s="localhost";
    $u="root";
    $p="";
    $d="biblioteka";

    $conn=mysqli_connect($s,$u,$p,$d);

    $sql="SELECT * FROM `users` WHERE login != 'admin'";
    $result=mysqli_query($conn,$sql);


        if(mysqli_num_rows($result) > 0 ){
            
            for($i=0;$i<mysqli_num_rows($result);$i++){
                $row = mysqli_fetch_assoc($result);
                echo $row['login'] ." ". $row['upr'] . '<form action="adminz.php" method="post"> 
                <input type="hidden" name="login" value="'.$row['login'].'">
                <input type="submit" value="view"></form>';
            }

        }else{
            echo "ups";


        mysqli_close($conn);
        }

    

?>
    </div>
</div>
    
</body>
</html>