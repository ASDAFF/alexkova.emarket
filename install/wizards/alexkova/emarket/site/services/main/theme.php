<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

if (!defined("WIZARD_TEMPLATE_ID"))
	return;

$templateDir = BX_PERSONAL_ROOT."/templates/".WIZARD_TEMPLATE_ID."_".WIZARD_THEME_ID;

CopyDirFiles(
	WIZARD_THEME_ABSOLUTE_PATH,
	$_SERVER["DOCUMENT_ROOT"].$templateDir,
	$rewrite = true, 
	$recursive = true,
	$delete_after_copy = false,
	$exclude = "description.php"
);

CopyDirFiles(
	$_SERVER["DOCUMENT_ROOT"].$templateDir."colors/color_".WIZARD_THEME_ID.".css",
	$_SERVER["DOCUMENT_ROOT"].$templateDir."css/template_color.css",
	$rewrite = true,
	$recursive = true,
	$delete_after_copy = false,
	$exclude = "description.php"
);


COption::SetOptionString("main", "wizard_".WIZARD_TEMPLATE_ID."_theme_id", WIZARD_THEME_ID, "", WIZARD_SITE_ID);

$templateDir = $_SERVER["DOCUMENT_ROOT"].BX_PERSONAL_ROOT."/templates/".WIZARD_TEMPLATE_ID."_".WIZARD_THEME_ID."/";

WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH."ajax/", Array("SITE_DIR" => WIZARD_SITE_DIR));
WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH."include/", Array("SITE_DIR" => WIZARD_SITE_DIR));
WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH."company/", Array("SITE_DIR" => WIZARD_SITE_DIR));
WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH."info/", Array("SITE_DIR" => WIZARD_SITE_DIR));
WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH."news/", Array("SITE_DIR" => WIZARD_SITE_DIR));
WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH."catalog/", Array("SITE_DIR" => WIZARD_SITE_DIR));
WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH."brands/", Array("SITE_DIR" => WIZARD_SITE_DIR));
WizardServices::ReplaceMacrosRecursive($templateDir, Array("THEME_COLOR" => WIZARD_THEME_ID));


CWizardUtil::ReplaceMacros($templateDir."header.php", Array("SITE_DIR" => WIZARD_SITE_DIR));
CWizardUtil::ReplaceMacros($templateDir."footer.php", Array("SITE_DIR" => WIZARD_SITE_DIR));

//Color scheme for main.interface.grid/form
//require_once($_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/main/classes/".strToLower($GLOBALS["DB"]->type)."/favorites.php");
//CUserOptions::SetOption("main.interface", "global", array("theme" => WIZARD_THEME_ID), true);
?>