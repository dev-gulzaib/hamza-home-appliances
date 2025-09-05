<?php
require 'vendor/autoload.php'; // Ensure this path is correct

include '../db.php';

session_start();
$pay_final_amt=$_SESSION['pay_final_amt'];
$customer_name=$_SESSION['customer_name'];
$order_no=$_SESSION['order_no'];

$query1 = "SELECT * FROM stripe";
$stmtstmt1 = mysqli_prepare($conn, $query1);
mysqli_stmt_execute($stmtstmt1);
$result1= mysqli_stmt_get_result($stmtstmt1);
$web1 = mysqli_fetch_array($result1);
$secretKey=$web1['secretKey'];
$success_url=$web1['success_url'];
$cancel_url=$web1['cancel_url'];


\Stripe\Stripe::setApiKey($secretKey); // Replace with your Secret Key

$session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'line_items' => [[
        'price_data' => [
            'currency' => 'usd',
            'product_data' => [
                'name' => 'Order no: '. $order_no.' - Customer: '.$customer_name,
            ],
            'unit_amount' => $pay_final_amt, // Amount in pence (10 GBP)
        ],
        'quantity' => 1,
    ]],
    'mode' => 'payment',
    'success_url' => $success_url.'?session_id={CHECKOUT_SESSION_ID}',
    'cancel_url' => $cancel_url,
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $session->url);
exit;
