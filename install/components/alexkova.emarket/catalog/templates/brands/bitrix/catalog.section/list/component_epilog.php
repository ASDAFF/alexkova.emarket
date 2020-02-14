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

		$(document).on(
			'click',
			'.sale-cart-list-detail-button > a',
			function(){
				id = $(this).data('item');
				if ($(this).data('state') == 'show'){
					$(this).data('state', 'none');
					$('.sale-cart-list-detail[data-item='+id+']').css('height', '120px');
					$(this).html('<?=GetMessage('CATALOG_DETAIL')?>');
				}else{
					$(this).data('state', 'show');
					$('.sale-cart-list-detail[data-item='+id+']').css('height', 'auto');
					$(this).html('<?=GetMessage('CATALOG_DETAIL_UP')?>');
				}

			}
		);
	});
</script>