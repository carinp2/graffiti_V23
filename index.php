<?php

if (!isset($_SESSION)) {
	session_start();
}
$root = $_SERVER["DOCUMENT_ROOT"];

require_once $root."/model/db.php";
require_once $root."/model/common.php";
require_once $root."/model/books.php";

require_once $root."/view/parts.php";
require_once $root."/config/setSesseions.php";

$dbModelObj = new db();
$commonModelObj = new common($dbModelObj);
$booksModelObj = new booksModel($dbModelObj, $commonModelObj);
$partsView = new partsView($dbModelObj, $commonModelObj, $booksModelObj);

echo $partsView->getHtmlBegin();
echo $partsView->getTopBar();
echo $partsView->getHeader();
echo $partsView->getOffCanvas();
echo $partsView->getCarousel();

//Topverkopers, Bestsellers, Topverkopers kinders Section Start || lk_language_text - 209 = Topverkopers | 209 = Bestsellers | 447 = Topverkopers kinders
$vString = "<div class='section section-fluid'>
    <div class='container'>";

        $vString .= $partsView->getTopSections(209, 'af');
        $vString .= $partsView->getTopSections(209, 'en');
        $vString .= $partsView->getTopSections(447, 'all');

    $vString .= "</div>
</div>";

echo $vString;
?>


<body>
    <!-- Mobile Header Section Start -->
<!--    <div class='mobile-header sticky-header bg-white section d-xl-none'>-->
<!--        <div class='container'>-->
<!--            <div class='row align-items-center'>-->
<!---->
                <!-- Header Logo Start -->
<!--                <div class='col'>-->
<!--                    <div class='header-logo'>-->
<!--                        <a href='index.html'><img src='assets/images/logo/logo-2.webp' alt='Learts Logo'></a>-->
<!--                    </div>-->
<!--                </div>-->
                <!-- Header Logo End -->
<!---->
                <!-- Header Tools Start -->
<!--                <div class='col-auto'>-->
<!--                    <div class='header-tools justify-content-end'>-->
<!--                        <div class='header-login d-none d-sm-block'>-->
<!--                            <a href='my-account.html'><i class='far fa-user'></i></a>-->
<!--                        </div>-->
<!--                        <div class='header-search d-none d-sm-block'>-->
<!--                            <a href='#offcanvas-search' class='offcanvas-toggle'><i class='fas fa-search'></i></a>-->
<!--                        </div>-->
<!--                        <div class='header-wishlist d-none d-sm-block'>-->
<!--                            <a href='#offcanvas-wishlist' class='offcanvas-toggle'><span class='wishlist-count'>3</span><i class='far fa-heart'></i></a>-->
<!--                        </div>-->
<!--                        <div class='header-cart'>-->
<!--                            <a href='#offcanvas-cart' class='offcanvas-toggle'><span class='cart-count'>3</span><i class='fas fa-shopping-cart'></i></a>-->
<!--                        </div>-->
<!--                        <div class='mobile-menu-toggle'>-->
<!--                            <a href='#offcanvas-mobile-menu' class='offcanvas-toggle'>-->
<!--                                <svg viewBox='0 0 800 600'>-->
<!--                                    <path d='M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200' class='top'></path>-->
<!--                                    <path d='M300,320 L540,320' class='middle'></path>-->
<!--                                    <path d='M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190' class='bottom' transform='translate(480, 320) scale(1, -1) translate(-480, -318) '></path>-->
<!--                                </svg>-->
<!--                            </a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
                <!-- Header Tools End -->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
    <!-- Mobile Header Section End -->






    <!-- Product Section Start -->
    <div class='section section-fluid section-padding bg-white pt-5 mt-0 mt-md-3 border-top'>
        <div class='container-fluid'>

            <!-- Product Tab Start -->
            <div class='row'>
                <div class='col-12'>
                    <ul class='product-tab-list nav'>
                        <li><a class='home-book-tab active' data-bs-toggle='tab' href='#tab-new-release-af' data-tab='tab-new-release-af'>Nuwe Vrystellings</a></li>
<!--                        <li><a data-bs-toggle='tab' href='#tab-sale-items'>Topverkopers</a></li>-->
                        <li><a class='home-book-tab' data-bs-toggle='tab' href='#tab-new-release-en' data-tab='tab-new-release-en'>New Releases</a></li>
<!--                        <li><a data-bs-toggle='tab' href='#tab-best-sellers'>Best Sellers</a></li>-->
                        <li><a class='home-book-tab' data-bs-toggle='tab' href='#tab-new-release-kid' data-tab='tab-new-release-kid'>Nuut Kinders</a></li>
<!--                        <li><a class='home-book-tab' data-bs-toggle='tab' href='#tab-best-sellers' data-tab='tab-best-sellers'>Topverkopers Kinders</a></li>-->
                        <li><a class='home-book-tab' data-bs-toggle='tab' href='#tab-specials' data-tab='tab-specials'>Winskopies</a></li>
                    </ul>
                    <div class='product-tab-content1 tab-content'>
                        <div class='tab-pane fade show active' id='tab-new-release-af'>
                            <!-- 1 Nuwe Vrystellings Start -->
                            <div class='product-carousel' id='pc1'>
                                <div class='col'>
                                    <div class='product'>
                                        <div class='product-thumb hintT-middle' data-hint='Open book detail'>
                                            <a href='product-details.html' class='image'>
                                                <span class='product-badges'>
                                                    <span class='discount'>-13%</span>
                                                </span>
                                                <img src='images/books/77.jpeg' alt='Product Image'>
                                            </a>
                                        </div>
                                        <div class='product-info'>
                                            <h6 class='title'><a href='product-details.html'>Nuwe Vrystellings 1</a></h6>
                                            <span class='price'>
                                                <span class='old'>$45.00</span>
                                            <span class='new'>$39.00</span>
                                            </span>
                                            <div class='product-buttons'>
                                                <a href='#quickViewModal' data-bs-toggle='modal' class='product-button hintT-top' data-hint='Quick View'><i class='fas fa-eye'></i></a>
                                                <a href='#' class='product-button hintT-top' data-hint='Add to Cart'><i class='fas fa-shopping-cart'></i></a>
                                                <a href='wishlist.html' class='product-button hintT-top' data-hint='Add to wishlist'><i class='far fa-heart'></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class='col'>
                                    <div class='product'>
                                        <div class='product-thumb hintT-middle' data-hint='Open book detail'>
                                            <a href='product-details.html' class='image'>
                                                <span class='product-badges'>
                                                    <span class='discount'>-13%</span>
                                                </span>
                                                <img src='assets/images/product/s270/product-20.webp' alt='Product Image'>
                                            </a>
                                        </div>
                                        <div class='product-info'>
                                            <h6 class='title'><a href='product-details.html'>Nuwe Vrystellings 2</a></h6>
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
                                </div>

                                <div class='col'>
                                    <div class='product'>
                                        <div class='product-thumb'>
                                            <a href='product-details.html' class='image'>
                                                <span class='product-badges'>
                                                    <span class='discount'>-13%</span>
                                                </span>
                                                <img src='assets/images/product/s270/product-20.webp' alt='Product Image'>
                                            </a>
                                            <a href='wishlist.html' class='add-to-wishlist hintT-left' data-hint='Add to wishlist'><i class='far fa-heart'></i></a>
                                        </div>
                                        <div class='product-info'>
                                            <h6 class='title'><a href='product-details.html'>Nuwe Vrystellings 22</a></h6>
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
                                </div>

                                <div class='col'>
                                    <div class='product'>
                                        <div class='product-thumb'>
                                            <a href='product-details.html' class='image'>
                                                <span class='product-badges'>
                                                    <span class='discount'>-13%</span>
                                                </span>
                                                <img src='assets/images/product/s270/product-20.webp' alt='Product Image'>
                                            </a>
                                            <a href='wishlist.html' class='add-to-wishlist hintT-left' data-hint='Add to wishlist'><i class='far fa-heart'></i></a>
                                        </div>
                                        <div class='product-info'>
                                            <h6 class='title'><a href='product-details.html'>Nuwe Vrystellings 222</a></h6>
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
                                </div>

                                <div class='col'>
                                    <div class='product'>
                                        <div class='product-thumb'>
                                            <a href='product-details.html' class='image'>
                                                <span class='product-badges'>
                                                    <span class='discount'>-13%</span>
                                                </span>
                                                <img src='assets/images/product/s270/product-21.webp' alt='Product Image'>
                                            </a>
                                            <a href='wishlist.html' class='add-to-wishlist hintT-left' data-hint='Add to wishlist'><i class='far fa-heart'></i></a>
                                        </div>
                                        <div class='product-info'>
                                            <h6 class='title'><a href='product-details.html'>Nuwe Vrystellings 3</a></h6>
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
                                </div>

                                <div class='col'>
                                    <div class='product'>
                                        <div class='product-thumb'>
                                            <a href='product-details.html' class='image'>
                                                <span class='product-badges'>
                                                    <span class='discount'>-13%</span>
                                                </span>
                                                <img src='assets/images/product/s270/product-22.webp' alt='Product Image'>
                                                <img class='image-hover ' src='assets/images/product/s270/product-1-hover.webp' alt='Product Image'>
                                            </a>
                                            <a href='wishlist.html' class='add-to-wishlist hintT-left' data-hint='Add to wishlist'><i class='far fa-heart'></i></a>
                                        </div>
                                        <div class='product-info'>
                                            <h6 class='title'><a href='product-details.html'>Nuwe Vrystellings 4</a></h6>
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
                                </div>

                                <div class='col'>
                                    <div class='product'>
                                        <div class='product-thumb'>
                                            <a href='product-details.html' class='image'>
                                                <span class='product-badges'>
                                                    <span class='discount'>-13%</span>
                                                </span>
                                                <img src='assets/images/product/s270/product-1.webp' alt='Product Image'>
                                                <img class='image-hover ' src='assets/images/product/s270/product-1-hover.webp' alt='Product Image'>
                                            </a>
                                            <a href='wishlist.html' class='add-to-wishlist hintT-left' data-hint='Add to wishlist'><i class='far fa-heart'></i></a>
                                        </div>
                                        <div class='product-info'>
                                            <h6 class='title'><a href='product-details.html'>Nuwe Vrystellings 5</a></h6>
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
                                </div>

                                <div class='col'>
                                    <div class='product'>
                                        <div class='product-thumb'>
                                            <a href='product-details.html' class='image'>
                                                <span class='product-badges'>
                                                    <span class='discount'>-10%</span>
                                                </span>
                                                <img src='assets/images/product/s270/product-24.webp' alt='Product Image'>
                                                <img class='image-hover ' src='assets/images/product/s270/product-24-hover.webp' alt='Product Image'>
                                            </a>
                                            <a href='wishlist.html' class='add-to-wishlist hintT-left' data-hint='Add to wishlist'><i class='far fa-heart'></i></a>
                                        </div>
                                        <div class='product-info'>
                                            <h6 class='title'><a href='product-details.html'>Nuwe Vrystellings 6</a></h6>
                                            <span class='price'>
                                                <span class='old'>$20.00</span>
                                            <span class='new'>$18.00</span>
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
                            <!-- Nuwe Vrystellings End -->
                        </div>
                        <div class='tab-pane fade' id='tab-new-release-en'>
                            <!-- 1 New Releases Start -->
                            <div class='product-carousel' id='pc2'>
                                <div class='col'>
                                    <div class='product'>
                                        <div class='product-thumb'>
                                            <a href='product-details.html' class='image hintT-middle' data-hint='Open book detail'>
                                                <span class='product-badges'>
                                                    <span class='discount'>-13%</span>
                                                </span>
                                                <img src='assets/images/product/s270/product-19.webp' alt='Product Image'>
                                            </a>
                                        </div>
                                        <div class='product-info'>
                                            <h6 class='title'><a href='product-details.html'>New Releases  1</a></h6>
                                            <span class='price'>
                                                <span class='old'>$45.00</span>
                                            <span class='new'>$39.00</span>
                                            </span>
                                            <div class='product-buttons'>
                                                <a href='#quickViewModal' data-bs-toggle='modal' class='product-button hintT-top' data-hint='Quick View'><i class='fas fa-eye'></i></a>
                                                <a href='#' class='product-button hintT-top' data-hint='Add to Cart'><i class='fas fa-shopping-cart'></i></a>
                                                <a href='wishlist.html' class='product-button hintT-top' data-hint='Add to wishlist'><i class='far fa-heart'></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class='col'>
                                    <div class='product'>
                                        <div class='product-thumb'>
                                            <a href='product-details.html' class='image'>
                                                <span class='product-badges'>
                                                    <span class='discount'>-13%</span>
                                                </span>
                                                <img src='assets/images/product/s270/product-20.webp' alt='Product Image'>
                                            </a>
                                            <a href='wishlist.html' class='add-to-wishlist hintT-left' data-hint='Add to wishlist'><i class='far fa-heart'></i></a>
                                        </div>
                                        <div class='product-info'>
                                            <h6 class='title'><a href='product-details.html'>New Releases 2</a></h6>
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
                                </div>

                                <div class='col'>
                                    <div class='product'>
                                        <div class='product-thumb'>
                                            <a href='product-details.html' class='image'>
                                                <span class='product-badges'>
                                                    <span class='discount'>-13%</span>
                                                </span>
                                                <img src='assets/images/product/s270/product-20.webp' alt='Product Image'>
                                            </a>
                                            <a href='wishlist.html' class='add-to-wishlist hintT-left' data-hint='Add to wishlist'><i class='far fa-heart'></i></a>
                                        </div>
                                        <div class='product-info'>
                                            <h6 class='title'><a href='product-details.html'>New Releases 22</a></h6>
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
                                </div>

                                <div class='col'>
                                    <div class='product'>
                                        <div class='product-thumb'>
                                            <a href='product-details.html' class='image'>
                                                <span class='product-badges'>
                                                    <span class='discount'>-13%</span>
                                                </span>
                                                <img src='assets/images/product/s270/product-20.webp' alt='Product Image'>
                                            </a>
                                            <a href='wishlist.html' class='add-to-wishlist hintT-left' data-hint='Add to wishlist'><i class='far fa-heart'></i></a>
                                        </div>
                                        <div class='product-info'>
                                            <h6 class='title'><a href='product-details.html'>New Releases 222</a></h6>
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
                                </div>

                                <div class='col'>
                                    <div class='product'>
                                        <div class='product-thumb'>
                                            <a href='product-details.html' class='image'>
                                                <span class='product-badges'>
                                                    <span class='discount'>-13%</span>
                                                </span>
                                                <img src='assets/images/product/s270/product-21.webp' alt='Product Image'>
                                            </a>
                                            <a href='wishlist.html' class='add-to-wishlist hintT-left' data-hint='Add to wishlist'><i class='far fa-heart'></i></a>
                                        </div>
                                        <div class='product-info'>
                                            <h6 class='title'><a href='product-details.html'>New Releases 3</a></h6>
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
                                </div>

                                <div class='col'>
                                    <div class='product'>
                                        <div class='product-thumb'>
                                            <a href='product-details.html' class='image'>
                                                <span class='product-badges'>
                                                    <span class='discount'>-13%</span>
                                                </span>
                                                <img src='assets/images/product/s270/product-22.webp' alt='Product Image'>
                                                <img class='image-hover ' src='assets/images/product/s270/product-1-hover.webp' alt='Product Image'>
                                            </a>
                                            <a href='wishlist.html' class='add-to-wishlist hintT-left' data-hint='Add to wishlist'><i class='far fa-heart'></i></a>
                                        </div>
                                        <div class='product-info'>
                                            <h6 class='title'><a href='product-details.html'>New Releases 4</a></h6>
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
                                </div>

                                <div class='col'>
                                    <div class='product'>
                                        <div class='product-thumb'>
                                            <a href='product-details.html' class='image'>
                                                <span class='product-badges'>
                                                    <span class='discount'>-13%</span>
                                                </span>
                                                <img src='assets/images/product/s270/product-1.webp' alt='Product Image'>
                                                <img class='image-hover ' src='assets/images/product/s270/product-1-hover.webp' alt='Product Image'>
                                            </a>
                                            <a href='wishlist.html' class='add-to-wishlist hintT-left' data-hint='Add to wishlist'><i class='far fa-heart'></i></a>
                                        </div>
                                        <div class='product-info'>
                                            <h6 class='title'><a href='product-details.html'>New Releases 5</a></h6>
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
                                </div>

                                <div class='col'>
                                    <div class='product'>
                                        <div class='product-thumb'>
                                            <a href='product-details.html' class='image'>
                                                <span class='product-badges'>
                                                    <span class='discount'>-10%</span>
                                                </span>
                                                <img src='assets/images/product/s270/product-24.webp' alt='Product Image'>
                                                <img class='image-hover ' src='assets/images/product/s270/product-24-hover.webp' alt='Product Image'>
                                            </a>
                                            <a href='wishlist.html' class='add-to-wishlist hintT-left' data-hint='Add to wishlist'><i class='far fa-heart'></i></a>
                                        </div>
                                        <div class='product-info'>
                                            <h6 class='title'><a href='product-details.html'>New Releases 6</a></h6>
                                            <span class='price'>
                                                <span class='old'>$20.00</span>
                                            <span class='new'>$18.00</span>
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
                            <!-- New Releases End -->
                        </div>
                        <div class='tab-pane fade' id='tab-new-release-kid'>
                            <!-- 1 New Releases Kids Start -->
                            <div class='product-carousel' id='pc3'>
                                <div class='col'>
                                    <div class='product'>
                                        <div class='product-thumb'>
                                            <a href='product-details.html' class='image hintT-middle' data-hint='Open book detail'>
                                                <span class='product-badges'>
                                                    <span class='discount'>-13%</span>
                                                </span>
                                                <img src='assets/images/product/s270/product-19.webp' alt='Product Image'>
                                            </a>
                                        </div>
                                        <div class='product-info'>
                                            <h6 class='title'><a href='product-details.html'>Country Feast Set</a></h6>
                                            <span class='price'>
                                                <span class='old'>$45.00</span>
                                            <span class='new'>$39.00</span>
                                            </span>
                                            <div class='product-buttons'>
                                                <a href='#quickViewModal' data-bs-toggle='modal' class='product-button hintT-top' data-hint='Quick View'><i class='fas fa-eye'></i></a>
                                                <a href='#' class='product-button hintT-top' data-hint='Add to Cart'><i class='fas fa-shopping-cart'></i></a>
                                                <a href='wishlist.html' class='product-button hintT-top' data-hint='Add to wishlist'><i class='far fa-heart'></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class='col'>
                                    <div class='product'>
                                        <div class='product-thumb'>
                                            <a href='product-details.html' class='image'>
                                                <span class='product-badges'>
                                                    <span class='discount'>-13%</span>
                                                </span>
                                                <img src='assets/images/product/s270/product-20.webp' alt='Product Image'>
                                            </a>
                                            <a href='wishlist.html' class='add-to-wishlist hintT-left' data-hint='Add to wishlist'><i class='far fa-heart'></i></a>
                                        </div>
                                        <div class='product-info'>
                                            <h6 class='title'><a href='product-details.html'>Wooden Condiment Cups</a></h6>
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
                                </div>

                                <div class='col'>
                                    <div class='product'>
                                        <div class='product-thumb'>
                                            <a href='product-details.html' class='image'>
                                                <span class='product-badges'>
                                                    <span class='discount'>-13%</span>
                                                </span>
                                                <img src='assets/images/product/s270/product-21.webp' alt='Product Image'>
                                            </a>
                                            <a href='wishlist.html' class='add-to-wishlist hintT-left' data-hint='Add to wishlist'><i class='far fa-heart'></i></a>
                                        </div>
                                        <div class='product-info'>
                                            <h6 class='title'><a href='product-details.html'>Pottery Bowl Set</a></h6>
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
                                </div>

                                <div class='col'>
                                    <div class='product'>
                                        <div class='product-thumb'>
                                            <a href='product-details.html' class='image'>
                                                <span class='product-badges'>
                                                    <span class='discount'>-13%</span>
                                                </span>
                                                <img src='assets/images/product/s270/product-22.webp' alt='Product Image'>
                                                <img class='image-hover ' src='assets/images/product/s270/product-1-hover.webp' alt='Product Image'>
                                            </a>
                                            <a href='wishlist.html' class='add-to-wishlist hintT-left' data-hint='Add to wishlist'><i class='far fa-heart'></i></a>
                                        </div>
                                        <div class='product-info'>
                                            <h6 class='title'><a href='product-details.html'>Pottery Bowl Set</a></h6>
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
                                </div>

                                <div class='col'>
                                    <div class='product'>
                                        <div class='product-thumb'>
                                            <a href='product-details.html' class='image'>
                                                <span class='product-badges'>
                                                    <span class='discount'>-13%</span>
                                                </span>
                                                <img src='assets/images/product/s270/product-1.webp' alt='Product Image'>
                                                <img class='image-hover ' src='assets/images/product/s270/product-1-hover.webp' alt='Product Image'>
                                            </a>
                                            <a href='wishlist.html' class='add-to-wishlist hintT-left' data-hint='Add to wishlist'><i class='far fa-heart'></i></a>
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
                                </div>

                                <div class='col'>
                                    <div class='product'>
                                        <div class='product-thumb'>
                                            <a href='product-details.html' class='image'>
                                                <span class='product-badges'>
                                                    <span class='discount'>-10%</span>
                                                </span>
                                                <img src='assets/images/product/s270/product-24.webp' alt='Product Image'>
                                                <img class='image-hover ' src='assets/images/product/s270/product-24-hover.webp' alt='Product Image'>
                                            </a>
                                            <a href='wishlist.html' class='add-to-wishlist hintT-left' data-hint='Add to wishlist'><i class='far fa-heart'></i></a>
                                        </div>
                                        <div class='product-info'>
                                            <h6 class='title'><a href='product-details.html'>Steel Watering Can</a></h6>
                                            <span class='price'>
                                                <span class='old'>$20.00</span>
                                            <span class='new'>$18.00</span>
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
                                        <div class='product-thumb'>
                                            <a href='product-details.html' class='image'>
                                                <span class='product-badges'>
                                                    <span class='discount'>-20%</span>
                                                </span>
                                                <img src='assets/images/product/s270/product-25.webp' alt='Product Image'>
                                                <img class='image-hover ' src='assets/images/product/s270/product-25-hover.webp' alt='Product Image'>
                                            </a>
                                            <a href='wishlist.html' class='add-to-wishlist hintT-left' data-hint='Add to wishlist'><i class='far fa-heart'></i></a>
                                        </div>
                                        <div class='product-info'>
                                            <h6 class='title'><a href='product-details.html'>Antique Sewing Scissors</a></h6>
                                            <span class='price'>
                                                <span class='old'>$15.00</span>
                                            <span class='new'>$12.00</span>
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
                                        <div class='product-thumb'>
                                            <a href='product-details.html' class='image'>
                                                <span class='product-badges'>
                                                    <span class='discount'>-27%</span>
                                                </span>
                                                <img src='assets/images/product/s270/product-4.webp' alt='Product Image'>
                                                <img class='image-hover ' src='assets/images/product/s270/product-4-hover.webp' alt='Product Image'>
                                            </a>
                                            <a href='wishlist.html' class='add-to-wishlist hintT-left' data-hint='Add to wishlist'><i class='far fa-heart'></i></a>
                                        </div>
                                        <div class='product-info'>
                                            <h6 class='title'><a href='product-details.html'>Pizza Plate Tray</a></h6>
                                            <span class='price'>
                                                <span class='old'>$30.00</span>
                                            <span class='new'>$22.00</span>
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
                                        <div class='product-thumb'>
                                            <a href='product-details.html' class='image'>
                                                <span class='product-badges'>
                                                    <span class='discount'>-27%</span>
                                                </span>
                                                <img src='assets/images/product/s270/product-4.webp' alt='Product Image'>
                                                <img class='image-hover ' src='assets/images/product/s270/product-4-hover.webp' alt='Product Image'>
                                            </a>
                                            <a href='wishlist.html' class='add-to-wishlist hintT-left' data-hint='Add to wishlist'><i class='far fa-heart'></i></a>
                                        </div>
                                        <div class='product-info'>
                                            <h6 class='title'><a href='product-details.html'>Pizza Plate Tray2</a></h6>
                                            <span class='price'>
                                                <span class='old'>$30.00</span>
                                            <span class='new'>$22.00</span>
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
                                        <div class='product-thumb'>
                                            <a href='product-details.html' class='image'>
                                                <span class='product-badges'>
                                                    <span class='discount'>-27%</span>
                                                </span>
                                                <img src='assets/images/product/s270/product-4.webp' alt='Product Image'>
                                                <img class='image-hover ' src='assets/images/product/s270/product-4-hover.webp' alt='Product Image'>
                                            </a>
                                            <a href='wishlist.html' class='add-to-wishlist hintT-left' data-hint='Add to wishlist'><i class='far fa-heart'></i></a>
                                        </div>
                                        <div class='product-info'>
                                            <h6 class='title'><a href='product-details.html'>Pizza Plate Tray3</a></h6>
                                            <span class='price'>
                                                <span class='old'>$30.00</span>
                                            <span class='new'>$22.00</span>
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
                            <!-- New Releases Kids End -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product Tab End -->

        </div>
    </div>
    <!-- Product Section End -->

    <div class='footer1-section section section-padding'>
        <div class='container'>
            <div class='row text-center row-cols-1'>

                <div class='footer1-logo col text-center'>
                    <img src='assets/images/logo/logo_rt.png' alt=''>
                </div>

                <div class='footer1-menu col'>
                    <ul class='widget-menu justify-content-center'>
                        <li><a href='#'>Kompetisies</a></li>
                        <li><a href='#'>Kontak Ons</a></li>
                        <li><a href='#'>Bepalings & Voorwaardes</a></li>
                        <li><a href='#'>Winkel Ure</a></li>
                    </ul>
                </div>
                <div class='footer1-subscribe d-flex flex-column col'>
                    <form id='mc-form' class='mc-form widget-subscibe'>
                        <input id='mc-email' autocomplete='off' type='email' placeholder='Jou E-pos adres'>
                        <button id='mc-submit' class='btn btn-dark'>Teken in op Nuusbrief</button>
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
                        <li class='hintT-top' data-hint='Twitter'> <a href='https://twitter.com/Graffiti_Boeke'><i class='fab fa-twitter'></i></a></li>
                        <li class='hintT-top' data-hint='Facebook'> <a href='https://www.facebook.com/profile.php?id=182840481768825'><i class='fab fa-facebook-f'></i></a></li>
                        <li class='hintT-top' data-hint='Instagram'> <a href='https://www.instagram.com/graffitiboeke/'><i class='fab fa-instagram'></i></a></li>
                        <li class='hintT-top' data-hint='Youtube'> <a href='https://rss.com/podcasts/graffitibooks'><i class='fab fa-spotify'></i></a></li>
                    </ul>
                </div>
                <div class='footer1-copyright col'>
                    <p class='copyright'>&copy; 2023 Graffiti. All Rights Reserved | <strong>+27 (0)12 548 2356</strong> | <a href='mailto:info@graffitibooks.co.za'>info@graffitibooks.co.za</a></p>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class='quickViewModal modal fade' id='quickViewModal'>
        <div class='modal-dialog modal-dialog-centered'>
            <div class='modal-content'>
                <button class='close' data-bs-dismiss='modal'>&times;</button>
                <div class='row learts-mb-n30'>

                    <!-- Product Images Start -->
                    <div class='col-lg-6 col-12 learts-mb-30'>
                        <div class='product-images'>
                            <div class='product-gallery-slider-quickview'>
                                <div class='product-zoom' data-image='assets/images/product/single/1/product-zoom-1.webp'>
                                    <img src='assets/images/product/single/1/product-1.webp' alt=''>
                                </div>
                                <div class='product-zoom' data-image='assets/images/product/single/1/product-zoom-2.webp'>
                                    <img src='assets/images/product/single/1/product-2.webp' alt=''>
                                </div>
                                <div class='product-zoom' data-image='assets/images/product/single/1/product-zoom-3.webp'>
                                    <img src='assets/images/product/single/1/product-3.webp' alt=''>
                                </div>
                                <div class='product-zoom' data-image='assets/images/product/single/1/product-zoom-4.webp'>
                                    <img src='assets/images/product/single/1/product-4.webp' alt=''>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product Images End -->

                    <!-- Product Summery Start -->
                    <div class='col-lg-6 col-12 overflow-hidden position-relative learts-mb-30'>
                        <div class='product-summery customScroll'>
                            <div class='product-ratings'>
                                <span class='star-rating'>
                                <span class='rating-active' style='width: 100%;'>ratings</span>
                                </span>
                                <a href='#reviews' class='review-link'>(<span class='count'>3</span> customer reviews)</a>
                            </div>
                            <h3 class='product-title'>Cleaning Dustpan & Brush</h3>
                            <div class='product-price'>£38.00 – £50.00</div>
                            <div class='product-description'>
                                <p>Easy clip-on handle – Hold the brush and dustpan together for storage; the dustpan edge is serrated to allow easy scraping off the hair without entanglement. High-quality bristles – no burr damage, no scratches, thick and durable, comfortable to remove dust and smaller particles.</p>
                            </div>
                            <div class='product-variations'>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class='label'><span>Size</span></td>
                                            <td class='value'>
                                                <div class='product-sizes'>
                                                    <a href='#'>Large</a>
                                                    <a href='#'>Medium</a>
                                                    <a href='#'>Small</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class='label'><span>Color</span></td>
                                            <td class='value'>
                                                <div class='product-colors'>
                                                    <a href='#' data-bg-color='#000000'></a>
                                                    <a href='#' data-bg-color='#ffffff'></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class='label'><span>Quantity</span></td>
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
                                <a href='#' class='btn btn-icon btn-outline-body btn-hover-dark'><i class='far fa-heart'></i></a>
                                <a href='#' class='btn btn-dark btn-outline-hover-dark'><i class='fas fa-shopping-cart'></i> Add to Cart</a>
                                <a href='#' class='btn btn-icon btn-outline-body btn-hover-dark'><i class='fas fa-random'></i></a>
                            </div>
                            <div class='product-brands'>
                                <span class='title'>Brands</span>
                                <div class='brands'>
                                    <a href='#'><img src='assets/images/brands/brand-3.webp' alt=''></a>
                                    <a href='#'><img src='assets/images/brands/brand-8.webp' alt=''></a>
                                </div>
                            </div>
                            <div class='product-meta mb-0'>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class='label'><span>SKU</span></td>
                                            <td class='value'>0404019</td>
                                        </tr>
                                        <tr>
                                            <td class='label'><span>Category</span></td>
                                            <td class='value'>
                                                <ul class='product-category'>
                                                    <li><a href='#'>Kitchen</a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class='label'><span>Tags</span></td>
                                            <td class='value'>
                                                <ul class='product-tags'>
                                                    <li><a href='#'>handmade</a></li>
                                                    <li><a href='#'>learts</a></li>
                                                    <li><a href='#'>mug</a></li>
                                                    <li><a href='#'>product</a></li>
                                                    <li><a href='#'>learts</a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class='label'><span>Share on</span></td>
                                            <td class='va'>
                                                <div class='product-share'>
                                                    <a href='#'><i class='fab fa-facebook-f'></i></a>
                                                    <a href='#'><i class='fab fa-twitter'></i></a>
                                                    <a href='#'><i class='fab fa-google-plus-g'></i></a>
                                                    <a href='#'><i class='fab fa-pinterest'></i></a>
                                                    <a href='#'><i class='far fa-envelope'></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Product Summery End -->

                </div>
            </div>
        </div>
    </div>

    <!-- JS
============================================ -->

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
<!--    <script src='assets/js/plugins/pdiscountoswipe.min.js'></script>-->
<!--    <script src='assets/js/plugins/pdiscountoswipe-ui-default.min.js'></script>-->
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

    <Script>
//  Set all image parent class to same min-height
    $.fn.resizeProduct = function() {
        var vProductThumbHeight = "0";
        $(".product-thumb").each(function () {
            var thHeight = $(this).height();
            if (vProductThumbHeight < thHeight) {
                vProductThumbHeight = thHeight;
            }
        });
        $(".product-thumb").each(function () {
            $(this).css("min-height", (vProductThumbHeight) + "px");
        });
    }

    $( window ).on( "resize", function() {
        $.fn.resizeProduct();
    });
    $(function() {
        $.fn.resizeProduct();
    });

    </Script>

</body>

</html>