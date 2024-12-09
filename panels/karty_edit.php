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
//  potrzebne zeby ustawic wartosci domyslne
$defaults_query = mysqli_query($conn,"select * from cards where name='{$_GET['index']}'");
$defaults_query_result = @mysqli_fetch_array($defaults_query);
?>
<form method="POST" action="panels/karty_edit.php?index=<?php echo $_GET['index']?>">
    <h3>Edytuj <?php echo $_GET['index']?></h3><br>
    <label>Dodatek</label><br>
    <select name="dodatek" required>
        <?php
            $query = mysqli_query($conn,"SELECT * FROM expansions;"); 
            while ($wynik = @mysqli_fetch_array($query)) {
                echo "<option value='{$wynik["id"]}' ";
                if($wynik["id"]==$defaults_query_result['expansion_id'])
                {
                    echo "selected='selected'";
                }
                echo ">{$wynik["expansion_name"]}</option>";
            }
        ?>
    </select><br>
    <label>Stan</label><br>
    <select name="stan" required>
        <?php
            $query = mysqli_query($conn,"SELECT * FROM conditions;"); 
            while ($wynik = @mysqli_fetch_array($query)) {
                echo "<option value='{$wynik["id"]}' ";
                if($wynik["id"]==$defaults_query_result['condition_id'])
                {
                    echo "selected='selected'";
                }
                echo ">{$wynik["condition_name"]}</option>";
            }
        ?>
    </select><br>
    <label>Foil</label><br>
    <select name="foil" required>
        <?php
            $query = mysqli_query($conn,"SELECT * FROM foils;"); 
            while ($wynik = @mysqli_fetch_array($query)) {
                echo "<option value='{$wynik["id"]}' ";
                if($wynik["id"]==$defaults_query_result['foil_id'])
                {
                    echo "selected='selected'";
                }
                echo ">{$wynik["foil_name"]}</option>";
            }
        ?>
    </select><br>
    <label>Język</label><br>
    <select name="jezyk" required>
        <?php
            $query = mysqli_query($conn,"SELECT * FROM languages;"); 
            while ($wynik = @mysqli_fetch_array($query)) {
                echo "<option value='{$wynik["id"]}' ";
                if($wynik["id"]==$defaults_query_result['language_id'])
                {
                    echo "selected='selected'";
                }
                echo ">{$wynik["language_name"]}</option>";
            }
        ?>
    </select><br>
    <label>Notatki</label><br>
    <input type="textfield" name="notatki" placeholder = "Notatki" value="<?php echo $defaults_query_result['notes'];?>"><br>
    <label>Obraz</label><br>
    <input type="textfield" name="image" placeholder = "Obraz" value="<?php echo $defaults_query_result['image'];?>"><br>
    <label>Cena</label><br>
    <input type="number" name="cena" placeholder = "Cena" step="0.01" value="<?php echo $defaults_query_result['price'];?>" required><br>
    <label>Ilość</label><br>
    <input type="number" name="ilosc" placeholder = "Ilość" value="<?php echo $defaults_query_result['quantity'];?>" required><br>
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
        isset($_POST['ilosc'])  &&
        isset($_POST['image'])
    ){
        require_once('../db.php');
        $query = mysqli_query($conn, "UPDATE cards SET 
        expansion_id = '{$_POST["dodatek"]}', 
        condition_id = '{$_POST["stan"]}', 
        foil_id = '{$_POST["foil"]}', 
        language_id = '{$_POST["jezyk"]}', 
        notes = '{$_POST["notatki"]}', 
        price = '{$_POST["cena"]}', 
        quantity = '{$_POST["ilosc"]}', 
        image = '{$_POST["image"]}'
        WHERE
        name = '{$_GET['index']}';");
        header("Location: ../admin.php");
        die;
    }
?>