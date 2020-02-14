<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.themepunch.plugins.min.js');?>
<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.themepunch.revolution.min.js');?>

<?
global $TopShopSettings;
$sType = $TopShopSettings["slider_type"];
if ($sType == 'TYPE_2')
	$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/css/addon/slider2.css", true);
if ($sType == 'TYPE_3')
	$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/css/addon/slider3.css", true);
?>

