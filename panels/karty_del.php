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
<button onclick='doQuery(13, "<?php echo $_GET['index'] ?>")'>TAK</button>
<button onclick='getForm(1)'>NIE</button>