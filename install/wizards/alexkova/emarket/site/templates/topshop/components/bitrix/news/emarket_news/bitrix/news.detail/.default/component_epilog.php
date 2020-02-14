<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if( $arParams["ADD_SECTIONS_CHAIN"] == "Y" && $arResult["PATH"] && is_array($arResult["PATH"])){
	foreach($arResult["PATH"] as $section){
		$APPLICATION->AddChainItem($section["NAME"],$section["SECTION_PAGE_URL"]);
	}
}
$APPLICATION->SetPageProperty('h1',$arResult["NAME"]);