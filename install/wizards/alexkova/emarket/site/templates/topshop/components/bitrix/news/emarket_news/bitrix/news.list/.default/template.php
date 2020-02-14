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
$this->setFrameMode(true);
?>
<div class="news-list">

<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

	$colTextClass = NULL;
	if($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["THUMB_PICTURE"])){
		$colTextClass = "span_3_of_4 sm-span_4_of_4 xs-span_4_of_4";
	}
	?>
	<div class="news-item span_5_of_5" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["THUMB_PICTURE"])):?>
			<div class="span_1_of_4 sm-span_4_of_4 xs-span_4_of_4">
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="news-i-link">
					<div class="picture-wrapper">
						<img
							border="0"
							src="<?=$arItem["THUMB_PICTURE"]["SRC"]?>"
							alt="<?=$arItem["THUMB_PICTURE"]["ALT"]?>"
							title="<?=$arItem["THUMB_PICTURE"]["TITLE"]?>"
							/>
					</div>
				</a>
			</div>
		<?endif?>

		<div class="<?=$colTextClass?>">
			<div style="margin-bottom: 30px;">
				<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
					<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
						<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" class="news-head"><?echo $arItem["NAME"]?></a><br />
					<?else:?>
						<?echo $arItem["NAME"]?><br />
					<?endif;?>
				<?endif;?>
				<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
					<div class="pr-text"><?echo $arItem["PREVIEW_TEXT"];?></div>
				<?endif;?>
			</div>
			<div class="bottom-info">
				<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"] && (in_array("ACTIVE_FROM",$arParams["FIELD_CODE"]) || in_array("DATE_ACTIVE_FROM",$arParams["FIELD_CODE"]))):?>
					<span class="news-date-time"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span>
				<?endif?>
				<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_TO"]):?>
					<span class="news-date-time"><?echo $arItem["DISPLAY_ACTIVE_TO"]?></span>
				<?endif?>
				<?if($arParams["CATEGORY_SHOW_LIST"]!="N" && $arItem["SECTION"]["SECTION_PAGE_URL"]):?>
					<span class="category"><?=getMessage("CATEGORY_LABEL")?>: <a href="<?=$arItem["SECTION"]["SECTION_PAGE_URL"]?>"><?=$arItem["SECTION"]["NAME"]?></a></span>
				<?endif?>
			</div>
		</div>
	</div>
	<div style="clear: both;"></div>
	<div class="item-line"></div>
<?endforeach;?>

<div style="clear: both;"></div>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
</div>