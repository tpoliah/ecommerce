<?php

// Include PHPMailer autoload.php file
require 'vendor/autoload.php'; // Adjust the path as needed

// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.example.com'; // SMTP server
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'your-email@example.com'; // SMTP username
    $mail->Password = 'your-password'; // SMTP password
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587; // TCP port to connect to

    // Recipients
    $mail->setFrom('your-email@example.com', 'Your Name');
    $mail->addAddress('recipient@example.com', 'Recipient Name'); // Add a recipient

    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Order Confirmation'; // Email subject
    $mail->Body = '<p>Thank you for your order. Here are the details:</p><p>Order ID: #12345<br>Order Total: $100.00</p>'; // Email body

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
