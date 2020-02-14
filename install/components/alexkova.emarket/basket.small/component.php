<?
use Alexkova\Emarket\Sale\Basket;
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/*function EmarketAddBasket($PRODUCT_ID, $quantity = 1, $props=array())
{
    $arProductProps = array();
	$quantity  = $quantity>0 ? $quantity : 1;

    //$cExt=CCatalogProduct::GetByIDEx($PRODUCT_ID);

	echo "53434";print_r(Add2BasketByProductID( $PRODUCT_ID, $quantity, array(), $arProductProps));
}*/

if (!CModule::IncludeModule('alexkova.emarket')) return;

if (!CModule::IncludeModule("sale") || !CModule::IncludeModule("iblock") || !CModule::IncludeModule("catalog"))
{
	ShowError(GetMessage("SALE_MODULE_NOT_INSTALL"));
	return;
}

$arResult = array();

global $eMarketBasketData;
$eMarketBasketData = array(
	"DELAY"=>array(),
	"ITEMS"=>array(),
	"ALL"=>array()
);

$itemID = intval($_REQUEST["item"]);
if ($itemID>0){

	switch($_REQUEST["action"]){
		case "ADDTOCART":

			$delayed = false;
			if (isset($_REQUEST["delay"]) && $_REQUEST["delay"]=="yes"){
				$delayed = true;
			}
			Alexkova\Emarket\Sale\Basket::addToBasket($itemID, intval($_REQUEST["quantity"]), $delayed);
                        $arResult["PRODUCT_INFO"] = Alexkova\Emarket\Sale\Basket::getPorductInfoByProductId($itemID);
                        $arResult["PRODUCT_INFO"]["DELAY"] = $delayed;
			break;
		case "DELETEFROMCART":
			echo CSaleBasket::Delete($itemID);// сделать проверку на вшивость
			break;
		case "DELAYFROMCART":
			Alexkova\Emarket\Sale\Basket::delayItem($itemID);
			break;
		case "ADDBACKCART":
			Alexkova\Emarket\Sale\Basket::toCart($itemID);
			break;
		case "SETNEWQTY":
			Alexkova\Emarket\Sale\Basket::newQty($itemID, intval($_REQUEST["quantity"]));
			break;
	}
}

$arParams["PATH_TO_BASKET"] = Trim($arParams["PATH_TO_BASKET"]);
$arParams["PATH_TO_ORDER"] = Trim($arParams["PATH_TO_ORDER"]);

$newBasketUserID = CSaleBasket::GetBasketUserID(true);

if($newBasketUserID>0){
	$rsBaskets = CSaleBasket::GetList(
		array("ID" => "ASC"),
		array("FUSER_ID" => $newBasketUserID, "LID" => SITE_ID, "ORDER_ID" => "NULL"),
		false,
		false,
		array(
			"ID", "NAME", "CALLBACK_FUNC", "MODULE", "PRODUCT_ID", "QUANTITY", "DELAY", "CAN_BUY",
			"PRICE", "WEIGHT", "DETAIL_PAGE_URL", "NOTES", "CURRENCY", "VAT_RATE", "CATALOG_XML_ID", "MEASURE_NAME",
			"PRODUCT_XML_ID", "SUBSCRIBE", "DISCOUNT_PRICE", "PRODUCT_PROVIDER_CLASS", "TYPE", "SET_PARENT_ID"
		)
	);
	$arPrice = 0;
	$arDelayPrice = 0;
	$tmpCurrency = "";
	$arTradeList = array();
	while ($arItem = $rsBaskets->GetNext())
	{
                if (CSaleBasketHelper::isSetItem($arItem))
                    continue;
                
		if (!isset($arTradeList[$arItem["PRODUCT_ID"]])){
			$arTradeList[$arItem["PRODUCT_ID"]] = CCatalogProduct::GetByIDEx($arItem["PRODUCT_ID"]);
			if ($arTradeList[$arItem["PRODUCT_ID"]]["DETAIL_PICTURE"]>0){
				$arTradeList[$arItem["PRODUCT_ID"]]["DETAIL_PICTURE"] = CFile::GetFileArray($arTradeList[$arItem["PRODUCT_ID"]]["DETAIL_PICTURE"]);
			}
		}

		if (is_array($arTradeList[$arItem["PRODUCT_ID"]]["DETAIL_PICTURE"]))
			$arItem["PICTURE"] = $arTradeList[$arItem["PRODUCT_ID"]]["DETAIL_PICTURE"]["SRC"];

		if (
			isset($arTradeList[$arItem["PRODUCT_ID"]]["PROPERTIES"]["CML2_LINK"]["VALUE"]) &&
			$arTradeList[$arItem["PRODUCT_ID"]]["PROPERTIES"]["CML2_LINK"]["VALUE"]>0
		){
			$arItem["PARENT"] = $arTradeList[$arItem["PRODUCT_ID"]]["PROPERTIES"]["CML2_LINK"]["VALUE"];
			if (!isset($arTradeList[$arTradeList[$arItem["PRODUCT_ID"]]["PROPERTIES"]["CML2_LINK"]["VALUE"]])){
				$arTradeList[$arTradeList[$arItem["PRODUCT_ID"]]["PROPERTIES"]["CML2_LINK"]["VALUE"]] = CCatalogProduct::GetByIDEx($arTradeList[$arItem["PRODUCT_ID"]]["PROPERTIES"]["CML2_LINK"]["VALUE"]);
				if ($arTradeList[$arTradeList[$arItem["PRODUCT_ID"]]["PROPERTIES"]["CML2_LINK"]["VALUE"]]["DETAIL_PICTURE"]>0){
					$arTradeList[$arTradeList[$arItem["PRODUCT_ID"]]["PROPERTIES"]["CML2_LINK"]["VALUE"]]["DETAIL_PICTURE"] = CFile::GetFileArray($arTradeList[$arTradeList[$arItem["PRODUCT_ID"]]["PROPERTIES"]["CML2_LINK"]["VALUE"]]["DETAIL_PICTURE"]);
				}
			}
			$arTradeList[$arItem["PRODUCT_ID"]]["PARENT"] = $arTradeList[$arItem["PRODUCT_ID"]]["PROPERTIES"]["CML2_LINK"]["VALUE"];
			if (!isset($arItem["PICTURE"]) && (is_array($arTradeList[$arTradeList[$arItem["PRODUCT_ID"]]["PROPERTIES"]["CML2_LINK"]["VALUE"]]["DETAIL_PICTURE"])))
				$arItem["PICTURE"] = $arTradeList[$arTradeList[$arItem["PRODUCT_ID"]]["PROPERTIES"]["CML2_LINK"]["VALUE"]]["DETAIL_PICTURE"]["SRC"];
		}

		$arItem["URL"] = $arItem["DETAIL_PAGE_URL"];
		if ($arItem["PARENT"]>0){
			$arItem["URL"] = $arTradeList[$arItem["PARENT"]]["DETAIL_PAGE_URL"];
		}

		$arItem["FORMAT_PRICE"] = SaleFormatCurrency($arItem["PRICE"], $arItem["CURRENCY"]);
		$arItem["SUMM"] = $arItem["QUANTITY"] * $arItem["PRICE"];
		$arItem["FORMAT_SUMM"] = SaleFormatCurrency($arItem["SUMM"], $arItem["CURRENCY"]);

		if ($arItem["CAN_BUY"] == "Y" && $arItem["DELAY"] == "N"){
			$arBasketItems["CAN_BUY"][] = $arItem;
			$arPrice += $arItem["PRICE"]*$arItem["QUANTITY"];

			$eMarketBasketData["ITEMS"][] = $arItem["PRODUCT_ID"];
			$eMarketBasketData["ALL"][] = $arItem["PRODUCT_ID"];

		}elseif($arItem["CAN_BUY"] == "Y" && $arItem["DELAY"] == "Y")
		{
			$arBasketItems["DELAY"][] = $arItem;
			$arDelayPrice += $arItem["PRICE"]*$arItem["QUANTITY"];
			$eMarketBasketData["DELAY"][] = $arItem["PRODUCT_ID"];
			$eMarketBasketData["ALL"][] = $arItem["PRODUCT_ID"];
		}
		$tmpCurrency = $arItem["CURRENCY"];

	}
}

$arResult["BASKET_ITEMS"] = $arBasketItems;
$arResult["CATALOG"] = $arTradeList;
$arResult["SUMM"] = $arPrice;
$arResult["FORMAT_SUMM"] = SaleFormatCurrency($arResult["SUMM"], $tmpCurrency);
$arResult["DELAY_SUMM"] = $arDelayPrice;
$arResult["FORMAT_DELAY_SUMM"] = SaleFormatCurrency($arResult["DELAY_SUMM"], $tmpCurrency);

//echo "<pre>"; print_r($arResult); echo "</pre>";
//echo "<pre>"; print_r($arParams); echo "</pre>";

$this->IncludeComponentTemplate();
