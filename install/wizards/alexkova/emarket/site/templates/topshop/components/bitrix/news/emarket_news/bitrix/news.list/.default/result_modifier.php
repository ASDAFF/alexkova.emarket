<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if (!$arResult["ITEMS"] || !is_array($arResult["ITEMS"])){
	return;
}
$itemIds = array();

foreach($arResult["ITEMS"] as &$item){
	$itemIds[] = $item["ID"];

	//pictures
	$picture = NULL;

	if ($item["PREVIEW_PICTURE"]){
		$picture = $item["PREVIEW_PICTURE"];
	}elseif($item["DETAIL_PICTURE"]){
		$picture = $item["DETAIL_PICTURE"];
	}

	if ($picture) {
		$item["THUMB_PICTURE"] = $picture;

		$pictureId = $picture;
		if (is_array($picture))
			$pictureId = $picture["ID"];

		$tmpImg = CFile::ResizeImageGet($pictureId, array('width'=>288, 'height'=>138), BX_RESIZE_IMAGE_PROPORTIONAL, true);

		if ($tmpImg["src"]) {
			$item["THUMB_PICTURE"]["SRC"] =  $tmpImg["src"];
		}
	}
}

if ($itemIds){
	$arSelect = Array("ID", "ACTIVE_TO", "IBLOCK_SECTION_ID");
	$arFilter = Array("IBLOCK_ID"=>$arParams["IBLOCK_ID"], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID" => $itemIds);
	$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);

	$itemAddInfo = array();
	$sectionIDs = array();
	while($arFields = $res->fetch())
	{
		$itemAddInfo[$arFields["ID"]] = $arFields;
		if ($arFields["IBLOCK_SECTION_ID"] && !in_array($arFields["IBLOCK_SECTION_ID"],$sectionIDs)){
			$sectionIDs[] = $arFields["IBLOCK_SECTION_ID"];
		}
	}
	if ($sectionIDs){
		$arFilter = Array('IBLOCK_ID'=>$arParams["IBLOCK_ID"], 'GLOBAL_ACTIVE'=>'Y', "ID" => $sectionIDs);
		$db_list = CIBlockSection::GetList(Array(), $arFilter, false, array("ID","NAME","IBLOCK_ID","SECTION_PAGE_URL"));
		$db_list->SetUrlTemplates("", $arParams["SECTION_URL"]);
		$sections = array();
		while($ar_result = $db_list->GetNext())
		{
			$sections[$ar_result["ID"]] = $ar_result;
		}
	}

	foreach($arResult["ITEMS"] as &$item){

		if((in_array("ACTIVE_TO",$arParams["FIELD_CODE"]) || in_array("DATE_ACTIVE_TO",$arParams["FIELD_CODE"]) )  && strlen($itemAddInfo[$item["ID"]]["ACTIVE_TO"])>0)
			$item["DISPLAY_ACTIVE_TO"] = CIBlockFormatProperties::DateFormat($arParams["ACTIVE_DATE_FORMAT"], MakeTimeStamp($itemAddInfo[$item["ID"]]["ACTIVE_TO"], CSite::GetDateFormat()));
		else
			$item["DISPLAY_ACTIVE_TO"] = "";

		if ($sections[$item["IBLOCK_SECTION_ID"]]){
			$item["SECTION"] = $sections[$item["IBLOCK_SECTION_ID"]];
		}
	}
}
