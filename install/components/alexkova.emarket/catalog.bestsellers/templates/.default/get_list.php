<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>

<?
$arParams["OFFERS_PROPERTY_CODE"] = array("CML2_LINK");

if (is_array($_SESSION["BESTSELLER_SETTINGS"])
	&& !empty($_SESSION["BESTSELLER_SETTINGS"])
	&& count($arResult["BESTSELLERS_ITEMS"])>0):

	$recomCacheIDs = $arResult["BESTSELLERS_ITEMS"];

	global $arrFilter;
	$arrFilter["ID"] = $recomCacheIDs;

	$APPLICATION->IncludeComponent(
		"bitrix:catalog.section",
		"bestseller_slider",
		$arParams,
		false,
		array('HIDE_ICONS' => 'Y')
	);
	?>
<?endif;?>