<?php include 'header.php';


$sql="SELECT * FROM admin";
$rztl=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($rztl);


if(isset($_POST['save'])){
        
      $email=$_POST['email'];
    $up="UPDATE admin SET email='$email'";

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




<?php 
if(isset($_POST['change_btn'])){

$cur_pass=md5($_POST['cur_pass']);
$new_password=md5($_POST['new_password']);
$con_password=md5($_POST['con_password']);




$query_chck_pass = mysqli_query($conn,"SELECT * FROM admin WHERE pass='$cur_pass'") or die(mysqli_error($conn)); 

  if(mysqli_num_rows($query_chck_pass)>0){

    if($new_password==$con_password){


    $query1="UPDATE admin set pass='$new_password'";
    if(mysqli_query($conn, $query1)) {
      ?>
     <script type="text/javascript">
      alert('Your Password Detail Has Been Update Successfully.');
      window.location.href = "";
    </script>
    <?php

   }


    }
    else{
      ?>
      <script>
            alert('Please Enter Same Passwords.');
        </script>
        <?php
    }



}
else{
?>
<script type="text/javascript">
  alert('Sorry! Current Password Is Inavalid.');
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
              <h4 class="page-title">Admin Settings</h4>
            </div>
          </div>
        </div>

<br>

                <hr>
                <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                  <div class="card-body">
              


                    <div class="form-group row">
                      <label for="lname" class="col-sm-3 text-end control-label col-form-label">Email</label
                      >
                      <div class="col-sm-9">
                        <input type="" class="form-control" id="lname" name="email" value="<?php echo $row['email'];?>" required placeholder="Please enter Login Email"
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


<hr>
                <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                  <div class="card-body">
              


                      <div class="form-group">
                      <label for>Current Password*</label>
                      <input type="" autocomplete="OFF" minlength="6" required name="cur_pass" class="form-control" placeholder="Current Password">
                    </div>


                    <div class="form-group">
                      <label for>New Password*</label>
                      <input type="" autocomplete="OFF" minlength="6" required name="new_password" class="form-control" placeholder="New Password">
                    </div>


                    <div class="form-group">
                      <label for>Confirm Password*</label>
                      <input type="" autocomplete="OFF" minlength="6" required name="con_password" class="form-control" placeholder="Confirm Password">
                    </div>
            

               
                  </div>
                  <div class="border-top text-center">
                    <div class="card-body text-center">
                      <button type="submit" name="change_btn" class="btn btn-primary">
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