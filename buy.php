<?php
require_once("header.php");
require("db.php");
require_once("navbar.php");

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}
$cart = $_SESSION['cart'] ?? [];
$cardsPrice = (float)0.00;
$totalPrice = (float)0.00;
$error_msg = '';

function price($itemName){
    require("db.php");
    $sql = "SELECT price FROM cards WHERE name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $itemName);
    $stmt->execute();
    
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        $price_decimal = $row['price'];
        $price = (float)$price_decimal;
        $stmt->close();
        return $price;
    } else {
        $stmt->close();
        return null;
    }
}

if (isset($_SESSION['user_id'])) {
    $sql = "SELECT email FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $email = $stmt->get_result();
    $stmt->close();
}
?>


<h1>Twoje zamówienie</h1>
<?php if (!empty($cart)): ?>
    <table>
        <thead>
            <tr>
                <th>Przedmiot</th>
                <th>Ilość</th>
                <th>Cena</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cart as $itemName => $quantity): ?>
                <tr>
                    <td><?= is_array($itemName) ? 'Nieprawidłowa nazwa' : htmlspecialchars($itemName) ?></td>
                    <td><?= htmlspecialchars((string)$quantity) ?></td>
                    <td><?= price($itemName) ?> zł</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div id='ajax-ret'></div>
<?php else: ?>
    <p>Brak zamówień</p>
<?php endif; ?>

<?php
    foreach ($cart as $itemName => $quantity) {
        $cardsPrice += price($itemName) * $quantity;
    }
?>
<h2>Cena produktów: <?= $cardsPrice ?> zł</h2>

<div>
    <h2 class="text-center">Dane zamówienia</h2>

    <?php if ($error_msg): ?>
        <div class="alert alert-danger"><?= $error_msg; ?></div>
    <?php endif; ?>

    <form method="POST" action="">

        <?php if (!isset($_SESSION['user_id'])) {
                echo '<div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" required>
                </div>';
            }
        ?>

        <div class="form-group">
            <label for="shipment_method">Wybierz metodę dostawy</label>
                <select id="ship" class="form-control" name="shipment_method" required>
                    <?php
                    $sql = "SELECT * FROM order_shipment";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $stmt->close();
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row['shipment_id'] . '">' . $row['shipment_name'] . ' ' . $row['shipment_price'] . ' zł</option>';
                        }
                    } else {
                        echo '<option value="">Brak dostępnych metod dostawy</option>';
                    }
                    ?>
                </select>
        </div>
                    
        <div class="form-group" id="stret">
            <label for="ulica">Ulica</label>
            <input type="text" class="form-control" name="ulica" required>
        </div>
        <div class="form-group" id="numb">
            <label for="numer">Numer domu/mieszkania/paczkomatu</label>
            <input type="numer" class="form-control" name="numer" required>
        </div>

        <div class="form-group">
        <label for="payment_method">Wybierz metodę płatności</label>
            <select class="form-control" name="payment_method" required>
                <?php
                $sql = "SELECT * FROM order_payment";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->get_result();
                $stmt->close();
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['payment_id'] . '">' . $row['payment_name'] . '</option>';
                    }
                } else {
                    echo '<option value="">Brak dostępnych metod płatności</option>';
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary btn-block" id="but">Kup</button>
    </form>
</div>

</body>

<script src='js/buy.js'></script>
</html>
<?php
require_once("footer.php");
?>
