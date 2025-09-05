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
								Shop
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="content-area shop-grid-content full-width col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="site-main">
						<h3 class="custom_blog_title">
							<?php echo $web_name;?> Products
						</h3>
						<div class="shop-top-control">
							<form class="select-item select-form">

							</form>
							<form class="filter-choice select-form">

							</form>
							<div class="grid-view-mode">
								<div class="inner">
									<a href="Shop-List" class="modes-mode mode-list">
										<span></span>
										<span></span>
									</a>
									<a href="#" class="modes-mode mode-grid  active">
										<span></span>
										<span></span>
										<span></span>
										<span></span>
									</a>
								</div>
							</div>
						</div>
						<ul class="row list-products auto-clear equal-container product-grid">

							<?php 
							$sql1="SELECT * FROM products WHERE  p_status='Active' ORDER BY id DESC";
							$rztl1=mysqli_query($conn,$sql1);
							if ($rztl1->num_rows>0) {

								while ($row1=mysqli_fetch_assoc($rztl1)) {
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
													<a href="Product-Details?p=<?php echo $row1['prod_no'];?>">
														<img style="height: 300px" src="Admin/Product_Image/<?php echo $row1['product_image'];?>" alt="<?php echo $row1['product_name'];?>">
													</a>
													<div class="thumb-group">

														<div onclick="add_to_cart_item(<?php echo $row1['prod_no'];?>)" class="loop-form-add-to-cart">
															<button class="single_add_to_cart_button button">Add to cart
															</button>
														</div>
													</div>
												</div>
											</div>
											<div class="product-info">
												<h5 class="product-name product_title">
													<a href="Product-Details?p=<?php echo $row1['prod_no'];?>"><?php echo $row1['product_name'];?></a>
												</h5>
												<div class="group-info">
													<div class="stars-rating">
														<div class="star-rating">
															<span class="star-<?php echo rand(3,5);?>"></span>
														</div>
														<div class="count-star">
															<?php echo rand(3,5);?>
														</div>
													</div>
													<div class="price">
														<del>
															$<?php echo number_format($row1['product_old_price'],2);?>
														</del>
														<ins>
															$<?php echo number_format($row1['product_price'],2);?>
														</ins>
													</div>
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
