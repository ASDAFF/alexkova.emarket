<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

if(COption::GetOptionString("alexkova.emarket", "wizard_installed", "N", WIZARD_SITE_ID) == "Y" && !WIZARD_INSTALL_DEMO_DATA)
	return;
if (!CModule::IncludeModule("form"))
	return;



//форма
$arFormCreate = array(
	"NAME"              => GetMessage("EMARKET_FEEDBACK_NAME"),
	"SID"               => "EMARKET_FEEDBACK",
	"C_SORT"            => 100,
	"BUTTON"            => GetMessage("EMARKET_FEEDBACK_BUTTON_TEXT"),
	"DESCRIPTION"       => GetMessage("EMARKET_FEEDBACK_DESCRIPTION"),
	"DESCRIPTION_TYPE"  => "text",
	"STAT_EVENT1"       => "form",
	"STAT_EVENT2"       => "feedback_form",
	"arSITE"            => array(WIZARD_SITE_ID),
	"arMENU"            => array("ru" => GetMessage("EMARKET_FEEDBACK_NAME"), "en" => "Feedback Form"),
	"USE_CAPTCHA"		=> "N",

);

//вопросы формы
$arFormFields = array();

$arFormFields[] = array(
	"TITLE" => GetMessage("FORM_FIELD_NAME_TITLE"),
	"DESCRIPTION" => GetMessage("FORM_FIELD_NAME_DESCRIPTION"),
	"SID" => "EMARKET_FEEDBACK_NAME",
	"TITLE_TYPE" => "text",	// text html
	"FIELD_TYPE" => "text",	//text integer date
	"SORT" => 100,
	"REQUIRED" => "Y",
	"arANSWER" => array(//ответ вопроса. MESSAGE должно быть не пусто (хотя бы пробел)
		array(
			"MESSAGE"		=> " ",
			"VALUE"			=> "",
			"ACTIVE"		=> "Y",
			"FIELD_TYPE"	=> "text",
		)
	)
);

$arFormFields[] = array(
	"TITLE" => GetMessage("FORM_FIELD_PHONE_TITLE"),
	"DESCRIPTION" => GetMessage("FORM_FIELD_PHONE_TITLE"),
	"SID" => "EMARKET_FEEDBACK_PHONE",
	"TITLE_TYPE" => "text",	// text html
	"FIELD_TYPE" => "text",	//text integer date
	"SORT" => 150,
	"REQUIRED" => "Y",
	"arANSWER" => array(
		array(
			"MESSAGE"		=> " ",
			"VALUE"			=> "",
			"ACTIVE"		=> "Y",
			"FIELD_TYPE"	=> "text",
		)
	)
);

$arFormFields[] = array(
	"TITLE" => GetMessage("FORM_FIELD_EMAIL_TITLE"),
	"DESCRIPTION" => GetMessage("FORM_FIELD_EMAIL_DESCRIPTION"),
	"SID" => "EMARKET_FEEDBACK_MAIL",
	"TITLE_TYPE" => "text",	// text html
	"FIELD_TYPE" => "text",	//text integer date
	"SORT" => 140,
	"REQUIRED" => "Y",
	"arANSWER" => array(//ответ вопроса. MESSAGE должно быть не пусто (хотя бы пробел)
		array(
			"MESSAGE"		=> " ",
			"VALUE"			=> "",
			"ACTIVE"		=> "Y",
			"FIELD_TYPE"	=> "text",
		)
	)
);

$arFormFields[] = array(
	"TITLE" => GetMessage("FORM_FIELD_TEXT_TITLE"),
	"DESCRIPTION" => GetMessage("FORM_FIELD_TEXT_DESCRIPTION"),
	"SID" => "EMARKET_FEEDBACK_TEXT",
	"TITLE_TYPE" => "text",	// text html
	"FIELD_TYPE" => "text",	//text integer date
	"SORT" => 200,
	"REQUIRED" => "Y",
	"arANSWER" => array(
		array(
			"MESSAGE"		=> " ",
			"VALUE"			=> "",
			"ACTIVE"		=> "Y",
			"FIELD_TYPE"	=> "textarea",
		)
	)
);





//форма
$rsForm = CForm::GetBySID("MULTIMAG_FEEDBACK");
if($arForm = $rsForm->Fetch()){
	$formID = $arForm["ID"];
}else{
	//print_r($arFormCreate);die();

	if($formID = CForm::Set($arFormCreate,false,"N")){
		//
	}
}
// добавим новую веб-форму
if($formID>0){
	foreach($arFormFields as $arFormField){
		// формируем массив полей вопроса
		$arFields = array(
			"FORM_ID" => $formID,
			"ACTIVE" => "Y",
			"TITLE" => $arFormField["TITLE"],
			"TITLE_TYPE" =>  $arFormField["TITLE_TYPE"],
			"C_SORT" => $arFormField["SORT"],
			"ADDITIONAL" => 'N',
			"REQUIRED" => $arFormField["REQUIRED"],
			"IN_RESULTS_TABLE" => "Y",
			"IN_EXCEL_TABLE" => "Y",
			"FIELD_TYPE" => $arFormField["FIELD_TYPE"],
			"COMMENTS" => $arFormField["DESCRIPTION"],
			"FILTER_TITLE" => $arFormField["TITLE"],
			"RESULTS_TABLE_TITLE" => $arFormField["TITLE"],
			"arANSWER" => $arFormField["arANSWER"],
			"arFILTER_ANSWER_TEXT" => "",
			"arFILTER_ANSWER_VALUE" => "",
			"SID" => $arFormField["SID"],
		);
		//echo "<pre>"; print_r($arFields);echo "</pre>";die();
		// добавим новый вопрос
		CFormField::Set($arFields,false,"N");
	}
	$arFields = array(
		"FORM_ID"             => $formID,               // ID веб-формы
		"C_SORT"              => 100,                    // порядок сортировки
		"ACTIVE"              => "Y",                    // статус активен
		"TITLE"               => "default",         // заголовок статуса
		"DESCRIPTION"         => "", // описание статуса
		"CSS"                 => "",          // CSS класс
		"HANDLER_OUT"         => "",                     // обработчик
		"HANDLER_IN"          => "",                     // обработчик
		"DEFAULT_VALUE"       => "Y",                    // по умолчанию
		"arPERMISSION_VIEW"   => array(),               // право просмотра для всех
		"arPERMISSION_MOVE"   => array(2),                // право перевода только админам
		"arPERMISSION_EDIT"   => array(),                // право редактирование для админам
		"arPERMISSION_DELETE" => array(),                // право удаления только админам
	);

	CFormStatus::Set($arFields,false,"N");


}
WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH."company/", Array("ANSWER_FORM_ID" => $formID));
?>