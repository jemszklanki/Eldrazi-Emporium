<?php
    if(!isset($_SESSION['admin'])){
        header("Location: index.php");
        die;
    }
    $query = mysqli_query($conn,"SELECT * FROM users");
    echo '<table class="col5"><thead>
            <tr>
                <th>ID</th>
                <th>Login</th>
                <th>Email</th>
                <th>Utworzono</th>
                <th>Administrator</th>
                <th>Edytuj</th>
                <th>Usuń</th>
            </tr>
        </thead><tbody>';
    while ($wynik = @mysqli_fetch_array($query)) {
        echo "<tr>
            <td>".$wynik["id"]."</td>
            <td>".$wynik["username"]."</td>
            <td>".$wynik["email"]."</td>
            <td>".$wynik["created_at"]."</td>
            <td>";
            if($wynik["admin"])
                echo "TAK";
            else
                echo "NIE";
            echo "</td>
            <td><button onclick='getForm(32, ".'"'.$wynik["id"].'"'.")'>EDYTUJ</button></td>
            <td><button onclick='getForm(33, ".'"'.$wynik["id"].'"'.")'>USUŃ</button></td>
        </tr>"; 
    }
    echo '</tbody></table>';
?>