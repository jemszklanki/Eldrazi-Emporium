<?php
// Start sesji
session_start();

require_once("db.php");

$error_msg = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Sprawdź email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_msg = "Invalid email format.";
    } elseif (strlen($password) < 8 ||
              !preg_match('/[A-Z]/', $password) ||
              !preg_match('/[0-9]/', $password) ||
              !preg_match('/[\W]/', $password)) {
        $error_msg = "Password must be at least 8 characters long, contain an uppercase letter, a number, and a special character.";
    } elseif ($password !== $confirm_password) {
        $error_msg = "Passwords do not match.";
    } else {
        // Hash
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Dodaj do bazy
        $sql = "INSERT INTO users (username, password, email, admin) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $admin = false; // Ustaw admina na nie
        $stmt->bind_param("sssb", $username, $hashed_password, $email, $admin);

        if ($stmt->execute()) {
            header("Location: index.php");
            exit(); 
        } else {
            $error_msg = "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja - Emporium</title>
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
    <h2 class="text-center">Rejestracja</h2>
    <?php if ($error_msg): ?>
        <div class="alert alert-danger"><?= $error_msg; ?></div>
    <?php endif; ?>
    <form method="POST" action="">
        <div class="form-group">
            <label for="username">Nazwa użytkownika</label>
            <input type="text" class="form-control" name="username" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Hasło</label>
            <input type="password" class="form-control" name="password" required>
            <small class="form-text text-muted">Hasło musi mieć przynajmniej 8 znaków, wielką literę, cyfrę i znak specjalny.</small>
        </div>
        <div class="form-group">
            <label for="confirm_password">Potrwierdź hasło</label>
            <input type="password" class="form-control" name="confirm_password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Zarejestruj się</button>
    </form>
</div>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
</body>
</html>
