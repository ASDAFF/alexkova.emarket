<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $templateData */
/** @var @global CMain $APPLICATION */
global $APPLICATION;
if (isset($templateData['TEMPLATE_THEME']))
{
	$APPLICATION->SetAdditionalCSS($templateData['TEMPLATE_THEME']);
}
?>


<script>
	$(document).ready(function(){
		eMarket.inBasketButtonName = '<?=GetMessage('IN_BASKET_BUTTON')?>';
		eMarket.toBasketButtonName = '<?=GetMessage('TO_BASKET')?>';
		eMarket.inBasketState = '<?=GetMessage('IN_BASKET')?>';
	});
</script>