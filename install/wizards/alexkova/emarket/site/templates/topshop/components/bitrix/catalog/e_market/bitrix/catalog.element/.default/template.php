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

//unset($arResult["MORE_PHOTO"]);
global $moreSettings;
//echo "<pre>34"; print_r($arParams); echo "</pre>";
//echo "<pre>34"; print_r($arResult); echo "</pre>";
//echo "<pre>34"; print_r($arResult["OFFERS"]); echo "</pre>";

$templateData = array(
	'TEMPLATE_THEME' => $this->GetFolder().'/themes/'.$arParams['TEMPLATE_THEME'].'/style.css',
	'TEMPLATE_CLASS' => 'bx_'.$arParams['TEMPLATE_THEME']
);

$strMainID = $this->GetEditAreaId($arResult['ID']);
$arItemIDs = array(
	'ID' => $strMainID,
	'PICT' => $strMainID.'_pict',
	'DISCOUNT_PICT_ID' => $strMainID.'_dsc_pict',
	'STICKER_ID' => $strMainID.'_sticker',
	'BIG_SLIDER_ID' => $strMainID.'_big_slider',
	'BIG_IMG_CONT_ID' => $strMainID.'_bigimg_cont',
	'SLIDER_CONT_ID' => $strMainID.'_slider_cont',
	'SLIDER_LIST' => $strMainID.'_slider_list',
	'SLIDER_LEFT' => $strMainID.'_slider_left',
	'SLIDER_RIGHT' => $strMainID.'_slider_right',
	'OLD_PRICE' => $strMainID.'_old_price',
	'PRICE' => $strMainID.'_price',
	'DISCOUNT_PRICE' => $strMainID.'_price_discount',
	'SLIDER_CONT_OF_ID' => $strMainID.'_slider_cont_',
	'SLIDER_LIST_OF_ID' => $strMainID.'_slider_list_',
	'SLIDER_LEFT_OF_ID' => $strMainID.'_slider_left_',
	'SLIDER_RIGHT_OF_ID' => $strMainID.'_slider_right_',
	'QUANTITY' => $strMainID.'_quantity',
	'QUANTITY_DOWN' => $strMainID.'_quant_down',
	'QUANTITY_UP' => $strMainID.'_quant_up',
	'QUANTITY_MEASURE' => $strMainID.'_quant_measure',
	'QUANTITY_LIMIT' => $strMainID.'_quant_limit',
	'BUY_LINK' => $strMainID.'_buy_link',
	'ADD_BASKET_LINK' => $strMainID.'_add_basket_link',
	'COMPARE_LINK' => $strMainID.'_compare_link',
	'PROP' => $strMainID.'_prop_',
	'PROP_DIV' => $strMainID.'_skudiv',
	'DISPLAY_PROP_DIV' => $strMainID.'_sku_prop',
	'OFFER_GROUP' => $strMainID.'_set_group_',
	'BASKET_PROP_DIV' => $strMainID.'_basket_prop',
);
$strObName = 'ob'.preg_replace("/[^a-zA-Z0-9_]/", "x", $strMainID);
$templateData['JS_OBJ'] = $strObName;

$strTitle = (
	isset($arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_TITLE"]) && '' != $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_TITLE"]
	? $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_TITLE"]
	: $arResult['NAME']
);
$strAlt = (
	isset($arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_ALT"]) && '' != $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_ALT"]
	? $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_ALT"]
	: $arResult['NAME']
);

$useVoteRating = ('Y' == $arParams['USE_VOTE_RATING']);
$boolDiscountShow = (0 < $arResult['MIN_PRICE']['DISCOUNT_DIFF']);

?>

<div class="container" id="<? echo $arItemIDs['ID']; ?>">

	<div class="emarket-cart-left-column  xs-span_5_of_5">
		<ul class="emarket-top-link  xs-hide sm-hide">
			<?if (count($arResult["OFFERS"])>0):?>
				<li><a href="#detail" data-scroll="emarket-offers"><?=GetMessage('CATALOG_OFFERS')?></a></li>
			<?endif;?>

			<li><a href="#detail" data-scroll="emarket-description"><?=GetMessage('CATALOG_DESCRIPTION')?></a></li>

			<?if (count($arResult["DISPLAY_PROPERTIES"])>0):?>
				<li><a href="#detail" data-scroll="emarket-props"><?=GetMessage('CATALOG_PROPS')?></a></li>
			<?endif;?>

			<?if ('Y' == $arParams['USE_COMMENTS']):?>
				<li><a href="#detail" data-scroll="emarket-comments"><?=GetMessage('CATALOG_COMMENTS')?></a></li>
			<?endif?>
			<?if ($moreSettings["USE_STORE_FLAG"]):?>
				<li><a href="#detail" data-scroll="emarket-stores"><?=GetMessage('CT_BCE_CATALOG_BTN_MESSAGE_USE_STORE')?></a></li>
			<?endif;?>

			<?if (isset($arResult["PROPERTIES"]["ACCESSORIES"]) && !empty($arResult["PROPERTIES"]["ACCESSORIES"]["VALUE"])>0):?>
				<li><a href="#accessories" data-scroll="accessories"><?=GetMessage('ACCESSORIES_TITLE')?></a></li>
			<?endif;?>

		</ul>
		<div class="clear"></div>

		<?
		$firstPhoto = false;
		if (is_array($arResult["DETAIL_PICTURE"])){
			$firstPhoto = $arResult["DETAIL_PICTURE"];
		}
		elseif(count($arResult["MORE_PHOTO"]) > 0){
			$firstPhoto = $arResult["MORE_PHOTO"][0];
		}
		?>

		<div class="emarket_slider">
			<div id="emarket_big_photo">
				<?if (is_array($firstPhoto)):?>
					<a href="<?=$firstPhoto["SRC"]?>"  rel="emarket-gallery">
						<img id="iMain" src="<?=$firstPhoto["SRC"]?>" alt="<?=$arResult["NAME"]?>" class="inslider" data-state="show">
					</a>
				<?else:?>
					<img src="<?=$arResult["DEFAULT_PICTURE"]["SRC"]?>" alt=" ">
				<?endif;?>
				<?if (count($arResult["MORE_PHOTO"]) > 0):?>
					<?foreach($arResult["MORE_PHOTO"] as $cell=>$photo):?>
                                        <?if ($cell == 0) {
                                            continue;
                                        }?>
							<a href="<?=$photo["SRC"]?>" rel="emarket-gallery"><img id="i<?=$cell?>" src="<?=$photo["SRC"]?>" class="inslider inslider-hide" alt="<?=$arResult["NAME"]."_".$cell?>" data-state="hide"></a>
					<?endforeach;?>
				<?endif;?>
				<?if (count($arResult["MORE_PHOTO"]) > 0):?>
					<input type="button" class='list-slide-button-prev' id="c_bigphotos_prev"  data-fix="c_photos" value=" ">
					<input type="button" class='list-slide-button-prev' id="c_bigphotos_zoom"  data-fix="c_photos" value=" ">
					<input type="button" class='list-slide-button-next' id="c_bigphotos_next"  data-fix="c_photos" value=" ">
				<?endif;?>
			</div>

			<?if (count($arResult["MORE_PHOTO"]) > 1):?>
				<div id="emarket-photo-slider" style="position: relative" class="sm-hide xs-hide">
					<div class="sale-carousel" id="c_photos">
						<ul class="sale-carousel-row">
							<?foreach($arResult["MORE_PHOTO"] as $cell=>$photo):?>
                                                                <li class="photo <?=$cell == 0 ? 'active' : ''?>" id="rec_tab1" data-slide="1" data-type="group" data-state="load">
                                                                    <div class="photo-wrap">
                                                                    <img src="<?=$photo["SRC"]?>" alt="<?=$arResult["NAME"]."_".$cell?>" data-item="<?if ($cell == 0):?>iMain<?else:?>i<?=$cell?><?endif?>">
                                                                    </div>
								</li>
							<?endforeach;?>
						</ul>
					</div>
					<input type="button" class='list-slide-button-prev' id="c_photos_prev"  data-fix="c_photos" value=" ">
					<input type="button" class='list-slide-button-next' id="c_photos_next"  data-fix="c_photos" value=" ">
				</div>
			<?endif;?>


			<div class="emarket-big-label-area">
				<?if ($boolDiscountShow):?>
					<div class="emarket-label emarket-label-sale"></div>
				<?endif;?>
				<?if ($arResult["PROPERTIES"]["SPECIALOFFER"]["VALUE_ENUM_ID"]>0):?>
					<div class="emarket-label emarket-label-soffer"></div>
				<?endif;?>
				<?if ($arResult["PROPERTIES"]["NEWPRODUCT"]["VALUE_ENUM_ID"]>0):?>
					<div class="emarket-label emarket-label-new"></div>
				<?endif;?>
				<?if ($arResult["PROPERTIES"]["SALELEADER"]["VALUE_ENUM_ID"]>0):?>
					<div class="emarket-label emarket-label-hit"></div>
				<?endif;?>
				<?if ($arResult["PROPERTIES"]["RECOMMENDED"]["VALUE_ENUM_ID"]>0):?>
					<div class="emarket-label emarket-label-rec"></div>
				<?endif;?>

			</div>

		</div>
	</div>
	<div class="emarket-cart-right-column  xs-span_5_of_5">
		<?
		if ($useVoteRating)
		{
			?><?$APPLICATION->IncludeComponent(
			"bitrix:iblock.vote",
			"stars",
			array(
				"IBLOCK_TYPE" => $arParams['IBLOCK_TYPE'],
				"IBLOCK_ID" => $arParams['IBLOCK_ID'],
				"ELEMENT_ID" => $arResult['ID'],
				"ELEMENT_CODE" => "",
				"MAX_VOTE" => "5",
				"VOTE_NAMES" => array("1", "2", "3", "4", "5"),
				"SET_STATUS_404" => "N",
				"DISPLAY_AS_RATING" => $arParams['VOTE_DISPLAY_AS_RATING'],
				"CACHE_TYPE" => $arParams['CACHE_TYPE'],
				"CACHE_TIME" => $arParams['CACHE_TIME']
			),
			false,
			array("HIDE_ICONS" => "Y")
		);?><?
		}

		if (isset($arResult['OFFERS']) && !empty($arResult['OFFERS']))
		{
			$canBuy = $arResult['OFFERS'][$arResult['OFFERS_SELECTED']]['CAN_BUY'];
		}
		else
		{
			$canBuy = $arResult['CAN_BUY'];
		}

		if ($canBuy && $arResult["CATALOG_QUANTITY"]>0){
			echo '<div class="emarket-available">'.GetMessage('CT_BCE_CATALOG_AVAILABLE').'</div>';
		}
		else if(!$canBuy && false){
			if (strlen($arParams['MESS_NOT_AVAILABLE'])>0)
				echo GetMessage($arParams['MESS_NOT_AVAILABLE']);
		}
		?>
		<div class="clear"></div>
		<div class="sale-panel span-xs_5_of_5">
			<div class="sale-panel-container">

				<?$frame = $this->createFrame()->begin();?>

				<?if ((((is_array($arResult["PRICE_MATRIX"]) && !empty($arResult["PRICE_MATRIX"]))) || count($arResult["PRICES"])>0) && count($arResult["OFFERS"])<=0){?>

					<?if (is_array($arResult["PRICE_MATRIX"]) && !empty($arResult["PRICE_MATRIX"])){
						/*?>
						<div><?=GetMessage('PRICE_MATRIX_TITLE')?></div>
							<table>
								<?foreach($arResult["PRICE_MATRIX"]["ROWS"] as $cell=>$val):?>
									<tr>
										<td><?=$val["QUANTITY_FROM"]?>-<?=$val["QUANTITY_TO"]?></td>
										<?foreach($arResult["PRICE_MATRIX"]["COLS"] as $cell2=>$val2):?>
											<td><?=SaleFormatCurrency($arResult["MATRIX"][$cell2][$cell]["DISCOUNT_PRICE"],$arResult["MATRIX"][$cell2][$cell]["RUB"])?></td>
										<?endforeach;?>
									</tr>
								<?endforeach;?>
							</table>
					<?*/}else{?>
						<?foreach($arResult["PRICES"] as $priceCode => $arPrice):?>
							<?if (in_array($arResult["CAT_PRICES"][$priceCode]["ID"], $arResult["PRICES_ALLOW"])):?>
								<div class="emarket-item-price">
									<div class="price-name"><?=$arResult["CAT_PRICES"][$priceCode]["TITLE"]?></div>
									<div class="emarket-old-price" id="<? echo $arItemIDs['OLD_PRICE']; ?>" style="display: <? echo ($boolDiscountShow ? '' : 'none'); ?>"><? echo ($boolDiscountShow ? $arPrice['PRINT_VALUE'] : ''); ?></div>
									<div class="emarket-current-price emarket-format-price" id="<? echo $arItemIDs['PRICE']; ?>"><? echo $arPrice['PRINT_DISCOUNT_VALUE']; ?></div>
									<div class="clear"></div>
								</div>
							<?endif;?>
						<?endforeach;?>
					<?}?>
				<?}else{?>
					<div class="emarket-item-price">
						<div class="emarket-old-price" id="<? echo $arItemIDs['OLD_PRICE']; ?>" style="display: <? echo ($boolDiscountShow ? '' : 'none'); ?>"><? echo ($boolDiscountShow ? $arResult['MIN_PRICE']['PRINT_VALUE'] : ''); ?></div>
						<div class="emarket-current-price emarket-format-price" id="<? echo $arItemIDs['PRICE']; ?>"><? echo $arResult['MIN_PRICE']['PRINT_DISCOUNT_VALUE']; ?></div>
						<div class="clear"></div>
					</div>
				<?}?>


				<div class="emarket-sale-buttons">
				<?if (count($arResult["OFFERS"])<=0){?>
					<form class="basket_action" id="cart_form_<?=$arResult["ID"]?>"">
						<div class="basket-button-area" data-basketitem="<?=$arResult["ID"]?>">
						<?if ('Y' == $arParams['USE_PRODUCT_QUANTITY']):?>
							<input type="button" id="quantity-button-minus-<?=$arResult["ID"]?>" class="quantity-button-minus" value="-">
							<input type="text" value="1" class="quantity-text" name="quantity" id="quantity-<?=$arResult["ID"]?>">
							<input type="button" id="quantity-button-plus-<?=$arResult["ID"]?>" class="quantity-button-plus" value="+">
						<?endif;?>

							<input type="hidden" value="<?=$arResult["ID"]?>" name="item">
							<input type="hidden" value="ADDTOCART" name="action">

						<?
						global $eMarketBasketData;

						$buttonMSG = GetMessage('TO_BASKET');
						$basketMSG = "";
						$basketMSGTitle = "";

						if (in_array($arResult["ID"], $eMarketBasketData["ITEMS"])){
							$compareMSG = " active";
							$buttonMSG = GetMessage('IN_BASKET_BUTTON');
							$basketMSGTitle = GetMessage('IN_BASKET');
							$basketMSG = " active";
						}
						?>


								<input type="submit" class="color-icon-button color-icon-button-basket" value="<?=$buttonMSG?>" name="basketadd">
								<div class="basket-button-state<?=$basketMSG?>"><?=$basketMSGTitle?></div>
						</div>
							<input type="button" class="color-button color-button-blue small one-click-button" value="<?=GetMessage('ONE_CLICK_SALE')?>" name="ONECLICK" data-trade="<?=$arResult["ID"]?>">
					</form>
				<?}else{?>
					<a href="#detail" data-scroll="emarket-offers" class="color-button color-button-blue small scroll-navigate"><?=GetMessage('CATALOG_OFFERS')?></a>
				<?}?>
					<?if (count($arResult["OFFERS"])<=0):?>

						<?
						$addClass="";
						if (in_array($arResult["ID"], $eMarketBasketData["DELAY"])) $addClass=" active";
						?>

						<a href="#" data-basketitem="<?=$arResult["ID"]?>" class="icon-transparent icon-delay-transparent<?=$addClass?>"><?=GetMessage('CT_BCE_CATALOG_DELAY')?></a>
					<?endif;?>
					<?
					$compareType = (isset($_SESSION["CATALOG_COMPARE_LIST"][$arResult["IBLOCK_ID"]]["ITEMS"][$arResult["ID"]])) ? "show" : "set";
					$compareMSG = (isset($_SESSION["CATALOG_COMPARE_LIST"][$arResult["IBLOCK_ID"]]["ITEMS"][$arResult["ID"]])) ? GetMessage('CT_BCE_CATALOG_COMPARE_LIST') : GetMessage('CT_BCE_CATALOG_COMPARE')
					?>
						<a href="javascript:void(0)" data-compare="<?=$arResult["ID"]?>" class="compare-button icon-transparent icon-compare-transparent sm-hide xs-hide" data-scroll="body-counter" data-comparestate="<?=$compareType?>"><?=$compareMSG?></a>

					<div class="clear"></div>
				</div>
			</div>

			<?$frame->beginStub()?>
			...
			<?$frame->end()?>


			<div class="emarket-sonet-share sm-hide xs-hide">
				<?$APPLICATION->IncludeComponent("bitrix:main.share", "emarket-sonet-share", Array(
					"HIDE" => "N",	// Скрыть панель закладок по умолчанию
						"HANDLERS" => array(	// Используемые соц. закладки и сети
							0 => "lj",
							1 => "twitter",
							2 => "vk",
							3 => "facebook",
							4 => "mailru",
						),
						"PAGE_URL" => SITE_SERVER_NAME.$arResult["DETAIL_PAGE_URL"],	// URL страницы относительно корня сайта
						"PAGE_TITLE" => $arResult["NAME"],	// Заголовок страницы
						"SHORTEN_URL_LOGIN" => "",	// Логин для bit.ly
						"SHORTEN_URL_KEY" => "",	// Ключ API для bit.ly
					),
					false
				);?>
			</div>



		</div>

		<div class="emarket-detail-info sm-hide xs-hide">
			<input type="button" data-scrollable="1" data-scroll="emarket-extented" class="color-button" value="<?=GetMessage('EMARKET_DETAIL_INFO')?>">
		</div>

	</div>
	<div class="clear"></div>


</div>




<script>
	var createSlider = false;
	<?if (count($arResult["MORE_PHOTO"])>5):?>
	createSlider = true;
	var countPhoto = <?=count($arResult["MORE_PHOTO"])-1?>;
	<?endif;?>
</script>

