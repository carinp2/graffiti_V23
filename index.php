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

$vMenuCategory = $booksModelObj->getMenuCategories(array(0,1,1, &$_SESSION['graf_client']['language']));

echo $partsView->getHtmlBegin();
echo $partsView->getTopBar();
echo $partsView->getHeaderSection();
echo $partsView->getSiteMenu($vMenuCategory);
echo $partsView->getStickyMenu($vMenuCategory);
echo $partsView->getMobileHeader($vMenuCategory);
echo $partsView->getOffCanvas($vMenuCategory);
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

echo $partsView->getProductTabs();
echo $partsView->getFooter();
echo $partsView->getModals();
echo $partsView->getScripts();

?>

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