<?php
    $query = mysqli_query($conn,"SELECT * FROM order_shipment");
    echo '<table class="col4"><thead>
            <tr>
                <th>Nazwa</th>
                <th>Koszt</th>
                <th>Edytuj</th>
                <th>Usuń</th>
            </tr>
        </thead><tbody>';
    while ($wynik = @mysqli_fetch_array($query)) {
        echo "<tr>
            <td>".$wynik["shipment_name"]."</td>
            <td>".$wynik["shipment_price"]."</td>
            <td><button onclick='getForm(52, ".'"'.$wynik["shipment_id"].'"'.")'>EDYTUJ</button></td>
            <td><button onclick='getForm(53, ".'"'.$wynik["shipment_id"].'"'.")'>USUŃ</button></td>
        </tr>"; 
    }
    echo '</tbody></table>';
    echo "<br><button onclick='getForm(51)'>DODAJ</button>";
?>