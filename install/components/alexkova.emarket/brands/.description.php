<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => GetMessage("IBLOCK_CATALOG_NAME"),
	"DESCRIPTION" => GetMessage("IBLOCK_CATALOG_DESCRIPTION"),
	"ICON" => "/images/catalog.gif",
	"COMPLEX" => "Y",
	"SORT" => 10,
	"PATH" => array(
		"ID" => "emarket",
		"NAME"=> GetMessage("MULTIMAG_SECTION_DESCRIPTION"),
	),
);
?>