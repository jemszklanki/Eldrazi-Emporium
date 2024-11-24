<!-- Baner -->
<header class="banner">
    <h1>Witamy w Eldrazi Emporium</h1>
    <p>Twój one-stop shop dla kart MTG!</p>
</header>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="index.php#">Trading Cards</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item nav-links">
                    <a class="nav-link" href="cart.php">Koszyk</a>
                </li>
                <?php
                if(!isset($_SESSION['user_id'])){
                    echo '<li class="nav-item nav-links">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item nav-links">
                        <a class="nav-link" href="register.php">Rejestracja</a>
                    </li>';
                }
                ?>
                <!-- Admin panel -->
                <?php
                if(isset($_SESSION['admin'])){
                    if($_SESSION['admin'] == true){
                        echo '<li class="nav-item nav-links"> <a class="nav-link" href="admin.php">Admin Panel</a> </li>';
                    }
                }
                ?>
                <!-- Logout -->
                <?php
                if(isset($_SESSION['user_id'])){
                    echo '<li class="nav-item nav-links"> <a class="nav-link" href="logout.php">Wyloguj</a> </li>';
                    echo  '<li> <span class="nav-link witaj">Witaj '.$_SESSION['username'].'</span></li>';
                }
                ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
