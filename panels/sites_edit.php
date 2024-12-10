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
if(isset($_GET['index'])){
    $query = mysqli_query($conn,"SELECT * FROM sites WHERE id={$_GET['index']}");
    $wynik = @mysqli_fetch_array($query);
}
?>
<h3>Edytuj <?= $wynik['title']?></h3>
<form method="POST" action="panels/sites_edit.php?index=<?= $_GET['index']?>">
    <label>Tytuł</label><br>
    <input type="text" name="title" placeholder = "Nazwa podstrony" style="width: 100%;" value="<?= $wynik['title']?>" required><br>
    <label>Post</label><br>
    <textarea name="contents" placeholder = "Zawartość podstrony" style="width: 100%; height: 500px;" required><?= $wynik['contents']?></textarea><br>
    <input type="submit"><br>
</form>

<?php
    if(isset($_POST['title']) && isset($_POST['contents']))
    {
        $query = mysqli_query($conn, "UPDATE sites SET 
        title = '{$_POST["title"]}', 
        contents = '{$_POST["contents"]}'
        WHERE 
        id = '{$_GET['index']}';");
        header("Location: ../admin.php");
        die;
    }
?>