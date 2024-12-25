<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../../vendor/autoload.php';

function sendEmail($to, $subject, $body, $from = 'venly@gmail.com', $fromName = 'Venly')
{
    $mail = new PHPMailer(true); // Create a new PHPMailer instance

    try {
        //Server settings
        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = 'abhishekshakya98.com@gmail.com'; // Your Gmail address
        $mail->Password = 'vbte dgaq zncd urhw'; // Your Gmail password or App Password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption
        $mail->Port = 587; // TCP port to connect to

        //Recipients
        $mail->setFrom($from, $fromName); // Sender's email and name
        $mail->addAddress($to); // Add a recipient

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = $subject; // Set the subject
        $mail->Body = $body; // Set the HTML body
        $mail->AltBody = strip_tags($body); // Set the plain text body for non-HTML mail clients

        // Send the email
        $mail->send();
        return true; // Email sent successfully
    } catch (Exception $e) {
        echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return false; // Email sending failed
    }
}
?>