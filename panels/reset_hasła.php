<?php
require_once("header.php");
require_once("db.php");
require_once("navbar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$newpassword = $_POST['newpassword'];
$confirm_password = $_POST['confirm_password'];
    if (strlen($newpassword) < 8 ||
                !preg_match('/[A-Z]/', $newpassword) ||
                !preg_match('/[0-9]/', $newpassword) ||
                !preg_match('/[\W]/', $newpassword)) {
            $error_msg = "Password must be at least 8 characters long, contain an uppercase letter, a number, and a special character.";
        } elseif ($newpassword !== $confirm_password) {
            $error_msg = "Passwords do not match.";
        } else {
            // Hash
            $hashed_password = password_hash($newpassword, PASSWORD_DEFAULT);
            $conn->query("UPDATE users SET password='$hashed_password' WHERE email='$email'");
            header('Location: changedpass.php');
            exit();
    }
}
?>

<div class="form-container">
    <h2 class="text-center">Nowe hasło</h2>
    <?php if ($error_msg): ?>
        <div class="alert alert-danger"><?= $error_msg; ?></div>
    <?php endif; ?>
    <form method="POST" action="">
        <div class="form-group">
            <label for="newpassword">Hasło</label>
            <input type="password" class="form-control" name="newpassword" required>
            <small class="form-text text-muted">Hasło musi mieć przynajmniej 8 znaków, wielką literę, cyfrę i znak specjalny.</small>
        </div>
        <div class="form-group">
            <label for="confirm_password">Potrwierdź hasło</label>
            <input type="password" class="form-control" name="confirm_password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Zresetuj</button>
    </form>
</div>
