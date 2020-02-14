<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentParameters = array(
	"GROUPS" => array(
		"RESPONSIVE" => array(
			"NAME" => GetMessage('RESPONSIVE_GROUP'),
			"SORT"=>1000
		)
	),
	"PARAMETERS" => array(
		"SHOW" => array(
			"PARENT" => "BASE",
			"NAME"=>GetMessage("ADMANAGER_SHOW"),
			"TYPE"=>"STRING",
			"DEFAULT"=>'rklite',
		),
		"BANTYPE" => array(
			"PARENT" => "BASE",
			"NAME"=>GetMessage("ADMANAGER_BANTYPE"),
			"TYPE"=>"STRING",
			"DEFAULT"=>'',
		),

		"USE_IN_LG_MODE" => array(
			"PARENT" => "RESPONSIVE",
			"NAME"=>GetMessage("USE_IN_LG_MODE_NAME"),
			"TYPE"=>"CHECKBOX",
			"DEFAULT"=>'Y',
		),

		"USE_IN_MD_MODE" => array(
			"PARENT" => "RESPONSIVE",
			"NAME"=>GetMessage("USE_IN_MD_MODE_NAME"),
			"TYPE"=>"CHECKBOX",
			"DEFAULT"=>'Y',
		),

		"USE_IN_SM_MODE" => array(
			"PARENT" => "RESPONSIVE",
			"NAME"=>GetMessage("USE_IN_SM_MODE_NAME"),
			"TYPE"=>"CHECKBOX",
			"DEFAULT"=>'Y',
		),

		"USE_IN_XS_MODE" => array(
			"PARENT" => "RESPONSIVE",
			"NAME"=>GetMessage("USE_IN_XS_MODE_NAME"),
			"TYPE"=>"CHECKBOX",
			"DEFAULT"=>'Y',
		),
		"CACHE_TIME"  =>  Array("DEFAULT"=>0),
		
	),
);

?>