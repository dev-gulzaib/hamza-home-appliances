<?php include 'header.php';

if (isset($_POST['submit'])) {
    // code...
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];
    $datetime=date('d-m-Y h:i:s');

    $insert="INSERT INTO contact_msgs(name,email,phone,subject,message,datetime)
    VALUES('$name','$email','$phone','$subject','$message','$datetime')";
    if (mysqli_query($conn,$insert)) {

       ?>
       <script type="text/javascript">
        alert('Message Send Successfully.\nWe will contact your soon.');
        window.location.href='';
    </script>
    <?php
}

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
                                <a href="index">Home</a>
                            </li>
                            <li class="trail-item trail-end active">
                                Contact us
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="content-area content-contact col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="site-main">
                        <h3 class="custom_blog_title">Contact us</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-main-content">
            <div class="google-map">
                <!-- <iframe  src="https://maps.google.com/maps?q=university%20of%20san%20francisco&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe> -->

                <iframe id="gmap_canvas" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2977.2873690311917!2d-87.6213057!3d41.735894099999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880e25ff7ee65a07%3A0x6a1f496c638337e6!2s8714%20S%20Michigan%20Ave%2C%20Chicago%2C%20IL%2060619%2C%20USA!5e0!3m2!1sen!2s!4v1746221414360!5m2!1sen!2s" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-contact">
                            <div class="col-lg-8 no-padding">
                                <div class="form-message">
                                    <h2 class="title">
                                        Send us a Message!
                                    </h2>
                                    <form action="" method="POST" class="stelina-contact-fom">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p>
                                                    <span class="form-label">Your Name *</span>
                                                    <span class="form-control-wrap your-name">
                                                      <input required title="your-name" type="text" name="name" size="40"
                                                      class="form-control form-control-name">
                                                  </span>
                                              </p>
                                          </div>
                                          <div class="col-sm-6">
                                            <p>
                                             <span class="form-label">
                                              Your Email *
                                          </span>
                                          <span class="form-control-wrap your-email">
                                              <input title="your-email" required type="email" name="email" size="40"
                                              class="form-control form-control-email">
                                          </span>
                                      </p>
                                  </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-6">
                                    <p>
                                        <span class="form-label">Phone</span>
                                        <span class="form-control-wrap your-phone">
                                          <input title="your-phone" required type="text" name="phone"
                                          class="form-control form-control-phone">
                                      </span>
                                  </p>
                              </div>
                              <div class="col-sm-6">
                                <p>
                                 <span class="form-label">
                                    Sbuject
                                </span>
                                <span class="form-control-wrap your-company">
                                  <input required title="Sbuject" type="text" name="subject"
                                  class="form-control your-company">
                              </span>
                          </p>
                      </div>
                  </div>
                  <p>
                   <span class="form-label">
                    Your Message
                </span>
                <span class="wpcf7-form-control-wrap your-message">
                    <textarea required title="your-message" name="message" cols="40" rows="9"
                    class="form-control your-textarea"></textarea>
                </span>
            </p>
            <p>
                <input type="submit" name="submit" value="SEND MESSAGE"
                class="form-control-submit button-submit">
            </p>
        </form>
    </div>
</div>
<div class="col-lg-4 no-padding">
    <div class="form-contact-information">
        <form action="#" class="stelina-contact-info">
            <h2 class="title">
                Contact information
            </h2>
            <div class="info">
                <div class="item address">
                    <span class="icon">

                    </span>
                    <span class="text">
                      <?php echo $web_address;?>
                  </span>
              </div>
              <div class="item phone">
                <span class="icon">

                </span>
                <span class="text">
                  <?php echo $web_phone;?>
              </span>
          </div>
          <div class="item email">
            <span class="icon">

            </span>
            <span class="text">
             <?php echo $web_email;?>
         </span>
     </div>
 </div>
 <div class="socials">
    <a href="#" class="social-item" target="_blank">
        <span class="icon fa fa-facebook">

        </span>
    </a>
    <a href="#" class="social-item" target="_blank">
        <span class="icon fa fa-twitter-square">

        </span>
    </a>
    <a href="#" class="social-item" target="_blank">
        <span class="icon fa fa-instagram">

        </span>
    </a>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>    

<?php include 'footer.php';?>
