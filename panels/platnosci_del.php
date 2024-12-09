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
    $query = mysqli_query($conn,"SELECT payment_name FROM order_payment WHERE payment_id={$_GET['index']}");
    while ($wynik = @mysqli_fetch_array($query)) {
        echo $wynik['payment_name'];
    }
?>?</p>
<button onclick='doQuery(63, "<?php echo $_GET['index'] ?>")'>TAK</button>
<button onclick='getForm(6)'>NIE</button>