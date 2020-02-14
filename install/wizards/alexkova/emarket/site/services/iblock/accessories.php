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
WizardServices::IncludeServiceLang("catalog_accessories.php", LANGUAGE_ID);

$iblockCode = "kc_emarket_catalog_".WIZARD_SITE_ID;
$iblockCodeDef = "kc_emarket_catalog";
$iblockType = "catalog";

$IBLOCK_CATALOG_ID = getIblockID($iblockCodeDef, $iblockType);

$arAccessories = GetMessage('CATALOG_ACCESSORIES');

foreach($arAccessories as $cell=>$val){
	$arSelect = array("ID", "XML_ID");
	$res = CIBlockElement::GetList(array(), array("IBLOCK_ID"=>$IBLOCK_CATALOG_ID, "XML_ID"=>$cell), false, false, $arSelect);

	if($arFields = $res->Fetch()){
		$ELEMENT_ID = $arFields["ID"];
		//file_put_contents($_SERVER['DOCUMENT_ROOT']."/log.txt", "100-".var_export($arFields, true)."\n",FILE_APPEND);


		$arSelect = array("ID", "XML_ID");
		$res2 = CIBlockElement::GetList(array(), array("IBLOCK_ID"=>$IBLOCK_CATALOG_ID, "XML_ID"=>$val), false, false, $arSelect);
		$arAddAccessories = array();

		while($arFields2 = $res2->Fetch()){

			$arAddAccessories[] = $arFields2["ID"];
		}

		//file_put_contents($_SERVER['DOCUMENT_ROOT']."/log.txt", "100-".var_export($arAddAccessories, true)."\n",FILE_APPEND);

		if (count($arAddAccessories)>0){

			CIBlockElement::SetPropertyValuesEx($ELEMENT_ID, false, array("ACCESSORIES" => $arAddAccessories));
		}
	}
}




?>