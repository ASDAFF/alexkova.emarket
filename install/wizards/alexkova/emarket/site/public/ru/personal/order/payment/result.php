<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Р РµР·СѓР»СЊС‚Р°С‚ РѕРїР»Р°С‚С‹");
?><?$APPLICATION->IncludeComponent(
	"bitrix:sale.order.payment.receive",
	"",
	Array(
		"PAY_SYSTEM_ID" => "",
		"PERSON_TYPE_ID" => ""
	),
false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>