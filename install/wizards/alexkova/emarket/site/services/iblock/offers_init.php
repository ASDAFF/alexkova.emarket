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

$iblockCode = "kc_emarket_offers_".WIZARD_SITE_ID;
$iblockCodeDef = "kc_emarket_offers";
$iblockType = "offers";
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

$IBLOCK_OFFERS_ID = getIblockID($iblockCode, $iblockType);

file_put_contents($_SERVER['DOCUMENT_ROOT']."/log.txt", var_export("71-".$IBLOCK_CATALOG_ID."\n", true),FILE_APPEND);
file_put_contents($_SERVER['DOCUMENT_ROOT']."/log.txt", var_export("7-".WIZARD_INSTALL_DEMO_DATA."\n", true),FILE_APPEND);

if ($IBLOCK_OFFERS_ID == false){

	createOffersIblock(WIZARD_SITE_ID);
	$IBLOCK_OFFERS_ID = getIblockID('kc_emarket_offers', 'offers');
	$IBLOCK_CATALOG_ID = getIblockID('kc_emarket_catalog', 'catalog');
	$ID_SKU = CCatalog::LinkSKUIBlock($IBLOCK_CATALOG_ID, $IBLOCK_OFFERS_ID);

	$rsCatalogs = CCatalog::GetList(
		array(),
		array('IBLOCK_ID' => $IBLOCK_OFFERS_ID),
		false,
		false,
		array('IBLOCK_ID')
	);
	if ($arCatalog = $rsCatalogs->Fetch())
	{
		CCatalog::Update($IBLOCK_OFFERS_ID,array('PRODUCT_IBLOCK_ID' => $IBLOCK_CATALOG_ID,'SKU_PROPERTY_ID' => $ID_SKU));
	}
	else
	{
		CCatalog::Add(array('IBLOCK_ID' => $IBLOCK_OFFERS_ID, 'PRODUCT_IBLOCK_ID' => $IBLOCK_CATALOG_ID, 'SKU_PROPERTY_ID' => $ID_SKU));
	}
}
else{
	updateOffersIblock($IBLOCK_OFFERS_ID, WIZARD_SITE_ID);
}

//////////////

////  create new

?>