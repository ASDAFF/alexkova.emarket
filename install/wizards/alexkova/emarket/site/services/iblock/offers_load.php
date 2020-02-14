<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

if(!CModule::IncludeModule("iblock") || !CModule::IncludeModule("catalog"))
	return;

if(COption::GetOptionString("alexkova.emarket", "wizard_installed", "N", WIZARD_SITE_ID) == "Y" && !WIZARD_INSTALL_DEMO_DATA)
	return;

set_time_limit(0);

//catalog iblock import
$shopLocalization = $wizard->GetVar("shopLocalization");

$iblockXMLFile = WIZARD_ABSOLUTE_PATH."/lang/".LANGUAGE_ID."/iblock/catalog/offers.xml";

$iblockCode = "kc_emarket_offers";
$iblockType = "offers";

include("func/all.php");
include("func/catalog.php");

$IBLOCK_CATALOG_ID = getIblockID($iblockCode, $iblockType);

if($IBLOCK_CATALOG_ID)
{
	$IBLOCK_CATALOG_ID = ImportXMLFile($iblockXMLFile, $iblockType, $site_id=WIZARD_SITE_ID, $section_action="N", $element_action="N", $use_crc=false, $preview=false, $sync=false, $return_last_error=false, $return_iblock_id=true);

	if ($IBLOCK_CATALOG_ID < 1)
		return;
}

?>