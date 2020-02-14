<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Магазины");
?>

<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.store", 
	"stores", 
	array(
		"SEF_MODE" => "Y",
		"SEF_FOLDER" => "#SITE_DIR#company/store/",
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "3600",
		"PHONE" => "Y",
		"SCHEDULE" => "Y",
		"SET_TITLE" => "Y",
		"TITLE" => "Наши магазины",
		"MAP_TYPE" => "1",
		"SEF_URL_TEMPLATES" => array(
			"liststores" => "index.php",
			"element" => "#store_id#/",
		)
	),
	false
);?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>