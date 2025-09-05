<?php
include 'db.php';

$prod_no = $_POST['prod_no'];
$ip = $_SERVER['REMOTE_ADDR'];

$sql = "DELETE FROM cart WHERE prod_no = '$prod_no' AND ip_address = '$ip'";
mysqli_query($conn, $sql);
