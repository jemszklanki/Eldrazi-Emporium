<?php
    session_start();
    if(isset($_SESSION['admin'])){
        require_once('db.php');
        $query = mysqli_query($conn, "DELETE FROM order_payment WHERE payment_id={$_SESSION['index']}");
    }
?>