<?php 
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: index.php");
    die;
}else{
    require_once("db.php");
    //  Przez to że to działa ajaxem trzeba passować ten index w ten sposób
    if(isset($_GET['index'])){
        $_SESSION['index'] = $_GET['index'];
    }
}

/* 
Legenda do GET['n']:
Pierwsza cyfra - od czego jest kwerenda:
1 - karty
2 - dodatki
3 - użytkownicy

Druga cyfra - co robi:
1 - dodaje nowy rekord
2 - edytuje rekord
3 - usuwa rekord

TLDR tak jak w universal_admin_form.php
*/

if(isset($_GET["n"])){
    switch($_GET["n"]){
        case 13:
            require_once("queries/karty_del_query.php");
            break;
        case 23:
            require_once("queries/dodatki_del_query.php");
            break;
        case 33:
            require_once("queries/uzytkownicy_del_query.php");
            break;    
        case 43:
            require_once("queries/zamowienia_del_query.php");
            break;    
        case 53:
            require_once("queries/dostawy_del_query.php");
            break;    
        case 63:
            require_once("queries/platnosci_del_query.php");
            break;   
        case 73:
            require_once("queries/posts_del_query.php");
            break;   
        case 83:
            require_once("queries/sites_del_query.php");
            break;  
        default:
            die;
    }
}else{
    header("Location: index.php");
    die;
}
?>
