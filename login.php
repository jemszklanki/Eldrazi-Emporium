<?php
require_once("db.php");
require_once("header.php");
require_once("navbar.php");

$error_msg = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login_input = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE (username = ? OR email = ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $login_input, $login_input);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
    
        // Sprawdź, czy konto jest zweryfikowane
        if ($user['verified'] == 0) {
            $error_msg = "Zweryfikuj konto!";
        } else {
            // Sprawdź hasło
            if (password_verify($password, $user['password'])) {
                // Wsadź dane do sesji
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                if ($user['admin'] == true) {
                    $_SESSION['admin'] = $user['admin'];
                }

                // Synchronizacja koszyka
                $userId = $user['id'];

                // Usuń nadwyżkę z `cart_log`, jeśli w tabeli `cards` jest mniej elementów
                $cleanupSql = "
                    UPDATE cart_log
                    JOIN cards ON cart_log.item_name = cards.name
                    SET cart_log.quantity = cards.quantity
                    WHERE cart_log.quantity > cards.quantity;
                ";
                $cleanupStmt = $conn->prepare($cleanupSql);
                $cleanupStmt->execute();
                $cleanupStmt->close();

                // Pobierz dane z `cart_log` i zapisz je do sesji
                $cartSql = "SELECT item_name, quantity FROM cart_log WHERE user_id = ?";
                $cartStmt = $conn->prepare($cartSql);
                $cartStmt->bind_param("i", $userId);
                $cartStmt->execute();
                $cartResult = $cartStmt->get_result();

                $_SESSION['cart'] = [];
                while ($row = $cartResult->fetch_assoc()) {
                    $_SESSION['cart'][$row['item_name']] = $row['quantity'];
                }
                $cartStmt->close();

                // Przekieruj na index po zalogowaniu
                header("Location: index.php");
                exit();
            } else {
                $error_msg = "Niepoprawne hasło!";
            }
        }
    } else {
        $error_msg = "Nie znaleziono użytkownika!";
    }

    $stmt->close();
}
$conn->close();
?>

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
    <p class="text-center mt-3">Zapomniałeś hasła albo nicku? Luźna guma! <a href="forgotpass.php">Zmień je tutaj</a></p>
</div>

<?php 
require_once("footer.php");
?>
