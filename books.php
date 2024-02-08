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
                                $vBookImages = array($book['blob_path']);
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
                            <a href='#' class='btn btn-icon btn-outline-body btn-hover-dark hintT-top' data-hint='Add to Wishlist'><i class='far fa-heart'></i></a>
                            <a href='#' class='btn btn-dark btn-outline-hover-dark'><i class='fas fa-shopping-cart'></i> Add to Cart</a>
                            <a href='#' class='btn btn-icon btn-outline-body btn-hover-dark hintT-top' data-hint='Compare'><i class='fas fa-random'></i></a>
                        </div>
                        <div class='product-brands'>
                            <span class='title'>Brands</span>
                            <div class='brands'>
                                <a href='#'><img src='assets/images/brands/brand-3.webp' alt=''></a>
                                <a href='#'><img src='assets/images/brands/brand-8.webp' alt=''></a>
                            </div>
                        </div>
                        <div class='product-meta'>
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
    <!-- Single Products Section End -->";
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