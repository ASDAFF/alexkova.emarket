<? IncludeTemplateLangFile(__FILE__);
global $TopShopSettings;
?>
<div class="clear"></div>
<?if ($APPLICATION->GetCurPage(true) == SITE_DIR.'index.php'):?>
	<div class="container main-bottom-content">
		<div class="span_2_of_5 sm-span_5_of_5 xs-span_5_of_5 tb20">
			<h3><?=GetMessage('ABOUT_COMPANY_TITLE')?></h3>
			<div class="content-slide">
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"emarket-include",
					array(
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "inc",
						"EDIT_TEMPLATE" => "",
						"PATH" => SITE_DIR."include/shop_info.php",
						"INCLUDE_TITLE" => GetMessage('SHOP_INFO_INCLUDE_TITLE')
					),
					false
				);?>
			</div>
			<div class="content-slide-button color-button" data-state="up" data-slide=".content-slide" data-slideup="<?=GetMessage('SLIDE_UP_CONTENT_SLIDE')?>" data-slidedown="<?=GetMessage('SLIDE_DOWN_CONTENT_SLIDE')?>"><?=GetMessage('SLIDE_DOWN_CONTENT_SLIDE')?></div>
		</div>
		<div class="span_2_of_5 sm-span_5_of_5 xs-span_5_of_5 tb20">
			<h3><?=GetMessage('NEWS_TITLE')?></h3>
			<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"main_news", 
	array(
		"IBLOCK_TYPE" => "content",
		"IBLOCK_ID" => "#NEWS_IBLOCK_ID#",
		"NEWS_COUNT" => "3",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "",
		"SORT_BY2" => "",
		"SORT_ORDER2" => "",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(
			0 => "NAME",
			1 => "DATE_ACTIVE_FROM",
			2 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "j M Y",
		"SET_TITLE" => "Y",
		"SET_BROWSER_TITLE" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_META_DESCRIPTION" => "Y",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"PAGER_TEMPLATE" => "",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "News",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?>
		</div>
		<div class="span_1_of_5 sm-hide xs-hide tb20">
			<h3><?=GetMessage('SONET_TITLE')?></h3>
			<?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"emarket-include",
				array(
					"AREA_FILE_SHOW" => "file",
					"AREA_FILE_SUFFIX" => "inc",
					"EDIT_TEMPLATE" => "",
					"PATH" => SITE_DIR."include/shop_main_right.php",
					"INCLUDE_TITLE" => GetMessage('SHOP_MAIN_RIGHT_INCLUDE_TITLE')
				),
				false
			);?>

		</div>
		<div class="clear"></div>
	</div>

	<?$APPLICATION->IncludeComponent(
		"bitrix:catalog.brandblock",
		"brand_slider",
		array(
			"IBLOCK_TYPE" => "catalog",
			"IBLOCK_ID" => "#PRODUCT_IBLOCK_ID#",
			"ELEMENT_ID" => $_REQUEST["ELEMENT_ID"],
			"ELEMENT_CODE" => $_REQUEST["ELEMENT_CODE"],
			"PROP_CODE" => "MANUFACTURER",
			"WIDTH" => "150",
			"HEIGHT" => "80",
			"WIDTH_SMALL" => "150",
			"HEIGHT_SMALL" => "80",
			"CACHE_TYPE" => "N",
			"CACHE_TIME" => "3600",
			"CACHE_GROUPS" => "Y"
		),
		false
	);?>
<?endif?>
<? if (
	substr_count($APPLICATION->GetCurDir(), SITE_DIR.'catalog/')<=0
	&& substr_count($APPLICATION->GetCurDir(), SITE_DIR.'brands/')<=0): ?>
	</div>
<? endif; ?>


<?if(!CSite::InDir('/index.php') && CModule::IncludeModule('catalog')):?>
	<div class="container">
	<?
	$basketUserId = (int)CSaleBasket::GetBasketUserID(false);
	$siteId = Bitrix\Main\Application::getInstance()->getContext()->getSite();
	$viewedIterator = Bitrix\Catalog\CatalogViewedProductTable::GetList(array(
		'select' => array('PRODUCT_ID', 'ELEMENT_ID'),
		'filter' => array('FUSER_ID' => $basketUserId, 'SITE_ID' => $siteId, '!PRODUCT_ID' => $GLOBALS["CURRENT_ELEMENT_ID"]),
		'order' => array('DATE_VISIT' => 'DESC'),
		'limit' => 5
	));

	$viewedProductIds = array();
	while ($viewedProduct = $viewedIterator->fetch())
		$viewedProductIds[] = $viewedProduct["PRODUCT_ID"];
	?>
		<?if($viewedProductIds):
			global $viewedFilter;
			$viewedFilter = array(
				"ID" => $viewedProductIds
			);
			?>
			<div class="clear"></div>
			<h3><?=GetMessage('VIEWED_GOODS')?></h3>
			<?$APPLICATION->IncludeComponent(
				"bitrix:catalog.section",
				"",
				Array(
					"IBLOCK_TYPE" => "catalog",
					"IBLOCK_ID" => "6",
					"SECTION_ID" => "",
					"SECTION_CODE" => "",
					"SECTION_USER_FIELDS" => array("", "undefined", ""),
					"ELEMENT_SORT_FIELD" => "sort",
					"ELEMENT_SORT_ORDER" => "asc",
					"ELEMENT_SORT_FIELD2" => "id",
					"ELEMENT_SORT_ORDER2" => "desc",
					"FILTER_NAME" => "viewedFilter",
					"INCLUDE_SUBSECTIONS" => "Y",
					"SHOW_ALL_WO_SECTION" => "Y",
					"HIDE_NOT_AVAILABLE" => "N",
					"PAGE_ELEMENT_COUNT" => "5",
					"LINE_ELEMENT_COUNT" => "5",
					"PROPERTY_CODE" => array("MATERIAL", "undefined", ""),
					"OFFERS_LIMIT" => "5",
					"PRODUCT_SUBSCRIPTION" => "N",
					"SHOW_DISCOUNT_PERCENT" => "N",
					"SHOW_OLD_PRICE" => "N",
					"MESS_BTN_BUY" => GetMessage('BUY'),
					"MESS_BTN_ADD_TO_BASKET" => GetMessage('TO_BASKET'),
					"MESS_BTN_SUBSCRIBE" => GetMessage('SUBSCRIBE'),
					"MESS_BTN_DETAIL" => GetMessage('MORE_INFO'),
					"MESS_NOT_AVAILABLE" => GetMessage('NO_AVAIL'),
					"COMPARE_SCROLL_UP" => "N",
					"SECTION_URL" => "",
					"DETAIL_URL" => "",
					"SECTION_ID_VARIABLE" => "SECTION_ID",
					"AJAX_MODE" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"AJAX_OPTION_HISTORY" => "N",
					"CACHE_TYPE" => "A",
					"CACHE_TIME" => "300",
					"CACHE_GROUPS" => "N",
					"SET_TITLE" => "N",
					"SET_BROWSER_TITLE" => "N",
					"BROWSER_TITLE" => "-",
					"SET_META_KEYWORDS" => "N",
					"META_KEYWORDS" => "-",
					"SET_META_DESCRIPTION" => "N",
					"META_DESCRIPTION" => "-",
					"ADD_SECTIONS_CHAIN" => "N",
					"SET_STATUS_404" => "N",
					"CACHE_FILTER" => "Y",
					"ACTION_VARIABLE" => "action",
					"PRODUCT_ID_VARIABLE" => "id",
					"PRICE_CODE" => array("BASE"),
					"USE_PRICE_COUNT" => "N",
					"SHOW_PRICE_COUNT" => "1",
					"PRICE_VAT_INCLUDE" => "Y",
					"CONVERT_CURRENCY" => "N",
					"BASKET_URL" => "/personal/basket/",
					"USE_PRODUCT_QUANTITY" => "N",
					"ADD_PROPERTIES_TO_BASKET" => "Y",
					"PRODUCT_PROPS_VARIABLE" => "prop",
					"PARTIAL_PRODUCT_PROPERTIES" => "N",
					"PRODUCT_PROPERTIES" => array(),
					"DISPLAY_COMPARE" => "N",
					"PAGER_TEMPLATE" => ".default",
					"DISPLAY_TOP_PAGER" => "N",
					"DISPLAY_BOTTOM_PAGER" => "N",
					"PAGER_TITLE" => GetMessage('GOODS'),
					"PAGER_SHOW_ALWAYS" => "N",
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL" => "N",
					"OFFERS_FIELD_CODE" => array("", "undefined", ""),
					"OFFERS_PROPERTY_CODE" => array("", "undefined", ""),
					"OFFERS_SORT_FIELD" => "sort",
					"OFFERS_SORT_ORDER" => "asc",
					"OFFERS_SORT_FIELD2" => "id",
					"OFFERS_SORT_ORDER2" => "desc",
					"PRODUCT_DISPLAY_MODE" => "N",
					"ADD_PICT_PROP" => "-",
					"LABEL_PROP" => "-",
					"OFFERS_CART_PROPERTIES" => array("VOLUME", "COLOR"),
					"COMPARE_PATH" => ""
				)
			);?>
		<?endif;?>
	</div>
	<br/>
<?endif;?>
</div>

<?
$BannerTemplate = 'full-static';
$BannerActive = "Y";
$element_type = $TopShopSettings["bottom_banner_type"];

if ($element_type == "DISABLE") $BannerActive = "N";
if ($element_type == "RESPONSIVE") $BannerTemplate = "full-responsive";

?>
<?$APPLICATION->IncludeComponent("alexkova.emarket:admanager", $BannerTemplate, array(
		"SHOW" => "BOTTOM",
		"BANTYPE" => "BOTTOM",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "0",
		"USE_IN_LG_MODE" => "Y",
		"USE_IN_MD_MODE" => "Y",
		"USE_IN_SM_MODE" => "Y",
		"USE_IN_XS_MODE" => "N"
	),
	false,
	array(
		"ACTIVE_COMPONENT" => $BannerActive
	)
);
?><div class="clear"></div>

<?if ($APPLICATION->GetCurPage(true) != SITE_DIR.'index.php'):?>

<?endif;?>


<div class="wrapper " id="footer">
	<div class="footer-hr"></div>
	<div class="container head sm-hide xs-hide">
		<div class="span_2_of_5">
			<?=GetMessage('ABOUT_SHOP_CATALOG')?>
		</div>
		<div class="span_2_of_5">
			<?=GetMessage('ABOUT_SHOP')?>
		</div>
		<div class="span_1_of_5">
			<a href="<?=SITE_DIR?>company/info/" class="footer_payment_icon"></a>
		</div>
		<div class="clear"></div>
	</div>
	<div class="footer-hr"></div>
	<div class="container">
		<?
		$APPLICATION->IncludeComponent(
			"bitrix:menu",
			"footer_cols",
			Array(
				"ROOT_MENU_TYPE"           => "bottom_catalog",
				"MAX_LEVEL"                => "1",
				"CHILD_MENU_TYPE"          => "left",
				"USE_EXT"                  => "Y",
				"DELAY"                    => "N",
				"ALLOW_MULTI_SELECT"       => "N",
				"MENU_CACHE_TYPE"          => "N",
				"MENU_CACHE_TIME"          => "3600",
				"MENU_CACHE_USE_GROUPS"    => "Y",
				"MENU_CACHE_GET_VARS"      => "",
				"TITLE"					   => GetMessage('FOOTER_MENU_CATALOG_TITLE'),
				"COLS"						=> "2",
			),
			false,
			array('HIDE_ICONS'=>"Y")
		);
		?>
		<?
		$APPLICATION->IncludeComponent(
			"bitrix:menu",
			"footer_cols",
			Array(
				"ROOT_MENU_TYPE"           => "bottom",
				"MAX_LEVEL"                => "1",
				"CHILD_MENU_TYPE"          => "left",
				"USE_EXT"                  => "N",
				"DELAY"                    => "N",
				"ALLOW_MULTI_SELECT"       => "N",
				"MENU_CACHE_TYPE"          => "N",
				"MENU_CACHE_TIME"          => "3600",
				"MENU_CACHE_USE_GROUPS"    => "Y",
				"MENU_CACHE_GET_VARS"      => "",
				"TITLE"					   => GetMessage('FOOTER_MENU_ABOUT_TITLE'),
				"COLS"						=> "2",
			)
		);
		?>
		<div class="span_1_of_5 xs-span_5_of_5 sm-span_5_of_5">
			<div class="include-right phone-area">
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
			<div class="footer_social_icon">
				<ul>
					<li class="fb"><?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/socnet_facebook.php"), false);?></li>
					<li class="tw"><?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/socnet_twitter.php"), false);?></li>
					<li class="gp"><?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/socnet_google.php"), false);?></li>
					<li class="vk"><?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/socnet_vk.php"), false);?></li>
				</ul>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="footer-hr"></div>
	<div class="footer-copyrights">
		<?$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"",
			Array(
				"AREA_FILE_SHOW" => "file",
				"AREA_FILE_SUFFIX" => "inc",
				"EDIT_TEMPLATE" => "",
				"PATH" => SITE_DIR."include/copyrights.php"
			)
		);?>
	</div>
</div>
</body>

<script>
	$(document).ready(function () {
		eMarket.phoneTitle = '<?=GetMessage('CALL_ME_PLEASE')?>';
		eMarket.phoneButtonUrl = '<?=SITE_DIR?>';
		eMarket.oneClickTitle = '<?=GetMessage('ONE_CLICK_FORM')?>';
		eMarket.oneClickUrl = '<?=SITE_DIR?>';
	});
</script>

</html>