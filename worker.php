<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Worker page</title>
</head>
<body>

<div id='work'></div>


<div id='books'>

<?php

    $s="localhost";
    $u="root";
    $p="";
    $d="biblioteka";


    $conn=mysqli_connect($s,$u,$p,$d);

    $sql="SELECT * FROM `ksiazki` WHERE 1";

    $result=mysqli_query($conn,$sql);

    if (mysqli_num_rows($result) > 0){

        for($i=0;$i<mysqli_num_rows($result);$i++){
            
            $row = mysqli_fetch_assoc($result);

            if($row['dostepne']==1){
                echo "<div class='ksiazki'><h2>".$row['tytul']."</h2> <h2>".$row['autor']."</h2> <h3>On sale</h3>
                <form action='worker.php' method='post'>
                <input type='hidden' value='".$row['idk']."' name='id'>
                <input type='hidden' value='on' name='on'>
                <input type='submit' value='Make off-sale'>
                </form>
                </div>";
            }else{
                echo "<div class='ksiazki'><h2>".$row['tytul']."</h2> <h2>".$row['autor']."</h2> <h3>Off-sale</h3>
                <form action='worker.php' method='post'>
                <input type='hidden' value='".$row['idk']."' name='id'>
                <input type='hidden' value='off' name='off'>
                <input type='submit' value='Make on sale'>
                </form>
                </div>";

            }

            
        }
        


    }else{
        echo "";
    }

    if(isset($_POST['id'])){

        if(isset($_POST['on'])){
            $id = $_POST['id'];

        $sqll = "UPDATE `ksiazki` SET `dostepne`=0 WHERE idk = $id";

        if(mysqli_query($conn,$sqll)){
            header('Location: worker.php');
        }else{
            echo "ups";
        }
        }
        if(isset($_POST['off'])){
            $id = $_POST['id'];

        $sqlll = "UPDATE `ksiazki` SET `dostepne`=1 WHERE idk = $id";

        if(mysqli_query($conn,$sqlll)){
            header('Location: worker.php');
        }else{
            echo "ups";
        }
        }

    }else{
        "";
    }
?>

</div>
    
</body>
</html>