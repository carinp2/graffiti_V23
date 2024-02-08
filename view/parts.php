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

	public function getHtmlBegin()
	{
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
				<link rel='stylesheet' href='assets/css/plugins/photoswipe.css'>
				<link rel='stylesheet' href='assets/css/plugins/photoswipe-default-skin.css'>				
				<link rel='stylesheet' href='assets/css/plugins/magnific-popup.css'>
				<link rel='stylesheet' href='assets/css/plugins/slick.css'>
			
				<!-- Main Style CSS -->
				 <link rel='stylesheet' href='assets/css/style1.1.css'>
			<!--    <link rel='stylesheet' href='assets/css/style.min.css'>-->
			</head>
				
			<body>";
		return $vString;
	}

	public function getTopBar()
	{
		$vString = "<!-- Topbar Section Start -->
		<div class='topbar-section section bg-primary2'>
			<div class='container'>
				<div class='row justify-content-between align-items-center'>
					<div class='col-md-auto col-12'>
						<p class='text-white text-center text-md-left my-2'>".$this->commonModelObj->getText(471, $_SESSION['graf_client']['language'])./*GRATIS KOERIER AFLEWERING...*/"</p>
					</div>
					<div class='col-auto d-none d-md-block'>
						<div class='topbar-menu'>
							<a href='#' class='text-white'>".$this->commonModelObj->getText(512, $_SESSION['graf_client']['language'])./*Skryf in en wen!*/"</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Topbar Section End -->";
		return $vString;
	}

	public function getHeaderSection()
	{
	$vString = "
	<!-- Header Section Start -->
	<div class='header-section section bg-white d-none d-xl-block'>
		<div class='container'>
			<div class='row row-cols-lg-3 align-items-center'>

				<!-- Header Language & Currency Start -->
				<div class='col'>
					<ul class='header-lan-curr'>";
					if($_SESSION['graf_client']['language'] == 'af') {
						$vString .= "<li><a href='#'>Afrikaans</a>";
						$vString .= "<ul class='curr-lan-sub-menu'>
							<li><a href='#' data-lang='en' class='change-language hintT-right' data-hint='".$this->commonModelObj->getText(513, $_SESSION['graf_client']['language'])./*Verander taal*/"'>
								<i class='fas fa-redo-alt pe-1 font-s text-dgreen'></i>English
							</a></li>
						</ul>";
					}
					else {
						$vString .= "<li><a href='#'>English</a>";
						$vString .= "<ul class='curr-lan-sub-menu'>
							<li><a href='#' data-lang='af' class='change-language hintT-right' data-hint='".$this->commonModelObj->getText(513, $_SESSION['graf_client']['language'])./*Verander taal*/"'>
								<i class='fas fa-redo-alt pe-1 font-s text-dgreen'></i>Afrikaans
							</a></li>
						</ul>";
					}
						$vString .= "</li>
						<li class='header2-search' id='top-search'>
							<form action='#'>
								<input type='text' placeholder='".$this->commonModelObj->getText(14, $_SESSION['graf_client']['language'])./*Soek*/"'><button class='btn'><i class='fas fa-search'></i></button>
							</form>
						</li>
					</ul>
				</div>
				<!-- Header Language & Currency End -->

				<!-- Header Logo Start -->
				<div class='col justify-content-center'>
					<div class='header-logo justify-content-center'>
						<a href='".$this->commonModelObj->getText(203, $_SESSION['graf_client']['language'])./*Tuisblad*/"' class='justify-content-center'><img src='assets/images/logo/logo_rt.png' class='w-50' alt='Graffiti Books'></a>
					</div>
				</div>
				<!-- Header Logo End -->

				<!-- Header Tools Start -->
				<div class='col'>
					<div class='header-tools justify-content-end'>
						<div class='header-login'>
							<a href='profile.php'><i class='far fa-user'></i></a>
						</div>
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
		</div>";
		return $vString;
	}

	public function getSiteMenu($vMenuCategory)
	{
//		$vMenuCategory = $this->booksModelObj->getMenuCategories(array(0,1,1, &$_SESSION['graf_client']['language']));
		$vString = "
		<!-- Site Menu Section Start -->
			<div class='site-menu-section section'>
				<div class='container ps-0 pe-0'>
					<nav class='site-main-menu justify-content-center'>
						<ul class='main-ul'>";
						$vBigArray = array(3,10);
						foreach ($vMenuCategory as $category) {
							$vRelated = explode(",", $category['related']);
							$vAddMenuClass = (in_array($category['id'], $vBigArray) ? 'w-min-180' : 'mega-menu');
							$vString .= "<li class='has-children position-relative'><a href='#'><span class='menu-text'>".$category['category']."</span></a>
								<ul class='sub-menu ".$vAddMenuClass."'>";
								foreach ($vRelated as $r_category) {
									$vParameters = array(1, 0, 1);
									$vMenuSubCategory = $this->booksModelObj->getMenuSubCategories($vParameters, $r_category, '');
									if(in_array($category['id'], $vBigArray)) {
										switch ($category['id']) {
											case 3:
												$v1Array = array('A','B','C');
												$v2Array = array('D','E','F','G','H');
												$v3Array = array('I','J','K','L','M','N','O');
												$v4Array = array('P','Q','R','S','T','U','V','W','X','Y','Z');
												$vString .= "<li class='has-children'><a href='blog-right-sidebar.html'><span class='menu-text'>".$this->commonModelObj->getText(515, $_SESSION['graf_client']['language'])./*Kategorieë*/"&nbsp;&nbsp;A - C</span></a>
													<ul class='sub-menu w-min-500'>";
														foreach ($vMenuSubCategory as $subcategory) {
															$vFirstChar = substr($subcategory['sub_category'], 0, 1);
															if (in_array($vFirstChar, $v1Array)) {
																$vString .= "<li><a href='blog-right-sidebar.html'><span class='menu-text'><i class='fas fa-arrow-right pe-2 font-s'></i>".$subcategory['sub_category']."</span></a></li>";
															}
														}
													$vString .= "</ul>
												</li>";

												$vString .= "<li class='has-children'><a href='blog-right-sidebar.html'><span class='menu-text'>".$this->commonModelObj->getText(515, $_SESSION['graf_client']['language'])./*Kategorieë*/"&nbsp;&nbsp;D - H</span></a>
													<ul class='sub-menu w-min-500'>";
													foreach ($vMenuSubCategory as $subcategory) {
														$vFirstChar = substr($subcategory['sub_category'], 0, 1);
														if (in_array($vFirstChar, $v2Array)) {
															$vString .= "<li><a href='blog-right-sidebar.html'><span class='menu-text'><i class='fas fa-arrow-right pe-2 font-s'></i>".$subcategory['sub_category']."</span></a></li>";
														}
													}
													$vString .= "</ul>
												</li>";

												$vString .= "<li class='has-children'><a href='blog-right-sidebar.html'><span class='menu-text'>".$this->commonModelObj->getText(515, $_SESSION['graf_client']['language'])./*Kategorieë*/"&nbsp;&nbsp;I - O</span></a>
													<ul class='sub-menu w-min-450'>";
													foreach ($vMenuSubCategory as $subcategory) {
														$vFirstChar = substr($subcategory['sub_category'], 0, 1);
														if (in_array($vFirstChar, $v3Array)) {
															$vString .= "<li><a href='blog-right-sidebar.html'><span class='menu-text'><i class='fas fa-arrow-right pe-2 font-s'></i>".$subcategory['sub_category']."</span></a></li>";
														}
													}
													$vString .= "</ul>
												</li>";

												$vString .= "<li class='has-children'><a href='blog-right-sidebar.html'><span class='menu-text'>".$this->commonModelObj->getText(515, $_SESSION['graf_client']['language'])./*Kategorieë*/"&nbsp;&nbsp;P - Z</span></a>
													<ul class='sub-menu w-min-500'>";
													foreach ($vMenuSubCategory as $subcategory) {
														$vFirstChar = substr($subcategory['sub_category'], 0, 1);
														if (in_array($vFirstChar, $v4Array)) {
															$vString .= "<li><a href='blog-right-sidebar.html'><span class='menu-text'><i class='fas fa-arrow-right pe-2 font-s'></i>".$subcategory['sub_category']."</span></a></li>";
														}
													}
													$vString .= "</ul>
												</li>";
											break;
											case 10:
												$v101Array = array('A','B','C','D','E','F');
												$v102Array = array('G','H','I','J','K','L','M');
												$v103Array = array('N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
												$vString .= "<li class='has-children'><a href='blog-right-sidebar.html'><span class='menu-text'>".$this->commonModelObj->getText(515, $_SESSION['graf_client']['language'])./*Kategorieë*/"&nbsp;&nbsp;A - F</span></a>
													<ul class='sub-menu w-min-450'>";
														foreach ($vMenuSubCategory as $subcategory) {
															$vFirstChar = substr($subcategory['sub_category'], 0, 1);
															if (in_array($vFirstChar, $v101Array)) {
																$vString .= "<li><a href='blog-right-sidebar.html'><span class='menu-text'><i class='fas fa-arrow-right pe-2 font-s'></i>".$subcategory['sub_category']."</span></a></li>";
															}
														}
													$vString .= "</ul>
												</li>";

												$vString .= "<li class='has-children'><a href='blog-right-sidebar.html'><span class='menu-text'>".$this->commonModelObj->getText(515, $_SESSION['graf_client']['language'])./*Kategorieë*/"&nbsp;&nbsp;G - M</span></a>
													<ul class='sub-menu w-min-450'>";
													foreach ($vMenuSubCategory as $subcategory) {
														$vFirstChar = substr($subcategory['sub_category'], 0, 1);
														if (in_array($vFirstChar, $v102Array)) {
															$vString .= "<li><a href='blog-right-sidebar.html'><span class='menu-text'><i class='fas fa-arrow-right pe-2 font-s'></i>".$subcategory['sub_category']."</span></a></li>";
														}
													}
													$vString .= "</ul>
												</li>";

												$vString .= "<li class='has-children'><a href='blog-right-sidebar.html'><span class='menu-text'>".$this->commonModelObj->getText(515, $_SESSION['graf_client']['language'])./*Kategorieë*/"&nbsp;&nbsp;N - Z</span></a>
													<ul class='sub-menu w-min-450'>";
													foreach ($vMenuSubCategory as $subcategory) {
														$vFirstChar = substr($subcategory['sub_category'], 0, 1);
														if (in_array($vFirstChar, $v103Array)) {
															$vString .= "<li><a href='blog-right-sidebar.html'><span class='menu-text'><i class='fas fa-arrow-right pe-2 font-s'></i>".$subcategory['sub_category']."</span></a></li>";
														}
													}
													$vString .= "</ul>
												</li>";
											break;
										}
									}
									else {
										$vString .= "<li>
											<ul>";
										foreach ($vMenuSubCategory as $subcategory) {
											$vString .= "<li><a href='elements-products.html'><span class='menu-text'>".$subcategory['sub_category']."</span></a></li>";
										}
										$vString .= "</ul>
										</li>";
									}
								}
							$vString .= "</ul>
							</li>";
						}
							$vString .= "
						</ul>
					</nav>
				</div>
			</div>
			<!-- Site Menu Section End -->
		</div>
		<!-- Header Section End -->";
		return $vString;
	}

	public function getStickyMenu($vMenuCategory)
	{
		$vString = "<!-- Header Sticky Section Start -->
		<div class='sticky-header header-menu-center section bg-white d-none d-xl-block'>
			<div class='container p-2'>
				<div class='row align-items-center'>
	
					<!-- Header Logo Start -->
					<div class='col'>
						<div class='header-logo'>
							<a href='".$this->commonModelObj->getText(203, $_SESSION['graf_client']['language'])./*Tuisblad*/"'><img src='assets/images/logo/logo2_tb.png' class='' alt='Graffiti Books'></a>
						</div>
					</div>
					<!-- Header Logo End -->

					<!-- Search Start -->
					<div class='col d-none d-xl-block'>
						<nav class='site-main-menu justify-content-center'>
							<ul class='main-ul'>";
							$vBigArray = array(3,10);
							foreach ($vMenuCategory as $category) {
								$vRelated = explode(",", $category['related']);
								$vAddMenuClass = (in_array($category['id'], $vBigArray) ? 'w-min-180' : 'mega-menu');
								$vString .= "<li class='has-children position-relative'><a href='#'><span class='menu-text'>".$category['category']."</span></a>
									<ul class='sub-menu ".$vAddMenuClass."'>";
									foreach ($vRelated as $r_category) {
										$vParameters = array(1, 0, 1);
										$vMenuSubCategory = $this->booksModelObj->getMenuSubCategories($vParameters, $r_category, '');
										if(in_array($category['id'], $vBigArray)) {
											switch ($category['id']) {
												case 3:
													$v1Array = array('A','B','C');
													$v2Array = array('D','E','F','G','H');
													$v3Array = array('I','J','K','L','M','N','O');
													$v4Array = array('P','Q','R','S','T','U','V','W','X','Y','Z');
													$vString .= "<li class='has-children'><a href='blog-right-sidebar.html'><span class='menu-text'>".$this->commonModelObj->getText(515, $_SESSION['graf_client']['language'])./*Kategorieë*/"&nbsp;&nbsp;A - C</span></a>
														<ul class='sub-menu w-min-500'>";
															foreach ($vMenuSubCategory as $subcategory) {
																$vFirstChar = substr($subcategory['sub_category'], 0, 1);
																if (in_array($vFirstChar, $v1Array)) {
																	$vString .= "<li><a href='blog-right-sidebar.html'><span class='menu-text'><i class='fas fa-arrow-right pe-2 font-s'></i>".$subcategory['sub_category']."</span></a></li>";
																}
															}
														$vString .= "</ul>
													</li>";

													$vString .= "<li class='has-children'><a href='blog-right-sidebar.html'><span class='menu-text'>".$this->commonModelObj->getText(515, $_SESSION['graf_client']['language'])./*Kategorieë*/"&nbsp;&nbsp;D - H</span></a>
														<ul class='sub-menu w-min-500'>";
														foreach ($vMenuSubCategory as $subcategory) {
															$vFirstChar = substr($subcategory['sub_category'], 0, 1);
															if (in_array($vFirstChar, $v2Array)) {
																$vString .= "<li><a href='blog-right-sidebar.html'><span class='menu-text'><i class='fas fa-arrow-right pe-2 font-s'></i>".$subcategory['sub_category']."</span></a></li>";
															}
														}
														$vString .= "</ul>
													</li>";

													$vString .= "<li class='has-children'><a href='blog-right-sidebar.html'><span class='menu-text'>".$this->commonModelObj->getText(515, $_SESSION['graf_client']['language'])./*Kategorieë*/"&nbsp;&nbsp;I - O</span></a>
														<ul class='sub-menu w-min-450'>";
														foreach ($vMenuSubCategory as $subcategory) {
															$vFirstChar = substr($subcategory['sub_category'], 0, 1);
															if (in_array($vFirstChar, $v3Array)) {
																$vString .= "<li><a href='blog-right-sidebar.html'><span class='menu-text'><i class='fas fa-arrow-right pe-2 font-s'></i>".$subcategory['sub_category']."</span></a></li>";
															}
														}
														$vString .= "</ul>
													</li>";

													$vString .= "<li class='has-children'><a href='blog-right-sidebar.html'><span class='menu-text'>".$this->commonModelObj->getText(515, $_SESSION['graf_client']['language'])./*Kategorieë*/"&nbsp;&nbsp;P - Z</span></a>
														<ul class='sub-menu w-min-500'>";
														foreach ($vMenuSubCategory as $subcategory) {
															$vFirstChar = substr($subcategory['sub_category'], 0, 1);
															if (in_array($vFirstChar, $v4Array)) {
																$vString .= "<li><a href='blog-right-sidebar.html'><span class='menu-text'><i class='fas fa-arrow-right pe-2 font-s'></i>".$subcategory['sub_category']."</span></a></li>";
															}
														}
														$vString .= "</ul>
													</li>";
												break;
												case 10:
													$v101Array = array('A','B','C','D','E','F');
													$v102Array = array('G','H','I','J','K','L','M');
													$v103Array = array('N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
													$vString .= "<li class='has-children'><a href='blog-right-sidebar.html'><span class='menu-text'>".$this->commonModelObj->getText(515, $_SESSION['graf_client']['language'])./*Kategorieë*/"&nbsp;&nbsp;A - F</span></a>
														<ul class='sub-menu w-min-450'>";
															foreach ($vMenuSubCategory as $subcategory) {
																$vFirstChar = substr($subcategory['sub_category'], 0, 1);
																if (in_array($vFirstChar, $v101Array)) {
																	$vString .= "<li><a href='blog-right-sidebar.html'><span class='menu-text'><i class='fas fa-arrow-right pe-2 font-s'></i>".$subcategory['sub_category']."</span></a></li>";
																}
															}
														$vString .= "</ul>
													</li>";

													$vString .= "<li class='has-children'><a href='blog-right-sidebar.html'><span class='menu-text'>".$this->commonModelObj->getText(515, $_SESSION['graf_client']['language'])./*Kategorieë*/"&nbsp;&nbsp;G - M</span></a>
														<ul class='sub-menu w-min-450'>";
														foreach ($vMenuSubCategory as $subcategory) {
															$vFirstChar = substr($subcategory['sub_category'], 0, 1);
															if (in_array($vFirstChar, $v102Array)) {
																$vString .= "<li><a href='blog-right-sidebar.html'><span class='menu-text'><i class='fas fa-arrow-right pe-2 font-s'></i>".$subcategory['sub_category']."</span></a></li>";
															}
														}
														$vString .= "</ul>
													</li>";

													$vString .= "<li class='has-children'><a href='blog-right-sidebar.html'><span class='menu-text'>".$this->commonModelObj->getText(515, $_SESSION['graf_client']['language'])./*Kategorieë*/"&nbsp;&nbsp;N - Z</span></a>
														<ul class='sub-menu w-min-450'>";
														foreach ($vMenuSubCategory as $subcategory) {
															$vFirstChar = substr($subcategory['sub_category'], 0, 1);
															if (in_array($vFirstChar, $v103Array)) {
																$vString .= "<li><a href='blog-right-sidebar.html'><span class='menu-text'><i class='fas fa-arrow-right pe-2 font-s'></i>".$subcategory['sub_category']."</span></a></li>";
															}
														}
														$vString .= "</ul>
													</li>";
												break;
											}
										}
										else {
											$vString .= "<li>
												<ul>";
											foreach ($vMenuSubCategory as $subcategory) {
												$vString .= "<li><a href='elements-products.html'><span class='menu-text'>".$subcategory['sub_category']."</span></a></li>";
											}
											$vString .= "</ul>
											</li>";
										}
									}
								$vString .= "</ul>
								</li>";
							}
								$vString .= "
							</ul>
						</nav>
					</div>
					<!-- Search End -->
					
					<!-- Header Tools Start -->
					<div class='col-auto'>
						<div class='header-tools justify-content-end'>
							<div class='header-login'>
								<a href='profile.php'><i class='far fa-user'></i></a>
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
    	<!-- Header Sticky Section End -->";
		return $vString;
	}

	public function getMobileHeader($vMenuCategory)
	{
		$vString = "<!-- Mobile Header Section Start -->
		<div class='mobile-header bg-white section d-xl-none'>
			<div class='container'>
				<div class='row align-items-center'>
	
					<!-- Header Logo Start -->
					<div class='col col-6 col-md-4 col-lg-3'>
						<div class='header-logo'>
							<a href='".$this->commonModelObj->getText(203, $_SESSION['graf_client']['language'])./*Tuisblad*/"'><img src='assets/images/logo/logo2_tb.png' class='w-50' alt='Graffiti Books'></a>
						</div>
					</div>
					<!-- Header Logo End -->
	
					<!-- Header Tools Start -->
					<div class='col-auto col-6 col-md-8 col-lg-9'>
						<div class='header-tools justify-content-end'>
							<div class='header-login d-none d-sm-block'>
								<a href='profile.php'><i class='far fa-user'></i></a>
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
		<!-- Mobile Header Section End -->
	
		<!-- Mobile Header Section Start -->
		<div class='mobile-header sticky-header bg-white section d-xl-none'>
			<div class='container'>
				<div class='row align-items-center'>
	
					<!-- Header Logo Start -->
					<div class='col col-6'>
						<div class='header-logo'>
							<a href='".$this->commonModelObj->getText(203, $_SESSION['graf_client']['language'])./*Tuisblad*/"'><img src='assets/images/logo/logo2_tb.png' class='w-40' alt='Graffiti Books'></a>
						</div>
					</div>
					<!-- Header Logo End -->
	
					<!-- Header Tools Start -->
					<div class='col-auto col-6'>
						<div class='header-tools justify-content-end'>
							<div class='header-login d-none d-sm-block'>
								<a href='profile.php'><i class='far fa-user'></i></a>
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

	public function getOffCanvas($vMenuCategory)
	{
		$vString = "
			<!-- OffCanvas Search Start -->
			<div id='offcanvas-search' class='offcanvas offcanvas-search'>
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
						<div class='buttons text-center'>
							<a href='wishlist.html' class='btn btn-dark btn-hover-primary2 w-50'>view wishlist</a>
						</div>
					</div>
				</div>
			</div>
			<!-- OffCanvas Wishlist End -->
		";
		
		$vString .= "
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
						<span class='justify-content-center'>
							<div class='buttons text-center'>
								<a href='shopping-cart.html' class='btn btn-dark btn-hover-primary2 w-50'>view cart</a>
								<a href='checkout.html' class='btn btn-outline-primary2 w-50'>checkout</a>
							</div>
							<p class='minicart-message text-center'>".$this->commonModelObj->getText(471, $_SESSION['graf_client']['language'])./*GRATIS KOERIER AFLEWERING...*/"</p>
						</span>
					</div>
				</div>
			</div>
			<!-- OffCanvas Cart End -->
		";

		$vString .= "
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
						<ul>";
						foreach ($vMenuCategory as $category) {
//							Fiction
							if($category['id'] == 1){
								$v1MArray = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N');
								$v2MArray = array('O','P','Q','R','S','T','U','V','W','X','Y','Z');
								$v3MArray = array();
								$v4MArray = array();
								$v1MArrayHeading = "A - N";
								$v2MArrayHeading = "O - Z";
							}
//							Non-fiction
							else if($category['id'] == 2){
								$v1MArray = array('A','B','C');
								$v2MArray = array('D','E','F','G','H','I');
								$v3MArray = array('J','K','L','M','N','O','P');
								$v4MArray = array('Q','R','S','T','U','V','W','X','Y','Z');
								$v1MArrayHeading = "A - C";
								$v2MArrayHeading = "D - I";
								$v3MArrayHeading = "J - P";
								$v4MArrayHeading = "Q - Z";
							}
//							Children
							else if($category['id'] == 4){
								$v1MArray = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N');
								$v2MArray = array('O','P','Q','R','S','T','U','V','W','X','Y','Z');
								$v3MArray = array();
								$v4MArray = array();
								$v1MArrayHeading = "A - N";
								$v2MArrayHeading = "O - Z";
							}
//							Christian Children
							else if($category['id'] == 8){
								$v1MArray = array('A','B','C','D','E','F','G','H','I');
								$v2MArray = array('J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
								$v3MArray = array();
								$v4MArray = array();
								$v1MArrayHeading = "A - I";
								$v2MArrayHeading = "J - Z";
							}
//							Christian (10) | Gifts (25)
							else {
								$v1MArray = array('A','B','C');
								$v2MArray = array('D','E','F','G','H','i');
								$v3MArray = array('J','K','L','M','N','O','P');
								$v4MArray = array('Q','R','S','T','U','V','W','X','Y','Z');
								$v1MArrayHeading = "A - C";
								$v2MArrayHeading = "D - I";
								$v3MArrayHeading = "J - P";
								$v4MArrayHeading = "Q - Z";
							}
							$vRelated = explode(",", $category['related']);
							$vString .= "<li><a href='#'><span class='menu-text'>".$category['category']."</span></a>";
							$vX = count($vRelated);
//							foreach ($vRelated as $r_category) {
								$vParameters = array(1, 0, 1);
								$vMenuSubCategory = $this->booksModelObj->getMenuSubCategories($vParameters, $category['id'], '');
								$vString .= "<ul class='sub-menu'>";
									if($v1MArray && count($v1MArray) > 0){
										$vString .= "<li>
											<a href='#'><span class='menu-text'>".$this->commonModelObj->getText(515, $_SESSION['graf_client']['language'])./*Kategorieë*/"&nbsp;&nbsp;".$v1MArrayHeading."</span></a>
											<ul class='sub-menu'>";
											foreach ($vMenuSubCategory as $subcategory) {
												$vFirstChar = substr($subcategory['sub_category'], 0, 1);
												if (in_array($vFirstChar, $v1MArray)) {
													$vString .= "<li><a href='blog-right-sidebar.html'><span class='menu-text'>".$subcategory['sub_category']."</span></a></li>";
												}
											}
											$vString .= "</ul>
										</li>";
									}
									if($v2MArray && count($v2MArray) > 0){
										$vString .= "<li>
											<a href='#'><span class='menu-text'>".$this->commonModelObj->getText(515, $_SESSION['graf_client']['language'])./*Kategorieë*/"&nbsp;&nbsp;".$v2MArrayHeading."</span></a>
											<ul class='sub-menu'>";
											foreach ($vMenuSubCategory as $subcategory) {
												$vFirstChar = substr($subcategory['sub_category'], 0, 1);
												if (in_array($vFirstChar, $v2MArray)) {
													$vString .= "<li><a href='blog-right-sidebar.html'><span class='menu-text'>".$subcategory['sub_category']."</span></a></li>";
												}
											}
											$vString .= "</ul>
										</li>";
									}
									if($v3MArray && count($v3MArray) > 0) {
										$vString .= "<li>
											<a href='#'><span class='menu-text'>".$this->commonModelObj->getText(515, $_SESSION['graf_client']['language'])./*Kategorieë*/"&nbsp;&nbsp;".$v3MArrayHeading."</span></a>
											<ul class='sub-menu'>";
											foreach ($vMenuSubCategory as $subcategory) {
												$vFirstChar = substr($subcategory['sub_category'], 0, 1);
												if (in_array($vFirstChar, $v3MArray)) {
													$vString .= "<li><a href='blog-right-sidebar.html'><span class='menu-text'>".$subcategory['sub_category']."</span></a></li>";
												}
											}
											$vString .= "</ul>
										</li>";
									}
									if($v4MArray && count($v4MArray) > 0) {
										$vString .= "<li>
											<a href='#'><span class='menu-text'>".$this->commonModelObj->getText(515, $_SESSION['graf_client']['language'])./*Kategorieë*/"&nbsp;&nbsp;".$v4MArrayHeading."</span></a>
											<ul class='sub-menu'>";
											foreach ($vMenuSubCategory as $subcategory) {
												$vFirstChar = substr($subcategory['sub_category'], 0, 1);
												if (in_array($vFirstChar, $v4MArray)) {
													$vString .= "<li><a href='blog-right-sidebar.html'><span class='menu-text'>".$subcategory['sub_category']."</span></a></li>";
												}
											}
											$vString .= "</ul>
										</li>";
									}
								$vString .= "</ul>";
//							}
							$vString .= "</li>";
						}
						$vString .= "<li><a href='#'><span class='menu-text'>Kompetisies</span></a></li>
						</ul>
					</div>
					<div class='offcanvas-buttons'>
						<div class='header-tools'>
							<div class='header-login'>
								<a href='profile.php'><i class='far fa-user'></i></a>
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
						<a href='https://www.facebook.com/profile.php?id=182840481768825' target='_blank'class='hintT-top' data-hint='Facebook'><i class='fab fa-facebook-f'></i></a>
						<a href='https://twitter.com/Graffiti_Boeke' target='_blank'class='hintT-top' data-hint='Twitter'><i class='fab fa-twitter'></i></a>
						<a href='https://www.instagram.com/graffitiboeke' target='_blank'class='hintT-top' data-hint='Instagram'><i class='fab fa-instagram'></i></a>
						<a href='https://rss.com/podcasts/graffitibooks' target='_blank'class='hintT-top' data-hint='Spotify'><i class='fab fa-spotify'></i></a>
					</div>
				</div>
			</div>
			<!-- OffCanvas Search End -->
		
			<div class='offcanvas-overlay'></div>";
		return $vString;
	}

	public function getCarousel()
	{
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

	public function getTopSections($vType, $vSelectLanguage)
	{
//		$_SESSION['graf_client']['language'];
//		Topverkopers | Bestsellers
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
			<h2 class='title title-icon-both'>".$this->commonModelObj->getText($vType, $vSelectLanguage)."</h2>
		</div>
		

		<div class='product-carousel' id='pc1'>";
			foreach ($vBookResults as $book) {
				$vBookFormat = (!empty($book['format']) ? $this->commonModelObj->getLookupValue('lk_text', $_SESSION['graf_client']['language'], 'id = ?', $book['format']) : '');
				$vUrl = $this->commonModelObj->getText(432, $_SESSION['graf_client']['language']) /*Boek*/."/".$_SESSION['graf_client']['language']."/".$book['id']."/".urlencode($book['title']);
				$vString .= "<div class='col'>
					<div class='product'>
						<div class='product-thumb hintT-middle' data-hint='".$this->commonModelObj->getText(511, $_SESSION['graf_client']['language'])/*Lees meer*/."'>
							<a href='".$vUrl."' class='image'>";
								$vBookDiscount = $this->booksModelObj->getBookDiscount($book);
								$vBookDiscountPrice = $this->booksModelObj->getBookPrice($book);
								if((isset($book['top_seller_rank']) && $book['top_seller_rank'] > 0) || ($vBookDiscount > 0)) {
									$vString .= "<span class='product-badges'>";
									if(isset($book['top_seller_rank']) && $book['top_seller_rank'] > 0){
										$vString .= "<span class='top-sell'>".$book['top_seller_rank']."</span>";
									}
									if($vBookDiscount > 0){
										$vString .= "<span class='discount'> ";
											$vString .= "-".$vBookDiscount."%";
										$vString .= "</span>";
									}
									$vString .= "</span>";
								}
								if(!empty($book['blob_path'])){
									if($this->dbModelObj->env == "local") {
										$vBlob = "https://graffitiboeke.co.za/images/books/".$book['blob_path'];
									}
									else {
										$vBlob = $this->dbModelObj->conn_obj['server']."images/books/".$book['blob_path'];
									}
								}
								else {
									$vBlob = $this->dbModelObj->conn_obj['server']."images/books/book_placeholder.png";
								}
								$vString .= "<img src='".$vBlob."' alt='".htmlspecialchars($book['title'], ENT_QUOTES, 'UTF-8')."'>";
							$vString .= "</a>
						</div>
						<div class='product-info'>
							<h6 class='title'><a href='boek'>".$book['title']."</a></h6>
							<h6 class='author'><a href='boek'>".$book['author']."</a></h6>
							<span class='price'>";
								if($book['price'] > $vBookDiscountPrice) {
									$vString .= "<span class='old'>R ".$book['price']."</span>";
								}
								$vString .= "<span class='new'>R ".$vBookDiscountPrice."</span>
							</span>
							<div class='product-buttons'>
								<a href='#bookQuickViewModal' data-bs-toggle='modal' class='product-button hintT-top quick-view' data-hint='".$this->commonModelObj->getText(514, $_SESSION['graf_client']['language'])/*Vinnige Blik*/."' data-bookid='".$book['id']."' data-title='".htmlspecialchars($book['title'], ENT_QUOTES, 'UTF-8')."' data-author='".$book['author']."' data-summary='".htmlspecialchars($book['summary'], ENT_QUOTES, 'UTF-8')."' data-pricenew='".$vBookDiscountPrice."' data-priceold='".$book['price']."' data-image='".$vBlobPath."' data-category='".$book['category_string']."' data-subcategory='".$book['sub_category_string']."' data-pubdate='".$book['date_publish']."' data-dimensions='".$book['dimensions']."' data-weight='".$book['weight']."' data-pages='".$book['pages']."' data-format='".$vBookFormat."' data-server='".$this->dbModelObj->conn_obj['server']."'><i class='fas fa-search'></i></a>
								<a href='#' class='product-button hintT-top' data-hint='".$this->commonModelObj->getText(24, $_SESSION['graf_client']['language'])/*Laai in mandjie*/."'><i class='fas fa-shopping-cart'></i></a>
								<a href='wishlist.html' class='product-button add-to-wishlist hintT-top' data-hint='".$this->commonModelObj->getText(312, $_SESSION['graf_client']['language'])/*Laai in Wenslys*/."'><i class='far fa-heart'></i></a>
								<!--TODO add wishlist-added when already in wishlist-->
							</div>
						</div>
					</div>
				</div>";
			}

		$vString .= "</div>
		<div class='row row-cols-12 text-end pb-3'>
			<div class='col'>
				<a href='http://DDEWRTE' class='l-more fw-normal font-monospace'>".$this->commonModelObj->getText(40, $_SESSION['graf_client']['language']) /*Meer*/." ".$this->commonModelObj->getText($vType, $_SESSION['graf_client']['language'])."</a>
			</div>
		</div>";

		return $vString;
	}

	public function getProductTabs()
	{
        $vOutOfPrint = 0;
        $vSearchValue = 1;
        $vLanguageAf = 'af';
        $vLanguageEn = 'en';
		$vDateNow = date("Y-m-d");
//        $vNewRank = 1;
        $vNewCondition = "WHERE b.out_of_print = ? and b.new = ? and b.language = ? and b.new_rank >= ? and (b.category != 4 and b.category != 5 and b.category != 8 and b.category != 9 and b.category != 7 and b.category != 6)";
		$vNewKidsCondition = "WHERE b.out_of_print = ? and b.new = ? and b.new_rank >= ? and (b.category = 4 or b.category = 5 or b.category = 8 or b.category = 9 or b.category = 7 or b.category = 6)";
		$vSpecialCondition = "WHERE b.out_of_print = ? and b.special = ? and b.special_rank >= ?";
		$vSoonCondition = "WHERE b.out_of_print = ? AND b.date_publish > ? and b.soon = ?";
        $vNewAfResults = $this->booksModelObj->getBooks($vNewCondition, array(&$vOutOfPrint, &$vSearchValue, &$vLanguageAf, &$vSearchValue), "ORDER BY new_rank ASC, date_publish DESC", "LIMIT 8");
        $vNewEnResults = $this->booksModelObj->getBooks($vNewCondition, array(&$vOutOfPrint, &$vSearchValue, &$vLanguageEn, &$vSearchValue), "ORDER BY new_rank ASC, date_publish DESC", "LIMIT 8");
		$vNewKidsResults = $this->booksModelObj->getBooks($vNewKidsCondition, array(&$vOutOfPrint, &$vSearchValue, &$vSearchValue), "ORDER BY new_rank ASC, date_publish DESC", "LIMIT 8");
		$vSpecialResults = $this->booksModelObj->getBooks($vSpecialCondition, array(&$vOutOfPrint, &$vSearchValue, &$vSearchValue), "ORDER BY special_rank ASC, date_publish ASC", "LIMIT 8");
		$vSoonResults = $this->booksModelObj->getBooks($vSoonCondition, array(&$vOutOfPrint, &$vDateNow, &$vSearchValue), "ORDER BY soon_rank ASC, date_publish ASC", "LIMIT 8");//Here

		$vString = "<div class='section section-fluid section-padding bg-white pt-5 mt-0 mt-md-3 border-top'>
			<div class='container-fluid'>
				<div class='row'>
					<div class='col-12'>
						<ul class='product-tab-list nav'>
							<li><a class='home-book-tab active' data-bs-toggle='tab' href='#tab-new-release-af' data-tab='tab-new-release-af'>".$this->commonModelObj->getText(204, 'af') /*Nuwe Vrystellings*/."</a></li>
							<li><a class='home-book-tab' data-bs-toggle='tab' href='#tab-new-release-en' data-tab='tab-new-release-en'>".$this->commonModelObj->getText(204, 'en') /*New Releases*/."</a></li>
							<li><a class='home-book-tab' data-bs-toggle='tab' href='#tab-new-release-kid' data-tab='tab-new-release-kid'>".$this->commonModelObj->getText(446, 'af') /*Nuut Kinders*/."</a></li>
							<li><a class='home-book-tab' data-bs-toggle='tab' href='#tab-specials' data-tab='tab-specials'>".$this->commonModelObj->getText(208, 'af') /*Winskopies*/."</a></li>
							<li><a class='home-book-tab' data-bs-toggle='tab' href='#tab-soon' data-tab='tab-soon'>".$this->commonModelObj->getText(206, 'af') /*Binnekort*/."</a></li>
						</ul>
						<div class='product-tab-content1 tab-content'>";
							$vTabArray = ["tab-new-release-af","tab-new-release-en","tab-new-release-kid","tab-specials","tab-soon"];
							foreach ($vTabArray as $vTab)
							{
								if($vTab == 'tab-new-release-af'){
									$vResults = $vNewAfResults;
									$vActive = 'show active';
									$vMoreText = $this->commonModelObj->getText(40, $_SESSION['graf_client']['language'])." ".$this->commonModelObj->getText(204, 'af');
								}
								else if($vTab == 'tab-new-release-en'){
									$vResults = $vNewEnResults;
									$vActive = '';
									$vMoreText = $this->commonModelObj->getText(40, $_SESSION['graf_client']['language'])." ".$this->commonModelObj->getText(204, 'en');
								}
								else if($vTab == 'tab-new-release-kid'){
									$vResults = $vNewKidsResults;
									$vActive = '';
									$vMoreText = $this->commonModelObj->getText(40, $_SESSION['graf_client']['language'])." ".$this->commonModelObj->getText(446, 'af');
								}
								else if($vTab == 'tab-specials'){
									$vResults = $vSpecialResults;
									$vActive = '';
									$vMoreText = $this->commonModelObj->getText(40, $_SESSION['graf_client']['language'])." ".$this->commonModelObj->getText(208, 'af') ;
								}
								else if($vTab == 'tab-soon'){
									$vResults = $vSoonResults;
									$vActive = '';
									$vMoreText = $this->commonModelObj->getText(40, $_SESSION['graf_client']['language'])." ".$this->commonModelObj->getText(206, 'af');
								}
								$vString .= "<div class='tab-pane fade ".$vActive."' id='".$vTab."'>";
									$vString .= "<div class='product-carousel' id='pc_".$vTab."'>";
										foreach ($vResults as $book)
										{
											$vBookFormat = (!empty($book['format']) ? $this->commonModelObj->getLookupValue('lk_text', $_SESSION['graf_client']['language'], 'id = ?', $book['format']) : '');
											$vString .= "<div class='col'>
												<div class='product'>
													<div class='product-thumb hintT-middle' data-hint='".$this->commonModelObj->getText(511, $_SESSION['graf_client']['language'])/*Lees meer*/."'>";
													$vUrl = urlencode($this->commonModelObj->getText(432, $_SESSION['graf_client']['language']) /*Boek*/."/".$_SESSION['graf_client']['language']."/".$book['id']."/".$book['title']);
														$vString.= "<a href='".$vUrl."' class='image'>";
															$vBookDiscount = $this->booksModelObj->getBookDiscount($book);
															$vBookDiscountPrice = $this->booksModelObj->getBookPrice($book);
															if((isset($book['top_seller_rank']) && $book['top_seller_rank'] > 0) || ($vBookDiscount > 0)) {
																$vString .= "<span class='product-badges'>";
																if(isset($book['top_seller_rank']) && $book['top_seller_rank'] > 0){
																	$vString .= "<span class='top-sell'>".$book['top_seller_rank']."</span>";
																}
																if($vBookDiscount > 0){
																	$vString .= "<span class='discount'> ";
																		$vString .= "-".$vBookDiscount."%";
																	$vString .= "</span>";
																}
																$vString .= "</span>";
															}
															if(!empty($book['blob_path'])){
																if($this->dbModelObj->env == "local") {
																	$vBlobPath = "https://graffitiboeke.co.za/images/books/".$book['blob_path'];
																}
																else {
																	$vBlobPath = $this->dbModelObj->conn_obj['server']."images/books/".$book['blob_path'];
																}
															}
															else {
																$vBlobPath = $this->dbModelObj->conn_obj['server']."images/books/book_placeholder.png";
															}
															$vString .= "<img src='".$vBlobPath."' alt='".$book['title']."'>";
														$vString .= "</a>
													</div>
													<div class='product-info'>
														<h6 class='title'><a href='boek'>".$book['title']."</a></h6>
														<h6 class='author'><a href='boek'>".$book['author']."</a></h6>
														<span class='price'>";
															if($book['price'] > $vBookDiscountPrice) {
																$vString .= "<span class='old'>R ".$book['price']."</span>";
															}
															$vString .= "<span class='new'>R ".$vBookDiscountPrice."</span>
														</span>
														<div class='product-buttons'>
															<a href='#bookQuickViewModal' data-bs-toggle='modal' class='product-button hintT-top quick-view' data-hint='".$this->commonModelObj->getText(514, $_SESSION['graf_client']['language'])/*Vinnige Blik*/."' data-bookid='".$book['id']."' data-title='".htmlspecialchars($book['title'], ENT_QUOTES, 'UTF-8')."' data-author='".$book['author']."' data-summary='".htmlspecialchars($book['summary'], ENT_QUOTES, 'UTF-8')."' data-pricenew='".$vBookDiscountPrice."' data-priceold='".$book['price']."' data-image='".$vBlobPath."' data-category='".$book['category_string']."' data-subcategory='".$book['sub_category_string']."' data-pubdate='".$book['date_publish']."' data-dimensions='".$book['dimensions']."' data-weight='".$book['weight']."' data-pages='".$book['pages']."' data-format='".$vBookFormat."' data-server='".$this->dbModelObj->conn_obj['server']."'><i class='fas fa-search'></i></a>
															<a href='#' class='product-button hintT-top' data-hint='".$this->commonModelObj->getText(24, $_SESSION['graf_client']['language'])/*Laai in mandjie*/."'><i class='fas fa-shopping-cart'></i></a>
															<a href='wishlist.html' class='product-button add-to-wishlist hintT-top' data-hint='".$this->commonModelObj->getText(312, $_SESSION['graf_client']['language'])/*Laai in Wenslys*/."'><i class='far fa-heart'></i></a>
															<!--TODO add wishlist-added when already in wishlist and fix links above-->
														</div>
													</div>													
												</div>
											</div>";
										}
									$vString .= "</div>
								</div>";
							}
						$vString .= "</div>
					</div>
				</div>
			</div>
		</div>";
		return $vString;
	}

	public function getFooter()
	{
		$vString = "    <div class='footer1-section section section-padding'>
			<div class='container'>
				<div class='row text-center row-cols-1'>
	
					<div class='footer1-logo col text-center'>
						<img src='assets/images/logo/logo_rt.png' alt='Graffiti Books'>
					</div>
	
					<div class='footer1-menu col'>
						<ul class='widget-menu justify-content-center'>
							<li><a href='#'>".$this->commonModelObj->getText(487, $_SESSION['graf_client']['language'])./*Kompetisies*/"</a></li>
							<li><a href='#'>".$this->commonModelObj->getText(212, $_SESSION['graf_client']['language'])./*Kontak Ons*/"</a></li>
							<li><a href='#'>".$this->commonModelObj->getText(119, $_SESSION['graf_client']['language'])./*Bepalings en Voorwaardes*/"</a></li>
							<li><a href='#'>".$this->commonModelObj->getText(222, $_SESSION['graf_client']['language'])./*Winkelure*/"</a></li>
						</ul>
					</div>
					<div class='footer1-subscribe d-flex flex-column col'>
						<form id='mc-form' class='mc-form widget-subscibe'>
							<input id='mc-email' autocomplete='off' type='email' placeholder='Enter your e-mail address'>
							<button id='mc-submit' class='btn btn-dark'>subscibe</button>
						</form>
						<!-- mailchimp-alerts Start -->
						<div class='mailchimp-alerts text-centre'>
							<div class='mailchimp-submitting'></div><!-- mailchimp-submitting end -->
							<div class='mailchimp-success text-success'></div><!-- mailchimp-success end -->
							<div class='mailchimp-error text-danger'></div><!-- mailchimp-error end -->
						</div><!-- mailchimp-alerts end -->
					</div>					
					<div class='footer1-social col'>
						<ul class='widget-social justify-content-center'>
							<li class='hintT-top' data-hint='Twitter'><a href='https://twitter.com/Graffiti_Boeke' target='_blank'><i class='fab fa-twitter'></i></a></li>
							<li class='hintT-top' data-hint='Facebook'><a href='https://www.facebook.com/profile.php?id=182840481768825' target='_blank'><i class='fab fa-facebook-f'></i></a></li>
							<li class='hintT-top' data-hint='Instagram'><a href='https://www.instagram.com/graffitiboeke/' target='_blank'><i class='fab fa-instagram'></i></a></li>
							<li class='hintT-top' data-hint='Youtube'><a href='https://rss.com/podcasts/graffitibooks' target='_blank'><i class='fab fa-spotify'></i></a></li>
						</ul>
					</div>
					<div class='footer1-copyright col'>
						<p class='copyright'>&copy; ".date("Y")." Graffiti. All Rights Reserved | <strong>+27 (0)12 548 2356</strong> | <a href='mailto:info@graffitibooks.co.za'>info@graffitibooks.co.za</a></p>
					</div>
	
				</div>
			</div>
		</div>";
		return $vString;
	}

	public function getModals()
	{
		$vString = "
		<div class='quickViewModal modal fade' id='bookQuickViewModal'>
			<input type='hidden' name='quickview-book-id' id='quickview-book-id' value=''>
			<div class='modal-dialog modal-dialog-centered'>
				<div class='modal-content'>
					<button class='close' data-bs-dismiss='modal'>&times;</button>
					<div class='row learts-mb-n30 mh-7'>

						<div class='col-lg-5 col-12 learts-mb-30'>
							<div class='product-images'>
								<div class='product-zoom'>
									<img id='quickview-image' src='' alt='Graffiti'>
								</div>
							</div>
						</div>
	
						<div class='col-lg-7 col-12 overflow-hidden position-relative learts-mb-30'>
							<div class='product-summery customScroll'>
								<h3 id='quickview-title'></h3>
								<div class='label text-success fw-400 ps-2'><span id='quikview-category'></span> - <span id='quikview-subcategory'></span></div>
								<div id='quikview-author' class='label text-secondary fw-400 ps-2'></div>
								<div class='product-price'>
									<span class='price'>
										<span class='old' id='quikview-price-old'></span>
										<span class='new' id='quikview-price-new'></span>
									</span>
								</div>
								<div class='product-description'><p id='quickview-summary'></p></div>
								<div class='product-variations'>
									<table>
										<tbody>
											<tr>
												<td class='label'><span>".$this->commonModelObj->getText(140, $_SESSION['graf_client']['language'])/*Aantal*/."</span></td>
												<td class='value'>
													<div class='product-quantity'>
														<span class='qty-btn minus'><i class='ti-minus'></i></span>
														<input type='text' class='input-qty' value='1'>
														<span class='qty-btn plus'><i class='ti-plus'></i></span>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class='product-buttons'>							
									<a href='#' class='btn btn-dark btn-outline-hover-dark'><i class='fas fa-shopping-cart'></i> ".$this->commonModelObj->getText(24, $_SESSION['graf_client']['language'])/*Laai in mandjie*/."</a>
									<a href='wishlist.html' class='btn btn-icon btn-outline-body btn-hover-dark hintT-top' data-hint='".$this->commonModelObj->getText(312, $_SESSION['graf_client']['language'])/*Laai in Wenslys*/."'><i class='far fa-heart'></i></a>
									<!--TODO add wishlist-added when already in wishlist and fix links above-->									
								</div>		

								<div class='product-meta mb-0'>
									<table>
										<tbody>
											<tr>
												<td class='label'><span>".$this->commonModelObj->getText(25, $_SESSION['graf_client']['language'])/*Publikasiedatum*/."</span></td>
												<td class='value' id='quickview-datepub'></td>
											</tr>
											<tr>
												<td class='label'><span>".$this->commonModelObj->getText(377, $_SESSION['graf_client']['language'])/*Dimensies*/."</span></td>
												<td class='value' id='quickview-dimensions'></td>
											</tr>
											<tr>
												<td class='label'><span>".$this->commonModelObj->getText(379, $_SESSION['graf_client']['language'])/*Gewig*/."</span></td>
												<td class='value' id='quickview-weight'></td>
											</tr>
											<tr>
												<td class='label'><span>".$this->commonModelObj->getText(380, $_SESSION['graf_client']['language'])/*Aantal bladsye*/."</span></td>
												<td class='value' id='quickview-pages'></td>
											</tr>
											<tr>
												<td class='label'><span>".$this->commonModelObj->getText(381, $_SESSION['graf_client']['language'])/*Formaat*/."</span></td>
												<td class='value' id='quickview-format'></td>
											</tr>																						
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>";
		return $vString;
	}

	public function getScripts()
	{
		$vString = "
	<!-- Vendors JS -->
		<script src='assets/js/vendor/modernizr-3.6.0.min.js'></script>
		<script src='assets/js/vendor/jquery-3.4.1.min.js'></script>
		<script src='assets/js/vendor/jquery-migrate-3.1.0.min.js'></script>
		<script src='assets/js/vendor/bootstrap.bundle.min.js'></script>
	
	<!-- Plugins JS -->
		<script src='assets/js/plugins/select2.min.js'></script>
		<script src='assets/js/plugins/jquery.nice-select.min.js'></script>
		<script src='assets/js/plugins/perfect-scrollbar.min.js'></script>
		<script src='assets/js/plugins/swiper.min.js'></script>
		<script src='assets/js/plugins/slick.min.js'></script>
		<script src='assets/js/plugins/mo.min.js'></script>
		<script src='assets/js/plugins/jquery.ajaxchimp.min.js'></script>
		<script src='assets/js/plugins/jquery.countdown.min.js'></script>
		<script src='assets/js/plugins/imagesloaded.pkgd.min.js'></script>
		<script src='assets/js/plugins/isotope.pkgd.min.js'></script>
		<script src='assets/js/plugins/jquery.matchHeight-min.js'></script>
		<script src='assets/js/plugins/ion.rangeSlider.min.js'></script>
		<script src='assets/js/plugins/photoswipe.min.js'></script>
		<script src='assets/js/plugins/photoswipe-ui-default.min.js'></script>
		<script src='assets/js/plugins/jquery.zoom.min.js'></script>
		<script src='assets/js/plugins/ResizeSensor.js'></script>
		<script src='assets/js/plugins/jquery.sticky-sidebar.min.js'></script>
		<script src='assets/js/plugins/product360.js'></script>
		<script src='assets/js/plugins/jquery.magnific-popup.min.js'></script>
		<script src='assets/js/plugins/jquery.scrollUp.min.js'></script>
	<!--    <script src='assets/js/plugins/scrollax.min.js'></script>-->
	
	
	<!-- Use the minified version files listed below for better performance and remove the files listed above -->
	<!-- <script src='assets/js/vendor/vendor.min.js'></script>
		<script src='assets/js/plugins/plugins.min.js'></script> -->
	
	<!-- Main Activation JS -->
		<script src='assets/js/main1.1.js'></script>
		";

		return $vString;
	}
}