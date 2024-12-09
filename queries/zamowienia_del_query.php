<?php
    session_start();
    if(isset($_SESSION['admin'])){
        require_once('db.php');
        $query = mysqli_query($conn, "DELETE FROM orders WHERE order_id={$_SESSION['index']}");
    }
?>