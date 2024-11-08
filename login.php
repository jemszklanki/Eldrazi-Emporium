<?php
// Start sesji
session_start();

require_once("db.php");

//  echo "TODO: Działający login :p";

$error_msg = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login_input = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $login_input, $login_input);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        // Sprawdź hasło
        if (password_verify($password, $user['password'])) {
            // Wsadź dane do sesji
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            if ($user['admin'] == true){
                $_SESSION['admin'] = $user['admin'];
            }
            // Przekieruj na index po zalogowaniu
            header("Location: index.php");
            exit();
        } else {
            $error_msg = "Niepoprawne hasło!";
        }
    } else {
        $error_msg = "Nie znaleziono użytkownika!";
    }

    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Emporium</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- Baner -->
<header class="banner">
    <h1>Witamy w Eldrazi Emporium</h1>
    <p>Twój one-stop shop dla kart MTG!</p>
</header>

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