<?php include 'header.php';


$sql="SELECT * FROM website_settings";
$rztl=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($rztl);


if(isset($_POST['save'])){

  $web_name=$_POST['web_name'];
  $web_title=$_POST['web_title'];
  $web_keywords=$_POST['web_keywords'];
  $web_desc=$_POST['web_desc'];
  $web_author=$_POST['web_author'];
  $web_phone=$_POST['web_phone'];
  $web_address=$_POST['web_address'];
  $web_email=$_POST['web_email'];
 
  $up="UPDATE website_settings SET web_name='$web_name',web_title='$web_title',web_keywords='$web_keywords',web_desc='$web_desc',web_author='$web_author',web_phone='$web_phone',web_address='$web_address',web_email='$web_email'";

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
                  <h4 class="page-title">Website Settings</h4>
                </div>
              </div>
            </div>

            <br>

            <hr>

            <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
              <div class="card-body">



                <div class="form-group">
                  <label for>Website Name*</label>
                  <input type=""  required name="web_name" value="<?php echo $row['web_name'];?>" class="form-control"  placeholder="Website Name">
                </div>


                <div class="form-group">
                  <label for>Website Title</label>
                  <input type="" required name="web_title" value="<?php echo $row['web_title'];?>" class="form-control"  placeholder="Website Title">
                </div>

                <div class="form-group">
                  <label for>Website SEO Keywords</label>
                  <input type="" required name="web_keywords" value="<?php echo $row['web_keywords'];?>" class="form-control"  placeholder="Website Keywords for SEO">
                </div>


                  <div class="form-group">
                  <label for>Website SEO Description</label>
                  <input type="" required name="web_desc" value="<?php echo $row['web_desc'];?>" class="form-control"  placeholder="Website Description for SEO">
                </div>


                 <div class="form-group">
                  <label for>Website Author</label>
                  <input type="" required name="web_author" value="<?php echo $row['web_author'];?>" class="form-control"  placeholder="Website Author">
                </div>


                <div class="form-group">
                  <label for>Website Phone</label>
                  <input type="" required name="web_phone" value="<?php echo $row['web_phone'];?>" class="form-control"  placeholder="Website Phone">
                </div>


                <div class="form-group">
                  <label for>Website Email</label>
                  <input type="" required name="web_email" value="<?php echo $row['web_email'];?>" class="form-control"  placeholder="Website Email">
                </div>


                <div class="form-group">
                  <label for>Website Address</label>
                  <input type="" required name="web_address" value="<?php echo $row['web_address'];?>" class="form-control"  placeholder="Website Address">
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