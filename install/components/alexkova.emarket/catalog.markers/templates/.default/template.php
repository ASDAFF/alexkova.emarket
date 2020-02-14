<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$this->setFrameMode(true);

if (count($arResult["MARKERS_LIST"]) <= 0) return;
?>

<div class="top-sale">
<div id="mark_panel" class="container">
<div class="menu-top-sale span_5_of_5">

	<?$firstMarker = false?>

	<?foreach($arResult["MARKERS_LIST"] as $cell):

		?>
		<?switch ($cell){
			case "ACTION":?>
				<div class="top-sale-button top-action-button xs-hide sm-hide" id="top-action-button" data-slide="SPECIALOFFER" data-type="markers"><a href="javascript:void(0)"><?=GetMessage('SPECIALOFFER_BUTTON')?></a></div>
				<?
				if (!$firstMarker) $firstMarker = "SPECIALOFFER";
				break;
			case "NEW":?>
				<div class="top-sale-button top-new-button xs-hide sm-hide" id="top-new-button" data-slide="NEWPRODUCT" data-type="markers"><a href="javascript:void(0)"><?=GetMessage('NEWPRODUCT_BUTTON')?></a></div>
			<?
				if (!$firstMarker) $firstMarker = "NEWPRODUCT";
				break;
			case "RECCOMEND":?>
				<div class="top-sale-button top-rec-button xs-hide sm-hide" id="top-rec-button" data-slide="RECOMMENDED" data-type="markers"><a href="javascript:void(0)"><?=GetMessage('RECOMMENDED_BUTTON')?></a></div>
			<?
				if (!$firstMarker) $firstMarker = "RECOMMENDED";
				break;
			case "HIT":?>
				<div class="top-sale-button top-hit-button xs-hide sm-hide" id="top-hit-button" data-slide="SALELEADER" data-type="markers"><a href="javascript:void(0)"><?=GetMessage('SALELEADER_BUTTON')?></a></div>
			<?
				if (!$firstMarker) $firstMarker = "SALELEADER";
				break;
			default ;
		}?>
	<?endforeach;?>
</div>
<div class="clear"></div>

	<?foreach($arResult["MARKERS_LIST"] as $cell):
		?>
		<?switch ($cell){
		case "ACTION":?>
			<div class="menu-top-sale span_5_of_5 lg-hide md-hide"><div class="top-sale-button top-action-button xs-span_5_of_5 sm-span_5_of_5" id="top-action-button-mobile" data-slide="SPECIALOFFER" data-type="markers"><a href="javascript:void(0)"><?=GetMessage('SPECIALOFFER_BUTTON')?></a></div></div>
			<div class="top-slider sale-carousel top-action-button" id="cSPECIALOFFER"></div>
			<?
			if (!$firstMarker) $firstMarker = "SPECIALOFFER";
			break;
		case "NEW":?>
			<div class="menu-top-sale span_5_of_5 lg-hide md-hide"><div class="top-sale-button top-new-button xs-span_5_of_5 sm-span_5_of_5" id="top-new-button-mobile" data-slide="NEWPRODUCT" data-type="markers"><a href="javascript:void(0)"><?=GetMessage('NEWPRODUCT_BUTTON')?></a></div></div>
			<div class="top-slider sale-carousel " id="cNEWPRODUCT"></div>
			<?
			if (!$firstMarker) $firstMarker = "NEWPRODUCT";
			break;
		case "RECCOMEND":?>
			<div class="menu-top-sale span_5_of_5 lg-hide md-hide"><div class="top-sale-button top-rec-button xs-span_5_of_5 sm-span_5_of_5" id="top-rec-button-mobile" data-slide="RECOMMENDED" data-type="markers"><a href="javascript:void(0)"><?=GetMessage('RECOMMENDED_BUTTON')?></a></div></div>
			<div class="top-slider sale-carousel top-rec-button" id="cRECOMMENDED"></div>
			<?
			if (!$firstMarker) $firstMarker = "RECOMMENDED";
			break;
		case "HIT":?>
			<div class="menu-top-sale span_5_of_5 lg-hide md-hide"><div class="top-sale-button top-hit-button xs-span_5_of_5 sm-span_5_of_5" id="top-hit-button-mobile" data-slide="SALELEADER" data-type="markers"><a href="javascript:void(0)"><?=GetMessage('SALELEADER_BUTTON')?></a></div></div>
			<div class="top-slider sale-carousel top-hit-button" id="cSALELEADER"></div>
			<?
			if (!$firstMarker) $firstMarker = "SALELEADER";
			break;
	}?>
	<?endforeach;?>








</div></div>
<script>
	$(document).ready(function(){
		eMarket.MarkCarousel.ajaxUrl = '<?=SITE_DIR?>ajax/bestsellers/markers.php';
		eMarket.jCarousel.startMarks = true;
		<?if ($firstMarker):?>
			eMarket.jCarousel.startMarksName = "<?=$firstMarker?>";
		<?else:?>
			eMarket.jCarousel.startMarksName = "SPECIALOFFER";
		<?endif?>

	});
</script>