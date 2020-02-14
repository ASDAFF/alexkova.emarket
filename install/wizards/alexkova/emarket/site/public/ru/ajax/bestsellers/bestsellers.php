<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?$APPLICATION->IncludeComponent(
	"alexkova.emarket:catalog.bestsellers",
	".default",
	$_SESSION["BESTSELLER_SETTINGS"],
        false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>