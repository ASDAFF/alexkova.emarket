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

$AllCreatedBlock = array(
	"PRODUCT_IBLOCK"=>array(
		"XML_CODE" => "kc_emarket_catalog",
		"IBLOCK_TYPE" => "catalog"
	),
	"OFFERS_IBLOCK"=>array(
		"XML_CODE" => "kc_emarket_offers",
		"IBLOCK_TYPE" => "offers"
	),
	"NEWS_IBLOCK"=>array(
		"XML_CODE" => "kc_emarket_news",
		"IBLOCK_TYPE" => "content"
	),
	"SLIDER_IBLOCK"=>array(
		"XML_CODE" => "kc_emarket_slider",
		"IBLOCK_TYPE" => "content"
	),
	"ACTIONS_IBLOCK"=>array(
		"XML_CODE" => "kc_emarket_actions",
		"IBLOCK_TYPE" => "content"
	),
	"ARTICLES_IBLOCK"=>array(
		"XML_CODE" => "kc_emarket_articles",
		"IBLOCK_TYPE" => "content"
	),
	"SERVICES_IBLOCK"=>array(
		"XML_CODE" => "kc_emarket_services",
		"IBLOCK_TYPE" => "content"
	),
	"BESTSELLERS_IBLOCK"=>array(
		"XML_CODE" => "kc_emarket_bestsellers",
		"IBLOCK_TYPE" => "content"
	)
);


foreach ($AllCreatedBlock as $cell=>$val){
	$IBLOCK_CATALOG_ID = getIblockID($val["XML_CODE"], $val["IBLOCK_TYPE"]);
	if ($IBLOCK_CATALOG_ID){
		readyCatalogIblock($IBLOCK_CATALOG_ID, $val["XML_CODE"]."_".WIZARD_SITE_ID);

		CIBlock::SetPermission($IBLOCK_CATALOG_ID, Array("2"=>"R"));

		$templateDir = $_SERVER["DOCUMENT_ROOT"].BX_PERSONAL_ROOT."/templates/".WIZARD_TEMPLATE_ID."_".WIZARD_THEME_ID."/";

		WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH."ajax/", Array($cell."_ID" => $IBLOCK_CATALOG_ID));
		WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH."include/", Array($cell."_ID" => $IBLOCK_CATALOG_ID));
		WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH."company/", Array($cell."_ID" => $IBLOCK_CATALOG_ID));
		WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH."info/", Array($cell."_ID" => $IBLOCK_CATALOG_ID));
		WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH."news/", Array($cell."_ID" => $IBLOCK_CATALOG_ID));
		WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH."catalog/", Array($cell."_ID" => $IBLOCK_CATALOG_ID));
		WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH."brands/", Array($cell."_ID" => $IBLOCK_CATALOG_ID));
		WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH."actions/", Array($cell."_ID" => $IBLOCK_CATALOG_ID));

		CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."_index.php", Array($cell."_ID" => $IBLOCK_CATALOG_ID));
		CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH.".bottom_catalog.menu_ext.php", Array($cell."_ID" => $IBLOCK_CATALOG_ID));


		CWizardUtil::ReplaceMacros($templateDir."header.php", Array($cell."_ID" => $IBLOCK_CATALOG_ID));
		CWizardUtil::ReplaceMacros($templateDir."footer.php", Array($cell."_ID" => $IBLOCK_CATALOG_ID));
	}
}
?>