<?php
session_start();
require_once("../db.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $itemName = $_GET['itemName'] ?? null;
    $quantity = intval($_GET['quantity'] ?? 1); // Ilość przekazana z JavaScript, domyślnie 1

    if ($itemName && $quantity > 0) {
        // Sprawdź, czy koszyk już istnieje w sesji
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Sprawdź, czy przedmiot już istnieje w koszyku
        if (isset($_SESSION['cart'][$itemName])) {
            $currentQuantity = $_SESSION['cart'][$itemName];

            if ($currentQuantity >= $quantity) {
                echo json_encode(['success' => false, 'message' => 'Item already in cart with equal or greater quantity']);
                exit;
            } else {
                // Zwiększ ilość przedmiotu w koszyku
                $_SESSION['cart'][$itemName] += $quantity;
            }
        } else {
            // Dodaj nowy przedmiot do koszyka
            $_SESSION['cart'][$itemName] = $quantity;
        }

        // Sprawdź, czy użytkownik jest zalogowany
        if (isset($_SESSION['user_id'])) {
            // Wykonaj zapytanie do bazy danych
            $userId = $_SESSION['user_id'];

            // Sprawdź, czy przedmiot już istnieje w tabeli `cart_log`
            $sqlCheck = "SELECT quantity FROM cart_log WHERE user_id = ? AND item_name = ?";
            if ($stmtCheck = $conn->prepare($sqlCheck)) {
                $stmtCheck->bind_param("is", $userId, $itemName);
                $stmtCheck->execute();
                $stmtCheck->bind_result($existingQuantity);

                if ($stmtCheck->fetch()) {
                    // Jeśli przedmiot istnieje, zaktualizuj ilość
                    $stmtCheck->close();

                    $sqlUpdate = "UPDATE cart_log SET quantity = quantity + ? WHERE user_id = ? AND item_name = ?";
                    if ($stmtUpdate = $conn->prepare($sqlUpdate)) {
                        $stmtUpdate->bind_param("iis", $quantity, $userId, $itemName);
                        if ($stmtUpdate->execute()) {
                            echo json_encode(['success' => true, 'message' => 'Quantity updated in database']);
                        } else {
                            echo json_encode(['success' => false, 'message' => 'Failed to update quantity in database']);
                        }
                        $stmtUpdate->close();
                    } else {
                        echo json_encode(['success' => false, 'message' => 'Failed to prepare update statement']);
                    }
                } else {
                    // Jeśli przedmiot nie istnieje, dodaj nowy wpis
                    $stmtCheck->close();

                    $sqlInsert = "INSERT INTO cart_log (user_id, item_name, quantity) VALUES (?, ?, ?)";
                    if ($stmtInsert = $conn->prepare($sqlInsert)) {
                        $stmtInsert->bind_param("isi", $userId, $itemName, $quantity);
                        if ($stmtInsert->execute()) {
                            echo json_encode(['success' => true, 'message' => 'Item added to cart and logged to database']);
                        } else {
                            echo json_encode(['success' => false, 'message' => 'Failed to log item to database']);
                        }
                        $stmtInsert->close();
                    } else {
                        echo json_encode(['success' => false, 'message' => 'Failed to prepare insert statement']);
                    }
                }
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to prepare check statement']);
            }
        } else {
            echo json_encode(['success' => true, 'message' => 'Item added to cart (user not logged in)']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid item name or quantity']);
        echo $itemName;
        echo $quantity;
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>
