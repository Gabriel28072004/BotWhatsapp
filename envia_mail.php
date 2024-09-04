<?php

require_once('conn.php');

$email = $_POST['email_login'];

$busca = "SELECT senha_usuario FROM login WHERE email_usuario = '$email'";
$resultado_busca = mysqli_query($conn, $busca);
use PHPMailer\PHPMailer\PHPMailer;
    if(mysqli_num_rows($resultado_busca) == 1){

       $row = mysqli_fetch_assoc($resultado_busca);
       $senha = $row["senha_usuario"];
     
//Import the PHPMailer class into the global namespace

        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';

        //Create a new PHPMailer instance
        $mail = new PHPMailer();

        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'gbrdias2807@gmail.com'; // Your Mailtrap username
        $mail->Password = 'nnif rcfg nphk vzoa'; // Your Mailtrap password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //PHPMailer::ENCRYPTION_SMTPS
        //$mail->Port = 465; // se usar ENCRYPTION_SMTPS
        $mail->Port = 587;

        // Sender and recipient settings
        $mail->setFrom('gbrdias2807@gmail.com', 'Gestor Sistema');
        $mail->addAddress($email);

        // Sending plain text email
        $mail->isHTML(false); // Set email format to plain text
        $mail->Subject = 'Botz - Recuperando senha';
        $mail->Body    = "A sua senha é:".$senha."";

        // Send the email
        if(!$mail->send()){
            echo "<html><script>window.location.href='esqueci_senha.php?resultado=-1'</script></html>";
        } else {
            echo "<html><script>window.location.href='esqueci_senha.php?resultado=1'</script></html>";
        }

    }   