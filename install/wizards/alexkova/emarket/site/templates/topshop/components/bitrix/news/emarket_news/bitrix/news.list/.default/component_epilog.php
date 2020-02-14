<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?

if ($section = array_pop($arResult["SECTION"]["PATH"])){
	$APPLICATION->SetPageProperty('h1',$section["NAME"]);
	$APPLICATION->SetPageProperty('title',$section["NAME"]);
}
