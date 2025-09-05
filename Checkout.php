<?php include 'header.php';

session_start();

if (isset($_POST['proceed_payment'])) {
    // code...
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $state=$_POST['state'];
    $zip=$_POST['zip_code'];
    $city=$_POST['city'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $phone_no=$_POST['phone_no'];
    $payment_method = isset($_POST['payment_method']) ? $_POST['payment_method'] : 'Stripe';


    $cus_name=$first_name.' '.$last_name;

    $order_no=rand(99999,1000000);
    $order_date=date('d-m-Y');
    $order_time=date('h:i:s');
    $transaction_no=rand(9999,100000);

    $cart="SELECT * FROM cart WHERE ip_address = '$user_ipAddress'";
    $rz_rzlt=mysqli_query($conn,$cart);
    $total_cart_items=mysqli_num_rows($rz_rzlt);
    $total_order_amt=0;
    while ($row_cart = mysqli_fetch_assoc($rz_rzlt)) {

        $item_total = $row_cart['single_item_price'] * $row_cart['qty'];
        $total_order_amt += $item_total;


        $prod_no=$row_cart['prod_no'];
        $qty=$row_cart['qty'];
        $single_item_price=$row_cart['single_item_price'];

        $insert2="INSERT INTO order_products(order_no,prod_no,qty,single_item_price) 
        VALUES('$order_no','$prod_no','$qty','$single_item_price')";
        mysqli_query($conn,$insert2);

    }
    
    $insert="INSERT INTO orders(order_no,order_date,transaction_no,total_products,total_order_amt,ip_address,order_time,cus_name,cus_state,cus_city,cus_zip,cus_address,cus_email,cus_phone,pay_via,payment_status,order_status)

    VALUES('$order_no','$order_date','$transaction_no','$total_cart_items','$total_order_amt','$user_ipAddress','$order_time','$cus_name','$state','$city','$zip','$address','$email','$phone_no','$payment_method','Pending','Pending')";
    if (mysqli_query($conn,$insert)) {


$del_cart="DELETE FROM cart WHERE ip_address = '$user_ipAddress'";
mysqli_query($conn,$del_cart);

   if ($payment_method=='Stripe') {
       
$_SESSION['order_no']=$order_no;
$total_order_amt_new=$total_order_amt*100;
$_SESSION['pay_final_amt']=$total_order_amt_new;
$_SESSION['customer_name']=$cus_name;
$_SESSION['transaction_no']=$transaction_no;
$_SESSION['total_order_amt']=$total_order_amt;

?>
 <script type="text/javascript">
    window.location.href='Stripe/create-checkout-session.php';
</script>
<?php


   }
    



    }
}

?>

<body class="inblog-page">
    <?php include 'navbar.php';?>

    <div class="main-content main-content-checkout">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-trail breadcrumbs">
                        <ul class="trail-items breadcrumb">
                            <li class="trail-item trail-begin">
                                <a href="index.html">Home</a>
                            </li>
                            <li class="trail-item trail-end active">
                                Checkout
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <h3 class="custom_blog_title">
                Checkout
            </h3>
            <form action="" method="POST">
                <div class="checkout-wrapp">
                    <div class="shipping-address-form-wrapp">
                        <div class="shipping-address-form  checkout-form">
                            <div class="row-col-1 row-col">
                                <div class="shipping-address">
                                    <h3 class="title-form">
                                        Shipping Address
                                    </h3>
                                    <p class="form-row form-row-first">
                                        <label class="text">First name</label>
                                        <input required title="first" type="text" class="input-text" name="first_name">
                                    </p>
                                    <p class="form-row form-row-last">
                                        <label class="text">Last name</label>
                                        <input required name="last_name" title="last" type="text" class="input-text">
                                    </p>
                                    <p class="form-row form-row-first">
                                        <label class="text">Country</label>
                                        <select required title="country" data-placeholder="United Kingdom" class="chosen-select"
                                        tabindex="1">
                                        <option value="United States">United States</option>
                                    </select>
                                </p>
                                <p class="form-row form-row-last">
                                    <label class="text">State</label>
                                    <select name="state" required title="state" data-placeholder="Select a state" class="chosen-select" tabindex="1">
                                      <option value="">Select a state</option>
                                      <option value="Alabama">Alabama</option>
                                      <option value="Alaska">Alaska</option>
                                      <option value="Arizona">Arizona</option>
                                      <option value="Arkansas">Arkansas</option>
                                      <option value="California">California</option>
                                      <option value="Colorado">Colorado</option>
                                      <option value="Connecticut">Connecticut</option>
                                      <option value="Delaware">Delaware</option>
                                      <option value="Florida">Florida</option>
                                      <option value="Georgia">Georgia</option>
                                      <option value="Hawaii">Hawaii</option>
                                      <option value="Idaho">Idaho</option>
                                      <option value="Illinois">Illinois</option>
                                      <option value="Indiana">Indiana</option>
                                      <option value="Iowa">Iowa</option>
                                      <option value="Kansas">Kansas</option>
                                      <option value="Kentucky">Kentucky</option>
                                      <option value="Louisiana">Louisiana</option>
                                      <option value="Maine">Maine</option>
                                      <option value="Maryland">Maryland</option>
                                      <option value="Massachusetts">Massachusetts</option>
                                      <option value="Michigan">Michigan</option>
                                      <option value="Minnesota">Minnesota</option>
                                      <option value="Mississippi">Mississippi</option>
                                      <option value="Missouri">Missouri</option>
                                      <option value="Montana">Montana</option>
                                      <option value="Nebraska">Nebraska</option>
                                      <option value="Nevada">Nevada</option>
                                      <option value="New Hampshire">New Hampshire</option>
                                      <option value="New Jersey">New Jersey</option>
                                      <option value="New Mexico">New Mexico</option>
                                      <option value="New York">New York</option>
                                      <option value="North Carolina">North Carolina</option>
                                      <option value="North Dakota">North Dakota</option>
                                      <option value="Ohio">Ohio</option>
                                      <option value="Oklahoma">Oklahoma</option>
                                      <option value="Oregon">Oregon</option>
                                      <option value="Pennsylvania">Pennsylvania</option>
                                      <option value="Rhode Island">Rhode Island</option>
                                      <option value="South Carolina">South Carolina</option>
                                      <option value="South Dakota">South Dakota</option>
                                      <option value="Tennessee">Tennessee</option>
                                      <option value="Texas">Texas</option>
                                      <option value="Utah">Utah</option>
                                      <option value="Vermont">Vermont</option>
                                      <option value="Virginia">Virginia</option>
                                      <option value="Washington">Washington</option>
                                      <option value="West Virginia">West Virginia</option>
                                      <option value="Wisconsin">Wisconsin</option>
                                      <option value="Wyoming">Wyoming</option>
                                  </select>

                              </p>
                              <p class="form-row form-row-last">
                                <label class="text">City</label>
                                <input required name="city" title="City" type="text" class="input-text">

                            </p>
                            <p class="form-row form-row-first">
                                <label class="text">Zip code</label>
                                <input required name="zip_code" title="zip" type="text" class="input-text">
                            </p>
                            <p class="form-row">
                                <label class="text">Address</label>
                                <input required name="address" title="address" type="text" class="input-text">
                            </p>

                            <p class="form-row form-row-first">
                                <label class="text">Email</label>
                                <input required name="email" title="email" type="text" class="input-text">
                            </p>

                            <p class="form-row form-row-last">
                                <label class="text">Phone No</label>
                                <input required name="phone_no" title="phone" type="text" class="input-text">
                            </p>

<style type="text/css">
    .payment-options {
  display: flex;
  gap: 20px;
}

.payment-box {
  border: 2px solid #ccc;
  padding: 20px 40px;
  border-radius: 10px;
  cursor: pointer;
  transition: 0.3s;
  text-align: center;
  flex: 1;
/*  background-color: #f9f9f9;*/
  background-color: #AB8E66;
  color: white;
}



.payment-box1 {
  border: 2px solid #ccc;
  padding: 20px 40px;
  border-radius: 10px;
  cursor: pointer;
  transition: 0.3s;
  text-align: center;
  flex: 1;
  background-color: #f9f9f9;
  opacity: .5;
}
.payment-box.active {
  border-color: #AB8E66;
  color: white;
  background-color: #AB8E66;
}

.payment-box label {
  font-size: 18px;
  font-weight: bold;
  cursor: pointer;
}


</style>
                         <div class="payment-method-form checkout-form">
  <div class="payment-options">
    <div class="payment-box" data-method="stripe">
      <input checked required type="radio" name="payment_method" id="stripe" value="Stripe" hidden>
      <label for="stripe">Stripe</label>
    </div>
    <div class="payment-box1" data-method="paypal">
      <input disabled required type="radio" name="payment_method" id="paypal" value="PayPal" hidden>
      <label for="paypal">PayPal</label>
    </div>
  </div>
</div>



                        </div>
                    </div>

                    <div class="row-col-2 row-col">
                        <div class="your-order">
                            <h3 class="title-form">
                                Your Order
                            </h3>
                            <ul style="height: 450px;overflow-y: auto;" class="list-product-order">

                              <?php 
$total_price = 0; // Initialize total

$sql = "SELECT c.*, p.product_name, p.product_price, p.product_image    
FROM cart c 
JOIN products p ON c.prod_no = p.prod_no 
WHERE c.ip_address = '$user_ipAddress' 
ORDER BY c.id DESC";

$rztl1 = mysqli_query($conn, $sql);

if ($rztl1->num_rows > 0) {
    while ($row1 = mysqli_fetch_assoc($rztl1)) {
        // Calculate subtotal for current item
        $item_total = $row1['product_price'] * $row1['qty'];
        $total_price += $item_total;
        ?>
        <li class="product-item-order">
            <div class="product-thumb">
                <a href="#">
                    <img style="width: 100%;height:100px" src="Admin/Product_Image/<?php echo $row1['product_image'];?>" alt="img">
                </a>
            </div>
            <div class="product-order-inner">
                <h5 class="product-name">
                    <a href="#"><?php echo $row1['product_name'];?></a>
                </h5>
                <div class="price">
                    $<?php echo $row1['product_price']; ?>
                    <span class="count">x<?php echo $row1['qty']; ?></span>
                </div>
            </div>
        </li>
        <?php 
    } 
}
else{
    ?>
    <script type="text/javascript">
        alert('Please buy some products');
        window.location.href='index';
    </script>
    <?php
}
?>

</ul>
<div class="order-total">
    <span class="title">Total Price:</span>
    <span class="total-price">$<?php echo number_format($total_price, 2); ?></span>
</div>

</div>
</div>


</div>
<button name="proceed_payment" class="button button-payment">Proceed to payment</button>

</div>

</div>
</form>
</div>
</div>

<?php include 'footer.php';?>

<script type="text/javascript">
    $(document).ready(function() {
  $('.payment-box').click(function() {
    $('.payment-box').removeClass('active'); // Remove active from all
    $(this).addClass('active'); // Add to clicked
    $(this).find('input[type="radio"]').prop('checked', true); // Select the radio
  });
});

</script>
