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
<form method="POST" action="panels/karty_edit.php?index=<?php echo $_GET['index']?>">
    <label>Edytuj <?php echo $_GET['index']?></label><br>
    <label>Dodatek</label><br>
    <select name="dodatek" required>
        <?php
            $query = mysqli_query($conn,"SELECT * FROM expansions;"); 
            while ($wynik = @mysqli_fetch_array($query)) {
                echo "<option value='{$wynik["id"]}'>{$wynik["expansion_name"]}</option>";
            }
        ?>
    </select><br>
    <label>Stan</label><br>
    <select name="stan" required>
        <?php
            $query = mysqli_query($conn,"SELECT * FROM conditions;"); 
            while ($wynik = @mysqli_fetch_array($query)) {
                echo "<option value='{$wynik["id"]}'>{$wynik["condition_name"]}</option>";
            }
        ?>
    </select><br>
    <label>Foil</label><br>
    <select name="foil" required>
        <?php
            $query = mysqli_query($conn,"SELECT * FROM foils;"); 
            while ($wynik = @mysqli_fetch_array($query)) {
                echo "<option value='{$wynik["id"]}'>{$wynik["foil_name"]}</option>";
            }
        ?>
    </select><br>
    <label>Język</label><br>
    <select name="jezyk" required>
        <?php
            $query = mysqli_query($conn,"SELECT * FROM languages;"); 
            while ($wynik = @mysqli_fetch_array($query)) {
                echo "<option value='{$wynik["id"]}'>{$wynik["language_name"]}</option>";
            }
        ?>
    </select><br>
    <label>Notatki</label><br>
    <input type="textfield" name="notatki" placeholder = "Notatki"><br>
    <label>Cena</label><br>
    <input type="number" name="cena" placeholder = "Cena" step="0.01" required><br>
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