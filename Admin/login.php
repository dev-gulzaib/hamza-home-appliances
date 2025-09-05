<?php  include '../db.php';?>
<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png"
    />
    <link href="dist/css/style.min.css" rel="stylesheet" />
 
      <style type="text/css">
 input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
-webkit-appearance: none;
}

input[type=number] {
-moz-appearance:textfield;
}

 ::-webkit-file-upload-button {
      display: none;
    }
    ::file-selector-button {
      display: none;
    }
      </style>
  </head>

<?php
 session_start();
 if (isset($_POST['login_acc'])) {
  
  $email=$_POST['email'];
  $pass=md5($_POST['pass']);

  $sql="SELECT * FROM admin WHERE email='$email' AND pass='$pass'";
  $rzlt=mysqli_query($conn,$sql);
  if ($rzlt->num_rows>0) {

       $_SESSION['admin_id']=$email;
        ?> 
        <script type="text/javascript">
          window.location.href='index.php';
        </script>
        <?php
       }
       else{
    ?>
     <script type="text/javascript">
       alert('Please Enter Valid Details');
     </script>
     <?php 
  }

  }

?>

  <body>
    <div class="main-wrapper">
  
      <div class="preloader">
        <div class="lds-ripple">
          <div class="lds-pos"></div>
          <div class="lds-pos"></div>
        </div>
      </div>
      <div class=" auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
        <div class="auth-box bg-dark border-top border-secondary">
          <div id="loginform">
            <div class="text-center pt-3 pb-3">
              <span style="color: white;font-weight: bold;font-size: 30px;font-family: sans-serif;font-style: italic;"><?php echo $web_name;?> Admin Panel</span>
            </div>
            <!-- Form -->
            <form class="form-horizontal mt-3" id="loginform" action="" method="POST">
              <div class="row pb-4">
                <div class="col-12">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span
                        class="input-group-text bg-success text-white h-100"
                        id="basic-addon1"
                        ><i class="mdi mdi-account fs-4"></i
                      ></span>
                    </div>
                    <input type="email" class="form-control form-control-lg" placeholder="Enter Email" required="" name="email">
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span
                        class="input-group-text bg-warning text-white h-100"
                        id="basic-addon2"
                        ><i class="mdi mdi-lock fs-4"></i
                      ></span>
                    </div>
                    <input type="password" class="form-control form-control-lg" placeholder="Password" required="" minlength="6" name="pass">
                  </div>
                </div>
               
              </div>
          
                

              <div class="row border-top border-secondary">
                <div class="col-12">

                  <div class="form-group text-center">

                    <div class="pt-3">
                  <button class="btn btn-success text-white"  type="submit" name="login_acc"> Login
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
      
        </div>
      </div>
      
    </div>
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      $(".preloader").fadeOut();
      $("#to-recover").on("click", function () {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
      });
      $("#to-login").click(function () {
        $("#recoverform").hide();
        $("#loginform").fadeIn();
      });
    </script>
  </body>
</html>
