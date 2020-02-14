<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var CBitrixComponentTemplate $this */
/** @var array $arParams */
/** @var array $arResult */
/** @global CDatabase $DB */

$this->setFrameMode(true);

global $eMarketBasketData;

if (!empty($arResult['ITEMS']))
{

?>
<span class="span_5_of_5 sm-hide xs-hide">
	<h2><?=GetMessage('SB_HREF_TITLE')?></h2>
</span>
<div class="container-full sm-hide xs-hide">

	<?

	$strElementEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT");
	$strElementDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE");
	$arElementDeleteParams = array("CONFIRM" => GetMessage('CT_BCS_TPL_ELEMENT_DELETE_CONFIRM'));

	foreach ($arResult['ITEMS'] as $key => $arItem):
		$img = SITE_TEMPLATE_PATH.'/images/no-image.png';
		if (is_array($arItem["PREVIEW_PICTURE"])){
			$img = \Alexkova\Emarket\Catalog\Image::getResizeImage($arItem["PREVIEW_PICTURE"]["ID"]);
		}elseif(is_array($arItem["DETAIL_PICTURE"])){
			$img = \Alexkova\Emarket\Catalog\Image::getResizeImage($arItem["DETAIL_PICTURE"]["ID"]);
		}

		$boolDiscountShow = (0 < $arItem['MIN_PRICE']['DISCOUNT_DIFF']);

		?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $strElementEdit);
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $strElementDelete, $arElementDeleteParams);
		$strMainID = $this->GetEditAreaId($arItem['ID']);

		$boolDiscountShow = (0 < $arItem['MIN_PRICE']['DISCOUNT_DIFF']);
		?>

		<div class="span_4_of_4 sale-cart" id="<?=$strMainID?>">
			<div id="cart_<?=$arItem["ID"]?>">



				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
					<div class="sale-cart-image">
						<img src="<?=$img?>" alt=" ">
					</div>
					<div class="sale-cart-name">
						<span><?=$arItem["NAME"]?></span>
					</div>
					<div class="clear"></div>
				</a>

				<div class="emarket-average-label-area">
					<?if ($boolDiscountShow):?>
						<div class="emarket-label emarket-label-sale"></div>
					<?endif;?>
					<?if ($arItem["PROPERTIES"]["SPECIALOFFER"]["VALUE_ENUM_ID"]>0):?>
						<div class="emarket-label emarket-label-soffer"></div>
					<?endif;?>
					<?if ($arItem["PROPERTIES"]["NEWPRODUCT"]["VALUE_ENUM_ID"]>0):?>
						<div class="emarket-label emarket-label-new"></div>
					<?endif;?>
					<?if ($arItem["PROPERTIES"]["SALELEADER"]["VALUE_ENUM_ID"]>0):?>
						<div class="emarket-label emarket-label-hit"></div>
					<?endif;?>
					<?if ($arItem["PROPERTIES"]["RECOMMENDED"]["VALUE_ENUM_ID"]>0):?>
						<div class="emarket-label emarket-label-rec"></div>
					<?endif;?>
					<div class="clear"></div>
				</div>

				<div class="sale-cart-price-line">
					<div class="sale-cart-price emarket-format-price">
						<?=$arItem['MIN_PRICE']['PRINT_DISCOUNT_VALUE']?>
					</div>
					<?if ('Y' == $arParams['SHOW_OLD_PRICE'] && $arItem['MIN_PRICE']['DISCOUNT_VALUE'] < $arItem['MIN_PRICE']['VALUE']):?>
						<div class="sale-cart-old-price emarket-format-price">
							<?=$arItem['MIN_PRICE']['PRINT_VALUE']?>
						</div>
					<?endif;?>
					<div class="clear"></div>
				</div>
				<div class="sale-cart-operation">
					<div class="emarket-sale-buttons">

						<?if (count($arItem["OFFERS"])<=0){?>
							<form class="basket_action" id="cart_form_<?=$arItem["ID"]?>">
								<?if ('Y' == $arParams['USE_PRODUCT_QUANTITY']):?>
									<input type="button" id="quantity-button-minus-<?=$arItem["ID"]?>" class="quantity-button-minus" value="-">
									<input type="text" value="1" class="quantity-text" name="quantity" id="quantity-<?=$arItem["ID"]?>">
									<input type="button" id="quantity-button-plus-<?=$arItem["ID"]?>" class="quantity-button-plus" value="+">
								<?endif;?>
								<div class="clear"></div>

								<input type="hidden" value="<?=$arItem["ID"]?>" name="item">
								<input type="hidden" value="ADDTOCART" name="action">

								<?
								global $eMarketBasketData;
								$addClass="";
								if (in_array($arItem["ID"], $eMarketBasketData["DELAY"])) $addClass=" active";
								?>
								<?
								$buttonMSG = GetMessage('TO_BASKET');
								$basketMSG = "";
								$basketMSGTitle = "";

								if (in_array($arItem["ID"], $eMarketBasketData["ITEMS"])){
									$compareMSG = " active";
									$buttonMSG = GetMessage('IN_BASKET_BUTTON');
									$basketMSGTitle = GetMessage('IN_BASKET');
									$basketMSG = " active";
								}
								?>

								<div class="basket-button-area" data-basketitem="<?=$arItem["ID"]?>">
									<input type="submit" class="color-icon-button color-icon-button-basket" value="<?=$buttonMSG?>" name="basketadd">
									<div class="basket-button-state<?=$basketMSG?>"><?=$basketMSGTitle?></div>
								</div>


								<a href="#" class="icon-transparent icon-delay-transparent icon-transparent-notext<?=$addClass?> small-shadow" data-basketitem="<?=$arItem["ID"]?>"></a>

								<?
								$compareType = (isset($_SESSION["CATALOG_COMPARE_LIST"][$arItem["IBLOCK_ID"]]["ITEMS"][$arItem["ID"]])) ? "show" : "set";
								$compareMSG = (isset($_SESSION["CATALOG_COMPARE_LIST"][$arItem["IBLOCK_ID"]]["ITEMS"][$arItem["ID"]])) ? " active" : "";
								?>

								<a href="javascript:void(0)" data-compare="<?=$arItem["ID"]?>" class="compare-icon icon-transparent icon-compare-transparent icon-transparent-notext<?=$compareMSG?> small-shadow" data-scroll="body-counter" data-comparestate="<?=$compareType?>"></a>


								<?

								$addClass = '';
								if (in_array($arItem["ID"],$eMarketBasketData["ITEMS"])) $addClass=' active';
								?>


								<!--<input type="button" class="color-button color-button-blue small" value=" упить в один клик" name="ONECLICK">-->
							</form>
						<?}else{?>
							<a href="<?=$arItem["DETAIL_PAGE_URL"]?>#detail" data-scroll="emarket-offers" class="color-button color-button-blue small scroll-navigate"><?=GetMessage('CATALOG_OFFERS')?></a>
						<?}?>



						<div class="clear"></div>
					</div>
				</div>
			</div>
		</div>
	<?endforeach;?>
	<div class="clear"></div>
</div>

<?}?>