<?php
/**
 * Created by PhpStorm.
 * User: peter
 * Date: 5/12/2015
 * Time: 11:22 AM
 */
//require the vendor autoload  file, which auto-loads composer classes(packages).
require __DIR__ . '/vendor/autoload.php';

$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("binmonk@gmail.com","My subject",$msg);