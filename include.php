<?
global $DBType;
$module_id = 'alexkova.emarket';

IncludeModuleLangFile(__FILE__);

CModule::AddAutoloadClasses(
	$module_id,
	array(
		"CAEmarketSection"=> "classes/general/section.php",
		"CAEmarketTools"=> "classes/general/tools.php",
		"CAEmarketSale"=> "classes/general/sale.php",
		)
	);
