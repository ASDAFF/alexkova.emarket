<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Современный интернет-магазин TopShop");
?>Центр разработки Кузница представляет современное решени, которое позволит вам в короткие сроки запустить продажи в Интернет.<br>
 <br>
 Магазин <b>TopShop</b>&nbsp;- это не имеющее аналогов решение для CMS 1C-Битрикс. <br>
 <br>
 Выбирая данный продукт вы получаете:<br>
<ul>
	<li>Уникальные технологии</li>
	<li>Современные стандарты</li>
	<li>Решение, в котором каждая мелочь существует для того, чтобы помочь вашему бизнесу. А мы можем смело сказать&nbsp;-&nbsp;"<b>СДЕЛАНО С ДУШОЙ!</b>"</li>
</ul>
 <?$APPLICATION->IncludeComponent(
	"bitrix:form.result.new",
	"emarket_form",
	Array(
		"WEB_FORM_ID" => "#ANSWER_FORM_ID#",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"USE_EXTENDED_ERRORS" => "Y",
		"SEF_MODE" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"LIST_URL" => "",
		"EDIT_URL" => "",
		"SUCCESS_URL" => "result.php",
		"CHAIN_ITEM_TEXT" => "",
		"CHAIN_ITEM_LINK" => "",
		"AJAX_MODE" => "Y",
		"VARIABLE_ALIASES" => array("WEB_FORM_ID"=>"WEB_FORM_ID","RESULT_ID"=>"RESULT_ID",)
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>