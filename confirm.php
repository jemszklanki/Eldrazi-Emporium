<?php
require_once("header.php");
require_once("db.php");
require_once("navbar.php");

    function redirect(){ //funkcja cofająca na index
        header('Location: index.php')
        exit();
    }

    if (!isset($_GET['email']) || !isset($_GET['token'])) {
        redirect();
    } else {

        $email = $con->real_escape_string($_GET['email']); // wziecie emailu z linku i spowodowanie że będzie bezpieczny do użycia w zapytaniu sql
        $token = $con->real_escape_string($_GET['token']); // token z linku

        $sql = $con->query("SELECT id FROM users WHERE email='$email' AND token=$token'");
        if($sql->num_rows > 0){
            $con->query("UPDATE users SET verified=1 AND token=''");
            redirect();
        } else
            redirect();
    }
?>