<?php
/**
 * Created by PhpStorm.
 * User: peter
 * Date: 5/12/2015
 * Time: 11:22 AM
 */
//require the vendor autoload  file, which auto-loads composer classes(packages).
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/library/Checker.php';
$data = [];
$data['message'] = 'long descriptive body of assessment results';
$c = new Checker();
if (Checker::send_email($data)) {
    echo "sent";
} else {
    echo "error!!";
}

