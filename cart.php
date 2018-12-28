<!DOCTYPE html>
<html lang="en">
<head>
<title>Cart</title>
<?php 
	require_once('structure/head.php');
 ?>
<link rel="stylesheet" type="text/css" href="styles/cart.css">
<link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">
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
					<div class="home_title">Shopping Cart</div>
					<div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
						<ul class="d-flex flex-row align-items-start justify-content-start text-center">
							<li><a href="#">Home</a></li>
							<li>Your Cart</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<!-- Cart -->

		<div class="cart_section">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="cart_container">
							
							<!-- Cart Bar -->
							<div class="cart_bar">
								<ul class="cart_bar_list item_list d-flex flex-row align-items-center justify-content-end">
									<li class="mr-auto">Product</li>
									<li>Price</li>
									<li>Quantity</li>
									<li>Total</li>
								</ul>
							</div>

							<!-- Cart Items -->

							<?php 
						if(isset($_SESSION['user'])){
		                 $sql = "SELECT *  FROM tb_cart join tb_movies on tb_cart.movie_id = tb_movies.movie_id join tb_user on tb_cart.user_id = tb_user.user_id where tb_user.user_id = ".$_SESSION['user'] ;
		                 $sum = 0 ;
		                if($result=$conn->query($sql)){
		                if($result->num_rows>0){
		                while($row = $result->fetch_assoc()){

		 					?>
							<div class="cart_items">
								<ul class="cart_items_list">
									<input type="hidden" name="" id="inputcid" value=" <?php echo $row['cart_id'] ?> ">
									<!-- Cart Item -->
									<li class="cart_item item_list d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-end justify-content-start">
										<div class="product d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start mr-auto">
											<div><div class="product_number"></div></div>
											<div><div class="product_image"><img src="images/<?php echo $row['movie_image']; ?>" alt=""></div></div>
											<div class="product_name_container">
												<div class="product_name"><a href="product.html"><?php echo $row['movie_name'] ?></a></div>
												
											</div>
										</div>
										
										<!--<div class="product_size product_text"><span>Size: </span>L</div> -->
										<div class="product_price product_text"><span>Price: </span><?php echo $row['movie_price'] ?> BAHT</div>
										<div class="product_quantity_container">
											<div class="product_quantity ml-lg-auto mr-lg-auto text-center">
												<span class="product_text product_num" id="qty" > <?php echo $row['qty'] ?> </span>
												
											</div>
										</div>
										<div class="product_total product_text"><span>Total: </span>
											<?php echo $sum +=  $row['movie_price']*  $row['qty']; ; ?>
											
									</li>
								</ul>

							</div>
							<?php 
								}
							}
						}
					}
							 ?>


							<!-- Cart Buttons -->
							<div class="cart_buttons d-flex flex-row align-items-start justify-content-start">
								<div class="cart_buttons_inner ml-sm-auto d-flex flex-row align-items-start justify-content-start flex-wrap">
									<div class="button button_clear trans_200"><a href="structure/clearcart.php?>">clear cart</a></div>
									<div class="button button_continue trans_200"><a href="category.php">more movies</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row cart_extra_row">
					
					<div class="col-lg-6 offset-6 cart_extra_col">
						<div class="cart_extra cart_extra_2">
							<div class="cart_extra_content cart_extra_total">
								<div class="cart_extra_title">Cart Total</div>
								<ul class="cart_extra_total_list">
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Subtotal</div>
										<div class="cart_extra_total_value ml-auto"><?php echo $sum ?></div>
									</li>
									
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Total </div>
										<div class="cart_extra_total_value ml-auto"><?php echo $sum ?></div>
									</li>
								</ul>
								<div class="checkout_button trans_200"><a href="" id="btn-book">proceed to booking</a></div>
							</div>
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


<script src="js/cart.js"></script>

<script type="text/javascript"> 
		$('#btn-book').on('click',function(){

			var inputcid = $('#inputcid').val();
		
			$.ajax({
				type: "POST",
				url: "structure/api_addrent.php",
				data: {
					'inputcid': inputcid,
					
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