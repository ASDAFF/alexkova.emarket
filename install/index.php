<?
global $MESS;
$strPath2Lang = str_replace("\\", "/", __FILE__);
$strPath2Lang = substr($strPath2Lang, 0, strlen($strPath2Lang)-18);
include(GetLangFileName($strPath2Lang."/lang/", "/install/index.php"));
//echo "<pre>"; print_r(GetLangFileName($strPath2Lang."/lang/", "/install/index.php")); echo "</pre>";


Class alexkova_emarket extends CModule
{
	var $MODULE_ID = "alexkova.emarket";
	var $MODULE_VERSION;
	var $MODULE_VERSION_DATE;
	var $MODULE_NAME;
	var $MODULE_DESCRIPTION;
	var $MODULE_CSS;

	function alexkova_emarket()
	{
		$arModuleVersion = array();

		$path = str_replace("\\", "/", __FILE__);
		$path = substr($path, 0, strlen($path) - strlen("/index.php"));
		include($path."/version.php");

		if (is_array($arModuleVersion) && array_key_exists("VERSION", $arModuleVersion))
		{
			$this->MODULE_VERSION = $arModuleVersion["VERSION"];
			$this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
		}
		else
		{
			//$this->MODULE_VERSION = COMPRESSION_VERSION;
			//$this->MODULE_VERSION_DATE = COMPRESSION_VERSION_DATE;
		}

		$this->MODULE_NAME = GetMessage("alexkova.emarket_MODULE_NAME");
		$this->MODULE_DESCRIPTION = GetMessage("alexkova.emarket_MODULE_DESC");
		$this->PARTNER_NAME = GetMessage("alexkova.emarket_PARTNER_NAME");
		$this->PARTNER_URI = GetMessage("alexkova.emarket_PARTNER_URI");
	}
	

	function InstallDB($arParams = array())
	{
		global $DB;

		//$DB->RunSQLBatch(dirname(__FILE__).'/mysql/install.sql');

		RegisterModule($this->MODULE_ID);

		RegisterModuleDependences("iblock", "OnBeforeIBlockSectionAdd", "alexkova.emarket", "CAEmarketSection", "OnSectionPresentUpdateEvent");
		RegisterModuleDependences("iblock", "OnBeforeIBlockSectionUpdate", "alexkova.emarket", "CAEmarketSection", "OnSectionPresentUpdateEvent");
		RegisterModuleDependences("main", "OnAdminTabControlBegin", "alexkova.emarket", "CAEmarketSection", "OnSectionEdit");

		RegisterModuleDependences("iblock", "OnAfterIBlockElementUpdate", "alexkova.emarket", "CAEmarketSale", "DoIBlockAfterSave");
		RegisterModuleDependences("iblock", "OnAfterIBlockElementAdd", "alexkova.emarket", "CAEmarketSale", "DoIBlockAfterSave");
		RegisterModuleDependences("catalog", "OnPriceAdd", "alexkova.emarket", "CAEmarketSale", "DoIBlockAfterSave");
                RegisterModuleDependences("catalog", "OnPriceUpdate", "alexkova.emarket", "CAEmarketSale", "DoIBlockAfterSave");
                
                return true;
	}

	function UnInstallDB($arParams = array())
	{
		UnRegisterModuleDependences("iblock", "OnBeforeIBlockSectionAdd", "alexkova.emarket", "CAEmarketSection", "OnSectionPresentUpdateEvent");
		UnRegisterModuleDependences("iblock", "OnBeforeIBlockSectionUpdate", "alexkova.emarket", "CAEmarketSection", "OnSectionPresentUpdateEvent");
		UnRegisterModuleDependences("main", "OnAdminTabControlBegin", "alexkova.emarket", "CAEmarketSection", "OnSectionEdit");

		UnRegisterModuleDependences("iblock", "OnAfterIBlockElementUpdate", "alexkova.emarket", "CAEmarketSale", "DoIBlockAfterSave");
		UnRegisterModuleDependences("iblock", "OnAfterIBlockElementAdd", "alexkova.emarket", "CAEmarketSale", "DoIBlockAfterSave");
		UnRegisterModuleDependences("catalog", "OnPriceAdd", "alexkova.emarket", "CAEmarketSale", "DoIBlockAfterSave");
                UnRegisterModuleDependences("catalog", "OnPriceUpdate", "alexkova.emarket", "CAEmarketSale", "DoIBlockAfterSave");

		if ($arParams["savedata"] != "Y"){

			global $DB;
			//$DB->RunSQLBatch(dirname(__FILE__).'/mysql/uninstall.sql');

		}

		UnRegisterModule($this->MODULE_ID);
		return true;
	}

	function InstallEvents()
	{
		return true;
	}

	function UnInstallEvents()
	{
		return true;
	}

	function InstallFiles($arParams = array())
	{
		if (is_dir($p = $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/'.$this->MODULE_ID.'/install/components'))
		{
			if ($dir = opendir($p))
			{
				while (false !== $item = readdir($dir))
				{
					if ($item == '..' || $item == '.')
						continue;
					CopyDirFiles($p.'/'.$item, $_SERVER['DOCUMENT_ROOT'].'/bitrix/components/'.$item, $ReWrite = True, $Recursive = True);
				}
				closedir($dir);
			}
		}

            
		return true;
	}

	function UnInstallFiles()
	{
                
		return true;
	}

	function DoInstall()
	{
		global $DOCUMENT_ROOT, $APPLICATION;
		$this->InstallFiles();
		$this->InstallDB();
                //$GLOBALS["errors"] = $this->errors;
		$APPLICATION->IncludeAdminFile(GetMessage("EMARKET_MODULE_INSTALL"), dirname(__FILE__)."/step.php");
	}

	function DoUninstall()
	{
		global $DOCUMENT_ROOT, $APPLICATION;
                $savedata = $_REQUEST["savedata"];
                $step = $_REQUEST["step"];
                $STAT_RIGHT = $APPLICATION->GetGroupRight($this->MODULE_ID);
		
		{
			$step = IntVal($step);
                        if ($step<2)
                        {
                            $APPLICATION->IncludeAdminFile(GetMessage("EMARKET_UNINSTALL_TITLE"), dirname(__FILE__)."/unstep1.php");
                        }
                        elseif($step == 2)
                        {
                            $this->UnInstallDB(array("savedata"=>$savedata));
                            $GLOBALS["errors"] = $this->errors;
                            $APPLICATION->IncludeAdminFile(GetMessage("EMARKET_UNINSTALL_TITLE"), dirname(__FILE__)."/unstep2.php");
                        }
                }        
                
                
                
	}
}
?>