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

    $sql="SELECT idw, tytul, autor, datawyp, dataod FROM `wypozyczenia`,`users`,`ksiazki` WHERE idu=users.id AND ksiazki.idk=wypozyczenia.idk AND users.login='$user' AND wypozyczenia.dataod is NULL;";

    $result=mysqli_query($conn,$sql);

    if (mysqli_num_rows($result) > 0){

        for($i=0;$i<mysqli_num_rows($result);$i++){

            $row = mysqli_fetch_assoc($result);
            echo "<div class='ksiazki'><h2>".$row['tytul']."</h2> <h2>".$row['autor']."</h2> <h3>".$row['datawyp']."</h3>
            <form action='profil.php' method='post'>
                <input type='hidden' value='".$row['idw']."' name='id'>
                <input type='submit' value='Give back'>
            </form>
            </div>";
            
        }
        


    }else{
        echo "YOU DON'T HAVE ANY BOOKS BORROWED";
    }

    if(isset($_POST['id'])){

        $id = $_POST['id'];
        $date = date("Y-m-d");

        $sqll = "UPDATE `wypozyczenia` SET `dataod`='$date' WHERE idw = $id";

        if(mysqli_query($conn,$sqll)){
            header('Location: profil.php');
        }else{
            echo "ups";
        }

    }

?>
</div>

<div id="historia">
</div>

    
</body>
</html>