<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arServices = Array(
	"main" => Array(
		"NAME" => GetMessage("SERVICE_MAIN_SETTINGS"),
		"STAGES" => Array(
			"files.php", // Copy bitrix files
			"search.php", // Indexing files
			"template.php", // Install template
			"theme.php", // Install theme
			"menu.php", // Install menu
			"settings.php",
			"form_answer.php", // ready
			"form_oneclick.php", // ready
			"form_phone.php", // ready
			"advertising.php", // ready
		),
	),
	"iblock" => Array(
		"NAME" => GetMessage("SERVICE_IBLOCK_DEMO_DATA"),
		"STAGES" => Array(
			"brands.php", // ready
			"types.php", //IBlock types
			"news.php",
			"actions.php",
			"slider.php",
			"articles.php",
			"services.php",

			"catalog_init.php",//catalog iblock import
			"offers_init.php",//catalog iblock import
			"catalog_load.php",//catalog iblock import
			"accessories.php",
			"offers_load.php",//catalog iblock import
			"offers_set.php",//catalog iblock import

			"bestsellers.php",

			"catalog_ready.php",//catalog iblock import
		),
	),
	"sale" => Array(
		"NAME" => GetMessage("SERVICE_SALE_DEMO_DATA"),
		"STAGES" => Array(
			"step1.php", "step2.php", "step3.php" // ready
		),
	),
	"catalog" => Array(
		"NAME" => GetMessage("SERVICE_CATALOG_SETTINGS"),
		"STAGES" => Array(
			"index.php",
		),
	),
	"forum" => Array(
		"NAME" => GetMessage("SERVICE_FORUM"),
		"STAGES" => Array(
			//"index.php" // ready
		),
	)
);
?>