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
<div class="news-detail span_5_of_5">
	<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
		<h3 class="detail-head"><?=$arResult["NAME"]?></h3>
	<?endif;?>
	<div class="top-info">
		<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"] && (in_array("ACTIVE_FROM",$arParams["FIELD_CODE"]) || in_array("DATE_ACTIVE_FROM",$arParams["FIELD_CODE"])) ):?>
			<span class="news-date-time"><?echo $arResult["DISPLAY_ACTIVE_FROM"]?></span>
		<?endif?>
		<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_TO"]):?>
			<span class="news-date-time"><?echo $arResult["DISPLAY_ACTIVE_TO"]?></span>
		<?endif?>
		<?if($arParams["CATEGORY_SHOW_LIST"]!="N" && $arResult["SECTION"]["SECTION_PAGE_URL"]):?>
			<span class="category"><?=getMessage("CATEGORY_LABEL")?>: <a href="<?=$arResult["SECTION"]["SECTION_PAGE_URL"]?>"><?=$arResult["SECTION"]["NAME"]?></a></span>
		<?endif?>
	</div>
	<div class="detail-content">
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["PICTURE"])):?>
			<img
				class="detail-picture"
				border="0"
				src="<?=$arResult["PICTURE"]["SRC"]?>"
				width="<?=$arResult["PICTURE"]["WIDTH"]?>"
				height="<?=$arResult["PICTURE"]["HEIGHT"]?>"
				alt="<?=$arResult["PICTURE"]["ALT"]?>"
				title="<?=$arResult["PICTURE"]["TITLE"]?>"
				style="float: left; max-width:100%; height: auto"
				/>
		<?endif?>
		<?if(strlen($arResult["DETAIL_TEXT"])>0):?>
			<?echo $arResult["DETAIL_TEXT"];?>
		<?else:?>
			<?echo $arResult["PREVIEW_TEXT"];?>
		<?endif?>
		<div style="clear:both"></div>
		<br />
	</div>
</div>