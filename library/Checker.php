<?php

/**
 * Created by PhpStorm.
 * User: peter
 * Date: 5/12/2015
 * Time: 12:42 PM
 */
class Checker
{
    /**
     *
     */
    function __construct()
    {
        $this->required_fieds = ['description', 'title', 'slug'];
    }

    /**
     * @param $string
     * @return bool
     */
    public static function check_whitespace($string)
    {
        if (strpos($string, ' ') > 0) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @param $item
     * @return array
     */
    public function check_required_fields($item)
    {
        $messages = [];
        foreach ($this->required_fieds as $field) {
//            check if product field exists and is not empty.
            if (array_key_exists($field, $item) && isset($item->$field)) {
                $messages[] = "product has " . " " . $field;
            } else {
                $messages[] = "product does not have  " . " " . $field;
            }
        }

        return $messages;
    }

    /**
     * @param $item
     * @return bool
     */
    public static function check_images($item)
    {
        if (isset($item->images) && !empty($item->images)) {
//            image(s) exist for this item.
            return true;
        } else {
//            no image for this item.
            return false;
        }
    }

    /**
     * @param $message
     * @param $email
     * @return bool
     * @throws Exception
     * @throws phpmailerException
     */
    public static function send_email($message, $email)
    {
        //PHPMailer Object
        $mail = new PHPMailer;

//From email address and name
        $mail->From = "binmonk@gmail.com";
        $mail->FromName = "Full Name";

//To address and name
        $mail->addAddress($email, "Entry Clerk");

//Address to which recipient will reply
        $mail->addReplyTo("binmonk@gmail.com", "Sent from.");

//Send HTML or Plain Text email
        $mail->isHTML(true);

        $mail->Subject = "Quality Check results.";
        $mail->Body = "<h3>" . nl2br($message) . "</h3>";

        if (!$mail->send()) {
            return false;
        } else {
            return true;
        }

    }

}