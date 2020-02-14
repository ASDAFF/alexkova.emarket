<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $templateData */
/** @var @global CMain $APPLICATION */
global $MESS;
include_once(GetLangFileName(dirname(__FILE__).'/lang/', '/template.php'));

global $APPLICATION;
global $moreSettings;

if ($arParams["ZOOM_ON"] == "Y") 
    $APPLICATION->AddHeadScript($templateFolder."/js/zoomsl-3.0.js");

$h1Value = isset($arResult["IPROPERTY_VALUES"]["ELEMENT_PAGE_TITLE"]) && '' != $arResult["IPROPERTY_VALUES"]["ELEMENT_PAGE_TITLE"]
	? $arResult["IPROPERTY_VALUES"]["ELEMENT_PAGE_TITLE"]
	: $arResult["NAME"];

$APPLICATION->SetPageProperty('h1', $h1Value);?>
<div class="container">
    <?
        $showFiles = false;
        if(isset($arParams["DETAIL_DISPLAY_SHOW_FILES"]) && $arParams["DETAIL_DISPLAY_SHOW_FILES"]=="Y" && isset($arResult["PROPERTIES"]["FILES"])
                && is_array($arResult["PROPERTIES"]["FILES"]["VALUE"]) && !empty($arResult["PROPERTIES"]["FILES"]["VALUE"])) {
            $showFiles = true;
        }
    ?>

<?$tmpActive = true;?>
	<div class="span_5_of_5" id="detail">
	<ul class="emarket-tabs sm-hide xs-hide">

		<?if (count($arResult["OFFERS"])>0 && $arParams["HIDE_OFFERS_LIST"] != 'Y'):?>
			<li id="emarket-offers" class="active"><span><?=GetMessage('CATALOG_OFFERS')?></span></li>
			<?$tmpActive = false;?>
		<?endif;?>

		<li id="emarket-description" class="<?=($tmpActive)?'active':''?>"><span><?=GetMessage('CATALOG_DESCRIPTION')?></span></li>
		<li id="emarket-props"><span><?=GetMessage('CATALOG_PROPS')?></span></li>

		<?if ('Y' == $arParams['USE_COMMENTS']):?>
			<li id="emarket-comments"><span><?=GetMessage('CT_BCE_CATALOG_BTN_MESSAGE_USE_COMMENTS')?></span></li>
		<?endif;?>

		<?if ($moreSettings["USE_STORE_FLAG"]):?>
			<li id="emarket-stores"><span><?=GetMessage('CT_BCE_CATALOG_BTN_MESSAGE_USE_STORE')?></span></li>
		<?endif;?>
                        
                <?if($showFiles):?>
                        <li id="emarket-files"><span><?=GetMessage('CT_BCE_CATALOG_BTN_MESSAGE_USE_FILES')?></span></li>
                <?endif;?>  
	</ul>
	<div class="clear"></div>

	<div class="emarket-detail-area">

		<?$tmpActive = true;?>
		<?if (count($arResult["OFFERS"])>0 && $arParams["HIDE_OFFERS_LIST"] != 'Y'):?>
			<div class="emarket-detail-area-container"  style="display: block;" id="emarket-offers-tab">
				<h3 class="lg-hide md-hide"><?=GetMessage('CATALOG_OFFERS')?></h3>
                                <? if ($arParams["HIDE_OFFERS_LIST"] != 'Y') {?>
				<table width="100%" class="emarket-offers-list" cell-spacing="2">
					<?foreach($arResult["OFFERS"] as $offer):
						if (is_array($offer["DETAIL_PICTURE"])){
							$img = $offer["DETAIL_PICTURE"]["SRC"];
						}
						else{
							$img = $arResult['DEFAULT_PICTURE']["SRC"];
						}
						?>
                                                <tr class="sku-row" data-sku-id="<?=$offer["ID"]?>">
							<td class="emarket-offers-ico">
								<a href="<?=$img?>"><img src="<?=$img?>"></a>
							</td>

							<td class="emarket-offers-props">
								<?=$offer["NAME"]?><br />
								<?if ($arResult["SHOW_OFFERS_PROPERTY"]):?>
									<?foreach($offer["DISPLAY_PROPERTIES"] as $arProp):?>
										<b><?=$arProp["NAME"]?></b>: <?=$arProp["VALUE"]?><br />
									<?endforeach;?>
								<?endif;?>
							</td>

							<td class="emarket-offers-price">

								<div class="emarket-offer-price emarket-format-price" id="price_<? echo $offer['ID']; ?>"><? echo $offer['MIN_PRICE']['PRINT_DISCOUNT_VALUE']; ?><?
                                                                    if(isset($arParams['SHOW_UNIT_MEASUREMENT']) && $arParams['SHOW_UNIT_MEASUREMENT'] == "Y")
                                                                        echo "/".$offer['CATALOG_MEASURE_NAME'];
                                                                    ?></div>
								<div class="emarket-offer-old-price" id="oldprice_<? echo $offer['ID']; ?>" style="display: <? echo ($boolDiscountShow ? '' : 'none'); ?>"><? echo ($boolDiscountShow ? $offer['MIN_PRICE']['PRINT_VALUE'] : ''); ?></div>
								<br />

								<form class="basket_action lg-hide md-hide sm-hide">
									<?if ('Y' == $arParams['USE_PRODUCT_QUANTITY']):?>
										<input type="hidden" value="<?=$offer["ID"]?>" name="item">
										<input type="hidden" value="ADDTOCART" name="action">
									<?endif;?>
									<input type="submit" class="color-icon-button color-icon-button-basket" value="<?=GetMessage('TO_BASKET')?>" name="ADDTOCART">
								</form>

							</td>

							<td class="emarket-offers-sale xs-hide">
								<form class="basket_action">
									<?if ('Y' == $arParams['USE_PRODUCT_QUANTITY']):?>
										<input type="button" id="quantity-button-minus-<?=$offer["ID"]?>" class="quantity-button-minus sm-hide xs-hide" value="-">
										<input type="text" value="1" class="quantity-text quantity-<?=$offer["ID"]?> sm-hide xs-hide" name="quantity" id="quantity-<?=$offer["ID"]?>">
										<input type="hidden" value="<?=$offer["ID"]?>" name="item">
										<input type="hidden" value="ADDTOCART" name="action">
										<input type="button" id="quantity-button-plus-<?=$offer["ID"]?>" class="quantity-button-plus sm-hide xs-hide" value="+">
									<?endif;?>
									<input type="submit" class="color-icon-button color-icon-button-basket" value="<?=GetMessage('TO_BASKET')?>" name="ADDTOCART">
									<input type="button" class="color-button color-button-blue small one-click-button sm-hide xs-hide" value="<?=GetMessage('ONE_CLICK_SALE')?>" name="ONECLICK" data-trade="<?=$arResult["ID"]?>" data-offer="<?=$offer["ID"]?>">
								</form>
                                                            </td>
                                                            
						</tr>
					<?endforeach;?>
				</table>
                                <?}?>
                                <div class="clear"></div>
			</div>
			<?$tmpActive = false;?>
		<?endif;?>


		<div class="emarket-detail-area-container"  style="<?=($tmpActive)?'display:block':''?>" id="emarket-description-tab">
			<h3 class="lg-hide md-hide"><?=GetMessage('CATALOG_DESCRIPTION')?></h3>

			<?
			if ('' != $arResult['DETAIL_TEXT'])
			{
				if ('html' == $arResult['DETAIL_TEXT_TYPE'])
				{
					echo $arResult['DETAIL_TEXT'];
				}
				else
				{
					?><p><? echo $arResult['DETAIL_TEXT']; ?></p><?
				}
			}		?>
		</div>

		<?if (count($arResult["DISPLAY_PROPERTIES"])>0):?>
			<div class="emarket-detail-area-container"   id="emarket-props-tab">
				<h3 class="lg-hide md-hide"><?=GetMessage('CATALOG_PROPS')?></h3>

				<table width="100%" class="emarket-props-table">
					<?foreach($arResult["DISPLAY_PROPERTIES"] as $key => $arProperty):?>
						<?if (!is_array($arProperty["DISPLAY_VALUE"]) && $arProperty["DISPLAY_VALUE"]){?>
							<tr>
								<td class="emarket-props-name"><span><?=$arProperty["NAME"]?></span></td>
								<td class="emarket-props-data"><?=$arProperty["DISPLAY_VALUE"]?><?//=($key != "MANUFACTURER") ? '1 '.$arProperty["VALUE"] : $arProperty["DISPLAY_VALUE"]?></td>
							</tr>
						<?}else{?>
						<?}?>
					<?endforeach;?>
					<?foreach($arResult["DISPLAY_PROPERTIES"] as $arProperty):?>
						<?if (is_array($arProperty["DISPLAY_VALUE"]) && count($arProperty["DISPLAY_VALUE"]>0)){?>
                                                        <?
                                                        $withDesc = false;
                                                        foreach($arProperty["DESCRIPTION"] as $cell=>$val){
                                                            if ($val) {
                                                                $withDesc = true;
                                                                break;
                                                            }
                                                        }?>
                                                        <?if ($withDesc) {?>
                                                            <tr>
                                                                    <td colspan="2" class="emarket-props-data emarket-props-data-group">
                                                                            <b><?=$arProperty["NAME"]?></b></td>
                                                            </tr>
                                                            <?foreach($arProperty["DISPLAY_VALUE"] as $cell=>$val){?>
                                                                    <tr>
                                                                            <td class="emarket-props-name"><span><?=$arProperty["DESCRIPTION"][$cell]?></span></td>
                                                                            <td class="emarket-props-data"><?=$val?></td>
                                                                    </tr>
                                                            <?}?>
                                                        <?} else {?>
                                                            <tr>
								<td class="emarket-props-name"><span><?=$arProperty["NAME"]?></span></td>
                                                                <td class="emarket-props-data"><?=  implode(', ', $arProperty["DISPLAY_VALUE"])?></td>
                                                            </tr>
                                                        <?}?>
						<?}else{?>
						<?}?>
					<?endforeach;?>
				</table>
			</div>
		<?endif;?>

		<?if ($moreSettings["USE_STORE_FLAG"]):?>
			<div class="emarket-detail-area-container"  id="emarket-stores-tab">
				<h3 class="lg-hide md-hide"><?=GetMessage('CT_BCE_CATALOG_BTN_MESSAGE_USE_STORE')?></h3>
				<?$APPLICATION->IncludeComponent("bitrix:catalog.store.amount", ".default", array(
						"PER_PAGE" => "10",
						"USE_STORE_PHONE" => "Y",
						"SCHEDULE" => $arParams["STORE_DETAIL"]["USE_STORE_SCHEDULE"],
						"USE_MIN_AMOUNT" => $arParams["STORE_DETAIL"]["USE_MIN_AMOUNT"],
						"MIN_AMOUNT" => $arParams["STORE_DETAIL"]["MIN_AMOUNT"],
						"ELEMENT_ID" => $arResult["ID"],
						"STORE_PATH"  =>  "/company/store/#store_id#/",
						"MAIN_TITLE"  =>  $arParams["STORE_DETAIL"]["MAIN_TITLE"],
						"CACHE_TYPE" => $arParams["CACHE_TYPE"],
						"CACHE_TIME" => $arParams["CACHE_TIME"],
					),
					false,
					array("HIDE_ICONS" => "Y")
				);?>
			</div>
		<?endif;?>
            
                <?if ($showFiles):?>
			<div class="emarket-detail-area-container"  id="emarket-files-tab">
			    <h3 class="lg-hide md-hide"><?=GetMessage('CT_BCE_CATALOG_BTN_MESSAGE_USE_FILES')?></h3>
                            <?foreach ($arResult["PROPERTIES"]["FILES"]["VALUE"] as $val):
                                $rsFile = CFile::GetByID($val);
                                $arFile = $rsFile->Fetch();
                                $arFile["PATH"] = CFile::GetPath($val);

                                $resolution = "";
                                $resolution = explode(".", $arFile["FILE_NAME"]);

                                if(isset($resolution[1]))
                                    $resolution = $resolution[1];
                                 ?>
                                <div class="element-file-card <?=$resolution;?>"><a download href="<?=$arFile["PATH"]?>"><span></span><br><br><p><?=$arFile["ORIGINAL_NAME"]?><p></a></div>
                            <?endforeach;?>
                            <div class="clear"></div>
			</div>
		<?endif;?>

		<?if ($arParams["USE_COMMENTS"] == "Y"):?>
			<div class="emarket-detail-area-container"  id="emarket-comments-tab">
				<h3 class="lg-hide md-hide"><?=GetMessage('CT_BCE_CATALOG_BTN_MESSAGE_USE_COMMENTS')?></h3>

				<?$APPLICATION->IncludeComponent("bitrix:catalog.comments",
					"emarket_comments", Array(
						"ELEMENT_ID" => $arResult["ID"],	
						"ELEMENT_CODE" => "",	
						"IBLOCK_ID" => $arParams["IBLOCK_ID"],
						"URL_TO_COMMENT" => "",
						"WIDTH" => "",	
						"COMMENTS_COUNT" => "10",	
						"BLOG_USE" => $arParams["BLOG_USE"],	
						"FB_USE" => $arParams["FB_USE"],	
						"FB_APP_ID" => $arParams["FB_APP_ID"],
						"VK_USE" => $arParams["VK_USE"],	
						"VK_API_ID" => $arParams["VK_API_ID"],
						"CACHE_TYPE" => $arParams["CACHE_TYPE"],	
						"CACHE_TIME" => $arParams["CACHE_TIME"],	
						"BLOG_TITLE" => "",
						"BLOG_URL" => "catalog_comments"."_".SITE_ID,
						"PATH_TO_SMILE" => "",
						"EMAIL_NOTIFY" => $arParams["BLOG_EMAIL_NOTIFY"],
						"AJAX_POST" => "Y",
						"SHOW_SPAM" => "Y",
						"SHOW_RATING" => "N",
						"FB_TITLE" => "",
						"FB_USER_ADMIN_ID" => "",
						"FB_COLORSCHEME" => "light",
						"FB_ORDER_BY" => "reverse_time",
						"VK_TITLE" => "",
						"TEMPLATE_THEME" => $arParams["~TEMPLATE_THEME"],	
					),
					false,
					array("HIDE_ICONS" => "Y")
				);?>
			</div>
		<?endif;?>



	</div>
	</div>
	<div class="clear"></div>

<?

if (isset($arResult["PROPERTIES"]["ACCESSORIES"]) && !empty($arResult["PROPERTIES"]["ACCESSORIES"]["VALUE"])>0) {

	global $arrLocalFilter;
	$arrLocalFilter = array("ID"=>$arResult["ACCESSORIES"]);

	?>
	<h2 id="accessories"><?=GetMessage('ACCESSORIES_TITLE')?></h2>
	<?

	$intSectionID = $APPLICATION->IncludeComponent(
		"bitrix:catalog.section",
		"",
		array(
			"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],
			"ELEMENT_SORT_FIELD" => "SORT",
			"ELEMENT_SORT_ORDER" => "ASC",
			"ELEMENT_SORT_FIELD2" => "NAME",
			"ELEMENT_SORT_ORDER2" => "ASC",
			"INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
			"BASKET_URL" => $arParams["BASKET_URL"],
			"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
			"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
			"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
			"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
			"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
			"FILTER_NAME" => "arrLocalFilter",
			"CACHE_TYPE" => $arParams["CACHE_TYPE"],
			"CACHE_TIME" => $arParams["CACHE_TIME"],
			"CACHE_FILTER" => $arParams["CACHE_FILTER"],
			"CACHE_GROUPS" => "N",
			"SET_TITLE" => "N",
			"SET_STATUS_404" => $arParams["SET_STATUS_404"],
			"PRICE_CODE" => $arParams["PRICE_CODE"],
			"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
			"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
			"SHOW_ALL_WO_SECTION" => "Y"
		,
			"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
			"USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
			"ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
			"PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
			"PRODUCT_PROPERTIES" => $arParams["PRODUCT_PROPERTIES"],

			"DISPLAY_TOP_PAGER" => "N",
			"DISPLAY_BOTTOM_PAGER" => "N",
			"PAGER_TITLE" => $arParams["PAGER_TITLE"],
			"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
			"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
			"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
			"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
			"PAGER_SHOW_ALL" => "N",

			"OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
			"OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
			"OFFERS_PROPERTY_CODE" => $arParams["LIST_OFFERS_PROPERTY_CODE"],
			"OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
			"OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
			"OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
			"OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
			"OFFERS_LIMIT" => $arParams["LIST_OFFERS_LIMIT"],

			"SECTION_ID" => "",
			"SECTION_CODE" => "",
			"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
			"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
			'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
			'CURRENCY_ID' => $arParams['CURRENCY_ID'],
			'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],


			'LABEL_PROP' => $arParams['LABEL_PROP'],
			'ADD_PICT_PROP' => $arParams['ADD_PICT_PROP'],
			'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],

			'OFFER_ADD_PICT_PROP' => $arParams['OFFER_ADD_PICT_PROP'],
			'OFFER_TREE_PROPS' => $arParams['OFFER_TREE_PROPS'],
			'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
			'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
			'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
			'MESS_BTN_BUY' => $arParams['MESS_BTN_BUY'],
			'MESS_BTN_ADD_TO_BASKET' => $arParams['MESS_BTN_ADD_TO_BASKET'],
			'MESS_BTN_SUBSCRIBE' => $arParams['MESS_BTN_SUBSCRIBE'],
			'MESS_BTN_DETAIL' => $arParams['MESS_BTN_DETAIL'],
			'MESS_NOT_AVAILABLE' => $arParams['MESS_NOT_AVAILABLE'],

			'TEMPLATE_THEME' => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
			"ADD_SECTIONS_CHAIN" => "N",
			"COMPARE_SCROLL_UP" => "Y",
                        "SHOW_UNIT_MEASUREMENT" => $arParams["SHOW_UNIT_MEASUREMENT"]
		),
		false,
		array("HIDE_ICONS"=>"Y")
	);
}


?>
</div>


<?if (isset($templateData['JS_OBJ']))
{
?>
<script type="text/javascript">
BX.ready(
	BX.defer(function(){
		if (!!window.<? echo $templateData['JS_OBJ']; ?>)
		{
			window.<? echo $templateData['JS_OBJ']; ?>.allowViewedCount(true);
		}
	})
);

$(document).ready(function(){
	eMarket.inBasketButtonName = '<?=GetMessage('IN_BASKET_BUTTON')?>';
	eMarket.toBasketButtonName = '<?=GetMessage('TO_BASKET')?>';
	eMarket.inBasketState = '<?=GetMessage('IN_BASKET')?>';
});

</script>
<?
}

$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.jcarousel.min.js');
$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/fancybox/jquery.fancybox.pack.js');
$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/js/fancybox/jquery.fancybox.css');

Bitrix\Catalog\CatalogViewedProductTable::refresh($arResult['ID'], CSaleBasket::GetBasketUserID());
$GLOBALS["CURRENT_ELEMENT_ID"] = $arResult["ID"];
?>