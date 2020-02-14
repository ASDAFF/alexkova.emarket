<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?$APPLICATION->IncludeComponent(
	"alexkova.emarket:basket.small",
	"",
	Array(
		"PATH_TO_BASKET" => SITE_DIR."personal/basket/",
		"PATH_TO_ORDER" => SITE_DIR."personal/order/"
	)
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>