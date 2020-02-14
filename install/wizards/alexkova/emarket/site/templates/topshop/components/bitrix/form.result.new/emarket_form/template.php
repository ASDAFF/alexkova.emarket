<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>

<?=$arResult["FORM_NOTE"]?>

<?if ($arResult["isFormNote"] != "Y")
{
?>
<?=$arResult["FORM_HEADER"]?>


<?
if ($arResult["isFormDescription"] == "Y" || $arResult["isFormTitle"] == "Y" || $arResult["isFormImage"] == "Y")
{
?>
	<?
/***********************************************************************************
					form header
***********************************************************************************/
if ($arResult["isFormTitle"])
{
?>
	<h3><?=$arResult["FORM_TITLE"]?></h3>
<?
} //endif ;

	if ($arResult["isFormImage"] == "Y")
	{
	?>
	<a href="<?=$arResult["FORM_IMAGE"]["URL"]?>" target="_blank" alt="<?=GetMessage("FORM_ENLARGE")?>"><img src="<?=$arResult["FORM_IMAGE"]["URL"]?>" <?if($arResult["FORM_IMAGE"]["WIDTH"] > 300):?>width="300"<?elseif($arResult["FORM_IMAGE"]["HEIGHT"] > 200):?>height="200"<?else:?><?=$arResult["FORM_IMAGE"]["ATTR"]?><?endif;?> hspace="3" vscape="3" border="0" /></a>
	<?//=$arResult["FORM_IMAGE"]["HTML_CODE"]?>
	<?
	} //endif
	?>

			<p><?=$arResult["FORM_DESCRIPTION"]?></p>

	<?
} // endif
	?>

<br />
<?
/***********************************************************************************
						form questions
***********************************************************************************/
?>
<div class="emarket-form span_3_of_5 sm-span_5_of_5 xs-span_5_of_5">

	<?
	foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion)
	{
		if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden')
		{
			echo $arQuestion["HTML_CODE"];
		}
		else
		{
	?>
			<?
			$addClass="";
			if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])){
				$addClass = " error-field";
			}
			?>
			<div class="emarket-form-question<?=$addClass?>">
				<div class="emarket-form-question-label">
					<?=$arQuestion["CAPTION"]?><?if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?><?endif;?>
				</div>
				<div class="emarket-form-question-code">
					<?=$arQuestion["HTML_CODE"]?>
				</div>
			</div>
	<?
		}
	} //endwhile
	?>
<?
if($arResult["isUseCaptcha"] == "Y")
{
?>
	<div class="emarket-form-question">
		<div class="emarket-form-question-label">
			<?=GetMessage("FORM_CAPTCHA_TABLE_TITLE")?>
		</div>
		<div class="emarket-form-question-code">
			<input type="hidden" name="captcha_sid" value="<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" />
			<img src="/bitrix/tools/captcha.php?captcha_sid=<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" width="180" height="40" />
			<?=GetMessage("FORM_CAPTCHA_FIELD_TITLE")?><?=$arResult["REQUIRED_SIGN"];?>
			<input type="text" name="captcha_word" size="30" maxlength="50" value="" class="inputtext" />
		</div>
	</div>

<?
} // isUseCaptcha
?>
<div class="emarket-form-buttons">
	<input class="color-button" <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit" value="<?=htmlspecialcharsbx(strlen(trim($arResult["arForm"]["BUTTON"])) <= 0 ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>" />
	<input type="hidden" name="web_form_apply" value="Y" />
</div>

<p>
<?=$arResult["REQUIRED_SIGN"];?> - <?=GetMessage("FORM_REQUIRED_FIELDS")?>
</p>
<?=$arResult["FORM_FOOTER"]?>
<?
} //endif (isFormNote)
?>