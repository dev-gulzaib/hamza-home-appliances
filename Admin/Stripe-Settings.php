<?php include 'header.php';


$sql="SELECT * FROM stripe";
$rztl=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($rztl);


if(isset($_POST['save'])){

  $publishableKey=$_POST['publishableKey'];
  $secretKey=$_POST['secretKey'];
  $success_url=$_POST['success_url'];
  $cancel_url=$_POST['cancel_url'];

 
  $up="UPDATE stripe SET publishableKey='$publishableKey',secretKey='$secretKey',success_url='$success_url',cancel_url='$cancel_url'";

  if (mysqli_query($conn,$up)) {
   ?>
   <script type="text/javascript">
    alert('Details Update Successfully.');
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
                  <h4 class="page-title">Stripe Settings</h4>
                </div>
              </div>
            </div>

            <br>

            <hr>

            <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
              <div class="card-body">



                <div class="form-group">
                  <label for>Publish Key*</label>
                  <input type=""  required name="publishableKey" value="<?php echo $row['publishableKey'];?>" class="form-control"  placeholder="Publish Key">
                </div>


                <div class="form-group">
                  <label for>Secrety Key*</label>
                  <input type="" required name="secretKey" value="<?php echo $row['secretKey'];?>" class="form-control"  placeholder="Secrety Key">
                </div>

                <div class="form-group">
                  <label for>Success URL*</label>
                  <input type="" required name="success_url" value="<?php echo $row['success_url'];?>" class="form-control"  placeholder="Success URL">
                </div>


                  <div class="form-group">
                  <label for>Cancel URL*</label>
                  <input type="" required name="cancel_url" value="<?php echo $row['cancel_url'];?>" class="form-control"  placeholder="Cancel URL*">
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