<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$this->setFrameMode(true);
$cols = intval($arParams["COLS"])?:1;
if(!function_exists('footerPrintMenuCol'))
{
	function footerPrintMenuCol($items, $options)
	{
		$maxLevel = intval($options["MAX_LEVEL"]);
		$addUlClass = $options["UL_CLASS"];
		?>
		<ul <?if($addUlClass) echo "class='{$addUlClass}'"?>>
			<?
			foreach($items as $item):
				if($maxLevel == 1 && $item["DEPTH_LEVEL"] > 1)
					continue;
				?>
				<?if($item["SELECTED"]):?>
				<li><a href="<?=$item["LINK"]?>" class="selected"><?=$item["TEXT"]?></a></li>
			<?else:?>
				<li><a href="<?=$item["LINK"]?>"><?=$item["TEXT"]?></a></li>
			<?endif?>

			<?endforeach?>

		</ul>
	<?}
}
?>
<?if (!empty($arResult)):
	if($cols > 1):
		$arrChunked = array_chunk($arResult, ceil(count($arResult) / 2));
		foreach ($arrChunked as $key=>$items):?>
			<div class="span_1_of_5 xs-span_5_of_5 sm-span_1_of_3 footer-col">
				<?if($key == 0):?>
					<h2 class="footer-h2"><?=$arParams["TITLE"]?></h2>
				<?endif?>
				<?
				$addUlClass = '';
				if($key == 0)
					$addUlClass = 'first';
				footerPrintMenuCol($items, array('MAX_LEVEL'=>$arParams["MAX_LEVEL"], "UL_CLASS"=>$addUlClass));?>
			</div>
		<?endforeach?>
	<?else:?>
		<div class="span_1_of_5 xs-span_5_of_5 sm-span_1_of_3 footer-col">
			<h2 class="footer-h2"><?=$arParams["TITLE"]?></h2>
			<?footerPrintMenuCol($arResult, array('MAX_LEVEL'=>$arParams["MAX_LEVEL"],"UL_CLASS"=>'first'));?>
		</div>
	<?endif;?>
<?endif?>