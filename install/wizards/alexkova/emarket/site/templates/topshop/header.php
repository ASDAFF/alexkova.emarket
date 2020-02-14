<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
IncludeTemplateLangFile(__FILE__);
CModule::IncludeModule('alexkova.emarket');

global $TopShopSettings;
$TopShopSettings = array(
	"slider_type" => "TYPE_1",
	"slider_type_mode" => "TYPE_1",
	"elements_type" => "TYPE_1",
	"borders_type" => "TYPE_1",
	"top_banner_type" => "FIXED",
	"bottom_banner_type" => "FIXED",
	"column_banner_type" => "RESPONSIVE",
	"catalog_top_banner_type" => "FIXED",
	"catalog_bottom_banner_type" => "FIXED",
);

foreach ($TopShopSettings as $cell=>$val){
	$TopShopSettings[$cell] = $sliderType = COption::GetOptionString("alexkova.emarket", $cell, $val);
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?$APPLICATION->ShowTitle();?></title>
		<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
		<link href='http://fonts.googleapis.com/css?family=Exo+2:400,500,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<?$APPLICATION->ShowHead();?>
		<?
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery-1.10.2.min.js');
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/fancybox/jquery.fancybox.pack.js');
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/script.js');

		$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/normalize.css');
		$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/grid.css');
		$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/settings.css');
		$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/responsive.css', true);
		$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/colors/color_#THEME_COLOR#.css', true);

		$element_type = COption::GetOptionString("alexkova.emarket", "elements_type", "TYPE_1");
		if ($element_type == "TYPE_2") $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/addon/nocorns.css', true);
		$border_type = COption::GetOptionString("alexkova.emarket", "borders_type", "TYPE_1");
		if ($border_type == "TYPE_2") $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/addon/small_borders.css', true);


		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.themepunch.plugins.min.js');
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.themepunch.revolution.min.js');

		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.jcarousel.min.js');
		?>

	</head>
	<body>
		<div id="panel">
			<?$APPLICATION->ShowPanel();?>
		</div>

		<?
		$topBannerTemplate = 'full-static';
		$topBannerActive = "Y";
		$element_type = $TopShopSettings["top_banner_type"];
		if ($element_type == "DISABLE") $topBannerActive = "N";
		if ($element_type == "RESPONSIVE") $topBannerTemplate = "full-responsive";
		?>
		<?$APPLICATION->IncludeComponent("alexkova.emarket:admanager", $topBannerTemplate, array(
				"SHOW" => "TOP",
				"BANTYPE" => "TOP",
				"CACHE_TYPE" => "A",
				"CACHE_TIME" => "0",
				"USE_IN_LG_MODE" => "Y",
				"USE_IN_MD_MODE" => "Y",
				"USE_IN_SM_MODE" => "Y",
				"USE_IN_XS_MODE" => "N"
			),
			false,
			array(
				"ACTIVE_COMPONENT" => $topBannerActive
			)
		);?>



		<div class="wrapper head-line">
			<div class="container">
				<div class="span_2_of_5 md-span_2_of_5 sm-span_5_of_5 xs-span_5_of_5 contacts">
					<div class="phone-area">
						<?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"emarket-include",
	array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => SITE_DIR."include/phone.php",
		"INCLUDE_TITLE" => GetMessage('PHONE_INCLUDE_TITLE')
	),
	false
);?>
					</div>
					<a href="javascript:void(0)" class="phone-url phone-url-ding"><?=GetMessage('PHONE_BUTTON')?></a>
				</div>
				<div class="span_3_of_5 md-span_3_of_5 sm-span_5_of_5 xs-span_5_of_5 basket-line" id="basket-line">
					<div class="mobile-container">
						<div class="login-area xs-hide">
							<?$APPLICATION->IncludeComponent("bitrix:system.auth.form", "popup", Array(
									"REGISTER_URL"           => SITE_DIR."auth/",
									"FORGOT_PASSWORD_URL"    => SITE_DIR."auth/",
									"PROFILE_URL"            => SITE_DIR."personal/",
									"SHOW_ERRORS"            => "Y",
								),
								false
							);?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</div>

						<?$basketFrame = new \Bitrix\Main\Page\FrameHelper("basket_frame");
						$basketFrame->begin();?>
							<?$APPLICATION->IncludeComponent(
								"alexkova.emarket:basket.small",
								"",
								Array(
									"PATH_TO_BASKET" => SITE_DIR."personal/basket/",
									"PATH_TO_ORDER" => SITE_DIR."personal/order/"
								)
							);?>
						<?$basketFrame->beginStub();
							echo " ";
						$basketFrame->end();?>


						<?if (substr_count($APPLICATION->GetCurPage(),SITE_DIR.'/catalog/compare.php') <= 0)
							$APPLICATION->IncludeComponent(
							"bitrix:catalog.compare.list",
							"emarket-compare",
							Array(
								"IBLOCK_TYPE" => "catalog",
								"IBLOCK_ID" => "#PRODUCT_IBLOCK_ID#",
								"AJAX_MODE" => "N",
								"AJAX_OPTION_JUMP" => "N",
								"AJAX_OPTION_STYLE" => "Y",
								"AJAX_OPTION_HISTORY" => "N",
								"DETAIL_URL" => "",
								"COMPARE_URL" => SITE_DIR."catalog/compare.php",
								"NAME" => "CATALOG_COMPARE_LIST"
							)
						);?>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>

		<div class="wrapper">
			<div class="container tb10">
				<div class="span_2_of_5 sm-span_5_of_5 contacts xs-hide">
					<a class="logo" href="<?=SITE_DIR?>">
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							Array(
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "inc",
								"EDIT_TEMPLATE" => "",
								"PATH" => SITE_DIR."include/logo.php"
							)
						);?>

					</a>
				</div>
				<div class="span_3_of_5 sm-span_5_of_5">

					<?$APPLICATION->IncludeComponent("bitrix:menu", "mobile-menu", Array(
	"ROOT_MENU_TYPE" => "top",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
			0 => "",
		),
		"MAX_LEVEL" => "1",
		"CHILD_MENU_TYPE" => "",
		"USE_EXT" => "N",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"CACHE_SELECTED_ITEMS" => "N"
	),
	false
);?>


					<div class="search-line">
						<?$APPLICATION->IncludeComponent(
                                "bitrix:search.title",
                                "emarket",
                                Array(
                                        "COMPONENT_TEMPLATE" => ".default",
                                        "NUM_CATEGORIES" => "1",
                                        "TOP_COUNT" => "5",
                                        "ORDER" => "rank",
                                        "USE_LANGUAGE_GUESS" => "N",
                                        "CHECK_DATES" => "N",
                                        "SHOW_OTHERS" => "N",
                                        "PAGE" => "#SITE_DIR#catalog/",
                                        "SHOW_INPUT" => "Y",
                                        "INPUT_ID" => "title-search-input",
                                        "CONTAINER_ID" => "title-search",
                                        "CATEGORY_0_TITLE" => "",
                                        "CATEGORY_0" => array("no")
                                )
                        );?>
					</div>

				</div>
				<div class="clear"></div>
			</div>
		</div>



		<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"tree",
	array(
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "#PRODUCT_IBLOCK_ID#",
		"SECTION_ID" => "",
		"SECTION_CODE" => "",
		"COUNT_ELEMENTS" => "N",
		"TOP_DEPTH" => "5",
		"SECTION_FIELDS" => array(
			0 => "NAME",
			1 => "",
		),
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"VIEW_MODE" => "LIST",
		"SHOW_PARENT_NAME" => "Y",
		"SECTION_URL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_GROUPS" => "Y",
		"ADD_SECTIONS_CHAIN" => "N"
	),
	false
);?>

		<?
		if ($APPLICATION->GetCurPage(true) == SITE_DIR.'index.php'):
//
			$sliderType = $TopShopSettings["slider_type_mode"];
			switch ($sliderType) {
				case "TYPE_1":
					$template = "revolution_full";
					break;
				case "TYPE_2":
					$template = "revolution";
					break;
				default:
					$template = "revolution_full";
					break;
			}
			?>

            <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	$template,
	Array(
		"IBLOCK_TYPE" => "content",
		"IBLOCK_ID" => "#SLIDER_IBLOCK_ID#",
		"NEWS_COUNT" => "20",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(0=>"ID",1=>"CODE",2=>"NAME",3=>"PREVIEW_PICTURE",4=>"",),
		"PROPERTY_CODE" => array(0=>"LINK",1=>"DELAY",2=>"NEW_TAB",3=>"MASTERSPEED",4=>"EFFECT"),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "360000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Slider",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"AJAX_OPTION_ADDITIONAL" => ""
	)
);?>
            <?endif;?>





	<?if ($APPLICATION->GetCurPage(true) != SITE_DIR.'index.php'):?>

	<div class="wrapper">
		<div class="container tb10">

			<div class="span-5_of_5">
					<?$APPLICATION->IncludeComponent(
						"bitrix:breadcrumb",
						"emarket-breadcrumb",
						array(
							"START_FROM" => "0",
							"PATH" => "",
							"SITE_ID" => "-"
						),
						false
					);?>
			</div>
	<?endif;?>
	<div class="clear"></div>


	<?if (
		substr_count($APPLICATION->GetCurDir(), SITE_DIR.'catalog/')<=0
		&& substr_count($APPLICATION->GetCurDir(), SITE_DIR.'brands/')<=0
		&& $APPLICATION->GetCurPage(true) != SITE_DIR.'index.php'):?>
		<div class="span_5_of_5 xs-hide"><h1><?=$APPLICATION->ShowTitle('h1')?></h1></div>
		<div class="clear"></div>
	<?endif;?>

	<?if (substr_count($APPLICATION->GetCurDir(), SITE_DIR.'catalog/')<=0
	&& substr_count($APPLICATION->GetCurDir(), SITE_DIR.'brands/')<=0
	&& $APPLICATION->GetCurPage(true) != SITE_DIR.'index.php'
	):?>
			<?if ($APPLICATION->GetCurPage(true) != SITE_DIR.'index.php'){?>
		<div class="span_1_of_5 sm-span_2_of_5 xs-span_5_of_5">
			<?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"left-menu",
	array(
		"ROOT_MENU_TYPE" => "left",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "1",
		"CHILD_MENU_TYPE" => "",
		"USE_EXT" => "N",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"CACHE_SELECTED_ITEMS" => "N"
	),
	false
);?>
		</div>

		<div class="span_4_of_5 sm-span_3_of_5 xs-span_5_of_5">
			<?}else{?>
			<div class="container-full">
			<?}?>

	<?endif;?>

	<?
	if (isset($_REQUEST["brand"]) && strval($_REQUEST["brand"])>0){
		global $arrFilter;
		$arrFilter["PROPERTY_MANUFACTURER"] = strval($_REQUEST["brand"]);
	}