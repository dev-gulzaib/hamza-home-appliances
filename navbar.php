<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500&display=swap" rel="stylesheet">


<style type="text/css">
    .logo-text {
 font-family: 'Cormorant Garamond', serif;
  font-size: 30px;
  font-weight: bold;
  color: #333;
  letter-spacing: 1px;
}


.logo-text1 {
 font-family: 'Cormorant Garamond', serif;
  font-size: 20px;
  font-weight: bold;
  color: #333;
  letter-spacing: 1px;
}


.logo-text2 {
font-family: 'Cormorant Garamond', serif;
  font-size: 25px;
  font-weight: bold;
  color: #333;
  letter-spacing: 1px;
  text-align: center;
}
</style>
<header class="header style7">
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-left">
                <div class="header-message">
                    Welcome to our <?php echo $web_name;?> store!
                </div>
            </div>
            <div class="top-bar-right">
                <div class="header-language">
                    <div class="stelina-language ">
                        <a href="#" class="active language-toggle" data-stelina="stelina-dropdown">
                            <span>
                               English (USD)
                           </span>
                       </a>

                   </div>
               </div>
               <ul class="header-user-links">
                <li>
                    <a href="Track">Track your Order</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="container">
    <div class="main-header">
        <div class="row">
            <div class="col-lg-3 col-sm-4 col-md-3 col-xs-7 col-ts-12 header-element">
                <div class="logo">
                    <a href="index">
  <h4 class="logo-text"><?php echo $web_name;?></h4>
</a>

                </div>
            </div>
            <div class="col-lg-7 col-sm-8 col-md-6 col-xs-5 col-ts-12">
                <div class="block-search-block">
                    <form action="Category-Product" method="GET" class="form-search form-search-width-category">
                        <div class="form-content">
                            <div class="category">
                                <select name="id" required title="cate" data-placeholder="All Categories" class="chosen-select"
                                tabindex="1">
                                <option value="">Select</option>
                                <?php 
                                $sql1="SELECT * FROM categories ORDER BY id ASC";
                                $rztl1=mysqli_query($conn,$sql1);
                                if ($rztl1->num_rows>0) {

                                 while ($row1=mysqli_fetch_assoc($rztl1)) {

                                     ?>
                                     <option value="<?php echo $row1['id'];?>"><?php echo $row1['cat_name'];?></option>
                                 <?php } } ?> 
                             </select>
                         </div>
                         <div class="inner">
                            <input type="text" class="input" value="" placeholder="Search here">
                        </div>
                        <button class="btn-search" type="submit">
                            <span class="icon-search"></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <?php 
        $sql123xx="SELECT * FROM cart WHERE ip_address='$user_ipAddress'";
        $rztl1xx=mysqli_query($conn,$sql123xx);
        $total_row_items=mysqli_num_rows($rztl1xx);

        ?>

        <div class="col-lg-2 col-sm-12 col-md-3 col-xs-12 col-ts-12">
            <div class="header-control">
                <div class="block-minicart stelina-mini-cart block-header stelina-dropdown">
               <a href="javascript:void(0);" class="shopcart-icon" data-stelina="stelina-dropdown">
  Cart
  <span class="count"><?php echo $total_row_items;?></span>
</a>

               <div class="shopcart-description stelina-submenu">
  <div class="content-wrap">
    <h3 class="title">Shopping Cart</h3>
    <ul class="minicart-items" id="cartItems"></ul>
    <div class="subtotal">
      <span class="total-title">Subtotal: </span>
      <span class="total-price">
        <span class="Price-amount" id="subtotal">$0</span>
      </span>
    </div>
    <div class="actions">
      <a class="button button-viewcart" href="Cart"><span>View Bag</span></a>
      <a href="Checkout" class="button button-checkout"><span>Checkout</span></a>
    </div>
  </div>
</div>

<div class="no-product stelina-submenu" id="emptyCart" style="display: none;">
  <p class="text">You have <span>0 item(s)</span> in your bag</p>
</div>


            </div>
            <div class="block-account block-header stelina-dropdown">
                <a href="javascript:void(0);" data-stelina="stelina-dropdown">
                    <span class="flaticon-user"></span>
                </a>
                <div class="header-account stelina-submenu">
                    <div class="header-user-form-tabs">
                        <ul class="tab-link">
                           
                            <li class="active">
                                <a data-toggle="tab" aria-expanded="true" href="#header-tab-rigister">Track Order</a>
                            </li>
                        </ul>
                        <div class="tab-container">
                          
                            <div id="header-tab-rigister" class="tab-panel active">
                                <form method="get" action="Track-Order" class="register form-register">
                                  
                                    <p class="form-row form-row-wide">
                                        <input name="id" type="text" class="input-text" placeholder="Enter tracking id">
                                    </p>
                                    <p class="form-row">
                                        <input type="submit" class="button" value="Track Now">
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="menu-bar mobile-navigation menu-toggle" href="#">
                <span></span>
                <span></span>
                <span></span>
            </a>
        </div>
    </div>
</div>
</div>
</div>
<div class="header-nav-container">
    <div class="container">
        <div class="header-nav-wapper main-menu-wapper">
            <div class="vertical-wapper block-nav-categori">
                <div class="block-title">
                  <span class="icon-bar">
                     <span></span>
                     <span></span>
                     <span></span>
                 </span>
                 <span class="text">All Categories</span>
             </div>
             <div class="block-content verticalmenu-content">
                <ul class="stelina-nav-vertical vertical-menu stelina-clone-mobile-menu">

             <?php 
$sql1 = "SELECT * FROM categories ORDER BY id ASC";
$rztl1 = mysqli_query($conn, $sql1);

if (mysqli_num_rows($rztl1) > 0) {
    while ($row1 = mysqli_fetch_assoc($rztl1)) {
?>
    <li class="menu-item menu-item-has-children">
        <a title="Accessories" href="Category-Product?id=<?php echo $row1['id'];?>" class="stelina-menu-item-title"><?php echo $row1['cat_name']; ?></a>
        <span class="toggle-submenu"></span>
        <ul role="menu" class="submenu">
            <?php 
            $cat_id = $row1['id'];
            $sql12 = "SELECT * FROM sub_categories WHERE cat_id='$cat_id' ORDER BY sub_cat_name ASC";
            $rztl12 = mysqli_query($conn, $sql12);

            if (mysqli_num_rows($rztl12) > 0) {
                while ($row12 = mysqli_fetch_assoc($rztl12)) {
            ?>
                <li class="menu-item">
                    <a title="Living" href="SubCategory-Product?cat=<?php echo $row1['id'];?>&subcat=<?php echo $row12['id'];?>" class="stelina-item-title"><?php echo $row12['sub_cat_name']; ?></a>
                </li>
            <?php 
                } // end subcategories while
            } // end subcategories if 
            ?>
        </ul>
    </li>
<?php 
    } // end categories while
} // end categories if 
?>


                </ul>
            </div>
        </div>
        <div class="header-nav">
            <div class="container-wapper">
                <ul class="stelina-clone-mobile-menu stelina-nav main-menu " id="menu-main-menu">
                    <li class="menu-item">
                        <a href="index" class="stelina-menu-item-title" title="Home">Home</a>
                        <span class="toggle-submenu"></span>

                    </li>

                    <li class="menu-item">
                        <a href="About" class="stelina-menu-item-title" title="About">About</a>
                        <span class="toggle-submenu"></span>

                    </li>


                    <li class="menu-item menu-item-has-children">
                        <a href="Shop" class="stelina-menu-item-title" title="Shop">Shop</a>
                        <span class="toggle-submenu"></span>
                        <ul class="submenu">

                            <li class="menu-item">
                                <a href="Shop">All Products</a>
                            </li>

                            <?php 
                                $sql1="SELECT * FROM categories ORDER BY id ASC";
                                $rztl1=mysqli_query($conn,$sql1);
                                if ($rztl1->num_rows>0) {

                                 while ($row1=mysqli_fetch_assoc($rztl1)) {

                                     ?>
                            <li class="menu-item">
                                <a href="Category-Product?id=<?php echo $row1['id'];?>"><?php echo $row1['cat_name'];?></a>
                            </li>
                                 <?php } } ?> 

                           
                       
                        </ul>
                    </li>


                    <li class="menu-item">
                        <a href="#" class="stelina-menu-item-title"
                        title="Blogs">Blogs</a>
                        <span class="toggle-submenu"></span>

                    </li>
                    <li class="menu-item">
                        <a href="Contact" class="stelina-menu-item-title" title="About">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
</header>












<div class="header-device-mobile">
    <div class="wapper">
        <div class="item mobile-logo">
            <div class="logo">
                <a href="#">
                      <h4 class="logo-text2"><?php echo $web_name;?></h4>

                </a>
            </div>
        </div>
        <div class="item item mobile-search-box has-sub">
            <a href="#">
                <span class="icon">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </span>
            </a>
            <div class="block-sub">
                <a href="#" class="close">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
                <div class="header-searchform-box">
                    <form   method="get" action="Track-Order" class="header-searchform">
                        <div class="searchform-wrap">
                            <input required name="id" placeholder="Enter tracking id" type="text" class="search-input">
                            <input type="submit" class="submit button" value="Track">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="item mobile-settings-box has-sub">
            <a href="#">
                <span class="icon">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                </span>
            </a>
            <div class="block-sub">
                <a href="#" class="close">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
                <div class="block-sub-item">
                    <h5 class="block-item-title">Currency</h5>
                    <form class="currency-form stelina-language">
                        <ul class="stelina-language-wrap">
                            <li class="active">
                                <a href="#">
                                    <span>
                                        English (USD)
                                    </span>
                                </a>
                            </li>
                         
                        </ul>
                    </form>
                </div>
            </div>
        </div>
        <div class="item menu-bar">
            <a class=" mobile-navigation  menu-toggle" href="#">
                <span></span>
                <span></span>
                <span></span>
            </a>
        </div>
    </div>
</div>