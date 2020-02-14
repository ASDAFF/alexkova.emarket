<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arResult = array();

$BID = intval($_REQUEST["ID"])>0 ? intval($_REQUEST["ID"]): 0;

if (\Bitrix\Main\Loader::includeModule("iblock"))
{
	if ($this->StartResultCache(false,array($BID))){

		if ($BID>0){
			$templatePage = "get_list";

			$arSelect = array("ID", "NAME", "PROPERTY_ITEMS");
			$arFilter = array(
				"ACTIVE"=>"Y",
				"ID"=>$BID,
				"IBLOCK_ID"=>$arParams["BESTSELLER_IBLOCK_ID"]
			);
			$res = CIblockElement::GetList(array(), $arFilter, false, false, $arSelect);
			if ($arFields = $res->Fetch()){

				if (is_array($arFields["PROPERTY_ITEMS_VALUE"]) && count($arFields["PROPERTY_ITEMS_VALUE"])>0){
					$arResult["BESTSELLERS_ITEMS"] = $arFields["PROPERTY_ITEMS_VALUE"];
				}
			}
                        $this->IncludeComponentTemplate($templatePage);
		}else{
			$arSelect = array("ID", "NAME", "PROPERTY_ITEMS");
			$arFilter = array(
				"ACTIVE"=>"Y",
				"IBLOCK_ID"=>intval($arParams["BESTSELLER_IBLOCK_ID"]),
			);

			$res = CIblockElement::GetList(array("SORT"=>"ASC"), $arFilter, false, false, $arSelect);
			while ($arFields = $res->Fetch()){
				if (is_array($arFields["PROPERTY_ITEMS_VALUE"]) && count($arFields["PROPERTY_ITEMS_VALUE"])>0){
					$arResult["ITEMS"][] = $arFields;
				}
			}
                        $this->IncludeComponentTemplate();
		}

		if (count($arResult["ITEMS"])<=0 && count($arResult["BESTSELLERS_ITEMS"])<=0) $this->AbortResultCache();
	}
        
}

?>