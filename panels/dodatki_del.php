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
?>
<p>Na pewno usunąć <?php 
    $query = mysqli_query($conn,"SELECT expansion_name FROM expansions WHERE id={$_GET['index']}");
    while ($wynik = @mysqli_fetch_array($query)) {
        echo $wynik['expansion_name'];
    }
    echo $_GET['index']; 
?>?</p>
<button onclick='doQuery(23, "<?php echo $_GET['index'] ?>")'>TAK</button>
<button onclick='getForm(1)'>NIE</button>