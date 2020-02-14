<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<?
//echo "<pre>"; print_r($arResult); echo "</pre>";

foreach ($arResult["QUESTIONS"] as $FIELD_SID => &$arQuestion)
{
	$addClass = '';



	if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])){
		$addClass .= ' error';

	}

	if ($arQuestion["STRUCTURE"][0]["FIELD_TYPE"] == 'text'){

		if ($arResult['arQuestions'][$FIELD_SID]["REQUIRED"] == "Y"){
			$arQuestion["CAPTION"] .= " * ";
		}

		$arQuestion["HTML_CODE"] = str_replace('type="text"', 'type="text" placeholder="'.$arQuestion["CAPTION"].'" ', $arQuestion["HTML_CODE"]);
		$arQuestion["HTML_CODE"] = str_replace('class="inputtext"', 'class="inputtext'.$addClass.'"', $arQuestion["HTML_CODE"]);

	}
}
?>