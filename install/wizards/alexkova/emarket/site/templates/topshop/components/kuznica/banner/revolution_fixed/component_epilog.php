<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.themepunch.plugins.min.js');?>
<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.themepunch.revolution.min.js');?>

<script>
	$(document).ready(function(){
		//eMarket.Slider.initRevApi = true;
		eMarket.Slider.init();
	});
</script>