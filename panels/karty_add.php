<?php 
if(!isset($_SESSION['admin'])){
    session_start();
    if(!isset($_SESSION['admin'])){
        header("Location: index.php");
        die;
    }
}
    //  TODO selecty z nazwami zamiast input liczby z palca
?>

<form method="POST" action="panels/karty_add.php">
    <label>Nazwa</label><br>
    <input type="text" name="nazwa" placeholder = "Colossal Dreadmaw" required><br>
    <label>Dodatek</label><br>
    <input type="number" name="dodatek" placeholder = "Dodatek" required><br>
    <label>Stan</label><br>
    <input type="number" name="stan" placeholder = "Stan" required><br>
    <label>Foil</label><br>
    <input type="number" name="foil" placeholder = "Foil" required><br>
    <label>Język</label><br>
    <input type="number" name="jezyk" placeholder = "Język" required><br>
    <label>Notatki</label><br>
    <input type="textfield" name="notatki" placeholder = "Notatki"><br>
    <label>Cena</label><br>
    <input type="number" name="cena" placeholder = "Cena" required><br>
    <label>Ilość</label><br>
    <input type="number" name="ilosc" placeholder = "Ilość" required><br>
    <input type="submit"><br>
</form>
<?php
    if(
        isset($_POST['nazwa'])   &&
        isset($_POST['dodatek'])   &&
        isset($_POST['stan'])   &&
        isset($_POST['foil'])   &&
        isset($_POST['jezyk'])   &&
        isset($_POST['notatki'])   &&
        isset($_POST['cena'])   &&
        isset($_POST['ilosc'])
    ){
        require_once('../db.php');
        $query = mysqli_query($conn, "INSERT INTO cards VALUES (
        '{$_POST["nazwa"]}', 
        '{$_POST["dodatek"]}', 
        '{$_POST["stan"]}', 
        '{$_POST["foil"]}', 
        '{$_POST["jezyk"]}', 
        '{$_POST["notatki"]}', 
        '{$_POST["cena"]}', 
        '{$_POST["ilosc"]}'
        )");
        header("Location: ../admin.php");
        die;
    }
?>