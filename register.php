<?php
require_once("header.php");
require_once("db.php");
require_once("navbar.php");

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

<?php 
    require_once("footer.php");
?>
