<?php include 'header.php';

// Handle form submission
if (isset($_POST['save_shipping'])) {
    $shipping_enabled = isset($_POST['shipping_enabled']) ? 1 : 0;
    $shipping_amount = floatval($_POST['shipping_amount']);
    
    // Update shipping settings
    $update_query = "UPDATE shipping_settings SET 
                     shipping_enabled = '$shipping_enabled',
                     shipping_amount = '$shipping_amount'
                     WHERE id = 1";
    
    if (mysqli_query($conn, $update_query)) {
        ?>
        <script type="text/javascript">
            alert('Shipping settings updated successfully.');
            window.location.href='';
        </script>
        <?php
    } else {
        echo "Error updating shipping settings: " . mysqli_error($conn);
    }
}

// Get current shipping settings
$shipping_query = "SELECT * FROM shipping_settings WHERE id = 1";
$shipping_result = mysqli_query($conn, $shipping_query);
$shipping_data = mysqli_fetch_assoc($shipping_result);

// If no settings exist, create default
if (!$shipping_data) {
    $insert_query = "INSERT INTO shipping_settings (shipping_enabled, shipping_amount) VALUES (0, 10.00)";
    mysqli_query($conn, $insert_query);
    $shipping_data = array(
        'shipping_enabled' => 0,
        'shipping_amount' => 10.00
    );
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
    

      <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
          <div class="col-md-12">
            <div class="card">

                <div class="page-breadcrumb">
        <div class="row">
          <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Shipping Settings</h4>
          </div>
        </div>
      </div>

<br>

              <hr>
              <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">

                  <!-- Enable/Disable Shipping -->
                  <div class="form-group row">
                    <label for="shipping_enabled" class="col-sm-3 text-end control-label col-form-label">Enable Shipping</label>
                    <div class="col-sm-9">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="shipping_enabled" id="shipping_enabled" value="1" <?php echo ($shipping_data['shipping_enabled'] == 1) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="shipping_enabled">
                          Enable shipping charges on checkout
                        </label>
                      </div>
                    </div>
                  </div>

                  <!-- Shipping Amount -->
                  <div class="form-group row">
                    <label for="shipping_amount" class="col-sm-3 text-end control-label col-form-label">Shipping Amount ($)*</label>
                    <div class="col-sm-9">
                      <input type="number" step="0.01" min="0" class="form-control" name="shipping_amount" id="shipping_amount" required placeholder="Enter shipping amount" value="<?php echo $shipping_data['shipping_amount']; ?>">
                    </div>
                  </div>



                </div>
                <div class="border-top text-center">
                  <div class="card-body text-center">
                    <button type="submit" name="save_shipping" class="btn btn-primary">
                      Submit
                    </button>
                  </div>
                </div>
              </form>

            </div>
       
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include 'footer.php';?>

  <script>
  $(document).ready(function() {
      // Show/hide shipping amount field based on checkbox
      $('#shipping_enabled').change(function() {
          if ($(this).is(':checked')) {
              $('#shipping_amount').closest('.form-group').show();
          } else {
              $('#shipping_amount').closest('.form-group').hide();
          }
      });

      // Trigger on page load
      $('#shipping_enabled').trigger('change');
  });
  </script>
</body>
</html> 