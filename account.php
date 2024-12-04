<?php
require_once("header.php");
if(isset($_SESSION['user_id'])){
    require_once("db.php");
    require_once("navbar.php");
}else{
    header("Location: login.php");
}
?>

<?php
    require_once("footer.php");
?>