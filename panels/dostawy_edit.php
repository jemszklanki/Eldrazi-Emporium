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
if(isset($_GET['index'])){
    $query = mysqli_query($conn,"SELECT * FROM order_shipment WHERE shipment_id={$_GET['index']}");
    $wynik = @mysqli_fetch_array($query);
}
?>
<h3>Edytuj <?= $wynik['shipment_name']?></h3>
<form method="POST" action="panels/dostawy_edit.php?index=<?= $_GET['index']?>">
    <label>Nazwa</label><br>
    <input type="text" name="nazwa" placeholder = "Nazwa dostawy" value="<?= $wynik['shipment_name']?>" required><br>
    <label>Cena</label><br>
    <input type="number" name="cena" placeholder = "10" step="0.1" value="<?= $wynik['shipment_price']?>" required><br>
    <input type="submit"><br>
</form>

<?php
    if(isset($_POST['nazwa']) && isset($_POST['cena']))
    {
        $query = mysqli_query($conn, "UPDATE order_shipment SET 
        shipment_name = '{$_POST["nazwa"]}', 
        shipment_price = '{$_POST["cena"]}'
        WHERE 
        shipment_id = '{$_GET['index']}';");
        header("Location: ../admin.php");
        die;
    }
?>