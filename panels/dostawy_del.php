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
    $query = mysqli_query($conn,"SELECT shipment_name FROM order_shipment WHERE shipment_id ={$_GET['index']}");
    while ($wynik = @mysqli_fetch_array($query)) {
        echo $wynik['shipment_name'];
    }
?>?</p>
<button onclick='doQuery(53, "<?php echo $_GET['index'] ?>")'>TAK</button>
<button onclick='getForm(5)'>NIE</button>