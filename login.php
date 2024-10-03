<?php
// Start sesji
session_start();

require_once("db.php");

echo "TODO: Działający login :p";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Emporium</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="form-container">
    <h2 class="text-center">Login</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="username">Login</label>
            <input type="text" class="form-control" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Hasło</label>
            <input type="password" class="form-control" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Login</button>
    </form>
    <p class="text-center mt-3">Nie masz konta? Luźna guma! <a href="register.php">Zarejestruj się tutaj</a></p>
</div>

<script src="js/bootstrap.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
</body>
</html>