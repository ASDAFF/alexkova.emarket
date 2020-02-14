<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if ($BID > 0) return;

if (count($arResult["ITEMS"])>0):
	$this->setFrameMode(true);
	?>

	<?$first = ' active';?>
<div class="container"><h2><?=GetMessage('OUR_RECOMMEND')?></h2></div>
<div class="container container-best-choice" id="best_panel">
	<div class="sale-carousel-wrapper xs-hide sm-hide">
		<div class="sale-carousel" id="c_nav">
			<ul class="sale-carousel-row">

				<?foreach($arResult["ITEMS"] as $arItem):?>
					<?
					$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $strElementEdit);
					$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $strElementDelete, $arElementDeleteParams);
					$strMainID = $this->GetEditAreaId($arItem['ID']);
					?>
					<li class="best-choice<?=$first?>"
						id="rec_tab<?=$arItem["ID"]?>" data-slide="<?=$arItem["ID"]?>" data-type="group">
						<div id="<?=$strMainID?>">
							<?=$arItem["NAME"]?> (<?=intval(count($arItem["PROPERTY_ITEMS_VALUE"]))?>)
						</div>
					</li>
					<?$first = '';?>
				<?endforeach;?>

			</ul>
			<div class="clear"></div>
		</div>
		<input type="button" class="list-slide-button-prev" id="c_nav_prev" data-fix="c_nav" value=" ">
		<input type="button" class="list-slide-button-next" id="c_nav_next" data-fix="c_nav" value=" ">
	</div>
	<?/**** responsive gallery ****/?>
	<div class="container-full lg-hide md-hide">
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $strElementEdit);
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $strElementDelete, $arElementDeleteParams);
			$strMainID = $this->GetEditAreaId($arItem['ID']);
			?>
			<div class="span_5_of_5">
				<a class="color-button big rec_mobile_button"
				   href="javascript:void(0)"
				   id="rec_tab_mobile_<?=$arItem["ID"]?>"
				   data-slide="<?=$arItem["ID"]?>"
				   data-type="group_mobile">
					<?=$arItem["NAME"]?> (<?=intval(count($arItem["PROPERTY_ITEMS_VALUE"]))?>)
				</a>
				<ul class="container mobile-carts" id="cont_mobile_<?=$arItem["ID"]?>">

				</ul><div class="clear"></div>
			</div>

			<?$first = '';?>
		<?endforeach;?>
	</div><div class="clear"></div>
</div>

<div class="clear"></div>



<?endif;?>

<script>
	$(document).ready(function(){
		eMarket.jCarousel.ajaxUrl = '<?=SITE_DIR.'ajax/bestsellers/bestsellers.php'?>';
		eMarket.jCarousel.iblockID = <?=$arParams["BESTSELLER_IBLOCK_ID"]?>;
	});
</script>