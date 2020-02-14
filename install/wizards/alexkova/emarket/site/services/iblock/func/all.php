<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

function getIblockID($iblockCode, $iblockType){
	$IBLOCK_CATALOG_ID = false;

	$res = CIblock::GetList(array(), array("XML_ID"=>$iblockCode, "IBLOCK_TYPE"=>$iblockType));
	if ($arFields = $res->Fetch()){
		$IBLOCK_CATALOG_ID = $arFields["ID"];
	}
	return $IBLOCK_CATALOG_ID;
}

function updateCatalogIblock($IBLOCK_CATALOG_ID,$LID){
	$arSites = array();
	$db_res = CIBlock::GetSite($IBLOCK_CATALOG_ID);
	while ($res = $db_res->Fetch())
		$arSites[] = $res["LID"];
	if (!in_array($LID, $arSites))
	{
		$arSites[] = $LID;
		$iblock = new CIBlock;
		$iblock->Update($IBLOCK_CATALOG_ID, array("LID" => $arSites));
	}
}

function createIblock($LID, $IBLOCK_CODE, $IBLOCKTYPE){


	$arIblock = GetMessage($IBLOCK_CODE."_DATA");
	$arIblock["LID"] = $LID;
	$arIblock["XML_ID"] = "kc_$IBLOCK_CODE";
	$arIblock["EXTERNAL_ID"] = "kc_$IBLOCK_CODE";
	unset($arIblock["SERVER_NAME"]);
	$arIblock["CODE"] = $IBLOCK_CODE;
	$arIblock["IBLOCK_TYPE"] = $IBLOCKTYPE;


	$iblock = new CIBlock;
	//file_put_contents($_SERVER['DOCUMENT_ROOT']."/log.txt", "100-".var_export($arIblock, true)."\n",FILE_APPEND);

	$IBLOCK_ID = $iblock->Add($arIblock);
	if ($IBLOCK_ID) {

		$arFields = GetMessage($IBLOCK_CODE."_FIELDS");

		CIblock::SetFields($IBLOCK_ID, $arFields);
		return $IBLOCK_ID;
	}

	return false;
}
?>