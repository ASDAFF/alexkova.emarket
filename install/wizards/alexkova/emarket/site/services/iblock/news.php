<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

if(!CModule::IncludeModule("iblock") || !CModule::IncludeModule("catalog"))
	return;

if(COption::GetOptionString("alexkova.emarket", "wizard_installed", "N", WIZARD_SITE_ID) == "Y" && !WIZARD_INSTALL_DEMO_DATA)
	return;

WizardServices::IncludeServiceLang("catalog.php", LANGUAGE_ID);
WizardServices::IncludeServiceLang("news_fields.php", LANGUAGE_ID);

$shopLocalization = $wizard->GetVar("shopLocalization");

include("func/all.php");
include("func/catalog.php");

$iblockCode = "kc_emarket_news_".WIZARD_SITE_ID;
$iblockCodeDef = "kc_emarket_news";
$iblockCodeS = "emarket_news";
$iblockType = "content";
//define('WIZARD_INSTALL_DEMO_DATA', true);

$IBLOCK_CATALOG_ID = false;

if (WIZARD_INSTALL_DEMO_DATA){
	$IBLOCK_CATALOG_ID = getIblockID($iblockCodeDef, $iblockType);
	if ($IBLOCK_CATALOG_ID){
		$boolFlag = CIBlock::Delete($IBLOCK_CATALOG_ID);
	}
}

$IBLOCK_CATALOG_ID = getIblockID($iblockCode, $iblockType);

if ($IBLOCK_CATALOG_ID == false){

	createIblock(WIZARD_SITE_ID, $iblockCodeS, $iblockType);

	$iblockXMLFile = WIZARD_ABSOLUTE_PATH."/lang/".LANGUAGE_ID."/iblock/content/news.xml";

	$IBLOCK_CATALOG_ID = getIblockID($iblockCodeDef, $iblockType);

	if($IBLOCK_CATALOG_ID)
	{
		$IBLOCK_CATALOG_ID = ImportXMLFile($iblockXMLFile, $iblockType, $site_id=WIZARD_SITE_ID, $section_action="N", $element_action="N", $use_crc=false, $preview=false, $sync=false, $return_last_error=false, $return_iblock_id=true);

		if ($IBLOCK_CATALOG_ID < 1)
			return;
	}
}
else{
	updateCatalogIblock($IBLOCK_CATALOG_ID, WIZARD_SITE_ID);
}
?>