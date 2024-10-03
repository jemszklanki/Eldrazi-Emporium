<?php
// Start sesji
session_start();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Eldrazi emporium</title>
</head>
<body>

<!-- Baner -->
<header class="banner">
    <h1>Witamy w Eldrazi Emporium</h1>
    <p>Twój one-stop shop dla kart MTG!</p>
</header>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Trading Cards</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item nav-links">
                    <a class="nav-link" href="cart.php">Koszyk</a>
                </li>
                <li class="nav-item nav-links">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item nav-links">
                    <a class="nav-link" href="register.php">Rejestracja</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Gł. sekcja -->
<main class="container mt-4">
    <h2 class="text-center">Wyróżnione</h2>
    <div class="row">
        <!-- Karta -->
        <div class="col-md-4">
            <div class="card">
                <img src="img/placeholder/dockside.jpg" class="card-img-top" alt="Placeholder">
                <div class="card-body">
                    <h5 class="card-title">Dockside Extortionist</h5>
                    <p class="card-text">TODO: Skrypt żeby pullować to z bazy, działający koszyk</p>
                    <a href="#" class="btn btn-primary">Do koszyka</a>
                </div>
            </div>
        </div>
        <!-- Powtórzona karta per potrzeba -->
        <div class="col-md-4">
            <div class="card">
                <img src="img/placeholder/manacrypt.jpg" class="card-img-top" alt="Placeholder">
                <div class="card-body">
                    <h5 class="card-title">Mana Crypt</h5>
                    <p class="card-text">TODO: Skrypt żeby pullować to z bazy, działający koszyk</p>
                    <a href="#" class="btn btn-primary">Do koszyka</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="img/placeholder/jeweledlotus.webp" class="card-img-top" alt="Placeholder">
                <div class="card-body">
                    <h5 class="card-title">Jeweled Lotus</h5>
                    <p class="card-text">TODO: Skrypt żeby pullować to z bazy, działający koszyk</p>
                    <a href="#" class="btn btn-primary">Do koszyka</a>
                </div>
            </div>
        </div>
    </div>
</main>

<footer class="text-center mt-4">
    <p>&copy; 2024 Eldrazi Emporium. All rights reserved.</p>
</footer>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
</body>
</html>