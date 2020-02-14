<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Личный кабинет");
?>
	<div class="span_5_of_5">
		<?$APPLICATION->IncludeComponent("bitrix:main.profile", "emarket_profile", Array(
				"AJAX_MODE" => "N",	// Включить режим AJAX
				"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
				"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
				"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
				"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
				"USER_PROPERTY" => "",	// Показывать доп. свойства
				"SEND_INFO" => "N",	// Генерировать почтовое событие
				"CHECK_RIGHTS" => "Y",	// Проверять права доступа
				"USER_PROPERTY_NAME" => "",	// Название закладки с доп. свойствами
			),
			false
		);?>
	</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>