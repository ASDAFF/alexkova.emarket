<?php

namespace Alexkova\Emarket;


class Region
{
	private static $_instance = null;
	private $current = array();

	private function __construct() {}
	protected function __clone() {}

	static public function getInstance()
	{
		if(is_null(self::$_instance))
			self::$_instance = new static();
		return self::$_instance;
	}

	public function get()
	{
		return $this->current;
	}
	public function set($data)
	{
		if(!is_array($data))
			return false;
		$this->current = $data;
	}
} 