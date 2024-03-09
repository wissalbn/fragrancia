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
    $mail->Host = 'smtp.elasticemail.com'; // Your SMTP server address
    $mail->SMTPAuth = true;
    $mail->Username = 'wissal.benali88@gmail.com'; // Your SMTP username
    $mail->Password = 'A824FCEAD82E828BAB35914119730AB262D0'; // Your SMTP password
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption
    $mail->Port = 2525; // TCP port to connect to

    // Sender and recipient settings
    $senderEmail = $_POST['email']; // Retrieve sender's email from the form
    $senderName = $_POST['name']; // Retrieve sender's name from the form
    $recipientEmail = 'wissal.benali22@ump.ac.ma'; // Replace with recipient's email
    $recipientName = 'Recipient Name'; // Replace with recipient's name
    $mail->setFrom($senderEmail, $senderName); // Set sender email address and name
    $mail->addAddress($recipientEmail, $recipientName); // Set recipient email address and name

    // Email content
    $subject = 'Subject'; // You can customize the subject if needed
    $body = 'Name: ' . $_POST['name'] . '<br>'; // Include sender's name in the email body
    $body .= 'Phone: ' . $_POST['phone'] . '<br>'; // Include sender's phone in the email body
    $body .= 'Email: ' . $_POST['email'] . '<br>'; // Include sender's email in the email body
    $body .= 'Message: ' . $_POST['message']; // Include message in the email body
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $body;

    // Send email
    $mail->send();
    echo 'Email sent successfully';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
}

