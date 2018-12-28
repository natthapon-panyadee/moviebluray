<!DOCTYPE html>
<html lang="en">
<head>
<title>Category</title>
<?php 
	require_once('structure/head.php');
 ?>
<link rel="stylesheet" type="text/css" href="styles/category.css">
<link rel="stylesheet" type="text/css" href="styles/category_responsive.css">
</head>
<body>

<!-- Menu -->

<?php 
	require_once('structure/header.php');
 ?>

		<!-- Home -->

		<div class="home">
			<div class="home_container d-flex flex-column align-items-center justify-content-end">
				<div class="home_content text-center pb-3">
					<div class="home_title">ALL MOVIES</div>
					
				</div>
			</div>
		</div>

		<!-- Products -->

		<div class="products">
			<div class="container">
				<div class="row products_bar_row">
					<div class="col">
						<div class="products_bar d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-start justify-content-center">
							<div class="products_bar_links">
								<ul class="d-flex flex-row align-items-start justify-content-start">
									<li><a href="#">All</a></li>
									<!-- <li><a href="#">Hot Products</a></li>
									<li class="active"><a href="#">New Products</a></li>
									<li><a href="#">Sale Products</a></li> -->
								</ul>
							</div>
							<div class="products_bar_side d-flex flex-row align-items-center justify-content-start ml-lg-auto">
								<div class="products_dropdown product_dropdown_sorting">
									<div class="isotope_sorting_text"><!-- <span>Default Sorting</span><i class="fa fa-caret-down" aria-hidden="true"></i> --></div>
									<ul>
										<li class="item_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'>Default</li>
										<li class="item_sorting_btn" data-isotope-option='{ "sortBy": "price" }'>Price</li>
										<li class="item_sorting_btn" data-isotope-option='{ "sortBy": "name" }'>Name</li>
									</ul>
								</div>
								
								<div class="products_dropdown text-right product_dropdown_filter">
									<div class="isotope_filter_text"><span>Filter</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
									<ul>
										<li class="item_filter_btn" data-filter="*">All</li>
										<li class="item_filter_btn" data-filter=".hot">Hot</li>
										<li class="item_filter_btn" data-filter=".new">New</li>
										<li class="item_filter_btn" data-filter=".sale">Sale</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row products_row ">
					
					<?php 
						require_once('structure/connect.php');
						$sql = "SELECT * FROM tb_movies";
						if($result=$conn->query($sql)){
							if($result->num_rows>0){
								while($row = $result->fetch_assoc()){

					 ?>
					<div class="col-xl-4 col-md-6">
						<div class="product">
							<div class="product_image"><a href="product.php?id=<?php echo $row['movie_id'] ?>"><img src=" <?php echo 'images/'.$row['movie_image']; ?>" ></a></div>
							<div class="product_content">
								<div class="product_info d-flex flex-row align-items-start justify-content-start">
									<div>
										<div>
											<div class="product_name"><a href="product.php?id=<?php echo $row['movie_id'] ?>"> <?php echo $row['movie_name']; ?> </a></div>
											<div class="product_category">In <a href="category.php">Category</a></div>
										</div>
									</div>
									<div class="ml-auto text-right">
										
										<div class="product_price text-right"><?php echo $row['movie_price']; ?> BAHT</div>
									</div>
								</div>
								
							</div>
						</div>
					</div>
					<?php 
							}
						}
					}

					 ?>
				

					<!-- Product -->
					

				</div>
				<div class="row page_nav_row">
					<div class="col">
						<div class="page_nav">
							<ul class="d-flex flex-row align-items-start justify-content-center">
								<li class="active"><a href="#">01</a></li>
								<li><a href="#">02</a></li>
								<li><a href="#">03</a></li>
								<li><a href="#">04</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Footer -->

		<?php 
			require_once('structure/footer.php');
		 ?>
	</div>
		
</div>


<script src="js/category.js"></script>
</body>
</html>