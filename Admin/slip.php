<?php include 'header.php';

$id=$_GET['id'];
$sql = "SELECT screenshot FROM recharge_amt WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$image_blob = $row['screenshot'];

// Set the content type header based on the image format
// header("Content-type: image/png");

// Output the blob data
?>

<!-- Use the img tag to display the image -->
<img style="width: 100%;" src="data:image/png;base64,<?php echo base64_encode($image_blob); ?>" alt="Image">
