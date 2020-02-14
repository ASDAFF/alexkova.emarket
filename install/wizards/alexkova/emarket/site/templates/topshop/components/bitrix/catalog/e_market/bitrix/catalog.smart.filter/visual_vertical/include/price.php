<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
foreach ($arResult["ITEMS"] as $key => $arItem):
	$key = md5($key);
	if (isset($arItem["PRICE"])):
		if (!$arItem["VALUES"]["MIN"]["VALUE"] || !$arItem["VALUES"]["MAX"]["VALUE"] || $arItem["VALUES"]["MIN"]["VALUE"] == $arItem["VALUES"]["MAX"]["VALUE"])
			continue;
		?>
		<div class="bx_filter_container price">
			<span class="bx_filter_container_modef"></span>
			<div style="margin-bottom: 5px"><?= $arItem["NAME"] ?></div>

			<div class="bx_filter_param_area ">
				<div class="bx_filter_param_area_block">
					<div class="bx_input_container">
						<input
							class="min-price"
							type="text"
							name="<? echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"] ?>"
							id="<? echo $arItem["VALUES"]["MIN"]["CONTROL_ID"] ?>"
							value="<? echo $arItem["VALUES"]["MIN"]["HTML_VALUE"] ?>"
							size="5"
							onkeyup="smartFilter.keyup(this)"
							/>
					</div>
				</div>
				<div class="bx_filter_param_area_block">
					<div class="bx_input_container">
						<input
							class="max-price"
							type="text"
							name="<? echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"] ?>"
							id="<? echo $arItem["VALUES"]["MAX"]["CONTROL_ID"] ?>"
							value="<? echo $arItem["VALUES"]["MAX"]["HTML_VALUE"] ?>"
							size="5"
							onkeyup="smartFilter.keyup(this)"
							/>
					</div>
				</div>
				<div style="clear: both;"></div>
			</div>
			<div class="bx_ui_slider_track " id="drag_track_<?= $key ?>">
				<div class="bx_ui_slider_range" style="left: 0; right: 0%;" id="drag_tracker_<?= $key ?>"></div>
				<a class="bx_ui_slider_handle left" href="javascript:void(0)" style="left:0;"
				   id="left_slider_<?= $key ?>"></a>
				<a class="bx_ui_slider_handle right" href="javascript:void(0)" style="right:0%;"
				   id="right_slider_<?= $key ?>"></a>
			</div>
			<div class="bx_filter_param_area ">
				<div class="bx_filter_param_area_block" id="curMinPrice_<?= $key ?>"><?
					if (isset($arItem["VALUES"]["MIN"]["CURRENCY"]))
						echo CCurrencyLang::CurrencyFormat($arItem["VALUES"]["MIN"]["VALUE"], $arItem["VALUES"]["MIN"]["CURRENCY"], false);
					else
						echo $arItem["VALUES"]["MIN"]["VALUE"];
					?></div>
				<div class="bx_filter_param_area_block" id="curMaxPrice_<?= $key ?>"><?
					if (isset($arItem["VALUES"]["MAX"]["CURRENCY"]))
						echo CCurrencyLang::CurrencyFormat($arItem["VALUES"]["MAX"]["VALUE"], $arItem["VALUES"]["MAX"]["CURRENCY"], false);
					else
						echo $arItem["VALUES"]["MAX"]["VALUE"];
					?></div>
				<div style="clear: both;"></div>
			</div>
		</div>
		<div class="filter-separator"></div>


		<script type="text/javascript">
			var DoubleTrackBar<?=$key?> = new cDoubleTrackBar('drag_track_<?=$key?>', 'drag_tracker_<?=$key?>', 'left_slider_<?=$key?>', 'right_slider_<?=$key?>', {
				OnUpdate: function () {
					BX("<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>").value = this.MinPos;
					BX("<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>").value = this.MaxPos;
				},
				Min: parseFloat(<?=$arItem["VALUES"]["MIN"]["VALUE"]?>),
				Max: parseFloat(<?=$arItem["VALUES"]["MAX"]["VALUE"]?>),
				MinInputId: BX('<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>'),
				MaxInputId: BX('<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>'),
				FingerOffset: 10,
				MinSpace: 1,
				RoundTo: 0.01,
				Precision: 2
			});
		</script>
	<?endif;
endforeach;