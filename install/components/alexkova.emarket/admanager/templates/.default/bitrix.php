<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?$this->createFrame()->begin('...');

$APPLICATION->IncludeComponent("bitrix:advertising.banner", ".default", array(
	"TYPE" => $arParams["BANTYPE"],
	"NOINDEX" => "N",
	"CACHE_TYPE" => $arParams["CACHE_TYPE"],
	"CACHE_TIME" => $arParams["CACHE_TIME"]
	),
	$component
);?>
