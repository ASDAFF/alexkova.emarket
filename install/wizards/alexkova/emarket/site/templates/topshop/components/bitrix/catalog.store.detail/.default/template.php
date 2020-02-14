<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="store-list span_5_of_5">

	<?
	if(intval($arResult["IMAGE_ID"]) > 0)
	{
		?>

			<div class="catalog-detail-image" id="catalog-detail-main-image">
				<?echo CFile::ShowImage($arResult["IMAGE_ID"], 250, 200, "border=0", "", true);?>

			</div>

	<?
	}
	?>

	<?if($arResult["DESCRIPTION"]):?>
		<div class = "store-description"><?=$arResult["DESCRIPTION"];?></div>

	<?endif;?>


	<div class="store-menu">


		<div class="store-title"><?=$arResult["TITLE"];?></div>

		<div class="store-detail">

			<?if($arResult["ADDRESS"]):?>
				<div class="store-detail-description">
					<div class="store-detail-description-title">
						<?=GetMessage("S_ADDRESS")?>
					</div>
					<?=$arResult["ADDRESS"]?>
				</div>
			<?endif;?>
			<?if($arResult["PHONE"] != ''):?>
				<div class="store-detail-description">
					<div class="store-detail-description-title">
						<?=GetMessage("S_PHONE")?>
					</div>
					<?=$arResult["PHONE"]?>
				</div>
			<?endif;?>
			<?if ($arResult["SCHEDULE"] != ''):?>
				<div class="store-detail-description">
					<div class="store-detail-description-title">
						<?=GetMessage("S_SCHEDULE")?>
					</div>
					<?=$arResult["SCHEDULE"]?>
				</div>
			<?endif;?>
		</div>

		<div class="store-item">
			<a href="<?=$arResult["LIST_URL"]?>"><?=GetMessage("BACK_STORE_LIST")?>  </a>
		</div>

	</div>
	</div>

	<?
	if(($arResult["GPS_N"]) != 0 && ($arResult["GPS_S"]) != 0)
	{
		$gpsN = substr($arResult["GPS_N"],0,15);
		$gpsS = substr($arResult["GPS_S"],0,15);
		$gpsText = $arResult["ADDRESS"];
		$gpsTextLen = strlen($arResult["ADDRESS"]);
		if($arResult["MAP"] == 0)
		{
			$APPLICATION->IncludeComponent("bitrix:map.yandex.view", ".default", array(
					"INIT_MAP_TYPE" => "MAP",
					"MAP_DATA" => serialize(array("yandex_lat"=>$gpsN,"yandex_lon"=>$gpsS,"yandex_scale"=>15,"PLACEMARKS" => array( 0=>array("LON"=>$gpsS,"LAT"=>$gpsN,"TEXT"=>$arResult["ADDRESS"])))),
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
					"MAP_DATA" => serialize(array("google_lat"=>$gpsN,"google_lon"=>$gpsS,"google_scale"=>15,"PLACEMARKS" => array( 0=>array("LON"=>$gpsS,"LAT"=>$gpsN,"TEXT"=>$arResult["ADDRESS"])))),
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
</div>
