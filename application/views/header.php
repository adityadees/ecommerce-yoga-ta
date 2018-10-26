<?php
if(isset($_SESSION['logged_in'])){
	$username=$_SESSION['username'];
	$userid=$_SESSION['userid'];

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/frontend/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/frontend/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/frontend/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/frontend/fonts/linearicons-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/frontend/vendor/animate/animate.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/frontend/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/frontend/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/frontend/vendor/select2/select2.min.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/frontend/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/frontend/vendor/slick/slick.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/frontend/vendor/MagnificPopup/magnific-popup.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/frontend/vendor/perfect-scrollbar/perfect-scrollbar.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/frontend/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/frontend/css/main.css">
	<!--===============================================================================================-->
</head>
<body class="animsition">
	
	<header>
		<div class="container-menu-desktop">
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container" >

					<div class="left-top-bar" >
						
					</div>

					<div class="right-top-bar flex-w h-full" style="margin-left:900px">
						
						<?php if(isset($username) && $_SESSION['role']=='customer'){ ?>
							<a href="<?php echo base_url()?>account" class="flex-c-m trans-04 p-lr-25">
								<font color="#F8F8FF">
									MY ACCOUNT
								</font>
							</a>
							<a href="<?php echo base_url()?>logout" class="flex-c-m trans-04 p-lr-25" >
								<font color="#F8F8FF">
									LOGOUT
								</font>
							</a>
						<?php } else {?>
							<a href="#" class="flex-c-m trans-04 p-lr-25"  data-toggle="modal" data-target="#LoginModal">
								<font color="#F8F8FF">
									LOGIN
								</font>	
							</a>

							<a href="<?php echo base_url()?>Register" class="flex-c-m trans-04 p-lr-25">
								<font color="#F8F8FF">
									REGISTER
								</font>
							</a>

						<?php }?>

					</div>

				</div>
			</div>

			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">

					<a href="<?php echo base_url(); ?>" class="logo">
						<img src="<?php echo base_url()?>images/icons/gitarlogo.png" alt="IMG-LOGO">
					</a>

					<div class="menu-desktop">
						<ul class="main-menu">

							<li>
								<a href="<?php echo base_url()?>"><font color="#A9A9A9">HOME</font></a>
							</li>

							<li>
								<a href="<?php echo base_url()?>custom"><font color="#A9A9A9">CUSTOM GUITAR</font></a>
							</li>
							<li>
								<a href="<?php echo base_url()?>forum"><font color="#A9A9A9">FORUM</font></a>
							</li>
							<li>
								<a href="<?php echo base_url()?>portofolio"><font color="#A9A9A9">OUR WORKS</font></a>
							</li>
							<li>
								<a href="<?php echo base_url()?>repair"><font color="#A9A9A9">Repair & Modification</font></a>
							</li>
						</ul>
					</div>	

					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div>
						<?php
						if(isset($userid)){
							$tcart=$this->m_padmin->get_total_cart($userid);
							$b=$tcart->row_array();
							?>
							<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="<?php echo $b['totalcart']; ?>">
								<i class="zmdi zmdi-shopping-cart"></i>
							</div>
						<?php 	}?>
					</div>
				</nav>
			</div>	
		</div>

		<div class="wrap-header-mobile">
			<div class="logo-mobile">
				<a href="index.html"><img src="images/icons/logo-01.png" alt="IMG-LOGO"></a>
			</div>

			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>
				<?php
				if(isset($userid)){
					$tcart=$this->m_padmin->get_total_cart($userid);
					$b=$tcart->row_array();
					?>
					<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="<?php echo $b['totalcart']; ?>">
						<i class="zmdi zmdi-shopping-cart"></i>
					</div>
				<?php 	}?>
			</div>

			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<div class="menu-mobile">
			<ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">

					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							My Account
						</a>	
						<a href="#" class="flex-c-m p-lr-10 trans-04" data-toggle="modal" data-target="#LoginModal">
							Login
						</a>	
						<a href="#" class="flex-c-m p-lr-10 trans-04">
							Register
						</a>

					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				<li>
					<a href="index.html">Home</a>
					<ul class="sub-menu-m">
						<li><a href="index.html">Homepage 1</a></li>
						<li><a href="home-02.html">Homepage 2</a></li>
						<li><a href="home-03.html">Homepage 3</a></li>
					</ul>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>

				<li>
					<a href="<?php echo base_url();?>custom">Custom Gitar</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>forum">Forum</a>
				</li>

				<li>
					<a href="<?php echo base_url();?>partner">Our Partner</a>
				</li>
			</ul>
		</div>

		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>

	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>

			<div class="header-cart-content flex-w js-pscroll">

				<ul class="header-cart-wrapitem w-full">

					<?php $tot=0; 

					$cart=$this->m_padmin->get_cart_by_user_limit($userid);
					foreach ($cart->result_array() as $ix) : ?>
						<li class="header-cart-item flex-w flex-t m-b-12">
							<div class="header-cart-item-txt p-t-8">
								<a href="<?php echo base_url() ?>cart/<?php echo $ix['cart_kode']; ?>" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
									<?php echo $ix['cart_kode']; ?>
								</a>

								<span class="header-cart-item-info">
									<?php echo "Rp. ".number_format($ix['cart_total']); ?>
								</span>
							</div>

							<div class="">
								<a href="aa" class="btn btn-default p-t-4"><i class="fa fa-times"></i></a>
							</div>
						</li>

						<?php $tot+=$ix['cart_total']; endforeach; ?>

					</ul>

					<div class="w-full">
						<div class="header-cart-total w-full p-tb-40">
							Total: <?php echo "Rp. ".number_format($tot); ?>
						</div>

						<div class="header-cart-buttons flex-w w-full">
							<a href="<?php echo base_url()?>cart" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
								View Cart
							</a>
						</div>
					</div>
				</div>
			</div>

		</div>

		<div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document" style="margin-top:200px">
				<div class="modal-content">
					<div class="modal-headera">
						<button type="button" class="close" data-dismiss="modal" style="margin-top:15px;margin-right: 15px;">&times;</button>
					</div>
					<form action="<?php echo base_url()?>login/auth" method="POST">
						<div class="modal-body">
							<div class="col-md-12">
								<div class="form-group">
									<div class="span">Username</div>
									<input type="text" class="form-control" name="username" style="border:1px solid">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<div class="span">Password</div>
									<input type="password" class="form-control" name="password" style="border:1px solid">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="submit" class="form-control btn btn-primary" value="Login">
								</div>
							</div>


							<div class="col-md-12" style="padding-bottom: 10px">
								<hr>
								<span >Belum memiliki Akun? <a href="<?php echo base_url()?>Register" >Register</a></span>
							</div>
						</div>
					</form>
				</div>

			</div>
		</div>