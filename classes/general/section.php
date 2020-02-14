<?
IncludeModuleLangFile(__FILE__);

class CAEmarketSection{

	function OnSectionEdit(&$form)
	{
		@CAEmarketSection::OnSectionEditEvent($form);
	}

	public function OnSectionPresentUpdateEvent(&$arFields)
	{

	}

	public function OnSectionEditEvent(&$form)
	{
		/*if (!CModule::IncludeModule('alexkova.emarket')) return ;
		if (!CModule::IncludeModule('iblock')) return ;
		global $APPLICATION;

		if(
			$GLOBALS["APPLICATION"]->GetCurPage() == "/bitrix/admin/cat_section_edit.php"
			|| $GLOBALS["APPLICATION"]->GetCurPage() == "/bitrix/admin/iblock_section_edit.php"
		)
		{


			$arInfo = CAEmarketSection::GetCatalogInfo();

			if (in_array($_REQUEST["IBLOCK_ID"], $arInfo["CATALOG_IBLOCKS"]["LIST"])){
				$form->tabs[] = array(
					"DIV" => "emarket_section_edit_list",
					"TAB" => GetMessage("EMARKET_SECTION_EDIT_TAB_NAME"),
					"ICON"=>"main_user_edit",
					"TITLE"=>GetMessage("EMARKET_SECTION_EDIT_TAB_TITLE"),
					"CONTENT"=>"777",
				);
			}
		}*/
	}

	function GetCatalogInfo(){

		$result = array();

		if (isset($_SESSION["CATALOG_INFO"])){
			return $_SESSION["CATALOG_INFO"];
		}

		if (!CModule::IncludeModule('iblock')) return $result;
		$res = CIBlock::GetList(
			Array(),
			Array(
				'TYPE'=>'catalog',
				'ACTIVE'=>'Y'
			), false
		);
		while($ar_res = $res->Fetch())
		{
			$result["CATALOG_IBLOCKS"]["LIST"][] = $ar_res["ID"];
			$result["CATALOG_IBLOCKS"]["INFO"][$ar_res["ID"]] = $ar_res;
		}

		$_SESSION["CATALOG_INFO"] = $result;
		return $result;
	}


}
?>