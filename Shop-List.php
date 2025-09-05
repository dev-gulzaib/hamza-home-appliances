<?php include 'header.php';?>
<body class="home">

 <?php include 'navbar.php';?>
<div class="main-content main-content-product no-sidebar">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-trail breadcrumbs">
                    <ul class="trail-items breadcrumb">
                        <li class="trail-item trail-begin">
                            <a href="index">Home</a>
                        </li>
                        <li class="trail-item trail-end active">
                           <?php echo $web_name;?> Products
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="content-area  shop-grid-content full-width col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="site-main">
                  <div class="shop-top-control">
                            <form class="select-item select-form">

                            </form>
                            <form class="filter-choice select-form">

                            </form>
                            <div class="grid-view-mode">
                                <div class="inner">
                                    <a href="#" class="modes-mode mode-list active">
                                        <span></span>
                                        <span></span>
                                    </a>
                                    <a href="Shop" class="modes-mode mode-grid  ">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <h3 class="custom_blog_title">
                        List Products
                    </h3>
                    <ul class="row list-products auto-clear equal-container product-list">
                      


                            <?php 
                            $sql1="SELECT * FROM products WHERE  p_status='Active' ORDER BY id DESC";
                            $rztl1=mysqli_query($conn,$sql1);
                            if ($rztl1->num_rows>0) {

                                while ($row1=mysqli_fetch_assoc($rztl1)) {
                                    ?>
                        <li class="product-item style-list col-lg-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-ts-12" >
                            <div class="product-inner equal-element" style="padding-top: 5px;">
                                <div class="product-top">
                                    <div class="flash">
											<span class="onnew">
												<span class="text">
													new
												</span>
											</span>
                                    </div>
                                </div>
                                <div class="products-bottom-content">
                                    <div class="product-thumb">
                                        <div class="thumb-inner">
                                                <a href="Product-Details?p=<?php echo $row1['prod_no'];?>">
                                                        <img style="height: 250px" src="Admin/Product_Image/<?php echo $row1['product_image'];?>" alt="<?php echo $row1['product_name'];?>">
                                                    </a>
                                        </div>
                                    </div>
                                    <div class="product-info-left">
                                        <div class="yith-wcwl-add-to-wishlist">
                                            <div class="yith-wcwl-add-button">
                                                <a href="#">Add to Wishlist</a>
                                            </div>
                                        </div>
                                        <h5 class="product-name product_title">
                                          <a href="Product-Details?p=<?php echo $row1['prod_no'];?>"><?php echo $row1['product_name'];?></a>
                                        </h5>
                                        <div class="stars-rating">
                                            <div class="star-rating">
                                                <span class="star-<?php echo rand(3,5);?>"></span>
                                            </div>
                                            <div class="count-star">
                                                (<?php echo rand(3,5);?>)
                                            </div>
                                        </div>
                                       
                                           
                 <?php 
                 $get_prod_no=$row1['prod_no'];
                $sql11="SELECT * FROM products_key_points WHERE prod_no='$get_prod_no' ORDER BY id DESC";
                $rztl11=mysqli_query($conn,$sql11);
                if ($rztl11->num_rows>0) {
                  while ($row11=mysqli_fetch_assoc($rztl11)) {

                   ?>
                                         <ul class="product-attributes">
                                             <li><?php echo $row11['key_points'];?></li>
                                         </ul>
                                     <?php } } ?>
                                    
                                    </div>
                                    <div class="product-info-right">
                                        <div class="price">
                                                        <del>
                                                            $<?php echo number_format($row1['product_old_price'],2);?>
                                                        </del>
                                                        <ins>
                                                            $<?php echo number_format($row1['product_price'],2);?>
                                                        </ins>
                                                    </div>
                                        <div class="product-list-message">
                                        </div>
                                        <form class="cart">
                                            <div class="single_variation_wrap">
                                                <div class="quantity">
                                                    <div class="control">
                                                        <a class="btn-number qtyminus quantity-minus" href="#">-</a>
                                                        <input type="text" data-step="1" data-min="0" value="1"
                                                               title="Qty" class="input-qty qty" size="4">
                                                        <a href="#" class="btn-number qtyplus quantity-plus">+</a>
                                                    </div>
                                                </div>
                                                <button type="button" onclick="add_to_cart_item(<?php echo $row1['prod_no'];?>)" class="single_add_to_cart_button button">Add to cart</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>

                    <?php } } ?>
                   
                    </ul>
                  
                </div>
            </div>


        </div>
    </div>
</div>
    <?php include 'footer.php';?>
