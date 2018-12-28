<?php 
	require_once('connect.php');
				session_start();
 ?>

<div class="menu">

	<!-- Search -->
	<div class="menu_search">
		<form action="#" id="menu_search_form" class="menu_search_form">
			<input type="text" class="search_input" placeholder="Search Item" required="required">
			<button class="menu_search_button"><img src="images/search.png" alt=""></button>
		</form>
	</div>
	<!-- Navigation -->
	<div class="menu_nav">
		<ul>
			<li><a href="category.php">category</a></li>
			
			<li><a href="contact.php">contact</a></li>
		</ul>
	</div>
	<!-- Contact Info -->
	<div class="menu_contact">
		<div class="menu_phone d-flex flex-row align-items-center justify-content-start">
			<div><div><img src="images/phone.svg" alt="https://www.flaticon.com/authors/freepik"></div></div>
			<div>+1 912-252-7350</div>
		</div>
		<div class="menu_social">
			<ul class="menu_social_list d-flex flex-row align-items-start justify-content-start">
				<li><a href="facebook.com"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
			</ul>
		</div>
	</div>
</div>
<div class="super_container">

	<!-- Header -->

	<header class="header">
		<div class="header_overlay"></div>
		<div class="header_content d-flex flex-row align-items-center justify-content-start">
			<div class="logo">
				<a href="index.php">
					<div class="d-flex flex-row align-items-center justify-content-start">
						
						<div>MOVIE TREASURE</div>
					</div>
				</a>	
			</div>
			<div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
			<nav class="main_nav">
				<ul class="d-flex flex-row align-items-start justify-content-start">
					<li><a href="category.php">CATEGORY</a></li>
					<li><a href="contact.php">CONTACT</a></li>
				<?php 
				if (isset($_SESSION['user']) && $_SESSION['type'] == 1) {
							
				 ?>
				 
					<li><a href="addminpage.php">ADMIN</a></li>
					<?php
					 } 

				?>
				</ul>
			</nav>
			<div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">
				<!-- Search -->
				<div class="header_search">
					<form action="#" id="header_search_form">
						<input type="text" class="search_input" placeholder="Search Movie" required="required">
						<button class="header_search_button">
							<img src="images/search.png" alt=""></button>
					</form>
				</div>
				<!-- User -->
				<div class="user">
					
					</div>
				<!-- Cart -->
				<div class="cart"><a href="cart.php"><div><img src="images/cart.svg" alt="https://www.flaticon.com/authors/freepik"></div></a></div>
				<!-- Phone -->
				<?php 
				
				if (!isset($_SESSION['user'])) {
					# code...

				?>
					<div class="container p-0 justify-content-end">
						<div class="pl-3 pr-3 border-right">
							<a href="register.php" class="text-secondary">สมัครสมาชิก</a>
						</div>
						<div class="pl-3">
							<a href="login.php" class="text-secondary">เข้าสู่ระบบ</a>
						</div>
					</div><!-- container -->
				<?php 
				}else{

				$sql = "SELECT * FROM tb_user WHERE user_id = ".$_SESSION['user'];
				
				if($result=$conn->query($sql)){
					if($result->num_rows>0){
						while($row = $result->fetch_assoc()){
							?>
							<div class="container p-0 justify-content-end">
								<div class="btn-group">
											<h2><?php echo $row['user_name']; ?></h2>
											<a class="dropdown-item mt-2" href="structure/api_logout.php" style="color: #76b6c2">
												<img src="images/icon-menu-logout.png" class="img-fluid icon-2 mr-2 mt-0-5" >
												
											</a>
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
	</header>

	<div class="super_container_inner">
		<div class="super_overlay"></div>



		