<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?
$addClass='';
if ($arParams["USE_IN_LG_MODE"] != "Y") $addClass = " lg-hide";
if ($arParams["USE_IN_MD_MODE"] != "Y") $addClass = " md-hide";
if ($arParams["USE_IN_SM_MODE"] != "Y") $addClass = " sm-hide";
if ($arParams["USE_IN_XS_MODE"] != "Y") $addClass = " xs-hide";

$addClass .= " prm_".strtolower($arParams["BANTYPE"]);
?>
<div class="rk-fullwidth <?=$addClass?>"><div class="rk-fullwidth-canvas">
<?$APPLICATION->IncludeComponent("alexkova.emarket:slider.revolution", "", Array(
		"TYPE" => $arParams["BANTYPE"],	// Тип баннера
		"NOINDEX" => "N",	// Добавлять в ссылки noindex/nofollow
		"COUNT_SLIDE" => "5",	// Количество слайдов
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],	// Тип кеширования
		"CACHE_TIME" => "0",	// Время кеширования (сек.)
	),
	false
);?></div></div>
