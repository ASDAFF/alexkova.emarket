<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<?
foreach ($arResult["QUESTIONS"] as $FIELD_SID => &$arQuestion)
{
	$addClass = '';



	if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])){
		$addClass .= ' error';

	}

	if ($arQuestion["STRUCTURE"][0]["FIELD_TYPE"] == 'text'){

		$arQuestion["HTML_CODE"] = str_replace('type="text"', 'type="text" placeholder="'.$arQuestion["CAPTION"].'" ', $arQuestion["HTML_CODE"]);
		$arQuestion["HTML_CODE"] = str_replace('class="inputtext"', 'class="inputtext'.$addClass.'"', $arQuestion["HTML_CODE"]);

	}
        if ($FIELD_SID == "EMARKET_PHONE_TEXT" && $_REQUEST['params'] && $_REQUEST['tname']) {
            $buy_text = str_replace("TRADE_NAME", $_REQUEST['tname'], GetMessage('USER_MSG')).str_replace("<br>", ", ", $_REQUEST['params']);
            $arQuestion["HTML_CODE"] = str_replace('</textarea>', $buy_text.'</textarea>', $arQuestion["HTML_CODE"]);
        }
}
?>