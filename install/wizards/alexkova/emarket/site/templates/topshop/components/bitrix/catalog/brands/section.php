<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
use Bitrix\Main\Loader;
use Bitrix\Highloadblock\HighloadBlockTable;
use Alexkova\Emarket\Catalog\Image;

$this->setFrameMode(true);
?>

<?


$arParams['USE_FILTER'] = (isset($arParams['USE_FILTER']) && $arParams['USE_FILTER'] == 'Y' ? 'Y' : 'N');
if (isset($arResult["VARIABLES"]["SECTION_CODE"]) && strlen($arResult["VARIABLES"]["SECTION_CODE"])>0){
	global $arrFilter;
	$arrFilter["PROPERTY_MANUFACTURER"] = strval($arResult["VARIABLES"]["SECTION_CODE"]);
}

?>
<?
$arFilter = array(
	"IBLOCK_ID" => $arParams["IBLOCK_ID"],
	"ACTIVE" => "Y",
	"GLOBAL_ACTIVE" => "Y",
);

/*
if (0 < intval($arResult["VARIABLES"]["SECTION_ID"]))
{
	$arFilter["ID"] = $arResult["VARIABLES"]["SECTION_ID"];
}
elseif ('' != $arResult["VARIABLES"]["SECTION_CODE"])
{
	$arFilter["=CODE"] = $arResult["VARIABLES"]["SECTION_CODE"];
}*/

if (!Loader::includeModule('highloadblock'))
{
	ShowError(GetMessage("IBLOCK_CBB_HLIBLOCK_NOT_INSTALLED"));
	return false;
}

$arFilter["CODE"] = strval($arResult["VARIABLES"]["SECTION_CODE"]);

$obCache = new CPHPCache();
if ($obCache->InitCache(36000, serialize($arFilter), "/iblock/catalog"))
{
	$arCurSection = $obCache->GetVars();

}
elseif ($obCache->StartDataCache())
{

	$arCurSection = array();
	$hlblock = \Bitrix\Highloadblock\HighloadBlockTable::getList(
		array(
			"filter" => array(
				'TABLE_NAME' => 'emarketbrands'
			)
		)
	)->fetch();

	if ($hlblock["ID"]>0){
		$entity = \Bitrix\Highloadblock\HighloadBlockTable::compileEntity($hlblock);
		$entityDataClass = $entity->getDataClass();

		$dFilter = array('filter' => array(
			'UF_XML_ID' => array(strval($arResult["VARIABLES"]["SECTION_CODE"]))
		));

		$rsPropEnums = $entityDataClass::getList($dFilter);

		if ($arCurSection = $rsPropEnums->fetch()){
			if ($arCurSection["UF_FILE"]>0){
				$arCurSection["PICTURE"] = \Alexkova\Emarket\Catalog\Image::getResizeImage($arCurSection["UF_FILE"], 200);
			}
			$obCache->EndDataCache($arCurSection);
		}
	}
}

?>

<div class="span_1_of_5 sm-span_5_of_5 xs-span_5_of_5">

	<div class="span_5_of_5 sm-hide xs-hide">


		<?$APPLICATION->IncludeComponent(
			"bitrix:catalog.section.list",
			"emarket_left_tree",
			array(
				"IBLOCK_TYPE" => "catalog",
				"IBLOCK_ID" => $arParams["IBLOCK_ID"],
				"SECTION_ID" => $_REQUEST["SECTION_ID"],
				"SECTION_CODE" => "",
				"COUNT_ELEMENTS" => "N",
				"TOP_DEPTH" => "5",
				"SECTION_FIELDS" => array(
					0 => "NAME",
					1 => "",
				),
				"SECTION_USER_FIELDS" => array(
					0 => "",
					1 => "",
				),
				"VIEW_MODE" => "LIST",
				"SHOW_PARENT_NAME" => "Y",
				"SECTION_URL" => "",
				"CACHE_TYPE" => "N",
				"CACHE_TIME" => "36000000",
				"CACHE_GROUPS" => "Y",
				"ADD_SECTIONS_CHAIN" => "N"
			),
			false
		);?>

		<?$APPLICATION->IncludeComponent(
			"alexkova.emarket:admanager",
			"full-responsive",
			array(
				"SHOW" => "COLUMN",
				"BANTYPE" => "COLUMN",
				"CACHE_TYPE" => "A",
				"CACHE_TIME" => "0",
				"USE_IN_LG_MODE" => "Y",
				"USE_IN_MD_MODE" => "Y",
				"USE_IN_SM_MODE" => "Y",
				"USE_IN_XS_MODE" => "N"
			),
			false
		);?>
	</div>

	<?//$APPLICATION->ShowViewContent('emarket_bestsellers_vertical');?>

</div>

<div class="span_4_of_5 sm-span_5_of_5 xs-span_5_of_5">


<div class="span_5_of_5">
	<?$APPLICATION->IncludeComponent(
		"alexkova.emarket:admanager",
		"full-responsive",
		array(
			"SHOW" => "CATALOG_TOP_INNER",
			"BANTYPE" => "CATALOG_TOP_INNER",
			"CACHE_TYPE" => "A",
			"CACHE_TIME" => "0",
			"USE_IN_LG_MODE" => "Y",
			"USE_IN_MD_MODE" => "Y",
			"USE_IN_SM_MODE" => "Y",
			"USE_IN_XS_MODE" => "N"
		),
		false
	);?>
</div>

<?if (isset($arCurSection))
{

$titleBrand = $arCurSection["UF_NAME"];
if (strlen($arParams["BRAND_PAGE_MASK"])>0){
	$titleBrand = str_replace('#BRAND_NAME#', $titleBrand, $arParams["BRAND_PAGE_MASK"]);
}

$APPLICATION->SetPageProperty('h1', $titleBrand);
$APPLICATION->SetPageProperty('description', $titleBrand);
?>
<div class="span_5_of_5 brand_section">
	<h1><?$APPLICATION->ShowTitle('h1')?></h1>
	<?if(strlen($arCurSection["PICTURE"])>0):?>
		<img src="<?=$arCurSection["PICTURE"]?>" align="right">
	<?endif;?>
	<?=$arCurSection["UF_FULL_DESCRIPTION"]?>
</div>
<?}
?>
<?

$intSectionID = 0;

?>

<?$APPLICATION->IncludeComponent(
	"alexkova.emarket:sort.panel",
	"",
	array(
	),
	false
);?>

<?
if (isset($_SESSION["USER_SORTPANEL"]) && is_array($_SESSION["USER_SORTPANEL"]))
{
	foreach ($_SESSION["USER_SORTPANEL"] as $cell=>$val)
	{
		$_REQUEST[$cell] = $val;
	}
}

$sort = "price";
$sort_order = "asc";

global $arSortGlobal;;

$sort = $arSortGlobal["sort"];
$sort_order = $arSortGlobal["sort_order"];

$view = trim(strip_tags($_REQUEST["view"]));
if(in_array($view,array('.default','list','table')))
	$template = $view;
else
	$template = '.default';

if ($_REQUEST['products_on_page']){
	$productsOnPage = intval($_REQUEST['products_on_page']);
}else{
	$productsOnPage = 15;
}
?>

<?$intSectionID = $APPLICATION->IncludeComponent(
	"bitrix:catalog.section",
	$template,
	array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"ELEMENT_SORT_FIELD" => $sort,
		"ELEMENT_SORT_ORDER" => $sort_order,
		"ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
		"ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
		"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
		"META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
		"META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
		"BROWSER_TITLE" => $arParams["LIST_BROWSER_TITLE"],
		"INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
		"BASKET_URL" => $arParams["BASKET_URL"],
		"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
		"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
		"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
		"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
		"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
		"FILTER_NAME" => $arParams["FILTER_NAME"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_FILTER" => $arParams["CACHE_FILTER"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"SET_TITLE" => $arParams["SET_TITLE"],
		"SET_STATUS_404" => $arParams["SET_STATUS_404"],
		"DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
		"PAGE_ELEMENT_COUNT" => $arParams["PAGE_ELEMENT_COUNT"],
		"LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
		"PRICE_CODE" => $arParams["PRICE_CODE"],
		"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
		"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],

		"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
		"USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
		"ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
		"PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
		"PRODUCT_PROPERTIES" => $arParams["PRODUCT_PROPERTIES"],

		"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
		"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
		"PAGER_TITLE" => $arParams["PAGER_TITLE"],
		"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
		"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
		"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
		"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
		"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],

		"OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
		"OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
		"OFFERS_PROPERTY_CODE" => $arParams["LIST_OFFERS_PROPERTY_CODE"],
		"OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
		"OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
		"OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
		"OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
		"OFFERS_LIMIT" => $arParams["LIST_OFFERS_LIMIT"],

		"SECTION_ID" => "",
		"SECTION_CODE" => "",
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"DETAIL_URL" => $arResult["URL_TEMPLATES"]["element"],
		'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
		'CURRENCY_ID' => $arParams['CURRENCY_ID'],
		'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
		"INCLUDE_SUBSECTIONS"=>"Y",
		"SHOW_ALL_WO_SECTION"=>"Y",

		'LABEL_PROP' => $arParams['LABEL_PROP'],
		'ADD_PICT_PROP' => $arParams['ADD_PICT_PROP'],
		'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],

		'OFFER_ADD_PICT_PROP' => $arParams['OFFER_ADD_PICT_PROP'],
		'OFFER_TREE_PROPS' => $arParams['OFFER_TREE_PROPS'],
		'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
		'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
		'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
		'MESS_BTN_BUY' => $arParams['MESS_BTN_BUY'],
		'MESS_BTN_ADD_TO_BASKET' => $arParams['MESS_BTN_ADD_TO_BASKET'],
		'MESS_BTN_SUBSCRIBE' => $arParams['MESS_BTN_SUBSCRIBE'],
		'MESS_BTN_DETAIL' => $arParams['MESS_BTN_DETAIL'],
		'MESS_NOT_AVAILABLE' => $arParams['MESS_NOT_AVAILABLE'],

		'TEMPLATE_THEME' => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
		"ADD_SECTIONS_CHAIN" => "N",
		"COMPARE_SCROLL_UP" => "Y"
	),
	$component
);?>


<div class="span_5_of_5">
	<?$APPLICATION->IncludeComponent(
		"alexkova.emarket:admanager",
		"full-responsive",
		array(
			"SHOW" => "CATALOG_BOTTOM_INNER",
			"BANTYPE" => "CATALOG_BOTTOM_INNER",
			"CACHE_TYPE" => "A",
			"CACHE_TIME" => "0",
			"USE_IN_LG_MODE" => "Y",
			"USE_IN_MD_MODE" => "Y",
			"USE_IN_SM_MODE" => "Y",
			"USE_IN_XS_MODE" => "N"
		),
		false
	);?>
</div>

</div>
<div class="clear"></div>

<?if ($arParams["COMPARE_SCROLL_UP"] == "Y"):?>
	<script>
		$(document).ready(function(){
			eMarket.Compare.scrollUp = true;
		})
	</script>
<?endif;?>
