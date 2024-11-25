<?php 
if(!isset($_SESSION['admin'])){
    session_start();
    if(!isset($_SESSION['admin'])){
        header("Location: index.php");
        die;
    }
}
?>
<p>Na pewno usunąć <?php echo $_GET['index'] ?>?</p>
<form>

</form>