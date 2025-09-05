<?php include 'header.php';

$order=$_GET['id'];

$sql="SELECT * FROM orders WHERE order_no='$order'";
$rztl=mysqli_query($conn,$sql);
if ($rztl->num_rows>0) {

  $data=mysqli_fetch_assoc($rztl);

}

else{
  ?>
  <script type="text/javascript">
    alert('Please enter valid tracking id');    
    window.location.href='Track';
  </script>
  <?php
}

?>
<body class="home">

  <?php include 'navbar.php';?>
  <div class="main-content main-content-contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="breadcrumb-trail breadcrumbs">
            <ul class="trail-items breadcrumb">
              <li class="trail-item trail-begin">
                <a href="index-2.html">Home</a>
              </li>
              <li class="trail-item trail-end active">
                Track your order
              </li>
            </ul>
          </div>
        </div>
      </div>
    
    </div>
    <div class="page-main-content">
      <div class="google-map">
      </div>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="">
              <div class="col-lg-12 no-padding">
                <div class="form-message">






                  <div class="row">



                    <div class="col-lg-6 col-md-6 col-12 col-sm-12">
                     <div class="row">
                      <div class="col-12">
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">Order Details</h5>
                            <hr>
                            <div class="row mt-4">
                              <div class="col-lg-3">
                                <b>Order No:</b>
                              </div>
                              <div class="col-lg-9">
                                #<?php echo $data['order_no'];?>
                              </div>
                            </div>



                            <div class="row mt-3">
                              <div class="col-lg-3">
                                <b>Date:</b>
                              </div>
                              <div class="col-lg-9">
                                <?php echo $data['order_date'];?>  <?php echo $data['order_time'];?>  
                              </div>
                            </div>




                            <div class="row mt-3">
                              <div class="col-lg-3">
                                <b>Total Products:</b>
                              </div>
                              <div class="col-lg-9">
                                <?php echo $data['total_products'];?>
                              </div>
                            </div>


                            <div class="row mt-3">
                              <div class="col-lg-3">
                                <b>Total Amount:</b>
                              </div>
                              <div class="col-lg-9">
                                $<?php echo number_format($data['total_order_amt'],2);?>
                              </div>
                            </div>


                            <div class="row mt-4">
                              <div class="col-lg-3">
                                <b>Order Status:</b>
                              </div>
                              <div class="col-lg-9" >
                               <span style="background: #AB8E66;color: white;padding: 3px;border-radius: 5px"><?php echo $data['order_status'];?></span> 
                             </div>
                           </div>


                         </div>
                       </div>
                     </div>
                   </div>
                 </div>








                 <div class="col-lg-6 col-md-6 col-12 col-sm-12">
                   <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Customer Details</h5>
                          <hr>
                          <div class="row mt-4">
                            <div class="col-lg-3">
                              <b>Name:</b>
                            </div>
                            <div class="col-lg-9">
                              #<?php echo $data['cus_name'];?>
                            </div>
                          </div>


                          <div class="row mt-3">
                            <div class="col-lg-3">
                              <b>Email:</b>
                            </div>
                            <div class="col-lg-9">
                              <?php echo $data['cus_email'];?>                  </div>
                            </div>


                            <div class="row mt-3">
                              <div class="col-lg-3">
                                <b>Phone No:</b>
                              </div>
                              <div class="col-lg-9">
                                <?php echo $data['cus_phone'];?>
                              </div>
                            </div>


                            <div class="row mt-3">
                              <div class="col-lg-3">
                                <b>City:</b>
                              </div>
                              <div class="col-lg-9">
                                <?php echo $data['cus_city'];?>, 
                                <?php echo $data['cus_zip'];?> 
                              </div>
                            </div>


                            <div class="row mt-3">
                              <div class="col-lg-3">
                                <b>Address:</b>
                              </div>
                              <div class="col-lg-9">
                                <?php echo $data['cus_address'];?>
                              </div>
                            </div>



                          </div>
                        </div>
                      </div>
                    </div>

                  </div>





                </div>







                <hr>

                <div class="row">
                  <div class="col-12">


                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Order Products</h5><br>
                        <div class="table-responsive">
                          <table
                          id="zero_config"
                          class="table table-striped table-bordered"
                          >
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Product</th>
                              <th>Category</th>
                              <th>Sub Category</th>
                              <th>Quantity</th>
                              <th>Product Amount</th>
                            </tr>
                          </thead>
                          <tbody>

                            <?php 
                            $sql="SELECT * FROM order_products WHERE order_no='$order' ORDER BY id DESC";
                            $rztl=mysqli_query($conn,$sql);
                            if ($rztl->num_rows>0) {
                              $id=1;
                              while ($row=mysqli_fetch_assoc($rztl)) {

                                $prod_no=$row['prod_no'];

                                $sql222="SELECT * FROM products WHERE prod_no='$prod_no'";
                                $rztl222=mysqli_query($conn,$sql222);
                                $row222=mysqli_fetch_assoc($rztl222);

                                $product_cat=$row222['product_cat'];
                                $product_sub_cat=$row222['product_sub_cat'];


                                $sql221="SELECT * FROM categories WHERE id='$product_cat'";
                                $rztl221=mysqli_query($conn,$sql221);
                                $row221=mysqli_fetch_assoc($rztl221);

                                $sql2212="SELECT * FROM sub_categories WHERE id='$product_sub_cat'";
                                $rztl2212=mysqli_query($conn,$sql2212);
                                $row2212=mysqli_fetch_assoc($rztl2212);


                                ?>
                                <tr>
                                  <td><?php echo $row['id'];?></td>
                                  <td><?php echo $row222['product_name'];?></td>
                                  <td><?php echo $row221['cat_name'];?></td>
                                  <td><?php echo $row2212['sub_cat_name'];?></td>
                                  <td><?php echo $row['qty'];?></td>
                                  <td>$<?php echo number_format($row['single_item_price'],2);?></td>
                                </tr>
                                <?php $id++; } } ?> 

                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>








                    <hr>    




                    <div class="row">
                      <div class="col-12">


                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">Transaction History</h5><br>
                            <div class="table-responsive">
                              <table
                              id="zero_config"
                              class="table table-striped table-bordered"
                              >
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Transaction No</th>
                                  <th>Pay Via</th>
                                  <th>Amount</th>
                                  <th>Date Time</th>
                                </tr>
                              </thead>
                              <tbody>

                                <?php 
                                $sql="SELECT * FROM transactions WHERE order_no='$order' ORDER BY id DESC";
                                $rztl=mysqli_query($conn,$sql);
                                if ($rztl->num_rows>0) {
                                  $id=1;
                                  while ($row=mysqli_fetch_assoc($rztl)) {



                                   ?>
                                   <tr>
                                    <td><?php echo $row['id'];?></td>
                                    <td><?php echo $row['transaction_no'];?></td>
                                    <td><?php echo $row['pay_via'];?></td>
                                    <td>$<?php echo number_format($row['amount'],2);?></td>
                                    <td><?php echo $row['datetime'];?></td>

                                  </tr>
                                  <?php $id++; } } ?> 

                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>


                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>    

      <?php include 'footer.php';?>
