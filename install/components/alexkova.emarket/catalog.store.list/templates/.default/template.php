<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if(strlen($arResult["ERROR_MESSAGE"])>0)
	ShowError($arResult["ERROR_MESSAGE"]);
?>
<?$arPlacemarks=array();?>
<?if(is_array($arResult["STORES"]) && !empty($arResult["STORES"])):?>

	<div class="store-list span_5_of_5">
		<div class="store-menu">

				<?foreach($arResult["STORES"] as $pid=>$arProperty):?>
					<div class="store-item">
						<a href="<?=$arProperty["URL"]?>"><?=$arProperty["TITLE"]?></a>
						<?
						if($arProperty["GPS_S"]!=0 && $arProperty["GPS_N"]!=0)
						{
							$gpsN=substr(doubleval($arProperty["GPS_N"]),0,15);
							$gpsS=substr(doubleval($arProperty["GPS_S"]),0,15);
							$arPlacemarks[]=array("LON"=>$gpsS,"LAT"=>$gpsN,"TEXT"=>$arProperty["TITLE"]);
						}
						?>
						<b></b>
					</div>
					<br>
				<?endforeach;?>

		</div>
	</div>

<?endif;?>


<?
if ($arResult['VIEW_MAP'])
{
	if($arResult["MAP"]==0)
	{
		$APPLICATION->IncludeComponent("bitrix:map.yandex.view", ".default", array(
				"INIT_MAP_TYPE" => "MAP",
				"MAP_DATA" => serialize(array("yandex_lat"=>$gpsN,"yandex_lon"=>$gpsS,"yandex_scale"=>10,"PLACEMARKS" => $arPlacemarks)),
				"MAP_WIDTH" => "100%",
				"MAP_HEIGHT" => "500",
				"CONTROLS" => array(
					0 => "ZOOM",
				),
				"OPTIONS" => array(
					0 => "ENABLE_SCROLL_ZOOM",
					1 => "ENABLE_DBLCLICK_ZOOM",
					2 => "ENABLE_DRAGGING",
				),
				"MAP_ID" => ""
			),
			false
		);
	}
	else
	{
		$APPLICATION->IncludeComponent("bitrix:map.google.view", ".default", array(
				"INIT_MAP_TYPE" => "MAP",
				"MAP_DATA" => serialize(array("google_lat"=>$gpsN,"google_lon"=>$gpsS,"google_scale"=>10,"PLACEMARKS" => $arPlacemarks)),
				"MAP_WIDTH" => "100%",
				"MAP_HEIGHT" => "500",
				"CONTROLS" => array(
					0 => "ZOOM",
				),
				"OPTIONS" => array(
					0 => "ENABLE_SCROLL_ZOOM",
					1 => "ENABLE_DBLCLICK_ZOOM",
					2 => "ENABLE_DRAGGING",
				),
				"MAP_ID" => ""
			),
			false
		);
	}
}
?>
