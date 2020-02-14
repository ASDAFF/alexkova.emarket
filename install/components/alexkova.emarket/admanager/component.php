<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arResult = array();

if (CModule::IncludeModule('advertising'))
{
	$templatePage = 'bitrix';
}
elseif(CModule::IncludeModule('alexkova.rklite'))
{
	$templatePage = 'rklite';
}
else return;

$this->IncludeComponentTemplate($templatePage);

?>