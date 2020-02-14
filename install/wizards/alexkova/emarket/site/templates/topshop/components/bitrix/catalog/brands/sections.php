<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
//echo "<pre>"; print_r($arResult["VARIABLES"]); echo "</pre>";
//echo "<pre>"; print_r($arParams); echo "</pre>";
?>


<div class="container-full">

	<div class="span_1_of_5 sm-span_1_of_5 xs-hide">
		<?$APPLICATION->IncludeComponent(
			"alexkova.emarket:admanager",
			"full-responsive",
			array(
				"SHOW" => "COLUMN",
				"BANTYPE" => "COLUMN",
				"CACHE_TYPE" => "A",
				"CACHE_TIME" => "0",
				"USE_IN_LG_MODE" => "Y",
				"USE_IN_MD_MODE" => "Y",
				"USE_IN_SM_MODE" => "Y",
				"USE_IN_XS_MODE" => "N"
			),
			false
		);?>
		<br />

	</div>


	<div class="span_4_of_5 sm-span_4_of_5 xs-span_5_of_5">
		<div class="span_5_of_5"><h1><?$APPLICATION->ShowTitle('h1')?></h1></div>

		<div class="span_5_of_5">


			<?
			if (isset($arResult["VARIABLES"]["SECTION_CODE"]) && strlen($arResult["VARIABLES"]["SECTION_CODE"])>0){
			global $arrFilter;
			$arrFilter["PROPERTY_MANUFACTURER"] = strval($arResult["VARIABLES"]["SECTION_CODE"]);

				echo "Set Concretical Pro";
			}


			?>

				<?$APPLICATION->IncludeComponent(
				"bitrix:catalog.brandblock",
				"brandpage",
				array(
					"IBLOCK_TYPE" => "catalog",
					"IBLOCK_ID" => $arParams["IBLOCK_ID"],
					"ELEMENT_ID" => $arResult["ELEMENT_ID"],
					"ELEMENT_CODE" => $arResult["ELEMENT_CODE"],
					"PROP_CODE" => "MANUFACTURER",
					"WIDTH" => "150",
					"HEIGHT" => "80",
					"WIDTH_SMALL" => "150",
					"HEIGHT_SMALL" => "80",
					"CACHE_TYPE" => "N",
					"CACHE_TIME" => "3600",
					"CACHE_GROUPS" => "Y"
				),
				$component,
				array('HIDE_ICONS'=>"Y")
);?>
		</div>

	</div>

	<div class="clear"></div>

</div>
