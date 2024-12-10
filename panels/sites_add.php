<?php 
if(!isset($_SESSION['admin'])){
    session_start();
    if(!isset($_SESSION['admin'])){
        header("Location: index.php");
        die;
    }
}
if(!isset($conn)){
    require_once('../db.php');
}
?>

<form method="POST" action="panels/sites_add.php">
    <label>Tytuł</label><br>
    <input type="text" name="title" placeholder = "Nazwa podstrony" style="width: 100%;" required><br>
    <label>Post</label><br>
    <textarea name="contents" placeholder = "Zawartość podstrony" style="width: 100%; height: 500px;" required></textarea><br>
    <input type="submit"><br>
</form>

<?php
    if(isset($_POST['title']) && isset($_POST['contents']))
    {
        $query = mysqli_query($conn, "INSERT INTO sites(title, contents) VALUES ('{$_POST['title']}', '{$_POST['contents']}');");
        header("Location: ../admin.php");
        die;
    }
?>