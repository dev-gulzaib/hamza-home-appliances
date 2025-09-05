<?php include 'header.php';

$id=$_GET['id'];

$sql="SELECT * FROM categories WHERE id='$id'  ORDER BY id DESC";
$rztl=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($rztl);

if(isset($_POST['save'])){
        
      $cat_name=$_POST['cat_name'];

    $up="UPDATE categories SET cat_name='$cat_name' WHERE id='$id'";

   if (mysqli_query($conn,$up)) {
   ?>
  <script type="text/javascript">
    alert('Category Update Successfully.');
    window.location.href='';
  </script>
   <?php
   }
  }



if(isset($_POST['change_img'])){
        
    $image= addslashes(file_get_contents($_FILES['image']['tmp_name']));

  $up1="UPDATE beer SET image='$image' WHERE beer_no='$beer_no'";

  if (mysqli_query($conn,$up1)) {
   ?>
  <script type="text/javascript">
    alert('Beer Update Successfully.');
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
  
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          <div class="row">
            <div class="col-md-12">
              <div class="card">


                <hr>
                <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                  <div class="card-body">
                    <h4 class="card-title">Category Details</h4>

                     <hr>



                    <div class="form-group row">
                      <label for="lname" class="col-sm-3 text-end control-label col-form-label">Category Name:</label
                      >
                      <div class="col-sm-9">
                        <input type="" class="form-control" id="lname" name="cat_name" value="<?php echo $row['cat_name'];?>" required placeholder="Please enter Category name"
                        />
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