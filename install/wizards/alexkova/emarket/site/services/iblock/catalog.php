<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

if(!CModule::IncludeModule("iblock") || !CModule::IncludeModule("catalog"))
	return;

if(COption::GetOptionString("alexkova.emarket", "wizard_installed", "N", WIZARD_SITE_ID) == "Y" && !WIZARD_INSTALL_DEMO_DATA)
	return;

set_time_limit(0);

//catalog iblock import
$shopLocalization = $wizard->GetVar("shopLocalization");

if (strlen($shopLocalization)<=0) $shopLocalization = 'ru';

$iblockXMLFile = WIZARD_ABSOLUTE_PATH."/lang/".LANGUAGE_ID."/iblock/catalog/catalog.xml";
$iblockXMLFilePrices = WIZARD_ABSOLUTE_PATH."/lang/".LANGUAGE_ID."/iblock/catalog/catalog_prices.xml";

$iblockCode = "emarket_catalog_".WIZARD_SITE_ID;
$iblockType = "catalog";

$rsIBlock = CIBlock::GetList(array(), array("XML_ID" => $iblockCode, "TYPE" => $iblockType));

$IBLOCK_CATALOG_ID = false;
if ($arIBlock = $rsIBlock->Fetch())
{
	$IBLOCK_CATALOG_ID = $arIBlock["ID"];
}
else //for old furniture catalog
{
	$rsIBlock = CIBlock::GetList(array(), array("XML_ID" => "emarket_catalog", "TYPE" => $iblockType));
	if ($arIBlock = $rsIBlock->Fetch())
	{
		$IBLOCK_CATALOG_ID = $arIBlock["ID"];
	}
}

if (WIZARD_INSTALL_DEMO_DATA && $IBLOCK_CATALOG_ID)
{
	/*$boolFlag = true;
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
	*/
}

if($IBLOCK_CATALOG_ID == false || ($IBLOCK_CATALOG_ID))
{
	$permissions = Array(
		"1" => "X",
		"2" => "R"
	);
	$dbGroup = CGroup::GetList($by = "", $order = "", Array("STRING_ID" => "sale_administrator"));
	if($arGroup = $dbGroup -> Fetch())
	{
		$permissions[$arGroup["ID"]] = 'W';
	}
	$dbGroup = CGroup::GetList($by = "", $order = "", Array("STRING_ID" => "content_editor"));
	if($arGroup = $dbGroup -> Fetch())
	{
		$permissions[$arGroup["ID"]] = 'W';
	}

	/*$IBLOCK_CATALOG_ID = WizardServices::ImportIBlockFromXML(
		$iblockXMLFile,
		"emarket_catalog",
		$iblockType,
		WIZARD_SITE_ID,
		$permissions
	);*/

	$IBLOCK_CATALOG_ID = ImportXMLFile($iblockXMLFile, $iblockType, $site_id=WIZARD_SITE_ID, $section_action="N", $element_action="N", $use_crc=false, $preview=false, $sync=false, $return_last_error=false, $return_iblock_id=true);
	$IBLOCK_CATALOG_ID1 = ImportXMLFile($iblockXMLFilePrices, $iblockType, $site_id=WIZARD_SITE_ID, $section_action="N", $element_action="N", $use_crc=false, $preview=false, $sync=false, $return_last_error=false, $return_iblock_id=true);

	file_put_contents($_SERVER['DOCUMENT_ROOT']."/log.txt", var_export($IBLOCK_CATALOG_ID, true),FILE_APPEND);


	if ($IBLOCK_CATALOG_ID < 1)
		return;

	$_SESSION["WIZARD_CATALOG_IBLOCK_ID"] = $IBLOCK_CATALOG_ID;
}
else
{
	$arSites = array();
	$db_res = CIBlock::GetSite($IBLOCK_CATALOG_ID);
	while ($res = $db_res->Fetch())
		$arSites[] = $res["LID"];
	if (!in_array(WIZARD_SITE_ID, $arSites))
	{
		$arSites[] = WIZARD_SITE_ID;
		$iblock = new CIBlock;
		$iblock->Update($IBLOCK_CATALOG_ID, array("LID" => $arSites));
	}
}
file_put_contents($_SERVER['DOCUMENT_ROOT']."/log.txt", var_export($iblockXMLFile, true),FILE_APPEND);
file_put_contents($_SERVER['DOCUMENT_ROOT']."/log.txt", var_export("1\n", true),FILE_APPEND);
file_put_contents($_SERVER['DOCUMENT_ROOT']."/log.txt", var_export($iblockXMLFilePrices, true),FILE_APPEND);
file_put_contents($_SERVER['DOCUMENT_ROOT']."/log.txt", var_export("1\n", true),FILE_APPEND);


?>