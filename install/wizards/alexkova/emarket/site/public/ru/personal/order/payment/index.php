<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$APPLICATION->SetTitle("РћРїР»Р°С‚Р° Р·Р°РєР°Р·Р°");
?><?$APPLICATION->IncludeComponent(
	"bitrix:sale.order.payment",
	"",
	Array(
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>