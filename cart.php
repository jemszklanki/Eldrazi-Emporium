<?php
require_once("header.php");
require_once("db.php");
require_once("navbar.php");

// Obsługa usuwania przedmiotu z koszyka
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'remove') {
    $itemName = $_POST['name'] ?? null;

    if ($itemName && isset($_SESSION['cart'][$itemName])) {
        // Usuń przedmiot z koszyka sesji
        unset($_SESSION['cart'][$itemName]);

        // Usuń przedmiot z bazy danych, jeśli użytkownik jest zalogowany
        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];
            $sql = "DELETE FROM cart_log WHERE user_id = ? AND item_name = ?";

            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("is", $userId, $itemName);
                if ($stmt->execute()) {
                    echo json_encode(['success' => true, 'message' => 'Item removed from cart and database']);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Item removed from cart but database deletion failed']);
                }
                $stmt->close();
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to prepare database statement']);
            }
        } else {
            echo json_encode(['success' => true, 'message' => 'Item removed from cart (user not logged in)']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Item not found in cart']);
    }
    exit;
}

// Wyświetl koszyk
$cart = $_SESSION['cart'] ?? [];
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koszyk</title>

</head>
<body>
    <h1>Twój Koszyk</h1>
    <?php if (!empty($cart)): ?>
        <table>
            <thead>
                <tr>
                    <th>Przedmiot</th>
                    <th>Ilość</th>
                    <th>Akcje</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart as $itemName => $quantity): ?>
                    <tr>
                        <td><?= is_array($itemName) ? 'Nieprawidłowa nazwa' : htmlspecialchars($itemName) ?></td>
                        <td><?= htmlspecialchars((string)$quantity) ?></td>
                        <td>
                            <button onclick="removeFromCart(<?= json_encode($itemName) ?>)">Usuń</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Twój koszyk jest pusty.</p>
    <?php endif; ?>
</body>
</html>
<script src='js/shop.js'></script>
<?php
require_once("footer.php");
?>