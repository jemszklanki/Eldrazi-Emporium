<?php
require_once("header.php");
require_once("db.php");
require_once("navbar.php");
?>
<br>
<input id="nazwa" onkeyup="doSearch()" type="text" placeholder="Nazwa">
<input id="dodatek" onkeyup="doSearch()" type="text" placeholder="Dodatek">
<label>Stan: </label>
<select id="stan" oninput="doSearch()" required>
    <option value="%">-</option>
    <?php
        $query = mysqli_query($conn,"SELECT * FROM conditions;"); 
        while ($wynik = @mysqli_fetch_array($query)) {
            echo "<option value='{$wynik["id"]}'>{$wynik["condition_name"]}</option>";
        }
    ?>
</select>
<label>Język: </label>
<select id="jezyk" oninput="doSearch()" required>
    <option value="%">-</option>
    <?php
        $query = mysqli_query($conn,"SELECT * FROM languages;"); 
        while ($wynik = @mysqli_fetch_array($query)) {
            echo "<option value='{$wynik["id"]}'>{$wynik["language_name"]}</option>";
        }
    ?>
</select>
<label>Foil: </label>
<select id="foil" oninput="doSearch()" required>
    <option value="%">-</option>
    <?php
        $query = mysqli_query($conn,"SELECT * FROM foils;"); 
        while ($wynik = @mysqli_fetch_array($query)) {
            echo "<option value='{$wynik["id"]}'>{$wynik["foil_name"]}</option>";
        }
    ?>
</select><br>
<br>
<table>
    <thead>
        <tr>
            <th>Nazwa</th>
            <th>Dodatek</th>
            <th>Stan</th>
            <th>Foil</th>
            <th>Język</th>
            <th>Notatki</th>
            <th>Cena</th>
            <th>Ilość</th>
            <th>Do koszyka</th>
        </tr>
    </thead>
    <tbody id="ajax-ret">
        <?php
            $query = mysqli_query($conn,"SELECT cards.image as image, cards.name as 'name', conditions.condition_name as 'condition_id', expansions.expansion_name as 'expansion_id', foils.foil_name as 'foil_id', languages.language_name as 'language_id', cards.notes as 'notes', cards.price as 'price', cards.quantity as 'quantity' FROM cards JOIN conditions on cards.condition_id=conditions.id join expansions on cards.expansion_id=expansions.id join foils on cards.foil_id=foils.id join languages on cards.language_id=languages.id;"); 
            while ($wynik = @mysqli_fetch_array($query)) { 
                echo "<tr>
                    <td onmouseover='showPreview(".'"'.$wynik["image"].'"'.", event)' onmouseout='hidePreview()'>".$wynik["name"]."</td>
                    <td>".$wynik["expansion_id"]."</td>
                    <td>".$wynik["condition_id"]."</td>
                    <td>".$wynik["foil_id"]."</td>
                    <td>".$wynik["language_id"]."</td>
                    <td>".$wynik["notes"]."</td>
                    <td>".$wynik["price"]."</td>
                    <td>".$wynik["quantity"]."</td>
                    <td><button onclick=''>Dodaj do koszyka</button></td>
                </tr>"; 
            }
        ?>
    </tbody>
</table>
<img id="preview" style="position: absolute; display: none; z-index: 1000;" alt="Podgląd karty" onerror="previewError()">
<script src='js/shop.js'></script>
<?php
require_once("footer.php");
?>