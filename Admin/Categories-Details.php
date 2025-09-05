<?php include 'header.php';




if(isset($_POST['cat_save'])){
        
      $cat_name=$_POST['cat_name'];
      

  $insert="INSERT INTO categories(cat_name)
  VALUES('$cat_name')";
    if (mysqli_query($conn,$insert)) {
  
     ?>
  <script type="text/javascript">
    alert('Category Add Successfully.');
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

    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
    >
      <!-- ============================================================== -->
      <!-- Topbar header - style you can find in pages.scss -->
      <!-- ============================================================== -->
      <header class="topbar" data-navbarbg="skin5">
   <?php include 'navbar.php';?>
       
      </header>
     <?php include 'sidebar.php';?>
     
     
      <div class="page-wrapper">

        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Category</h4>
            </div>
          </div>
        </div>
     
        <div class="container-fluid">
          
          <div class="row">
            <div class="col-12">

              <div style="text-align:right;margin-bottom: 10px;">
                <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#myModal">Add New Category</button>
              </div>
              
          
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Category Details</h5>
                  <div class="table-responsive">
                    <table
                      id="zero_config"
                      class="table table-striped table-bordered"
                    >
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Action</th>
                          <!-- <th></th> -->
                        </tr>
                      </thead>
                      <tbody>

                  <?php 
                  $sql="SELECT * FROM categories ORDER BY id DESC";
                  $rztl=mysqli_query($conn,$sql);
                  if ($rztl->num_rows>0) {
                    $id=1;
                   while ($row=mysqli_fetch_assoc($rztl)) {

                   ?>
                        <tr>
                          <td><?php echo $id;?></td>
                          <td><?php echo $row['cat_name'];?></td>

                          <td>
                             <a href="Category-Update.php?id=<?php echo $row['id'];?>">
                               <button class="btn btn-dark">Edit</button>
                             </a>
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
       

 <div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add New Category</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
<form action="" method="POST">
      <!-- Modal body -->
      <div class="modal-body">
        <input type="" class="form-control" placeholder="Enter Category Name" required name="cat_name">
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" name="cat_save">Save</button>
      </div>
</form>

    </div>
  </div>
</div> 
     <?php include 'footer.php';?>
        