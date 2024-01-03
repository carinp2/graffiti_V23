<?php

if (!isset($_SESSION)) {
	session_start();
}
$root = $_SERVER["DOCUMENT_ROOT"];
//echo $root;
require_once $root."/model/db.php";
require_once $root."/model/common.php";
require_once $root."/model/books.php";

require_once $root."/view/parts.php";
require_once $root."/config/setSessions.php";

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

$vString .= $partsView->getProductTabs();

$vString .= $partsView->getFooter();

$vString .= $partsView->getModals();

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
    $.fn.resizeDisplay = function() {
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

        var vProductTitleHeight = 0;
        $(".product-info .title").each(function () {
            var thHeight = $(this).height();
            if (vProductTitleHeight < thHeight) {
                vProductTitleHeight = thHeight;
            }
        });
        $(".product-info .title").each(function () {
            $(this).css("min-height", (vProductTitleHeight) + "px");
        });
    }

    // $(window).on( "resize", function() {alert('resize');
    //     setTimeout($.fn.resizeDisplay(), 10000);
    // });
    $(window).resize(function(){location.reload();});
    $(window).load(function() {
        $.fn.resizeDisplay();
    });

    </Script>

</body>

</html>