<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
</head>

<body>

<?php

    if($_SESSION["upr"]=="user"){

        echo $_SESSION['user'];
        echo '<input type="button" onclick="location.href=`wyloguj.php`;" value="Log out">';




        $s="localhost";
        $u="root";
        $p="";
        $d="biblioteka";


        $conn=mysqli_connect($s,$u,$p,$d);

        $sql="SELECT * FROM `ksiazki`";
        $result=mysqli_query($conn,$sql);


        if (mysqli_num_rows($result) > 0){

            function wyp(){
                echo "lol";
               }
           for($i=0;$i<mysqli_num_rows($result);$i++){

            $row = mysqli_fetch_assoc($result);
            echo "<div class='book'>" . $row['tytul'] . " " . $row['autor'] . '<button id="'.$row["id"].'" onclick="wyp()"> </div> </br>';
           }



          }else{
            echo "0 results";
          }








    }else if($_SESSION["upr"]=="admin"){
        header('Location: admin.php');
    }
    else{
        header('Location: rejestracja.php');
    }

?>
    
    
    
    
</body>
</html>