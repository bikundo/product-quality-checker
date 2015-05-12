<?php
/**
 * Created by PhpStorm.
 * User: peter
 * Date: 5/12/2015
 * Time: 11:22 AM
 */
//require the vendor autoload  file, which auto-loads composer classes(packages).
require __DIR__ . '/vendor/autoload.php';
$data = [];
$data['message'] = 'long descriptive body of assessment results';
send_email($data);

function send_email($data)
{
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

    $mail->Subject = "Quality Check results.";
    $mail->Body = "<i>".$data['message']."</i>";

    if (!$mail->send()) {
        return "Mailer Error: " . $mail->ErrorInfo;
    } else {
        return "Message has been sent successfully";
    }

}