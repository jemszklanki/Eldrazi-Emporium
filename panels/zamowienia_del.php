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
<p>Na pewno usunąć <?php 
    $query = mysqli_query($conn,"SELECT order_id FROM orders WHERE order_id={$_GET['index']}");
    while ($wynik = @mysqli_fetch_array($query)) {
        echo $wynik['order_id'];
    } 
?>?</p>
<button onclick='doQuery(43, "<?php echo $_GET['index'] ?>")'>TAK</button>
<button onclick='getForm(4)'>NIE</button>