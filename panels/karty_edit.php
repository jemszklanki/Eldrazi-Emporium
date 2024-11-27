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
<form method="POST" action="panels/karty_edit.php?index=<?php echo $_GET['index']?>">
    <label>Edytuj <?php echo $_GET['index']?></label><br>
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
        isset($_POST['dodatek'])   &&
        isset($_POST['stan'])   &&
        isset($_POST['foil'])   &&
        isset($_POST['jezyk'])   &&
        isset($_POST['notatki'])   &&
        isset($_POST['cena'])   &&
        isset($_POST['ilosc'])
    ){
        require_once('../db.php');
        $query = mysqli_query($conn, "UPDATE cards SET 
        expansion_id = '{$_POST["dodatek"]}', 
        condition_id = '{$_POST["stan"]}', 
        foil_id = '{$_POST["foil"]}', 
        language_id = '{$_POST["jezyk"]}', 
        notes = '{$_POST["notatki"]}', 
        price = '{$_POST["cena"]}', 
        quantity = '{$_POST["ilosc"]}'
        WHERE
        name = '{$_GET['index']}';");
        header("Location: ../admin.php");
        die;
    }
?>