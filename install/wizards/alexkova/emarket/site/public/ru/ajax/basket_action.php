<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
if (!isset($_REQUEST['ajaxbuy']) || $_REQUEST['ajaxbuy'] != "yes"){die();}

$arParams = array (
    "PATH_TO_BASKET" => SITE_DIR."personal/basket/",
    "PATH_TO_ORDER" => SITE_DIR."personal/order/"
);

if (isset($_SESSION["BASKET_SMALL_SETTINGS"]))
    $arParams = $_SESSION["BASKET_SMALL_SETTINGS"];

$APPLICATION->IncludeComponent(
	"alexkova.emarket:basket.small",
	"",
	$arParams
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>