<?
namespace Alexkova\Emarket;

class Data{

	public static function getIconPropCodes()
	{
		return array(
			"SPECIALOFFER",
			"NEWPRODUCT",
			"SALELEADER",
			"RECOMMENDED"
		);
	}

	const PRODUCT_IBLOCK_ID = 1;
	const DEFAULT_PRODUCT_SEF = '/catalog';
}