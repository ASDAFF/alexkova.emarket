<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var CBitrixComponentTemplate $this */
/** @var array $arParams */
/** @var array $arResult */
/** @global CDatabase $DB */

$frame = $this->createFrame()->begin("");

$templateData = array(
	'TEMPLATE_THEME' => $this->GetFolder() . '/themes/' . $arParams['TEMPLATE_THEME'] . '/style.css',
	'TEMPLATE_CLASS' => 'bx_' . $arParams['TEMPLATE_THEME']
);

$injectId = 'bigdata_recommeded_products_' . rand();

?>

	<script type="application/javascript">
		BX.cookie_prefix = '<?=CUtil::JSEscape(COption::GetOptionString("main", "cookie_name", "BITRIX_SM"))?>';
		BX.cookie_domain = '<?=$APPLICATION->GetCookieDomain()?>';
		BX.current_server_time = '<?=time()?>';

		function bx_rcm_recommndation_event_attaching(rcm_items_cont) {

			var detailLinks = BX.findChildren(rcm_items_cont, {'className': 'bx_rcm_view_link'}, true);

			if (detailLinks) {
				for (i in detailLinks) {
					BX.bind(detailLinks[i], 'click', function (e) {
						window.JCCatalogBigdataProducts.prototype.RememberRecommendation(
							BX(this),
							BX(this).getAttribute('data-product-id')
						);
					});
				}
			}
		}

		BX.ready(function () {
			bx_rcm_recommndation_event_attaching(BX('<?=$injectId?>_items'));
		});

	</script>

<?

if (isset($arResult['REQUEST_ITEMS']))
{
	CJSCore::Init(array('ajax'));

	// component parameters
	$signer = new \Bitrix\Main\Security\Sign\Signer;
	$signedParameters = $signer->sign(
		base64_encode(serialize($arResult['_ORIGINAL_PARAMS'])),
		'bx.bd.products.recommendation'
	);
	$signedTemplate = $signer->sign($arResult['RCM_TEMPLATE'], 'bx.bd.products.recommendation');

	?>

	<span id="<?= $injectId ?>" class="bigdata_recommended_products_container"></span>

	<script type="application/javascript">

		BX.ready(function () {

			var params = <?=CUtil::PhpToJSObject($arResult['RCM_PARAMS'])?>;
			var url = 'https://analytics.bitrix.info/crecoms/v1_0/recoms.php';
			var data = BX.ajax.prepareData(params);

			if (data) {
				url += (url.indexOf('?') !== -1 ? "&" : "?") + data;
				data = '';
			}

			var onready = function (response) {
				if (!response.items) {
					response.items = [];
				}
				BX.ajax({
					url: '/bitrix/components/bitrix/catalog.bigdata.products/ajax.php?' + BX.ajax.prepareData({
						'AJAX_ITEMS': response.items,
						'RID': response.id
					}),
					method: 'POST',
					data: {
						'parameters': '<?=CUtil::JSEscape($signedParameters)?>',
						'template': '<?=CUtil::JSEscape($signedTemplate)?>',
						'rcm': 'yes'
					},
					dataType: 'html',
					processData: false,
					start: true,
					onsuccess: function (html) {
						var ob = BX.processHTML(html);

						// inject
						BX('<?=$injectId?>').innerHTML = ob.HTML;
						BX.ajax.processScripts(ob.SCRIPT);
					}
				});
			};

			BX.ajax({
				'method': 'GET',
				'dataType': 'json',
				'url': url,
				'timeout': 3,
				'onsuccess': onready,
				'onfailure': onready
			});
//			onready({
//				id: "ba87f0e63d1e60efb4ba32b49b94850bc191b0cc",
//				items: ["58","111","106","135","137"]
//			});
		});
	</script>

	<?
	$frame->end();
	return;
}

if (!empty($arResult['ITEMS']))
{
	?>
	<script type="text/javascript">
		BX.message({
			CBD_MESS_BTN_BUY: '<? echo ('' != $arParams['MESS_BTN_BUY'] ? CUtil::JSEscape($arParams['MESS_BTN_BUY']) : GetMessageJS('CVP_TPL_MESS_BTN_BUY')); ?>',
			CBD_MESS_BTN_ADD_TO_BASKET: '<? echo ('' != $arParams['MESS_BTN_ADD_TO_BASKET'] ? CUtil::JSEscape($arParams['MESS_BTN_ADD_TO_BASKET']) : GetMessageJS('CVP_TPL_MESS_BTN_ADD_TO_BASKET')); ?>',

			CBD_MESS_BTN_DETAIL: '<? echo ('' != $arParams['MESS_BTN_DETAIL'] ? CUtil::JSEscape($arParams['MESS_BTN_DETAIL']) : GetMessageJS('CVP_TPL_MESS_BTN_DETAIL')); ?>',

			CBD_MESS_NOT_AVAILABLE: '<? echo ('' != $arParams['MESS_BTN_DETAIL'] ? CUtil::JSEscape($arParams['MESS_BTN_DETAIL']) : GetMessageJS('CVP_TPL_MESS_BTN_DETAIL')); ?>',
			CBD_BTN_MESSAGE_BASKET_REDIRECT: '<? echo GetMessageJS('CVP_CATALOG_BTN_MESSAGE_BASKET_REDIRECT'); ?>',
			BASKET_URL: '<? echo $arParams["BASKET_URL"]; ?>',
			CBD_ADD_TO_BASKET_OK: '<? echo GetMessageJS('CVP_ADD_TO_BASKET_OK'); ?>',
			CBD_TITLE_ERROR: '<? echo GetMessageJS('CVP_CATALOG_TITLE_ERROR') ?>',
			CBD_TITLE_BASKET_PROPS: '<? echo GetMessageJS('CVP_CATALOG_TITLE_BASKET_PROPS') ?>',
			CBD_TITLE_SUCCESSFUL: '<? echo GetMessageJS('CVP_ADD_TO_BASKET_OK'); ?>',
			CBD_BASKET_UNKNOWN_ERROR: '<? echo GetMessageJS('CVP_CATALOG_BASKET_UNKNOWN_ERROR') ?>',
			CBD_BTN_MESSAGE_SEND_PROPS: '<? echo GetMessageJS('CVP_CATALOG_BTN_MESSAGE_SEND_PROPS'); ?>',
			CBD_BTN_MESSAGE_CLOSE: '<? echo GetMessageJS('CVP_CATALOG_BTN_MESSAGE_CLOSE') ?>'
		});
	</script>
	<span id="<?= $injectId ?>_items" class="bigdata_recommended_products_items">
	<input type="hidden" name="bigdata_recommendation_id" value="<?= htmlspecialcharsbx($arResult['RID']) ?>">
		<?

		$arSkuTemplate = array();
		if (is_array($arResult['SKU_PROPS']))
		{
			foreach ($arResult['SKU_PROPS'] as $iblockId => $skuProps)
			{
				$arSkuTemplate[$iblockId] = array();
				foreach ($skuProps as &$arProp)
				{
					ob_start();
					if ('TEXT' == $arProp['SHOW_MODE'])
					{
						if (5 < $arProp['VALUES_COUNT'])
						{
							$strClass = 'bx_item_detail_size full';
							$strWidth = ($arProp['VALUES_COUNT'] * 20) . '%';
							$strOneWidth = (100 / $arProp['VALUES_COUNT']) . '%';
							$strSlideStyle = '';
						} else
						{
							$strClass = 'bx_item_detail_size';
							$strWidth = '100%';
							$strOneWidth = '20%';
							$strSlideStyle = 'display: none;';
						}
						?>
					<div class="<? echo $strClass; ?>" id="#ITEM#_prop_<? echo $arProp['ID']; ?>_cont">
						<span class="bx_item_section_name_gray"><? echo htmlspecialcharsex($arProp['NAME']); ?></span>

						<div class="bx_size_scroller_container">
							<div class="bx_size">
								<ul id="#ITEM#_prop_<? echo $arProp['ID']; ?>_list"
									style="width: <? echo $strWidth; ?>;"><?
									foreach ($arProp['VALUES'] as $arOneValue)
									{
										?>
									<li
										data-treevalue="<? echo $arProp['ID'] . '_' . $arOneValue['ID']; ?>"
										data-onevalue="<? echo $arOneValue['ID']; ?>"
										style="width: <? echo $strOneWidth; ?>;"
										><i></i><span
											class="cnt"><? echo htmlspecialcharsex($arOneValue['NAME']); ?></span>
										</li><?
									}
									?></ul>
							</div>
							<div class="bx_slide_left" id="#ITEM#_prop_<? echo $arProp['ID']; ?>_left"
								 data-treevalue="<? echo $arProp['ID']; ?>" style="<? echo $strSlideStyle; ?>"></div>
							<div class="bx_slide_right" id="#ITEM#_prop_<? echo $arProp['ID']; ?>_right"
								 data-treevalue="<? echo $arProp['ID']; ?>" style="<? echo $strSlideStyle; ?>"></div>
						</div>
						</div><?
					} elseif ('PICT' == $arProp['SHOW_MODE'])
					{
						if (5 < $arProp['VALUES_COUNT'])
						{
							$strClass = 'bx_item_detail_scu full';
							$strWidth = ($arProp['VALUES_COUNT'] * 20) . '%';
							$strOneWidth = (100 / $arProp['VALUES_COUNT']) . '%';
							$strSlideStyle = '';
						} else
						{
							$strClass = 'bx_item_detail_scu';
							$strWidth = '100%';
							$strOneWidth = '20%';
							$strSlideStyle = 'display: none;';
						}
						?>
					<div class="<? echo $strClass; ?>" id="#ITEM#_prop_<? echo $arProp['ID']; ?>_cont">
						<span class="bx_item_section_name_gray"><? echo htmlspecialcharsex($arProp['NAME']); ?></span>

						<div class="bx_scu_scroller_container">
							<div class="bx_scu">
								<ul id="#ITEM#_prop_<? echo $arProp['ID']; ?>_list"
									style="width: <? echo $strWidth; ?>;"><?
									foreach ($arProp['VALUES'] as $arOneValue)
									{
										?>
									<li
										data-treevalue="<? echo $arProp['ID'] . '_' . $arOneValue['ID'] ?>"
										data-onevalue="<? echo $arOneValue['ID']; ?>"
										style="width: <? echo $strOneWidth; ?>; padding-top: <? echo $strOneWidth; ?>;"
										><i title="<? echo htmlspecialcharsbx($arOneValue['NAME']); ?>"></i>
							<span class="cnt"><span class="cnt_item"
													style="background-image:url('<? echo $arOneValue['PICT']['SRC']; ?>');"
													title="<? echo htmlspecialcharsbx($arOneValue['NAME']); ?>"
									></span></span></li><?
									}
									?></ul>
							</div>
							<div class="bx_slide_left" id="#ITEM#_prop_<? echo $arProp['ID']; ?>_left"
								 data-treevalue="<? echo $arProp['ID']; ?>" style="<? echo $strSlideStyle; ?>"></div>
							<div class="bx_slide_right" id="#ITEM#_prop_<? echo $arProp['ID']; ?>_right"
								 data-treevalue="<? echo $arProp['ID']; ?>" style="<? echo $strSlideStyle; ?>"></div>
						</div>
						</div><?
					}
					$arSkuTemplate[$iblockId][$arProp['CODE']] = ob_get_contents();
					ob_end_clean();
					unset($arProp);
				}
			}
		}

		?>
		<div
			class="bx_item_list_you_looked_horizontal col<? echo $arParams['LINE_ELEMENT_COUNT']; ?> <? echo $templateData['TEMPLATE_CLASS']; ?>">
			<h2><?=($arParams["BLOCK_TITLE"] ? $arParams["BLOCK_TITLE"] : GetMessage('CVP_TPL_MESS_RCM'));?></h2>
			<div class="bx_item_list_section">
				<div class="bx_item_list_slide active">
					<?
					foreach ($arResult['ITEMS'] as $key => $arItem)
					{
						$strMainID = $this->GetEditAreaId($arItem['ID'] . $key);

						$arItemIDs = array(
							'ID' => $strMainID,
							'PICT' => $strMainID . '_pict',
							'SECOND_PICT' => $strMainID . '_secondpict',
							'MAIN_PROPS' => $strMainID . '_main_props',

							'QUANTITY' => $strMainID . '_quantity',
							'QUANTITY_DOWN' => $strMainID . '_quant_down',
							'QUANTITY_UP' => $strMainID . '_quant_up',
							'QUANTITY_MEASURE' => $strMainID . '_quant_measure',
							'BUY_LINK' => $strMainID . '_buy_link',
							'BASKET_ACTIONS' => $strMainID . '_basket_actions',
							'NOT_AVAILABLE_MESS' => $strMainID . '_not_avail',
							'SUBSCRIBE_LINK' => $strMainID . '_subscribe',

							'PRICE' => $strMainID . '_price',
							'DSC_PERC' => $strMainID . '_dsc_perc',
							'SECOND_DSC_PERC' => $strMainID . '_second_dsc_perc',

							'PROP_DIV' => $strMainID . '_sku_tree',
							'PROP' => $strMainID . '_prop_',
							'DISPLAY_PROP_DIV' => $strMainID . '_sku_prop',
							'BASKET_PROP_DIV' => $strMainID . '_basket_prop',
							'BASKET_FORM' => $strMainID. '_basket_form'
						);

						$strObName = 'ob' . preg_replace("/[^a-zA-Z0-9_]/", "x", $strMainID);

						$strTitle = (
						isset($arItem["IPROPERTY_VALUES"]["ELEMENT_PREVIEW_PICTURE_FILE_TITLE"]) && '' != isset($arItem["IPROPERTY_VALUES"]["ELEMENT_PREVIEW_PICTURE_FILE_TITLE"])
							? $arItem["IPROPERTY_VALUES"]["ELEMENT_PREVIEW_PICTURE_FILE_TITLE"]
							: $arItem['NAME']
						);
						$showImgClass = $arParams['SHOW_IMAGE'] != "Y" ? "no-imgs" : "";

						$img = SITE_TEMPLATE_PATH.'/images/no-image.png';
						if(CModule::IncludeModule('alexkova.emarket'))
						{
							if (is_array($arItem["PREVIEW_PICTURE"]))
								$img = \Alexkova\Emarket\Catalog\Image::getResizeImage($arItem["PREVIEW_PICTURE"]["ID"]);
							elseif (is_array($arItem["DETAIL_PICTURE"]))
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

						<div class="span_1_of_4 sm-span_1_of_3 xs-span_2_of_4 sale-cart" id="<?=$arItemIDs["ID"]?>">
							<div id="cart_<?=$arItem["ID"]?>">



								<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
									<div class="sale-cart-image" id="<?=$arItemIDs["PICT"]?>">
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
									<div class="sale-cart-price emarket-format-price" id="<?=$arItemIDs["PRICE"]?>">
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
											<form class="basket_action" id="<?=$arItemIDs["BASKET_FORM"]?>">
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
													<input id="<?=$arItemIDs["BUY_LINK"]?>" type="submit" class="color-icon-button color-icon-button-basket" value="<?=$buttonMSG?>" name="basketadd">
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
											<a id="<?=$arItemIDs["BUY_LINK"]?>"  href="<?=$arItem["DETAIL_PAGE_URL"]?>#detail" data-scroll="emarket-offers" class="color-button color-button-blue small scroll-navigate"><?=GetMessage('CATALOG_OFFERS')?></a>
										<?}?>



										<div class="clear"></div>
									</div>
								</div>
							</div>
						</div>
						<?

								$arJSParams = array(
//									'PRODUCT_TYPE' => $arItem['CATALOG_TYPE'],
									'PRODUCT_TYPE' => 1,
									'SHOW_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
									'SHOW_ADD_BASKET_BTN' => false,
									'SHOW_BUY_BTN' => true,
									'SHOW_ABSENT' => true,
									'PRODUCT' => array(
										'ID' => $arItem['ID'],
										'NAME' => $arItem['~NAME'],
										'PICT' => ('Y' == $arItem['SECOND_PICT'] ? $arItem['PREVIEW_PICTURE_SECOND'] : $arItem['PREVIEW_PICTURE']),
										'CAN_BUY' => $arItem["CAN_BUY"],
										'SUBSCRIPTION' => ('Y' == $arItem['CATALOG_SUBSCRIPTION']),
										'CHECK_QUANTITY' => $arItem['CHECK_QUANTITY'],
										'MAX_QUANTITY' => $arItem['CATALOG_QUANTITY'],
										'STEP_QUANTITY' => $arItem['CATALOG_MEASURE_RATIO'],
										'QUANTITY_FLOAT' => is_double($arItem['CATALOG_MEASURE_RATIO']),
										'ADD_URL' => $arItem['~ADD_URL'],
										'SUBSCRIBE_URL' => $arItem['~SUBSCRIBE_URL']
									),
									'BASKET' => array(
										'ADD_PROPS' => ('Y' == $arParams['ADD_PROPERTIES_TO_BASKET']),
										'QUANTITY' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
										'PROPS' => $arParams['PRODUCT_PROPS_VARIABLE'],
										'EMPTY_PROPS' => $emptyProductProperties
									),
									'VISUAL' => array(
										'ID' => $arItemIDs['ID'],
										'PICT_ID' => $arItemIDs['PICT'],
										'QUANTITY_ID' => $arItemIDs['QUANTITY'],
										'QUANTITY_UP_ID' => $arItemIDs['QUANTITY_UP'],
										'QUANTITY_DOWN_ID' => $arItemIDs['QUANTITY_DOWN'],
										'PRICE_ID' => $arItemIDs['PRICE'],
										'BUY_ID' => $arItemIDs['BUY_LINK'],
										'BASKET_PROP_DIV' => $arItemIDs['BASKET_PROP_DIV'],
										'BASKET_FORM' => $arItemIDs['BASKET_FORM'],
									),
									'LAST_ELEMENT' => $arItem['LAST_ELEMENT'],
									'HAS_OFFERS' => isset($arItem["OFFERS"]) && !empty($arItem["OFFERS"])?'Y':''
								);
								?>
									<script type="text/javascript">
										var <? echo $strObName; ?> =
										new JCCatalogBigdataProducts(<? echo CUtil::PhpToJSObject($arJSParams, false, true); ?>);
									</script>

					<?
					}//endforeach
					?>
					<div style="clear: both;"></div>

				</div>
			</div>
		</div>
	</span>
<?
}

$frame->end(); ?>