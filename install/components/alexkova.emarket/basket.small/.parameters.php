<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arComponentParameters = Array(
	"PARAMETERS" => Array(
		"PATH_TO_BASKET" => Array(
			"NAME" => GetMessage("SBBS_PATH_TO_BASKET"),
			"TYPE" => "STRING",
			"MULTIPLE" => "N",
			"DEFAULT" => "/personal/basket.php",
			"COLS" => 25,
			"PARENT" => "ADDITIONAL_SETTINGS",
		),
		"PATH_TO_ORDER" => Array(
			"NAME" => GetMessage("SBBS_PATH_TO_ORDER"),
			"TYPE" => "STRING",
			"MULTIPLE" => "N",
			"DEFAULT" => "/personal/order.php",
			"COLS" => 25,
			"PARENT" => "ADDITIONAL_SETTINGS",
		),
                "SHOW_UNIT_MEASUREMENT" => array(
			"NAME" => GetMessage("SHOW_UNIT_MEASUREMENT"),
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "N",
		),
	)
);
?>