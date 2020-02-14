<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

if (empty($arResult["BRAND_BLOCKS"]))
	return;
?>
	<div class="container">
		<div class="brand-list span_5_of_5 sm-hide xs-hide">
			<div class="sale-carousel" id="brand_nav">
				<ul class="sale-carousel-row">
					<?foreach ($arResult["BRAND_BLOCKS"] as $arBrand):
						if (strlen($arBrand["LINK"])>0){
						?>
						<li>
							<a href="<?=str_replace("//","/", SITE_DIR.$arBrand["LINK"])?>" class="brand-image">
								<img src="<?=$arBrand["PICT"]["SRC"]?>">
							</a>
						</li>
					<?
					}
					endforeach;?>
				</ul>
				<input type="button" class="list-slide-button-prev sm-hide xs-hide" id="brand_nav_prev" data-fix="brand_nav" value=" ">
				<input type="button" class="list-slide-button-next sm-hide xs-hide" id="brand_nav_next" data-fix="brand_nav" value=" ">
			</div><div class="clear"></div>
		</div>
	</div>

<?
//echo "<pre>"; print_r($arResult); echo "</pre>";