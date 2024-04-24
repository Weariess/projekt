<?php
session_start();

    $s="localhost";
    $u="root";
    $p="";
    $d="biblioteka";

    $idk = $_POST['idk'];
    $idu = $_POST['idu'];

    $conn=mysqli_connect($s,$u,$p,$d);
    

    $sql="INSERT INTO `wypozyczenia`(`idu`, `idk`, `zatw`, `odda`) VALUES ('$idu','$idk',false,false);";
    

    $results=mysqli_query($conn,$sql);
        if($results){
            header('Location: index.php');
        }else{
            echo "Błąd";
        }


    mysqli_close($conn);
?>