<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arResolution = array(
	'1' => 1,
	'2' => 2,
	'3' => 3,
	'4' => 4
);

$arTemplateParameters = array(
	'RESOLUTION_LG' => array(
		'PARENT' => 'ADDITIONAL_SETTINGS',
		'NAME' => GetMessage('RESOLUTION_LG'),
		'TYPE' => 'LIST',
                "VALUES" => $arResolution,
		'DEFAULT' => '4'
	),
        'RESOLUTION_MD' => array(
		'PARENT' => 'ADDITIONAL_SETTINGS',
		'NAME' => GetMessage('RESOLUTION_MD'),
		'TYPE' => 'LIST',
                "VALUES" => $arResolution,
		'DEFAULT' => '3'
	),
        'RESOLUTION_SM' => array(
		'PARENT' => 'ADDITIONAL_SETTINGS',
		'NAME' => GetMessage('RESOLUTION_SM'),
		'TYPE' => 'LIST',
                "VALUES" => $arResolution,
		'DEFAULT' => '2'
	),
        'RESOLUTION_XS' => array(
		'PARENT' => 'ADDITIONAL_SETTINGS',
		'NAME' => GetMessage('RESOLUTION_XS'),
		'TYPE' => 'LIST',
                "VALUES" => $arResolution,
		'DEFAULT' => '1'
	),
);

?>