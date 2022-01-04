<?php
   // echo "check message sent from php and success";
   $name = $_POST['name'];
   $email = $_POST['email'];
   $topic = $_POST['topic'];
   $message = $_POST['message'];


   if(!empty($email) && !empty($message)){ //jika email dan message tidak diisi 
      if(filter_var($email, FILTER_VALIDATE_EMAIL)){ //jika user memasukkan email yg valid
         $receiver = "faizalajiwibowo9@gmail.com"; //email penerima
         $subject = "From: $name <$email>"; //nanti bakal keliatan contohnya From: Faizal <blabla@gmail.com>
         $body = "Name: $name\nEmail: $email\nTopic: $topic\n\nMessage: $message\n\nRegards,\n$name";
         $sender = "From: $email"; //email pengirim
         if(mail($receiver, $subject, $body, $sender)){ //mail() itu syntax php function buat ngirim email
            echo "Success!";
         }else{
            echo "Sorry, failed to send your message :(";
         }
      }else{
         echo "Please enter a valid email!";
      }
   }else{
      echo "Name and Email field is required!";
   }
?>