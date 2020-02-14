<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>

<?$APPLICATION->IncludeComponent(
	"alexkova.emarket:catalog.markers",
	".default",
	$_SESSION["MARKERS_SETTINGS"],
	false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>