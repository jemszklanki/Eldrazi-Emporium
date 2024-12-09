<?php
    require_once('../db.php');
    session_start();
    $shipment_price_query = mysqli_query($conn,"select * from order_shipment where shipment_id='{$_GET['id']}'");
    $result = @mysqli_fetch_array($shipment_price_query);
    $_SESSION['totalPrice'] = $_SESSION['cardsPrice'] + (float)$result['shipment_price'];
    echo 'Cena zamówienia: ' . $_SESSION['totalPrice'] . 'zł';
?>