<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Личный кабинет");
?>
<div class="span_4_of_5 md-span_5_of_5">
	<p>Добро пожаловать в личный кабинет!</p>
	<p>Здесь вы можете просмотреть информацию о ваших заказах, проверить состояние корзины, изменить личную информацию</p>
	<h2>Личная информация</h2>
	<ul>
		<li>
			<a href="profile/">Редактировать личную информацию</a>
		</li>
	</ul>
	<h2>Заказы</h2>
	<ul>
		<li>
			<a href="basket/">Просмотреть содержимое корзины</a>
		</li>
		<li>
			<a href="order/">Ознакомиться с состоянием заказов</a>
		</li>

		<li>
			<a href="order/?filter_history=Y">Просмотреть историю заказов</a>
		</li>
	</ul>
</div>
<div class="span_1_of_5 md-hide xs-hide sm-hide">
	<?$APPLICATION->IncludeComponent(
		"alexkova.emarket:admanager",
		"",
		Array(
			"SHOW" => "",
			"BANTYPE" => "RIGHT_COLUMN",
			"CACHE_TYPE" => "AUTO",
			"CACHE_TIME" => "0"
		)
	);?>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>