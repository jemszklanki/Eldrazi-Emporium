<?php
require_once("header.php");
require_once("db.php");
require_once("navbar.php");

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    header("Location: index.php");
    exit();
}
?>

    
</body>
<script src='js/shop.js'></script>
</html>
<?php
require_once("footer.php");
?>