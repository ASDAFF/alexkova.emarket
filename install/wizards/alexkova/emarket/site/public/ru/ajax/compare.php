<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.compare.list",
	"emarket-compare",
	Array(
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "#PRODUCT_IBLOCK_ID#",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"DETAIL_URL" => "",
		"COMPARE_URL" => SITE_DIR."catalog/compare.php",
		"NAME" => "CATALOG_COMPARE_LIST"
	)
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>
