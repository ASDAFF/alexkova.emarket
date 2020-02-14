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

CJSCore::Init(array("fx"));

//if (file_exists($_SERVER["DOCUMENT_ROOT"].$this->GetFolder().'/themes/'.$arParams["TEMPLATE_THEME"].'/colors.css'))
//	$APPLICATION->SetAdditionalCSS($this->GetFolder().'/themes/'.$arParams["TEMPLATE_THEME"].'/colors.css');
?>
<div class="bx_filter_vertical bx_<?=$arParams["TEMPLATE_THEME"]?>">
	<div class="bx_filter_section m4">
		<form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get" class="smartfilter">
			<?foreach($arResult["HIDDEN"] as $arItem):?>
			<input type="hidden" name="<?echo $arItem["CONTROL_NAME"]?>" id="<?echo $arItem["CONTROL_ID"]?>" value="<?echo $arItem["HTML_VALUE"]?>" />
			<?endforeach;

			include_once "include/icons.php";

			$index = 0;
			$iconPropCodes = \Alexkova\Emarket\Data::getIconPropCodes();
			foreach($arResult["ITEMS"] as $key=>$arItem):
				if(in_array($arItem["CODE"],$iconPropCodes))
					continue;// include/icons.php

				if($arItem["PROPERTY_TYPE"] == "N" ):
					if (!$arItem["VALUES"]["MIN"]["VALUE"] || !$arItem["VALUES"]["MAX"]["VALUE"] || $arItem["VALUES"]["MIN"]["VALUE"] == $arItem["VALUES"]["MAX"]["VALUE"])
						continue;
					?>
					<div class="bx_filter_container price">
						<span class="bx_filter_container_title"><span class="bx_filter_container_modef"></span><?=$arItem["NAME"]?></span>
						<div class="bx_filter_param_area">
							<div class="bx_filter_param_area_block"><div class="bx_input_container">
								<input
									class="min-price"
									type="text"
									name="<?echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>"
									id="<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>"
									value="<?echo $arItem["VALUES"]["MIN"]["HTML_VALUE"]?>"
									size="5"
									onkeyup="smartFilter.keyup(this)"
								/>
								</div></div>
							<div class="bx_filter_param_area_block"><div class="bx_input_container">
								<input
									class="max-price"
									type="text"
									name="<?echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>"
									id="<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>"
									value="<?echo $arItem["VALUES"]["MAX"]["HTML_VALUE"]?>"
									size="5"
									onkeyup="smartFilter.keyup(this)"
								/>
							</div></div>
							<div style="clear: both;"></div>
						</div>
						<div class="bx_ui_slider_track" id="drag_track_<?=$key?>">
							<div class="bx_ui_slider_range" style="left: 0; right: 0%;"  id="drag_tracker_<?=$key?>"></div>
							<a class="bx_ui_slider_handle left"  href="javascript:void(0)" style="left:0;" id="left_slider_<?=$key?>"></a>
							<a class="bx_ui_slider_handle right" href="javascript:void(0)" style="right:0%;" id="right_slider_<?=$key?>"></a>
						</div>
						<div class="bx_filter_param_area">
							<div class="bx_filter_param_area_block" id="curMinPrice_<?=$key?>"><?=$arItem["VALUES"]["MIN"]["VALUE"]?></div>
							<div class="bx_filter_param_area_block" id="curMaxPrice_<?=$key?>"><?=$arItem["VALUES"]["MAX"]["VALUE"]?></div>
							<div style="clear: both;"></div>
						</div>
					</div>
					<div class="filter-separator"></div>

					<script type="text/javascript">
						var DoubleTrackBar<?=$key?> = new cDoubleTrackBar('drag_track_<?=$key?>', 'drag_tracker_<?=$key?>', 'left_slider_<?=$key?>', 'right_slider_<?=$key?>', {
							OnUpdate: function(){
								BX("<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>").value = this.MinPos;
								BX("<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>").value = this.MaxPos;
							},
							Min: parseFloat(<?=$arItem["VALUES"]["MIN"]["VALUE"]?>),
							Max: parseFloat(<?=$arItem["VALUES"]["MAX"]["VALUE"]?>),
							MinInputId : BX('<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>'),
							MaxInputId : BX('<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>'),
							FingerOffset: 10,
							MinSpace: 0.01,
							RoundTo: 0.01,
							Precision: 6
						});
					</script>
				<?elseif(!empty($arItem["VALUES"]) && !isset($arItem["PRICE"])):?>
				<div class="bx_filter_container <?=$arItem["CHECKED"] == "Y"?'active':''?>">
					<span class="bx_filter_container_title" onclick="hideFilterProps(this)"><span class="bx_filter_container_modef"></span><?=$arItem["NAME"]?></span>
					<div class="bx_filter_block">
						<?foreach($arItem["VALUES"] as $val => $ar):?>
						<span class="<?echo $ar["DISABLED"] ? 'disabled': ''?>">
							<input
								type="checkbox"
								value="<?echo $ar["HTML_VALUE"]?>"
								name="<?echo $ar["CONTROL_NAME"]?>"
								id="<?echo $ar["CONTROL_ID"]?>"
								<?echo $ar["CHECKED"]? 'checked="checked"': ''?>
								onclick="smartFilter.click(this)"
							/>
							<label for="<?echo $ar["CONTROL_ID"]?>"><?echo $ar["VALUE"];?></label>
						</span>
						<?endforeach;?>
					</div>
				</div>
				<div class="filter-separator"></div>
				<?endif;
				$index++;
			endforeach;?>
			<div style="clear: both;"></div>
			<?include_once "include/price.php";?>

			<div class="bx_filter_control_section">
				<input class="input-inline" type="submit" id="del_filter" name="del_filter" value="<?=GetMessage("CT_BCSF_DEL_FILTER")?>" />
				<input class="color-button small" type="submit" id="set_filter" name="set_filter" value="<?=GetMessage("CT_BCSF_SET_FILTER")?>" />

				<div class="bx_filter_popup_result right" id="modef" <?if(!isset($arResult["ELEMENT_COUNT"])) echo 'style="display:none"';?> style="display: inline-block;">
					<?echo GetMessage("CT_BCSF_FILTER_COUNT", array("#ELEMENT_COUNT#" => '<span id="modef_num">'.intval($arResult["ELEMENT_COUNT"]).'</span>'));?>
					<span class="arrow"></span>
					<br/><a class="color-button small" href="<?echo $arResult["FILTER_URL"]?>"><?echo GetMessage("CT_BCSF_FILTER_SHOW")?></a>
				</div>
			</div>
		</form>
		<div style="clear: both;"></div>
	</div>
</div>
<script>
	var smartFilter = new JCSmartFilter('<?echo CUtil::JSEscape($arResult["FORM_ACTION"])?>');
</script>