<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
<div id="pasek">
<?php
    echo "<h1>".$_SESSION['user']."</h1>";

    echo '<input id="go" type="button" onclick="location.href=`index.php`;" value="Go back">';


?>
</div>

<div id="wyp">
<?php

    $s="localhost";
    $u="root";
    $p="";
    $d="biblioteka";


    $conn=mysqli_connect($s,$u,$p,$d);

    $user = $_SESSION['user'];

    $sql="SELECT tytul, autor, datawyp FROM `wypozyczenia`,`users`,`ksiazki` WHERE idu=users.id AND ksiazki.idk=wypozyczenia.idk AND users.login='$user';";

    $result=mysqli_query($conn,$sql);

    if (mysqli_num_rows($result) > 0){

        for($i=0;$i<mysqli_num_rows($result);$i++){

            $row = mysqli_fetch_assoc($result);
            echo "<div class='ksiazki'><h2>".$row['tytul']."</h2> <h2>".$row['autor']."</h2> <h3>".$row['datawyp']."</h3></div>";
            
        }
        


    }else{
        echo "YOU DON'T HAVE ANY BOOKS BORROWED";
    }

?>
</div>

<div id="historia">
</div>


    
</body>
</html>