<?php 
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: index.php");
    die;
}else{
    require_once("db.php");
}
if(isset($_GET["n"])){
    switch($_GET["n"]){
        case 1:
            echo "Karty";
            break;
        case 2:
            echo "Dodatki";
            break;
        
        case 3:
            echo "Użytkownicy";
            break;
            
    }
}else{
    header("Location: index.php");
    die;
}
?>
