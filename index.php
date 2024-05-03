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

        //DIV PASEK
        echo "<div id='pasek'>";

        echo $_SESSION['user'];
        echo '<input type="button" onclick="location.href=`wyloguj.php`;" value="Log out">';
        echo '<input type="button" onclick="location.href=`profil.php`;" value="Profile">';

        echo "</div>";

        //DIV KSIAZKI
        echo "<div id='ksiazki'>";

        $s="localhost";
        $u="root";
        $p="";
        $d="biblioteka";


        $conn=mysqli_connect($s,$u,$p,$d);



        $sql="SELECT * FROM `ksiazki`";
        $result=mysqli_query($conn,$sql);


        if (mysqli_num_rows($result) > 0){

        //sprawdzanie czy istnieje ten user, nadawanie id usera do nastepnego kroku
        $user = $_SESSION['user'];
        $sqll="SELECT id FROM `users` WHERE login = '$user'";
        $results=mysqli_query($conn,$sqll);

        

        if (mysqli_num_rows($results) > 0){

            
           for($i=0;$i<mysqli_num_rows($results);$i++){

            $roww = mysqli_fetch_assoc($results);
            $idu = $roww['id'];
            
           }
        }else{
            echo "0 results";}
        //Div z książkami i przycisk

            
           for($i=0;$i<mysqli_num_rows($result);$i++){

            $row = mysqli_fetch_assoc($result);
            echo "<div class='book'>" . $row['tytul'] . " " . $row['autor'] . "<form action='iindex.php' method='post'>
            <input type='hidden' value='".$row['idk']."' name='idk'>
            <input type='hidden' value='$idu' name='idu'>
            <input type='submit' value='Borrow'>
            </form></div> </br>";
           }

           echo "</div>";


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