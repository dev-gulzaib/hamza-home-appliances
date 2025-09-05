<?php
include 'db.php'; // Your DB connection

$sql = "SELECT c.*, p.product_name, p.product_price,  p.product_image    
        FROM cart c 
        JOIN products p ON c.prod_no = p.prod_no 
        WHERE c.ip_address = '$user_ipAddress' ORDER BY c.id DESC";

$result = mysqli_query($conn, $sql);

$items = [];

while ($row = mysqli_fetch_assoc($result)) {
   $items[] = [
  'id' => $row['id'], // Add this line
  'product_name' => $row['product_name'],
  'product_price' => $row['product_price'],
  'product_image' => $row['product_image'],
  'qty' => $row['qty'],
  'total' => $row['qty'] * $row['single_item_price']
];

}

header('Content-Type: application/json');
echo json_encode($items);
