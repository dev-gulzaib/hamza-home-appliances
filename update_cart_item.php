<?php
// Include database connection file
include('db.php');

// Check if id and qty are passed
    $id = $_POST['id'];
    $qty = $_POST['qty'];

    if (is_numeric($qty) && $qty > 0) {
        $up="UPDATE cart SET qty=$qty WHERE id='$id'";

            if (mysqli_query($conn,$up)) {
                echo 'success';  // Successfully updated
            } else {
                echo 'error: item not found or quantity unchanged';  // No change
            }
        } else {
            echo 'error: ';
        }


?>
