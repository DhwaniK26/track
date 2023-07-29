<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

$mail = new PHPMailer(true);

try {                  
    $mail->isSMTP();                                        
    $mail->Host       = 'smtp.gmail.com';                   
    $mail->SMTPAuth   = true;                               
    $mail->Username   = '21amtics252@gmail.com';             
    $mail->Password   = 'somyorkqqmanmttb';                 
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;                                

    $mail->setFrom('21amtics252@gmail.com');
    $mail->addAddress('kumarayush2104@gmail.com');
    $mail->isHTML(true);
    
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';

    $mail->send();
} catch (Exception $e) {}

?>

