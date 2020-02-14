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
use Alexkova\Emarket\Catalog\Image;

$this->setFrameMode(true);

global $eMarketBasketData;

//echo "<pre>34"; print_r($arResult); echo "</pre>";

if (!empty($arResult['ITEMS']))
{

?>
<?
	if ($arParams["DISPLAY_TOP_PAGER"])
	{
		echo $arResult["NAV_STRING"];
	}
?>

<div class="container-full">

<div class="emarket-detail-area-container sale-cart-table" style="display: block;" id="emarket-offers-tab">
		<table width="100%" class="emarket-offers-list" cell-spacing="2">
				<?

				$strElementEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT");
				$strElementDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE");
				$arElementDeleteParams = array("CONFIRM" => GetMessage('CT_BCS_TPL_ELEMENT_DELETE_CONFIRM'));

				foreach ($arResult['ITEMS'] as $key => $arItem):
					$img = SITE_TEMPLATE_PATH.'/images/no-image.png';
					if (is_array($arItem["PREVIEW_PICTURE"])){
						$img = \Alexkova\Emarket\Catalog\Image::getResizeImage($arItem["PREVIEW_PICTURE"]["ID"], 170);
					}elseif(is_array($arItem["DETAIL_PICTURE"])){
						$img = \Alexkova\Emarket\Catalog\Image::getResizeImage($arItem["DETAIL_PICTURE"]["ID"], 170);
					}



					$boolDiscountShow = (0 < $arItem['MIN_PRICE']['DISCOUNT_DIFF']);
					?>
					<?
					$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $strElementEdit);
					$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $strElementDelete, $arElementDeleteParams);
					$strMainID = $this->GetEditAreaId($arItem['ID']);?>
					<tr id="<?=$strMainID?>">
						<td class="emarket-offers-ico">
							<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img src="<?=$img?>" alt="<?=$arItem["NAME"]?>"></a>
						</td>

						<td class="emarket-offers-props">



							<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
								<div class="sale-cart-list-name">
									<span><?=$arItem["NAME"]?></span>
									<div class="emarket-little-label-area">
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
								</div>
							</a>
						</td>

						<td class="emarket-offers-price">
							<div class="sale-cart-price-line">
								<div class="sale-cart-price emarket-format-price">
									<?=$arItem['MIN_PRICE']['PRINT_DISCOUNT_VALUE']?><?
                                                                            if(isset($arParams['SHOW_UNIT_MEASUREMENT']) && $arParams['SHOW_UNIT_MEASUREMENT'] == "Y")
                                                                                echo "/".$arItem['CATALOG_MEASURE_NAME'];
                                                                        ?>
								</div>
								<?if ('Y' == $arParams['SHOW_OLD_PRICE'] && $arItem['MIN_PRICE']['DISCOUNT_VALUE'] < $arItem['MIN_PRICE']['VALUE']):?>
									<div class="sale-cart-old-price emarket-format-price">
										<?=$arItem['MIN_PRICE']['PRINT_VALUE']?><?
                                                                                    if(isset($arParams['SHOW_UNIT_MEASUREMENT']) && $arParams['SHOW_UNIT_MEASUREMENT'] == "Y")
                                                                                        echo "/".$arItem['CATALOG_MEASURE_NAME'];
                                                                                ?>
									</div>
								<?endif;?>
								<div class="clear"></div>
							</div>
						</td>

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

						<td class="emarket-offers-sale">
							<?if (count($arItem["OFFERS"])<=0){?>
								<form class="basket_action" id="cart_form_<?=$arItem["ID"]?>">
									<div class="basket-qty-area sm-hide xs-hide">
										<input type="button" id="quantity-button-minus-<?=$arItem["ID"]?>" class="quantity-button-minus" value="-">
										<input type="text" value="1" class="quantity-text" name="quantity" id="quantity-<?=$arItem["ID"]?>">
										<input type="hidden" value="<?=$arItem["ID"]?>" name="item">
										<input type="hidden" value="ADDTOCART" name="action">
										<input type="button" id="quantity-button-plus-<?=$arItem["ID"]?>" class="quantity-button-plus" value="+">
									</div>
									<div class="basket-button-area" data-basketitem="<?=$arItem["ID"]?>">
										<input type="submit" class="color-icon-button color-icon-button-basket" value="<?=$buttonMSG?>" name="basketadd">
										<div class="basket-button-state<?=$basketMSG?>"><?=$basketMSGTitle?></div>
									</div>

								</form>
							<?}else{?>
								<a href="<?=$arItem["DETAIL_PAGE_URL"]?>#detail" data-scroll="emarket-offers" class="color-button color-button-blue small scroll-navigate"><?=GetMessage('CATALOG_OFFERS')?></a>
							<?}?>
						</td><td class="emarket-offers-advanced emarket-sale-buttons xs-hide sm-hide">
							<?if (count($arItem["OFFERS"])<=0){?>
							<a href="javascript:void(0)" class="icon-transparent icon-delay-transparent icon-transparent-notext<?=$addClass?> small-shadow" data-basketitem="<?=$arItem["ID"]?>"></a>

							<?
							$compareType = (isset($_SESSION["CATALOG_COMPARE_LIST"][$arItem["IBLOCK_ID"]]["ITEMS"][$arItem["ID"]])) ? "show" : "set";
							$compareMSG = (isset($_SESSION["CATALOG_COMPARE_LIST"][$arItem["IBLOCK_ID"]]["ITEMS"][$arItem["ID"]])) ? " active" : "";
							?>

							<a href="javascript:void(0)" data-compare="<?=$arItem["ID"]?>" class="compare-icon icon-transparent icon-compare-transparent icon-transparent-notext<?=$compareMSG?> small-shadow" data-scroll="body-counter" data-comparestate="<?=$compareType?>"></a>
							<?}?>
						</td>

					</tr>
				<?endforeach;?>
		</table>
</div>


</div>

<?
}
if ($arParams["DISPLAY_BOTTOM_PAGER"])
{
	echo $arResult["NAV_STRING"];
}

?>
