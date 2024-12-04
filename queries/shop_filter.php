<?php
    require_once('../db.php');
    $query = mysqli_query($conn,"SELECT cards.image as image, cards.name as 'name', conditions.condition_name as 'condition_id', expansions.expansion_name as 'expansion_id', foils.foil_name as 'foil_id', languages.language_name as 'language_id', cards.notes as 'notes', cards.price as 'price', cards.quantity as 'quantity' FROM cards JOIN conditions on cards.condition_id=conditions.id join expansions on cards.expansion_id=expansions.id join foils on cards.foil_id=foils.id join languages on cards.language_id=languages.id
    WHERE name LIKE '%{$_GET['name']}%' OR notes LIKE '%{$_GET['name']}%'"); 
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