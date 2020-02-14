<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$this->setFrameMode(true);
?>
	<div class="top-menu-mobile sm-hide">
		<div class="top-menu-mobile-line">
                    <a href="/">
			<span class="lg-hide md-hide mobile-menu-title">
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "inc",
						"EDIT_TEMPLATE" => "",
						"PATH" => "/mobile.menu.title.php"
					),
					false
				);?>
			</span>
                    </a>
			<div class='mobile-menu-button lg-hide md-hide sm-hide' id="nav-search"><input type="button" value=" "></div>
			<div class='mobile-menu-button lg-hide md-hide sm-hide' id="nav-bar"><input type="button" value=" "></div>
		</div>
		<ul id="mobile-menu">
			<li class="mobile-menu-catalog lg-hide md-hide"><a href="javascript:void(0)" ><?=GetMessage('EMARKET_MENU_CATALOG')?></a></li>
			<?if (!empty($arResult)):?>
				<?foreach($arResult as $arItem):?>
					<li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
				<?endforeach;?>
			<?endif;?>
		</ul>
	</div>
	<div class="clear"></div>