<?php
include('../db.php'); // Include your DB connection

if(isset($_POST['category_id'])){
  $category_id = $_POST['category_id'];

  // Query to get sub-categories based on selected category
  $sql = "SELECT * FROM sub_categories WHERE cat_id = '$category_id' ORDER BY sub_cat_name ASC";
  $result = mysqli_query($conn, $sql);

  // Check if sub-categories exist
  if(mysqli_num_rows($result) > 0){
    echo '<option value="">Please select sub category</option>';
    while($row = mysqli_fetch_assoc($result)){
      echo '<option value="' . $row['id'] . '">' . $row['sub_cat_name'] . '</option>';
    }
  } else {
    echo '<option value="">No sub-categories available</option>';
  }
}
?>
