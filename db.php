<?php
$conn=mysqli_connect("localhost","root","","hamza_home_appliances");

// $conn=mysqli_connect("localhost","u624778084_perfuem","v3eM|2YM[","u624778084_perfuem");



$sql_website_settings="SELECT * FROM website_settings";
$rztl_website_settings=mysqli_query($conn,$sql_website_settings);
$row_website_settings=mysqli_fetch_assoc($rztl_website_settings);

$web_name=$row_website_settings['web_name'];
$web_title=$row_website_settings['web_title'];
$web_email=$row_website_settings['web_email'];
$web_phone=$row_website_settings['web_phone'];
$web_address=$row_website_settings['web_address'];


function getUserIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        // Shared internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // Behind a proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        // Default remote IP
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

$user_ipAddress = getUserIP();
?>
