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
<form method="POST" action="panels/dodatki_add.php">
    <label>Nazwa</label><br>
    <input type="text" name="nazwa" placeholder = "MH4" required><br>
    <input type="submit"><br>
</form>

<?php
    if(isset($_POST['nazwa']))
    {
        $query = mysqli_query($conn, "INSERT INTO expansions(expansion_name) VALUES ('{$_POST['nazwa']}');");
        header("Location: ../admin.php");
        die;
    }
?>