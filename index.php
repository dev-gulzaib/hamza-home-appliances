<?php include 'header.php'; ?>
<style>
    .scent-scroll {
        overflow-x: auto;
        white-space: nowrap;
        padding: 10px 0;
    }

    .scent-card {
        display: inline-block;
        width: 120px;
        height: 120px;
        /* margin-right: 10px; */
        /* Remove this line */
        margin-right: -3px;
        /* Optional, to be explicit */
        overflow: hidden;
        position: relative;
        flex-shrink: 0;
        transition: transform 0.3s ease;
    }

    .scent-card:hover {
        transform: scale(1.05);
    }

    .scent-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .scent-label {
        position: absolute;
        bottom: 0;
        width: 100%;
        background: rgba(0, 0, 0, 0.4);
        color: #fff;
        text-align: center;
        font-weight: 600;
        font-size: 14px;
        padding: 4px 0;
    }
</style>

<body class="home">

    <?php include 'navbar.php'; ?>

    <div class="main-content">
        <div class="fullwidth-template">
            <div class="home-slider style1 rows-space-30">
                <div class="container">
                    <div class="slider-owl owl-slick equal-container nav-center"
                        data-slick='{"autoplay":true, "autoplaySpeed":9000, "arrows":true, "dots":false, "infinite":true, "speed":1000, "rows":1}'
                        data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":1}}]'>


                        <?php
                        $sql1 = "SELECT * FROM products WHERE  p_status='Active' ORDER BY id DESC LIMIT 1";
                        $rztl1 = mysqli_query($conn, $sql1);
                        if ($rztl1->num_rows > 0) {

                            $row1 = mysqli_fetch_assoc($rztl1);

                            ?>
                            <div class="slider-item style1">
                                <div class="slider-inner equal-element">
                                    <div class="slider-infor">
                                        <h5 class="title-small">
                                            New Arrivals!
                                        </h5>
                                        <h3 class="title-big">
                                            Esatto<br />
                                            Tumble Dryer
                                        </h3>
                                        <div class="price">
                                            Price from:
                                            <span class="number-price">
                                                £ 220.00
                                                <!-- £<?php echo number_format($row1['product_price'], 2); ?> -->
                                            </span>plus delivery
                                        </div>
                                        <a href="Shop" class="button btn-shop-the-look bgroud-style">Shop now</a>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>





                        <?php
                        $sql1 = "SELECT * FROM products WHERE p_status='Active' ORDER BY id DESC LIMIT 1 OFFSET 1";
                        $rztl1 = mysqli_query($conn, $sql1);
                        if ($rztl1->num_rows > 0) {

                            $row1 = mysqli_fetch_assoc($rztl1);

                            ?>
                            <div class="slider-item style2">
                                <div class="slider-inner equal-element">
                                    <div class="slider-infor">
                                        <h5 class="title-small">
                                            Villow!
                                        </h5>
                                        <h3 class="title-big">
                                            Front Load <span>6kg</span> <br /> Washing Machine
                                        </h3>
                                        <div class="price">
                                            Price from:
                                            <span class="number-price">
                                                <!-- $<?php echo number_format($row1['product_price'], 2); ?> -->
                                                £ 245.00
                                            </span>plus delivery
                                        </div>
                                        <a href="Shop" class="button btn-shop-now">Shop now</a>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>

                        <?php
                        $sql1 = "SELECT * FROM products WHERE  p_status='Active' ORDER BY id DESC LIMIT 1 OFFSET 2";
                        $rztl1 = mysqli_query($conn, $sql1);
                        if ($rztl1->num_rows > 0) {

                            $row1 = mysqli_fetch_assoc($rztl1);

                            ?>
                            <div class="slider-item style3">
                                <div class="slider-inner equal-element">
                                    <div class="slider-infor">
                                        <h5 class="title-small">
                                            Vacuum Cleaner!
                                        </h5>
                                        <h3 class="title-big">
                                            Wet & Dry <span>60L</span><br />
                                            Tank
                                        </h3>
                                        <div class="price">
                                            Price from:
                                            <span class="number-price">
                                                £ 250.00
                                                <!-- $<?php echo number_format($row1['product_price'], 2); ?> -->
                                            </span>plus delivery
                                        </div>
                                        <a href="Shop" class="button btn-shop-now">Shop now</a>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>


                    </div>
                </div>
            </div>
            <div class="banner-wrapp rows-space-35">
                <div class="container">


                    <div class="container text-center">
                        <div class="scent-scroll d-flex justify-content-start px-3">
                            <!-- Repeat these blocks for each scent -->
                            <div class="scent-card">
                                <img src="assets/images/esato.png" alt="Esatto">
                                <div class="scent-label">Esatto</div>
                            </div>
                            <div class="scent-card">
                                <img src="assets/images/vilow.jpg" alt="Willow">
                                <div class="scent-label">Willow</div>
                            </div>
                            <div class="scent-card">
                                <img src="assets/images/vaccum.jpg" alt="Vacuum">
                                <div class="scent-label">Vacuum Cleaner</div>
                            </div>
                            <div class="scent-card">
                                <img src="assets/images/acces.jpg" alt="Accessories">
                                <div class="scent-label">Accessories</div>
                            </div>
                            <!-- <div class="scent-card">
        <img src="assets/images/f5.webp" alt="Floral">
        <div class="scent-label">FLORAL</div>
      </div>
      <div class="scent-card">
        <img src="assets/images/f6.webp" alt="Citrus">
        <div class="scent-label">CITRUS</div>
      </div>
      <div class="scent-card">
        <img src="assets/images/f7.webp" alt="Animalic">
        <div class="scent-label">ANIMALIC</div>
      </div>
      <div class="scent-card">
        <img src="assets/images/f8.webp" alt="Gourmand">
        <div class="scent-label">GOURMAND</div>
      </div>
      <div class="scent-card">
        <img src="assets/images/f9.webp" alt="Woody">
        <div class="scent-label">WOODY</div>
      </div> -->
                        </div>
                    </div>

                    <!--      <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="banner">
                    <div class="item-banner style12">
                        <div class="inner">
                            <div class="banner-content">
                                <h3 class="title">Best Seller</h3>
                                <div class="description">
                                    Check out our your <br/> perfume collection now!
                                </div>
                                <a href="Shop" class="button btn-shop-now">Shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="banner">
                    <div class="item-banner style14">
                        <div class="inner">
                            <div class="banner-content">
                                <h4 class="stelina-subtitle">Fast Delivery</h4>
                                <h3 class="title">Products <br/>in 24 Hours</h3>
                                <div class="code">
                                    Enjoy <span class="nummer-code">Express Shipping</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="banner">
                    <div class="item-banner style12 type2">
                        <div class="inner">
                            <div class="banner-content">
                                <h3 class="title">Fragrance</h3>
                                <div class="description">
                                    New Perfume Collections <br/>Summer Fragrance
                                </div>
                                <a href="Shop" class="button btn-view-the-look">Shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
                </div>
            </div>
            <div class="stelina-tabs  default rows-space-40">
                <div class="container">
                    <div class="tab-head">
                        <ul class="tab-link">
                            <li class="active">
                                <a data-toggle="tab" aria-expanded="true" href="#bestseller">Bestseller</a>
                            </li>
                            <li class="">
                                <a data-toggle="tab" aria-expanded="true" href="#new_arrivals">New Arrivals </a>
                            </li>
                            <li class="">
                                <a data-toggle="tab" aria-expanded="true" href="#top-rated">Top Rated</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-container">
                        <div id="bestseller" class="tab-panel active">
                            <div class="stelina-product">
                                <ul class="row list-products auto-clear equal-container product-grid">


                                    <?php
                                    $sql1 = "SELECT * FROM products WHERE best_seller=1 AND p_status='Active' ORDER BY id DESC LIMIT 8";
                                    $rztl1 = mysqli_query($conn, $sql1);
                                    if ($rztl1->num_rows > 0) {

                                        while ($row1 = mysqli_fetch_assoc($rztl1)) {
                                            ?>

                                            <li class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
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
                                                            <a href="Product-Details?p=<?php echo $row1['prod_no']; ?>">
                                                                <img style="height: 300px"
                                                                    src="Admin/Product_Image/<?php echo $row1['product_image']; ?>"
                                                                    alt="<?php echo $row1['product_name']; ?>">
                                                            </a>
                                                            <div class="thumb-group">

                                                                <!-- <a href="#" class="button quick-wiew-button">Quick View</a> -->



                                                                <div onclick="add_to_cart_item(<?php echo $row1['prod_no']; ?>)"
                                                                    class="loop-form-add-to-cart">
                                                                    <button class="single_add_to_cart_button button">Add to cart
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">
                                                        <h5 class="product-name product_title">
                                                            <a
                                                                href="Product-Details?p=<?php echo $row1['prod_no']; ?>"><?php echo $row1['product_name']; ?></a>
                                                        </h5>
                                                        <div class="group-info">
                                                            <div class="stars-rating">
                                                                <div class="star-rating">
                                                                    <span class="star-<?php echo rand(3, 5); ?>"></span>
                                                                </div>
                                                                <div class="count-star">
                                                                    <?php echo rand(3, 5); ?>
                                                                </div>
                                                            </div>
                                                            <div class="price">
                                                                <del>
                                                                    £<?php echo number_format($row1['product_old_price'], 2); ?>
                                                                </del>
                                                                <ins>
                                                                    £<?php echo number_format($row1['product_price'], 2); ?>
                                                                </ins>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                        <?php }
                                    } ?>




                                </ul>
                            </div>
                        </div>
                        <div id="new_arrivals" class="tab-panel">
                            <div class="stelina-product">
                                <ul class="row list-products auto-clear equal-container product-grid">


                                    <?php
                                    $sql1 = "SELECT * FROM products WHERE new_arrivals=1 AND  p_status='Active' ORDER BY id DESC LIMIT 8";
                                    $rztl1 = mysqli_query($conn, $sql1);
                                    if ($rztl1->num_rows > 0) {

                                        while ($row1 = mysqli_fetch_assoc($rztl1)) {
                                            ?>

                                            <li class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
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
                                                            <a href="Product-Details?p=<?php echo $row1['prod_no']; ?>">
                                                                <img style="height: 300px"
                                                                    src="Admin/Product_Image/<?php echo $row1['product_image']; ?>"
                                                                    alt="<?php echo $row1['product_name']; ?>">
                                                            </a>
                                                            <div class="thumb-group">
                                                                <!-- <a href="#" class="button quick-wiew-button">Quick View</a> -->


                                                                <div onclick="add_to_cart_item(<?php echo $row1['prod_no']; ?>)"
                                                                    class="loop-form-add-to-cart">
                                                                    <button class="single_add_to_cart_button button">Add to cart
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">
                                                        <h5 class="product-name product_title">
                                                            <a
                                                                href="Product-Details?p=<?php echo $row1['prod_no']; ?>"><?php echo $row1['product_name']; ?></a>
                                                        </h5>
                                                        <div class="group-info">
                                                            <div class="stars-rating">
                                                                <div class="star-rating">
                                                                    <span class="star-<?php echo rand(3, 5); ?>"></span>
                                                                </div>
                                                                <div class="count-star">
                                                                    <?php echo rand(3, 5); ?>
                                                                </div>
                                                            </div>
                                                            <div class="price">
                                                                <del>
                                                                    $<?php echo number_format($row1['product_old_price'], 2); ?>
                                                                </del>
                                                                <ins>
                                                                    $<?php echo number_format($row1['product_price'], 2); ?>
                                                                </ins>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                        <?php }
                                    } ?>
                                </ul>
                            </div>
                        </div>


                        <div id="top-rated" class="tab-panel">
                            <div class="stelina-product">
                                <ul class="row list-products auto-clear equal-container product-grid">
                                    <?php
                                    $sql1 = "SELECT * FROM products WHERE new_top_rated=1 AND  p_status='Active' ORDER BY id DESC LIMIT 8";
                                    $rztl1 = mysqli_query($conn, $sql1);
                                    if ($rztl1->num_rows > 0) {

                                        while ($row1 = mysqli_fetch_assoc($rztl1)) {
                                            ?>

                                            <li class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
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
                                                            <a href="Product-Details?p=<?php echo $row1['prod_no']; ?>">
                                                                <img style="height: 300px"
                                                                    src="Admin/Product_Image/<?php echo $row1['product_image']; ?>"
                                                                    alt="<?php echo $row1['product_name']; ?>">
                                                            </a>
                                                            <div class="thumb-group">

                                                                <a href="#" class="button quick-wiew-button">Quick View</a>
                                                                <div onclick="add_to_cart_item(<?php echo $row1['prod_no']; ?>)"
                                                                    class="loop-form-add-to-cart">
                                                                    <button class="single_add_to_cart_button button">Add to cart
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">
                                                        <h5 class="product-name product_title">
                                                            <a
                                                                href="Product-Details?p=<?php echo $row1['prod_no']; ?>"><?php echo $row1['product_name']; ?></a>
                                                        </h5>
                                                        <div class="group-info">
                                                            <div class="stars-rating">
                                                                <div class="star-rating">
                                                                    <span class="star-<?php echo rand(3, 5); ?>"></span>
                                                                </div>
                                                                <div class="count-star">
                                                                    <?php echo rand(3, 5); ?>
                                                                </div>
                                                            </div>
                                                            <div class="price">
                                                                <del>
                                                                    $<?php echo number_format($row1['product_old_price'], 2); ?>
                                                                </del>
                                                                <ins>
                                                                    $<?php echo number_format($row1['product_price'], 2); ?>
                                                                </ins>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                        <?php }
                                    } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-wrapp rows-space-60">
                <div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="banner">
                                <div class="item-banner style6">
                                    <div class="inner">
                                        <div class="container">
                                            <div class="banner-content">
                                                <h4 class="stelina-subtitle">Celebrate Day Sale!</h4>
                                                <h3 class="title">Save <span>25%</span> Of On All<br />Items Collection
                                                </h3>
                                                <a href="#" class="button btn-view-promotion">Shop now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="banner-wrapp rows-space-30">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-12">
                            <div class="banner">
                                <div class="item-banner style10">
                                    <div class="inner">
                                        <div class="banner-content">
                                            <h4 class="stelina-subtitle">Jewelry Collection!</h4>
                                            <h3 class="title">Big Deal Of The Day</h3>
                                            <div class="description">
                                                We’ve been waiting for you!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <div class="banner">
                                <div class="item-banner style11">
                                    <div class="inner">
                                        <div class="banner-content">
                                            <h4 class="stelina-subtitle">Let’s us make your style!</h4>
                                            <h3 class="title">Best Collection </h3>
                                            <div class="description">
                                                A complete shopping guide on what & how to wear it!
                                            </div>
                                            <a href="#" class="button btn-shopping-us">Shop now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="stelina-blog-wraap">
                <div class="container">
                    <h3 class="custommenu-title-blog">
                        Our Latest News
                    </h3>
                    <div class="stelina-blog default">
                        <div class="owl-slick equal-container nav-center"
                            data-slick='{"autoplay":false, "autoplaySpeed":1000, "arrows":false, "dots":true, "infinite":true, "speed":800, "rows":1}'
                            data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":3}},{"breakpoint":"1200","settings":{"slidesToShow":3}},{"breakpoint":"992","settings":{"slidesToShow":2}},{"breakpoint":"768","settings":{"slidesToShow":2}},{"breakpoint":"481","settings":{"slidesToShow":1}}]'>
                            <div class="stelina-blog-item equal-element layout1">
                                <div class="post-thumb">
                                    <a href="#">
                                        <img src="assets/images/b-1.png" alt="img">
                                    </a>
                                    <div class="category-blog">
                                        <ul class="list-category">
                                            <li class="category-item">
                                                <a href="#">Skincare</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="post-item-share">
                                        <a href="#" class="icon">
                                            <i class="fa fa-share-alt" aria-hidden="true"></i>
                                        </a>
                                        <div class="box-content">
                                            <a href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                            <a href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                            <a href="#">
                                                <i class="fa fa-google-plus"></i>
                                            </a>
                                            <a href="#">
                                                <i class="fa fa-pinterest"></i>
                                            </a>
                                            <a href="#">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-info">
                                    <div class="blog-meta">
                                        <div class="post-date">
                                            Agust 17, 09:14 am
                                        </div>
                                        <span class="view">
                                            <i class="icon fa fa-eye" aria-hidden="true"></i>
                                            631
                                        </span>
                                        <span class="comment">
                                            <i class="icon fa fa-commenting" aria-hidden="true"></i>
                                            84
                                        </span>
                                    </div>
                                    <h2 class="blog-title">
                                        <a href="#">We bring you the best by working</a>
                                    </h2>
                                    <div class="main-info-post">
                                        <p class="des">
                                            Phasellus condimentum nulla a arcu lacinia, a venenatis ex congue.
                                            Mauris nec ante magna.
                                        </p>
                                        <a class="readmore" href="#">Read more</a>
                                    </div>
                                </div>
                            </div>
                            <div class="stelina-blog-item equal-element layout1">
                                <div class="post-thumb">
                                    <a href="#">
                                        <img src="assets/images/b-2.png" alt="img">
                                    </a>
                                    <div class="category-blog">
                                        <ul class="list-category">
                                            <li class="category-item">
                                                <a href="#">HOW TO</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="post-item-share">
                                        <a href="#" class="icon">
                                            <i class="fa fa-share-alt" aria-hidden="true"></i>
                                        </a>
                                        <div class="box-content">
                                            <a href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                            <a href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                            <a href="#">
                                                <i class="fa fa-google-plus"></i>
                                            </a>
                                            <a href="#">
                                                <i class="fa fa-pinterest"></i>
                                            </a>
                                            <a href="#">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-info">
                                    <div class="blog-meta">
                                        <div class="post-date">
                                            Agust 17, 09:14 am
                                        </div>
                                        <span class="view">
                                            <i class="icon fa fa-eye" aria-hidden="true"></i>
                                            631
                                        </span>
                                        <span class="comment">
                                            <i class="icon fa fa-commenting" aria-hidden="true"></i>
                                            84
                                        </span>
                                    </div>
                                    <h2 class="blog-title">
                                        <a href="#">We know that buying Items</a>
                                    </h2>
                                    <div class="main-info-post">
                                        <p class="des">
                                            Using Lorem Ipsum allows designers to put together layouts
                                            and the form content
                                        </p>
                                        <a class="readmore" href="#">Read more</a>
                                    </div>
                                </div>
                            </div>
                            <div class="stelina-blog-item equal-element layout1">
                                <div class="post-thumb">
                                    <div class="video-stelina-blog">
                                        <figure>
                                            <img src="assets/images/b-3.png" alt="img" width="370"
                                                height="280">
                                        </figure>
                                        <a class="quick-install" href="#" data-videosite="vimeo"
                                            data-videoid="134060140"></a>
                                    </div>
                                    <div class="category-blog">
                                        <ul class="list-category">
                                            <li class="category-item">
                                                <a href="#">VIDEO</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="post-item-share">
                                        <a href="#" class="icon">
                                            <i class="fa fa-share-alt" aria-hidden="true"></i>
                                        </a>
                                        <div class="box-content">
                                            <a href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                            <a href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                            <a href="#">
                                                <i class="fa fa-google-plus"></i>
                                            </a>
                                            <a href="#">
                                                <i class="fa fa-pinterest"></i>
                                            </a>
                                            <a href="#">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-info">
                                    <div class="blog-meta">
                                        <div class="post-date">
                                            Agust 17, 09:14 am
                                        </div>
                                        <span class="view">
                                            <i class="icon fa fa-eye" aria-hidden="true"></i>
                                            631
                                        </span>
                                        <span class="comment">
                                            <i class="icon fa fa-commenting" aria-hidden="true"></i>
                                            84
                                        </span>
                                    </div>
                                    <h2 class="blog-title">
                                        <a href="#">We design functional Items</a>
                                    </h2>
                                    <div class="main-info-post">
                                        <p class="des">
                                            Risus non porta suscipit lobortis habitasse felis, aptent
                                            interdum pretium ut.
                                        </p>
                                        <a class="readmore" href="#">Read more</a>
                                    </div>
                                </div>
                            </div>
                            <div class="stelina-blog-item equal-element layout1">
                                <div class="post-thumb">
                                    <a href="#">
                                        <img src="assets/images/b-4.png" alt="img">
                                    </a>
                                    <div class="category-blog">
                                        <ul class="list-category">
                                            <li class="category-item">
                                                <a href="#">Skincare</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="post-item-share">
                                        <a href="#" class="icon">
                                            <i class="fa fa-share-alt" aria-hidden="true"></i>
                                        </a>
                                        <div class="box-content">
                                            <a href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                            <a href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                            <a href="#">
                                                <i class="fa fa-google-plus"></i>
                                            </a>
                                            <a href="#">
                                                <i class="fa fa-pinterest"></i>
                                            </a>
                                            <a href="#">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-info">
                                    <div class="blog-meta">
                                        <div class="post-date">
                                            Agust 17, 09:14 am
                                        </div>
                                        <span class="view">
                                            <i class="icon fa fa-eye" aria-hidden="true"></i>
                                            631
                                        </span>
                                        <span class="comment">
                                            <i class="icon fa fa-commenting" aria-hidden="true"></i>
                                            84
                                        </span>
                                    </div>
                                    <h2 class="blog-title">
                                        <a href="#">We know that buying Items</a>
                                    </h2>
                                    <div class="main-info-post">
                                        <p class="des">
                                            Class integer tellus praesent at torquent cras, potenti erat fames
                                            volutpat etiam.
                                        </p>
                                        <a class="readmore" href="#">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php include 'footer.php'; ?>