<?php
session_start();
require_once("db.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $itemName = $_POST['name'] ?? null;

    if ($itemName) {
        // Sprawdź, czy koszyk już istnieje w sesji
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Dodaj przedmiot do koszyka
        $_SESSION['cart'][] = $itemName;

        // Odpowiedz na żądanie JSON-em
        echo json_encode(['success' => true, 'message' => 'Item added to cart']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Item name not provided']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>