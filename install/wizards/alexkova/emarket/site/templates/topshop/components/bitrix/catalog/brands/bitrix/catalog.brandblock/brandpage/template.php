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

				<div class="container-full brand-list">
						<?foreach ($arResult["BRAND_BLOCKS"] as $arBrand):
							if (strlen($arBrand["LINK"])>0){
							?>
							<div class="span_1_of_4 brand-cart">
								<a href="<?=str_replace("//","/", SITE_DIR.$arBrand["LINK"])?>" class="brand-image">
									<img src="<?=$arBrand["PICT"]["SRC"]?>">
								</a>
							</div>
						<?
						}
						endforeach;?>
				</div>
			<div class="clear"></div>


<?
//echo "<pre>"; print_r($arResult); echo "</pre>";