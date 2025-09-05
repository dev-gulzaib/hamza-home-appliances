    <?php include 'header.php';

    
    $order_no=$_GET['order_no'];


    $sql1="SELECT * FROM orders WHERE  order_no='$order_no' AND payment_status='Complete'";
    $rztl1=mysqli_query($conn,$sql1);
    if ($rztl1->num_rows>0) {
        $row= mysqli_fetch_assoc($rztl1);

    }
    else{

        ?>
        <script type="text/javascript">
            window.location.href='index';
        </script>
        <?php

    }


    ?>
    <body class="home">

        <?php include 'navbar.php';?>

        <div class="main-content main-content-checkout">
            <div class="container">


                <div class="checkout-wrapp">
                    <div class="end-checkout-wrapp">
                        <div class="end-checkout checkout-form">
                            <div class="icon">
                            </div>
                            <h3 class="title-checkend">
                                🎉 Congratulations! Your order has been placed successfully.
                            </h3>
                              <div class="sub-title">
                 Your tracking ID is <b><?php echo $row['order_no'];?></b>. You can use this ID to track your order anytime on our website.
For further information regarding your order, feel free to contact us at <strong><?php echo $web_phone;?></strong> or email us at <strong><?php echo $web_email;?></strong>.
                    </div>
                            <a href="index.php" class="button btn-return">Return to Store</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>    

        <?php include 'footer.php';?>


