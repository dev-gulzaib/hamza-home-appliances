    <?php include 'header.php';

    session_start();
    if (isset($_SESSION['order_no'])) {
    // code...

       $order_no = $_SESSION['order_no'];

       $up = "UPDATE orders SET payment_status='Cancel' WHERE order_no='$order_no'";
       if (mysqli_query($conn, $up)) {
        session_unset();
        session_destroy();
    }

}

?>
<body class="home">

    <?php include 'navbar.php';?>

    <div class="main-content main-content-checkout">
        <div class="container">


           <div class="checkout-wrapp">
            <div class="end-checkout-wrapp">
                <div class="end-checkout checkout-form">
                    <div class="">
                        <img src="assets/silva-images/payment-cancel.webp" style="height: 150px;">
                    </div>
                    <h3 class="title-checkend">
                        Your order has been canceled.
                    </h3>
                    <div class="sub-title">
                        Your order could not be completed due to a payment cancellation. If this was a mistake or you need assistance, please contact our support team at <strong><?php echo $web_phone;?></strong> or email us at <strong><?php echo $web_email;?></strong>.
                    </div>
                    <a href="index.php" class="button btn-return">Return to Store</a>
                </div>
            </div>
        </div>

    </div>
</div>    

<?php include 'footer.php';?>


