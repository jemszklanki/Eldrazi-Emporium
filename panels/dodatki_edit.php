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
    $query = mysqli_query($conn,"SELECT expansion_name FROM expansions WHERE id={$_GET['index']}");
    while ($wynik = @mysqli_fetch_array($query)) {
        $dodatek=$wynik['expansion_name'];
    }
}

?>
<form method="POST" action="panels/dodatki_edit.php">
    <h3>Edytuj <?php echo $dodatek ?></h3><br>
    <input type="text" name="nazwa" placeholder = "<?php echo $dodatek ?>" required><br>
    <input type="hidden" name="index" value="<?php echo $_GET['index']?>">
    <input type="submit"><br>
</form>

<?php
    if(isset($_POST['nazwa']))
    {
        $query = mysqli_query($conn, "UPDATE expansions SET expansion_name = '{$_POST['nazwa']}' 
        WHERE id = '{$_POST['index']}';");
        header("Location: ../admin.php");
        die;
    }
?>