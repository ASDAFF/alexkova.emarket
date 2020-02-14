<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

if (!CModule::IncludeModule("highloadblock"))
	return;

global $USER_FIELD_MANAGER;

//adding rows
$brand_file = WIZARD_ABSOLUTE_PATH."/lang/".LANGUAGE_ID.'/iblock/brands/brandlist.csv';
$brandImageDst = WIZARD_ABSOLUTE_PATH."/lang/".LANGUAGE_ID.'/iblock';
$langInfo = WIZARD_ABSOLUTE_PATH."/site/services/iblock/lang/".LANGUAGE_ID."/"."references.php";

$arBrandFields = array();

if (($handle = fopen($brand_file, "r")) !== FALSE) {
	$fields = fgetcsv($handle, 1000, ";");
	$arFieldNames = array();
	foreach($fields as $cell=>$val){
		$arFieldNames[$val] = $cell;
	}



	while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
		$arBrandFields[] = $data;
	}
	fclose($handle);
}
use Bitrix\Highloadblock as HL;
//
$dbHblock = HL\HighloadBlockTable::getList(
	array(
		"filter" => array('TABLE_NAME' => 'emarketbrands')
	)
);

$resultID = $dbHblock->fetch();


$_SESSION["EMARKET_HBLOCK_BRAND_ID"] = $resultID["ID"];

if (!$resultID)
{
	$data = array(
		'NAME' => 'Emarketbrands',
		'TABLE_NAME' => 'emarketbrands',
	);


	$result = HL\HighloadBlockTable::add($data);

	$ID = $result->getId();

	$_SESSION["EMARKET_HBLOCK_BRAND_ID"] = $ID;

	//adding user fields
	$arUserFields = array (
		array (
			'ENTITY_ID' => 'HLBLOCK_'.$ID,
			'FIELD_NAME' => 'UF_NAME',
			'USER_TYPE_ID' => 'string',
			'XML_ID' => 'UF_BRAND_NAME',
			'SORT' => '100',
			'MULTIPLE' => 'N',
			'MANDATORY' => 'N',
			'SHOW_FILTER' => 'N',
			'SHOW_IN_LIST' => 'Y',
			'EDIT_IN_LIST' => 'Y',
			'IS_SEARCHABLE' => 'Y',
		),
		array (
			'ENTITY_ID' => 'HLBLOCK_'.$ID,
			'FIELD_NAME' => 'UF_FILE',
			'USER_TYPE_ID' => 'file',
			'XML_ID' => 'UF_BRAND_FILE',
			'SORT' => '200',
			'MULTIPLE' => 'N',
			'MANDATORY' => 'N',
			'SHOW_FILTER' => 'N',
			'SHOW_IN_LIST' => 'Y',
			'EDIT_IN_LIST' => 'Y',
			'IS_SEARCHABLE' => 'Y',
		),
		array (
			'ENTITY_ID' => 'HLBLOCK_'.$ID,
			'FIELD_NAME' => 'UF_LINK',
			'USER_TYPE_ID' => 'string',
			'XML_ID' => 'UF_BRAND_LINK',
			'SORT' => '300',
			'MULTIPLE' => 'N',
			'MANDATORY' => 'N',
			'SHOW_FILTER' => 'N',
			'SHOW_IN_LIST' => 'Y',
			'EDIT_IN_LIST' => 'Y',
			'IS_SEARCHABLE' => 'Y',
		),
		array (
			'ENTITY_ID' => 'HLBLOCK_'.$ID,
			'FIELD_NAME' => 'UF_DESCRIPTION',
			'USER_TYPE_ID' => 'string',
			'XML_ID' => 'UF_BRAND_DESCR',
			'SORT' => '400',
			'MULTIPLE' => 'N',
			'MANDATORY' => 'N',
			'SHOW_FILTER' => 'N',
			'SHOW_IN_LIST' => 'Y',
			'EDIT_IN_LIST' => 'Y',
			'IS_SEARCHABLE' => 'Y',
		),
		array (
			'ENTITY_ID' => 'HLBLOCK_'.$ID,
			'FIELD_NAME' => 'UF_FULL_DESCRIPTION',
			'USER_TYPE_ID' => 'string',
			'XML_ID' => 'UF_BRAND_FULL_DESCR',
			'SORT' => '500',
			'MULTIPLE' => 'N',
			'MANDATORY' => 'N',
			'SHOW_FILTER' => 'N',
			'SHOW_IN_LIST' => 'Y',
			'EDIT_IN_LIST' => 'Y',
			'IS_SEARCHABLE' => 'Y',
		),
		array (
			'ENTITY_ID' => 'HLBLOCK_'.$ID,
			'FIELD_NAME' => 'UF_SORT',
			'USER_TYPE_ID' => 'double',
			'XML_ID' => 'UF_BRAND_SORT',
			'SORT' => '600',
			'MULTIPLE' => 'N',
			'MANDATORY' => 'N',
			'SHOW_FILTER' => 'N',
			'SHOW_IN_LIST' => 'Y',
			'EDIT_IN_LIST' => 'Y',
			'IS_SEARCHABLE' => 'N',
		),

		array (
			'ENTITY_ID' => 'HLBLOCK_'.$ID,
			'FIELD_NAME' => 'UF_XML_ID',
			'USER_TYPE_ID' => 'string',
			'XML_ID' => 'UF_XML_ID',
			'SORT' => '800',
			'MULTIPLE' => 'N',
			'MANDATORY' => 'Y',
			'SHOW_FILTER' => 'Y',
			'SHOW_IN_LIST' => 'Y',
			'EDIT_IN_LIST' => 'Y',
			'IS_SEARCHABLE' => 'N',
		),

		array (
			'ENTITY_ID' => 'HLBLOCK_'.$ID,
			'FIELD_NAME' => 'UF_DEF',
			'USER_TYPE_ID' => 'boolean',
			'XML_ID' => 'UF_BRAND_DEF',
			'SORT' => '800',
			'MULTIPLE' => 'N',
			'MANDATORY' => 'Y',
			'SHOW_FILTER' => 'N',
			'SHOW_IN_LIST' => 'Y',
			'EDIT_IN_LIST' => 'Y',
			'IS_SEARCHABLE' => 'N',
		)
	);
	$arLanguages = Array();
	$rsLanguage = CLanguage::GetList($by, $order, array());
	while($arLanguage = $rsLanguage->Fetch())
		$arLanguages[] = $arLanguage["LID"];

	$obUserField  = new CUserTypeEntity;
	foreach ($arUserFields as $arFields)
	{
		$dbRes = CUserTypeEntity::GetList(Array(), Array("ENTITY_ID" => $arFields["ENTITY_ID"], "FIELD_NAME" => $arFields["FIELD_NAME"]));
		if ($dbRes->Fetch())
			continue;

		$arLabelNames = Array();
		foreach($arLanguages as $languageID)
		{
			//WizardServices::IncludeServiceLang("references.php", $languageID);
			include_once($langInfo);
			$arLabelNames[$languageID] = GetMessage($arFields["FIELD_NAME"]);
		}

		$arFields["EDIT_FORM_LABEL"] = $arLabelNames;
		$arFields["LIST_COLUMN_LABEL"] = $arLabelNames;
		$arFields["LIST_FILTER_LABEL"] = $arLabelNames;

		$ID_USER_FIELD = $obUserField->Add($arFields);
	}

	$hldata = HL\HighloadBlockTable::getById($ID)->fetch();
	$hlentity = HL\HighloadBlockTable::compileEntity($hldata);

	$entity_data_class = $hlentity->getDataClass();

	foreach($arBrandFields as $brandItem)
	{
		$arData = array(
			'UF_NAME' => $brandItem[$arFieldNames["UF_NAME"]],
			'UF_FILE' => CFile::MakeFileArray($brandImageDst.$brandItem[$arFieldNames["UF_FILE"]]),
			'UF_SORT' => $brandItem[$arFieldNames["UF_SORT"]],
			'UF_LINK' => $brandItem[$arFieldNames["UF_LINK"]],
			'UF_DEF' => $brandItem[$arFieldNames["UF_DEF"]],
			'UF_XML_ID' => $brandItem[$arFieldNames["UF_XML_ID"]],
			'UF_DESCRIPTION' => $brandItem[$arFieldNames["UF_DESCRIPTION"]]
		);

		$USER_FIELD_MANAGER->EditFormAddFields('HLBLOCK_'.$ID, $arData);
		$USER_FIELD_MANAGER->checkFields('HLBLOCK_'.$ID, null, $arData);

		$result = $entity_data_class::add($arData);
	}
}

?>