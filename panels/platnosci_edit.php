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
    $query = mysqli_query($conn,"SELECT payment_name FROM order_payment WHERE payment_id={$_GET['index']}");
    while ($wynik = @mysqli_fetch_array($query)) {
        $platnosc=$wynik['payment_name'];
    }
}

?>
<form method="POST" action="panels/platnosci_edit.php">
    <h3>Edytuj <?php echo $platnosc ?></h3><br>
    <input type="text" name="nazwa" placeholder = "<?php echo $platnosc ?>" required><br>
    <input type="hidden" name="index" value="<?php echo $_GET['index']?>">
    <input type="submit"><br>
</form>

<?php
    if(isset($_POST['nazwa']))
    {
        $query = mysqli_query($conn, "UPDATE order_payment SET payment_name = '{$_POST['nazwa']}' 
        WHERE payment_id = '{$_POST['index']}';");
        header("Location: ../admin.php");
        die;
    }
?>