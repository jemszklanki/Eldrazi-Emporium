<?php
    require("db.php");
    session_start();

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require "PHPMailer/src/Exception.php";
    require "PHPMailer/src/PHPMailer.php";
    require "PHPMailer/src/SMTP.php";

        if (isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
        } else {
            header("Location: index.php");
            exit();
        } 

    function price($itemName){
        require("db.php");
        $sql = "SELECT price FROM cards WHERE name = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $itemName);
        $stmt->execute();

        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $price_decimal = $row['price'];
            $price = (float)$price_decimal;
            $stmt->close();
            return $price;
        } else {
            $stmt->close();
            return null;
        }
        }

        //email
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT email FROM users WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
            if ($row = $result->fetch_assoc()) {
                $email = $row['email'];
            } else {
                $email = 'error';
            }
        $stmt->close();
        } else {
        $email = $_SESSION['temail'];
        //unset($_SESSION['temail']);
        }

        //shipment nazwa i cena
    if (isset($_SESSION['shipment_method'])) {
        $shipment_id = $_SESSION['shipment_method'];

        $stmt = $conn->prepare("SELECT shipment_name, shipment_price FROM order_shipment WHERE shipment_id = ?");
        $stmt->bind_param("i", $shipment_id);
        $stmt->execute();
        $stmt->bind_result($shipment_name, $shipment_price);
        if ($stmt->fetch()) {
        } else {
            $shipment_name = "error";
            $shipment_price = "error";
        }

       
        $stmt->close();
        
        //unset($_SESSION['shipment_method']);
    }
        // ulica i numer o ile są
    if (isset($_SESSION['ulica'])) {
        $ulica = $_SESSION['ulica'];
        $ulicatext= "<br/>Adres: " . $ulica;
        //unset($_SESSION['ulica']);
    }
    if (isset($_SESSION['numer'])) {
        $numer= $_SESSION['numer'];
        $numertext = " " . $numer;
        //unset($_SESSION['numer']);
    }
    
        //metoda płatności
    if (isset($_SESSION['payment_method'])) {
        $payment_id = $_SESSION['payment_method'];

        $stmt = $conn->prepare("SELECT payment_name FROM order_payment WHERE payment_id = ?");
        $stmt->bind_param("i", $payment_id);
        $stmt->execute();
        $stmt->bind_result($payment_name);
        if ($stmt->fetch()) {
        } else {
            $payment_name = "error";
        }
        //unset($_SESSION['payment_method']);
    }
        //całkowita cena
    if (isset($_SESSION['totalPrice'])) {
        $totalPrice = $_SESSION['totalPrice'];
        //unset($_SESSION['totalPrice']);
        //unset($_SESSION['cardsPrice']);
    }

        //data i godzina
    date_default_timezone_set('Europe/Warsaw');
    $date = date('Y-m-d H:i:s');

     // karty z sesji cart
    $products_array = '';
    ob_start();
    ?>
    <!-- Tabela wysyłana mailem -->
    <table>
            <thead>
                <tr>
                    <th>Przedmiot</th>
                    <th>Ilość</th>
                    <th>Cena</th>
                </tr>
            </thead>
            <tbody>
                    <?php foreach ($cart as $itemName => $quantity): ?>
                        <tr>
                            <td><?= is_array($itemName) ? 'Nieprawidłowa nazwa' : htmlspecialchars($itemName) ?></td>
                            <td><?= htmlspecialchars((string)$quantity) ?></td>
                            <td><?= price($itemName) ?> zł</td>
                        </tr> 
                    <?php endforeach;  ?>
            </tbody>
    </table>

    <?php
        $products_array = ob_get_clean();

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'ernestkos11@gmail.com';
    $mail->Password   = 'heyc vbge thfe ukzb';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->setFrom("ernestkos11@gmail.com");
    $mail->addAddress($email);

    $mail->IsHTML(true);
    $mail->Subject = "Purchase Eldrazi Emporium";
    ?>

    <?php

    // Treść maila
    $email_text = "
        <h2>Dziękujemy za zakupy w naszym sklepie</h2>
        <br/> $date
        <br/>Dowóz: $shipment_name
        <br/>Cena dowozu: $shipment_price zł
        $ulicatext
        $numertext
        <br/>Sposób płatności: $payment_name
        <br/>Całkowita cena: $totalPrice zł
        <br/>Zawartość zamówienia:
    ";

    
    
    $email_template = $email_text . " " . $products_array;
    echo$email_template;

    
    $mail->Body = $email_template;
     try {
         //$mail->send();
     } catch (Exception $e) {
         echo "Wiadomość nie mogła zostać wysłana: {$mail->ErrorInfo}";
         die;
     }
    echo$user_id . " " .  $date . " " . $ulica . " " . $numer . " " . '1' . " " . $shipment_id . " " . $payment_id . " " . $totalPrice;
    
     if (isset($_SESSION['user_id'])) {
        $sql = "INSERT INTO orders (user_id, street, number, shipment_id, payment_id, order_price) VALUES (?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("issiis", $user_id,$ulica,$numer,$shipment_id,$payment_id,$totalPrice);
        $stmt->execute();
     } else {
        //bez zalogowania
        $stmt = $conn->prepare("INSERT INTO `orders`(`street`, `number`, `shipment_id`, `payment_id`, `order_price`) VALUES ('$ulica','$numer','$shipment_id','$payment_id','$totalPrice')");
     }
        if ($stmt->execute()){
             //header("Location: registered.php");
             echo"super";
             //exit(); 
        } else {
            $error_msg = "Error: " . $stmt->error;
         }
     $stmt->close();

?>