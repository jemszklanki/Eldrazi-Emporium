<?php 
    if(!isset($_GET['index'])){
        header("Location: index.php");
        die;
    }
    require_once("header.php");
    require_once("db.php");
    require_once("navbar.php");
    $query = "SELECT * FROM sites where id = {$_GET['index']}";
    $sql = mysqli_query($conn, $query);
    $content = @mysqli_fetch_array($sql);
?>
<main class="container mt-4">
    <h2><?= $content['title'] ?></h2>
    <p class="custom-paragraph"><?= $content['contents'] ?></p>
</main>
<?php 
    require_once("footer.php");
?>
