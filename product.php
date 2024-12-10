<?php 
    if(!isset($_GET['index'])){
        header("Location: index.php");
        die;
    }
    require_once("header.php");
    require_once("db.php");
    require_once("navbar.php");
    $query = "SELECT cards.name as 'name', conditions.condition_name as 'condition', expansions.expansion_name as 'expansion', foils.foil_name as 'foil', languages.language_name as 'language', cards.notes as 'notes', cards.price as 'price', cards.quantity as 'quantity', cards.image as image FROM cards JOIN conditions on cards.condition_id=conditions.id join expansions on cards.expansion_id=expansions.id join foils on cards.foil_id=foils.id join languages on cards.language_id=languages.id
    WHERE name='{$_GET['index']}';";
    $sql = mysqli_query($conn, $query);
    $content = @mysqli_fetch_array($sql);
?>
<main class="container mt-4">
    <h2><?= $content['name'] ?></h2>
    <div class="card-site">
        <img src="img/<?=$content['image']?>.jpg" onerror="this.src='img/no_preview.png'"><br>
        <b>Stan: </b><?= $content['condition'] ?><br>
        <b>Dodatek: </b><?= $content['expansion'] ?><br>
        <b>Język: </b><?= $content['language'] ?><br>
        <b>Foil: </b><?= $content['foil'] ?><br>
        <b>Dodatkowe informacje: </b><?= $content['notes'] ?><br>
        <b>Cena: </b><?= $content['price'] ?>zł<br>
        <button onclick='addToCart("<?=$content["name"]?>", "<?=$content["quantity"]?>")'>Dodaj do koszyka</button>
    </div>
</main>
<script src='js/shop.js'></script>
<?php 
    require_once("footer.php");
?>
