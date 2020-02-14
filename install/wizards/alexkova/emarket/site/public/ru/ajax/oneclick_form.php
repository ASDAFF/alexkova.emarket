<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?=$APPLICATION->ShowHead();?>
<div class="action-form-t">
	<?$APPLICATION->IncludeComponent(
		"bitrix:form.result.new",
		"emarket_popup_oneclick",
		array(
			"SEF_MODE" => "Y",
			"WEB_FORM_ID" => "#ONECLICK_FORM_ID#",
			"LIST_URL" => "",
			"EDIT_URL" => "",
			"SUCCESS_URL" => "#SITE_DIR#ajax/result_onclick.php",
			"CHAIN_ITEM_TEXT" => "",
			"CHAIN_ITEM_LINK" => "",
			"IGNORE_CUSTOM_TEMPLATE" => "Y",
			"USE_EXTENDED_ERRORS" => "Y",
			"CACHE_TYPE" => "N",
			"CACHE_TIME" => "3600",
			"SEF_FOLDER" => "#SITE_DIR#ajax/",
			"VARIABLE_ALIASES" => array(
				"WEB_FORM_ID" => "WEB_FORM_ID",
				"RESULT_ID" => "RESULT_ID",
			)
		),
		false
	);?></div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>