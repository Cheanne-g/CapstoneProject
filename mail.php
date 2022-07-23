<?php
if (isset($_POST['submit'])) {
	include_once "phpmailer/src/Exception.php";
	include_once "phpmailer/src/PHPMailer.php";
	require 'phpmailer/src/SMTP.php';
        require 'phpmailer/PHPMailerAutoload.php';
        //require 'phpmailer/PHPMailer.php';

        function sendemail($to, $fromName, $body, $attachment){
           	 $mail->Host = "smtp.gmail.com"; // your SMTP server
             $mail->Port = 587;
 			 $mail->SMTPDebug = 2;
 			 $mail->CharSet  = "utf-8";

            $mail = new PHPMailer\PHPMailer\PHPMailer();
            $mail->setFrom($fromName);
            $mail->addAddress($to);
            $mail-> addAttachment($attachment);

            $mail->Subject = "Contact Form - Email";
            $mail->Body = $body;
             $mail->Username = 'cheanner.15@gmail.com';                 // SMTP username
 			 $mail->Password = 'hamBOGG_1425';                           // SMTP password
  			$mail->SMTPSecure = 'tls';  
            $mail-> isHTML(isHtml: false);

            return $mail-> send();
        }

        $name = $_POST['username'];
        
        $remail = $_POST['Remail'];
        $body = $_POST['body'];

        $file = "files/".basename($_FILES['attachment']['name']);
        if (move_uploaded_file($_FILES['attachment']['tmp_name'], $file)) {
            if (sendemail($remail,$name,$body,$file)) {
                $msg = 'Email sent!';
                header(location:"supplyoffice.php");

            }
            else{
                 $msg = 'Email failed!';

             }
       } else{
            $msg = 'Please check your files!';
        }
    } 
?>