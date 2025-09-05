<?php include 'header.php';


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
              <h4 class="page-title">Users</h4>
            </div>
          </div>
        </div>
     
        <div class="container-fluid">
          
          <div class="row">
            <div class="col-12">
              
          
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Customer Details</h5>
                  <div class="table-responsive">
                    <table
                      id="zero_config"
                      class="table table-striped table-bordered"
                    >
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Phone no</th>
                          <th>Email Address</th>
                          <th>State</th>
                          <th>City</th>
                          <th>Zip Code</th>
                          <th>Address</th>
                          <th>Total Payment</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                  <?php 
                  $sql="SELECT * FROM orders WHERE payment_status='Complete' ORDER BY id DESC";
                  $rztl=mysqli_query($conn,$sql);
                  if ($rztl->num_rows>0) {
                    $id=1;
                   while ($row=mysqli_fetch_assoc($rztl)) {

                   ?>
                        <tr>
                          <td><?php echo $row['id'];?></td>
                          <td><?php echo $row['cus_name'];?></td>
                          <td><?php echo $row['cus_phone'];?></td>
                          <td><?php echo $row['cus_email'];?></td>
                          <td><?php echo $row['cus_state'];?></td>
                          <td><?php echo $row['cus_city'];?></td>
                          <td><?php echo $row['cus_zip'];?></td>
                          <td><?php echo $row['cus_address'];?></td>
                          <td>$<?php echo number_format($row['total_order_amt'],2);?></td>
                           <td>
                             <a  href="View-Orders-Details?order=<?php echo $row['order_no'];?>"><button class="btn btn-primary btn-sm">View Order</button></a>
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
        