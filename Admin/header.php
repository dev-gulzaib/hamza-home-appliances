<?php  
include '../db.php';
session_start();
if (isset($_SESSION['admin_id'])) {

     $user_id=$_SESSION['admin_id'];   

}
else{
  header('Location: login.php');
}

?>
<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $web_title;?></title>
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png"
    />
    <link href="dist/css/style.min.css" rel="stylesheet" />
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
<style type="text/css">
 input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
-webkit-appearance: none;
}

input[type=number] {
-moz-appearance:textfield;
}

 ::-webkit-file-upload-button {
      display: none;
    }
    ::file-selector-button {
      display: none;
    }
      </style>
  </head>