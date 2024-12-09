<?php
    $query = mysqli_query($conn,"SELECT * FROM order_payment");
    echo '<table class="col3"><thead>
            <tr>
                <th>Nazwa</th>
                <th>Edytuj</th>
                <th>Usuń</th>
            </tr>
        </thead><tbody>';
    while ($wynik = @mysqli_fetch_array($query)) {
        echo "<tr>
            <td>".$wynik["payment_name"]."</td>
            <td><button onclick='getForm(62, ".'"'.$wynik["payment_id"].'"'.")'>EDYTUJ</button></td>
            <td><button onclick='getForm(63, ".'"'.$wynik["payment_id"].'"'.")'>USUŃ</button></td>
        </tr>"; 
    }
    echo '</tbody></table>';
    echo "<br><button onclick='getForm(61)'>DODAJ</button>";
?>