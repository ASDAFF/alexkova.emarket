<?
use Alexkova\Emarket\Data;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if(CModule::IncludeModule('iblock'))
{
	$aMenuLinksExt = array();
	//проверить кеш
	$obCache = new CPHPCache();
	$cacheLifetime = 86400;
	$cacheID = 'bottomCatalogMenuExt';
	$cachePath = '/'.$cacheID;
	if( $obCache->InitCache($cacheLifetime, $cacheID, $cachePath) )
	{
		extract($obCache->GetVars());
	}
	else
	{
		$filter = array(
			"IBLOCK_ID" => '#PRODUCT_IBLOCK_ID#',
			"ACTIVE" => "Y",
			"!UF_SHOW_IN_FOOTER" => false
		);
		$select = array(
			"ID", "NAME", "IBLOCK_ID", "CODE"
		);
		$res = CIBlockSection::GetList(
			array('SORT' => 'ASC', 'LEFT_MARGIN' => 'ASC', 'NAME' => 'ASC'),
			$filter,
			false,
			$select
		);
		while ($item = $res->GetNext(true, false))
		{
			$aMenuLinksExt[] = array(
				$item["NAME"],
				Data::DEFAULT_PRODUCT_SEF . '/' . ($item["CODE"] ?: $item["ID"]) . '/',
			);
		}
		$res = $obCache->EndDataCache(array('aMenuLinksExt' => $aMenuLinksExt));
	}
	$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
}