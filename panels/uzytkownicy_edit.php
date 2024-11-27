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

<form method="POST" action="panels/uzytkownicy_edit.php?index=<?php echo $_GET['index']?>">
    <label>Edytuj <?php echo $_GET['index']?></label><br>
    <!-- TODO ten form -->
</form>

