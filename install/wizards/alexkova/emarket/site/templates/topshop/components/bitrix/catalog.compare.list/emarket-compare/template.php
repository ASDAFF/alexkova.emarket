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
if (isset($_REQUEST['ajaxbuy']) && $_REQUEST['ajaxbuy'] == "yes"){$APPLICATION->RestartBuffer();}?>




<?
$this->setFrameMode(true);
$containerId = "body-counter";

$compareUrl = SITE_DIR.'ajax/compare.php';
?>

<?if (isset($_REQUEST['ajaxbuy']) && $_REQUEST['ajaxbuy'] == "yes"){?>
	<div id="compare-content-body" style="display:none">
	<?$containerId = "content-counter";?>
		<a href="javascript:void(0)" class="icon-transparent icon-compare-transparent compare-button-group sm-hide xs-hide" id="<?=$containerId?>" data-state="hide">
			<?=count($arResult["ITEMS"])?>
		</a>
	</div>
<?}else{?>
	<a href="javascript:void(0)" class="icon-transparent icon-compare-transparent compare-button-group sm-hide xs-hide" id="<?=$containerId?>" data-state="hide">
		<?=count($arResult["ITEMS"])?>
	</a>
		<div id="compare-body" data-group="basket-group">
			<span class="body-before"></span>
<?}?>

			<div class="compare-body-title">
				<?=GetMessage('COMPARE_TITLE')?>
				<?if (count($arResult["ITEMS"])>0):?>
					<div class="pull-right">
						<a href="<?=$arParams["COMPARE_URL"]?>" class="color-button small"><?=GetMessage('CT_BCE_CATALOG_COMPARE_TITLE')?></a>
					</div>
				<?endif;?>
			</div>
			<?if (count($arResult["ITEMS"])>0){?>
				<table width="100%">
					<tr>
						<th>&nbsp;</th>
						<th class="sm-hide xs-hide"><?=GetMessage('BASKET_TD_NAME')?></th>
						<th>&nbsp;</th>
					</tr>
					<?foreach($arResult["ITEMS"] as $arBasketItem):
						$img = $arResult["DATA"][$arBasketItem["ID"]]["DETAIL_PICTURE"]["SRC"];

						$img = (strlen($img)>0)
							? '<a href="'.$arBasketItem["DETAIL_PAGE_URL"].'"
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
							</td>
							<td class="basket-name sm-hide xs-hide"><a href="<?=$arBasketItem["DETAIL_PAGE_URL"]?>"><?=$arBasketItem["NAME"]?></a></td>
							<td class="basket-action">
								<input type="button" class="compare-delete-button icon-button-delete" value=" " data-compare="<?=$arBasketItem["ID"]?>">
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
					<?=GetMessage('COMPARE_EMPTY')?>
				</p>
			<?}?>
			<div class="icon-close"></div>

<?if (isset($_REQUEST['ajaxbuy']) && $_REQUEST['ajaxbuy'] == "yes"){die();}?>
</div>
<script>

	<?/*

	var eMarketCompare = {
		compareAjaxURL : '<?=$compareUrl?>',
		compareMessList : '<?=GetMessage('CT_BCE_CATALOG_COMPARE_LIST')?>',
		compareMess : '<?=GetMessage('CT_BCE_CATALOG_COMPARE')?>',
		compareIblockID : '<?=$arParams['IBLOCK_ID']?>',
		initCompareButtons : function(){
				$(document).on(
					'click',
					'.compare-button',
					function(){
						url = eMarketCompare.compareAjaxURL+'?action=ADD_TO_COMPARE_LIST&bid='+eMarketCompare.compareIblockID+'&id='+$(this).data('compare')+'&ajaxbuy=yes&rg='+Math.random();
						newMessage = eMarketCompare.compareMessList;
						console.log(url+' '+newMessage);

						$.ajax({
							url: url,
							success: function(data){

								$(this).removeClass("compare-button");
								$(this).addClass("compare-button-list");
								topshop.scrollMenuInit();
								$(this).html(newMessage);
								$('#compare-body').html(data);
								$('#body-counter').html($('#container-counter').html());
								eMarketCompare.initCompareButtons();

							}
						});
					}
				);

				$(document).on(
					'click',
					'.compare-delete-button',
					function(){
						url = eMarketCompare.compareAjaxURL+'?action=DELETE_FROM_COMPARE_LIST&bid='+eMarketCompare.compareIblockID+'&id='+$(this).data('compare')+'&ajaxbuy=yes&rg='+Math.random();
						newMessage = eMarketCompare.compareMessList;

						$.ajax({
							url: url,
							success: function(data){

								$(this).removeClass("compare-button");
								$(this).addClass("compare-button-list");

								$(this).html(newMessage);
								$('#compare-body').html(data);
								$('#body-counter').html($('#container-counter').html());

							}
						});
					}
				);

				$(document).on(
					'click',
					'.compare-button-list',
					function(){
						$('#basket-line div[data-group=basket-group]').slideUp(300);
						$('#compare-body').slideToggle();
					}
				);
			}
	};

*/?>

	$(document).ready(function(){
		eMarket.Compare.ajaxURL = '<?=$compareUrl?>';
		eMarket.Compare.messList = '<?=GetMessage('CT_BCE_CATALOG_COMPARE_LIST')?>';
		eMarket.Compare.mess = '<?=GetMessage('CT_BCE_CATALOG_COMPARE')?>';
		eMarket.Compare.iblockID = '<?=$arParams['IBLOCK_ID']?>';
	});

</script>