<?php
$nom = $_POST['name'];
$email = $_POST['email'];
$sujet = $_POST['subject'];
$message = $_POST['message'];
$allmessage = "Nom: ".$nom."\n"."Email: ".$email."\n"."Sujet: ".$sujet."\n".$message;

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';


 
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'ousmaneahamad8@gmail.com';                     //SMTP username
    $mail->Password   = 'jvkphfxjuyusumtx';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('from@example.com', 'Ahamad Agency');
    $mail->addAddress('ousmaneahamad8@gmail.com');     //Add a recipient

    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $sujet;
    $mail->Body    = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Lemessage a été envoyé avec succès';
} catch (Exception $e) {
    echo "Le message ne peut pas etre envoyé. Mailer Error: {$mail->ErrorInfo}";
}