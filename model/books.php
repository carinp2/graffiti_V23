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
			b.publisher, b.language, c.category AS category_string, sc.sub_category_".$_SESSION['graf_client']['language']." AS sub_category_string, b.author, b.illustrator, b.translator, b.edit_by, b.default_discount, b.dimensions, b.weight, 
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
		$vDefaultDiscountPrice = round($vBook['price']-($vBook['price']*$vBook['default_discount']));
		$vSpecialDiscountPrice = (!empty($vBook['special_price']) && $vBook['special_price'] > 0 ?  $vBook['special_price'] : $vBook['price']);
		$vClientDiscountPrice = round($vBook['price']-($vBook['price']*$_SESSION['graf_client']['discount']));

		if($vBook['new'] == 1 || $vBook['top_seller'] == 1 || $vBook['soon'] == 1 && ($vDefaultDiscountPrice < $vSpecialDiscountPrice) && $vDefaultDiscountPrice < $vClientDiscountPrice){
			$vFinalPrice = $vDefaultDiscountPrice;
		}
		else if($vBook['special'] == 1 && ($vSpecialDiscountPrice < $vBook['price'] && $vSpecialDiscountPrice < $vClientDiscountPrice)){
			$vFinalPrice = $vSpecialDiscountPrice;
		}
		else if($vClientDiscountPrice < $vBook['price'] && $vClientDiscountPrice <  $vSpecialDiscountPrice){
			$vFinalPrice = $vClientDiscountPrice;
		}
		else {
			$vFinalPrice = $vBook['price'];
		}
		return $vFinalPrice;
	}

	public function getBookDiscount($vBook){
		$vDefaultDiscount = $vBook['default_discount']*100;
		$vSpecialDiscount = (($vBook['price']-$vBook['special_price'])/$vBook['price'])*100;
		$vClientDiscount = $_SESSION['graf_client']['discount'];

		if($vBook['new'] == 1 || $vBook['top_seller'] == 1 || $vBook['soon'] == 1 && ($vDefaultDiscount < $vSpecialDiscount) && $vDefaultDiscount < $vClientDiscount){
			$vFinalDiscount = $vDefaultDiscount;
		}
		else if($vBook['special'] == 1 && ($vSpecialDiscount < $vBook['price'] && $vSpecialDiscount < $vClientDiscount)){
			$vFinalDiscount = $vSpecialDiscount;
		}
		else if($vClientDiscount < $vBook['price'] && $vClientDiscount <  $vSpecialDiscount){
			$vFinalDiscount = $vClientDiscount;
		}
		else {
			$vFinalDiscount = 0;
		}
		return $vFinalDiscount;
	}
}