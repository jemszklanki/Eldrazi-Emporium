<?php
    require_once('../db.php');
    $query = mysqli_query($conn,"SELECT * FROM cards WHERE name LIKE '%{$_GET['name']}%';"); 
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