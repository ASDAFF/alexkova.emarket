<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Модерация отзывов");
?>Здесь показаны все отзывы к товарам, поступающие в в магазин<?$APPLICATION->IncludeComponent(
	"bitrix:forum",
	"",
	Array(
		"THEME" => "orange",
		"SHOW_TAGS" => "Y",
		"SHOW_AUTH_FORM" => "Y",
		"TMPLT_SHOW_ADDITIONAL_MARKER" => "",
		"RESTART" => "N",
		"NO_WORD_LOGIC" => "N",
		"USE_LIGHT_VIEW" => "Y",
		"FID" => array("1"),
		"SEF_MODE" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_TIME_USER_STAT" => "60",
		"CACHE_TIME_FOR_FORUM_STAT" => "3600",
		"FORUMS_PER_PAGE" => "10",
		"TOPICS_PER_PAGE" => "10",
		"MESSAGES_PER_PAGE" => "10",
		"IMAGE_SIZE" => "500",
		"ATTACH_MODE" => array(),
		"SET_TITLE" => "N",
		"USE_RSS" => "N",
		"SHOW_VOTE" => "N",
		"SHOW_RATING" => "",
		"RATING_ID" => array(),
		"RATING_TYPE" => "",
		"RSS_COUNT" => "30",
		"VARIABLE_ALIASES" => Array("FID"=>"FID","TID"=>"TID","MID"=>"MID","UID"=>"UID")
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>