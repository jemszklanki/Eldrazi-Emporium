<?php
    $query = mysqli_query($conn,"SELECT * FROM posts");
    echo '<table class="col3"><thead>
            <tr>
                <th>Nazwa</th>
                <th>Edytuj</th>
                <th>Usuń</th>
            </tr>
        </thead><tbody>';
    while ($wynik = @mysqli_fetch_array($query)) {
        echo "<tr>
            <td>".$wynik["title"]."</td>
            <td><button onclick='getForm(72, ".'"'.$wynik["id"].'"'.")'>EDYTUJ</button></td>
            <td><button onclick='getForm(73, ".'"'.$wynik["id"].'"'.")'>USUŃ</button></td>
        </tr>"; 
    }
    echo '</tbody></table>';
    echo "<br><button onclick='getForm(71)'>DODAJ</button>";
?>