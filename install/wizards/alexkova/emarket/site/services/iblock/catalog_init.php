<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

if(!CModule::IncludeModule("iblock") || !CModule::IncludeModule("catalog"))
	return;

if(COption::GetOptionString("alexkova.emarket", "wizard_installed", "N", WIZARD_SITE_ID) == "Y" && !WIZARD_INSTALL_DEMO_DATA)
	return;

WizardServices::IncludeServiceLang("catalog.php", LANGUAGE_ID);

$shopLocalization = $wizard->GetVar("shopLocalization");

include("func/all.php");
include("func/catalog.php");
WizardServices::IncludeServiceLang("catalog_fields.php", LANGUAGE_ID);

$iblockCode = "kc_emarket_catalog_".WIZARD_SITE_ID;
$iblockCodeDef = "kc_emarket_catalog";
$iblockType = "catalog";
//define('WIZARD_INSTALL_DEMO_DATA', true);

$IBLOCK_CATALOG_ID = false;

if (WIZARD_INSTALL_DEMO_DATA){
	$IBLOCK_CATALOG_ID = getIblockID($iblockCodeDef, $iblockType);
	if ($IBLOCK_CATALOG_ID){
		deleteCatalog($IBLOCK_CATALOG_ID);
	}

	$IBLOCK_CATALOG_ID = getIblockID($iblockCode, $iblockType);
	if ($IBLOCK_CATALOG_ID){
		deleteCatalog($IBLOCK_CATALOG_ID);
	}
}

$IBLOCK_CATALOG_ID = getIblockID($iblockCode, $iblockType);

if ($IBLOCK_CATALOG_ID == false){
	createCatalogIblock(WIZARD_SITE_ID);
}
else{
	updateCatalogIblock($IBLOCK_CATALOG_ID, WIZARD_SITE_ID);
}

?>