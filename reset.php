<?php
require_once("header.php");
require_once("db.php");
require_once("navbar.php");

function redirect(){ //funkcja cofająca na index
   header('Location: index.php');
     exit();
}

$error_msg = '';

if (!isset($_GET['email']) || !isset($_GET['password'])) {
        echo"isset";
        redirect();
} else {
        $email = $conn->real_escape_string($_GET['email']); // wziecie emailu z linku i spowodowanie że będzie bezpieczny do użycia w zapytaniu sql
        $password = $conn->real_escape_string($_GET['password']); // password z linku

        $sql = $conn->query("SELECT id FROM users WHERE email='$email' AND password='$password'");
        if($sql->num_rows == 1){
            require_once("panels/reset_hasła.php");
        } else {
            redirect();
        }
       }
?>


<?php 
    require_once("footer.php");
?>