<?php
require_once("db.php");
require_once("header.php");
require_once("navbar.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer/src/Exception.php";
require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/SMTP.php";

$error_msg = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_msg = "Invalid email format.";
    }else{
        // Sprawdź czy taki e-mail jest w bazie
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {

            $row = $result->fetch_assoc();
            $password = $row['password'];
            $username = $row['username'];
                
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'ernestkos11@gmail.com';
            $mail->Password   = 'heyc vbge thfe ukzb';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;
        
            $mail->setFrom("ernestkos11@gmail.comm");
            $mail->addAddress($email);
        
            $mail->IsHTML(true);
            $mail->Subject = "Email Verification Eldrazi Emporium";
        
            $email_template = "
                <h1>Nick: $username</h1>
                <h2>Zresetuj stwoje hasło</h2>
                <br/><br/>
                <a href='https://jemszklanki.ct8.pl/reset.php?email=$email&password=$password'> Tutaj </a>
            ";
        
            $mail->Body = $email_template;
            
            try {
                $mail->send();
            } catch (Exception $e) {
                echo "Wiadomość nie mogła zostać wysłana: {$mail->ErrorInfo}";
                die;
            }

            header("Location: resetonmail.php");

            $stmt->close();


        }
    }
}
?>

<div class="form-container">
    <h2 class="text-center">Reset hasła</h2>
    <?php if ($error_msg): ?>
        <div class="alert alert-danger"><?= $error_msg; ?></div>
    <?php endif; ?>
    <form method="POST" action="">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Zrestruj</button>
    </form>
</div>

<?php 
    require_once("footer.php");
?>