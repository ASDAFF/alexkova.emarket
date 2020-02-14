<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>

<?$this->createFrame()->begin('...');

$APPLICATION->IncludeComponent("kuznica:banner", ".default", array(
	"BANTYPE" => $arParams["BANTYPE"],
	"MODE" => "SINGLE",
	"CACHE_TYPE" => $arParams["CACHE_TYPE"],
	"CACHE_TIME" => "0"
	),
	$component
);?>
