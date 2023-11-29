<?php

class partsView
{
	private $root;
    private $dbModelObj;
    private $commonModelObj;
	private $booksModelObj;

    public function __construct($dbModelObj, $commonModelObj, $booksModelObj)
    {
        $this->root = $_SERVER['DOCUMENT_ROOT'];
        $this->dbModelObj = $dbModelObj;
        $this->commonModelObj = $commonModelObj;
		$this->booksModelObj = $booksModelObj;
    }

	public function getHtmlBegin(){
		$vString = "<!DOCTYPE html>
			<html class='no-js' lang='en'>
				<head>
					<meta charset='utf-8'>
					<meta http-equiv='x-ua-compatible' content='ie=edge'>
					<meta name='robots' content='noindex, follow' />
					<meta name='description' content=''>
					<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>";

						$this->dbModelObj->getConnectionSettings();
						$vBaseUrl = $this->dbModelObj->conn_obj['server'];
						$vString .= "
						<base href='".$vBaseUrl."' />
						<title>Graffiti Books - </title>";

					$vString .= "
					<!-- Favicon -->
					<link rel='shortcut icon' type='image/x-icon' href='assets/images/favicon.webp'>
				
					<!-- Vendor CSS (Bootstrap & Icon Font) -->
					<link rel='stylesheet' href='assets/css/vendor/bootstrap.min.css'>
					<link rel='stylesheet' href='assets/css/vendor/fontawesome.min.css'>
					<link rel='stylesheet' href='assets/css/vendor/themify-icons.css'>
					<link rel='stylesheet' href='assets/css/vendor/customFonts.css'>
				
					<!-- Plugins CSS (All Plugins Files) -->
					<link rel='stylesheet' href='assets/css/plugins/select2.min.css'>
					<link rel='stylesheet' href='assets/css/plugins/perfect-scrollbar.css'>
					<link rel='stylesheet' href='assets/css/plugins/swiper.min.css'>
					<link rel='stylesheet' href='assets/css/plugins/nice-select.css'>
					<link rel='stylesheet' href='assets/css/plugins/ion.rangeSlider.min.css'>
					<link rel='stylesheet' href='assets/css/plugins/magnific-popup.css'>
					<link rel='stylesheet' href='assets/css/plugins/slick.css'>
				
					<!-- Main Style CSS -->
					 <link rel='stylesheet' href='assets/css/style1.1.css'>
				<!--    <link rel='stylesheet' href='assets/css/style.min.css'>-->
				</head>";

		return $vString;
	}

	public function getTopBar(){
		$vString = "<div class='topbar-section section bg-primary2'>
			<div class='container'>
				<div class='row justify-content-between align-items-center'>
					<div class='col-md-auto col-12'>
						<p class='text-white text-center text-md-left my-2'>Free shipping for orders over $59!</p>
					</div>
					<div class='col-auto d-none d-md-block'>
						<div class='topbar-menu'>
							<a href='#' class='text-white'>Skryf in en wen!</a>
						</div>
					</div>
				</div>
			</div>
		</div>";
		return $vString;
	}

	public function getHeader(){
		$vString = "
		<!-- Header Section Start -->
		<div class='header-section section bg-white d-none d-xl-block'>
			<div class='container'>
				<div class='row row-cols-lg-3 align-items-center'>
	
					<!-- Header Language & Currency Start -->
					<div class='col'>
						<ul class='header-lan-curr'>
							<li><a href='#'>Afrikaans</a>
								<ul class='curr-lan-sub-menu'>
									<li><a href='#'>English</a></li>
								</ul>
							</li>
							<li class='header2-search' id='top-search'>
								<form action='#'>
									<input type='text' placeholder='Search...'><button class='btn'><i class='fas fa-search'></i></button>
								</form>
							</li>
						</ul>
					</div>
					<!-- Header Language & Currency End -->
	
					<!-- Header Logo Start -->
					<div class='col justify-content-center'>
						<div class='header-logo justify-content-center'>
							<a href='Tuisblad' class='justify-content-center'><img src='assets/images/logo/logo2_t.png' class='w-50' alt='Graffiti Books'></a>
						</div>
					</div>
					<!-- Header Logo End -->
	
					<!-- Header Tools Start -->
					<div class='col'>
						<div class='header-tools justify-content-end'>
							<div class='header-login'>
								<a href='my-account.html'><i class='far fa-user'></i></a>
							</div>
	<!--                        <div class='header-search'>-->
	<!--                            <a href='#offcanvas-search' class='offcanvas-toggle'><i class='fas fa-search'></i></a>-->
	<!--                        </div>-->
							<div class='header-wishlist'>
								<a href='#offcanvas-wishlist' class='offcanvas-toggle'><span class='wishlist-count'>3</span><i class='far fa-heart'></i></a>
							</div>
							<div class='header-cart'>
								<a href='#offcanvas-cart' class='offcanvas-toggle'><span class='cart-count'>3</span><i class='fas fa-shopping-cart'></i></a>
							</div>
						</div>
					</div>
					<!-- Header Tools End -->
	
				</div>
			</div>
	
			<!-- Site Menu Section Start -->
			<div class='site-menu-section section'>
				<div class='container'>
					<nav class='site-main-menu justify-content-center'>
						<ul>
							<li class='has-children'><a href='#'><span class='menu-text'>Nie-Fiksie</span></a>
								<ul class='sub-menu mega-menu'>
									<li>
										<a href='#' class='mega-menu-title'><span class='menu-text'>HOME GROUP</span></a>
										<ul>
											<li> <img class='mmh_img ' src='assets/images/demo/menu/home-01.webp' alt='home-01'> <a href='index.html'><span class='menu-text'>Arts Propelled</span></a></li>
											<li> <img class='mmh_img ' src='assets/images/demo/menu/home-02.webp' alt='home-02'> <a href='index-2.html'><span class='menu-text'>Decor Thriving</span></a></li>
											<li> <img class='mmh_img ' src='assets/images/demo/menu/home-03.webp' alt='home-03'> <a href='index-3.html'><span class='menu-text'>Savvy Delight</span></a></li>
											<li> <img class='mmh_img ' src='assets/images/demo/menu/home-04.webp' alt='home-04'> <a href='index-4.html'><span class='menu-text'>Perfect Escapes</span></a></li>
										</ul>
									</li>
									<li>
										<a href='index-2.html' class='mega-menu-title'><span class='menu-text'>HOME GROUP</span></a>
										<ul>
											<li> <img class='mmh_img ' src='assets/images/demo/menu/home-05.webp' alt='home-05'> <a href='index-5.html'><span class='menu-text'>Kitchen Cozy</span></a></li>
											<li> <img class='mmh_img ' src='assets/images/demo/menu/home-06.webp' alt='home-06'> <a href='index-6.html'><span class='menu-text'>Dreamy Designs</span></a></li>
											<li> <img class='mmh_img ' src='assets/images/demo/menu/home-07.webp' alt='home-07'> <a href='index-7.html'><span class='menu-text'>Crispy Recipes</span></a></li>
											<li> <img class='mmh_img ' src='assets/images/demo/menu/home-08.webp' alt='home-08'> <a href='index-8.html'><span class='menu-text'>Decoholic Chic</span></a></li>
										</ul>
									</li>
									<li>
										<a href='index-2.html' class='mega-menu-title'><span class='menu-text'>HOME GROUP</span></a>
										<ul>
											<li> <img class='mmh_img ' src='assets/images/demo/menu/home-9.webp' alt='home-9'> <a href='index-9.html'><span class='menu-text'>Reblended Dish</span></a></li>
											<li> <img class='mmh_img ' src='assets/images/demo/menu/home-10.webp' alt='home-10'> <a href='index-10.html'><span class='menu-text'>Craftin House</span></a></li>
											<li> <img class='mmh_img ' src='assets/images/demo/menu/home-11.webp' alt='home-11'> <a href='index-11.html'><span class='menu-text'>Craftswork Biz</span></a></li>
										</ul>
									</li>
									<li>
										<a href='#' class='menu-banner'><img src='assets/images/banner/menu-banner-1.webp' alt='Home Menu Banner'></a>
									</li>
								</ul>
							</li>
							<li class='has-children'><a href='#'><span class='menu-text'>Fiksie</span></a>
								<ul class='sub-menu mega-menu'>
									<li>
										<a href='#' class='mega-menu-title'><span class='menu-text'>SHOP PAGES</span></a>
										<ul>
											<li><a href='shop.html'><span class='menu-text'>Shop No Sidebar</span></a></li>
											<li><a href='shop-left-sidebar.html'><span class='menu-text'>Shop Left Sidebar</span></a></li>
											<li><a href='shop-right-sidebar.html'><span class='menu-text'>Shop Right Sidebar</span></a></li>
											<li><a href='shop-fullwidth-no-gutters.html'><span class='menu-text'>Shop Fullwidth No Space</span></a></li>
											<li><a href='shop-fullwidth.html'><span class='menu-text'>Shop Fullwidth No Sidebar</span></a></li>
											<li><a href='shop-fullwidth-left-sidebar.html'><span class='menu-text'>Shop Fullwidth Left Sidebar</span></a></li>
											<li><a href='shop-fullwidth-right-sidebar.html'><span class='menu-text'>Shop Fullwidth Right Sidebar</span></a></li>
										</ul>
									</li>
									<li>
										<a href='#' class='mega-menu-title'><span class='menu-text'>PRODUCT PAGES</span></a>
										<ul>
											<li><a href='product-details.html'><span class='menu-text'>Basic</span></a></li>
											<li><a href='product-details-fullwidth.html'><span class='menu-text'>Fullwidth</span></a></li>
											<li><a href='product-details-sticky.html'><span class='menu-text'>Sticky Details</span></a></li>
											<li><a href='product-details-sidebar.html'><span class='menu-text'>Width Sidebar</span></a></li>
											<li><a href='product-details-extra-content.html'><span class='menu-text'>Extra Content</span></a></li>
											<li><a href='product-details-image-variation.html'><span class='menu-text'>Variations Images</span></a></li>
											<li><a href='product-details-group.html'><span class='menu-text'>Bought Together</span></a></li>
											<li><a href='product-details-360.html'><span class='menu-text'>Product 360</span></a></li>
										</ul>
									</li>
									<li>
										<a href='#' class='mega-menu-title'><span class='menu-text'>PRODUCT & Other PAGES</span></a>
										<ul>
											<li><a href='product-details-background.html'><span class='menu-text'>Product with Background</span></a></li>
											<li><a href='shopping-cart.html'><span class='menu-text'>Shopping Cart</span></a></li>
											<li><a href='checkout.html'><span class='menu-text'>Checkout</span></a></li>
											<li><a href='order-tracking.html'><span class='menu-text'>Order Tracking</span></a></li>
											<li><a href='wishlist.html'><span class='menu-text'>Wishlist</span></a></li>
											<li><a href='login-register.html'><span class='menu-text'>Customer Login</span></a></li>
											<li><a href='my-account.html'><span class='menu-text'>My Account</span></a></li>
											<li><a href='lost-password.html'><span class='menu-text'>Lost Password</span></a></li>
										</ul>
									</li>
									<li class='align-self-center'>
										<a href='#' class='menu-banner'><img src='assets/images/banner/menu-banner-2.webp' alt='Shop Menu Banner'></a>
									</li>
								</ul>
							</li>
							<li class='has-children'><a href='#'><span class='menu-text'>Kinders</span></a>
								<ul class='sub-menu'>
									<li><a href='portfolio-3-columns.html'><span class='menu-text'>Portfolio 3 Columns</span></a></li>
									<li><a href='portfolio-4-columns.html'><span class='menu-text'>Portfolio 4 Columns</span></a></li>
									<li><a href='portfolio-5-columns.html'><span class='menu-text'>Portfolio 5 Columns</span></a></li>
									<li><a href='portfolio-details.html'><span class='menu-text'>Portfolio Details</span></a></li>
								</ul>
							</li>
							<li class='has-children'><a href='#'><span class='menu-text'>Opvoedkundig</span></a>
								<ul class='sub-menu mega-menu'>
									<li>
										<a href='#' class='mega-menu-title'><span class='menu-text'>Column One</span></a>
										<ul>
											<li><a href='elements-products.html'><span class='menu-text'>Product Styles</span></a></li>
											<li><a href='elements-products-tabs.html'><span class='menu-text'>Product Tabs</span></a></li>
											<li><a href='elements-product-sale-banner.html'><span class='menu-text'>Product & Sale Banner</span></a></li>
										</ul>
									</li>
									<li>
										<a href='#' class='mega-menu-title'><span class='menu-text'>Column Two</span></a>
										<ul>
											<li><a href='elements-category-banner.html'><span class='menu-text'>Category Banner</span></a></li>
											<li><a href='elements-team.html'><span class='menu-text'>Team Member</span></a></li>
											<li><a href='elements-testimonials.html'><span class='menu-text'>Testimonials</span></a></li>
										</ul>
									</li>
									<li>
										<a href='#' class='mega-menu-title'><span class='menu-text'>Column Three</span></a>
										<ul>
											<li><a href='elements-instagram.html'><span class='menu-text'>Instagram</span></a></li>
											<li><a href='elements-map.html'><span class='menu-text'>Google Map</span></a></li>
											<li><a href='elements-icon-box.html'><span class='menu-text'>Icon Box</span></a></li>
										</ul>
									</li>
									<li>
										<a href='#' class='mega-menu-title'><span class='menu-text'>Column Four</span></a>
										<ul>
											<li><a href='elements-buttons.html'><span class='menu-text'>Buttons</span></a></li>
											<li><a href='elements-faq.html'><span class='menu-text'>FAQs / Toggles</span></a></li>
											<li><a href='elements-brands.html'><span class='menu-text'>Brands</span></a></li>
										</ul>
									</li>
								</ul>
							</li>
							<li class='has-children'><a href='#'><span class='menu-text'>Christelik</span></a>
								<ul class='sub-menu'>
									<li class='has-children'><a href='blog-right-sidebar.html'><span class='menu-text'>Standard Layout</span></a>
										<ul class='sub-menu'>
											<li><a href='blog-right-sidebar.html'><span class='menu-text'>Right Sidebar</span></a></li>
											<li><a href='blog-left-sidebar.html'><span class='menu-text'>Left Sidebar</span></a></li>
											<li><a href='blog-fullwidth.html'><span class='menu-text'>Full Width</span></a></li>
										</ul>
									</li>
									<li class='has-children'><a href='blog-grid-right-sidebar.html'><span class='menu-text'>Grid Layout</span></a>
										<ul class='sub-menu'>
											<li><a href='blog-grid-right-sidebar.html'><span class='menu-text'>Right Sidebar</span></a></li>
											<li><a href='blog-grid-left-sidebar.html'><span class='menu-text'>Left Sidebar</span></a></li>
											<li><a href='blog-grid-fullwidth.html'><span class='menu-text'>Full Width</span></a></li>
										</ul>
									</li>
									<li class='has-children'><a href='blog-list-right-sidebar.html'><span class='menu-text'>List Layout</span></a>
										<ul class='sub-menu'>
											<li><a href='blog-list-right-sidebar.html'><span class='menu-text'>Right Sidebar</span></a></li>
											<li><a href='blog-list-left-sidebar.html'><span class='menu-text'>Left Sidebar</span></a></li>
											<li><a href='blog-list-fullwidth.html'><span class='menu-text'>Full Width</span></a></li>
										</ul>
									</li>
									<li class='has-children'><a href='blog-masonry-right-sidebar.html'><span class='menu-text'>Masonry Layout</span></a>
										<ul class='sub-menu'>
											<li><a href='blog-masonry-right-sidebar.html'><span class='menu-text'>Right Sidebar</span></a></li>
											<li><a href='blog-masonry-left-sidebar.html'><span class='menu-text'>Left Sidebar</span></a></li>
											<li><a href='blog-masonry-fullwidth.html'><span class='menu-text'>Full Width</span></a></li>
										</ul>
									</li>
									<li class='has-children'><a href='blog-details-right-sidebar.html'><span class='menu-text'>Single Post Layout</span></a>
										<ul class='sub-menu'>
											<li><a href='blog-details-right-sidebar.html'><span class='menu-text'>Right Sidebar</span></a></li>
											<li><a href='blog-details-left-sidebar.html'><span class='menu-text'>Left Sidebar</span></a></li>
											<li><a href='blog-details-fullwidth.html'><span class='menu-text'>Full Width</span></a></li>
										</ul>
									</li>
								</ul>
							</li>
							<li class='has-children'><a href='#'><span class='menu-text'>Geskenke</span></a>
								<ul class='sub-menu'>
									<li><a href='about-us.html'><span class='menu-text'>About us</span></a></li>
									<li><a href='about-us-2.html'><span class='menu-text'>About us 02</span></a></li>
									<li><a href='contact-us.html'><span class='menu-text'>Contact us</span></a></li>
									<li><a href='coming-soon.html'><span class='menu-text'>Coming Soon</span></a></li>
									<li><a href='404.html'><span class='menu-text'>Page 404</span></a></li>
								</ul>
							</li>
						</ul>
					</nav>
				</div>
			</div>
			<!-- Site Menu Section End -->
	
		</div>
		<!-- Header Section End -->
	
		<!-- Header Sticky Section Start -->
		<div class='sticky-header header-menu-center section bg-white d-none d-xl-block'>
			<div class='container'>
				<div class='row align-items-center'>
	
					<!-- Header Logo Start -->
					<div class='col'>
						<div class='header-logo'>
							<a href='index.html'><img src='assets/images/logo/logo2_t.png' class='w-75' alt='Learts Logo'></a>
						</div>
					</div>
					<!-- Header Logo End -->
	
					<!-- Search Start -->
					<div class='col d-none d-xl-block'>
						<nav class='site-main-menu justify-content-center sticky-small'>
							<ul>
								<li class='has-children'><a href='#'><span class='menu-text'>Nie-Fiksie&nbsp;</span></a>
									<ul class='sub-menu mega-menu'>
										<li>
											<a href='#' class='mega-menu-title'><span class='menu-text'>HOME GROUP</span></a>
											<ul>
												<li> <img class='mmh_img ' src='assets/images/demo/menu/home-01.webp' alt='home-01'> <a href='index.html'><span class='menu-text'>Arts Propelled</span></a></li>
												<li> <img class='mmh_img ' src='assets/images/demo/menu/home-02.webp' alt='home-02'> <a href='index-2.html'><span class='menu-text'>Decor Thriving</span></a></li>
												<li> <img class='mmh_img ' src='assets/images/demo/menu/home-03.webp' alt='home-03'> <a href='index-3.html'><span class='menu-text'>Savvy Delight</span></a></li>
												<li> <img class='mmh_img ' src='assets/images/demo/menu/home-04.webp' alt='home-04'> <a href='index-4.html'><span class='menu-text'>Perfect Escapes</span></a></li>
											</ul>
										</li>
										<li>
											<a href='index-2.html' class='mega-menu-title'><span class='menu-text'>HOME GROUP</span></a>
											<ul>
												<li> <img class='mmh_img ' src='assets/images/demo/menu/home-05.webp' alt='home-05'> <a href='index-5.html'><span class='menu-text'>Kitchen Cozy</span></a></li>
												<li> <img class='mmh_img ' src='assets/images/demo/menu/home-06.webp' alt='home-06'> <a href='index-6.html'><span class='menu-text'>Dreamy Designs</span></a></li>
												<li> <img class='mmh_img ' src='assets/images/demo/menu/home-07.webp' alt='home-07'> <a href='index-7.html'><span class='menu-text'>Crispy Recipes</span></a></li>
												<li> <img class='mmh_img ' src='assets/images/demo/menu/home-08.webp' alt='home-08'> <a href='index-8.html'><span class='menu-text'>Decoholic Chic</span></a></li>
											</ul>
										</li>
										<li>
											<a href='index-2.html' class='mega-menu-title'><span class='menu-text'>HOME GROUP</span></a>
											<ul>
												<li> <img class='mmh_img ' src='assets/images/demo/menu/home-9.webp' alt='home-9'> <a href='index-9.html'><span class='menu-text'>Reblended Dish</span></a></li>
												<li> <img class='mmh_img ' src='assets/images/demo/menu/home-10.webp' alt='home-10'> <a href='index-10.html'><span class='menu-text'>Craftin House</span></a></li>
												<li> <img class='mmh_img ' src='assets/images/demo/menu/home-11.webp' alt='home-11'> <a href='index-11.html'><span class='menu-text'>Craftswork Biz</span></a></li>
											</ul>
										</li>
										<li>
											<a href='#' class='menu-banner'><img src='assets/images/banner/menu-banner-1.webp' alt='Home Menu Banner'></a>
										</li>
									</ul>
								</li>
								<li class='has-children'><a href='#'><span class='menu-text'>Fiksie&nbsp;</span></a>
									<ul class='sub-menu mega-menu'>
										<li>
											<a href='#' class='mega-menu-title'><span class='menu-text'>SHOP PAGES</span></a>
											<ul>
												<li><a href='shop.html'><span class='menu-text'>Shop No Sidebar</span></a></li>
												<li><a href='shop-left-sidebar.html'><span class='menu-text'>Shop Left Sidebar</span></a></li>
												<li><a href='shop-right-sidebar.html'><span class='menu-text'>Shop Right Sidebar</span></a></li>
												<li><a href='shop-fullwidth-no-gutters.html'><span class='menu-text'>Shop Fullwidth No Space</span></a></li>
												<li><a href='shop-fullwidth.html'><span class='menu-text'>Shop Fullwidth No Sidebar</span></a></li>
												<li><a href='shop-fullwidth-left-sidebar.html'><span class='menu-text'>Shop Fullwidth Left Sidebar</span></a></li>
												<li><a href='shop-fullwidth-right-sidebar.html'><span class='menu-text'>Shop Fullwidth Right Sidebar</span></a></li>
											</ul>
										</li>
										<li>
											<a href='#' class='mega-menu-title'><span class='menu-text'>PRODUCT PAGES</span></a>
											<ul>
												<li><a href='product-details.html'><span class='menu-text'>Basic</span></a></li>
												<li><a href='product-details-fullwidth.html'><span class='menu-text'>Fullwidth</span></a></li>
												<li><a href='product-details-sticky.html'><span class='menu-text'>Sticky Details</span></a></li>
												<li><a href='product-details-sidebar.html'><span class='menu-text'>Width Sidebar</span></a></li>
												<li><a href='product-details-extra-content.html'><span class='menu-text'>Extra Content</span></a></li>
												<li><a href='product-details-image-variation.html'><span class='menu-text'>Variations Images</span></a></li>
												<li><a href='product-details-group.html'><span class='menu-text'>Bought Together</span></a></li>
												<li><a href='product-details-360.html'><span class='menu-text'>Product 360</span></a></li>
											</ul>
										</li>
										<li>
											<a href='#' class='mega-menu-title'><span class='menu-text'>PRODUCT & Other PAGES</span></a>
											<ul>
												<li><a href='product-details-background.html'><span class='menu-text'>Product with Background</span></a></li>
												<li><a href='shopping-cart.html'><span class='menu-text'>Shopping Cart</span></a></li>
												<li><a href='checkout.html'><span class='menu-text'>Checkout</span></a></li>
												<li><a href='order-tracking.html'><span class='menu-text'>Order Tracking</span></a></li>
												<li><a href='wishlist.html'><span class='menu-text'>Wishlist</span></a></li>
												<li><a href='login-register.html'><span class='menu-text'>Customer Login</span></a></li>
												<li><a href='my-account.html'><span class='menu-text'>My Account</span></a></li>
												<li><a href='lost-password.html'><span class='menu-text'>Lost Password</span></a></li>
											</ul>
										</li>
										<li class='align-self-center'>
											<a href='#' class='menu-banner'><img src='assets/images/banner/menu-banner-2.webp' alt='Shop Menu Banner'></a>
										</li>
									</ul>
								</li>
								<li class='has-children'><a href='#'><span class='menu-text'>Kinders&nbsp;</span></a>
									<ul class='sub-menu'>
										<li><a href='portfolio-3-columns.html'><span class='menu-text'>Portfolio 3 Columns</span></a></li>
										<li><a href='portfolio-4-columns.html'><span class='menu-text'>Portfolio 4 Columns</span></a></li>
										<li><a href='portfolio-5-columns.html'><span class='menu-text'>Portfolio 5 Columns</span></a></li>
										<li><a href='portfolio-details.html'><span class='menu-text'>Portfolio Details</span></a></li>
									</ul>
								</li>
								<li class='has-children'><a href='#'><span class='menu-text'>Opvoedkundig&nbsp;</span></a>
									<ul class='sub-menu mega-menu'>
										<li>
											<a href='#' class='mega-menu-title'><span class='menu-text'>Column One</span></a>
											<ul>
												<li><a href='elements-products.html'><span class='menu-text'>Product Styles</span></a></li>
												<li><a href='elements-products-tabs.html'><span class='menu-text'>Product Tabs</span></a></li>
												<li><a href='elements-product-sale-banner.html'><span class='menu-text'>Product & Sale Banner</span></a></li>
											</ul>
										</li>
										<li>
											<a href='#' class='mega-menu-title'><span class='menu-text'>Column Two</span></a>
											<ul>
												<li><a href='elements-category-banner.html'><span class='menu-text'>Category Banner</span></a></li>
												<li><a href='elements-team.html'><span class='menu-text'>Team Member</span></a></li>
												<li><a href='elements-testimonials.html'><span class='menu-text'>Testimonials</span></a></li>
											</ul>
										</li>
										<li>
											<a href='#' class='mega-menu-title'><span class='menu-text'>Column Three</span></a>
											<ul>
												<li><a href='elements-instagram.html'><span class='menu-text'>Instagram</span></a></li>
												<li><a href='elements-map.html'><span class='menu-text'>Google Map</span></a></li>
												<li><a href='elements-icon-box.html'><span class='menu-text'>Icon Box</span></a></li>
											</ul>
										</li>
										<li>
											<a href='#' class='mega-menu-title'><span class='menu-text'>Column Four</span></a>
											<ul>
												<li><a href='elements-buttons.html'><span class='menu-text'>Buttons</span></a></li>
												<li><a href='elements-faq.html'><span class='menu-text'>FAQs / Toggles</span></a></li>
												<li><a href='elements-brands.html'><span class='menu-text'>Brands</span></a></li>
											</ul>
										</li>
									</ul>
								</li>
								<li class='has-children'><a href='#'><span class='menu-text'>Christelik&nbsp;</span></a>
									<ul class='sub-menu'>
										<li class='has-children'><a href='blog-right-sidebar.html'><span class='menu-text'>Standard Layout</span></a>
											<ul class='sub-menu'>
												<li><a href='blog-right-sidebar.html'><span class='menu-text'>Right Sidebar</span></a></li>
												<li><a href='blog-left-sidebar.html'><span class='menu-text'>Left Sidebar</span></a></li>
												<li><a href='blog-fullwidth.html'><span class='menu-text'>Full Width</span></a></li>
											</ul>
										</li>
										<li class='has-children'><a href='blog-grid-right-sidebar.html'><span class='menu-text'>Grid Layout</span></a>
											<ul class='sub-menu'>
												<li><a href='blog-grid-right-sidebar.html'><span class='menu-text'>Right Sidebar</span></a></li>
												<li><a href='blog-grid-left-sidebar.html'><span class='menu-text'>Left Sidebar</span></a></li>
												<li><a href='blog-grid-fullwidth.html'><span class='menu-text'>Full Width</span></a></li>
											</ul>
										</li>
										<li class='has-children'><a href='blog-list-right-sidebar.html'><span class='menu-text'>List Layout</span></a>
											<ul class='sub-menu'>
												<li><a href='blog-list-right-sidebar.html'><span class='menu-text'>Right Sidebar</span></a></li>
												<li><a href='blog-list-left-sidebar.html'><span class='menu-text'>Left Sidebar</span></a></li>
												<li><a href='blog-list-fullwidth.html'><span class='menu-text'>Full Width</span></a></li>
											</ul>
										</li>
										<li class='has-children'><a href='blog-masonry-right-sidebar.html'><span class='menu-text'>Masonry Layout</span></a>
											<ul class='sub-menu'>
												<li><a href='blog-masonry-right-sidebar.html'><span class='menu-text'>Right Sidebar</span></a></li>
												<li><a href='blog-masonry-left-sidebar.html'><span class='menu-text'>Left Sidebar</span></a></li>
												<li><a href='blog-masonry-fullwidth.html'><span class='menu-text'>Full Width</span></a></li>
											</ul>
										</li>
										<li class='has-children'><a href='blog-details-right-sidebar.html'><span class='menu-text'>Single Post Layout</span></a>
											<ul class='sub-menu'>
												<li><a href='blog-details-right-sidebar.html'><span class='menu-text'>Right Sidebar</span></a></li>
												<li><a href='blog-details-left-sidebar.html'><span class='menu-text'>Left Sidebar</span></a></li>
												<li><a href='blog-details-fullwidth.html'><span class='menu-text'>Full Width</span></a></li>
											</ul>
										</li>
									</ul>
								</li>
								<li class='has-children'><a href='#'><span class='menu-text'>Geskenke&nbsp;</span></a>
									<ul class='sub-menu'>
										<li><a href='about-us.html'><span class='menu-text'>About us</span></a></li>
										<li><a href='about-us-2.html'><span class='menu-text'>About us 02</span></a></li>
										<li><a href='contact-us.html'><span class='menu-text'>Contact us</span></a></li>
										<li><a href='coming-soon.html'><span class='menu-text'>Coming Soon</span></a></li>
										<li><a href='404.html'><span class='menu-text'>Page 404</span></a></li>
									</ul>
								</li>
							</ul>
						</nav>
					</div>
					<!-- Search End -->
	
					<!-- Header Tools Start -->
					<div class='col-auto'>
						<div class='header-tools justify-content-end'>
							<div class='header-login'>
								<a href='my-account.html'><i class='far fa-user'></i></a>
							</div>
							<div class='header-search d-none d-sm-block'>
								<a href='#offcanvas-search' class='offcanvas-toggle'><i class='fas fa-search'></i></a>
							</div>
							<div class='header-wishlist'>
								<a href='#offcanvas-wishlist' class='offcanvas-toggle'><span class='wishlist-count'>3</span><i class='far fa-heart'></i></a>
							</div>
							<div class='header-cart'>
								<a href='#offcanvas-cart' class='offcanvas-toggle'><span class='cart-count'>3</span><i class='fas fa-shopping-cart'></i></a>
							</div>
							<div class='mobile-menu-toggle d-xl-none'>
								<a href='#offcanvas-mobile-menu' class='offcanvas-toggle'>
									<svg viewBox='0 0 800 600'>
										<path d='M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200' class='top'></path>
										<path d='M300,320 L540,320' class='middle'></path>
										<path d='M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190' class='bottom' transform='translate(480, 320) scale(1, -1) translate(-480, -318) '></path>
									</svg>
								</a>
							</div>
						</div>
					</div>
					<!-- Header Tools End -->
	
				</div>
			</div>
	
		</div>
		<!-- Header Sticky Section End -->
		<!-- Mobile Header Section Start -->
		<div class='mobile-header bg-white section d-xl-none'>
			<div class='container'>
				<div class='row align-items-center'>
	
					<!-- Header Logo Start -->
					<div class='col'>
						<div class='header-logo'>
							<a href='index.html'><img src='assets/images/logo/logo_s.png' alt='Learts Logo'></a>
						</div>
					</div>
					<!-- Header Logo End -->
	
					<!-- Header Tools Start -->
					<div class='col-auto'>
						<div class='header-tools justify-content-end'>
							<div class='header-login d-none d-sm-block'>
								<a href='my-account.html'><i class='far fa-user'></i></a>
							</div>
							<div class='header-search d-none d-sm-block'>
								<a href='#offcanvas-search' class='offcanvas-toggle'><i class='fas fa-search'></i></a>
							</div>
							<div class='header-wishlist d-none d-sm-block'>
								<a href='#offcanvas-wishlist' class='offcanvas-toggle'><span class='wishlist-count'>3</span><i class='far fa-heart'></i></a>
							</div>
							<div class='header-cart'>
								<a href='#offcanvas-cart' class='offcanvas-toggle'><span class='cart-count'>3</span><i class='fas fa-shopping-cart'></i></a>
							</div>
							<div class='mobile-menu-toggle'>
								<a href='#offcanvas-mobile-menu' class='offcanvas-toggle'>
									<svg viewBox='0 0 800 600'>
										<path d='M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200' class='top'></path>
										<path d='M300,320 L540,320' class='middle'></path>
										<path d='M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190' class='bottom' transform='translate(480, 320) scale(1, -1) translate(-480, -318) '></path>
									</svg>
								</a>
							</div>
						</div>
					</div>
					<!-- Header Tools End -->
	
				</div>
			</div>
		</div>
		<!-- Mobile Header Section End -->";
	return $vString;
	}

	public function getOffCanvas(){
		$vString = "<!-- OffCanvas Search Start -->
			<div id='offcanvas-search' class='offcanvas offcanvas-search w-50'>
				<div class='inner'>
					<div class='offcanvas-search-form'>
						<button class='offcanvas-close'>×</button>
						<form action='#'>
							<div class='row mb-n3'>
								<div class='col-lg-10 col-12 mb-3 d-inline-flex'><input type='text' placeholder='Search...'><button class='btn'><i class='fas fa-search'></i></button></div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- OffCanvas Search End -->
		
			<!-- OffCanvas Wishlist Start -->
			<div id='offcanvas-wishlist' class='offcanvas offcanvas-wishlist'>
				<div class='inner'>
					<div class='head'>
						<span class='title'>Wishlist</span>
						<button class='offcanvas-close'>×</button>
					</div>
					<div class='body customScroll'>
						<ul class='minicart-product-list'>
							<li>
								<a href='product-details.html' class='image'><img src='assets/images/product/cart-product-1.webp' alt='Cart product Image'></a>
								<div class='content'>
									<a href='product-details.html' class='title'>Walnut Cutting Board</a>
									<span class='quantity-price'>1 x <span class='amount'>$100.00</span></span>
									<a href='#' class='remove'>×</a>
								</div>
							</li>
							<li>
								<a href='product-details.html' class='image'><img src='assets/images/product/cart-product-2.webp' alt='Cart product Image'></a>
								<div class='content'>
									<a href='product-details.html' class='title'>Lucky Wooden Elephant</a>
									<span class='quantity-price'>1 x <span class='amount'>$35.00</span></span>
									<a href='#' class='remove'>×</a>
								</div>
							</li>
							<li>
								<a href='product-details.html' class='image'><img src='assets/images/product/cart-product-3.webp' alt='Cart product Image'></a>
								<div class='content'>
									<a href='product-details.html' class='title'>Fish Cut Out Set</a>
									<span class='quantity-price'>1 x <span class='amount'>$9.00</span></span>
									<a href='#' class='remove'>×</a>
								</div>
							</li>
						</ul>
					</div>
					<div class='foot'>
						<div class='buttons'>
							<a href='wishlist.html' class='btn btn-dark btn-hover-primary'>view wishlist</a>
						</div>
					</div>
				</div>
			</div>
			<!-- OffCanvas Wishlist End -->
		
			<!-- OffCanvas Cart Start -->
			<div id='offcanvas-cart' class='offcanvas offcanvas-cart'>
				<div class='inner'>
					<div class='head'>
						<span class='title'>Cart</span>
						<button class='offcanvas-close'>×</button>
					</div>
					<div class='body customScroll'>
						<ul class='minicart-product-list'>
							<li>
								<a href='product-details.html' class='image'><img src='assets/images/product/cart-product-1.webp' alt='Cart product Image'></a>
								<div class='content'>
									<a href='product-details.html' class='title'>Walnut Cutting Board</a>
									<span class='quantity-price'>1 x <span class='amount'>$100.00</span></span>
									<a href='#' class='remove'>×</a>
								</div>
							</li>
							<li>
								<a href='product-details.html' class='image'><img src='assets/images/product/cart-product-2.webp' alt='Cart product Image'></a>
								<div class='content'>
									<a href='product-details.html' class='title'>Lucky Wooden Elephant</a>
									<span class='quantity-price'>1 x <span class='amount'>$35.00</span></span>
									<a href='#' class='remove'>×</a>
								</div>
							</li>
							<li>
								<a href='product-details.html' class='image'><img src='assets/images/product/cart-product-3.webp' alt='Cart product Image'></a>
								<div class='content'>
									<a href='product-details.html' class='title'>Fish Cut Out Set</a>
									<span class='quantity-price'>1 x <span class='amount'>$9.00</span></span>
									<a href='#' class='remove'>×</a>
								</div>
							</li>
						</ul>
					</div>
					<div class='foot'>
						<div class='sub-total'>
							<strong>Subtotal :</strong>
							<span class='amount'>$144.00</span>
						</div>
						<div class='buttons'>
							<a href='shopping-cart.html' class='btn btn-dark btn-hover-primary'>view cart</a>
							<a href='checkout.html' class='btn btn-outline-dark'>checkout</a>
						</div>
						<p class='minicart-message'>Free Shipping on All Orders Over $100!</p>
					</div>
				</div>
			</div>
			<!-- OffCanvas Cart End -->
		
			<!-- OffCanvas Search Start -->
			<div id='offcanvas-mobile-menu' class='offcanvas offcanvas-mobile-menu'>
				<div class='inner customScroll'>
					<div class='offcanvas-menu-search-form'>
						<form action='#'>
							<input type='text' placeholder='Search...'>
							<button><i class='fas fa-search'></i></button>
						</form>
					</div>
					<div class='offcanvas-menu'>
						<ul>
							<li><a href='#'><span class='menu-text'>Home</span></a>
								<ul class='sub-menu'>
									<li>
										<a href='#'><span class='menu-text'>Home Group</span></a>
										<ul class='sub-menu'>
											<li><a href='index.html'><span class='menu-text'>Arts Propelled</span></a></li>
											<li><a href='index-2.html'><span class='menu-text'>Decor Thriving</span></a></li>
											<li><a href='index-3.html'><span class='menu-text'>Savvy Delight</span></a></li>
											<li><a href='index-4.html'><span class='menu-text'>Perfect Escapes</span></a></li>
										</ul>
									</li>
									<li>
										<a href='#'><span class='menu-text'>Home Group</span></a>
										<ul class='sub-menu'>
											<li><a href='index-5.html'><span class='menu-text'>Kitchen Cozy</span></a></li>
											<li><a href='index-6.html'><span class='menu-text'>Dreamy Designs</span></a></li>
											<li><a href='index-7.html'><span class='menu-text'>Crispy Recipes</span></a></li>
											<li><a href='index-8.html'><span class='menu-text'>Decoholic Chic</span></a></li>
										</ul>
									</li>
									<li>
										<a href='#'><span class='menu-text'>Home Group</span></a>
										<ul class='sub-menu'>
											<li><a href='index-9.html'><span class='menu-text'>Reblended Dish</span></a></li>
											<li><a href='index-10.html'><span class='menu-text'>Craftin House</span></a></li>
											<li><a href='index-11.html'><span class='menu-text'>Craftswork Biz</span></a></li>
										</ul>
									</li>
								</ul>
							</li>
							<li><a href='#'><span class='menu-text'>Shop</span></a>
								<ul class='sub-menu'>
									<li>
										<a href='#'><span class='menu-text'>Shop Pages</span></a>
										<ul class='sub-menu'>
											<li><a href='shop.html'><span class='menu-text'>Shop No Sidebar</span></a></li>
											<li><a href='shop-left-sidebar.html'><span class='menu-text'>Shop Left Sidebar</span></a></li>
											<li><a href='shop-right-sidebar.html'><span class='menu-text'>Shop Right Sidebar</span></a></li>
											<li><a href='shop-fullwidth-no-gutters.html'><span class='menu-text'>Shop Fullwidth No Space</span></a></li>
											<li><a href='shop-fullwidth.html'><span class='menu-text'>Shop Fullwidth No Sidebar</span></a></li>
											<li><a href='shop-fullwidth-left-sidebar.html'><span class='menu-text'>Shop Fullwidth Left Sidebar</span></a></li>
											<li><a href='shop-fullwidth-right-sidebar.html'><span class='menu-text'>Shop Fullwidth Right Sidebar</span></a></li>
										</ul>
									</li>
									<li>
										<a href='#'><span class='menu-text'>Product Pages</span></a>
										<ul class='sub-menu'>
											<li><a href='product-details.html'><span class='menu-text'>Basic</span></a></li>
											<li><a href='product-details-fullwidth.html'><span class='menu-text'>Fullwidth</span></a></li>
											<li><a href='product-details-sticky.html'><span class='menu-text'>Sticky Details</span></a></li>
											<li><a href='product-details-sidebar.html'><span class='menu-text'>Width Sidebar</span></a></li>
											<li><a href='product-details-extra-content.html'><span class='menu-text'>Extra Content</span></a></li>
											<li><a href='product-details-image-variation.html'><span class='menu-text'>Variations Images</span></a></li>
											<li><a href='product-details-group.html'><span class='menu-text'>Bought Together</span></a></li>
											<li><a href='product-details-360.html'><span class='menu-text'>Product 360</span></a></li>
											<li><a href='product-details-background.html'><span class='menu-text'>Product with Background</span></a></li>
										</ul>
									</li>
									<li>
										<a href='#' class='mega-menu-title'><span class='menu-text'>PRODUCT & Other PAGES</span></a>
										<ul class='sub-menu'>
											<li><a href='shopping-cart.html'><span class='menu-text'>Shopping Cart</span></a></li>
											<li><a href='checkout.html'><span class='menu-text'>Checkout</span></a></li>
											<li><a href='order-tracking.html'><span class='menu-text'>Order Tracking</span></a></li>
											<li><a href='wishlist.html'><span class='menu-text'>Wishlist</span></a></li>
											<li><a href='login-register.html'><span class='menu-text'>Customer Login</span></a></li>
											<li><a href='my-account.html'><span class='menu-text'>My Account</span></a></li>
											<li><a href='lost-password.html'><span class='menu-text'>Lost Password</span></a></li>
										</ul>
									</li>
								</ul>
							</li>
							<li><a href='#'><span class='menu-text'>Project</span></a>
								<ul class='sub-menu'>
									<li><a href='portfolio-3-columns.html'><span class='menu-text'>Portfolio 3 Columns</span></a></li>
									<li><a href='portfolio-4-columns.html'><span class='menu-text'>Portfolio 4 Columns</span></a></li>
									<li><a href='portfolio-5-columns.html'><span class='menu-text'>Portfolio 5 Columns</span></a></li>
									<li><a href='portfolio-details.html'><span class='menu-text'>Portfolio Details</span></a></li>
								</ul>
							</li>
							<li><a href='#'><span class='menu-text'>Elements</span></a>
								<ul class='sub-menu'>
									<li>
										<a href='#' class='mega-menu-title'><span class='menu-text'>Column One</span></a>
										<ul class='sub-menu'>
											<li><a href='elements-products.html'><span class='menu-text'>Product Styles</span></a></li>
											<li><a href='elements-products-tabs.html'><span class='menu-text'>Product Tabs</span></a></li>
											<li><a href='elements-product-sale-banner.html'><span class='menu-text'>Product & Sale Banner</span></a></li>
										</ul>
									</li>
									<li>
										<a href='#' class='mega-menu-title'><span class='menu-text'>Column Two</span></a>
										<ul class='sub-menu'>
											<li><a href='elements-category-banner.html'><span class='menu-text'>Category Banner</span></a></li>
											<li><a href='elements-team.html'><span class='menu-text'>Team Member</span></a></li>
											<li><a href='elements-testimonials.html'><span class='menu-text'>Testimonials</span></a></li>
										</ul>
									</li>
									<li>
										<a href='#' class='mega-menu-title'><span class='menu-text'>Column Three</span></a>
										<ul class='sub-menu'>
											<li><a href='elements-instagram.html'><span class='menu-text'>Instagram</span></a></li>
											<li><a href='elements-map.html'><span class='menu-text'>Google Map</span></a></li>
											<li><a href='elements-icon-box.html'><span class='menu-text'>Icon Box</span></a></li>
										</ul>
									</li>
									<li>
										<a href='#' class='mega-menu-title'><span class='menu-text'>Column Four</span></a>
										<ul class='sub-menu'>
											<li><a href='elements-buttons.html'><span class='menu-text'>Buttons</span></a></li>
											<li><a href='elements-faq.html'><span class='menu-text'>FAQs / Toggles</span></a></li>
											<li><a href='elements-brands.html'><span class='menu-text'>Brands</span></a></li>
										</ul>
									</li>
								</ul>
							</li>
							<li><a href='#'><span class='menu-text'>Blog</span></a>
								<ul class='sub-menu'>
									<li><a href='#'><span class='menu-text'>Standard Layout</span></a>
										<ul class='sub-menu'>
											<li><a href='blog-right-sidebar.html'><span class='menu-text'>Right Sidebar</span></a></li>
											<li><a href='blog-left-sidebar.html'><span class='menu-text'>Left Sidebar</span></a></li>
											<li><a href='blog-fullwidth.html'><span class='menu-text'>Full Width</span></a></li>
										</ul>
									</li>
									<li><a href='#'><span class='menu-text'>Grid Layout</span></a>
										<ul class='sub-menu'>
											<li><a href='blog-grid-right-sidebar.html'><span class='menu-text'>Right Sidebar</span></a></li>
											<li><a href='blog-grid-left-sidebar.html'><span class='menu-text'>Left Sidebar</span></a></li>
											<li><a href='blog-grid-fullwidth.html'><span class='menu-text'>Full Width</span></a></li>
										</ul>
									</li>
									<li><a href='#'><span class='menu-text'>List Layout</span></a>
										<ul class='sub-menu'>
											<li><a href='blog-list-right-sidebar.html'><span class='menu-text'>Right Sidebar</span></a></li>
											<li><a href='blog-list-left-sidebar.html'><span class='menu-text'>Left Sidebar</span></a></li>
											<li><a href='blog-list-fullwidth.html'><span class='menu-text'>Full Width</span></a></li>
										</ul>
									</li>
									<li><a href='#'><span class='menu-text'>Masonry Layout</span></a>
										<ul class='sub-menu'>
											<li><a href='blog-masonry-right-sidebar.html'><span class='menu-text'>Right Sidebar</span></a></li>
											<li><a href='blog-masonry-left-sidebar.html'><span class='menu-text'>Left Sidebar</span></a></li>
											<li><a href='blog-masonry-fullwidth.html'><span class='menu-text'>Full Width</span></a></li>
										</ul>
									</li>
									<li><a href='#'><span class='menu-text'>Single Post Layout</span></a>
										<ul class='sub-menu'>
											<li><a href='blog-details-right-sidebar.html'><span class='menu-text'>Right Sidebar</span></a></li>
											<li><a href='blog-details-left-sidebar.html'><span class='menu-text'>Left Sidebar</span></a></li>
											<li><a href='blog-details-fullwidth.html'><span class='menu-text'>Full Width</span></a></li>
										</ul>
									</li>
								</ul>
							</li>
							<li><a href='#'><span class='menu-text'>Pages</span></a>
								<ul class='sub-menu'>
									<li><a href='about-us.html'><span class='menu-text'>About us</span></a></li>
									<li><a href='about-us-2.html'><span class='menu-text'>About us 02</span></a></li>
									<li><a href='contact-us.html'><span class='menu-text'>Contact us</span></a></li>
									<li><a href='coming-soon.html'><span class='menu-text'>Coming Soon</span></a></li>
									<li><a href='404.html'><span class='menu-text'>Page 404</span></a></li>
								</ul>
							</li>
						</ul>
					</div>
					<div class='offcanvas-buttons'>
						<div class='header-tools'>
							<div class='header-login'>
								<a href='my-account.html'><i class='far fa-user'></i></a>
							</div>
							<div class='header-wishlist'>
								<a href='wishlist.html'><span>3</span><i class='far fa-heart'></i></a>
							</div>
							<div class='header-cart'>
								<a href='shopping-cart.html'><span class='cart-count'>3</span><i class='fas fa-shopping-cart'></i></a>
							</div>
						</div>
					</div>
					<div class='offcanvas-social'>
						<a href='#'><i class='fab fa-facebook-f'></i></a>
						<a href='#'><i class='fab fa-twitter'></i></a>
						<a href='#'><i class='fab fa-instagram'></i></a>
						<a href='#'><i class='fab fa-youtube'></i></a>
					</div>
				</div>
			</div>
			<!-- OffCanvas Search End -->
		
			<div class='offcanvas-overlay'></div>";
		return $vString;
	}

	public function getCarousel(){
		$vString = "    <!-- Carousel Start   -->
			<div class='home1-slider swiper-container'>
				<div id='carouselExampleControls' class='carousel slide' data-bs-ride='carousel'>
					<div class='carousel-inner'>
						<div class='carousel-item active'>
							<img class='d-block w-100' src='assets/images/slider/65292ff1ac270/dieper.jpeg' alt='First slide'>
						</div>
						<div class='carousel-item'>
						<img class='d-block w-100' src='assets/images/slider/123456789/deon_s.jpeg' alt='Second slide'>
						</div>
					</div>
					<a class='carousel-control-prev' href='#carouselExampleControls' role='button' data-bs-slide='prev'>
						<span class='carousel-control-prev-icon' aria-hidden='true'></span>
						<span class='sr-only'>Previous</span>
					</a>
					<a class='carousel-control-next' href='#carouselExampleControls' role='button' data-bs-slide='next'>
						<span class='carousel-control-next-icon' aria-hidden='true'></span>
						<span class='sr-only'>Next</span>
					</a>
				</div>
			</div>
			<!-- Carousel END   -->";
		return $vString;
	}

	public function getTopSections($vType, $vSelectLanguage){

//		Topverkopers | Bestsellers
//		$_SESSION['graf_client']['language'];
		$vOutOfPrint = 0;
		$vLimit = 'LIMIT 6';
		$vSelectLanguage = (isset($vSelectLanguage) && $vSelectLanguage != 'all' ? $vSelectLanguage : $_SESSION['graf_client']['language']);
		if($vType == 209){
			$vCondition = 'WHERE b.out_of_print = ? and b.top_seller = ? and b.language = ? and (b.category != 4 and b.category != 5 and b.category != 8 and b.category != 9 and b.category != 7 AND b.category != 6)';
            $vValue = 1;
            $vParams = array(&$vOutOfPrint, &$vValue, &$vSelectLanguage);
			$vOrder = " ORDER BY top_seller_rank ASC, date_publish DESC";
		}
//		Topverkoper kinders
		else if($vType == 447){
			$vCondition = 'WHERE b.out_of_print = ? and b.top_seller = ? and (b.category = 4 or b.category = 5 or b.category = 8 or b.category = 9 or b.category = 7 or b.category = 6)';
            $vValue = 1;
            $vParams = array(&$vOutOfPrint, &$vValue);
			$vOrder = " ORDER BY top_seller_rank ASC, date_publish DESC";
		}

		$vBookResults = $this->booksModelObj->getBooks($vCondition, $vParams, $vOrder, $vLimit);

		$vString = "<div class='section-title text-center pt-5 border-top'>
			<h2 class='title title-icon-both'>".$this->commonModelObj->getText(510, $vSelectLanguage) /*Ons*/." ".$this->commonModelObj->getText($vType, $vSelectLanguage)."</h2>
		</div>
		
		<div class='products row row-cols-xl-6 row-cols-lg-6 row-cols-md-3 row-cols-sm-2 row-cols-2 mb-1'>";
			foreach ($vBookResults as $book) {
				$vString .= "<div class='col'>
					<div class='product'>
						<div class='product-thumb hintT-middle' data-hint='".$this->commonModelObj->getText(511, $vSelectLanguage)/*Lees meer*/."'>
							<a href='".$this->commonModelObj->getText(432, $vSelectLanguage) /*Boek*/."/".$_SESSION['graf_client']['language']."/".$book['id']."/".$book['title']."' class='image'>
								<span class='product-badges'>
									<span class='top-sell'>".$book['top_seller_rank']."</span>
									<span class='discount'>";
									$this->booksModelObj->getBookPrice($book);
									$vString .= "</span>
								</span>
								<img src='assets/images/books/1.jpg' alt='Product Image'>
							</a>
						</div>
						<div class='product-info'>
							<h6 class='title'><a href='product-details.html'>Boho Beard Mug</a></h6>
							<span class='price'>
								<span class='old'>$45.00</span>
							<span class='new'>$39.00</span>
							</span>
							<div class='product-buttons'>
								<a href='#quickViewModal' data-bs-toggle='modal' class='product-button hintT-top' data-hint='Quick View'><i class='fas fa-search'></i></a>
								<a href='#' class='product-button hintT-top' data-hint='Add to Cart'><i class='fas fa-shopping-cart'></i></a>
								<a href='#' class='product-button hintT-top' data-hint='Compare'><i class='fas fa-random'></i></a>
							</div>
						</div>
					</div>
				</div>";
			}

$vString .= "
		<div class='row row-cols-12 text-end pb-3'>
			<div class='col'>
				<a href='http://DDEWRTE' class='l-more fw-normal font-monospace'>Meer Topverkopers</a>
			</div>
		</div>
				<!-- Topverkopers End-->
	
				<!-- Bestsellers Title Start -->
				<div class='section-title text-center pt-5 border-top'>
					<h2 class='title title-icon-both'>Our Bestsellers</h2>
				</div>
				<!-- Bestsellers Title End -->
	
				<!-- Bestsellers Start -->
				<div class='products row row-cols-xl-6 row-cols-lg-6 row-cols-md-3 row-cols-sm-2 row-cols-2 mb-1'>
					<div class='col'>
						<div class='product'>
							<div class='product-thumb hintT-middle' data-hint='Open book detail'>
								<a href='product-details.html' class='image'>
									<span class='product-badges'>
										<span class='discount'>-10%</span>
									</span>
									<img src='assets/images/books/7.jpg' alt='Product Image'>
								</a>
							</div>
							<div class='product-info'>
								<h6 class='title'><a href='product-details.html'>Lucky Wooden Elephant</a></h6>
								<span class='price'>
									$35.00
								</span>
								<div class='product-buttons'>
									<a href='#quickViewModal' data-bs-toggle='modal' class='product-button hintT-top' data-hint='Quick View'><i class='fas fa-search'></i></a>
									<a href='#' class='product-button hintT-top' data-hint='Add to Cart'><i class='fas fa-shopping-cart'></i></a>
									<a href='#' class='product-button hintT-top' data-hint='Compare'><i class='fas fa-random'></i></a>
								</div>
							</div>
						</div>
					</div>
	
					<div class='col'>
						<div class='product'>
							<div class='product-thumb hintT-middle' data-hint='Open book detail'>
								<a href='product-details.html' class='image'>
									<span class='product-badges'>
										<span class='outofstock'><i class='far fa-frown'></i></span>
									</span>
									<img src='assets/images/books/8.jpg' alt='Product Image'>
								</a>
							</div>
							<div class='product-info'>
								<h6 class='title'><a href='product-details.html'>Decorative Christmas Fox</a></h6>
								<span class='price'>
									$50.00
								</span>
								<div class='product-buttons'>
									<a href='#quickViewModal' data-bs-toggle='modal' class='product-button hintT-top' data-hint='Quick View'><i class='fas fa-search'></i></a>
									<a href='#' class='product-button hintT-top' data-hint='Add to Cart'><i class='fas fa-shopping-cart'></i></a>
									<a href='#' class='product-button hintT-top' data-hint='Compare'><i class='fas fa-random'></i></a>
								</div>
							</div>
						</div>
					</div>
	
					<div class='col'>
						<div class='product'>
							<div class='product-thumb hintT-middle' data-hint='Open book detail'>
								<a href='product-details.html' class='image'>
									<img src='assets/images/books/9.jpg' alt='Product Image'>
								</a>
							</div>
							<div class='product-info'>
								<h6 class='title'><a href='product-details.html'>Aluminum Equestrian</a></h6>
								<span class='price'>
									$100.00
								</span>
								<div class='product-buttons'>
									<a href='#quickViewModal' data-bs-toggle='modal' class='product-button hintT-top' data-hint='Quick View'><i class='fas fa-search'></i></a>
									<a href='#' class='product-button hintT-top' data-hint='Add to Cart'><i class='fas fa-shopping-cart'></i></a>
									<a href='#' class='product-button hintT-top' data-hint='Compare'><i class='fas fa-random'></i></a>
								</div>
							</div>
						</div>
					</div>
	
					<div class='col'>
						<div class='product'>
							<div class='product-thumb hintT-middle' data-hint='Open book detail'>
								<a href='product-details.html' class='image'>
									<img src='assets/images/books/11.jpg' alt='Product Image'>
								</a>
							</div>
							<div class='product-info'>
								<h6 class='title'><a href='product-details.html'>Fish Cut Out Set</a></h6>
								<span class='price'>
									$9.00
								</span>
								<div class='product-buttons'>
									<a href='#quickViewModal' data-bs-toggle='modal' class='product-button hintT-top' data-hint='Quick View'><i class='fas fa-search'></i></a>
									<a href='#' class='product-button hintT-top' data-hint='Add to Cart'><i class='fas fa-shopping-cart'></i></a>
									<a href='#' class='product-button hintT-top' data-hint='Compare'><i class='fas fa-random'></i></a>
								</div>
							</div>
						</div>
					</div>
	
					<div class='col'>
						<div class='product'>
							<div class='product-thumb hintT-middle' data-hint='Open book detail'>
								<a href='product-details.html' class='image'>
									<img src='assets/images/books/22.png' alt='Product Image'>
								</a>
							</div>
							<div class='product-info'>
								<h6 class='title'><a href='product-details.html'>Electric Egg Blender</a></h6>
								<span class='price'>
									$200.00
								</span>
								<div class='product-buttons'>
									<a href='#quickViewModal' data-bs-toggle='modal' class='product-button hintT-top' data-hint='Quick View'><i class='fas fa-search'></i></a>
									<a href='#' class='product-button hintT-top' data-hint='Add to Cart'><i class='fas fa-shopping-cart'></i></a>
									<a href='#' class='product-button hintT-top' data-hint='Compare'><i class='fas fa-random'></i></a>
								</div>
							</div>
						</div>
					</div>
	
					<div class='col'>
						<div class='product'>
							<div class='product-thumb hintT-middle' data-hint='Open book detail'>
								<a href='product-details.html' class='image'>
									<img src='assets/images/books/33.jpg' alt='Product Image'>
								</a>
							</div>
							<div class='product-info'>
								<h6 class='title'><a href='product-details.html'>Electric Egg Blender</a></h6>
								<span class='price'>
									$200.00
								</span>
								<div class='product-buttons'>
									<a href='#quickViewModal' data-bs-toggle='modal' class='product-button hintT-top' data-hint='Quick View'><i class='fas fa-search'></i></a>
									<a href='#' class='product-button hintT-top' data-hint='Add to Cart'><i class='fas fa-shopping-cart'></i></a>
									<a href='#' class='product-button hintT-top' data-hint='Compare'><i class='fas fa-random'></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
	
				<div class='row row-cols-12 text-end pb-3'>
					<div class='col'>
						<a href='http://DDEWRTE' class='l-more fw-normal font-monospace'>Meer Bestsellers</a>
					</div>
				</div>
				<!-- Bestsellers End -->
	
				<!-- Topverkopers Kinders Title Start -->
				<div class='section-title text-center pt-5 border-top'>
					<h2 class='title title-icon-both'>Topverkoper Kinders</h2>
				</div>
				<!-- Topverkopers Kinders Title End -->
	
				<!-- Topverkopers Kinders Start -->
				<div class='products row row-cols-xl-6 row-cols-lg-6 row-cols-md-3 row-cols-sm-2 row-cols-2 mb-1'>
					<div class='col'>
						<div class='product'>
							<div class='product-thumb hintT-middle' data-hint='Open book detail'>
								<a href='product-details.html' class='image'>
									<span class='product-badges'>
										<span class='discount'>-10%</span>
									</span>
									<img src='assets/images/books/44.jpg' alt='Product Image'>
								</a>
							</div>
							<div class='product-info'>
								<h6 class='title'><a href='product-details.html'>Lucky Wooden Elephant</a></h6>
								<span class='price'>
									$35.00
								</span>
								<div class='product-buttons'>
									<a href='#quickViewModal' data-bs-toggle='modal' class='product-button hintT-top' data-hint='Quick View'><i class='fas fa-search'></i></a>
									<a href='#' class='product-button hintT-top' data-hint='Add to Cart'><i class='fas fa-shopping-cart'></i></a>
									<a href='#' class='product-button hintT-top' data-hint='Compare'><i class='fas fa-random'></i></a>
								</div>
							</div>
						</div>
					</div>
	
					<div class='col'>
						<div class='product'>
							<div class='product-thumb hintT-middle' data-hint='Open book detail'>
								<a href='product-details.html' class='image'>
									<span class='product-badges'>
										<span class='outofstock'><i class='far fa-frown'></i></span>
										<span class='discount'>-20%</span>
									</span>
									<img src='assets/images/books/55.jpeg' alt='Product Image'>
								</a>
							</div>
							<div class='product-info'>
								<h6 class='title'><a href='product-details.html'>Decorative Christmas Fox</a></h6>
								<span class='price'>
									$50.00
								</span>
								<div class='product-buttons'>
									<a href='#quickViewModal' data-bs-toggle='modal' class='product-button hintT-top' data-hint='Quick View'><i class='fas fa-search'></i></a>
									<a href='#' class='product-button hintT-top' data-hint='Add to Cart'><i class='fas fa-shopping-cart'></i></a>
									<a href='#' class='product-button hintT-top' data-hint='Compare'><i class='fas fa-random'></i></a>
								</div>
							</div>
						</div>
					</div>
	
					<div class='col'>
						<div class='product'>
							<div class='product-thumb hintT-middle' data-hint='Open book detail'>
								<a href='product-details.html' class='image'>
									<img src='assets/images/books/66.jpeg' alt='Product Image'>
								</a>
							</div>
							<div class='product-info'>
								<h6 class='title'><a href='product-details.html'>Aluminum Equestrian</a></h6>
								<span class='price'>
									$100.00
								</span>
								<div class='product-buttons'>
									<a href='#quickViewModal' data-bs-toggle='modal' class='product-button hintT-top' data-hint='Quick View'><i class='fas fa-search'></i></a>
									<a href='#' class='product-button hintT-top' data-hint='Add to Cart'><i class='fas fa-shopping-cart'></i></a>
									<a href='#' class='product-button hintT-top' data-hint='Compare'><i class='fas fa-random'></i></a>
								</div>
							</div>
						</div>
					</div>
	
					<div class='col'>
						<div class='product'>
							<div class='product-thumb hintT-middle' data-hint='Open book detail'>
								<a href='product-details.html' class='image'>
									<img src='assets/images/books/77.jpeg' alt='Product Image'>
								</a>
							</div>
							<div class='product-info'>
								<h6 class='title'><a href='product-details.html'>Fish Cut Out Set</a></h6>
								<span class='price'>
									$9.00
								</span>
								<div class='product-buttons'>
									<a href='#quickViewModal' data-bs-toggle='modal' class='product-button hintT-top' data-hint='Quick View'><i class='fas fa-search'></i></a>
									<a href='#' class='product-button hintT-top' data-hint='Add to Cart'><i class='fas fa-shopping-cart'></i></a>
									<a href='#' class='product-button hintT-top' data-hint='Compare'><i class='fas fa-random'></i></a>
								</div>
							</div>
						</div>
					</div>
	
					<div class='col'>
						<div class='product'>
							<div class='product-thumb hintT-middle' data-hint='Open book detail'>
								<a href='product-details.html' class='image'>
									<img src='assets/images/books/55.jpeg' alt='Product Image'>
								</a>
							</div>
							<div class='product-info'>
								<h6 class='title'><a href='product-details.html'>Electric Egg Blender</a></h6>
								<span class='price'>
									$200.00
								</span>
								<div class='product-buttons'>
									<a href='#quickViewModal' data-bs-toggle='modal' class='product-button hintT-top' data-hint='Quick View'><i class='fas fa-search'></i></a>
									<a href='#' class='product-button hintT-top' data-hint='Add to Cart'><i class='fas fa-shopping-cart'></i></a>
									<a href='#' class='product-button hintT-top' data-hint='Compare'><i class='fas fa-random'></i></a>
								</div>
							</div>
						</div>
					</div>
	
					<div class='col'>
						<div class='product'>
							<div class='product-thumb hintT-middle' data-hint='Open book detail'>
								<a href='product-details.html' class='image'>
									<img src='assets/images/books/66.jpeg' alt='Product Image'>
								</a>
							</div>
							<div class='product-info'>
								<h6 class='title'><a href='product-details.html'>Electric Egg Blender</a></h6>
								<span class='price'>
									$200.00
								</span>
								<div class='product-buttons'>
									<a href='#quickViewModal' data-bs-toggle='modal' class='product-button hintT-top' data-hint='Quick View'><i class='fas fa-search'></i></a>
									<a href='#' class='product-button hintT-top' data-hint='Add to Cart'><i class='fas fa-shopping-cart'></i></a>
									<a href='#' class='product-button hintT-top' data-hint='Compare'><i class='fas fa-random'></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
	
				<div class='row row-cols-12 text-end pb-3'>
					<div class='col'>
						<a href='http://DDEWRTE' class='l-more fw-normal font-monospace'>Meer Topverkoper Kinders</a>
					</div>
				</div>
				<!-- Topverkopers Kinders End -->

		";
		return $vString;
	}
}