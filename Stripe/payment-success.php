<?php
require 'vendor/autoload.php';
require '../db.php';



$query1 = "SELECT * FROM stripe";
$stmtstmt1 = mysqli_prepare($conn, $query1);
mysqli_stmt_execute($stmtstmt1);
$result1= mysqli_stmt_get_result($stmtstmt1);
$web1 = mysqli_fetch_array($result1);
$secretKey=$web1['secretKey'];

\Stripe\Stripe::setApiKey($secretKey); // Replace with your Secret Key

session_start();

if (!isset($_GET['session_id'])) {
    die("Invalid access!");
}

$session_id = $_GET['session_id'];

try {
    // 🔍 Retrieve session details from Stripe
    $session = \Stripe\Checkout\Session::retrieve($session_id);
    
    if ($session && $session->payment_status == 'paid') {
        $order_no = $_SESSION['order_no'];
        $transaction_no = $_SESSION['transaction_no'];
        $pay_final_amt = $_SESSION['total_order_amt'];

        $datetime=date('d M Y h:i');

        $up = "UPDATE orders SET payment_status='Complete' WHERE order_no='$order_no'";
        if (mysqli_query($conn, $up)) {

             $insert="INSERT INTO transactions(order_no,transaction_no,pay_via,amount,datetime)
             VALUES('$order_no','$transaction_no','Stripe','$pay_final_amt','$datetime')";
            mysqli_query($conn,$insert);
  
            session_unset();
            session_destroy();
            echo "<script>window.location.href = '../Order-Success.php?order_no=$order_no';</script>";
            exit;
        } else {
            die("Database update failed!");
        }
    } else {
        die("Payment verification failed!");
    }
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
?>
