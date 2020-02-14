<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<?
foreach ($arResult["BANNERS"] as &$arBanner){
	if ($arBanner["IMAGE_ID"]>0){
		$arBanner["IMAGE"] = CFile::GetFileArray($arBanner["IMAGE_ID"]);
	}
}
?>

<?//echo "<pre>"; print_r($arResult); echo "</pre>";?>

<?if (count($arResult)<=0) return;?>

<?if (count($arResult)>0):?>
	<div class="wrapper">
		<div class="container">
			<div class="span_5_of_5">
				<div class="tp-banner-container" style="position: relative">
					<div class="tp-banner" >
						<ul>	<!-- SLIDE  -->
							<?foreach($arResult["BANNERS"] as $val):?>
								<li data-transition="<?=(strlen($val[CODE][0])>0 ? $val[CODE][0] : "fade")?>" data-slotamount="7" data-link="<?=$val["URL"]?>" data-masterspeed="<?=(intval($val[CODE][1])>0 ? $val[CODE][1] : "1000")?>">
									<img src="<?=$val["IMAGE"]["SRC"]?>" data-bgrepeat="no-repeat" data-bgfit="normal" data-bgposition="center center">
								</li>
							<?endforeach;?>

						</ul>
						<div class="tp-bannertimer"></div>
					</div>
				</div>
			</div><div class="clear"></div>
		</div>
	</div>

<?endif;?>

