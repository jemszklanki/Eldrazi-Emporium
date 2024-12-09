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
$defaults_query = mysqli_query($conn,"select username, email, admin, verified from users where id='{$_GET['index']}'");
$defaults_query_result = @mysqli_fetch_array($defaults_query);
?>

<form method="POST" action="panels/uzytkownicy_edit.php?index=<?php echo $_GET['index']?>">
    <h3>Edytuj <?php echo $defaults_query_result['username'];?></h3><br>
    <label>Login</label><br>
    <input type="textfield" name="login" placeholder = "Login" value="<?php echo $defaults_query_result['username'];?>" required><br>
    <label>Email</label><br>
    <input type="textfield" name="email" placeholder = "Email" value="<?php echo $defaults_query_result['email'];?>" required><br>
    <label>Aktywny</label><br>
    <input type="checkbox" name="active" value="1" <?php if($defaults_query_result['verified']){echo 'checked';}?>><br>
    <label>Administrator</label><br>
    <input type="checkbox" name="admin" value="1" <?php if($defaults_query_result['admin']){echo 'checked';}?>><br>
    <input type="submit"><br>
</form>

<?php
    if(
        isset($_POST['login'])   &&
        isset($_POST['email'])
    ){
        
        if(isset($_POST['active'])){
            $active = $_POST['active'];
        }else{
            $active = 0;
        }
        if(isset($_POST['admin'])){
            $admin = $_POST['admin'];
        }else{
            $admin = 0;
        }
        require_once('../db.php');
        $query = mysqli_query($conn, "UPDATE users SET 
        verified = '{$active}', 
        admin = '{$admin}', 
        email = '{$_POST["email"]}', 
        username = '{$_POST["login"]}'
        WHERE
        id = '{$_GET['index']}';");
        header("Location: ../admin.php");
        die;
    }
?>
