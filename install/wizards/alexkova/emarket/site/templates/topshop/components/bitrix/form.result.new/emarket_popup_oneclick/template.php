<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Alexkova\Emarket\Catalog\Image;

?>
<?IncludeTemplateLangFile(__FILE__);?>

<?if ($arResult["isFormErrors"] == "Y" && false || $arResult["isUseCaptcha"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>

<?=$arResult["FORM_HEADER"]?>

<?if (!isset($_REQUEST["tid"])) return ;?>

<?
function SetTID(){
	$result = 0;

	$rsField = CFormField::GetBySID("EMARKET_ONECLICK_ID");
	if ($arField = $rsField->Fetch()){
		COption::SetOptionInt('alexkova.emarket', 'tidform_id_'.SITE_ID, $arField["ID"]);
		return $arField["ID"];
	}

	return $result;
}

function SetTIDName(){
	$result = 0;

	$rsField = CFormField::GetBySID("EMARKET_ONECLICK_TID_NAME");
	if ($arField = $rsField->Fetch()){
		COption::SetOptionInt('alexkova.emarket', 'tname_id_'.SITE_ID, $arField["ID"]);
		return $arField["ID"];
	}

	return $result;
}


$tnameForm = COption::GetOptionInt('alexkova.emarket', 'tname_id_'.SITE_ID, SetTIDName());
$tidForm = COption::GetOptionInt('alexkova.emarket', 'tidform_id_'.SITE_ID, SetTID());



if (!CModule::IncludeModule('iblock') || !CModule::IncludeModule('alexkova.emarket')) return;

if (isset($_REQUEST["tid_off"])){
	$res = CIBlockElement::getByID($_REQUEST["tid_off"]);
	if ($arFields = $res->Fetch()){
		if ($arFields["PREVIEW_PICTURE"]>0)
			$arImage = \Alexkova\Emarket\Catalog\Image::getResizeImage($arFields["PREVIEW_PICTURE"], 150);
		else if($arFields["DETAIL_PICTURE"]>0)
			$arImage = \Alexkova\Emarket\Catalog\Image::getResizeImage($arFields["DETAIL_PICTURE"], 150);

		$arName = $arFields["NAME"];
		$idTrade = $arFields["ID"];
	}
} elseif (isset($_REQUEST["tid"])){
	$res = CIBlockElement::getByID($_REQUEST["tid"]);
	if ($arFields = $res->Fetch()){
		if ($arFields["PREVIEW_PICTURE"]>0)
			$arImage = \Alexkova\Emarket\Catalog\Image::getResizeImage($arFields["PREVIEW_PICTURE"], 150);
		else if($arFields["DETAIL_PICTURE"]>0)
			$arImage = \Alexkova\Emarket\Catalog\Image::getResizeImage($arFields["DETAIL_PICTURE"], 150);

		$arName = $arFields["NAME"];
		$idTrade = $arFields["ID"];
	}
}

if (strlen($arImage)>0){
	echo '<img src="'.$arImage.'"><br /><br />';
}

echo '<div class="sale-title">'.$arName.'</div>';

foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion)
{
	if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden')
	{
		echo $arQuestion["HTML_CODE"];
	}
	elseif ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'radio')
	{
		echo '<div class="rd">'.$arQuestion["HTML_CODE"].'</div>';
	}
	else
	{
		if ($arQuestion['STRUCTURE'][0]["ID"] == $tidForm){
			$arQuestion["HTML_CODE"] = '<input type="text" placeholder="" class="inputtext" name="form_text_'.$arQuestion['STRUCTURE'][0]["ID"].'" value="'.$idTrade.'" size="0" readonly="readonly" style="display:none">';
		}elseif($arQuestion['STRUCTURE'][0]["ID"] == $tnameForm){
			$arQuestion["HTML_CODE"] = '<input type="text" placeholder="" class="inputtext" name="form_text_'.$arQuestion['STRUCTURE'][0]["ID"].'" value="'.$arName.'" size="0" readonly="readonly" style="display:none">';
		}
		echo $arQuestion["HTML_CODE"];
	}
} //endwhile
?>
<?
if($arResult["isUseCaptcha"] == "Y")
{
	?>
	<tr>
		<th colspan="2"><b><?=GetMessage("FORM_CAPTCHA_TABLE_TITLE")?></b></th>
	</tr>
	<tr>
		<td>&nbsp;</td></tr>
	<tr>
		<td><input type="hidden" name="captcha_sid" value="<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" /><img src="/bitrix/tools/captcha.php?captcha_sid=<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" width="180" height="40" /></td>
	</tr>
	<tr>
		<td><?=GetMessage("FORM_CAPTCHA_FIELD_TITLE")?><?=$arResult["REQUIRED_SIGN"];?></td></tr>
	<tr>
		<td><input type="text" name="captcha_word" size="30" maxlength="50" value="" class="inputtext" /></td>
	</tr>
<?
} // isUseCaptcha
?>

<input type="hidden" class="red-button" name="web_form_apply" value="Y" />
<input type="submit" id="sendanswer" onclick="sendAnswer();" class="red-button" name="web_form_apply" value="<?=GetMessage("FORM_APPLY_BUTTON")?>" />
<?=$arResult["FORM_FOOTER"]?>
<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery-1.10.2.min.js');?>
<style>

	html, body{
		padding:0; margin: 0;
		background: transparent;
	}

	.rd{
		display: none;
	}

	.action-form-t{
		width: 90%;
		margin: 0 auto;
		text-align: center;
		padding: 0;
	}

	.action-form-t form{
		margin: 0;
		padding-top: 0;
	}

	.action-form-t form input[type=text], textarea{
		width: 100%;
		background: #FFF;
		border: 1px solid #6b6b6b;
		-webkit-border-radius: 4px;
		-moz-border-radius: 4px;
		border-radius: 4px;
		margin-bottom: 20px;
		font-size: 16px;
		outline: none;
		padding: 8px 8px 10px 8px;
	}

	.action-form-t form input[type=text].error{
		border: 1px solid #F00;
		color: #F00;
	}

	.action-form-t form input[type=text].error::-webkit-input-placeholder {color: #F00;}
	.action-form-t form input[type=text].error:-moz-placeholder {color: #F00;}

	.action-form-t form input[type=text]:focus{
		border: 1px solid #000;
		color: #000;
	}

	.action-form-t .red-button{
		padding: 10px 40px 12px;
		cursor: pointer;
	}
	.message{

		background: #00cc99;
		color: #FFF;
		width: 80%;
		padding: 20px 10px;
		margin: 0 auto;
		margin-top: 40px;
		text-align: center;
	}

	.sale-title{
		font-weight: bold;
		font-size: 18px;
		margin-bottom: 20px;
	}
</style>

<script>
	$(document).ready(function(){
            $(window).parent().find('#phone_frame').hide();
	});
	function sendAnswer(){
		$('.action-form-t').after('<div class="message"><?=GetMessage('FORM_WAIT')?></div>');
		$('.action-form-t').hide();
	}
</script>