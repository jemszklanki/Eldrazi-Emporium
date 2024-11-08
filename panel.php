<?php
// Start sesji
session_start();
if(isset($_SESSION['user_id'])){
    require_once("db.php");
} else{
header("Location: index.php");
die;
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Panel Administracyjny</title>

</head>

<body>
    <h1>Elo admin</h1>
</body>