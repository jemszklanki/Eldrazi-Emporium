<?php
    $query = mysqli_query($conn,"SELECT * FROM expansions");
    echo '<table class="col3"><thead>
            <tr>
                <th>Nazwa</th>
                <th>Edytuj</th>
                <th>Usuń</th>
            </tr>
        </thead><tbody>';
    while ($wynik = @mysqli_fetch_array($query)) {
        echo "<tr>
            <td>".$wynik["expansion_name"]."</td>
            <td><button onclick='getForm(22, ".'"'.$wynik["id"].'"'.")'>EDYTUJ</button></td>
            <td><button onclick='getForm(23, ".'"'.$wynik["id"].'"'.")'>USUŃ</button></td>
        </tr>"; 
    }
    echo '</tbody></table>';
    echo "<br><button onclick='getForm(21)'>DODAJ</button>";
?>