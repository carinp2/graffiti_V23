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

$vX = $_REQUEST['lang'];
$vLanguage = ($_REQUEST['lang'] && !empty($_REQUEST['lang']) ? $_REQUEST['lang'] : 'af');
$vBookId = $_REQUEST['id'];

$vBookResult = $booksModelObj->getBooks("WHERE b.id = ?", array(&$vBookId), $vOrder = '', $vLimit = 'LIMIT 1');

foreach ($vBookResult AS $book) {
    $vBookImages = $booksModelObj->getBookImages("WHERE book_id = ?", array($book['id']), $vOrder = '', $vLimit = 'LIMIT 4');
    $vBookFormatJson = (!empty($book['format']) ? $commonModelObj->getLookupValue('lk_text', 'en', 'id = ?', $book['format']) : '');
    $vBookDiscount = $booksModelObj->getBookDiscount($book);
    $vBookDiscountPrice = $booksModelObj->getBookPrice($book);
    $vLanguageJson = ($book['format'] == 'en' ? 'English' : 'Afrikaans');
	$vString = "
   <!-- Single Products Section Start -->
    <div class='section section-padding border-bottom'>
        <div class='container'>
            <div class='row learts-mb-n40'>

                <!-- Product Images Start -->
                <div class='col-lg-4 col-12 learts-mb-40'>
                    <div class='product-images'>";
                        if(!empty($book['blob_path'])){
                            if($dbModelObj->env == "local") {
								$vBlobPath = "https://graffitiboeke.co.za/images/books/";
							}
                            else {
                                $vBlobPath = $dbModelObj->conn_obj['server']."images/books";
                            }
                            if($vBookImages && count($vBookImages) > 0) {
                                $newElement = array(
                                    'blob_path' => $book['blob_path']
                                );
                                $vBookImages[] = $newElement;
							}
                            else {
                                $newElement = array(
                                    'blob_path' => $book['blob_path']
                                );
                                $vBookImages = array($newElement);
//                                $vBookImages = array($book['blob_path']);
                            }
                            $vBookImages = array_reverse($vBookImages);
                        }
						$vString .= "<div class='product-gallery-slider'>";
                        foreach ($vBookImages AS $images){
                            $vString .= "
                            <div class='product-zoom' data-image='".$vBlobPath."/".$images['blob_path']."'><img src='".$vBlobPath."/".$images['blob_path']."' alt='".htmlspecialchars($book['title'], ENT_QUOTES, 'UTF-8')."'></div>";
                        }
                        $vString .= "</div>";
                        if(count($vBookImages) > 1) {
							$vString .= "<div class='product-thumb-slider'>";
							foreach ($vBookImages as $images) {
								$vString .= "<div class='item'><img src='".$vBlobPath."/".$images['blob_path']."' alt='".htmlspecialchars($book['title'], ENT_QUOTES, 'UTF-8')."'></div>";
							}
							$vString .= "</div>";
						}
                    $vString .= "</div>
                </div>
                <!-- Product Images End -->

                <!-- Product Summery Start -->
                <div class='col-lg-8 col-12 learts-mb-40'>
                    <div class='product-summery'>
                        <h3 class='product-title'>".$book['title']."</h3>
                        <div class='author'><a class='dgreen font-xl' href='ghgh'>".$book['author']."</a></div><!-- TODO - Add links -->
                        <div class='category text-dgreen font-s'><a class='dgreen font-xl' href='ghgh'>".$book['category_string']." - ".$book['sub_category_string']."<a></div><!-- TODO - Add links -->
                        <div class='product-price'>";
                            if($book['price'] > $vBookDiscountPrice) {
                                $vString .= "<span class='old'>R ".$book['price']."</span>";
                            }
                            $vString .= "<span class='new'>R ".$vBookDiscountPrice."</span>";
                        $vString .= "</div>
                        <div class='product-description'>
                            <p>".$book['summary']."</p>
                        </div>
                        <div class='product-variations'>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class='label'><span>".$commonModelObj->getText(25, $_SESSION['graf_client']['language'])/*Publikasiedatum*/."</span></td>
                                        <td class='value'>".$book['date_publish']."</td>
                                    </tr>
                                    <tr>
                                        <td class='label'><span>".$commonModelObj->getText(140, $_SESSION['graf_client']['language'])/*Aantal*/."</span></td>
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
                            <a href='#' class='btn btn-icon btn-outline-body btn-hover-dark hintT-top' data-hint='".$commonModelObj->getText(312, $_SESSION['graf_client']['language'])/*Laai in Wenslys*/."'><i class='far fa-heart'></i></a>
                            <a href='#' class='btn btn-dark btn-outline-hover-dark'><i class='fas fa-shopping-cart' ></i> ".$commonModelObj->getText(24, $_SESSION['graf_client']['language'])/*Laai in mandjie*/."</a>
                        </div>
                        <div class='product-meta'>
                            <table>
                                <tbody>";
                                    if(!empty($book['dimensions'])) {
                                        $vString .= "<tr>
                                            <td class='label'><span>".$commonModelObj->getText(377, $_SESSION['graf_client']['language'])/*Dimensies*/."</span></td>
                                            <td class='value'>".$book['dimensions']."</td>
                                        </tr>";
                                    }
                                    if(!empty($book['format'])) {
                                        $vString .= "<tr>
                                            <td class='label'><span>".$commonModelObj->getText(381, $_SESSION['graf_client']['language'])/*Formaat*/."</span></td>
                                            <td class='value'>".$book['format_string']."</td>
                                        </tr>";
                                    }
                                    if(!empty($book['pages']) && ($book['pages'] > 0)) {
                                        $vString .= "<tr>
                                            <td class='label'><span>".$commonModelObj->getText(380, $_SESSION['graf_client']['language'])/*Aantal bladsye*/."</span></td>
                                            <td class='value'>".$book['pages']."</td>
                                        </tr>";
                                    }
                                $vString .= "</tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Product Summery End -->

            </div>
        </div>

    </div>
    <!-- Single Products Section End -->";

    $vString .= "<script type='application/ld+json'>
    {
        \"@context\": \"https://schema.org\",
        \"@type\": \"WebPage\",
        \"breadcrumb\": \"Books > Literature & Fiction > Classics\",
        \"mainEntity\":{
            \"@type\": \"Book\",
            \"author\": \"".$book['author']."\",
            \"bookFormat\": \"".$vBookFormatJson."\",
            \"datePublished\": \"".$book['date_publish']."\",
            \"image\": \"".$vBlobPath."/".$book['blob_path']."\",
            \"inLanguage\": \"".$vLanguageJson."\",
            \"isbn\": \"".$book['isbn']."\",
            \"name\": \"".htmlspecialchars($book['title'])."\",
            \"description\": \"".htmlspecialchars($book['summary'])."\",
            \"numberOfPages\": \"".$book['pages']."\",
            \"offers\": {
                \"@type\": \"Offer\",
                \"availability\": \"https://schema.org/InStock\",
                \"price\": \"".$vBookDiscountPrice."\",
                \"priceCurrency\": \"ZAR\"
            }
        }
    }
    </script>";
}
echo $vString;

echo $partsView->getFooter();
echo $partsView->getModals();
echo $partsView->getScripts();

?>

    <Script>

    </Script>

</body>

</html>