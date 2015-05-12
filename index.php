<?php
/**
 * Created by PhpStorm.
 * User: peter
 * Date: 5/12/2015
 * Time: 11:22 AM
 */
//require the vendor autoload  file, which auto-loads composer classes(packages).
require __DIR__ . '/vendor/autoload.php';

//PHPMailer Object
$mail = new PHPMailer;

//From email address and name
$mail->From = "binmonk@gmail.com";
$mail->FromName = "Full Name";

//To address and name
$mail->addAddress("bikundo.peter@gmail.com", "bikundo Peter");

//Address to which recipient will reply
$mail->addReplyTo("binmonk@gmail.com", "Reply");

//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = "Subject Text";
$mail->Body = "<i>Mail body in HTML</i>";
$mail->AltBody = "This is the plain text version of the email content";

if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message has been sent successfully";
}