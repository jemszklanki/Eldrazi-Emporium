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
<hr>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item nav-links">
                    <a class="nav-link" href="#" onclick="getForm(1)">Karty</a>
                </li>
                <li class="nav-item nav-links">
                    <a class="nav-link" href="#" onclick="getForm(2)">Dodatki</a>
                </li>
                <li class="nav-item nav-links">
                    <a class="nav-link" href="#" onclick="getForm(3)">Użytkownicy</a>
                </li>
                <li class="nav-item nav-links">
                    <a class="nav-link" href="#" onclick="getForm(5)">Opcje dostawy</a>
                </li>
                <li class="nav-item nav-links">
                    <a class="nav-link" href="#" onclick="getForm(6)">Opcje płatności</a>
                </li>
                <li class="nav-item nav-links">
                    <a class="nav-link" href="#" onclick="getForm(4)">Zamówienia</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<main class="container mt-4">
    <div id="ajax-ret">
        <!-- Tutaj ajax ze skryptu -->
    </div>
</main>
<script src="js/admin_panel.js"></script>
<?php 
    require_once("footer.php");
?>