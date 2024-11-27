<?php 
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: index.php");
    die;
}else{
    require_once("db.php");
    //  Przez to że to działa ajaxem trzeba passować ten index w ten sposób
    //  Idk czy jest po co to unsetować w innych skryptach
    if(isset($_GET['index'])){
        $_SESSION['index'] = $_GET['index'];
    }
}

/* 
Legenda do GET['n']:
Pierwsza cyfra - od czego jest formularz:
1 - karty
2 - dodatki
3 - użytkownicy

Druga cyfra - co robi:
BRAK - wypisuje rekordy, menu
1 - dodaje nowy rekord
2 - edytuje rekord
3 - usuwa rekord

Przykłady:
2 - wypisuje dodatki z przyciskami do dodania, edycji, usuniecia
13 - usuwa wybraną kartę
21 - formularz do dodania dodatku
*/

if(isset($_GET["n"])){
    switch($_GET["n"]){
        case 1:
            require_once("panels/karty.php");
            break;
        case 2:
            echo "Dodatki";
            break;
        case 3:
            echo "Użytkownicy";
            break;
        case 11:
            require_once("panels/karty_add.php");
            break;
        case 12:
            require_once("panels/karty_edit.php");  //  TODO sprawdzaj czy admin, passuj do tych kurew i rob kwerende - unset po tym
            break;
        case 13:
            require_once("panels/karty_del.php");
            break;

        default:
            header("Location: index.php");
            die;
    }
}else{
    header("Location: index.php");
    die;
}
?>
