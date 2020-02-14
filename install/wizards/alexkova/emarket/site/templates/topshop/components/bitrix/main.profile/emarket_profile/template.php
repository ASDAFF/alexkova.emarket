<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?
?>
<?=ShowError($arResult["strProfileError"]);?>
<?
if ($arResult['DATA_SAVED'] == 'Y')
	echo ShowNote(GetMessage('PROFILE_DATA_SAVED'));
?>
	<form method="post" name="form1" action="<?=$arResult["FORM_TARGET"]?>?" enctype="multipart/form-data">
	<?=$arResult["BX_SESSION_CHECK"]?>
	<input type="hidden" name="lang" value="<?=LANG?>" />
	<input type="hidden" name="ID" value=<?=$arResult["ID"]?> />
	<input type="hidden" name="LOGIN" value=<?=$arResult["arUser"]["LOGIN"]?> />
	<input type="hidden" name="EMAIL" value=<?=$arResult["arUser"]["EMAIL"]?> />

		<div class="container">
			<div class="span_2_of_5 from-left">
				<label for="profileName"><?=GetMessage('NAME')?></label><br/>
				<input id="profileName" type="text" name="NAME" maxlength="50" value="<?=$arResult["arUser"]["NAME"]?>" /><br><br>

				<label for="profileLastname"><?=GetMessage('LAST_NAME')?></label><br/>
				<input id="profileLastname" type="text" name="LAST_NAME" maxlength="50" value="<?=$arResult["arUser"]["LAST_NAME"]?>" /><br><br>

				<label for="profileSecondName"><?=GetMessage('SECOND_NAME')?></label><br/>
				<input id="profileSecondName" type="text" name="SECOND_NAME" maxlength="50"  value="<?=$arResult["arUser"]["SECOND_NAME"]?>" /><br><br>
			</div>

			<div class="span_2_of_5">
				<label for="profilePassword"><?=GetMessage('NEW_PASSWORD_REQ')?></label><br/>
				<input id="profilePassword" type="password" name="NEW_PASSWORD" maxlength="50" value="" autocomplete="off" /> <br><br>

				<label for="profilePasswordConfirm"><?=GetMessage('NEW_PASSWORD_CONFIRM')?></label><br/>
				<input id="profilePasswordConfirm" type="password" name="NEW_PASSWORD_CONFIRM" maxlength="50" value="" autocomplete="off" /> <br><br>
			</div>
			<div class="span_1_of_5"></div>
			<div class="clear"></div>
			<input name="save" value="<?=GetMessage("MAIN_SAVE")?>" class="color-button" type="submit">

		</div>
	</form>
<br>
<?
if($arResult["SOCSERV_ENABLED"])
{
	$APPLICATION->IncludeComponent("bitrix:socserv.auth.split", ".default", array(
			"SHOW_PROFILES" => "Y",
			"ALLOW_DELETE" => "Y"
		),
		false
	);
}
?>
