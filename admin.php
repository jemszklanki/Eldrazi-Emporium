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

<main class="container mt-4">
    <button id="users" onclick="getForm(1)">Karty</button>
    <button id="cards" onclick="getForm(2)">Dodatki</button>
    <button id="expansions" onclick="getForm(3)">Użytkownicy</button>
    <div id="ajax-ret">
        <!-- Tutaj ajax ze skryptu -->
    </div>
</main>
<script src="js/admin_panel.js"></script>
<?php 
    require_once("footer.php");
?>