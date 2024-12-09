<?php
if(!isset($_SESSION['admin'])){
    header("Location: index.php");
    die;
}

$sql = "SELECT orders.order_id as id, users.email as email, orders.date as date, 
order_shipment.shipment_name as shipment, concat(orders.street, ' ', orders.number) as address, 
orders.order_price as price, order_status.status_name as status 
FROM `orders` join users on orders.user_id = users.id join order_shipment on orders.shipment_id = order_shipment.shipment_id join order_status on orders.status_id = order_status.status_id;"; 

$query = mysqli_query($conn, $sql);

echo '<table class="col9"><thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Data</th>
                <th>Wysyłka</th>
                <th>Adres</th>
                <th>Wartość</th>
                <th>Status</th>
                <th>Zmień status</th>
                <th>Usuń</th>
            </tr>
        </thead><tbody>';
while ($wynik = @mysqli_fetch_array($query)) {
    echo "<tr>
        <td>".$wynik["id"]."</td>
        <td>".$wynik["email"]."</td>
        <td>".$wynik["date"]."</td>
        <td>".$wynik["shipment"]."</td>
        <td>".$wynik["address"]."</td>
        <td>".$wynik["price"]."</td>
        <td>".$wynik["status"]."</td>
        <td><button onclick='getForm(42, ".'"'.$wynik["id"].'"'.")'>ZMIEŃ</button></td>
        <td><button onclick='getForm(43, ".'"'.$wynik["id"].'"'.")'>USUŃ</button></td>
    </tr>"; 
}
echo '</tbody></table>';
?>