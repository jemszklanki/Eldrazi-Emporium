<?php
require_once("header.php"); //  ik, ik, weird as fuck ale musi zaczac sesje zanim sprawdzi czy jest admin
if(isset($_SESSION['admin'])){
    require_once("db.php");
    require_once("navbar.php");
} else{
    header("Location: index.php");
    die;
}
?>

<p>Chuj dupa kurwa cipa</p>

<?php 
    require_once("footer.php");
?>