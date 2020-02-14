<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Оформление заказа");
?>
	<?$APPLICATION->IncludeComponent(
		"bitrix:sale.personal.order",
		"",
		Array(
			"PROP_1" => array(),
			"PROP_2" => array(),
			"ACTIVE_DATE_FORMAT" => "j F Y",
			"SEF_MODE" => "N",
			"CACHE_TYPE" => "A",
			"CACHE_TIME" => "3600",
			"CACHE_GROUPS" => "Y",
			"ORDERS_PER_PAGE" => "20",
			"PATH_TO_PAYMENT" => "payment.php",
			"PATH_TO_BASKET" => "basket/",
			"SET_TITLE" => "Y",
			"SAVE_IN_SESSION" => "Y",
			"NAV_TEMPLATE" => "",
			"CUSTOM_SELECT_PROPS" => array(""),
			"HISTORIC_STATUSES" => array(),
			"STATUS_COLOR_N" => "yellow",
			"STATUS_COLOR_P" => "green",
			"STATUS_COLOR_F" => "gray",
			"STATUS_COLOR_PSEUDO_CANCELLED" => "red"
		)
	);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>