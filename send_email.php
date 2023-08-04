<?php
require 'path-to-phpmailer/PHPMailerAutoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Create a new PHPMailer instance
    $mail = new PHPMailer;

    // Configure SMTP settings
    $mail->isSMTP();
    $mail->Host = 'smtp.example.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = 'mohitraipr@gmail.com';
    $mail->Password = 'your_email_password';
    $mail->SMTPSecure = 'tls';

    // Set email content
    $mail->setFrom($email, $name);
    $mail->addAddress('recipient@example.com', 'Recipient Name');
    $mail->Subject = 'New Message from Contact Form';
    $mail->Body = $message;

    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent.';
    }
}
?>
