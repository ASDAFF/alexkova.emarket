<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?
$this->createFrame()->begin('...');

$addClass='';
if ($arParams["USE_IN_LG_MODE"] != "Y") $addClass = " lg-hide";
if ($arParams["USE_IN_MD_MODE"] != "Y") $addClass = " md-hide";
if ($arParams["USE_IN_SM_MODE"] != "Y") $addClass = " sm-hide";
if ($arParams["USE_IN_XS_MODE"] != "Y") $addClass = " xs-hide";

$addClass .= " prm_".strtolower($arParams["BANTYPE"]);
?>

<div class="rk-fullwidth <?=$addClass?>"><div class="rk-fullwidth-canvas">
<?$APPLICATION->IncludeComponent("bitrix:advertising.banner", ".default", array(
	"TYPE" => $arParams["BANTYPE"],
	"NOINDEX" => "N",
	"CACHE_TYPE" => $arParams["CACHE_TYPE"],
	"CACHE_TIME" => $arParams["CACHE_TIME"]
	),
	$component
);?></div></div>
