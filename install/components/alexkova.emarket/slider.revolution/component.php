<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

//Params
$arParams["TYPE"] = (isset($arParams["TYPE"]) ? trim($arParams["TYPE"]) : "");

if($arParams["NOINDEX"] <> "Y")
	$arParams["NOINDEX"] = "N";

if ($arParams["CACHE_TYPE"] == "Y" || ($arParams["CACHE_TYPE"] == "A" && COption::GetOptionString("main", "component_cache_on", "Y") == "Y"))
	$arParams["CACHE_TIME"] = intval($arParams["CACHE_TIME"]);
else
	$arParams["CACHE_TIME"] = 0;

//Result
$arResult = Array(

);

function GetBanners($TYPE_SID, $count)
{
	$arReturn = array();


	for ($i=0; $i<$count; $i++){
		$arBanner = CAdvBanner::GetRandom($TYPE_SID);

		if ($arBanner["IMAGE_ID"]>0){
			$url = $arBanner["URL"];
			$url = CAdvBanner::PrepareHTML($url, $arBanner);
			$url = CAdvBanner::GetRedirectURL($url, $arBanner);
			$target = (strlen(trim($arBanner["URL_TARGET"]))>0) ? " target=\"".$arBanner["URL_TARGET"]."\" " : "";
			$dest = explode("#",$arBanner["CODE"]);

			$arReturn[] = array(
				"IMAGE" => CFile::GetFileArray($arBanner["IMAGE_ID"]),
				"URL" => $url,
				"URL_TARGET" => $target,
				"CODE" => $dest
			);

			CAdvBanner::FixShow($arBanner);
		}
	}

	return $arReturn;
}



if ($this->StartResultCache()){

	$arResult = GetBanners($arParams["TYPE"], $arParams["COUNT_SLIDE"]);
	//echo "<pre>"; print_r($arResult); echo "</pre>";
	$this->IncludeComponentTemplate();
}

?>