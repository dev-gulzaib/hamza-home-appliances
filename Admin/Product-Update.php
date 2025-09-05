<?php include 'header.php';

$prod_no=$_GET['prod_no'];

$sql="SELECT * FROM products WHERE prod_no='$prod_no'";
$rzt=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($rzt);


if (isset($_POST['save'])) {
    // Collect form data
  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $product_old_price = $_POST['product_old_price'];
  $short_desc = $_POST['short_desc'];
  $long_description = $_POST['long_description'];
  $p_status = $_POST['p_status'];
  $best_seller = isset($_POST['best_seller']) ? 1 : 0;
  $new_arrivals = isset($_POST['new_arrivals']) ? 1 : 0;
  $new_top_rated = isset($_POST['new_top_rated']) ? 1 : 0;
  $featured_product = isset($_POST['featured_product']) ? 1 : 0;

    // Optional image logic
  $new_image_uploaded = isset($_FILES['product_image']) && $_FILES['product_image']['name'] != '';

  if ($new_image_uploaded) {
    $image_name = $_FILES['product_image']['name'];
    $image_tmp = $_FILES['product_image']['tmp_name'];
    $image_path = "Product_Image/" . $image_name;

        // Move the uploaded file
    move_uploaded_file($image_tmp, $image_path);

        // Update including image
    $query = "UPDATE products SET 
    product_name='$product_name',
    product_price='$product_price',
    product_old_price='$product_old_price',
    short_desc='$short_desc',
    long_description='$long_description',
    p_status='$p_status',
    best_seller='$best_seller',
    new_arrivals='$new_arrivals',
    new_top_rated='$new_top_rated',
    featured_product='$featured_product',
    product_image='$image_name'
    WHERE prod_no='$prod_no'";
  } else {
        // Update without changing image
    $query = "UPDATE products SET 
    product_name='$product_name',
    product_price='$product_price',
    product_old_price='$product_old_price',
    short_desc='$short_desc',
    long_description='$long_description',
    p_status='$p_status',
    best_seller='$best_seller',
    new_arrivals='$new_arrivals',
    new_top_rated='$new_top_rated',
    featured_product='$featured_product'
    WHERE prod_no='$prod_no'";
  }

    // Execute the query
  if (mysqli_query($conn, $query)) {
   ?>
   <script type="text/javascript">
    alert('Product updated successfully.');
            window.location.href=''; // Redirect to another page
          </script>
          <?php
        } else {
          echo "Error updating product: " . mysqli_error($conn);
        }
      }

      if (isset($_POST['del_btn'])) {

        $del_id=$_POST['del_id'];

        $sql="DELETE FROM product_images WHERE id='$del_id'";
        if (mysqli_query($conn, $sql)) {
         ?>
         <script type="text/javascript">
          alert('Product image deleted successfully.');
          window.location.href='';
        </script>
        <?php
      } 

    }






    if (isset($_POST['image_save'])) {

      $image = mysqli_real_escape_string($conn, $_FILES['image']['name']);
      $file_name = $_FILES['image']['name'];
      $file_path = "Product_Image/other_" . $prod_no . '_' . $file_name;

      $file_tmp = $_FILES['image']['tmp_name'];

     move_uploaded_file($file_tmp, $file_path);



      $insert_image = "INSERT INTO product_images (prod_no, p_image) 
      VALUES ('$prod_no', '$file_path')";
      if (mysqli_query($conn, $insert_image)) {
       ?>
       <script type="text/javascript">
        alert('New Image added successfully.');
        window.location.href='';
      </script>
      <?php
    } 


  }


 if (isset($_POST['key_save'])) {

    $key_point=$_POST['key_point'];



      $insert_image = "INSERT INTO products_key_points (prod_no, key_points) 
      VALUES ('$prod_no', '$key_point')";
      if (mysqli_query($conn, $insert_image)) {
       ?>
       <script type="text/javascript">
        alert('New Point added successfully.');
        window.location.href='';
      </script>
      <?php
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
            <h4 class="page-title">Update Product</h4>

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

                <!-- Product Name -->
                <div class="row mt-2">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <label for="lname" class="text-end control-label col-form-label">Product Name*</label>
                    <input type="text" class="form-control" name="product_name" required placeholder="Enter Product Name" value="<?php echo $row['product_name']; ?>">                       
                  </div>
                </div>

                <!-- Product Price and Old Price -->
                <div class="row mt-2">
                  <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <label for="lname" class="text-end control-label col-form-label">Product Price*</label>
                    <input value="<?php echo $row['product_price']; ?>" type="number" class="form-control" name="product_price" required placeholder="Enter Product Price">                       
                  </div>

                  <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <label for="lname" class="text-end control-label col-form-label">Product Old Price*</label>
                    <input value="<?php echo $row['product_old_price']; ?>" type="number" class="form-control" name="product_old_price" required placeholder="Enter Product Old Price">                       
                  </div>
                </div>

                <!-- Short Description -->
                <div class="row mt-2">
                  <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <label for="lname" class="text-end control-label col-form-label">Short Description*</label>
                    <input value="<?php echo $row['short_desc']; ?>" type="text" maxlength="40" class="form-control" name="short_desc" required placeholder="Enter Short Description">                       
                  </div>

                  <!-- Product Status -->
                  <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <label for="lname" class="text-end control-label col-form-label">Product Status*</label>
                    <select class="form-control" required name="p_status">
                      <option value="Active" <?php echo ($row['p_status'] == 'Active') ? 'selected' : ''; ?>>Active</option>
                      <option value="Inactive" <?php echo ($row['p_status'] == 'Inactive') ? 'selected' : ''; ?>>Inactive</option>
                    </select>                    
                  </div> 

                  <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <label for="lname" class="text-end control-label col-form-label">Product New Image (Optional)</label>
                    <input type="file"class="form-control" name="product_image" placeholder="Enter Short Description">                       
                  </div>              
                </div>



                <!-- Long Description -->
                <div class="row mt-2">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <label for="lname" class="text-end control-label col-form-label">Long Description*</label>
                    <textarea required name="long_description" class="form-control" placeholder="Please enter long description" rows="5"><?php echo $row['long_description']; ?></textarea>                       
                  </div>
                </div>

                <!-- Product Features (Checkboxes) -->
                <div class="row mt-2">
                  <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                    <label for="lname" class="text-end control-label col-form-label">Best Seller*</label>
                    <input type="checkbox" name="best_seller" value="Best Seller" <?php echo ($row['best_seller'] == 1) ? 'checked' : ''; ?>>                       
                  </div>

                  <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                    <label for="lname" class="text-end control-label col-form-label">New Arrivals*</label>
                    <input type="checkbox" name="new_arrivals" value="New Arrivals" <?php echo ($row['new_arrivals'] == 1) ? 'checked' : ''; ?>>                       
                  </div>

                  <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                    <label for="lname" class="text-end control-label col-form-label">New Top Rated*</label>
                    <input type="checkbox" name="new_top_rated" value="New Top Rated" <?php echo ($row['new_top_rated'] == 1) ? 'checked' : ''; ?>>                       
                  </div>

                  <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                    <label for="lname" class="text-end control-label col-form-label">Featured Product*</label>
                    <input type="checkbox" name="featured_product" value="Featured Product" <?php echo ($row['featured_product'] == 1) ? 'checked' : ''; ?>>
                  </div>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                  <div class="card-body text-center">
                    <button type="submit" name="save" class="btn btn-primary">
                      Submit
                    </button>
                  </div>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>




      <div class="row">
        <div class="col-md-12">

          <div style="text-align:right;margin-bottom: 10px;">
            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#myModal1">Add New Key Point</button>
          </div>

          <div class="card">
           <div class="card-body">

            <h5 class="card-title">Key Points </h5>
            <br>

            <div class="table-responsive">
              <table
              id="zero_config"
              class="table  table-bordered"
              >
              <thead>
                <tr>
                  <th>#</th>
                  <th>Key Points</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                <?php 
                $sql1="SELECT * FROM products_key_points WHERE prod_no='$prod_no' ORDER BY id DESC";
                $rztl1=mysqli_query($conn,$sql1);
                if ($rztl1->num_rows>0) {
                  $id=1;
                  while ($row1=mysqli_fetch_assoc($rztl1)) {

                   ?>
                   <tr>
                    <td><?php echo $id;?></td>
                    <td><?php echo $row1['key_points'];?></td>

                    <td>
                      <form action="" onsubmit="return confirm('Are you sure you want to delete this record?')" method="POST">
                        <input type="hidden" value="<?php echo $row1['id'];?>" name="del_id">
                        <button name="del_btn" class="btn btn-dark">Delete</button>
                      </form>
                    </td>
                  </tr>
                  <?php $id++; } } ?> 

                </table>
              </div>  

            </div>
          </div>

        </div>

      </div>



      <div class="row">
        <div class="col-md-12">

          <div style="text-align:right;margin-bottom: 10px;">
            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#myModal">Add New ٰOther Image</button>
          </div>

          <div class="card">
           <div class="card-body">

            <h5 class="card-title">Product Other Images</h5>
            <br>

            <div class="table-responsive">
              <table
              id="zero_config"
              class="table  table-bordered"
              >
              <thead>
                <tr>
                  <th>#</th>
                  <th>Image</th>
                  <th>Action</th>
                  <!-- <th></th> -->
                </tr>
              </thead>
              <tbody>

                <?php 
                $sql1="SELECT * FROM product_images WHERE prod_no='$prod_no' ORDER BY id DESC";
                $rztl1=mysqli_query($conn,$sql1);
                if ($rztl1->num_rows>0) {
                  $id=1;
                  while ($row1=mysqli_fetch_assoc($rztl1)) {

                   ?>
                   <tr>
                    <td><?php echo $id;?></td>
                    <td><img style="height: 200px;width: 200px" src="<?php echo $row1['p_image'];?>"></td>

                    <td>
                      <form action="" onsubmit="return confirm('Are you sure you want to delete this record?')" method="POST">
                        <input type="hidden" value="<?php echo $row1['id'];?>" name="del_id">
                        <button name="del_btn" class="btn btn-dark">Delete</button>
                      </form>
                    </td>
                  </tr>
                  <?php $id++; } } ?> 

                </table>
              </div>  

            </div>
          </div>

        </div>

      </div>


    </div>

  </div>

</div>

<?php include 'footer.php';?>  



<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add New Image</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
        <!-- Modal body -->
        <div class="modal-body">
          <input type="file" class="form-control" placeholder="Enter Category Name" required name="image">
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name="image_save">Save</button>
        </div>
      </form>

    </div>
  </div>
</div> 











<div class="modal fade" id="myModal1">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add New Key Point</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
        <!-- Modal body -->
        <div class="modal-body">
          <input type="text" class="form-control" placeholder="Enter Key  Point" required name="key_point">
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name="key_save">Save</button>
        </div>
      </form>

    </div>
  </div>
</div> 