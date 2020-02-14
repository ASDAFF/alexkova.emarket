<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Корзина");
?>
<div class="span_5_of_5">
	<?$APPLICATION->IncludeComponent("bitrix:sale.basket.basket", "emarket_basket", Array(
	"COLUMNS_LIST" => array(	// Выводимые колонки
			0 => "NAME",
//			1 => "DISCOUNT",
//			2 => "WEIGHT",
			3 => "PROPS",
			4 => "DELETE",
			5 => "DELAY",
			6 => "PRICE",
			7 => "QUANTITY",
			8 => "SUM",
		),
		"PATH_TO_ORDER" => "/personal/order/make/",	// Страница оформления заказа
		"HIDE_COUPON" => "N",	// Спрятать поле ввода купона
		"PRICE_VAT_SHOW_VALUE" => "N",	// Отображать значение НДС
		"COUNT_DISCOUNT_4_ALL_QUANTITY" => "N",	// Рассчитывать скидку для каждой позиции (на все количество товара)
		"USE_PREPAYMENT" => "N",	// Использовать предавторизацию для оформления заказа (PayPal Express Checkout)
		"QUANTITY_FLOAT" => "N",	// Использовать дробное значение количества
		"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
		"ACTION_VARIABLE" => "action",	// Название переменной действия
		"OFFERS_PROPS" => "",	// Свойства, влияющие на пересчет корзины
	),
	false
);?>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>