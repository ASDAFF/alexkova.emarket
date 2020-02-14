<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("404. Страница не найдена");
?>
	<div class="span_2_of_5">
		<img class="image404" src="<?=SITE_TEMPLATE_PATH?>/images/404.jpg" />
	</div>
	<div class="span_2_of_5">
		К сожалению, страница, которую вы запросили не была найдена.
		Вы можете перейти на <a href="#SITE_DIR#/">главную</a> или воспользоваться <a href="#SITE_DIR#/catalog/">каталогом</a>
	</div>
	<div class="clear"></div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
