<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if ($arResult["ID"]){

	if ($arResult["DETAIL_PICTURE"]){
		$arResult["PICTURE"] = $arResult["DETAIL_PICTURE"];
	}elseif($arResult["PREVIEW_PICTURE"]){
		$arResult["PICTURE"] = $arResult["PREVIEW_PICTURE"];
	}

	$arSelect = Array("ID", "ACTIVE_TO", "IBLOCK_SECTION_ID");
	$arFilter = Array("IBLOCK_ID"=>$arParams["IBLOCK_ID"], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID" => $arResult["ID"]);
	$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);

	$addInfo = array();
	$sectionID = NULL;
	if($arFields = $res->fetch())
	{
		$addInfo = $arFields;
		if ($arFields["IBLOCK_SECTION_ID"] && !in_array($arFields["IBLOCK_SECTION_ID"],$sectionIDs)){
			$sectionID = $arFields["IBLOCK_SECTION_ID"];
		}
	}

	if ($sectionID){
		/*PATH*/
		$nav = CIBlockSection::GetNavChain($arParams["IBLOCK_ID"],$sectionID);
		$nav->SetUrlTemplates("", $arParams["SECTION_URL"]);
		while($arSectionPath = $nav->GetNext()){
			$arResult["PATH"][] = array("NAME" => $arSectionPath["NAME"], "SECTION_PAGE_URL" => $arSectionPath["SECTION_PAGE_URL"]);
		}
		/**/

		$arFilter = Array('IBLOCK_ID'=>$arParams["IBLOCK_ID"], 'GLOBAL_ACTIVE'=>'Y', "ID" => $sectionID);
		$db_list = CIBlockSection::GetList(Array(), $arFilter, false, array("ID","NAME","IBLOCK_ID"));
		$db_list->SetUrlTemplates("", $arParams["SECTION_URL"]);
		$sections = array();
		if($ar_result = $db_list->GetNext())
		{
			$arResult["SECTION"] = $ar_result;
		}
	}

	if((in_array("ACTIVE_TO",$arParams["FIELD_CODE"]) || in_array("DATE_ACTIVE_TO",$arParams["FIELD_CODE"]) ) && strlen($addInfo["ACTIVE_TO"]) > 0)
		$arResult["DISPLAY_ACTIVE_TO"] = CIBlockFormatProperties::DateFormat($arParams["ACTIVE_DATE_FORMAT"], MakeTimeStamp($addInfo["ACTIVE_TO"], CSite::GetDateFormat()));
	else
		$arResult["DISPLAY_ACTIVE_TO"] = "";


	/*component epilog*/
	if ($arResult["PATH"]){
		$cp = $this->__component; // объект компонента
		if (is_object($cp))
		{
			$cp->SetResultCacheKeys(array('PATH'));
		}
	}
}
