<?php
require_once("header.php");
if(isset($_SESSION['user_id'])){
    require_once("db.php");
    require_once("navbar.php");
}else{
    header("Location: login.php");
}
$_SESSION['user_id'];
?>
<hr>
<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item nav-links">
                    <a class="nav-link" href="#" onclick="getOrders()">Zamówienia</a>
                </li>
                <li class="nav-item nav-links">
                    <a class="nav-link" href="#" onclick="getAccForm()">Konto</a>
                </li>
            </ul>
        </div>
    </div>
</nav> -->
<main class="container mt-4">
    <div id="ajax-ret">
        <!-- Tutaj ajax ze skryptu -->
    </div>
</main>
<script src='js/user_panel.js'></script>
<?php
    require_once("footer.php");
?>