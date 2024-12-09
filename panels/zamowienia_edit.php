<?php 
if(!isset($_SESSION['admin'])){
    session_start();
    if(!isset($_SESSION['admin'])){
        header("Location: index.php");
        die;
    }
}
if(!isset($conn)){
    require_once('../db.php');
}
//  potrzebne zeby ustawic wartosci domyslne
$defaults_query = mysqli_query($conn,"select status_id from orders where order_id='{$_GET['index']}'");
$defaults_query_result = @mysqli_fetch_array($defaults_query);
?>
<form method="POST" action="panels/zamowienia_edit.php?index=<?php echo $_GET['index']?>">
    <h3>Zmień status <?php echo $_GET['index']?>:</h3><br>
    <select name="status" required>
        <?php
            $query = mysqli_query($conn,"SELECT * FROM order_status;"); 
            while ($wynik = @mysqli_fetch_array($query)) {
                echo "<option value='{$wynik["status_id"]}' ";
                if($wynik["status_id"]==$defaults_query_result['status_id'])
                {
                    echo "selected='selected'";
                }
                echo ">{$wynik["status_name"]}</option>";
            }
        ?>
    </select><br>
    <input type="submit"><br>
</form>

<?php
    if(
        isset($_POST['status'])
    ){
        require_once('../db.php');
        $query = mysqli_query($conn, "UPDATE orders SET 
        status_id = '{$_POST["status"]}'
        WHERE
        order_id = '{$_GET['index']}';");
        header("Location: ../admin.php");
        die;
    }
?>