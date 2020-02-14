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
$this->setFrameMode(true);

?>


<div class="container-full catalog-container">
	<div class="span_4_of_5 sm-span_4_of_5 xs-span_5_of_5">
		<div class="span_5_of_5"><h1><?$APPLICATION->ShowTitle('h1')?></h1></div>

		<div class="span_5_of_5">

			<?
			$topBannerTemplate = 'full-static';
			$topBannerActive = "Y";
			$element_type = COption::GetOptionString("alexkova.emarket", "catalog_top_banner_type", "FIXED");
			if ($element_type == "DISABLE") $topBannerActive = "N";
			if ($element_type == "RESPONSIVE") $topBannerTemplate = "full-responsive";
			?>
			<?$APPLICATION->IncludeComponent("alexkova.emarket:admanager", $topBannerTemplate, array(
					"SHOW" => "CATALOG_TOP_INNER",
					"BANTYPE" => "CATALOG_TOP_INNER",
					"CACHE_TYPE" => "A",
					"CACHE_TIME" => "0",
					"USE_IN_LG_MODE" => "Y",
					"USE_IN_MD_MODE" => "Y",
					"USE_IN_SM_MODE" => "Y",
					"USE_IN_XS_MODE" => "N"
				),
				false,
				array(
					"ACTIVE_COMPONENT" => $topBannerActive
				)
			);?>
		</div>

		<?$APPLICATION->IncludeComponent(
			"bitrix:catalog.section.list",
			"catalog_index",
			array(
				"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
				"IBLOCK_ID" => $arParams["IBLOCK_ID"],
				"CACHE_TYPE" => $arParams["CACHE_TYPE"],
				"CACHE_TIME" => $arParams["CACHE_TIME"],
				"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
				"COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
				"TOP_DEPTH" => 2,//$arParams["SECTION_TOP_DEPTH"],
				"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
				"VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
				"SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
				"HIDE_SECTION_NAME" => (isset($arParams["SECTIONS_HIDE_SECTION_NAME"]) ? $arParams["SECTIONS_HIDE_SECTION_NAME"] : "N"),
				"ADD_SECTIONS_CHAIN" => (isset($arParams["ADD_SECTIONS_CHAIN"]) ? $arParams["ADD_SECTIONS_CHAIN"] : '')
			),
			$component
		);
		?>

		<?$this->SetViewTarget('emarket_bestsellers');?>
		<?
		if (\Bitrix\Main\ModuleManager::isModuleInstalled("sale"))
		{
			$arRecomData = array();
			$recomCacheID = array('IBLOCK_ID' => $arParams['IBLOCK_ID']);
			$obCache = new CPHPCache();
			if ($obCache->InitCache(36000, serialize($recomCacheID), "/sale/bestsellers"))
			{
				$arRecomData = $obCache->GetVars();
			}
			elseif ($obCache->StartDataCache())
			{
				if (\Bitrix\Main\Loader::includeModule("catalog"))
				{
					$arSKU = CCatalogSKU::GetInfoByProductIBlock($arParams['IBLOCK_ID']);
					$arRecomData['OFFER_IBLOCK_ID'] = (!empty($arSKU) ? $arSKU['IBLOCK_ID'] : 0);
				}
				$obCache->EndDataCache($arRecomData);
			}
			if (!empty($arRecomData))
			{
				?><?$APPLICATION->IncludeComponent("bitrix:sale.bestsellers", ".default", array(
					"HIDE_NOT_AVAILABLE" => $arParams["HIDE_NOT_AVAILABLE"],
					"PAGE_ELEMENT_COUNT" => "4",
					"SHOW_DISCOUNT_PERCENT" => $arParams['SHOW_DISCOUNT_PERCENT'],
					"PRODUCT_SUBSCRIPTION" => $arParams['PRODUCT_SUBSCRIPTION'],
					"SHOW_NAME" => "Y",
					"SHOW_IMAGE" => "Y",
					"MESS_BTN_BUY" => $arParams['MESS_BTN_BUY'],
					"MESS_BTN_DETAIL" => $arParams['MESS_BTN_DETAIL'],
					"MESS_NOT_AVAILABLE" => $arParams['MESS_NOT_AVAILABLE'],
					"MESS_BTN_SUBSCRIBE" => $arParams['MESS_BTN_SUBSCRIBE'],
					"LINE_ELEMENT_COUNT" => 4,
					"TEMPLATE_THEME" => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
					"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
					"CACHE_TYPE" => $arParams["CACHE_TYPE"],
					"CACHE_TIME" => $arParams["CACHE_TIME"],
					"BY" => array(
						0 => "AMOUNT",
					),
					"PERIOD" => array(
						0 => "15",
					),
					"FILTER" => array(
						0 => "CANCELED",
						1 => "ALLOW_DELIVERY",
						2 => "PAYED",
						3 => "DEDUCTED",
						4 => "N",
						5 => "P",
						6 => "F",
					),
					"FILTER_NAME" => $arParams["FILTER_NAME"],
					"ORDER_FILTER_NAME" => "arOrderFilter",
					"DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
					"SHOW_OLD_PRICE" => $arParams['SHOW_OLD_PRICE'],
					"PRICE_CODE" => $arParams["PRICE_CODE"],
					"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
					"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
					"CONVERT_CURRENCY" => $arParams['CONVERT_CURRENCY'],
					"BASKET_URL" => $arParams["BASKET_URL"],
					"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
					"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
					"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
					"ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
					"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
					"PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
					"USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
					"SHOW_PRODUCTS_".$arParams["IBLOCK_ID"] => "Y",
					"OFFER_TREE_PROPS_".$arRecomData['OFFER_IBLOCK_ID'] => $arParams["OFFER_TREE_PROPS"]
				),
				$component
			);
			}
		}
		?>
		<?$this->EndViewTarget();?>

		<?$this->SetViewTarget('emarket_bestsellers_vertical');?>
		<?
		if (\Bitrix\Main\ModuleManager::isModuleInstalled("sale"))
		{
			$arRecomData = array();
			$recomCacheID = array('IBLOCK_ID' => $arParams['IBLOCK_ID']);
			$obCache = new CPHPCache();
			if ($obCache->InitCache(36000, serialize($recomCacheID), "/sale/bestsellers"))
			{
				$arRecomData = $obCache->GetVars();
			}
			elseif ($obCache->StartDataCache())
			{
				if (\Bitrix\Main\Loader::includeModule("catalog"))
				{
					$arSKU = CCatalogSKU::GetInfoByProductIBlock($arParams['IBLOCK_ID']);
					$arRecomData['OFFER_IBLOCK_ID'] = (!empty($arSKU) ? $arSKU['IBLOCK_ID'] : 0);
				}
				$obCache->EndDataCache($arRecomData);
			}
			if (!empty($arRecomData))
			{
				?><?$APPLICATION->IncludeComponent("bitrix:sale.bestsellers", "vertical", array(
					"HIDE_NOT_AVAILABLE" => $arParams["HIDE_NOT_AVAILABLE"],
					"PAGE_ELEMENT_COUNT" => "4",
					"SHOW_DISCOUNT_PERCENT" => $arParams['SHOW_DISCOUNT_PERCENT'],
					"PRODUCT_SUBSCRIPTION" => $arParams['PRODUCT_SUBSCRIPTION'],
					"SHOW_NAME" => "Y",
					"SHOW_IMAGE" => "Y",
					"MESS_BTN_BUY" => $arParams['MESS_BTN_BUY'],
					"MESS_BTN_DETAIL" => $arParams['MESS_BTN_DETAIL'],
					"MESS_NOT_AVAILABLE" => $arParams['MESS_NOT_AVAILABLE'],
					"MESS_BTN_SUBSCRIBE" => $arParams['MESS_BTN_SUBSCRIBE'],
					"LINE_ELEMENT_COUNT" => 4,
					"TEMPLATE_THEME" => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
					"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
					"CACHE_TYPE" => $arParams["CACHE_TYPE"],
					"CACHE_TIME" => $arParams["CACHE_TIME"],
					"BY" => array(
						0 => "AMOUNT",
					),
					"PERIOD" => array(
						0 => "15",
					),
					"FILTER" => array(
						0 => "CANCELED",
						1 => "ALLOW_DELIVERY",
						2 => "PAYED",
						3 => "DEDUCTED",
						4 => "N",
						5 => "P",
						6 => "F",
					),
					"FILTER_NAME" => $arParams["FILTER_NAME"],
					"ORDER_FILTER_NAME" => "arOrderFilter",
					"DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
					"SHOW_OLD_PRICE" => $arParams['SHOW_OLD_PRICE'],
					"PRICE_CODE" => $arParams["PRICE_CODE"],
					"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
					"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
					"CONVERT_CURRENCY" => $arParams['CONVERT_CURRENCY'],
					"BASKET_URL" => $arParams["BASKET_URL"],
					"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
					"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
					"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
					"ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
					"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
					"PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
					"USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
					"SHOW_PRODUCTS_".$arParams["IBLOCK_ID"] => "Y",
					"OFFER_TREE_PROPS_".$arRecomData['OFFER_IBLOCK_ID'] => $arParams["OFFER_TREE_PROPS"]
				),
				$component
			);
			}
		}
		?>
		<?$this->EndViewTarget();?>


		<div class="span_5_of_5">
			<?
			$topBannerTemplate = 'full-static';
			$topBannerActive = "Y";
			$element_type = COption::GetOptionString("alexkova.emarket", "catalog_bottom_banner_type", "FIXED");
			if ($element_type == "DISABLE") $topBannerActive = "N";
			if ($element_type == "RESPONSIVE") $topBannerTemplate = "full-responsive";
			?>
			<?$APPLICATION->IncludeComponent("alexkova.emarket:admanager", $topBannerTemplate, array(
					"SHOW" => "CATALOG_BOTTOM_INNER",
					"BANTYPE" => "CATALOG_BOTTOM_INNER",
					"CACHE_TYPE" => "A",
					"CACHE_TIME" => "0",
					"USE_IN_LG_MODE" => "Y",
					"USE_IN_MD_MODE" => "Y",
					"USE_IN_SM_MODE" => "Y",
					"USE_IN_XS_MODE" => "N"
				),
				false,
				array(
					"ACTIVE_COMPONENT" => $topBannerActive
				)
			);?>
		</div>


	</div>
	<div class="span_1_of_5 sm-span_1_of_5 xs-hide">
		<?
		$topBannerTemplate = 'full-static';
		$topBannerActive = "Y";
		$element_type = COption::GetOptionString("alexkova.emarket", "column_banner_type", "FIXED");
		if ($element_type == "DISABLE") $topBannerActive = "N";
		if ($element_type == "RESPONSIVE") $topBannerTemplate = "full-responsive";
		?>
		<?$APPLICATION->IncludeComponent("alexkova.emarket:admanager", $topBannerTemplate, array(
				"SHOW" => "COLUMN",
				"BANTYPE" => "COLUMN",
				"CACHE_TYPE" => "A",
				"CACHE_TIME" => "0",
				"USE_IN_LG_MODE" => "Y",
				"USE_IN_MD_MODE" => "Y",
				"USE_IN_SM_MODE" => "Y",
				"USE_IN_XS_MODE" => "N"
			),
			false,
			array(
				"ACTIVE_COMPONENT" => $topBannerActive
			)
		);?>
		<br />
		<?$APPLICATION->ShowViewContent('emarket_bestsellers_vertical');?>
	</div>
	<div class="clear"></div>

</div>
