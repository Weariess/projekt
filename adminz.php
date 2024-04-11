<?php
session_start();
?>
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

$login=$_POST['login'];
$sqll="SELECT * FROM users WHERE login='$login'";

$results=mysqli_query($conn,$sqll);

if(mysqli_num_rows($results) > 0){
    $ro = mysqli_fetch_assoc($results);

    $name = $ro['imie'];
    $sur = $ro['nazwisko'];
    $upr = $ro['upr'];
}else{
    echo "ups";
    mysqli_close($conn);
}




$sql="SELECT upr FROM users WHERE login='$login'";


echo "<div id='konto'>";

echo "<h2>Username</h2></br><h3>" . $login . "</h3></br><h2>Name</h2></br><h3>" . $name . "</h3></br><h2>Surname</h2></br><h3>" 
.$sur. "</h3></br><h2>Permissions</h2></br><h3>" .$upr. "</h3></br>";


if($upr=="user"){
    echo '<form action="zztowork.php" method="post">
    <input type="hidden" value="'.$login.'" name="login">
    <input type="submit" value="change to worker">
    </form>';
}else if($upr=="work"){
    echo '<form action="zztouser.php" method="post">
    <input type="hidden" value="'.$login.'" name="login">
    <input type="submit" value="change to user">
    </form>';
}






echo "</div>";


?>

<input type="button" onclick="location.href='admin.php';" value="Go back" />


</body>
</html>