<?php 
    require_once("header.php");
    require_once("db.php");
    require_once("navbar.php");
?>

<!-- Gł. sekcja -->
<main class="container mt-4">
    <h2 class="text-center">Wyróżnione</h2>
    <div class="row">
        <!-- Karty -->
        <?php
            $wyroznione = array("Elesh Norn","Griselbrand","Sheoldred");
            
            $query = "SELECT * FROM cards WHERE name LIKE '{$wyroznione[0]}' OR name LIKE '{$wyroznione[1]}' OR name LIKE '{$wyroznione[2]}'";
            
            $cards = mysqli_query($conn, $query);
            while ($wynik = @mysqli_fetch_array($cards)) {
                echo    '<div class="col-md-4">
                            <div class="card">
                                <img src="img/'.$wynik['image'].'.jpg" class="card-img-top" alt="Placeholder" onerror="this.src='."'img/no_preview.png'".'">
                                <div class="card-body">
                                    <h5 class="card-title">'.$wynik['name'].'</h5>
                                    <p class="card-text">'.$wynik['notes'].'</p>
                                    <a href="#" class="btn btn-primary">Do koszyka</a>
                                </div>
                            </div>
                        </div>';
            }
        ?>
    </div>
</main>

<?php 
    require_once("footer.php");
?>