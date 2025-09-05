<?php include 'header.php';




if(isset($_POST['update_status'])){

  $new_status=$_POST['new_status'];
  $order_no=$_POST['order_no'];
  $id=$_POST['id'];

 
  $up="UPDATE orders SET order_status='$new_status' WHERE order_no='$order_no' AND id='$id'";

  if (mysqli_query($conn,$up)) {
   ?>
   <script type="text/javascript">
    alert('Status Update Successfully.');
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
        <h4 class="page-title">Order</h4>
      </div>
    </div>
  </div>

  <div class="container-fluid">

    <div class="row">
      <div class="col-12">


        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Order Details</h5>
            <div class="table-responsive">
              <table
              id="zero_config"
              class="table table-striped table-bordered"
              >
              <thead>
                <tr>
                  <th>#</th>
                  <th>Customer</th>
                  <th>Date</th>
                  <th>Total Amount</th>
                  <th>Total Products</th>
                  <th>Customer Address</th>
                  <th>Status</th>
                  <th>View</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                <?php 
                $sql="SELECT * FROM orders ORDER BY id DESC";
                $rztl=mysqli_query($conn,$sql);
                if ($rztl->num_rows>0) {
                  $id=1;
                  while ($row=mysqli_fetch_assoc($rztl)) {


                   ?>
                   <tr>
                    <td><?php echo $row['order_no'];?></td>
                    <td><?php echo $row['cus_name'];?><br><?php echo $row['cus_phone'];?></td>
                    <td><?php echo $row['order_date'];?></td>
                    <td>$<?php echo number_format($row['total_order_amt'],2);?></td>
                    <td><?php echo $row['total_products'];?></td>

                    <td><?php echo $row['cus_state'];?>, <?php echo $row['cus_city'];?>, <?php echo $row['cus_address'];?>, <?php echo $row['cus_zip'];?></td>

                    <td><?php echo $row['order_status'];?></td>


                    <td><a href="View-Orders-Details?order=<?php echo $row['order_no'];?>"><button class="btn btn-dark btn-sm">Order Details</button></a></td>

                    <td>
                      <form action="" method="POST">
                        <input type="hidden" class="form-control" value="<?php echo $row['order_no'];?>" name="order_no">

                        <input type="hidden" class="form-control" value="<?php echo $row['id'];?>" name="id">


                        <select class="form-control" name="new_status" required>
                          <option value="">Status</option>
                          <option value="Pending">Pending</option>
                          <option value="Processing">Processing</option>
                          <option value="Shipped">Shipped</option>
                          <option value="Out for Delivery">Out for Delivery</option>
                          <option value="Delivered">Delivered</option>
                          <option value="Completed">Completed</option>
                          <option value="Cancelled">Cancelled</option>
                          <option value="Refunded">Refunded</option>
                          <option value="Failed">Failed</option>
                          <option value="On Hold">On Hold</option>
                          <option value="Returned">Returned</option>
                        </select>
<Br>
                        <button class="btn btn-primary btn-sm" name="update_status">Update</button>

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

    <?php include 'footer.php';?>
