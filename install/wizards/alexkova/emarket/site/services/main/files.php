<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

if (!defined("WIZARD_SITE_ID") || !defined("WIZARD_SITE_DIR"))
	return;

function ___writeToAreasFile($path, $text)
{
	//if(file_exists($fn) && !is_writable($abs_path) && defined("BX_FILE_PERMISSIONS"))
	//	@chmod($abs_path, BX_FILE_PERMISSIONS);

	$fd = @fopen($path, "wb");
	if(!$fd)
		return false;

	if(false === fwrite($fd, $text))
	{
		fclose($fd);
		return false;
	}

	fclose($fd);

	if(defined("BX_FILE_PERMISSIONS"))
		@chmod($path, BX_FILE_PERMISSIONS);
}

if (COption::GetOptionString("main", "upload_dir") == "")
	COption::SetOptionString("main", "upload_dir", "upload");

if(COption::GetOptionString("alexkova.emarket", "wizard_installed", "N", WIZARD_SITE_ID) == "N" || WIZARD_INSTALL_DEMO_DATA)
{
	if(file_exists(WIZARD_ABSOLUTE_PATH."/site/public/".LANGUAGE_ID."/"))
	{
		CopyDirFiles(
			WIZARD_ABSOLUTE_PATH."/site/public/".LANGUAGE_ID."/",
			WIZARD_SITE_PATH,
			$rewrite = true,
			$recursive = true,
			$delete_after_copy = false
		);
	}
}

$wizard =& $this->GetWizard();
___writeToAreasFile(WIZARD_SITE_PATH."include/phone.php", $wizard->GetVar("siteTelephone"));

$arSocNets = array("shopFacebook" => "facebook", "shopTwitter" => "twitter", "shopVk" => "vk", "shopGooglePlus" => "google");
foreach($arSocNets as $socNet=>$includeFile)
{
	$curSocnet = $wizard->GetVar($socNet);
	if ($curSocnet)
	{
		$text = '<a href="'.$curSocnet.'"></a>';
		___writeToAreasFile(WIZARD_SITE_PATH."include/socnet_".$includeFile.".php", $text);
	}
}


if(COption::GetOptionString("alexkova.emarket", "wizard_installed", "N", WIZARD_SITE_ID) == "Y" && !WIZARD_INSTALL_DEMO_DATA)
	return;

WizardServices::PatchHtaccess(WIZARD_SITE_PATH);




CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."_index.php", Array("SITE_DIR" => WIZARD_SITE_DIR));

CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH.".top.menu.php", Array("SITE_DIR" => WIZARD_SITE_DIR));
CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH.".left.menu.php", Array("SITE_DIR" => WIZARD_SITE_DIR));
CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH.".bottom_catalog.menu_ext.php", Array("SITE_DIR" => WIZARD_SITE_DIR));
CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."mobile.menu.title.php", Array("SITE_DIR" => WIZARD_SITE_DIR));
CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH.".bottom.menu.php", Array("SITE_DIR" => WIZARD_SITE_DIR));
CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH.".404.php", Array("SITE_DIR" => WIZARD_SITE_DIR));

//CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/index.php", Array("SITE_DIR" => WIZARD_SITE_DIR));


CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/.section.php", array("SITE_DESCRIPTION" => htmlspecialcharsbx($wizard->GetVar("siteMetaDescription"))));
CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/.section.php", array("SITE_KEYWORDS" => htmlspecialcharsbx($wizard->GetVar("siteMetaKeywords"))));

copy(WIZARD_THEME_ABSOLUTE_PATH."/favicon.ico", WIZARD_SITE_PATH."favicon.ico");

$arUrlRewrite = array(); 
if (file_exists(WIZARD_SITE_ROOT_PATH."/urlrewrite.php"))
{
	include(WIZARD_SITE_ROOT_PATH."/urlrewrite.php");
}


$arNewUrlRewrite = array(
	array(
		"CONDITION" => "#^".WIZARD_SITE_DIR."company/service/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => WIZARD_SITE_DIR."company/service/index.php",
	),
	array(
		"CONDITION" => "#^".WIZARD_SITE_DIR."company/store/#",
		"RULE" => "",
		"ID" => "bitrix:catalog.store",
		"PATH" => WIZARD_SITE_DIR."company/store/index.php",
	),
	array(
		"CONDITION" => "#^".WIZARD_SITE_DIR."catalog/#",
		"RULE" => "",
		"ID" => "bitrix:catalog",
		"PATH" => WIZARD_SITE_DIR."catalog/index.php",
	),
	array(
		"CONDITION" => "#^".WIZARD_SITE_DIR."actions/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => WIZARD_SITE_DIR."actions/index.php",
	),
	array(
		"CONDITION" => "#^".WIZARD_SITE_DIR."brands/#",
		"RULE" => "",
		"ID" => "bitrix:catalog",
		"PATH" => WIZARD_SITE_DIR."brands/index.php",
	),
	array(
		"CONDITION" => "#^".WIZARD_SITE_DIR."info/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => WIZARD_SITE_DIR."info/index.php",
	),
	array(
		"CONDITION" => "#^".WIZARD_SITE_DIR."news/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => WIZARD_SITE_DIR."news/index.php",
	),
);

foreach ($arNewUrlRewrite as $arUrl)
{
	if (!in_array($arUrl, $arUrlRewrite))
	{
		CUrlRewriter::Add($arUrl);
	}
}
?>