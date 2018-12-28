<!DOCTYPE html>
<html lang="en">
<head>
<title>Product</title>
<?php 
	require_once('structure/head.php');

 ?>


<link rel="stylesheet" type="text/css" href="styles/product.css">
<link rel="stylesheet" type="text/css" href="styles/product_responsive.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</head>
<body>

<!-- Menu -->
<?php 
	require_once('structure/header.php');
 ?>



		<!-- Home -->

		
					

		<div class="home">
			<div class="home_container d-flex flex-column align-items-center justify-content-end">
				<div class="home_content text-center">
					<div class="home_title">Product Page</div>
					<div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
						<ul class="d-flex flex-row align-items-start justify-content-start text-center">
							<li><a href="#">Home</a></li>
							<li><a href="category.php">Woman</a></li>
							<li>New Products</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<!-- Product -->
		

		<div class="product">
			<div class="container">
				<?php 
						require_once('structure/connect.php');

						if(isset($_GET['id'])){
		                 $sql = "SELECT *  FROM tb_movies where movie_id = ".$_GET['id'] ;
		                if($result=$conn->query($sql)){
		                if($result->num_rows>0){
		                while($row = $result->fetch_assoc()){

		 ?>
				<div class="row">
					
					<!-- Product Image -->
					<div class="col-lg-6">
						<div class="product_image_slider_container">
							<div id="slider" class="flexslider">
								<ul class="slides">
									<input type="hidden" name="" id="movieid" value=" <?php echo $row['movie_id'] ?> ">
									<img src=" <?php echo 'images/'.$row['movie_image']; ?>" >
									
									
								</ul>
							</div>
							
						</div>
					</div>

					<!-- Product Info -->
					<div class="col-lg-6 product_col">
						<div class="product_info">
							<div class="product_name"><?php echo $row['movie_name'] ?></div>


							
							<div class="product_category">In <a href="category.php">Category</a></div>
							<div class="product_rating_container d-flex flex-row align-items-center justify-content-start">
								<div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
								<div class="product_reviews">4.7 out of (3514)</div>
								<div class="product_reviews_link"><a href="#">Reviews</a></div>
							</div>
							<div class="product_price">60฿<span></span></div>
							<div class="product_size">
								<div class="product_size_title">SELECT DAY</div>
								<ul class="d-flex flex-row align-items-start justify-content-start">
									<li>
										<input type="radio" id="radio_1"  name="product_radio" class="regular_radio radio_1">
										<label for="radio_1"> 1 </label>
									</li>
									<li>
										<input type="radio" id="radio_2" name="product_radio" class="regular_radio radio_2" checked>
										<label for="radio_2"> 3 </label>
									</li>
									<li>
										<input type="radio" id="radio_3" name="product_radio" class="regular_radio radio_3">
										<label for="radio_3"> 5 </label>
									</li>
									<li>
										<input type="radio" id="radio_4" name="product_radio" class="regular_radio radio_4">
										<label for="radio_4"> 7 </label>
									</li>
									
								</ul>
							</div>
							<div class="product_text">
								<p><?php echo $row['descript']; ?></p>
							</div>
							
								<div class="product_buttons">
									<div class="text-right d-flex flex-row align-items-start justify-content-start">
										
										<div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center" id="btn-cart">
											<div>
												<div><img src="images/cart.svg" class="svg" alt=""><div>+</div></div>
											</div>
										</div>
									</div>
								</div>
							
						</div>
					</div>
				</div>
				 <?php 
					}
				}
			}
		}
		?>
			</div>
		</div>
		
					  ?>
		<!-- Boxes -->

		

		<!-- Footer -->

	<?php 
		require_once('structure/footer.php');
	 ?>
		
	</div>
		
</div>


<script src="js/product.js"></script>

<script type="text/javascript"> 
		$('#btn-cart').on('click',function(){

			var inputmid = $('#movieid').val();
		
			$.ajax({
				type: "POST",
				url: "structure/api_addcart.php",
				data: {
					'movieid': inputmid,
					
				},
				success: function(data) {
					alert(data);
         			// window.location.href = "login.php";
		      },
		  });
		});
		
	 </script>
</body>
</html>