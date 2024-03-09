<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer autoloader
require '../vendor/autoload.php';

// Create a new PHPMailer instance
$mail = new PHPMailer(true);
try {
    // SMTP configuration
    $mail->isSMTP();
    $mail->Host = 'smtp-relay.brevo.com'; // Your SMTP server address
    $mail->SMTPAuth = true;
    $mail->Username = 'wissal.benali88@gmail.com'; // Your SMTP username
    $mail->Password = 'd7YmBs6IXHb5jvEf'; // Your SMTP password
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption
    $mail->Port = 587; // TCP port to connect to

    // Sender and recipient settings
    $senderEmail = $_POST['email']; // Retrieve sender's email from the form
    $senderName = $_POST['name']; // Retrieve sender's name from the form
    $recipientEmail = 'wissal.benali22@ump.ac.ma';
    $recipientEmail2 = 'rajae.boufoul22@ump.ac.ma';
    $recipientName = 'Wissal';
    $recipientName2 = 'Rajae';
    $mail->setFrom($senderEmail, $senderName); // Set sender email address and name
    $mail->addAddress($recipientEmail, $recipientName); // Set recipient email address and name
    $mail->addAddress($recipientEmail2, $recipientName2); // Set recipient email address and name

    // Email content
    $subject = 'Fragrancia contact'; // You can customize the subject if needed
    $body = 'Nom: ' . $_POST['name'] . '<br>'; // Include sender's name in the email body
    $body .= 'Numero de telephone: ' . $_POST['phone'] . '<br>'; // Include sender's phone in the email body
    $body .= 'Email: ' . $_POST['email'] . '<br>'; // Include sender's email in the email body
    $body .= 'Message: ' . $_POST['message']; // Include message in the email body
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $body;

    // Send email
    $mail->send();
    echo 'Votre message a été envoyé!';
    $delay = 10;
    sleep($delay);
    header("Location: ../pages/contact.php");

} catch (Exception $e) {
    echo 'Message n\'a pas été envoyé. Mailer Error: ' . $mail->ErrorInfo;
}

