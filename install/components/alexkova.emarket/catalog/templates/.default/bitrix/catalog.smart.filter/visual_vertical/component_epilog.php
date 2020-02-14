<?
use Alexkova\Emarket\Catalog\Filter;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $templateData */
/** @var @global CMain $APPLICATION */
global $APPLICATION;
CJSCore::Init(array("fx"));


if(CModule::IncludeModule('alexkova.emarket'))
	Filter::setActiveValues($arResult["ACTIVE_VALUES"]);
if (CModule::IncludeModule('alexkova.megametatags') && is_array($arResult["ACTIVE_VALUES"]))
{
	$seoFilterValuesSeparator = ", ";
	$activePropCodes = array();
	foreach ($arResult["ACTIVE_VALUES"] as $property)
	{
		$activePropCodes[] = $property["CODE"] ?: $property["ID"];
		if(!is_array($property["VALUES"]))
			continue;
		$seoNames = array();
		foreach ($property["VALUES"] as $value)
		{
			$seoNames[] = $value["VALUE"];
		}
		$propCode = $property["CODE"]?:$property["ID"];
		$seoKeys[] = array(
			"KEY" => "FILTER_".$propCode,
			"VALUE" => implode(', ',$seoNames),
			"WHERE_SET" => $templateFolder."/component_epilog.php"
		);
		$seoKeys[] = array(
			"KEY" => "FILTER_".$propCode."_SET",
			"VALUE" => implode($seoFilterValuesSeparator,$seoNames),
			"WHERE_SET" => $templateFolder."/component_epilog.php"
		);
	}
	//all props set in keys FILTER_#PROP_CODE# (not checked in filter are empty) - need for SEO rules (module alexkova.megametatags)
	//and all checked in filter props set in keys FILTER_#PROP_CODE#_SET
	if(is_array($arResult["PROP_CODES"]))
	{
		foreach($arResult["PROP_CODES"] as $code)
		{
			if(in_array($code, $activePropCodes))
				continue;
			$seoKeys[] = array(
				"KEY" => "FILTER_".$code,
				"VALUE" => "",
				"WHERE_SET" => $templateFolder."/component_epilog.php"
			);
		}
	}
	CMegaMetaKeys::setKeys($seoKeys);
}
