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
		$strMainID = $this->GetEditAreaId($arItem['ID']);

		$boolDiscountShow = (0 < $arItem['MIN_PRICE']['DISCOUNT_DIFF']);
		?>

	<div class="span_5_of_5 sale-cart-list" id="<?=$strMainID?>">
		<div id="cart_<?=$arItem["ID"]?>">

			<table class="sale-table">
				<tr>
					<td class="sale-cart-list-image">
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
							<div class="sale-cart-list-name lg-hide md-hide">
								<span><?=$arItem["NAME"]?></span>
							</div>
							<div class="sale-cart-image">
								<img src="<?=$img?>" alt=" ">
							</div>
						</a>


					</td>
					<td class="sale-cart-list-description sm-hide xs-hide">
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
							<div class="sale-cart-list-name">
								<span><?=$arItem["NAME"]?></span>
							</div>
						</a>

						<div class="sale-cart-list-detail" data-item="<?=$arItem["ID"]?>">
							<div class="sale-cart-list-text">
								<?=$arItem["PREVIEW_TEXT"]?>
							</div>

							<?if (count($arItem["DISPLAY_PROPERTIES"])>0):?>
								<div class="emarket-detail-area-container"   id="emarket-props-tab">
									<div class="title-span"><?=GetMessage('CATALOG_PROPS_TITLE')?></div>
									<table width="100%" class="emarket-props-table">
										<?foreach($arItem["DISPLAY_PROPERTIES"] as $arProperty):?>
											<?if (!is_array($arProperty["VALUE"])){?>
												<tr>
													<td class="emarket-props-name"><span><?=$arProperty["NAME"]?></span></td>
													<td class="emarket-props-data"><?=$arProperty["VALUE"]?></td>
												</tr>
											<?}else{?>
											<?}?>
										<?endforeach;?>
										<?foreach($arItem["DISPLAY_PROPERTIES"] as $arProperty):?>
											<?if (is_array($arProperty["VALUE"]) && count($arProperty["VALUE"]>0)){?>
												<tr>
													<td colspan="2" class="emarket-props-data emarket-props-data-group">
														<b><?=$arProperty["NAME"]?></b></td>
												</tr>
												<?foreach($arProperty["VALUE"] as $cell=>$val){?>
													<tr>
														<td class="emarket-props-name"><span><?=$arProperty["DESCRIPTION"][$cell]?></span></td>
														<td class="emarket-props-data"><?=$val?></td>
													</tr>
												<?}?>
											<?}else{?>
											<?}?>
										<?endforeach;?>
									</table>
								</div>
							<?endif;?>
						</div>
						<div class="sale-cart-list-detail-button">
							<a href="javascript:void(0)" data-item="<?=$arItem["ID"]?>"><?=GetMessage('CATALOG_DETAIL')?></a>
						</div>



					</td>
					<td class="sale-cart-list-prices">
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

										<div class="adv-buttons">
											<?if (count($arResult["OFFERS"])<=0):?>

												<?
												$addClass="";
												if (in_array($arItem["ID"], $eMarketBasketData["DELAY"])) $addClass=" active";
												?>

												<a href="#" data-basketitem="<?=$arItem["ID"]?>" class="icon-transparent icon-delay-transparent<?=$addClass?>"><?=GetMessage('CT_BCE_CATALOG_DELAY')?></a>
											<?endif;?>
											<?
											$compareType = (isset($_SESSION["CATALOG_COMPARE_LIST"][$arItem["IBLOCK_ID"]]["ITEMS"][$arItem["ID"]])) ? "show" : "set";
											$compareMSG = (isset($_SESSION["CATALOG_COMPARE_LIST"][$arItem["IBLOCK_ID"]]["ITEMS"][$arItem["ID"]])) ? GetMessage('CT_BCE_CATALOG_COMPARE_LIST') : GetMessage('CT_BCE_CATALOG_COMPARE')
											?>
											<a href="javascript:void(0)" data-compare="<?=$arItem["ID"]?>" class="compare-button icon-transparent icon-compare-transparent" data-scroll="body-counter" data-comparestate="<?=$compareType?>"><?=$compareMSG?></a>
											<div class="clear"></div>
										</div>

										<?
										if (isset($arItem['OFFERS']) && !empty($arItem['OFFERS']))
										{
											$canBuy = $arItem['OFFERS'][$arItem['OFFERS_SELECTED']]['CAN_BUY'];
										}
										else
										{
											$canBuy = $arItem['CAN_BUY'];
										}

										if ($canBuy && $arItem["CATALOG_QUANTITY"]>0){
											echo '<div class="emarket-available">'.GetMessage('CT_BCE_CATALOG_AVAILABLE').'</div>';
										}
										else if(!$canBuy && false){
											if (strlen($arParams['MESS_NOT_AVAILABLE'])>0)
												echo GetMessage($arParams['MESS_NOT_AVAILABLE']);
										}
										?>

										<?/*

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
*/?>


									</form>
								<?}else{?>
									<a href="<?=$arItem["DETAIL_PAGE_URL"]?>#detail" data-scroll="emarket-offers" class="color-button color-button-blue small scroll-navigate"><?=GetMessage('CATALOG_OFFERS')?></a>
								<?}?>



								<div class="clear"></div>
							</div>
						</div>
					</td>
				</tr>
			</table>

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





		</div>
	</div>
	<?endforeach;?>
	<div class="clear"></div>
</div>

<?
}
if ($arParams["DISPLAY_BOTTOM_PAGER"])
{
	echo $arResult["NAV_STRING"];
}

?>
