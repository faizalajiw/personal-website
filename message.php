<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

// echo "check message sent from php and success";
$name = $_POST['name'];
$email = $_POST['email'];
$topic = $_POST['topic'];
$message = $_POST['message'];


if (!empty($email) && !empty($message)) { //jika email dan message tidak diisi 
   if (filter_var($email, FILTER_VALIDATE_EMAIL)) { //jika user memasukkan email yg valid
      $receiver = "faizalajiwibowo9@gmail.com"; //email penerima
      $subject = "From: $name <$email>"; //nanti bakal keliatan contohnya From: Faizal <blabla@gmail.com>
      $body = "Name: $name\nEmail: $email\nTopic: $topic\n\nMessage: $message\n\nRegards,\n$name";
      $sender = "From: $email"; //email pengirim

      try {
         //Server settings
         $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
         $mail->isSMTP();                                            //Send using SMTP
         $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
         $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
         $mail->Username   = 'faizalajiwibowo51@gmail.com';                     //SMTP username
         $mail->Password   = 'Pasdasatya3';                               //SMTP password
         $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
         $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

         //Recipients
         $mail->setFrom('faizalajiwibowo51@gmail.com', 'Agent Faizal');
         $mail->addAddress($receiver);
         $mail->addAddress('faizalajiwibowo9@gmail.com');


         //Content
         $mail->isHTML(true);                                  //Set email format to HTML
         $mail->Subject = $subject;
         $mail->Body    = $body;

         $mail->send();
         echo 'Message has been sent';
      } catch (Exception $e) {
         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }
   } else {
      echo "Please enter a valid email!";
   }
} else {
   echo "Name and Email field is required!";
}
