<?php
namespace Alexkova\Emarket\Catalog;

class Iblock {
	private static $list = array();
	private static $ids = array();

	public static function getList()
	{
		if(static::$list)
			return static::$list;
		if (!\CModule::IncludeModule('iblock')) return array();
		$res = \CIBlock::GetList(Array(),
			Array(
				'TYPE'=>'catalog',
				'ACTIVE'=>'Y'
			), false
		);
		while($iblock = $res->Fetch())
			static::$list[$iblock["ID"]] = $iblock;
		return static::$list;
	}

	public static function getIds()
	{
		if(!static::$ids)
		{
			$list = self::getList();
			static::$ids = array_keys($list);
		}
		return static::$ids;
	}
} 