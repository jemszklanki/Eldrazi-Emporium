<?php 
session_start();
if(isset($_SESSION['lastPanel'])){
    echo $_SESSION['lastPanel'];
}else{
    echo 8; 
}
?>