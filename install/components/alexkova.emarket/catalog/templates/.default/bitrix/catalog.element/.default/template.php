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
global $moreSettings;
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
			<?if (count($arResult["OFFERS"])>0 && $arParams["HIDE_OFFERS_LIST"] != 'Y'):?>
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
						<img id="i0" src="<?=$firstPhoto["SRC"]?>" alt="<?=$arResult["NAME"]?>" class="inslider zoom-img" 
                                                     data-state="show" data-large="<?=$firstPhoto["SRC"]?>" data-text-bottom="<?=$arResult["NAME"]?>">
                                        </a>
				<?else:?>
					<img src="<?=$arResult["DEFAULT_PICTURE"]["SRC"]?>" alt=" ">
				<?endif;?>
				<?if (count($arResult["MORE_PHOTO"]) > 0):?>
					<?foreach($arResult["MORE_PHOTO"] as $cell=>$photo):?>
                                        <?if ($cell == 0) {
                                            continue;
                                        }?>
							<a href="<?=$photo["SRC"]?>" rel="emarket-gallery"><img id="i<?=$cell?>" src="<?=$photo["SRC"]?>" class="inslider inslider-hide zoom-img" alt="<?=$arResult["NAME"]."_".$cell?>" 
                                                                                                                data-state="hide"  data-large="<?=$photo["SRC"]?>" data-text-bottom="<?=$arResult["NAME"]."_".$cell?>" ></a>
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
                                                                <li class="photo <?=$cell == 0 ? 'active' : ''?>" id="rec_tab1" data-slide="<?=$cell?>" data-type="group" data-state="load">
                                                                    <div class="photo-wrap">
                                                                    <img src="<?=$photo["SRC"]?>" alt="<?=$arResult["NAME"]."_".$cell?>" data-item="i<?=$cell?>" <?if ($photo["WIDTH"] > $photo["HEIGHT"]) {?>width="100%"<?} else {?>height="100%"<?}?>>
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

                if ($arResult["CATALOG_QUANTITY"] > 0 && count($arResult["OFFERS"]) <= 0) {
                    $quantity = true;
                    $quantityCnt = $arResult["CATALOG_QUANTITY"];
                } elseif ($arResult["CATALOG_QUANTITY"] <= 0 && count($arResult["OFFERS"]) <= 0) {
                    $quantity = false;
                } elseif (count($arResult["OFFERS"]) > 0) {
                    $quantity = false;
                    $quantityCnt = 0;
                    foreach ($arResult["OFFERS"] as $offer) {
                        $quantityCnt += $offer["CATALOG_QUANTITY"];
                    }
                    if ($quantityCnt > 0)
                        $quantity = true;
                }
                
                if ($canBuy && $quantity || !$canBuy && count($arResult["OFFERS"]) > 0 && $quantity){
                    if ($arParams["SHOW_CATALOG_QUANTITY_CNT"] == "Y")
                        echo '<div class="emarket-ostatok">'.GetMessage('OSTATOK').': '.$quantityCnt.'</div>';
                    if ($arParams["SHOW_CATALOG_QUANTITY"] == "Y")
                        echo '<div class="emarket-available">'.GetMessage('CT_BCE_CATALOG_AVAILABLE').'</div>';
		} elseif (!$quantity) {
                    if ($arParams["SHOW_CATALOG_QUANTITY"] == "Y")
                        echo '<div class="emarket-not-available">'.$arParams["MESS_NOT_AVAILABLE"].'</div>';
                }
		?>
		<div class="clear"></div>
		<div class="sale-panel span-xs_5_of_5">
			<div class="sale-panel-container">
				<?$frame = $this->createFrame()->begin();?>

				<?if ((((is_array($arResult["PRICE_MATRIX"]) && !empty($arResult["PRICE_MATRIX"]))) || count($arResult["PRICES"])>0) && count($arResult["OFFERS"])<=0){?>

					<?if (is_array($arResult["PRICE_MATRIX"]) && !empty($arResult["PRICE_MATRIX"])){?>
                            <div class="emarket-item-price">
                                            <?
                                            reset($arResult['PRICE_MATRIX']['MATRIX']);
                                            $firstPrice = current($arResult['PRICE_MATRIX']['MATRIX']);
                                            if (count($arResult["PRICE_MATRIX"]["ROWS"]) == 1) {
                                                $currency = ($firstPrice[0]["CURRENCY"] == "RUB") ? GetMessage("RUB") : $firstPrice[0]["CURRENCY"];?>
                                                <div class="emarket-current-price emarket-format-price">
                                                    <?=$firstPrice[0]["DISCOUNT_PRICE"]." ".$currency?>
                                                </div>
                                                <?if ('Y' == $arParams['SHOW_OLD_PRICE'] && $firstPrice[0]["DISCOUNT_PRICE"] < $firstPrice[0]["PRICE"]):?>
                                                    <div class="sale-cart-old-price emarket-format-price">
                                                        <?=$firstPrice[0]["PRICE"]." ".$currency?>
                                                    </div>
                                                <?endif;?>
                                            <?} else {
                                                foreach ($arResult["PRICE_MATRIX"]["ROWS"] as $cell => $quantity) {
                                                    $currency = ($firstPrice[$cell]["CURRENCY"] == "RUB") ? GetMessage("RUB") : $firstPrice[$cell]["CURRENCY"];
                                                    $showOldPrice = ('Y' == $arParams['SHOW_OLD_PRICE'] && $firstPrice[$cell]["DISCOUNT_PRICE"] < $firstPrice[$cell]["PRICE"]) ? true : false;
                                                    $colClass = ($showOldPrice) ? "left-third-col" : "left-second-col";?>
                                                    <div class="sale-cart-quantity-price <?=$colClass?>">
                                                        <?if ($quantity["QUANTITY_TO"] == 0) {?>
                                                            <?=GetMessage("FROM")." ".$quantity["QUANTITY_FROM"]." ".GetMessage("THING")?>
                                                        <?} else {?>
                                                            <?=$quantity["QUANTITY_FROM"]." - ".$quantity["QUANTITY_TO"]." ".GetMessage("THING")?>
                                                        <?}?>
                                                    </div>
                                                    <div class="sale-cart-price emarket-format-price <?=$colClass?>">
                                                        <?=$firstPrice[$cell]["DISCOUNT_PRICE"]." ".$currency?><?
                                                            if(isset($arParams['SHOW_UNIT_MEASUREMENT']) && $arParams['SHOW_UNIT_MEASUREMENT'] == "Y")
                                                                echo "/".$arResult['CATALOG_MEASURE_NAME'];
                                                            ?>
                                                    </div>
                                                    <?if ($showOldPrice):?>
                                                        <div class="sale-cart-old-price emarket-format-price left-third-col">
                                                            <?=$firstPrice[$cell]["PRICE"]." ".$currency?><?
                                                            if(isset($arParams['SHOW_UNIT_MEASUREMENT']) && $arParams['SHOW_UNIT_MEASUREMENT'] == "Y")
                                                                echo "/".$arResult['CATALOG_MEASURE_NAME'];
                                                            ?>
                                                        </div>
                                                    <?endif;?>
                                                    <div class="clear"></div>
                                                <?}?>
                                            <?}?>
                                                    </div>
                                            <?}else{?>
						<?foreach($arResult["PRICES"] as $priceCode => $arPrice):?>
							<?if (in_array($arResult["CAT_PRICES"][$priceCode]["ID"], $arResult["PRICES_ALLOW"])):?>
								<div class="emarket-item-price">
									<div class="price-name"><?=$arResult["CAT_PRICES"][$priceCode]["TITLE"]?></div>
									<div class="emarket-current-price emarket-format-price" id="<? echo $arItemIDs['PRICE']; ?>"><? echo $arPrice['PRINT_DISCOUNT_VALUE']; ?><?
                                                                        if(isset($arParams['SHOW_UNIT_MEASUREMENT']) && $arParams['SHOW_UNIT_MEASUREMENT'] == "Y")
                                                                                echo "/".$arResult['CATALOG_MEASURE_NAME'];
                                                                            ?></div>
                                                                        <div class="clear"></div>
                                                                        <div class="emarket-old-price" id="<? echo $arItemIDs['OLD_PRICE']; ?>" style="display: <? echo ($boolDiscountShow ? '' : 'none'); ?>"><? echo ($boolDiscountShow ? $arPrice['PRINT_VALUE'] : ''); ?><?
                                                                        if(isset($arParams['SHOW_UNIT_MEASUREMENT']) && $arParams['SHOW_UNIT_MEASUREMENT'] == "Y")
                                                                                echo "/".$arResult['CATALOG_MEASURE_NAME'];
                                                                            ?></div>
									<div class="clear"></div>
								</div>
							<?endif;?>
						<?endforeach;?>
					<?}?>
				<?}else{?>
                                        <?
                                            $get_offer_id = false;
                                            if(isset($_REQUEST["offer_id"]) && isset($arResult["OFFERS"][$_REQUEST["offer_id"]])) {
                                                $get_offer_id = true;
                                                $arOffer = $arResult["OFFERS"][$_REQUEST["offer_id"]];
                                                unset($arResult["OFFERS"]);
                                                $arResult["OFFERS"][$_REQUEST["offer_id"]] = $arOffer;
                                                
                                                $arResult['MIN_PRICE']['PRINT_VALUE'] = $arOffer['PRICES']['BASE']['PRINT_VALUE'];
                                                $arResult['MIN_PRICE']['PRINT_DISCOUNT_VALUE'] = $arOffer['PRICES']['BASE']['PRINT_DISCOUNT_VALUE'];
                                            }
                                        ?>
                                        <div class="emarket-item-price">						
                                                <div class="emarket-current-price emarket-format-price" id="<? echo $arItemIDs['PRICE']; ?>"> <?if ($arParams["OFFERS_VIEW"] == "CHOISE") {?><?if(!$get_offer_id) echo GetMessage("PRICE_FROM") ?><?}?> <? echo $arResult['MIN_PRICE']['PRINT_DISCOUNT_VALUE']; ?></div>
                                                <div class="clear"></div>
                                                <div class="emarket-old-price" id="<? echo $arItemIDs['OLD_PRICE']; ?>" style="display: <? echo ($boolDiscountShow ? '' : 'none'); ?>"><? echo ($boolDiscountShow ? $arResult['MIN_PRICE']['PRINT_VALUE'] : ''); ?></div>
                                                <?if (count($arResult["OFFERS"]) == 1) {
                                                    reset($arResult["OFFERS"]);
                                                    $curOffer = current($arResult["OFFERS"]);
                                                ?>
                                                    <form class="basket_action">
                                                            <?if ('Y' == $arParams['USE_PRODUCT_QUANTITY']):?>
                                                                    <input type="button" id="quantity-button-minus-<?=$curOffer["ID"]?>" class="quantity-button-offer-minus sm-hide xs-hide" value="-">
                                                                    <input type="text" value="1" class="quantity-text quantity-<?=$curOffer["ID"]?> sm-hide xs-hide" name="quantity" id="quantity-offer-<?=$curOffer["ID"]?>">
                                                                    <input type="hidden" value="<?=$curOffer["ID"]?>" name="item">
                                                                    <input type="hidden" value="ADDTOCART" name="action">
                                                                    <input type="button" id="quantity-button-plus-<?=$curOffer["ID"]?>" class="quantity-button-offer-plus sm-hide xs-hide" value="+">
                                                            <?endif;?>
                                                            <input type="submit" class="color-icon-button color-icon-button-basket" value="<?=GetMessage('TO_BASKET')?>" name="ADDTOCART">
                                                            <input type="button" class="color-button color-button-blue small one-click-button sm-hide xs-hide" value="<?=GetMessage('ONE_CLICK_SALE')?>" name="ONECLICK" data-trade="<?=$arResult["ID"]?>" data-offer="<?=$curOffer["ID"]?>">
                                                    </form>
                                                <?}?>
						<div class="clear"></div>
					</div>
                                    <?if ($arParams["OFFERS_VIEW"] == "SELECT" && count($arResult["OFFERS"]) > 1 ) {?>
                                            <div class="select-offer-msg"><?=GetMessage('SELECT_OFFER')?></div>
                                            <div class="sku-select">
                                                <div class="sku-select-chosen" data-pid="<?=$chosenColor["ID"]?>">
                                                    <div class="sku-select-chosen-inner">
                                                        <?=GetMessage('CHOISE_OFFER')?>
                                                    </div>
                                                    <ul class="sku-select-items">
                                                        <?foreach($arResult["OFFERS"] as $offer):
                                                            if (is_array($offer["DETAIL_PICTURE"])){
                                                                $img = $offer["DETAIL_PICTURE"]["SRC"];
                                                            }
                                                            else{
                                                                $img = $arResult['DEFAULT_PICTURE']["SRC"];
                                                            }?>
                                                            <li class="sku-select-item" data-pid="<?=$offer['ID']?>">
                                                                <div class="emarket-offers-ico">
                                                                        <a href="<?=$img?>"><img src="<?=$img?>"></a>
                                                                </div>
                                                                <div class="emarket-offers-props">
                                                                    <span class="emarket-offer-props-name"><?=$offer["NAME"]?></span>(<span class="sku-prop-brackets">
                                                                        <?$propsStr = "";
                                                                            foreach($offer["PROPERTIES"] as $propCode => $arProp):?>
                                                                                <? if (array_key_exists($propCode, $arResult["OFFERS_PROP"])): 
                                                                                    $sPropId = $arResult["SKU_PROPS"][$propCode]["XML_MAP"][$arProp["VALUE"]];
                                                                                    if ($arProp["PROPERTY_TYPE"] == "E") {
                                                                                        $printValue = $arResult["SKU_PROPS"][$propCode]["VALUES"][$arProp["VALUE"]]["NAME"];
                                                                                    } else if ($arProp["PROPERTY_TYPE"] == "S") {
                                                                                        $printValue = $arResult["SKU_PROPS"][$propCode]["VALUES"][$sPropId]["NAME"];
                                                                                    } else {
                                                                                        $printValue = $arProp["VALUE"];
                                                                                    }
                                                                                    ?>
                                                                                        <?$propsStr .= $printValue.", "?>
                                                                                <? endif;?>
                                                                            <?endforeach;?>
                                                                    <?=rtrim($propsStr, ', ')?></span>)
                                                                </div>
                                                                <input type="hidden" class="emarket-offer-price" value="<?=$offer['MIN_PRICE']['PRINT_DISCOUNT_VALUE'];?>">
                                                            </li>
                                                        <?endforeach;?>
                                                    </ul>
                                                </div>
                                            </div>
                                        <div class="clear"></div>
                                        <div class="offer-buy-form">
                                            <form class="basket_action">
                                                <?if ('Y' == $arParams['USE_PRODUCT_QUANTITY']):?>
                                                    <input type="button" id="quantity-button-minus-<?=$offer["ID"]?>" class="quantity-button-offer-minus sm-hide xs-hide" value="-">
                                                    <input type="text" value="1" class="quantity-text sm-hide xs-hide" name="quantity" id="quantity-offer-<?=$offer["ID"]?>">
                                                    <input type="hidden" value="<?=$offer["ID"]?>" name="item">
                                                    <input type="hidden" value="ADDTOCART" name="action">
                                                    <input type="button" id="quantity-button-plus-<?=$offer["ID"]?>" class="quantity-button-offer-plus sm-hide xs-hide" value="+">
                                                <?endif;?>
                                                <input type="submit" class="color-icon-button color-icon-button-basket" value="<?=GetMessage('TO_BASKET')?>" name="ADDTOCART">
                                                <input type="button" class="color-button color-button-blue small one-click-button sm-hide xs-hide" value="<?=GetMessage('ONE_CLICK_SALE')?>" name="ONECLICK" data-trade="<?=$arResult["ID"]?>" data-offer="<?=$offer["ID"]?>">
                                            </form>
                                        </div>
                                        <?}?>
					<?if ($arParams["OFFERS_VIEW"] == "CHOISE" && count($arResult["OFFERS"]) != 1) {?>
                                            <div class="sku-choise-wrap">
                                                <?foreach ($arResult["SKU_PROPS_LIST"] as $code => $prop) {?>
                                                    <div class="sku-prop" data-prop-id="<?=$prop["ID"]?>" data-prop-code="<?=$prop["CODE"]?>" data-prop-name="<?=$prop["NAME"]?>" data-prop-type="<?=$prop["PROPERTY_TYPE"]?>">
                                                        <div class="sku-prop-name">
                                                            <?=GetMessage('TO_CHOISE')?> <?=  strtolower($prop["NAME"])?>:
                                                        </div>
                                                        <ul class="sku-prop-values-list">
                                                            <?foreach ($prop["VALUES"] as $valId => $propVal) {?>
                                                                <li class="sku-prop-value" data-prop-code="<?=$code?>" data-prop-type="<?=$prop["PROPERTY_TYPE"]?>" data-val-id="<?=$propVal["ID"]?>" data-val-code="<?=$propVal["XML_ID"]?>" data-val-name="<?=$propVal["NAME"]?>">
                                                                    <?if ($propVal["FILE"]) {?>
                                                                        <div class="prop-img-wrap">
                                                                            <img src="<?=$propVal["FILE"]?>">
                                                                        </div>
                                                                    <?} else {?>
                                                                        <?=$propVal["NAME"]?>
                                                                    <?}?>
                                                                </li>
                                                            <?}?>
                                                        </ul>
                                                    </div>
                                                <?}?>
                                                <div  class="offers-cnt"></div>
                                            </div>
                                            <div class="offer-buy-form" style="display: none; text-align: center;">
                                                <form class="basket_action">
                                                    <?if ('Y' == $arParams['USE_PRODUCT_QUANTITY']):?>
                                                        <input type="button" id="quantity-button-minus-<?=$offer["ID"]?>" class="quantity-button-offer-minus sm-hide xs-hide" value="-">
                                                        <input type="text" value="1" class="quantity-text sm-hide xs-hide" name="quantity" id="quantity-offer-<?=$offer["ID"]?>">
                                                        <input type="hidden" value="<?=$offer["ID"]?>" name="item">
                                                        <input type="hidden" value="ADDTOCART" name="action">
                                                        <input type="button" id="quantity-button-plus-<?=$offer["ID"]?>" class="quantity-button-offer-plus sm-hide xs-hide" value="+">
                                                    <?endif;?>
                                                    <input type="submit" class="color-icon-button color-icon-button-basket" value="<?=GetMessage('TO_BASKET')?>" name="ADDTOCART">
                                                    <input type="button" class="color-button color-button-blue small one-click-button sm-hide xs-hide" value="<?=GetMessage('ONE_CLICK_SALE')?>" name="ONECLICK" data-trade="<?=$arResult["ID"]?>" data-offer="<?=$offer["ID"]?>">
                                                </form>
                                            </div>
                                        <?}?>   
				<?}?>


				<div class="emarket-sale-buttons">
				<?if (count($arResult["OFFERS"])<=0){?>
					<form class="basket_action" id="cart_form_<?=$arResult["ID"]?>">

					<?if ($canBuy):?>

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
					<?endif;?>

					<?$saleText = $canBuy == true ? GetMessage('ONE_CLICK_SALE') : GetMessage("TO_ORDER")?>
					<input type="button" class="color-button color-button-blue small one-click-button" value="<?=$saleText?>" name="ONECLICK" data-trade="<?=$arResult["ID"]?>">
					</form>
				<?}else {?>
                                    <?if(!$get_offer_id):?>
                                        <?if ($arParams["OFFERS_VIEW"] == "CHOISE" && $arParams["HIDE_OFFERS_LIST"] != 'Y') {?>
                                            <a href="#detail" data-scroll="emarket-offers" class="text-link scroll-navigate"><?=GetMessage('CATALOG_OFFERS')?></a>
                                        <?} else if( $arParams["HIDE_OFFERS_LIST"] != 'Y') {?>
                                            <a href="#detail" data-scroll="emarket-offers" class="color-button color-button-blue small scroll-navigate"><?=GetMessage('CATALOG_OFFERS')?></a>
                                        <?}?>
                                    <?endif;?>
                                <?}?>
					<?if (count($arResult["OFFERS"])<=0):?>

						<?
						$addClass="";
						if (in_array($arResult["ID"], $eMarketBasketData["DELAY"])) $addClass=" active";
						?>

						<?if ($canBuy):?><a href="#" data-basketitem="<?=$arResult["ID"]?>" class="icon-transparent icon-delay-transparent<?=$addClass?>"><?=GetMessage('CT_BCE_CATALOG_DELAY')?></a><?endif;?>
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
                                <? $GLOBALS["APPLICATION"]->IncludeComponent("bitrix:main.share", "emarket-sonet-share", Array(
                                    "HIDE" => "N",
                                    "HANDLERS" => array(
                                            0 => "lj",
                                            1 => "twitter",
                                            2 => "vk",
                                            3 => "facebook",
                                            4 => "mailru",
                                    ),
                                    "PAGE_URL" => $arResult["DETAIL_PAGE_URL"],
                                    "PAGE_TITLE" => $arResult["NAME"],
                                    "SHORTEN_URL_LOGIN" => "",
                                    "SHORTEN_URL_KEY" => "",
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
            
            
    <?if ($arParams["ZOOM_ON"] == "Y") {?>
        jQuery(function(){

            $(".zoom-img").imagezoomsl({
              zoomrange: [2.12, 12],
              magnifiersize: [300, 300],
              scrollspeedanimate: 10,
              loopspeedanimate: 5,
              cursorshadeborder: "1px solid black",
              magnifiereffectanimate: "slideIn",	
              magnifierborder: "1px solid #eee",
              zindex: 1000,
            });

            $(document).on("click", ".tracker", function() {
                $('.zoom-img:visible').closest('a').trigger("click");
            })
        });   
    <?}?>
</script>