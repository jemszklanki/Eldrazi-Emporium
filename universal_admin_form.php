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
4 - zamówienia

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
if($_GET["n"] < 10){
    $_SESSION['lastPanel'] = $_GET["n"];
}else{
    $_SESSION['lastPanel'] = floor($_GET["n"]/10);
}

if(isset($_GET["n"])){
    switch($_GET["n"]){
        case 1:
            require_once("panels/karty.php");
            break;
        case 2:
            require_once("panels/dodatki.php");
            break;
        case 3:
            require_once("panels/uzytkownicy.php");
            break;
        case 4:
            require_once("panels/zamowienia.php");
            break;
        case 5:
            require_once("panels/dostawy.php");
            break;
        case 6:
            require_once("panels/platnosci.php");
            break;
        case 7:
            require_once("panels/posts.php");
            break;
        case 8:
            require_once("panels/sites.php");
            break;
        case 11:
            require_once("panels/karty_add.php");
            break;
        case 12:
            require_once("panels/karty_edit.php");
            break;
        case 13:
            require_once("panels/karty_del.php");
            break;
        case 21:
            require_once("panels/dodatki_add.php");
            break;
        case 22:
            require_once("panels/dodatki_edit.php");  
            break;
        case 23:
            require_once("panels/dodatki_del.php");
            break;
        case 32:
            require_once("panels/uzytkownicy_edit.php");  
            break;
        case 33:
            require_once("panels/uzytkownicy_del.php");
            break;
        case 42:
            require_once("panels/zamowienia_edit.php");  
            break;
        case 43:
            require_once("panels/zamowienia_del.php");
            break;
        case 51:
            require_once("panels/dostawy_add.php");
            break;
        case 52:
            require_once("panels/dostawy_edit.php");  
            break;
        case 53:
            require_once("panels/dostawy_del.php");
            break;
        case 61:
            require_once("panels/platnosci_add.php");
            break;
        case 62:
            require_once("panels/platnosci_edit.php");  
            break;
        case 63:
            require_once("panels/platnosci_del.php");
            break;
        case 71:
            require_once("panels/posts_add.php");
            break;
        case 72:
            require_once("panels/posts_edit.php");  
            break;
        case 73:
            require_once("panels/posts_del.php");
            break;
        case 81:
            require_once("panels/sites_add.php");
            break;
        case 82:
            require_once("panels/sites_edit.php");  
            break;
        case 83:
            require_once("panels/sites_del.php");
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
