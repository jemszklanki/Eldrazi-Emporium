<?php
session_start();

if(isset($_SESSION['user_id'])){
        unset($_SESSION['user_id']);
}

if(isset($_SESSION['username'])){
        unset($_SESSION['username']);
}
if(isset($_SESSION['admin'])){
        unset($_SESSION['admin']);
}
header("Location: index.php");
die;
?>