<?php
session_start();
require_once("../db.php");
// Obsługa usuwania przedmiotu z koszyka
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $itemName = $_GET['itemName'] ?? null;

    if ($itemName && isset($_SESSION['cart'][$itemName])) {
        // Usuń przedmiot z koszyka sesji
        unset($_SESSION['cart'][$itemName]);

        // Usuń przedmiot z bazy danych, jeśli użytkownik jest zalogowany
        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];
            $sql = "DELETE FROM cart_log WHERE user_id = '{$userId}' AND item_name = '{$itemName}'";
            $query = mysqli_query($conn, $sql);
        } else {
            echo json_encode(['success' => true, 'message' => 'Item removed from cart (user not logged in)']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Item not found in cart']);
    }
    exit;
}
?>