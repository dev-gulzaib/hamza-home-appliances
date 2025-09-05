<?php include 'header.php';


if (isset($_POST['save'])) {
    // Fetch product details from form
    $product_name = $_POST['product_name'];
    $product_cat = $_POST['product_cat'];
    $product_sub_cat = $_POST['product_sub_cat'];
    $product_price = $_POST['product_price'];
    $product_old_price = $_POST['product_old_price'];
    $short_desc = $_POST['short_desc'];
    $long_description = $_POST['long_description'];

    // Handle checkboxes (optional fields)
    $best_seller = isset($_POST['best_seller']) ? 1 : 0;
    $new_arrivals = isset($_POST['new_arrivals']) ? 1 : 0;
    $new_top_rated = isset($_POST['new_top_rated']) ? 1 : 0;
    $featured_product = isset($_POST['featured_product']) ? 1 : 0;
    $p_status = $_POST['p_status'];

    // Product number
    $prod_no = rand(0, 1000000);

    // Handle main product image
    $product_image = mysqli_real_escape_string($conn, $_FILES['product_image']['name']);
    $target_dir = "Product_Image/";
    $path = $target_dir . $prod_no . '_' . $product_image;
    $target_file = $target_dir . basename($_FILES["product_image"]["name"]);
    move_uploaded_file($_FILES['product_image']['tmp_name'], $path);
    $product_image = $prod_no . '_' . $product_image;

    // Insert main product data into the products table
    $insert_product = "INSERT INTO products (
                          prod_no, 
                          product_name, 
                          product_cat, 
                          product_sub_cat, 
                          product_price, 
                          product_old_price, 
                          short_desc, 
                          product_image, 
                          long_description, 
                          best_seller, 
                          new_arrivals, 
                          new_top_rated, 
                          featured_product, 
                          p_status
                      ) VALUES (
                          '$prod_no', 
                          '$product_name', 
                          '$product_cat', 
                          '$product_sub_cat', 
                          '$product_price', 
                          '$product_old_price', 
                          '$short_desc', 
                          '$product_image', 
                          '$long_description', 
                          '$best_seller', 
                          '$new_arrivals', 
                          '$new_top_rated', 
                          '$featured_product', 
                          '$p_status'
                      )";

    if (mysqli_query($conn, $insert_product)) {
        // Now, handle multiple images
        if (isset($_FILES['other_images']) && count($_FILES['other_images']['name']) > 0) {
            $total_files = count($_FILES['other_images']['name']);
            
            for ($i = 0; $i < $total_files; $i++) {
                $file_name = $_FILES['other_images']['name'][$i];
                $file_tmp = $_FILES['other_images']['tmp_name'][$i];
                $file_path = "Product_Image/other_" . $prod_no . '_' . $file_name;
                
                if (move_uploaded_file($file_tmp, $file_path)) {
                    // Insert each image into product_images table
                    $insert_image = "INSERT INTO product_images (prod_no, p_image) VALUES ('$prod_no', '$file_path')";
                    mysqli_query($conn, $insert_image);
                }
            }
        }
        
  $product_key_points = count($_POST["product_key_points"]);
 if($product_key_points > 0)
{
  for($i=0; $i<$product_key_points; $i++)
  {
    if(trim($_POST["product_key_points"][$i] != ''))
    {
      $sql_edu = "INSERT INTO products_key_points(prod_no,key_points) VALUES('$prod_no','".$_POST["product_key_points"][$i]."')";
      if (mysqli_query($conn, $sql_edu)) {

        
}
    }
  }
}
        ?>
        <script type="text/javascript">
            alert('Product added successfully.');
            window.location.href=''; // Redirect to another page
        </script>
        <?php
    } else {
        echo "Error: " . $insert_product . "<br>" . mysqli_error($conn);
    }
}
?>


<body>

  <div class="preloader">
    <div class="lds-ripple">
      <div class="lds-pos"></div>
      <div class="lds-pos"></div>
    </div>
  </div>
  <!-- ============================================================== -->
  <!-- Main wrapper - style you can find in pages.scss -->
  <!-- ============================================================== -->
  <div
  id="main-wrapper"
  data-layout="vertical"
  data-navbarbg="skin5"
  data-sidebartype="full"
  data-sidebar-position="absolute"
  data-header-position="absolute"
  data-boxed-layout="full"
  >

  <header class="topbar" data-navbarbg="skin5">
    <?php include 'navbar.php';?>
  </header>

  <?php include 'sidebar.php';?>

  <div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
      <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
          <h4 class="page-title">Add New Product</h4>

        </div>
      </div>
    </div>

    <div class="container-fluid">
      <!-- ============================================================== -->
      <!-- Start Page Content -->
      <!-- ============================================================== -->
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
              <div class="card-body">
                <h4 class="card-title">Product Details</h4>

                <div class="row mt-2">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <label for="lname" class="text-end control-label col-form-label">Product Name*</label>
                    <input type="" class="form-control" name="product_name" required placeholder="Enter Product Name">                       
                  </div>
                </div>


                <div class="row mt-2">
                  <!-- Product Category Dropdown -->
                  <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <label for="category" class="text-end control-label col-form-label">Product Category*</label>
                    <select class="form-control" name="product_cat" id="product_cat" required>
                      <option value="">Please select category</option>
                      <?php 
                      $sql1 = "SELECT * FROM categories ORDER BY cat_name ASC";
                      $rztl1 = mysqli_query($conn, $sql1);
                      if ($rztl1->num_rows > 0) {
                        while ($row1 = mysqli_fetch_assoc($rztl1)) {
                          ?>
                          <option value="<?php echo $row1['id']; ?>"><?php echo $row1['cat_name']; ?></option>
                        <?php } } ?>
                      </select>                       
                    </div>

                    <!-- Product Sub-Category Dropdown -->
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                      <label for="sub_category" class="text-end control-label col-form-label">Product Sub Category (Optional)</label>
                      <select class="form-control" name="product_sub_cat" id="product_sub_cat">
                        <option value="">Please select sub category</option>
                      </select>                       
                    </div>
                  </div>



                  <div class="row mt-2">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                      <label for="lname" class="text-end control-label col-form-label">Product Price*</label>
                      <input type="number" class="form-control" name="product_price" required placeholder="Enter Product Price">                       
                    </div>


                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                      <label for="lname" class="text-end control-label col-form-label">Product Old Price*</label>
                      <input type="number" class="form-control" name="product_old_price" required placeholder="Enter Product Old Price">                       
                    </div>

                  </div>



                   <div class="row mt-2">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                      <label for="lname" class="text-end control-label col-form-label">Short Description*</label>
                      <input type="" maxlength="40" class="form-control" name="short_desc" required placeholder="Enter Short Description">                       
                    </div>


                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                      <label for="lname" class="text-end control-label col-form-label">Product Image*</label>
                      <input type="file" class="form-control" name="product_image" required placeholder="Enter Quantity/Stock">                       
                    </div>

                  </div>

             <div id="dynamic_field"> 

                <div class="row mt-2">
                  <div class="col-lg-10 col-md-10 col-sm-10 col-10">
                    <label for="lname" class="text-end control-label col-form-label">Product Key Points*</label>
                    <input type="" class="form-control" name="product_key_points[]" required placeholder="Enter Product Key Points">                        
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                     <label for="lname" class="text-end control-label col-form-label">-</label>
                    <button id="add_row_btn" type="button" class="btn form-control btn-primary btn-sm">Add New</button>
                  </div>

                </div>
                </div>



                  <div class="row mt-2">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <label for="lname" class="text-end control-label col-form-label">Long Description*</label>
                    <textarea required name="long_description" class="form-control" placeholder="Please enter long description" rows="5"></textarea>                       
                  </div>
                </div>


                <div class="row mt-2">

                  <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                    <label for="lname" class="text-end control-label col-form-label">Best Seller*</label>
                   <input type="checkbox" name="best_seller" value="Best Seller">                       
                  </div>


                  <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                    <label for="lname" class="text-end control-label col-form-label">New Arrivals*</label>
                   <input type="checkbox" name="new_arrivals" value="New Arrivals">                       
                  </div>


                  <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                    <label for="lname" class="text-end control-label col-form-label">New Top Rated*</label>
                   <input type="checkbox" name="new_top_rated" value="New Top Rated">                       
                  </div>


                  <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                    <label for="lname" class="text-end control-label col-form-label">Featured Product*</label>
                   <input type="checkbox" name="featured_product" value="Featured Product">
                  </div>

                </div>



                  <div class="row mt-2">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                      <label for="lname" class="text-end control-label col-form-label">Product Other Images*</label>
                      <input type="file" multiple name="other_images[]" class="form-control">
      
                    </div>


                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                      <label for="lname" class="text-end control-label col-form-label">Product Status*</label>
                      <select class="form-control" required name="p_status">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                      </select>                    
                    </div>

                  </div>






                </div>
                <div class="border-top text-center">
                  <div class="card-body text-center">
                    <button type="submit" name="save" class="btn btn-primary">
                      Submit
                    </button>
                  </div>
                </div>
              </form>
            </div>

          </div>

        </div>

      </div>

      <?php include 'footer.php';?>  

      <script type="text/javascript">
        $(document).ready(function(){
  // When category is selected
          $('#product_cat').change(function(){
    var category_id = $(this).val(); // Get selected category ID
    // If category is selected, make an AJAX request
    if(category_id != ''){
      $.ajax({
        url: 'get_sub_categories.php', // PHP file to get sub-categories
        method: 'POST',
        data: { category_id: category_id },
        success: function(response){
          // Fill sub-category dropdown with the response (sub-categories)
          $('#product_sub_cat').html(response);
        }
      });
    } else {
      // If no category is selected, reset sub-category dropdown
      $('#product_sub_cat').html('<option value="">Please select sub category</option>');
    }
  });
        });

      </script>

       <script>
$(document).ready(function(){
  var i=1;
  $('#add_row_btn').click(function(){
    i++;
     $('#dynamic_field').append('<div class="row mt-2" id="row'+i+'">  <div class="col-lg-10 col-md-10 col-sm-10 col-10"><label for="lname" class="text-end control-label col-form-label">Product Key Points*</label><input type="" class="form-control" name="product_key_points[]" required placeholder="Enter Product Key Points"> </div><div class="col-lg-2 col-md-2 mt-20"><label for="lname" class="text-end control-label col-form-label">-</label><button type="button" name="remove" id="'+i+'" class="btn btn-danger form-control  btn_remove">X</button></div></div></div>');
  });
  
  $(document).on('click', '.btn_remove', function(){
    var button_id = $(this).attr("id"); 
    $('#row'+button_id+'').remove();
  });

  
});
</script>