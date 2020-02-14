<?
if(!$USER->IsAdmin())
	return;

IncludeModuleLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/options.php");
IncludeModuleLangFile(__FILE__);

$arAllOptions = array(
	"GROUPS" => array(
		array("NAME"=>"MAIN_PAGE", "TITLE"=>GetMessage('EMARKET_MAIN_PAGE')),
		array("NAME"=>"DESIGN_TYPE", "TITLE"=>GetMessage('EMARKET_DESIGN_TYPE')),
		array("NAME"=>"BANNER_SETTINGS", "TITLE"=>GetMessage('EMARKET_BANNER_SETTINGS')),
	),
	"PARAMETERS" => array(
		array(
			'NAME'=>'slider_type',
			'TITLE'=>GetMessage("EMARKET_SLIDER_TYPE"),
			"GROUP"=>'MAIN_PAGE',
			'VALUE'=>array(
				"TYPE"=>"list",
				"DEFAULT"=>"TYPE_1",
				"VALUE"=>array(
					"TYPE_1"=>GetMessage("EMARKET_SLIDER_TYPE_1"),
					"TYPE_2"=>GetMessage("EMARKET_SLIDER_TYPE_2"),
					"TYPE_3"=>GetMessage("EMARKET_SLIDER_TYPE_3")
				)
			)
		),
		array(
			'NAME'=>'slider_type_mode',
			'TITLE'=>GetMessage("EMARKET_SLIDER_TYPE_MODE"),
			"GROUP"=>'MAIN_PAGE',
			'VALUE'=>array(
				"TYPE"=>"list",
				"DEFAULT"=>"TYPE_1",
				"VALUE"=>array(
					"TYPE_1"=>GetMessage("EMARKET_SLIDER_TYPE_MODE_1"),
					"TYPE_2"=>GetMessage("EMARKET_SLIDER_TYPE_MODE_2"),
				)
			)
		),
		array(
			'NAME'=>'elements_type',
			'TITLE'=>GetMessage("EMARKET_ELEMENT_DESIGN_TYPE"),
			"GROUP"=>'DESIGN_TYPE',
			'VALUE'=>array(
				"TYPE"=>"list",
				"DEFAULT"=>"TYPE_1",
				"VALUE"=>array(
					"TYPE_1"=>GetMessage("EMARKET_ELEMENT_DESIGN_TYPE_1"),
					"TYPE_2"=>GetMessage("EMARKET_ELEMENT_DESIGN_TYPE_2")
				)
			)
		),
		array(
			'NAME'=>'borders_type',
			'TITLE'=>GetMessage("EMARKET_BORDER_DESIGN_TYPE"),
			"GROUP"=>'DESIGN_TYPE',
			'VALUE'=>array(
				"TYPE"=>"list",
				"DEFAULT"=>"TYPE_1",
				"VALUE"=>array(
					"TYPE_1"=>GetMessage("EMARKET_BORDER_DESIGN_TYPE_1"),
					"TYPE_2"=>GetMessage("EMARKET_BORDER_DESIGN_TYPE_2"),
				)
			)
		),
		array(
			'NAME'=>'top_banner_type',
			'TITLE'=>GetMessage("EMARKET_TOP_BANNER_TYPE"),
			"GROUP"=>'BANNER_SETTINGS',
			'VALUE'=>array(
				"TYPE"=>"list",
				"DEFAULT"=>"RESPONSIVE",
				"VALUE"=>array(
					"DISABLE"=>GetMessage("EMARKET_TOP_BANNER_TYPE_DIS"),
					"RESPONSIVE"=>GetMessage("EMARKET_TOP_BANNER_TYPE_RESP"),
					"FIXED"=>GetMessage("EMARKET_TOP_BANNER_TYPE_FIXED"),
				)
			)
		),
		array(
			'NAME'=>'bottom_banner_type',
			'TITLE'=>GetMessage("EMARKET_BOTTOM_BANNER_TYPE"),
			"GROUP"=>'BANNER_SETTINGS',
			'VALUE'=>array(
				"TYPE"=>"list",
				"DEFAULT"=>"RESPONSIVE",
				"VALUE"=>array(
					"DISABLE"=>GetMessage("EMARKET_BOTTOM_BANNER_TYPE_DIS"),
					"RESPONSIVE"=>GetMessage("EMARKET_BOTTOM_BANNER_TYPE_RESP"),
					"FIXED"=>GetMessage("EMARKET_BOTTOM_BANNER_TYPE_FIXED"),
				)
			)
		),
		array(
			'NAME'=>'column_banner_type',
			'TITLE'=>GetMessage("EMARKET_COLUMN_BANNER_TYPE"),
			"GROUP"=>'BANNER_SETTINGS',
			'VALUE'=>array(
				"TYPE"=>"list",
				"DEFAULT"=>"RESPONSIVE",
				"VALUE"=>array(
					"DISABLE"=>GetMessage("EMARKET_COLUMN_BANNER_TYPE_DIS"),
					"RESPONSIVE"=>GetMessage("EMARKET_COLUMN_BANNER_TYPE_RESP"),
					"FIXED"=>GetMessage("EMARKET_COLUMN_BANNER_TYPE_FIXED"),
				)
			)
		),
		array(
			'NAME'=>'catalog_top_banner_type',
			'TITLE'=>GetMessage("EMARKET_CATALOG_TOP_BANNER_TYPE"),
			"GROUP"=>'BANNER_SETTINGS',
			'VALUE'=>array(
				"TYPE"=>"list",
				"DEFAULT"=>"RESPONSIVE",
				"VALUE"=>array(
					"DISABLE"=>GetMessage("EMARKET_CATALOG_TOP_BANNER_TYPE_DIS"),
					"RESPONSIVE"=>GetMessage("EMARKET_CATALOG_TOP_BANNER_TYPE_RESP"),
					"FIXED"=>GetMessage("EMARKET_CATALOG_TOP_BANNER_TYPE_FIXED"),
				)
			)
		),
		array(
			'NAME'=>'catalog_bottom_banner_type',
			'TITLE'=>GetMessage("EMARKET_CATALOG_BOTTOM_BANNER_TYPE"),
			"GROUP"=>'BANNER_SETTINGS',
			'VALUE'=>array(
				"TYPE"=>"list",
				"DEFAULT"=>"RESPONSIVE",
				"VALUE"=>array(
					"DISABLE"=>GetMessage("EMARKET_CATALOG_BOTTOM_BANNER_TYPE_DIS"),
					"RESPONSIVE"=>GetMessage("EMARKET_CATALOG_BOTTOM_BANNER_TYPE_RESP"),
					"FIXED"=>GetMessage("EMARKET_CATALOG_BOTTOM_BANNER_TYPE_FIXED"),
				)
			)
		),
	),
);

$aTabs = array(
	array(
		"DIV" => "edit1",
		"TAB" => GetMessage("EMARKET_TAB_SET"),
		"ICON" => "af_settings",
		"TITLE" => GetMessage("EMARKET_TAB_TITLE_SET")),
);
$tabControl = new CAdminTabControl("tabControl", $aTabs);

if($REQUEST_METHOD=="POST" && strlen($Update.$Apply.$RestoreDefaults)>0 && check_bitrix_sessid())
{
	if(strlen($RestoreDefaults)>0)
	{
		COption::RemoveOption("alexkova.emarket");
	}
	else
	{
		foreach($arAllOptions["PARAMETERS"] as $arOption)
		{
			$name=$arOption["NAME"];
			$val=$_REQUEST[$name];
			if($arOption["VALUE"]["TYPE"]=="checkbox" && $val!="Y")
				$val="N";
			COption::SetOptionString("alexkova.emarket", $name, $val, $arOption["DEFAULT"]);
		}
	}
	if(strlen($Update)>0 && strlen($_REQUEST["back_url_settings"])>0)
		LocalRedirect($_REQUEST["back_url_settings"]);
	else
		LocalRedirect($APPLICATION->GetCurPage()."?mid=".urlencode($mid)."&lang=".urlencode(LANGUAGE_ID)."&back_url_settings=".urlencode($_REQUEST["back_url_settings"])."&".$tabControl->ActiveTabParam());
}


$tabControl->Begin();
?>
<form method="post" action="<?echo $APPLICATION->GetCurPage()?>?mid=<?=urlencode($mid)?>&amp;lang=<?echo LANGUAGE_ID?>">
<?$tabControl->BeginNextTab();?>

	<?foreach($arAllOptions["GROUPS"] as $group):?>
		<tr class="heading"><td colspan="2"><?=$group["TITLE"]?></td></tr>

		<?foreach($arAllOptions["PARAMETERS"] as $arOption):

			if ($arOption["GROUP"]<>$group["NAME"]) continue;

			$val = COption::GetOptionString("alexkova.emarket", $arOption["NAME"], $arOption["DEFAULT"]);
			$type = $arOption["VALUE"]["TYPE"];

			?>
			<tr>
				<td width="40%" nowrap <?if($type[0]=="textarea") echo 'class="adm-detail-valign-top"'?>>
					<label for="<?echo htmlspecialcharsbx($arOption["NAME"])?>"><?echo $arOption["TITLE"]?>:</label>
				<td width="60%">
					<?if($type=="checkbox"):?>
						<input type="checkbox" id="<?echo htmlspecialcharsbx($arOption["NAME"])?>" name="<?echo htmlspecialcharsbx($arOption["NAME"])?>" value="Y"<?if($val=="Y")echo" checked";?>>
					<?elseif($type=="text"):?>
						<input type="text" size="20" maxlength="255" value="<?echo htmlspecialcharsbx($val)?>" name="<?echo htmlspecialcharsbx($arOption["NAME"])?>">
					<?elseif($type=="textarea"):?>
						<textarea rows="<?echo $type["ROWS"]?>" cols="<?echo $type["COLS"]?>" name="<?echo htmlspecialcharsbx($arOption["NAME"])?>"><?echo htmlspecialcharsbx($val)?></textarea>
					<?elseif($type=="list"):?>
						<select name="<?echo htmlspecialcharsbx($arOption["NAME"])?>">
							<?foreach($arOption["VALUE"]["VALUE"] as $cell=>$oval):?>
								<option value="<?=$cell?>" <?if ($cell == $val) echo "selected='selected'"?>><?=$oval?></option>
							<?endforeach;?>
						</select>
					<?endif?>
				</td>
			</tr>
		<?endforeach?>

	<?endforeach;?>


<?$tabControl->Buttons();?>
	<input type="submit" name="Update" value="<?=GetMessage("MAIN_SAVE")?>" title="<?=GetMessage("MAIN_OPT_SAVE_TITLE")?>" class="adm-btn-save">
	<input type="submit" name="Apply" value="<?=GetMessage("MAIN_OPT_APPLY")?>" title="<?=GetMessage("MAIN_OPT_APPLY_TITLE")?>">
	<?if(strlen($_REQUEST["back_url_settings"])>0):?>
		<input type="button" name="Cancel" value="<?=GetMessage("MAIN_OPT_CANCEL")?>" title="<?=GetMessage("MAIN_OPT_CANCEL_TITLE")?>" onclick="window.location='<?echo htmlspecialcharsbx(CUtil::addslashes($_REQUEST["back_url_settings"]))?>'">
		<input type="hidden" name="back_url_settings" value="<?=htmlspecialcharsbx($_REQUEST["back_url_settings"])?>">
	<?endif?>
	<input type="submit" name="RestoreDefaults" title="<?echo GetMessage("MAIN_HINT_RESTORE_DEFAULTS")?>" OnClick="return confirm('<?echo AddSlashes(GetMessage("MAIN_HINT_RESTORE_DEFAULTS_WARNING"))?>')" value="<?echo GetMessage("MAIN_RESTORE_DEFAULTS")?>">
	<?=bitrix_sessid_post();?>
<?$tabControl->End();?>
</form>