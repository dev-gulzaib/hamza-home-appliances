<?php include 'header.php';




if(isset($_POST['delbtn'])){
        
  $delid=$_POST['delid'];
      

  $insert="DELETE FROM contact_msgs WHERE id='$delid'";
    if (mysqli_query($conn,$insert)) {
  
     ?>
  <script type="text/javascript">
    alert('Message Deleted Successfully.');
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
              <h4 class="page-title">Contact</h4>
            </div>
          </div>
        </div>
     
        <div class="container-fluid">
          
          <div class="row">
            <div class="col-12">

       
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Contact Details</h5>
                  <div class="table-responsive">
                    <table
                      id="zero_config"
                      class="table table-striped table-bordered"
                    >
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Date</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Subject</th>
                          <th>Phone</th>
                          <th>Message</th>
                          <th>Action</th>
                          <!-- <th></th> -->
                        </tr>
                      </thead>
                      <tbody>

                  <?php 
                  $sql="SELECT * FROM contact_msgs ORDER BY id DESC";
                  $rztl=mysqli_query($conn,$sql);
                  if ($rztl->num_rows>0) {
                    $id=1;
                   while ($row=mysqli_fetch_assoc($rztl)) {

                   ?>
                        <tr>
                          <td><?php echo $id;?></td>
                          <td><?php echo $row['datetime'];?></td>
                          <td><?php echo $row['name'];?></td>
                          <td><?php echo $row['email'];?></td>
                          <td><?php echo $row['subject'];?></td>
                          <td><?php echo $row['phone'];?></td>
                          <td><?php echo $row['message'];?></td>

                          <td>
                             <form action="" onsubmit="return confirm('Are you sure you want to delete this record?');" method="POST">
                              <input value="<?php echo $row['id'];?>" type="hidden" name="delid">
                               <button name="delbtn" class="btn btn-dark">Delete</button>
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
        