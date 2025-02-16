<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

function sendEmail($to, $subject, $body, $from = 'venly@gmail.com', $fromName = 'Venly')
{
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'abhishekshakya98.com@gmail.com';
        $mail->Password = 'vbte dgaq zncd urhw';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom($from, $fromName);
        $mail->addAddress($to);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AltBody = strip_tags($body);

        $mail->send();
        return true; 
    } catch (Exception $e) {
        echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return false;
    }
}
?>