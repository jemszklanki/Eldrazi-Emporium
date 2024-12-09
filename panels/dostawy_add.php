<?php 
if(!isset($_SESSION['admin'])){
    session_start();
    if(!isset($_SESSION['admin'])){
        header("Location: index.php");
        die;
    }
}
if(!isset($conn)){
    require_once('../db.php');
}
?>

<form method="POST" action="panels/dostawy_add.php">
    <label>Nazwa</label><br>
    <input type="text" name="nazwa" placeholder = "Nazwa dostawy" required><br>
    <label>Cena</label><br>
    <input type="number" name="cena" placeholder = "10" step="0.1" required><br>
    <input type="submit"><br>
</form>

<?php
    if(isset($_POST['nazwa']) && isset($_POST['cena']))
    {
        $query = mysqli_query($conn, "INSERT INTO order_shipment(shipment_name, shipment_price) VALUES ('{$_POST['nazwa']}', '{$_POST['cena']}');");
        header("Location: ../admin.php");
        die;
    }
?>