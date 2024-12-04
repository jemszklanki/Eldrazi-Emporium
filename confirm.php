<?php
require_once("header.php");
require_once("db.php");
require_once("navbar.php");

    function redirect(){ //funkcja cofająca na index
       header('Location: index.php');
        exit();
    }

    if (!isset($_GET['email']) || !isset($_GET['token'])) {
        echo"isset";
        redirect();
    } else {
        $email = $conn->real_escape_string($_GET['email']); // wziecie emailu z linku i spowodowanie że będzie bezpieczny do użycia w zapytaniu sql
        $token = $conn->real_escape_string($_GET['token']); // token z linku

        $sql = $conn->query("SELECT id FROM users WHERE email='$email' AND token='$token'
            AND verified=0");
        if($sql->num_rows > 0){
            $conn->query("UPDATE users SET verified=1, token='' WHERE token='$token' AND email='$email'");
            redirect();
        } else {
            redirect();
        }
    }
?>