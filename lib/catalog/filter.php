<?php

namespace Alexkova\Emarket\Catalog;


class Filter {
	private static $activeValues = array();

	public static function getActiveValues()
	{
		return self::$activeValues;
	}

	public static function setActiveValues($values)
	{
		if(is_array($values))
			self::$activeValues = $values;
	}
} 