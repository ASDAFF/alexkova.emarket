<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
$this->createFrame()->begin('...');
$arSkuAmount = array();
if ($arResult["IS_SKU"]){
	foreach($arResult["SKU"] as $skuAmount){
		if ($skuAmount["NUM_AMOUNT"]>0){
			$arSkuAmount[$skuAmount["ID"]] += $skuAmount["NUM_AMOUNT"];
		}
	}
}

foreach($arResult["STORES"] as $pid => &$arProperty){
	if ($arProperty["NUM_AMOUNT"] > 0 || $arSkuAmount[$arProperty["ID"]] >0 ){
		$arProperty["AMOUNT"] = GetMessage('S_AMOUNT_TEXT');
	}
	else
		$arProperty["AMOUNT"] = GetMessage('S_AMOUNT_ORDER_TEXT');
}
?>

<?if(strlen($arResult["ERROR_MESSAGE"])>0)
	ShowError($arResult["ERROR_MESSAGE"]);
?>

<?if(!empty($arResult["STORES"])):?>
	<table width="100%" class="emarket-store-table">
		<?foreach($arResult["STORES"] as $pid => &$arProperty):?>
			<tr>
				<td class="emarket-store-content">
					<a href="<?=$arProperty["URL"]?>"><?=$arProperty["TITLE"]?></a>
					<?if(isset($arProperty["PHONE"])):?>
						<br /><span class="tel"><?=GetMessage('S_PHONE')?><?=$arProperty["PHONE"]?></span>
					<?endif;?>
					<?if(isset($arProperty["SCHEDULE"])):?>
						<br /><span class="schedule"><?=GetMessage('S_SCHEDULE')?><?=$arProperty["SCHEDULE"]?></span>
					<?endif;?>
				</td>
				<td class="emarket-store-push">
					&nbsp;
				</td>
				<td class="emarket-store-count">
					<?=$arProperty["AMOUNT"]?>
				</td>
			</tr>
		<?endforeach?>
	</table>
<?endif;?>