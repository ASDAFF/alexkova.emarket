<?php
namespace Alexkova\Emarket;


class Application {

	private static $_instance = null;
	private $region;

	private function __construct() {}
	protected function __clone() {}

	static public function getInstance()
	{
		if(is_null(self::$_instance))
			self::$_instance = new static();
		return self::$_instance;
	}

	public function getRegion()
	{
		$this->region = Region::getInstance();
		return $this->region->get();
	}
} 