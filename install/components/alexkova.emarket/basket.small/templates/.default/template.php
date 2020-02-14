<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
global $eMarketBasketData;
?>
<?if (isset($_REQUEST['ajaxbuy']) && $_REQUEST['ajaxbuy'] == "yes"){$APPLICATION->RestartBuffer();}?>

<?if (isset($_REQUEST['ajaxbuy']) && $_REQUEST['ajaxbuy'] == "yes"):?>
	<div id="content-body" style="display:none">
	<span id="basket-data"><?=json_encode($eMarketBasketData)?></span>
            
<?endif;?>           
<?
//    $title = ($arResult["PRODUCT_INFO"]["DELAY"]) ? 'Товар отложен!' : 'Товар добавлен в корзину!';
//    $content = iconv('windows-1251', "UTF-8", $arResult["PRODUCT_INFO"]["NAME"]);
//    $buttons = array(
//        array(
//            'title' => 'Продолжить покупки',
//            'name' => 'continue-buy',
//            'id' => 'continue-buy',
//            'action' => '[code]function(){alert(1);}[code]', // Кастомная кнопка
//        ),
//        array(
//            'title' => 'Оформить заказ',
//            'name' => 'make-order',
//            'id' => 'make-order',
//            'action' => '', // Кастомная кнопка
//        )
//    );
//    $url = Alexkova\Emarket\Sale\Basket::getModalWindow($title, $content, $buttons);
//    echo "<pre>";
//print_r($arResult);
//echo "</pre>";
?>           
         
<a href="#" class="icon-transparent icon-basket-transparent icon-basket">
	<?if (count($arResult["BASKET_ITEMS"]["CAN_BUY"]) >0 ){?>
		<span class="sm-hide xs-hide"><?=GetMessage('BASKET_PRODUCTS')?>: <?=count($arResult["BASKET_ITEMS"]["CAN_BUY"])?> (<span class="emarket-format-price"><?=$arResult["FORMAT_SUMM"]?></span>)</span>
		<span class="mobile-info-inline"><?=count($arResult["BASKET_ITEMS"]["CAN_BUY"])?> (<span class="emarket-format-price"><?=$arResult["FORMAT_SUMM"]?></span>)</span>
	<?}else{
		echo '<span class="sm-hide xs-hide">'.GetMessage("BASKET_EMPTY").'</span>';
		echo '<span class="mobile-info-inline">0</span>';
	}?>
</a>

<a href="#" class="icon-transparent icon-delay-transparent icon-delay">
	<?=count($arResult["BASKET_ITEMS"]["DELAY"])?>
</a>

<?if (isset($_REQUEST['ajaxbuy']) && $_REQUEST['ajaxbuy'] == "yes"){?>
		<div id="delay-body-content">
		<?}else{?>
			<div id="delay-body" data-group="basket-group" data-state="hide">
				<span class="body-before"></span>
<?}?>

	<div class="delay-body-title">
		<?=GetMessage('DELAY_TITLE')?>
		<div class="pull-right">
			<a href="<?=$arParams["PATH_TO_BASKET"]?>" class="color-button small"><?=GetMessage('SHOW_BASKET')?></a>

		</div>

	</div>

	<?if (count($arResult["BASKET_ITEMS"]["DELAY"])>0){?>
		<table width="100%">
			<tr>
				<th>&nbsp;</th>
				<th class="sm-hide xs-hide"><?=GetMessage('BASKET_TD_NAME')?></th>
				<th><?=GetMessage('BASKET_TD_PRICE')?></th>
				<th>&nbsp;</th>
			</tr>
			<?foreach($arResult["BASKET_ITEMS"]["DELAY"] as $arBasketItem):
				$img = $arBasketItem["PICTURE"];
				$img = (strlen($img)>0)
				? '<a href="'.$arBasketItem["URL"].'"
													   style="background: url('.$img.') no-repeat center center;
													   background-size: 100%;
													   "></a>'
																									   : "&nbsp;";
																									   ?>
				<tr>
					<td class="basket-image">
						&nbsp;<?=$img?>
						<?if ($img){?>
						<?}else{?>
						<?}?>
					</td><?
                                            $showMeasurement = false;
                                            if(isset($arParams['SHOW_UNIT_MEASUREMENT']) && $arParams['SHOW_UNIT_MEASUREMENT'] == "Y")
                                                $showMeasurement = true;
                                        ?>
					<td class="basket-name sm-hide xs-hide"><a href="<?=$arBasketItem["URL"]?>"><?=$arBasketItem["NAME"]?></a></td>
					<td class="basket-price  <?if($showMeasurement) echo "basket-price-min-width";?> emarket-format-price"><?=$arBasketItem["FORMAT_PRICE"]?><?
                                            if($showMeasurement)
                                                echo "/".$arBasketItem['MEASURE_NAME'];?>
                                        </td>
					<td class="basket-action">
						<input type="button" id="button-tocart-<?=$arBasketItem["ID"]?>" class="icon-button-cart" value=" " data-item="<?=$arBasketItem["ID"]?>">
						<input type="button" id="button-delete-<?=$arBasketItem["ID"]?>" class="icon-button-delete" value=" " data-item="<?=$arBasketItem["ID"]?>">
					</td>
				</tr>
			<?endforeach;?>
			<tr class="last">
				<td colspan="6">
					&nbsp;
				</td>
			</tr>
		</table>
	<?}else{?>
		<p class="helper-info">
			<?=GetMessage('BASKET_DELAY_EMPTY')?>
		</p>
	<?}?>
				<div class="icon-close"></div>
</div>
                    
<?if (isset($_REQUEST['ajaxbuy']) && $_REQUEST['ajaxbuy'] == "yes"){?>
                    <?
            $ID_PICTYRE = (
                    is_array($arResult["PRODUCT_INFO"]["DETAIL_PARENT"]) 
                    && 
                    $arResult["PRODUCT_INFO"]["DETAIL_PARENT"]["DETAIL_PICTURE"] != ""
                    ) 
                    ? $arResult["PRODUCT_INFO"]["DETAIL_PARENT"]["DETAIL_PICTURE"]
                    : $arResult["PRODUCT_INFO"]["DETAIL_PICTURE"];
//            $ID_PICTYRE = 45879; 
            $URL = CFile::GetPath($ID_PICTYRE);
            ?>
            <div id="basket-popup">

                        <div id="basket-popup-product-image">
                            <img src="<?=$URL?>" alt="<?=$arResult["PRODUCT_INFO"]["NAME"]?>" width="150px"/>
                        </div>
                        <div id="basket-popup-product-name" class="basket-popup-name">
                            <?=$arResult["PRODUCT_INFO"]["NAME"]?>
                        </div>
                        <div id="basket-popup-buttons">

                            <input class="basket-popup-btn color-button color-button-blue" type="button" id="continue-buy" value="<?=GetMessage('BASKET_ADD_CONTINUE')?>" onclick="eMarket.basketPopup.close()">
							<a class="basket-popup-btn color-button" href="<?=$arParams["PATH_TO_BASKET"]?>"><?=GetMessage('BASKET_TO_ORDER')?></a>
                        </div>
                    </div>   
	</div>
<?}
else
{?>
	<div id="basket-body" data-group="basket-group" data-state="hide">
		<span class="body-before"></span>
<?}?>


	<?if (count($arResult["BASKET_ITEMS"]["CAN_BUY"])>0){?>

		<div class="basket-body-title">
			<?=GetMessage('BASKET_TITLE')?>
			<div class="pull-right">
				<span class="xs-hide sm-hide"><?=GetMessage('BASKET_PRODUCTS')?>:
				<b><?=count($arResult["BASKET_ITEMS"]["CAN_BUY"])?></b>
				<?=GetMessage('BASKET_SUM')?>
				<b><span class="emarket-format-price"><?=$arResult["FORMAT_SUMM"]?></span></b></span>
				<a href="<?=$arParams["PATH_TO_BASKET"]?>" class="color-button small xs-hide sm-hide"><?=GetMessage('BASKET_TO_ORDER')?></a>

			</div>

		</div>

		<table width="100%">
			<tr>
				<th>&nbsp;</th>
				<th class="xs-hide"><?=GetMessage('BASKET_TD_NAME')?></th>
				<th><?=GetMessage('BASKET_TD_PRICE')?></th>
				<th class="xs-hide"><?=GetMessage('BASKET_TD_QTY')?></th>
				<th class="xs-hide sm-hide"><?=GetMessage('BASKET_TD_SUM')?></th>
				<th>&nbsp;</th>
			</tr>
			<?foreach($arResult["BASKET_ITEMS"]["CAN_BUY"] as $arBasketItem):

				$img = $arBasketItem["PICTURE"];
				$img = (strlen($img)>0)
					? '<a href="'.$arBasketItem["URL"].'"
						style="background: url('.$img.') no-repeat center center;
						background-size: 100%;
						"></a>'
					: "&nbsp;";
				?>
				<tr>
					<td class="basket-image">
						&nbsp;<?=$img?>
						<?if ($img){?>
						<?}else{?>
						<?}?>
					</td><?
                                            $showMeasurement = false;
                                            if(isset($arParams['SHOW_UNIT_MEASUREMENT']) && $arParams['SHOW_UNIT_MEASUREMENT'] == "Y")
                                                $showMeasurement = true;
                                        ?>
					<td class="basket-name xs-hide"><a href="<?=$arBasketItem["URL"]?>"><?=$arBasketItem["NAME"]?></a></td>
					<td class="basket-price <?if($showMeasurement) echo "basket-price-min-width";?> emarket-format-price"><?=$arBasketItem["FORMAT_PRICE"]?><?
                                            if($showMeasurement)
                                                echo "/".$arBasketItem['MEASURE_NAME'];?></td>
					<td class="basket-line-qty xs-hide sm-hide">
							<input type="button" id="quantity-button-minus-<?=$arBasketItem["ID"]?>" class="basket-line-quantity quantity-button-minus" value="-" data-item="<?=$arBasketItem["ID"]?>">
							<input type="text" value="<?=round($arBasketItem["QUANTITY"])?>" class="quantity-text" name="quantity" id="quantity-<?=$arBasketItem["ID"]?>" data-item="<?=$arBasketItem["ID"]?>">
							<input type="button" id="quantity-button-plus-<?=$arBasketItem["ID"]?>" class="basket-line-quantity quantity-button-plus" value="+" data-item="<?=$arBasketItem["ID"]?>">
					</td>
					<td class="basket-summ emarket-format-price xs-hide sm-hide"><?=$arBasketItem["FORMAT_SUMM"]?></td>
					<td class="basket-action">
						<input type="button" id="button-delay-<?=$arBasketItem["ID"]?>" class="icon-button-delay" value=" " data-item="<?=$arBasketItem["ID"]?>">
						<input type="button" id="button-delete-<?=$arBasketItem["ID"]?>" class="icon-button-delete" value=" " data-item="<?=$arBasketItem["ID"]?>">
					</td>
				</tr>
			<?endforeach;?>
			<tr class="last">
				<td colspan="6">
					&nbsp;
				</td>
			</tr>
		</table>

		<div class="basket-body-title">

			<div class="pull-right">
				<span class="xs-hide"><?=GetMessage('BASKET_ALL_SUM')?>:
				<b><span class="emarket-format-price"><?=$arResult["FORMAT_SUMM"]?></span></b></span>
				<a href="<?=$arParams["PATH_TO_BASKET"]?>" class="color-button small"><?=GetMessage('BASKET_TO_ORDER')?></a>

			</div>
			<div class="clear"></div>
		</div>
	<?}else{?>
		<p class="helper-info">
			<?=GetMessage('BASKET_DROP_EMPTY')?>
		</p>
	<?}?>
		<div class="icon-close"></div>



<?if (isset($_REQUEST['ajaxbuy']) && $_REQUEST['ajaxbuy'] == "yes")die();
else{?>
	</div>
<?}?>         
<script>
	$(document).ready(function(){
                <? $_REQUEST['ttt']="sdf";?>
		window.eMarket.Basket.ajaxUrl = '<?=SITE_DIR?>ajax/basket_action.php';
		BX.message({
			setItemDelay2BasketTitle: '<?=GetMessage('BASKET_DELAY_OK_TITLE')?>',
			setItemAdded2BasketTitle: '<?=GetMessage('BASKET_ADD_OK_TITLE')?>'
		});
		window.eMarket.Basket.refreshData();

	});
</script>