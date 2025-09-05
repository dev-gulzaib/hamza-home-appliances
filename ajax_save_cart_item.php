<?php
	include 'db.php';
	$cart_save_prod_no=$_POST['cart_save_prod_no'];

	$sql1="SELECT * FROM products WHERE prod_no='$cart_save_prod_no'";
    $rztl1=mysqli_query($conn,$sql1);
    $row1=mysqli_fetch_assoc($rztl1);

    $product_price=$row1['product_price'];

    $check_sql="SELECT * FROM cart WHERE prod_no='$cart_save_prod_no' AND ip_address='$user_ipAddress'";
    $rztl_check=mysqli_query($conn,$check_sql);
    if ($rztl_check->num_rows>0) {


  

    $sql="UPDATE cart SET qty=qty+1 WHERE prod_no='$cart_save_prod_no' AND ip_address='$user_ipAddress'";
    if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 

    
    }
    else{

   $sql = "INSERT INTO cart(prod_no,ip_address,qty,single_item_price) 
	VALUES ('$cart_save_prod_no','$user_ipAddress',1,'$product_price')";
 if (mysqli_query($conn, $sql)) {

 	  	$sql123xx="SELECT * FROM cart WHERE ip_address='$user_ipAddress'";
        $rztl1xx=mysqli_query($conn,$sql123xx);
        $total_row_items=mysqli_num_rows($rztl1xx);
        
		echo json_encode(array("statusCode"=>201,"new_count"=>$total_row_items));
	} 


    }

	

	mysqli_close($conn);
?>