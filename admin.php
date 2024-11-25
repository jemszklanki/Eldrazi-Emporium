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
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group mr-2" role="group" aria-label="First group">
                <button type="button" class="btn btn-primary" id="users" onclick="getForm(1)">Karty</button>
                <button type="button" class="btn btn-primary" id="cards" onclick="getForm(2)">Dodatki</button>
                <button type="button" class="btn btn-primary" id="expansions" onclick="getForm(3)">Użytkownicy</button>
            </div>
        </div>    
                <div id="ajax-ret">
            <!-- Tutaj ajax ze skryptu -->
        </div>
    </div>
</main>
<script src="js/admin_panel.js"></script>
<?php 
    require_once("footer.php");
?>