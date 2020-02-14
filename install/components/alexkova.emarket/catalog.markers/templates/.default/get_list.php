<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$this->setFrameMode(true);
?>
<?if (is_array($_SESSION["MARKERS_SETTINGS"]) && !empty($_SESSION["MARKERS_SETTINGS"])):?>

	<?if (isset($_REQUEST["MARK"])){

		$arFilter = array();

		switch (strval($_REQUEST["MARK"])){

			case 'RECOMMENDED':
				$arFilter = array("!PROPERTY_RECOMMENDED"=>false);
			break;

			case 'NEWPRODUCT':
				$arFilter = array("!PROPERTY_NEWPRODUCT"=>false);
				break;

			case 'SPECIALOFFER':
				$arFilter = array("!PROPERTY_SPECIALOFFER"=>false);
				break;

			case 'SALELEADER':
				$arFilter = array("!PROPERTY_SALELEADER"=>false);
				break;

			default: ;
		}

		if (is_array($arFilter) && !empty($arFilter)){
			global $arrFilter;
			$arrFilter = $arFilter;
                        $arParams["OFFERS_PROPERTY_CODE"] = array("CML2_LINK");
			$APPLICATION->IncludeComponent(
				"bitrix:catalog.section",
				"marker_slider",
				$arParams,
				false,
				array('HIDE_ICONS' => 'Y')
			);
		}
	}?>

<?endif;?>