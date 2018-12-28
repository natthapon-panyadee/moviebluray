<!DOCTYPE html>
<html lang="en">
<head>
<title>MOVIE TREASURE</title>
<?php 
	require_once('structure/head.php');
 ?>
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>
<body>

<!-- Menu -->

<?php 
	require_once('structure/header.php');
	if (isset($_POST['keyword']))
    $keyword = $_POST['keyword'];
else
    $keyword = "";

 ?>


		<!-- Home -->

		<div class="home">
			<!-- Home Slider -->
			<div class="home_slider_container">
				<div class="owl-carousel owl-theme home_slider">
					
					<!-- Slide -->
					<div class="owl-item">
						<div class="background_image" style="background-image:url(images/cmbyn2.jpg)"></div>
						<div class="container fill_height">
							<div class="row fill_height">
								<div class="col fill_height">
									<div class="home_container d-flex flex-column align-items-center justify-content-start">
										<div class="home_content">
											<div class="home_title"></div>
											<div class="home_subtitle"></div>
											<div class="home_items">
												<div class="row">
													
													
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</div>

					<!-- Slide -->
					<div class="owl-item">
						<div class="background_image" style="background-image:url(images/bu.jpg)"></div>
						<div class="container fill_height">
							<div class="row fill_height">
								<div class="col fill_height">
									<div class="home_container d-flex flex-column align-items-center justify-content-start">
										<div class="home_content">
											<div class="home_title"></div>
											<div class="home_subtitle"></div>
											<div class="home_items">
												<div class="row">
													
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</div>

					<!-- Slide -->
					<div class="owl-item">
						<div class="background_image" style="background-image:url(images/2019.jpg)"></div>
						<div class="container fill_height">
							<div class="row fill_height">
								<div class="col fill_height">
									<div class="home_container d-flex flex-column align-items-center justify-content-start">
										<div class="home_content">
											<div class="home_title"></div>
											<div class="home_subtitle"></div>
											<div class="home_items">
												<div class="row">
													
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</div>

					<!-- Slide -->
					<div class="owl-item">
						<div class="background_image" style="background-image:url(images/bnm.jpg)"></div>
						<div class="container fill_height">
							<div class="row fill_height">
								<div class="col fill_height">
									<div class="home_container d-flex flex-column align-items-center justify-content-start">
										<div class="home_content">
											<div class="home_title"></div>
											<div class="home_subtitle"></div>
											<div class="home_items">
												<div class="row">
													
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</div>

				</div>
				<div class="home_slider_nav home_slider_nav_prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
				<div class="home_slider_nav home_slider_nav_next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>

				<!-- Home Slider Dots -->
				
				<div class="home_slider_dots_container">
					<div class="container">
						<div class="row">
							<div class="col">
								<div class="home_slider_dots">
									<ul id="home_slider_custom_dots" class="home_slider_custom_dots d-flex flex-row align-items-center justify-content-center">
										<li class="home_slider_custom_dot active">01</li>
										<li class="home_slider_custom_dot">02</li>
										<li class="home_slider_custom_dot">03</li>
										<li class="home_slider_custom_dot">04</li>
									</ul>
								</div>
							</div>
						</div>
					</div>	
				</div>

			</div>
		</div>

		<!-- Products -->

		<div class="products">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 offset-lg-3">
						<div class="section_title text-center">POPULAR RENT</div>
					</div>
				</div>
				<div class="row page_nav_row">
					<div class="col">
						<div class="page_nav">
							<ul class="d-flex flex-row align-items-start justify-content-center">
								<li class="active"><a href="category.php">All Movie</a></li>
								<!-- <li><a href="category.php">Men</a></li>
								<li><a href="category.php">Kids</a></li>
								<li><a href="category.php">Home Deco</a></li> -->
							</ul>
						</div>
					</div>
				</div>
				<div class="row products_row">
					
					<?php 
						require_once('structure/connect.php');

						$sql = "SELECT * FROM tb_movies limit 9";
						$clause = " where mov.movie_name like '%$keyword%' ";
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
				

				</div>
				<div class="row load_more_row">
					<div class="col">
						<div class="button load_more ml-auto mr-auto"><a href="category.php">All Movie</a></div>
					</div>
				</div>
			</div>
		</div>

		<!-- Boxes -->

		
		<!-- Features -->

	

		<!-- Footer -->
<?php 
	require_once('structure/footer.php');
 ?>
		
	</div>
		
</div>


<script src="js/custom.js"></script>
</body>
</html>