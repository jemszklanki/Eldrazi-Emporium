<?php
    $query = mysqli_query($conn,"SELECT * FROM cards;"); 

    echo '<table><thead>
            <tr>
                <th>Nazwa</th>
                <th>Dodatek</th>
                <th>Stan</th>
                <th>Foil</th>
                <th>Język</th>
                <th>Notatki</th>
                <th>Cena</th>
                <th>Ilość</th>
            </tr>
        </thead><tbody>';
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
            <td><button onclick='getForm(12, ".'"'.$wynik["name"].'"'.")'>EDYTUJ</button></td>
            <td><button onclick='getForm(13, ".'"'.$wynik["name"].'"'.")'>USUŃ</button></td>
        </tr>"; 
    } 
    echo '</tbody></table>';
    echo "<br><button onclick='getForm(11)'>DODAJ</button>";
?>