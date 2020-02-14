<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Loader;
use Bitrix\Main\ModuleManager;

if (!Loader::includeModule('alexkova.emarket'))
	return;

$arTemplateParameters['SLIDE_COUNT'] = array(
	'PARENT' => 'VISUAL',
	'NAME' => GetMessage("SLIDE_COUNT"),
	'TYPE' => 'STRING',
	'DEFAULT' => '3',
);
?>