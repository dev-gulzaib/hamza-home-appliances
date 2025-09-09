<?php include 'header.php';

if (isset($_POST['del'])) {


 $id=$_POST['id'];

 $del="DELETE FROM beer WHERE id='$id'";
 if (mysqli_query($conn,$del)) {
  ?>
  <script type="text/javascript">
    alert('Beer Deleted Successfully');
    window.location.href='';
  </script>
  <?php
}
}



if (isset($_POST['change_status'])) {

 $id=$_POST['id'];
 $status=$_POST['status'];
 $up="UPDATE beer SET status='$status' WHERE id='$id'";
 if (mysqli_query($conn,$up)) {
  ?>
  <script type="text/javascript">
    alert('Beer Updated Successfully');
    window.location.href='';
  </script>
  <?php
}
}

if(isset($_POST['delbtn'])){
  
  $delid=$_POST['delid'];
  

  $insert="DELETE FROM beer WHERE id='$delid'";
  if (mysqli_query($conn,$insert)) {
    
   ?>
   <script type="text/javascript">
    alert('Product Deleted Successfully.');
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
        <h4 class="page-title">Product</h4>
      </div>
    </div>
  </div>
  
  <div class="container-fluid">
    
    <div class="row">
      <div class="col-12">
        
        
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Product Details</h5>
            <div class="table-responsive">
              <table
              id="zero_config"
              class="table table-striped table-bordered"
              >
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Category</th>
                  <th>Sub Category</th>
                  <th>Short Description</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                <?php 
                $sql="SELECT * FROM products  ORDER BY id DESC";
                $rztl=mysqli_query($conn,$sql);
                if ($rztl->num_rows>0) {
                  $id=1;
                  while ($row=mysqli_fetch_assoc($rztl)) {

                    $product_cat=$row['product_cat'];
                    $product_sub_cat=$row['product_sub_cat'];

                    $sql222="SELECT * FROM categories WHERE id='$product_cat'";
                    $rztl222=mysqli_query($conn,$sql222);
                    $row222=mysqli_fetch_assoc($rztl222);

                    $sql221="SELECT * FROM sub_categories WHERE id='$product_sub_cat'";
                    $rztl221=mysqli_query($conn,$sql221);
                    $row221=mysqli_fetch_assoc($rztl221);

                    ?>
                    <tr>
                      <td><?php echo $id;?></td>
                      <td><?php echo $row['product_name'];?></td>
                      <td>£<?php echo number_format($row['product_price'],2);?></td>
                      <td><?php echo $row222['cat_name'];?></td>
                      <!-- <td>
                        <?php echo $row221['sub_cat_name'];?>
                      </td> -->


                      <td><?php echo !empty($row221['sub_cat_name']) ? $row221['sub_cat_name'] : 'Null'; ?></td>


                      <td><?php echo $row['short_desc'];?></td>
                      <td><?php echo $row['p_status'];?></td>
                      
                      <td>
                       <a href="Product-Update?prod_no=<?php echo $row['prod_no'];?>">
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
     
     <?php include 'footer.php';?>
     