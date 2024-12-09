<?php
require_once("header.php");
require_once("db.php");
require_once("navbar.php");



// Wyświetl koszyk
$cart = $_SESSION['cart'] ?? [];
?>
<h1>Twój Koszyk</h1>
<?php if (!empty($cart)): ?>
    <table class="col3">
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
                        <button onclick="removeFromCart('<?= $itemName ?>')">Usuń</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href='buy.php'>Kup</a>
    <div id='ajax-ret'></div>
<?php else: ?>
    <p>Twój koszyk jest pusty.</p>
<?php endif; ?>
<script src='js/shop.js'></script>
<?php
require_once("footer.php");
?>