<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './vendor/autoload.php';
require './email/Exception.php';
require './email/PHPMailer.php';
require './email/SMTP.php';


if (isset($_POST['submit'])){
    $name= $_POST['name'];
    $email= $_POST['email'];
    $body= $_POST['body'];
	$phone=$_POST['phone'];

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = 2;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'eu.protondns.net';                   // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'info@refacenterprises.com';                   // SMTP username
    $mail->Password   = 'rjnNf8dqeePl';                               // SMTP password
	$mail->AddReplyTo('rfcentp@gmail.com');
    $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($email, $name);
    $mail->addAddress('rfcentp@gmail.com', 'Refac Enterprises');     // Add a recipient
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Message from website';
    $mail->Body    = 'Message from: '.$name.'<br> Phone: '.$phone.' <br> Email: '.$email.'<br> Message: '.$body;

    $mail->send();
	header('Location:message.html');
	echo '<script> alert("Email sent successfully") </script>';
} 
catch (Exception $e) {
	$_SESSION['Error'] = $mail->ErrorInfo;
	header('Location:error.html');
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
else{
    echo 'Message not sent';
	header('Location:error.html');
}