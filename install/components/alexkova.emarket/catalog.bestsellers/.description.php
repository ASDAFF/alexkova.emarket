<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => GetMessage("EMARKET_BESTSELLERS_NAME"),
	"DESCRIPTION" => GetMessage("EMARKET_BESTSELLERS_DESCRIPTION"),
	"ICON" => "/images/icon.gif",
	"COMPLEX" => "Y",
	"SORT" => 10,
	"PATH" => array(
		"ID" => "emarket",
		"NAME"=> GetMessage("MULTIMAG_SECTION_DESCRIPTION"),
	),
);

?>