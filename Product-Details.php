<?php include 'header.php';

$get_prod_no=$_GET['p'];

$sql1="SELECT * FROM products WHERE prod_no='$get_prod_no' AND p_status='Active' ORDER BY id DESC";
$rztl1=mysqli_query($conn,$sql1);
if ($rztl1->num_rows>0) {

    $data=mysqli_fetch_assoc($rztl1);

}
else{
    ?>
    <script type="text/javascript">
        window.location.href='index';
    </script>
    <?php

}


if (isset($_POST['add_to_Cart_btn'])) {

    $qty_val=$_POST['qty_val'];


    $sql1x="SELECT * FROM products WHERE prod_no='$get_prod_no' AND p_status='Active'";
    $rztl1x=mysqli_query($conn,$sql1x);
    $row1x=mysqli_fetch_assoc($rztl1x);

    $product_price=$row1x['product_price'];

    $check_sql="SELECT * FROM cart WHERE prod_no='$get_prod_no' AND ip_address='$user_ipAddress'";
    $rztl_check=mysqli_query($conn,$check_sql);
    if ($rztl_check->num_rows>0) {

    $sqlxx="UPDATE cart SET qty=qty+$qty_val WHERE prod_no='$get_prod_no' AND ip_address='$user_ipAddress'";
    
    }
    else{

   $sqlxx = "INSERT INTO cart(prod_no,ip_address,qty,single_item_price) 
    VALUES ('$get_prod_no','$user_ipAddress',1,'$product_price')";


    }

    if (mysqli_query($conn, $sqlxx)) {
        ?>
        <script type="text/javascript">
            window.location.href='Cart';
        </script>
        <?php
    } 
    else {
    }

   
}

?>
<body class="home">

    <?php include 'navbar.php';?>
<div class="main-content main-content-details single no-sidebar">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-trail breadcrumbs">
                    <ul class="trail-items breadcrumb">
                        <li class="trail-item trail-begin">
                            <a href="index">Home</a>
                        </li>
                        <li class="trail-item">
                            <a href="#">Product</a>
                        </li>
                        <li class="trail-item trail-end active">
                           <?php echo $data['product_name'];?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="content-area content-details full-width col-lg-9 col-md-8 col-sm-12 col-xs-12">
                <div class="site-main">
                    <div class="details-product">
                        <div class="details-thumd">
                            <div class="image-preview-container image-thick-box image_preview_container">
                                <img style="height: 400px;width: 100%" id="img_zoom" data-zoom-image="Admin/Product_Image/<?php echo $data['product_image'];?>"
                                     src="Admin/Product_Image/<?php echo $data['product_image'];?>" alt="img">


                                <a href="#" class="btn-zoom open_qv"><i class="fa fa-search" aria-hidden="true"></i></a>
                            </div>
                            <div class="product-preview image-small product_preview">
                                
                                <div id="thumbnails" class="thumbnails_carousel owl-carousel" data-nav="true"
                                     data-autoplay="false" data-dots="false" data-loop="false" data-margin="10"
                                     data-responsive='{"0":{"items":3},"480":{"items":3},"600":{"items":3},"1000":{"items":3}}'>
                                   
                                      <?php 
                $sql1="SELECT * FROM product_images WHERE prod_no='$get_prod_no' ORDER BY id DESC";
                $rztl1=mysqli_query($conn,$sql1);
                if ($rztl1->num_rows>0) {
                  $id=1;
                  while ($row1=mysqli_fetch_assoc($rztl1)) {

                   ?>

                                    <a href="#" data-image="Admin/<?php echo $row1['p_image'];?>"
                                       data-zoom-image="Admin/<?php echo $row1['p_image'];?>" class="active">
                                        <img style="height: 200px" src="Admin/<?php echo $row1['p_image'];?>"
                                             data-large-image="Admin/<?php echo $row1['p_image'];?>" alt="<?php echo $data['product_name'];?>">
                                    </a>

                                <?php } } ?>
                                </div>
                            </div>
                        </div>
                        <div class="details-infor">
                            <h1 class="product-title">
                                <?php echo $data['product_name'];?>
                            </h1>
                            <h5><?php echo $data['short_desc'];?></h5>
                            <div class="stars-rating">
                                <div class="star-rating">
                                    <span class="star-5"></span>
                                </div>
                                <div class="count-star">
                                    (7)
                                </div>
                            </div>
                            <div class="availability">
                                availability:
                                <a href="#">in Stock</a>
                            </div>
                            <div class="price">
                                <span>$<?php echo number_format($data['product_price'],2);?></span>
                            </div>
                            <div class="product-details-description">
                                <ul>
                                     <?php 
                $sql1="SELECT * FROM products_key_points WHERE prod_no='$get_prod_no' ORDER BY id DESC";
                $rztl1=mysqli_query($conn,$sql1);
                if ($rztl1->num_rows>0) {
                  $id=1;
                  while ($row1=mysqli_fetch_assoc($rztl1)) {

                   ?>
                                    <li><?php echo $row1['key_points'];?></li>
                            <?php } } ?>
                                </ul>
                            </div>
                            <div class="variations">
                             
                               
                            </div>
                            <div class="group-button">
                             
                                <form action="" method="POST">
                                <div class="quantity-add-to-cart">
                                    <div class="quantity">
                                        <div class="control">
                                            <a class="btn-number qtyminus quantity-minus" href="#">-</a>
                                            <input required name="qty_val" type="text" data-step="1" data-min="0" value="1" title="Qty"
                                                   class="input-qty qty" size="4">
                                            <a href="#" class="btn-number qtyplus quantity-plus">+</a>
                                        </div>
                                    </div>
                                    <button name="add_to_Cart_btn" class="single_add_to_cart_button button">Add to cart </button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-details-product">
                        <ul class="tab-link">

                            <li class="active">
                                <a data-toggle="tab" aria-expanded="true" href="#product-descriptions">Descriptions </a>
                            </li>
                    
                          
                        </ul>
                        <div class="tab-container">
                            <div id="product-descriptions" class="tab-panel active">
                                <p>
                                    <?php echo $data['long_description'];?>
                                </p>
                            </div>
                      
                        </div>
                    </div>
                    <div style="clear: left;"></div>
                    <div class="related products product-grid">
                        <h2 class="product-grid-title">You may also like</h2>
                        <div class="owl-products owl-slick equal-container nav-center"  data-slick ='{"autoplay":false, "autoplaySpeed":1000, "arrows":true, "dots":false, "infinite":true, "speed":800, "rows":1}' data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":3}},{"breakpoint":"1200","settings":{"slidesToShow":2}},{"breakpoint":"992","settings":{"slidesToShow":2}},{"breakpoint":"480","settings":{"slidesToShow":1}}]'>
                          
                          <?php 
                          $product_cat=$data['product_cat'];

                          $sql12="SELECT * FROM products WHERE product_cat='$product_cat' AND p_status='Active' AND prod_no!='$get_prod_no' ORDER BY id DESC";
                            $rztl12=mysqli_query($conn,$sql12);
                            if ($rztl12->num_rows>0) {

                                while ($row12=mysqli_fetch_assoc($rztl12)) {

                                    ?>
                            <div class="product-item style-1">
                                <div class="product-inner equal-element">
                                    <div class="product-top">
                                        <div class="flash">
													<span class="onnew">
														<span class="text">
															new
														</span>
													</span>
                                        </div>
                                    </div>
                                    <div class="product-thumb">
                                        <div class="thumb-inner">
                                            <a href="Product-Details?p=<?php echo $row12['prod_no'];?>">
                                               <img style="height: 300px" src="Admin/Product_Image/<?php echo $row12['product_image'];?>" alt="<?php echo $row1['product_name'];?>">
                                            </a>
                                            <div class="thumb-group">
                                                
                                               
                                                <div onclick="add_to_cart_item(<?php echo $row12['prod_no'];?>)" class="loop-form-add-to-cart">
                                                    <button class="single_add_to_cart_button button">Add to cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <h5 class="product-name product_title">
                                            <a href="#"><?php echo $row12['product_name'];?></a>
                                        </h5>
                                        <div class="group-info">
                                            <div class="stars-rating">
                                                <div class="star-rating">
                                                    <span class="star--<?php echo rand(3,5);?>"></span>
                                                </div>
                                                <div class="count-star">
                                                    (-<?php echo rand(3,5);?>)
                                                </div>
                                            </div>
                                            <div class="price">
                                                        <del>
                                                            $<?php echo number_format($row12['product_old_price'],2);?>
                                                        </del>
                                                        <ins>
                                                            $<?php echo number_format($row12['product_price'],2);?>
                                                        </ins>
                                                    </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php } } ?>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php include 'footer.php';?>
