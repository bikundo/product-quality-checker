<?php
/**
 * Created by PhpStorm.
 * User: peter
 * Date: 5/12/2015
 * Time: 11:22 AM
 */
//require the vendor autoload  file, which auto-loads composer classes(packages).
require __DIR__ . '/vendor/autoload.php';
//require the checker class.
require __DIR__ . '/library/Checker.php';
$c = new Checker;
$response = [];
if (!isset($_POST['product'])) {
    $response['success'] = 'false';
    $response['message'] = 'no products in your request';
    echo json_encode($response);
    exit();
}
$products_string = $_POST['product'];
$products = json_decode($products_string);
$res = quality_check($products);
//send email with results.
foreach($res as $key => $value){
    if(is_numeric($value)){
        unset($res[$key]);
    }
}
$message = implode("\n", $res);

$email = $products->email;
$c::send_email($message, $email);
//Json response.
$response['success'] = 'true';
$response['message'] = 'products found';
$response['results'] = $res;
header('Content-Type: application/json');
echo json_encode($response);

/**
 * Run all checks and
 * @param $item
 * @return array
 */
function quality_check($item)
{
    $c = new Checker;
    $messages = [];
    $product = $item->product;

//    check slug whitespace
    if ($c::check_whitespace($product->slug)) {
        $messages[] = 'There are no whitespaces around slug string.';
    } else {
        $messages[] = 'There are whitespaces around slug string.';
    }
//    check if product has related images.

    if ($c::check_images($product)) {
        $messages[] = 'The product has images.';
    } else {
        $messages[] = 'The product has no images.';
    }

//    check required fields
    $required_fields = $c->check_required_fields($product);
    foreach ($required_fields as $key => $msg) {
        $messages[] = array_push($messages, $msg);
    }

    return $messages;

}




