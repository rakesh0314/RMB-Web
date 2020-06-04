<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link type="image/x-icon" href="<?php echo base_url('assets/favicon.ico') ?>" rel="icon">
	<title>Sabji</title>
	<!-- meta description -->
	<meta name="description" content="Applus - HTML App Landing Page" />
	<!-- meta keywords -->
	<meta name="keywords" content="Applus, app, app landing, app landing page, app landing template, App Showcase" />
	<!-- meta author -->
	<meta name="author" content="envatoprime" />
	<!--Google font Family link -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,600,700" rel="stylesheet"> 
	<!--font awesome css link-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!--bootstram4-->
	<link href="<?= base_url()?>assets/front-end/css/bootstrap.min.css" rel="stylesheet">
	<!--bootstram4-->
	<link href="<?= base_url()?>assets/front-end/css/animate.css" rel="stylesheet">
	<!--owl carousel css link -->
	<link rel="stylesheet" href="<?= base_url()?>assets/front-end/css/owl.carousel.min.css">
	<!--slick slider css link -->
	<link rel="stylesheet" href="<?= base_url()?>assets/front-end/css/slick.css">
	<!--killar carosur-->
	<link href="<?= base_url()?>assets/front-end/css/killercarousel.min.css" rel="stylesheet">
	<!--themify icon css link-->
	<link rel="stylesheet" href="<?= base_url()?>assets/front-end/css/themify-icons.css">
	<!--ionicons css link-->
	<link rel="stylesheet" href="<?= base_url()?>assets/front-end/css/ionicons.min.css">
	<!--venobox -->
	<link href="<?= base_url()?>assets/front-end/css/venobox.css" rel="stylesheet">
	<!-- Core Stylesheet -->
	<link href="<?= base_url()?>assets/front-end/css/style.css" rel="stylesheet">
	<link href="<?= base_url()?>assets/front-end/css/custon-canvas.css" rel="stylesheet">
	<!-- Responsive CSS -->
	<link href="<?= base_url()?>assets/front-end/css/responsive.css" rel="stylesheet">
	<!-- gradint CSS -->
	<link href="<?= base_url()?>assets/front-end/css/gradint2.css" rel="stylesheet">
</head>

<body>
	<!--preloder start-->
	<div class="preeloader">
		<div class="preloader-spinner">
			<img src="<?= base_url()?>assets/front-end/img/loader.gif" alt="">
		</div>
	</div>
	<!--preloder end-->
	<!-- ============================ Header Area Start ===================== -->
	<header class="header_area animated">
		<div class="container">
			<div class="row align-items-center p-0">
				<!-- Menu Area Start -->
				<div class="col-12 p-0">
					<div class="menu_area">
						<nav class="navbar navbar-expand-lg navbar-light p-0" data-spy="affix" data-offset-top="17">
							<a class="navbar-brand" href="#">Sabji</a>
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ca-navbar" aria-controls="ca-navbar" aria-expanded="false"
							  aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>
							<div class="collapse navbar-collapse" id="ca-navbar">
								<ul class="navbar-nav ml-auto nav-scroll" id="nav">
									<li class="nav-item active">
										<a class="nav-link" href="#home">Home</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#features">Features</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#about">About us</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#screenshot">Screenshot</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#team">How To Order ?.</a>
									</li>
									<!-- <li class="nav-item">
										<a class="nav-link" href="#pricing">Prices</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#news">Blog</a>
									</li> -->
									<li class="nav-item">
										<a class="nav-link" href="#contact">Contact</a>
									</li>
								</ul>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- ================ Header Area End ============================-->

	<!-- ========================= Wellcome Area Start ===================== -->
	<section class="wellcome_area" id="home">
		<div id="angle-bg"></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="wellcome-heading  mt-220 text-center">
						<h2>Sabji</h2>
						<p>Sabji-An innovative food & grocery online store.</p>
					</div>
					<div class="welcome-area-link text-center">
						<ul class="h-link">
							<li>
								<a href="#download">Download Now</a>
							</li>
							<li>
								<a href="#features">Features</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-6 d-none  scr-area d-lg-block d-xl-block text-center">
					<div class="welcome_slides owl-carousel mt-150 text-center">
						<div class="single-shot">
							<img class="img-fluid" src="<?= base_url()?>assets/front-end/img/scr-img/phone-01.png" alt="">
						</div>
						<div class="single-shot">
							<img class="img-fluid" src="<?= base_url()?>assets/front-end/img/scr-img/phone-03.png" alt="">
						</div>
						<div class="single-shot">
							<img class="img-fluid" src="<?= base_url()?>assets/front-end/img/scr-img/phone-04.png" alt="">
						</div>
						<div class="single-shot">
							<img class="img-fluid" src="<?= base_url()?>assets/front-end/img/scr-img/phone-02.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ==================== Wellcome Area End ======================== -->

	<!-- ===================== Special Area Start ====================== -->
	<section id="about" class="special-area bg-white section_padding_100">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Section Heading Area -->
					<div class="section-heading text-center text-uppercase">
						<h2>ABOUT Sabji</h2>
						<div class="reflection-text">
							<div>
								<i class="fa fa-heart novi-icon gradient-color"></i>
								<span class="one gradient-color"></span>
								<span class="two gradient-color"></span>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<!-- Single Special Area -->
				<div class="col-12 col-md-4">
					<div class="single-special text-center">
						<div class="single-icon">
							<img src="<?= base_url()?>assets/front-end/img/about/app-feature-1.png" alt="">
						</div>
						<h4>Overview</h4>
						<p align="justify">Sabji app (Riddhi Enterprises) is India’s new & innovative food & grocery online store with thousands of products of various brands in our catalogue. Right from Rice and Dals, Spices and seasonings to Packaged Products, Beverages, Personal Care Products. We Have It all. Delivered right to your Doorstep anywhere in Roorkee, Dehradun, Haridwar and Lucknow.
						</p>
					</div>
				</div>
				<!-- Single Special Area -->
				<div class="col-12 col-md-4">
					<div class="single-special effect single-special-two text-center">
						<div class="single-icon">
							<img src="<?= base_url()?>assets/front-end/img/about/app-feature-2.png" alt="">
						</div>
						<h4>Why Us.?</h4>
						<p align="justify">Sabji app allows you to walk away from the drudgery of grocery shopping and welcome an easy relaxed way of browsing and shopping for groceries of best quality. No more getting stuck in traffic jams, paying for parking, standing in long queues and carrying heavy bags – get everything you need, when you need, right at your doorstep.
						</p>
					</div>
				</div>
				<!-- Single Special Area -->
				<div class="col-12 col-md-4">
					<div class="single-special text-center">
						<div class="single-icon">
							<img src="<?= base_url()?>assets/front-end/img/about/app-feature-3.png" alt="">
						</div>
						<h4>Time-slot & Easy Payment</h4>
						<p align="justify">Sabji app allows you to discover products and shop from the comfort of your home or office and also allows you to select time slot as per your convenience for delivery and your order will be delivered to your doorstep. You can pay online using UPI, Debit & Credit card or by Cash on delivery. We guarantee on time delivery at reasonable prices & the best quality.
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ================== Special Area End ======================== -->

	<!--===================Start Features Section==============-->
	<section id="features" class="main-section center-align section_padding_100">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center">
					<!-- Heading Text  -->
					<div class="section-heading text-uppercase">
						<h2 class="text-white">Features</h2>
						<div class="reflection-text">
							<div>
								<i class="fa fa-heart novi-icon white"></i>
								<span class="one white"></span>
								<span class="two white"></span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row p-t-2">
				<div class="col-12 col-lg-4 feature-left">
					<div class="single-feature p-tb-2">
						<a class="hoverable feature-link same-height active" data-owl-item="0">
							<!--Title -->
							<div>
								<h5>User friendly</h5>
								<p>Sabji app is intuitive, easy to use, simple and customers can rely on the products.</p>
							</div>
							<!-- Icon -->
							<div>
								<i class="fa fa-heartbeat" aria-hidden="true"></i>
							</div>
						</a>
					</div>
					<div class="single-feature p-tb-2">
						<a class="hoverable feature-link same-height" data-owl-item="1">
							<!-- Title -->
							<div>
								<h5>Wallet Facility</h5>
								<p>Add money in your wallet easily with various payment methods and Pay directly through wallet.</p>
							</div>
							<!-- Icon -->
							<div>
								<i class="fa fa-money" aria-hidden="true"></i>
							</div>
						</a>
					</div>
					<div class="single-feature p-tb-2">
						<a class="hoverable feature-link same-height" data-owl-item="2">
							<!-- Title -->
							<div>
								<h5>Digital Payment</h5>
								<p>User can pay online using UPI, Net banking, Debit & Credit card.</p>
							</div>
							<!-- Icon-->
							<div>
								<i class="fa fa-credit-card" aria-hidden="true"></i>
							</div>
						</a>
					</div>
				</div>
				<div class="col-12 col-lg-4 images-slider f-i-s">
					<!--Features Images-->
					<div class="owl-carousel owl-features">
						<div>
							<img class="img-fluid" src="<?= base_url()?>assets/front-end/img/scr-img/phone-03.png" alt="image of the iPhone app">
						</div>

						<div>
							<img class="img-fluid" src="<?= base_url()?>assets/front-end/img/scr-img/phone-01.png" alt="image of the iPhone app">
						</div>
						<div>
							<img class="img-fluid" src="<?= base_url()?>assets/front-end/img/scr-img/phone-02.png" alt="image of the iPhone app">
						</div>
						<div>
							<img class="img-fluid" src="<?= base_url()?>assets/front-end/img/scr-img/phone-03.png" alt="image of the iPhone app">
						</div>
						<div>
							<img class="img-fluid" src="<?= base_url()?>assets/front-end/img/scr-img/phone-04.png" alt="image of the iPhone app">
						</div>
						<div>
							<img class="img-fluid" src="<?= base_url()?>assets/front-end/img/scr-img/phone-01.png" alt="image of the iPhone app">
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-4 feature-right">
					<div class="single-feature p-tb-2">
						<a class="hoverable feature-link same-height" data-owl-item="3">
							<!-- Icon -->
							<div>
								<i class="fa fa-shopping-cart" aria-hidden="true"></i>
							</div>
							<div>
								<!-- Title -->
								<h5>Wide Range</h5>
								<p>Sabji online store has thousands of products of various brands in our catalogue.</p>

							</div>
						</a>
					</div>
					<div class="single-feature p-tb-2">
						<a class="hoverable feature-link same-height" data-owl-item="4">
							<!-- Icon -->
							<div>
								<i class="fa fa-hourglass" aria-hidden="true"></i>
							</div>
							<div>
								<!-- Title -->
								<h5>Time-slot Delivery</h5>
								<p>Select time slot as per your convenience for delivery and your order will be delivered to your doorstep.</p>

							</div>
						</a>
					</div>
					<div class="single-feature p-tb-2">
						<a class="hoverable feature-link same-height" data-owl-item="5">
							<!-- Icon -->
							<div>
								<i class="fa fa-truck" aria-hidden="true"></i>
							</div>
							<div>
								<!-- Title -->
								<h5>Best Quality & on time delivery</h5>
								<p>We guarantee you best quality product with on time delivery at reasonable prices.</p>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--=====================feture end========================-->

	<!--=====================shoecase Start========================-->
	<!-- <section class="section section-showcase section_padding_100 bg-white" id="showcase">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center"> -->
					<!-- Heading Text  -->
					<!-- <div class="section-heading text-uppercase">
						<h2>Showcase</h2>
						<div class="reflection-text">
							<div>
								<i class="fa fa-heart novi-icon gradient-color"></i>
								<span class="one gradient-color"></span>
								<span class="two gradient-color"></span>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row s-row-one">
				<div class="col-lg-6 ml-auto ml-auto">
					<img class="img-fluid" src="img/scr-img/phone-l-22.png" alt="">
				</div>
				<div class="col-lg-6">
					<div class="s-o">
						<h5 class="s-h">Manage all of your stuff
							<br> using Sabji App</h5>
						<p class="s-first-p">Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Sed aliquam ultrices mauris. Integer ante
							arcu, accumsan consectetuer eget, posuere ut, mauris. Praesent adipiscing. Phasellus ullamcorper ipsum rutrum nunc.</p>
						<div class="service-xs-box icon-block icon-left mb-xs-4">
							<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
							<p>Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Sed aliquam ultrices mauris. Integer ante
								arcu, accumsan.</p>
						</div>
						<div class="service-xs-box icon-block icon-left mb-xs-4">
							<i class="fa fa-magic" aria-hidden="true"></i>
							<p>Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Sed aliquam ultrices mauris. Integer ante
								arcu, accumsan.</p>
						</div>
						<p class="fp-fp">
							<a href="#download" class="mybutton">Download Now</a>
						</p>
					</div>
				</div>
			</div>

			<div class="row mt-5">
				<div class="col-lg-6 order-lg-2">
					<img class="img-fluid" src="img/scr-img/phone-l-11.png" alt=""
					/>
				</div>
				<div class="col-lg-6 mr-auto text-left text-lg-right order-lg-1">
					<div class="s-o">
						<h5 class="s-h">Easy to Manage Your All Data
							<br> using Sabji App</h5>
						<p class="s-first-p">Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Sed aliquam ultrices mauris. Integer ante
							arcu, accumsan consectetuer eget, posuere ut, mauris. Praesent adipiscing. Phasellus ullamcorper ipsum rutrum nunc.</p>
						<div class="service-xs-box icon-block icon-right mb-xs-4">
							<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
							<p>Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Sed aliquam ultrices mauris. Integer ante
								arcu, accumsan.</p>
						</div>
						<div class="service-xs-box icon-block icon-right mb-xs-4">
							<i class="fa fa-magic" aria-hidden="true"></i>
							<p>Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Sed aliquam ultrices mauris. Integer ante
								arcu, accumsan.</p>
						</div>
						<p class="fp-fp">
							<a href="#download" class="mybutton">Download Now</a>
						</p>
					</div>
				</div>
			</div>

			<div class="row mt-5">
				<div class="col-lg-6">
					<img class="img-fluid" src="img/scr-img/phone-l-33.png" alt="">
				</div>
				<div class="col-lg-6 ml-auto mr-auto">
					<div class="s-o">
						<h5 class="s-h">Responsive Design for All
							<br>Devices with Quality</h5>
						<p class="s-first-p">Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Sed aliquam ultrices mauris. Integer ante
							arcu, accumsan consectetuer eget, posuere ut, mauris. Praesent adipiscing. Phasellus ullamcorper ipsum rutrum nunc.</p>
						<div class="service-xs-box icon-block icon-left mb-xs-4">
							<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
							<p>Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Sed aliquam ultrices mauris. Integer ante
								arcu, accumsan.</p>
						</div>
						<div class="service-xs-box icon-block icon-left mb-xs-4">
							<i class="fa fa-magic" aria-hidden="true"></i>
							<p>Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Sed aliquam ultrices mauris. Integer ante
								arcu, accumsan.</p>
						</div>
						<p class="fp-fp">
							<a href="#download" class="mybutton">Download Now</a>
						</p>
					</div>
				</div>
			</div>

		</div>
	</section> -->
	<!--=====================shoecase end========================-->

	<!--======================subscribe area=======================-->
	<!-- <section class="subscribe-section section_padding_100">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-12 col-md-8 text-center">
					<div class="section-heading">
						<h2 class="text-white text-uppercase">Subcribe To Newsletters</h2>
						<div class="reflection-text">
							<div>
								<i class="fa fa-heart novi-icon white"></i>
								<span class="one white"></span>
								<span class="two white"></span>
							</div>
						</div>

					</div>
					<p class="text-white s-su-t">
						The New Applus App Lorem ipsum dolor sit amet, consectetur adipisicing elit. In, veniam! Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, ratione.
					</p>
				</div>
			</div>
			<form class="sub_form">
				<div class="row d-flex justify-content-center">
					<div class="col-md-6 col-lg-5">
						<input type="text" class="form-control name " name="name" placeholder="Your Name" required>
					</div>
					<div class="col-md-6 col-lg-5">
						<input type="email" class="form-control email" name="email" placeholder="Your E-mail" required>
					</div>
					<div class="col-6 col-md-12 col-lg-2">
						<input type="submit" class="submit" value="Subscribe">
					</div>
				</div>
			</form>
		</div>
	</section> -->
	<!--=====================subscribe area end========================-->

	<!--======================== screenshot part start======================= -->
	<section id="screenshot" class="bg-white section_padding_100">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center">
					<!-- Heading Text  -->
					<div class="section-heading text-uppercase">
						<h2>screenshot</h2>
						<div class="reflection-text">
							<div>
								<i class="fa fa-heart novi-icon gradient-color"></i>
								<span class="one gradient-color"></span>
								<span class="two gradient-color"></span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-10">
					<!-- The carouse wrapper -->
					<div class="kc-wrap">
						<!-- Carousel items follow -->
						<div class="kc-item">
							<img src="<?= base_url()?>assets/front-end/img/scr-img/phone-01.png" alt="p1">
						</div>
						<div class="kc-item">
							<img src="<?= base_url()?>assets/front-end/img/scr-img/phone-02.png" alt="p1">
						</div>
						<div class="kc-item">
							<img src="<?= base_url()?>assets/front-end/img/scr-img/phone-03.png" alt="p1">
						</div>
						<div class="kc-item">
							<img src="<?= base_url()?>assets/front-end/img/scr-img/phone-04.png" alt="p1">
						</div>
						<div class="kc-item">
							<img src="<?= base_url()?>assets/front-end/img/scr-img/phone-01.png" alt="p1">
						</div>
						<div class="kc-item">
							<img src="<?= base_url()?>assets/front-end/img/scr-img/phone-02.png" alt="p1">
						</div>
						<div class="kc-item">
							<img src="<?= base_url()?>assets/front-end/img/scr-img/phone-03.png" alt="p1">
						</div>
						<div class="kc-item">
							<img src="<?= base_url()?>assets/front-end/img/scr-img/phone-04.png" alt="p1">
						</div>
						<div class="kc-item">
							<img src="<?= base_url()?>assets/front-end/img/scr-img/phone-01.png" alt="p1">
						</div>
						<div class="kc-item">
							<img src="<?= base_url()?>assets/front-end/img/scr-img/phone-02.png" alt="p1">
						</div>
						<div class="kc-item">
							<img src="<?= base_url()?>assets/front-end/img/scr-img/phone-03.png" alt="p1">
						</div>
						<div class="kc-item">
							<img src="<?= base_url()?>assets/front-end/img/scr-img/phone-04.png" alt="p1">
						</div>
						<div class="kc-item">
							<img src="<?= base_url()?>assets/front-end/img/scr-img/phone-01.png" alt="p1">
						</div>
						<div class="kc-item">
							<img src="<?= base_url()?>assets/front-end/img/scr-img/phone-02.png" alt="p1">
						</div>
						<div class="kc-item">
							<img src="<?= base_url()?>assets/front-end/img/scr-img/phone-03.png" alt="p1">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--======================== screenshot part ends======================= -->

	<!--======================== Video part Start======================= -->
	<section id="video_area" class="section_padding_100">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12">
					<div class="video text-center">
						<a class="video_link venobox_video" data-vbtype="video" href="https://www.youtube.com/watch?v=ZLPmgcpi0wI">
							<i class="fa fa-play"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ================= video part ends ===================-->

	<!-- =================Client Feedback Area Start ============= -->
	<section class="clients-feedback-area bg-white section_padding_100" id="testimonial">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center">
					<!-- Heading Text  -->
					<div class="section-heading text-center text-uppercase">
						<h2>TESTIMONIALS</h2>
						<div class="reflection-text">
							<div>
								<i class="fa fa-heart novi-icon gradient-color"></i>
								<span class="one gradient-color"></span>
								<span class="two gradient-color"></span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-12 col-md-10">
					<div class="slider slider-for">
						<!-- Client Feedback Text  -->
						<div class="client-feedback-text text-center">
							<div class="client">
								<i class="fa fa-quote-left" aria-hidden="true"></i>
							</div>
							<div class="client-description text-center">
								<p>“ I have been using it for a number of years. I use Colorlib for usability testing. It's great for taking images
									and making clickable image prototypes that do the job and save me the coding time and just the general hassle of
									hosting. ”</p>
							</div>
							<div class="star-icon text-center">
								<i class="ion-ios-star"></i>
								<i class="ion-ios-star"></i>
								<i class="ion-ios-star"></i>
								<i class="ion-ios-star"></i>
								<i class="ion-ios-star"></i>
							</div>
							<div class="client-name text-center">
								<h5>Aigars Silkalns</h5>
								<p>Ceo Colorlib</p>
							</div>
						</div>
						<!-- Client Feedback Text  -->
						<div class="client-feedback-text text-center">
							<div class="client">
								<i class="fa fa-quote-left" aria-hidden="true"></i>
							</div>
							<div class="client-description text-center">
								<p>“ I use Colorlib for usability testing. It's great for taking images and making clickable image prototypes that do
									the job and save me the coding time and just the general hassle of hosting. ”</p>
							</div>
							<div class="star-icon text-center">
								<i class="ion-ios-star"></i>
								<i class="ion-ios-star"></i>
								<i class="ion-ios-star"></i>
								<i class="ion-ios-star"></i>
								<i class="ion-ios-star"></i>
							</div>
							<div class="client-name text-center">
								<h5>Jennifer</h5>
								<p>Developer</p>
							</div>
						</div>
						<!-- Client Feedback Text  -->
						<div class="client-feedback-text text-center">
							<div class="client">
								<i class="fa fa-quote-left" aria-hidden="true"></i>
							</div>
							<div class="client-description text-center">
								<p>“ I have been using it for a number of years. I use Colorlib for usability testing. It's great for taking images
									and making clickable image prototypes that do the job.”</p>
							</div>
							<div class="star-icon text-center">
								<i class="ion-ios-star"></i>
								<i class="ion-ios-star"></i>
								<i class="ion-ios-star"></i>
								<i class="ion-ios-star"></i>
								<i class="ion-ios-star"></i>
							</div>
							<div class="client-name text-center">
								<h5>Helen</h5>
								<p>Marketer</p>
							</div>
						</div>
						<!-- Client Feedback Text  -->
						<div class="client-feedback-text text-center">
							<div class="client">
								<i class="fa fa-quote-left" aria-hidden="true"></i>
							</div>
							<div class="client-description text-center">
								<p>“ I have been using it for a number of years. I use Colorlib for usability testing. It's great for taking images
									and making clickable image prototypes that do the job and save me the coding time and just the general hassle of
									hosting. ”</p>
							</div>
							<div class="star-icon text-center">
								<i class="ion-ios-star"></i>
								<i class="ion-ios-star"></i>
								<i class="ion-ios-star"></i>
								<i class="ion-ios-star"></i>
								<i class="ion-ios-star"></i>
							</div>
							<div class="client-name text-center">
								<h5>Henry smith</h5>
								<p>Developer</p>
							</div>
						</div>
					</div>
				</div>
				<!-- Client Thumbnail Area -->
				<div class="col-12 col-md-6 col-lg-5">
					<div class="slider slider-nav">
						<div class="client-thumbnail">
							<img src="<?= base_url()?>assets/front-end/img/bg-img/client-3.jpg" alt="">
						</div>
						<div class="client-thumbnail">
							<img src="<?= base_url()?>assets/front-end/img/bg-img/client-2.jpg" alt="">
						</div>
						<div class="client-thumbnail">
							<img src="<?= base_url()?>assets/front-end/img/bg-img/client-1.jpg" alt="">
						</div>
						<div class="client-thumbnail">
							<img src="<?= base_url()?>assets/front-end/img/bg-img/client-2.jpg" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ============== Client Feedback Area End =================== -->

	<!-- ============== App Download Area Start ==================== -->
	<section id="download" class=" section_padding_100">
		<div class="container">

			<!--Title-->
			<div class="row">
				<div class="col-12 text-center">
					<!-- Heading Text  -->
					<div class="section-heading text-center">
						<h2 class="text-white text-uppercase">Get It Now</h2>
						<div class="reflection-text">
							<div>
								<i class="fa fa-heart novi-icon white"></i>
								<span class="one white"></span>
								<span class="two white"></span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-8 text-center">
					<!-- Description -->
					<p class="text-white download-text">The New Sabji App Lorem ipsum dolor sit amet, consectetur adipisicing elit. In, veniam! Lorem ipsum dolor sit amet
						consectetur adipisicing elit. Voluptate, ratione.</p>
					<!-- Link to download on the Apple store -->
					<ul class="download_links">
						<!-- <li>
							<a href="#">
								<span class="big-icon">
									<i class="fa fa-apple"></i>
								</span>
								<span class="text">
									<small>available on</small>
									<br> Apple Store
								</span>
							</a>
						</li> -->
						<li>
							<a href="#">
								<span class="big-icon">
									<i class="fa fa-android"></i>
								</span>
								<span class="text">
									<small>available on</small>
									<br> Google Store
								</span>
							</a>
						</li>
						<!-- <li>
							<a href="#">
								<span class="big-icon">
									<i class="fa fa-windows"></i>
								</span>
								<span class="text">
									<small>available on</small>
									<br> Windows Store
								</span>
							</a>
						</li> -->
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!--==================== App Download Area End ==================== -->

	<!--==================== Start Team Section ======================-->
	<section id="team" class="main-section center-align section_padding_100 bg-white">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center">
					<!-- Heading Text  -->
					<div class="section-heading text-uppercase">
						<h2>How to Order</h2>
						<div class="reflection-text">
							<div>
								<i class="fa fa-heart novi-icon gradient-color"></i>
								<span class="one gradient-color"></span>
								<span class="two gradient-color"></span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 p0 text-center">
					<ul>
						<li>•	Open your Sabji application & login into it.</li>
						<li>•	Browse the things you want and click on add button.</li>
						<li>•	Go to your cart and fill the delivery address.</li>
						<li>•	Pay as u want via UPI, Internet banking or Visa/Rupay/Master card or Cash on delivery.</li>
					</ul>
				</div>
				<!-- <div class="col-lg-12 p0 team_slider">
					<div class="col-lg-4 text-center">
						<div class="team_slider_item">
							<img class="team_slider_item_img img-fluid" src="img/team-img/team-1.jpg" alt="Card image cap">
							<div class="team_slider_item_info">
								<h4>john martin </h4>
								<p>programmer</p>
								<ul class="social_icon">
									<li>
										<a href="#">
											<i class="fa fa-facebook"></i>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-twitter"></i>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-google"></i>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-pinterest"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-4 text-center">
						<div class="team_slider_item">
							<img class="team_slider_item_img img-fluid" src="img/team-img/team-2.jpg" alt="Card image cap">
							<div class="team_slider_item_info">
								<h4>davil maxwell </h4>
								<p>sketch & designer</p>
								<ul class="social_icon">
									<li>
										<a href="#">
											<i class="fa fa-facebook"></i>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-twitter"></i>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-google"></i>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-pinterest"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-4 text-center">
						<div class="team_slider_item">
							<img class="team_slider_item_img img-fluid" src="img/team-img/team-3.jpg" alt="Card image cap">
							<div class="team_slider_item_info">
								<h4>john martin</h4>
								<p>web designer</p>
								<ul class="social_icon">
									<li>
										<a href="#">
											<i class="fa fa-facebook"></i>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-twitter"></i>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-google"></i>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-pinterest"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-4 text-center">
						<div class="team_slider_item">
							<img class="team_slider_item_img img-fluid" src="img/team-img/team-4.jpg" alt="Card image cap">
							<div class="team_slider_item_info">
								<h4>davil maxwell</h4>
								<p>programmer</p>
								<ul class="social_icon">
									<li>
										<a href="#">
											<i class="fa fa-facebook"></i>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-twitter"></i>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-google"></i>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-pinterest"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-4 text-center">
						<div class="team_slider_item">
							<img class="team_slider_item_img img-fluid" src="img/team-img/team-5.jpg" alt="Card image cap">
							<div class="team_slider_item_info">
								<h4>davil maxwell</h4>
								<p>programmer</p>
								<ul class="social_icon">
									<li>
										<a href="#">
											<i class="fa fa-facebook"></i>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-twitter"></i>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-google"></i>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-pinterest"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div> -->
			</div>
		</div>
	</section>
	<!-- ===================End Team Section=================-->

	<!--=============== Start Statistics Section =================-->
	<!-- <section id="statistics" class="main-section center-align section_padding_100">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center"> -->
					<!-- Heading Text  -->
					<!-- <div class="section-heading">
						<h2 class="text-white text-uppercase">Statistics</h2>
						<div class="reflection-text">
							<div>
								<i class="fa fa-heart novi-icon white"></i>
								<span class="one white"></span>
								<span class="two white"></span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-12 col-md-8 col-lg-7 text-center mb-2">
					<p>The New Applus App Lorem ipsum dolor sit amet, consectetur adipisicing elit. In, veniam! Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, ratione.</p>
				</div>
			</div>
			<div class="row st-icons p-t-2">
				<div class="col-6 col-md-3 text-center">
					<i class="fa fa-heart fa-3x" aria-hidden="true"></i>
					<h5>Happy Clients</h5>
					<h3 class="counter">1232</h3>
				</div>
				<div class="col-6 col-md-3 text-center">
					<i class="fa fa-cloud-download fa-3x" aria-hidden="true"></i>
					<h5>App Downloads</h5>
					<h3>
						<span class="counter">64</span>K</h3>
				</div>
				<div class="col-6 col-md-3 text-center">
					<i class="fa fa-reddit-alien fa-3x" aria-hidden="true"></i>
					<h5>Active Users</h5>
					<h3 class="counter">1811</h3>
				</div>
				<div class="col-6 col-md-3 text-center">
					<i class="fa fa-star fa-3x" aria-hidden="true"></i>
					<h5>Total Rates</h5>
					<h3 class="counter">232</h3>
				</div>
			</div>
		</div>
	</section> -->
	<!--====================== End Statistics Section  ===============-->

	<!--====================== Start Prices Section  =====================-->
	<!-- <section id="pricing" class="section_padding_100 bg-white">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center"> -->
					<!-- Heading Text  -->
					<!--<div class="section-heading text-uppercase">
						<h2>Prices</h2>
						<div class="reflection-text">
							<div>
								<i class="fa fa-heart novi-icon gradient-color"></i>
								<span class="one gradient-color"></span>
								<span class="two gradient-color"></span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-md-6 col-lg-3">-->
					<!-- First Price -->
					<!--<div class="price text-center mb-3">
						<div class="info text-center mb-4">
							<h3 class="py-3">00
								<small>$</small>
							</h3>
							<h5>Free trial</h5>
							<ul class="p-tb-1 price-list-item">
								<li>Support Forum</li>
								<li>Free Hosting</li>
								<li>5GB Of Free Storage</li>
								<li>Admin Area</li>
								<li>No Sopurt Hosting</li>
								<li>24/hr Support</li>
							</ul>
						</div>
						<div class="buy_button">
							<a href="#" class="m-t-1 shadow-button">purchase
								<i class="fa fa-angle-double-right"></i>
							</a>

						</div>
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-3">-->
					<!-- First Price -->
					<!--<div class="price text-center mb-3">
						<div class="info text-center mb-4">
							<h3 class="py-3">30
								<small>$</small>
							</h3>
							<h5>Basic</h5>
							<ul class="p-tb-1 price-list-item">
								<li>Support Forum</li>
								<li>Free Hosting</li>
								<li>50GB Of Free Storage</li>
								<li>Admin Area</li>
								<li>Unlimited Hosting</li>
								<li>24/hr Support</li>
							</ul>
						</div>
						<div class="buy_button">
							<a href="#" class="m-t-1 shadow-button">purchase
								<i class="fa fa-angle-double-right"></i>
							</a>

						</div>
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-3">-->
					<!-- Best Price -->
					<!--<div class="price best text-center mb-3 price-best">
						<div class="info text-center mb-4">
							<h3 class="py-3">50
								<small>$</small>
							</h3>
							<h5>standard</h5>
							<ul class="p-tb-1 price-list-item">
								<li>Support Forum</li>
								<li>Free Hosting</li>
								<li>100GB Of Free Storage</li>
								<li>Admin Area</li>
								<li>Unlimited Hosting</li>
								<li>24/hr Support</li>
							</ul>
						</div>
						<div class="buy_button">
							<a href="#" class="m-t-1 shadow-button">purchase
								<i class="fa fa-angle-double-right"></i>
							</a>

						</div>
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-3">-->
					<!-- Third Price -->
					<!--<div class="price text-center mb-3">
						<div class="info text-center mb-4">
							<h3 class="py-3">80
								<small>$</small>
							</h3>
							<h5>Premium</h5>
							<ul class="p-tb-1 price-list-item">
								<li>Support Forum</li>
								<li>Free Hosting</li>
								<li>50GB Of Free Storage</li>
								<li>Admin Area</li>
								<li>Unlimited Hosting</li>
								<li>24/hr Support</li>
							</ul>
						</div>
						<div class="buy_button">
							<a href="#" class="m-t-1 shadow-button">purchase
								<i class="fa fa-angle-double-right"></i>
							</a>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>-->
	<!--===================== End Prices Section  =========================-->

	<!--======================FAQ Section Start=======================-->

	<!-- <div id="faq-section" class="faq-section sec-spacer section_padding_100">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center">
					<div class="section-heading">
						<h2 class="text-white text-uppercase">FAQ</h2>
						<div class="reflection-text">
							<div>
								<i class="fa fa-heart novi-icon white"></i>
								<span class="one white"></span>
								<span class="two white"></span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 mob-hide">
					<div class="faq-img">
						<img src="img/scr-img/faq-phone.png" alt="Faq Image" />
					</div>
				</div>
				<div class="col-lg-6">
					<div id="accordion">
						<div class="card">
							<div class="card-header" id="headingOne">
								<h3 class="mb-0">
									<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										Lorem ipsum dolor sit amet ?
										<i class="fa fa-chevron-down text-right" aria-hidden="true"></i>

									</button>
								</h3>
							</div>

							<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
								<div class="card-body">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi exercitationem harum laudantium maiores quibusdam
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header" id="headingTwo">
								<h3 class="mb-0">
									<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
										Anim pariatur cliche ?
										<i class="fa fa-chevron-down text-right" aria-hidden="true"></i>
									</button>
								</h3>
							</div>
							<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
								<div class="card-body">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi exercitationem harum laudantium maiores quibusdam
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header" id="headingThree">
								<h3 class="mb-0">
									<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
										App truck quinoa ?
										<i class="fa fa-chevron-down text-right" aria-hidden="true"></i>
									</button>
								</h3>
							</div>
							<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
								<div class="card-body">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi exercitationem harum laudantium maiores quibusdam
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header" id="headingfour">
								<h3 class="mb-0">
									<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
										life accusamus terry ?
										<i class="fa fa-chevron-down text-right" aria-hidden="true"></i>
									</button>
								</h3>
							</div>
							<div id="collapsefour" class="collapse" aria-labelledby="headingfour" data-parent="#accordion">
								<div class="card-body">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi exercitationem harum laudantium maiores quibusdam
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header" id="headingfive">
								<h3 class="mb-0">
									<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
										Cupidatat skateboard ?
										<i class="fa fa-chevron-down text-right" aria-hidden="true"></i>
									</button>
								</h3>
							</div>
							<div id="collapsefive" class="collapse" aria-labelledby="headingfive" data-parent="#accordion">
								<div class="card-body">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi exercitationem harum laudantium maiores quibusdam
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
 -->	<!--=====================FAQ Section end========================-->


	<!--===================== Start News Section ========================-->
	<!-- <section id="news" class="section_padding_100 bg-white">

			<div class="container">
				<div class="row">
					<div class="col-12 text-center"> -->
						<!-- Heading Text  -->
						<!-- <div class="section-heading text-uppercase">
							<h2>Latest News</h2>
							<div class="reflection-text">
								<div>
									<i class="fa fa-heart novi-icon gradient-color"></i>
									<span class="one gradient-color"></span>
									<span class="two gradient-color"></span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="p-t-2 grid center-align owl-carousel owl-news">
						<div class="item">
							<a href="blog-details-c2.html">
								<div class="card single-news">
									<div class="card-image">
										<img class="img-fluid" src="images/newes1.jpg" alt="Best Seller of the Week: 600+ UI Elements design for Web">
									</div>
									<div class="card-body info">
										<h5 class="news-title">Best Seller of the Week: 600+ UI Elements design for Web
										</h5>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi exercitationem harum laudantium maiores quibusdam...</p>
										<div class="news_read_more">
											<div class="shadow-button">
												Read more
												<i class="fa fa-angle-double-right"></i>
											</div>
										</div>
									</div>
								</div>
							</a>
						</div>
						<div class="item">
							<a href="blog-details-c2.html">
								<div class="card single-news">
									<div class="card-image">
										<img class="img-fluid" src="images/newes2.jpg" alt="Best Seller of the Week: 600+ UI Elements design for Web">
									</div>
									<div class="card-body info">
										<h5 class="news-title">Best Seller of the Week: 600+ UI Elements design for Web
										</h5>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi exercitationem harum laudantium maiores quibusdam...</p>
										<div class="news_read_more">
											<div class="shadow-button">
												Read more
												<i class="fa fa-angle-double-right"></i>
											</div>
										</div>
									</div>
								</div>
							</a>
						</div>
						<div class="item">
							<a href="blog-details-c2.html">
								<div class="card single-news">
									<div class="card-image">
										<img class="img-fluid" src="images/newes3.jpg" alt="Best Seller of the Week: 600+ UI Elements design for Web">
									</div>
									<div class="card-body info">
										<h5 class="news-title">Best Seller of the Week: 600+ UI Elements design for Web
										</h5>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi exercitationem harum laudantium maiores quibusdam...</p>
										<div class="news_read_more">
											<div class="shadow-button">
												Read more
												<i class="fa fa-angle-double-right"></i>
											</div>
										</div>
									</div>
								</div>
							</a>
						</div>
						<div class="item">
							<a href="blog-details-c2.html">
								<div class="card single-news">
									<div class="card-image">
										<img class="img-fluid" src="images/newes4.jpg" alt="Best Seller of the Week: 600+ UI Elements design for Web">
									</div>
									<div class="card-body info">
										<h5 class="news-title">Best Seller of the Week: 600+ UI Elements design for Web
										</h5>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi exercitationem harum laudantium maiores quibusdam...</p>
										<div class="news_read_more">
											<div class="shadow-button">
												Read more
												<i class="fa fa-angle-double-right"></i>
											</div>
										</div>
									</div>
								</div>
							</a>
						</div>
						<div class="item">
							<a href="blog-details-c2.html">
								<div class="card single-news">
									<div class="card-image">
										<img class="img-fluid" src="images/newes1.jpg" alt="Best Seller of the Week: 600+ UI Elements design for Web">
									</div>
									<div class="card-body info">
										<h5 class="news-title">Best Seller of the Week: 600+ UI Elements design for Web
										</h5>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi exercitationem harum laudantium maiores quibusdam...</p>
										<div class="news_read_more">
											<div class="shadow-button">
												Read more
												<i class="fa fa-angle-double-right"></i>
											</div>
										</div>
									</div>
								</div>
							</a>
						</div>
						<div class="item">
							<a href="blog-details-c2.html">
								<div class="card single-news">
									<div class="card-image">
										<img class="img-fluid" src="images/newes1.jpg" alt="Best Seller of the Week: 600+ UI Elements design for Web">
									</div>
									<div class="card-body info">
										<h5 class="news-title">Best Seller of the Week: 600+ UI Elements design for Web
										</h5>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi exercitationem harum laudantium maiores quibusdam...</p>
										<div class="news_read_more">
											<div class="shadow-button">
												Read more
												<i class="fa fa-angle-double-right"></i>
											</div>
										</div>
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section> -->
		<!--=========== End News Section ==============-->
	<!-- ============ Contact Us Area Start ===============-->
	<section class="footer-contact-area section_padding_100 clearfix" id="contact">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center">
					<!-- Heading Text  -->
					<div class="section-heading text-center text-uppercase">
						<h2>Contact Us</h2>
						<div class="reflection-text">
							<div>
								<i class="fa fa-heart novi-icon white"></i>
								<span class="one white"></span>
								<span class="two white"></span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row info-area">
				<div class="col-md-4">
					<div class="info-top text-center">
						<i class="fa fa-map-marker"></i>
						<div class="info-body">
							<h5>Office Address</h5>
							<p>New Work 123 45</p>
							<p>USA 2334..</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="info-top text-center">
						<i class="fa fa-envelope"></i>
						<div class="info-body">
							<h5>Mail Id</h5>
							<p>demo@gmail.com</p>
							<p>abcd@gmail.com</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="info-top text-center">
						<i class="fa fa-phone"></i>
						<div class="info-body">
							<h5>Phone No.</h5>
							<p>+77 234456789</p>
							<p>+77 348646789</p>
						</div>
					</div>
				</div>
			</div>
			<div id="contact-info">
				<div class="row">
					<div class="col-md-6">
						<!-- Form Start-->
						<div class="contact_from">
							<form action="#" method="post">
								<!-- Message Input Area Start -->
								<div class="contact_input_area">
									<div class="row">
										<!-- Single Input Area Start -->
										<div class="col-md-12">
											<div class="form-group">
												<input type="text" class="form-control name" name="name" placeholder="Your Name" required>
											</div>
										</div>
										<!-- Single Input Area Start -->
										<div class="col-md-12">
											<div class="form-group">
												<input type="email" class="form-control email" name="email" placeholder="Your E-mail" required>
											</div>
										</div>
										<!-- Single Input Area Start -->
										<div class="col-12">
											<div class="form-group">
												<textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Your Message *" required></textarea>
											</div>
										</div>
										<!-- Single Input Area Start -->
										<div class="col-12">
											<button type="submit" class="btn submit-btn">Send Now</button>
										</div>
									</div>
								</div>
								<!-- Message Input Area End -->
							</form>
						</div>
					</div>
					<div class="col-md-6">
						<!-- Heading Text  -->
						<div class="google_map_wrapper">
							<div id="map"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- =============== Contact Us Area End =========================== -->
	<!-- =============== Footer Area Start ======================== -->
	<footer class="footer-social-icon text-center section_padding_70">
		<!-- footer logo -->
		<div class="footer-text">
			<h2>Sabji</h2>
		</div>
		<!-- social icon-->
		<div class="footer-social-icon">
			<a href="#">
				<i class="fa fa-facebook" aria-hidden="true"></i>
			</a>
			<a href="#">
				<i class="fa fa-twitter" aria-hidden="true"></i>
			</a>
			<a href="#">
				<i class="fa fa-youtube" aria-hidden="true"></i>
			</a>
			<a href="#">
				<i class="fa fa-instagram" aria-hidden="true"></i>
			</a>
			<a href="#">
				<i class="fa fa-linkedin" aria-hidden="true"></i>
			</a>
		</div>
		<div class="footer-menu">
			<nav>
				<ul>
					<li>
						<a href="#">About</a>
					</li>
					<li>
						<a href="#">Terms &amp; Conditions</a>
					</li>
					<li>
						<a href="#">Privacy Policy</a>
					</li>
					<li>
						<a href="#">Contact</a>
					</li>
				</ul>
			</nav>
		</div>
		<!-- Foooter Text-->
		<div class="copyright-text">
			<p>Copyright ©2020 |
				<a class="evp-n" href="http://infinitysoftech.com" target="_blank"> Infinity Softech</a>
				<br>
			</p>
		</div>
	</footer>
	<!-- =============== Footer Area End ======================== -->



	<!-- ============ Footer Area Start ============= -->
	<script src="<?= base_url()?>assets/front-end/js/jquery-1.12.4.min.js"></script>
	<!-- Popper js -->
	<script src="<?= base_url()?>assets/front-end/js/popper.min.js"></script>
	<!-- Bootstrap-4 Beta JS -->
	<script src="<?= base_url()?>assets/front-end/js/bootstrap.min.js"></script>
	<!-- All Plugins JS -->
	<script src="<?= base_url()?>assets/front-end/js/plugins.js"></script>
	<!-- owl carousel Js-->
	<script src="<?= base_url()?>assets/front-end/js/owl.carousel.min.js"></script>
	<!-- Slick Slider Js-->
	<script src="<?= base_url()?>assets/front-end/js/slick.min.js"></script>
	<!--killar carosul-->
	<script src="<?= base_url()?>assets/front-end/js/killercarousel.js"></script>
	<!-- Footer Reveal JS -->
	<script src="<?= base_url()?>assets/front-end/js/footer-reveal.min.js"></script>
	<!--venobox -->
	<script src="<?= base_url()?>assets/front-end/js/venobox.js"></script>
	<!--    map js -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7eALQrRUekFNQX71IBNkxUXcz-ALS-MY&amp;sensor=false"></script>
	<script src="<?= base_url()?>assets/front-end/js/map.js"></script>
	<!-- canvas plugin -->
	<script src="<?= base_url()?>assets/front-end/js/angle-plugin.js"></script>
	<script src="<?= base_url()?>assets/front-end/js/custom.js"></script>
</body>


<!-- Mirrored from idealdevs.net/themeforest/applus/main-file/color2-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 May 2020 06:33:07 GMT -->
</html>