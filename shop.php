<?php
require_once("header.php");
require_once("db.php");
require_once("navbar.php");
?>

<input id="nazwa" onkeyup="doSearch()" type="text">
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
            $query = mysqli_query($conn,"SELECT * FROM cards;"); 
            while ($wynik = @mysqli_fetch_array($query)) { 
                echo "<tr>
                    <td>".$wynik["name"]."</td>
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
<script src='js/shop.js'></script>
<?php
require_once("footer.php");
?>