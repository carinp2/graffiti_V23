<?php

class booksModel
{

	private $root;
	private $dbModelObj;
	private $commonModelObj;

    public function __construct($dbModelObj, $commonModelObj)
    {
        $this->root = $_SERVER["DOCUMENT_ROOT"];
        $this->dbModelObj = $dbModelObj;
		$this->commonModelObj = $commonModelObj;
    }

	public function getBooks($vCondition, $vParams, $vOrder = '', $vLimit = ''){
		//Ln 22 to 26 - Leonie request 26-04-2022 - Sort on special price if special price smaller than price
        $vSQL = "SELECT b.id, b.isbn, b.category, b.sub_category, b.title, b.summary, b.blob_path, b.special_price, b.price, b.cost_price, b.date_publish, b.date_loaded, b.new, b.special, b.top_seller, b.top_seller_rank, b.out_of_print, b.in_stock, 
			b.publisher, b.language, c.category AS category_string, sc.sub_category_".$_SESSION['graf_client']['language']." AS sub_category_string, b.author, b.illustrator, b.translator, b.edit_by, b.$, b.dimensions, b.weight, 
			b.format, b.pages, b.new_rank, b.soon_discount, b.soon_rank, b.soon, b.special_rank as special_rank, b.section,
		    CASE
                WHEN (b.special_price < b.price AND b.special_price > 0) THEN b.special_price
                WHEN (b.special_price >= b.price OR b.special_price = 0) THEN b.price
                ELSE b.price
            END AS SortPrice 
		FROM books b 
		INNER JOIN categories AS c ON c.id = b.category 
		INNER JOIN sub_categories AS sc ON sc.id = b.sub_category ".$vCondition." ".$vOrder." ".$vLimit;

        $vResult = $this->dbModelObj->query($vSQL, $vParams)->fetchAll();

        if (isset($vResult) && !empty($vResult)) {
            return $vResult;
        } else {
            return false;
        }
	}

	public function getBookPrice($vBook){

//$vId, $vIsbn, $vCategory, $vSub_category, $vTitle, $vSummary, $vBlob_path, $vSpecial_price, $vPrice, $vDate_publish, $vDate_loaded, $vNew, $vSpecial, $vTop_seller, $vTop_seller_rank, $vOut_of_print, $vIn_stock, $vPublisher, $vLanguage, $vCategoryString, $vSubCategoryString,
//0		  1			2			3				4		5			6				7			8			9				10			11		12			13				14				15				16			17				18			19					20
//$vAuthor, $vIllustrator, $vTranslator, $vEdit, $vNormalDate, $vDefault_discount, $vDimensions, $vWeight, $vFormat, $vNoPages, $vNewRank, $vSoonDiscount, $vSoonRank, $vSoon, $vSpecialRank, $vTv, $vTvDate, $vCostPrice, $vRr, $vRrDate, $vSection, $vE_isbn, $vE_url, $vE_price
//	 21			22				23			24			25				26				27		 	28		 29			30			31				32		33			34		 35		 		36		37		 38			39		 40		  41		42			43			44

//$vNewTopDiscountPrice =  round($vResults[8][$x]-($vResults[8][$x]*$vResults[26][$x]));
//$vSpecialDiscountPrice = (!empty($vResults[7][$x]) && $vResults[7][$x] > 0 ?  $vResults[7][$x] : $vResults[8][$x]);
//$vClientDiscountPrice = round($vResults[8][$x]-($vResults[8][$x]*$_SESSION['SessionGrafSpecialDiscount']));
//$vSoonDiscountPrice = round($vResults[8][$x]-($vResults[8][$x]*$vResults[26][$x]));
//$vNormalPrice = $vResults[8][$x];
//$vPriceDisplayType = "home";
//
//---if($new == 1 || $top_seller == 1 && ( $vNewTopDiscountPrice < $vSpecialDiscountPrice) && $vNewTopDiscountPrice < $vClientDiscountPrice){
//	$vFinalPrice = $vNewTopDiscountPrice;
//}
////on special and special price smaller than price and special price bigger than 0
//else if($special == 1 && ($vSpecialDiscountPrice < $price && $vSpecialDiscountPrice < $vClientDiscountPrice)){
//	$vFinalPrice = $vSpecialDiscountPrice;
//}
////Soon & soon discount and soon discount smaller than price and soon discount smaller than client discount
////else if(($soon_discount == 1 && ($vSoonDiscountPrice < $price && $vSoonDiscountPrice < $vClientDiscountPrice)) || ($language == 'en' && $category != 7 && ($vSoonDiscountPrice < $price && $vSoonDiscountPrice < $vClientDiscountPrice)) || ($language == 'af' && $category != 6 && ($vSoonDiscountPrice < $price && $vSoonDiscountPrice < $vClientDiscountPrice))){
//else if(($soon_discount == 1 && ($vSoonDiscountPrice < $price && $vSoonDiscountPrice < $vClientDiscountPrice)) || ($language == 'en' && ($vSoonDiscountPrice < $price && $vSoonDiscountPrice < $vClientDiscountPrice)) || ($language == 'af' && ($vSoonDiscountPrice < $price && $vSoonDiscountPrice < $vClientDiscountPrice))){
//	$vFinalPrice = $vSoonDiscountPrice;
//}
////Price bigger client discount price and special price bigger client special price
//else if($vClientDiscountPrice < $price && $vClientDiscountPrice <  $vSpecialDiscountPrice){
//	$vFinalPrice = $vClientDiscountPrice;
//}
//else {
//	$vFinalPrice = $vNormalPrice;
//}
	$TopsellerPrice = round($vBook['price']-($vBook['price']*$vBook['default_discount']));
	$vSpecialPrice = (!empty($vBook['special_price']) && $vBook['special_price'] > 0 ?  $vBook['special_price'] : $vBook['price']);
	$vClientDiscount =
	if($vBook['new'] == 1 || $vBook['top_seller'] == 1) && ()){

	}

	}
}