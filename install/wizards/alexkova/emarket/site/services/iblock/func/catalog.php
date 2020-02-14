<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

function deleteCatalog($IBLOCK_CATALOG_ID){
	global $APPLICATION;
	$boolFlag = true;
	$arSKU = CCatalogSKU::GetInfoByProductIBlock($IBLOCK_CATALOG_ID);
	if (!empty($arSKU))
	{
		$boolFlag = CCatalog::UnLinkSKUIBlock($IBLOCK_CATALOG_ID);
		if (!$boolFlag)
		{
			$strError = "";
			if ($ex = $APPLICATION->GetException())
			{
				$strError = $ex->GetString();
			}
			else
			{
				$strError = "Couldn't unlink iblocks";
			}
			//die($strError);
		}
		$boolFlag = CIBlock::Delete($arSKU['IBLOCK_ID']);
		if (!$boolFlag)
		{
			$strError = "";
			if ($ex = $APPLICATION->GetException())
			{
				$strError = $ex->GetString();
			}
			else
			{
				$strError = "Couldn't delete offers iblock";
			}
			//die($strError);
		}
	}
	if ($boolFlag)
	{
		$boolFlag = CIBlock::Delete($IBLOCK_CATALOG_ID);
		if (!$boolFlag)
		{
			$strError = "";
			if ($ex = $APPLICATION->GetException())
			{
				$strError = $ex->GetString();
			}
			else
			{
				$strError = "Couldn't delete catalog iblock";
			}
			//die($strError);
		}
	}
	if ($boolFlag)
	{
		$IBLOCK_CATALOG_ID = false;
	}
}



function createCatalogIblock($LID){


	$arIblock = GetMessage("CATALOG_IBLOCK");
	$arIblock["LID"] = $LID;
	$arIblock["XML_ID"] = 'kc_emarket_catalog';
	$arIblock["CODE"] = 'catalog';

	$iblock = new CIBlock;
	$IBLOCK_ID = $iblock->Add($arIblock);
	if ($IBLOCK_ID) {

		$arFields = GetMessage("CATALOG_FIELDS");

		CIblock::SetFields($IBLOCK_ID, $arFields);
		return $IBLOCK_ID;
	}

	return false;
}

function createOffersIblock($LID){

	$arIblock = GetMessage("OFFER_IBLOCK");
	$arIblock["LID"] = $LID;
	$arIblock["XML_ID"] = 'kc_emarket_offers';
	$arIblock["CODE"] = 'offers';

	$iblock = new CIBlock;
	$IBLOCK_ID = $iblock->Add($arIblock);
	if ($IBLOCK_ID) {

		$arFields = GetMessage("OFFER_FIELDS");

		CIblock::SetFields($IBLOCK_ID, $arFields);
		return $IBLOCK_ID;
	}

	return false;
}

function readyCatalogIblock($IBLOCK_ID, $iblockCode){
	//file_put_contents($_SERVER['DOCUMENT_ROOT']."/log.txt", "10-".var_export($iblockCodeDef, true)."\n",FILE_APPEND);

	$arUpdate = array( "XML_ID" => $iblockCode);
	$iblock = new CIBlock;
	$iblock->Update($IBLOCK_ID, $arUpdate);
}

?>