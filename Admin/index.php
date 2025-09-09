<?php include 'header.php';?>
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
     
      <header class="topbar" data-navbarbg="skin5">
   <?php include 'navbar.php';?>
      </header>
      
     <?php include 'sidebar.php';?>
      
      <div class="page-wrapper">
       
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Dashboard</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Library
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        
        <div class="container-fluid">

          <div class="row">
            <!-- Column -->
          <div class="col-md-4 col-lg-4 col-xlg-4">
              <div class="card card-hover">
                <div class="box bg-cyan text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-view-users"></i>
                  </h1>
                  <h3 class="text-white">Total Products</h3>
                  <p class="h4 text-white">  
     <?php
    $query = "SELECT * FROM products "; 
    $result = mysqli_query($conn, $query);
    if ($result) 
    { 
        $row = mysqli_num_rows($result); 
          
           if ($row) 
              { 
                 printf($row); 
              } 
              else{
                echo "0";
              }
    } ?></p>
                </div>
              </div>
            </div>


             <div class="col-md-4 col-lg-4 col-xlg-4">
              <div class="card card-hover">
                <div class="box bg-danger text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-view-users"></i>
                  </h1>
                  <h3 class="text-white">Total Orders</h3>
                  <p class="h4 text-white"><?php
    $query = "SELECT * FROM orders"; 
    $result = mysqli_query($conn, $query);
    if ($result) 
    { 
        $row = mysqli_num_rows($result); 
          
           if ($row) 
              { 
                 printf($row); 
              } 
              else{
                echo "0";
              }
    } ?></p>
                </div>
              </div>
            </div>



            <div class="col-md-4 col-lg-4 col-xlg-4">
              <div class="card card-hover">
                <div class="box bg-success text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-view-users"></i>
                  </h1>
                  <h3 class="text-white">Total Categories</h3>
                  <p class="h4 text-white"><?php
    $query = "SELECT * FROM categories "; 
    $result = mysqli_query($conn, $query);
    if ($result) 
    { 
        $row = mysqli_num_rows($result); 
          
           if ($row) 
              { 
                 printf($row); 
              } 
              else{
                echo "0";
              }
    } ?></p>
                </div>
              </div>
            </div>



             <div class="col-md-4 col-lg-4 col-xlg-4">
              <div class="card card-hover">
                <div class="box bg-warning text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-view-users"></i>
                  </h1>
                  <h3 class="text-white">Total Income</h3>
                  <p class="h4 text-white"><?php
    $query = "SELECT SUM(amount) AS amt  FROM transactions "; 
    $result = mysqli_query($conn, $query);
    $data=mysqli_fetch_assoc($result);

    echo '£'.number_format($data['amt'],2);
     ?></p>
                </div>
              </div>
            </div>



             <div class="col-md-4 col-lg-4 col-xlg-4">
              <div class="card card-hover">
                <div class="box bg-dark  text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-view-users"></i>
                  </h1>
                  <h3 class="text-white">Pending Orders</h3>
                  <p class="h4 text-white"><?php
    $query = "SELECT * FROM orders WHERE order_status='Pending'"; 
    $result = mysqli_query($conn, $query);
    if ($result) 
    { 
        $row = mysqli_num_rows($result); 
          
           if ($row) 
              { 
                 printf($row); 
              } 
              else{
                echo "0";
              }
    } ?></p>
                </div>
              </div>
            </div>


              <div class="col-md-4 col-lg-4 col-xlg-4">
              <div class="card card-hover">
                <div class="box bg-white  text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-view-users"></i>
                  </h1>
                  <h3 class="text-dark">Complete Orders</h3>
                  <p class="h4 text-dark"><?php
    $query = "SELECT * FROM orders WHERE order_status='Complete'"; 
    $result = mysqli_query($conn, $query);
    if ($result) 
    { 
        $row = mysqli_num_rows($result); 
          
           if ($row) 
              { 
                 printf($row); 
              } 
              else{
                echo "0";
              }
    } ?></p>
                </div>
              </div>
            </div>
            <!-- Column -->

            <!-- Column -->
          </div>
 
     
     <div class="row">
      <div class="col-12">


        <div class="card">
          <div class="card-body">
            <h5 class="card-title">New Orders</h5>
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
                $sql="SELECT * FROM orders ORDER BY id DESC LIMIT 5";
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