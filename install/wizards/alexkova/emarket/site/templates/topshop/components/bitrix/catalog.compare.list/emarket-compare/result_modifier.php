<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$arIDS = array();
$iblockID = 0;
if (count($arResult)>0){

	$arResult = array(
		"ITEMS"=>$arResult
	);


	foreach($arResult["ITEMS"] as $arElement){
		$arIDS[] = $arElement["ID"];
		$iblockID = $arElement["IBLOCK_ID"];
	}

	$arFilter = array(
		"ACTIVE"=>"Y",
		"ID"=>$arIDS,
		"IBLOCK_ID"=>$iblockID
	);

	$arSelect = array("ID", "DETAIL_PICTURE");

	$res = CIblockElement::GetList(array(),$arFilter, false,false, $arSelect);
	while ($arFields = $res->Fetch()){
		if ($arFields["DETAIL_PICTURE"]>0) $arFields["DETAIL_PICTURE"] = CFile::GetFileArray($arFields["DETAIL_PICTURE"]);
		$arResult["DATA"][$arFields["ID"]] = $arFields;

	}
}
?>