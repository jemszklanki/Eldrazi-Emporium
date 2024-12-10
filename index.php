<?php 
    require_once("header.php");
    require_once("db.php");
    require_once("navbar.php");
?>

<!-- Gł. sekcja -->
<main class="container mt-4">
    <div class="row">
        <?php
            $query = "SELECT * FROM posts";
            $posts = mysqli_query($conn, $query);
            while ($wynik = @mysqli_fetch_array($posts)) {
                echo"<h2>{$wynik['title']}</h2>";
                echo"<p class='custom-paragraph'>{$wynik['contents']}</p><hr>";
            }
        ?> 
    </div>
</main>

<?php 
    require_once("footer.php");
?>