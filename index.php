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
                    <a class="nav-link" href="cart.html">Cart</a>
                </li>
                <li class="nav-item nav-links">
                    <a class="nav-link" href="login.html">Login</a>
                </li>
                <li class="nav-item nav-links">
                    <a class="nav-link" href="register.html">Register</a>
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
                <img src="path/to/card-image1.jpg" class="card-img-top" alt="Card Image 1">
                <div class="card-body">
                    <h5 class="card-title">Card Title 1</h5>
                    <p class="card-text">Description of card 1.</p>
                    <a href="product1.html" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
        <!-- Powtórzona karta per potrzeba -->
        <div class="col-md-4">
            <div class="card">
                <img src="path/to/card-image2.jpg" class="card-img-top" alt="Card Image 2">
                <div class="card-body">
                    <h5 class="card-title">Card Title 2</h5>
                    <p class="card-text">Description of card 2.</p>
                    <a href="product2.html" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="path/to/card-image3.jpg" class="card-img-top" alt="Card Image 3">
                <div class="card-body">
                    <h5 class="card-title">Card Title 3</h5>
                    <p class="card-text">Description of card 3.</p>
                    <a href="product3.html" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
    </div>
</main>

<footer class="text-center mt-4">
    <p>&copy; 2024 Eldrazi Emporium. All rights reserved.</p>
</footer>
    <script src="js/bootstrap.js"></script>
</body>
</html>