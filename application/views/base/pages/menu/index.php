<!-- BEGIN BANNER SECTION -->
<section class="title-banner">
<div class="wrap-tb-bg">
	<div class="tb-background">
		<div class="tb-background-bgoverlay"></div>
		<div class="tb-background-img" style="bottom: 0px">
			<img src="<?= base_url("./assets/base/img/page-menu.jpg"); ?>" alt="banner">
		</div>
	</div>
</div>
<div class="tb-text">
	<h1>OUR MENU</h1>
	<div class="tb-line"></div>
</div>
</section>
<!-- END BANNER SECTION -->
<!-- BEGIN CONTENT PAGE -->
<section class="inner-page-content food-menu-page">
<div class="container">
	<div class="col-sm-12">
		<div class="col-sm-3">
			<ul class="list-group list-group-flush border" style="list-style:none;">
				<li class="list-group-item"><label for="">SEARCH</label></li>
				<li class="p-5"><input type="text" placeholder="Search Products.." name="q" class="form-control" /></li>
				<li class="list-group-item"><label for="">BEST SELLERS</label></li>
				<li class="p-5">
					<div class="menu-item border-bottom">
						<div class="menu-item-wrap">
							<div class="miw-left">
								<div class="menu-item-img" style="background-image: url('<?= base_url("./assets/base/img/menu-fried-rice.jpg"); ?>')">
								</div>
							</div>
							<div>
								<div class="miw-info">
									<div class="menu-title">
										<h4>Special Fried Rice</h4>
									</div>
									<div class="menu-rate"><?= CURRENCY; ?>5.19</div>
								</div>
							</div>
						</div>
					</div>
					<div class="menu-item border-bottom">
						<div class="menu-item-wrap">
							<div class="miw-left">
								<div class="menu-item-img" style="background-image: url('<?= base_url("./assets/base/img/menu-fried-rice.jpg"); ?>')">
								</div>
							</div>
							<div>
								<div class="miw-info">
									<div class="menu-title">
										<h4>Special Fried Rice</h4>
									</div>
									<div class="menu-rate"><?= CURRENCY; ?>5.19</div>
								</div>
							</div>
						</div>
					</div>
				</li>
				<li class="list-group-item"><label for="">MENU CATEGORIES</label></li>
				<li class="p-5">
					<ul class="category-list">
						<li>
							<a href="/" class="active">Gulab Jamun</a>
						</li>
						<li>
							<a href="/">Jalebi</a>
						</li>
						<li>
							<a href="/">Kheer/ Payasam</a>
						</li>
						<li>
							<a href="/">Shrikhand</a>
						</li>
						<li>
							<a href="/">Patishapta with Strawberry Couli</a>
						</li>
						<li>
							<a href="/">Gajar Ka Halwa</a>
						</li>
						<li>
							<a href="/">Rasmalai</a>
						</li>
					</ul>
				</li>
				<li class="list-group-item"><label for="">FILTER BY PRICE</label></li>
				<li class="p-5">
					<div class="price-range-slider">
						<p class="range-value">
							<!-- <input type="text"  readonly> -->
							<span id="amount"></span>
						</p>
						<div id="slider-range" class="range-bar"></div>	
					</div>
				</li>
				
			</ul>
		</div>
		<div class="col-sm-9">
			<div class="row-menu">
				<div class="row">
					<div class="col-md-12">
						<div class="heading-menu">
							<h1 class="page-title">Asian Food</h1>
							<div>Best quality Asian Food</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<!-- menu item -->
						<div class="menu-item">
							<div class="menu-item-wrap">
								<div class="miw-left">
									<div class="menu-item-img" style="background-image: url('<?= base_url("./assets/base/img/menu-fried-rice.jpg"); ?>')">
									</div>
								</div>
								<div class="miw-right">
									<div class="miw-info">
										<div class="menu-title">
											<h3>Special Fried Rice</h3>
										</div>
										<div class="menu-rate"><?= CURRENCY; ?>5.19</div>
									</div>
									<p>
										Fried Rice with egg, fried chicken and chicken satay.
									</p>
								</div>
							</div>
						</div>
						<!-- end menu item -->
						<!-- menu item -->
						<div class="menu-item">
							<div class="menu-item-wrap">
								<div class="miw-left">
									<div class="menu-item-img" style="background-image: url('<?= base_url("./assets/base/img/menu-noodle.jpg"); ?>')">
									</div>
								</div>
								<div class="miw-right">
									<div class="miw-info">
										<div class="menu-title">
											<h3>Special Noodle</h3>
										</div>
										<div class="menu-rate"><?= CURRENCY; ?>5.19</div>
									</div>
									<p>
										fried noodles with egg and chicken.
									</p>
								</div>
							</div>
						</div>
						<!-- end menu item -->
						<!-- menu item -->
						<div class="menu-item">
							<div class="menu-item-wrap">
								<div class="miw-left">
									<div class="menu-item-img" style="background-image: url('<?= base_url("./assets/base/img/menu-gudeg.jpg"); ?>')">
									</div>
								</div>
								<div class="miw-right">
									<div class="miw-info">
										<div class="menu-title">
											<h3>Jogja Gudeg</h3>
										</div>
										<div class="menu-rate"><?= CURRENCY; ?>4.59</div>
									</div>
									<p>
										rice mixed typical jogja with chicken, egg, tofu and tempe.
									</p>
								</div>
							</div>
						</div>
						<!-- end menu item -->
						<!-- menu item -->
						<div class="menu-item">
							<div class="menu-item-wrap">
								<div class="miw-left">
									<div class="menu-item-img" style="background-image: url('<?= base_url("./assets/base/img/menu-tongseng.jpg"); ?>')">
									</div>
								</div>
								<div class="miw-right">
									<div class="miw-info">
										<div class="menu-title">
											<h3>Tongseng</h3>
										</div>
										<div class="menu-rate"><?= CURRENCY; ?>6.19</div>
									</div>
									<p>
										tongseng goat spicy with white rice.
									</p>
								</div>
							</div>
						</div>
						<!-- end menu item --></div>
					<div class="col-md-6 col-sm-12">
						<!-- menu item -->
						<div class="menu-item">
							<div class="menu-item-wrap">
								<div class="miw-left">
									<div class="menu-item-img" style="background-image: url('<?= base_url("./assets/base/img/menu-roasted-duck.jpg"); ?>')">
									</div>
								</div>
								<div class="miw-right">
									<div class="miw-info">
										<div class="menu-title">
											<h3>Roasted Duck</h3>
										</div>
										<div class="menu-rate"><?= CURRENCY; ?>6.19</div>
									</div>
									<p>
										Roasted duck with white rice or French fries.
									</p>
								</div>
							</div>
						</div>
						<!-- end menu item -->
						<!-- menu item -->
						<div class="menu-item">
							<div class="menu-item-wrap">
								<div class="miw-left">
									<div class="menu-item-img" style="background-image: url('<?= base_url("./assets/base/img/menu-soup.jpg"); ?>')">
									</div>
								</div>
								<div class="miw-right">
									<div class="miw-info">
										<div class="menu-title">
											<h3>Oktail Soup</h3>
										</div>
										<div class="menu-rate"><?= CURRENCY; ?>8.99</div>
									</div>
									<p>
										oxtail soup on boiled, fried or roasted with white rice.
									</p>
								</div>
							</div>
						</div>
						<!-- end menu item -->
						<!-- menu item -->
						<div class="menu-item">
							<div class="menu-item-wrap">
								<div class="miw-left">
									<div class="menu-item-img" style="background-image: url('<?= base_url("./assets/base/img/menu-prawn.jpg"); ?>')">
									</div>
								</div>
								<div class="miw-right">
									<div class="miw-info">
										<div class="menu-title">
											<h3>Prawn Mayonaise</h3>
										</div>
										<div class="menu-rate"><?= CURRENCY; ?>6.19</div>
									</div>
									<p>
										fried shrimp flour with mayonnaise sauce.
									</p>
								</div>
							</div>
						</div>
						<!-- end menu item -->
						<!-- menu item -->
						<div class="menu-item">
							<div class="menu-item-wrap">
								<div class="miw-left">
									<div class="menu-item-img" style="background-image: url('<?= base_url("./assets/base/img/menu-tofu.jpg"); ?>')">
									</div>
								</div>
								<div class="miw-right">
									<div class="miw-info">
										<div class="menu-title">
											<h3>Sapo Tofu</h3>
										</div>
										<div class="menu-rate"><?= CURRENCY; ?>29.99</div>
									</div>
									<p>
										saute vegetables and tofu japan.
									</p>
								</div>
							</div>
						</div>
						<!-- end menu item --></div>
				</div>
			</div>
			<div class="row-menu">
				<div class="row">
					<div class="col-md-12">
						<div class="heading-menu">
							<h1 class="page-title">Dessert</h1>
							<div>Best quality Dessert Food</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<!-- menu item -->
						<div class="menu-item">
							<div class="menu-item-wrap">
								<div class="miw-left">
									<div class="menu-item-img" style="background-image: url('<?= base_url("./assets/base/img/menu-fruit-yogurt.jpg"); ?>')">
									</div>
								</div>
								<div class="miw-right">
									<div class="miw-info">
										<div class="menu-title">
											<h3>Fruit Yoghurt</h3>
										</div>
										<div class="menu-rate"><?= CURRENCY; ?>2.19</div>
									</div>
									<p>
										combination of fresh fruits and yogurt.
									</p>
								</div>
							</div>
						</div>
						<!-- end menu item -->
						<!-- menu item -->
						<div class="menu-item">
							<div class="menu-item-wrap">
								<div class="miw-left">
									<div class="menu-item-img" style="background-image: url('<?= base_url("./assets/base/img/menu-tiramisu.jpg"); ?>')">
									</div>
								</div>
								<div class="miw-right">
									<div class="miw-info">
										<div class="menu-title">
											<h3>Tiramisu</h3>
										</div>
										<div class="menu-rate"><?= CURRENCY; ?>2.19</div>
									</div>
									<p>
										combination of fresh fruits and yogurt.
									</p>
								</div>
							</div>
						</div>
						<!-- end menu item --></div>
					<div class="col-md-6 col-sm-12">
						<!-- menu item -->
						<div class="menu-item">
							<div class="menu-item-wrap">
								<div class="miw-left">
									<div class="menu-item-img" style="background-image: url('<?= base_url("./assets/base/img/rainbow-cake.jpg"); ?>')">
									</div>
								</div>
								<div class="miw-right">
									<div class="miw-info">
										<div class="menu-title">
											<h3>Rainbow Cake</h3>
										</div>
										<div class="menu-rate"><?= CURRENCY; ?>2.59</div>
									</div>
									<p>
										soft vanilla sponge cake in 6 colours filled and covered with our signature fluffy vanilla buttercream.
									</p>
								</div>
							</div>
						</div>
						<!-- end menu item -->
						<!-- menu item -->
						<div class="menu-item">
							<div class="menu-item-wrap">
								<div class="miw-left">
									<div class="menu-item-img" style="background-image: url('<?= base_url("./assets/base/img/menu-mousse.jpg"); ?>')">
									</div>
								</div>
								<div class="miw-right">
									<div class="miw-info">
										<div class="menu-title">
											<h3>Strawberry Mousse</h3>
										</div>
										<div class="menu-rate"><?= CURRENCY; ?>2.19</div>
									</div>
									<p>
										Smooth and creamy strawberry mousse made with fresh strawberries, cream, gelatin, sugar, lemon juice and white chocolate.
									</p>
								</div>
							</div>
						</div>
						<!-- end menu item --></div>
				</div>
			</div>
			<div class="row-menu">
				<div class="row">
					<div class="col-md-12">
						<div class="heading-menu">
							<h1 class="page-title">Soup</h1>
							<div>Best quality soup</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<!-- menu item -->
						<div class="menu-item">
							<div class="menu-item-wrap">
								<div class="miw-left">
									<div class="menu-item-img" style="background-image: url('<?= base_url("./assets/base/img/menu-soto.jpg"); ?>')">
									</div>
								</div>
								<div class="miw-right">
									<div class="miw-info">
										<div class="menu-title">
											<h3>Chicken Soto Lamongan</h3>
										</div>
										<div class="menu-rate"><?= CURRENCY; ?>4.59</div>
									</div>
									<p>
										Chicken Soto with potato and rice.
									</p>
								</div>
							</div>
						</div>
						<!-- end menu item --></div>
					<div class="col-md-6 col-sm-12">
						<!-- menu item -->
						<div class="menu-item">
							<div class="menu-item-wrap">
								<div class="miw-left">
									<div class="menu-item-img" style="background-image: url('<?= base_url("./assets/base/img/menu-chicken-vegetable.jpg"); ?>')">
									</div>
								</div>
								<div class="miw-right">
									<div class="miw-info">
										<div class="menu-title">
											<h3>Chicken & Vegetables Clear Soup</h3>
										</div>
										<div class="menu-rate"><?= CURRENCY; ?>2.19</div>
									</div>
									<p>
										chicken soup, mushroom and vegetable with white rice
									</p>
								</div>
							</div>
						</div>
						<!-- end menu item --></div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
<!-- END CONTENT PAGE -->
<!-- BEGIN SECTION FOOTER-->