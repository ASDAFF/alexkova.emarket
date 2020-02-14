<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

if (!defined("WIZARD_SITE_ID"))
	return;

if (!defined("WIZARD_SITE_DIR"))
	return;

//require_once 'banners.php';

///////////// описание площадок и баннеров
$wizIDS = WIZARD_SITE_ID;
if (substr_count(WIZARD_SITE_ID, 'site_')>0)
{
    $wizIDS = str_replace('site_', '', WIZARD_SITE_ID);
}


global $USER;
$bannersPath = WIZARD_ABSOLUTE_PATH."/include/banners/";

//список типов(примеры баннеров ниже)
$arBanTypes = array(
		"TOP" => array(
		"ACTIVE" => "Y",
		"NAME"=> GetMessage('BANTYPE_EMARKET_TOP_NAME'),
		"DESCRIPTION" => GetMessage('BANTYPE_EMARKET_TOP_DESC'),
		"SORT" => 100,
		"ITEMS" => array()
	),
        "BOTTOM" => array(
		"ACTIVE" => "Y",
		"NAME"=> GetMessage('BANTYPE_EMARKET_BOTTOM_NAME'),
		"DESCRIPTION" => GetMessage('BANTYPE_EMARKET_BOTTOM_DESC'),
		"SORT" => 100,
		"ITEMS" => array()
	),
        "COLUMN" => array(
		"ACTIVE" => "Y",
		"NAME"=> GetMessage('BANTYPE_EMARKET_COLUMN_NAME'),
		"DESCRIPTION" => GetMessage('BANTYPE_EMARKET_COLUMN_DESC'),
		"SORT" => 100,
		"ITEMS" => array()
	),
        "CATALOG_TOP_INNER" => array(
		"ACTIVE" => "Y",
		"NAME"=> GetMessage('BANTYPE_EMARKET_CATALOG_INNER_TOP_NAME'),
		"DESCRIPTION" => GetMessage('BANTYPE_EMARKET_CATALOG_INNER_TOP_DESC'),
		"SORT" => 100,
		"ITEMS" => array()
	),
	"CATALOG_BOTTOM_INNER" => array(
		"ACTIVE" => "Y",
		"NAME"=> GetMessage('BANTYPE_EMARKET_CATALOG_INNER_BOTTOM_NAME'),
		"DESCRIPTION" => GetMessage('BANTYPE_EMARKET_CATALOG_INNER_BOTTOM_DESC'),
		"SORT" => 100,
		"ITEMS" => array()
	),
);


/** верхние баннеры **/
$arBanTypes["TOP"]["ITEMS"][] = array(
		"NAME" => GetMessage('BANNER_TOP_1_NAME'),
		"ACTIVE" => "Y",
		"PATH" => $bannersPath.'top/advertising.jpg',
		"SID" => serialize(array($wizIDS=>'Y')),
		"SHOW_TYPE" => 'image',
		"WEIGHT" => 100,
		"URL" => '',
		"MODIFIED_BY" => $USER->GetID(),
		"INFO" => array(
			"TARGET" => '_blank',
			"TITLE" => GetMessage('BANNER_TOP_1_NAME'),
			"INC_SHOW_COUNT" => 'Y',
			"INC_CLICK_COUNT" => 'Y',
			"BANNER_REDIRECT" => 'Y',
			"BANNER_USHOW" => 'Y',
			"BANNER_USHOW_TYPE" => 'C',
			"BANNER_USHOW_COOKIE_TIME" => 3600
		),
		"SHOW_FIRST" => time()
);

$arBanTypes["TOP"]["ITEMS"][] = array(
	"NAME" => GetMessage('BANNER_TOP_2_NAME'),
	"ACTIVE" => "Y",
	"PATH" => $bannersPath.'top/ecommerce.jpg',
	"SID" => serialize(array($wizIDS=>'Y')),
	"SHOW_TYPE" => 'image',
	"WEIGHT" => 100,
	"URL" => '',
	"MODIFIED_BY" => $USER->GetID(),
	"INFO" => array(
		"TARGET" => '_blank',
		"TITLE" => GetMessage('BANNER_TOP_2_NAME'),
		"INC_SHOW_COUNT" => 'Y',
		"INC_CLICK_COUNT" => 'Y',
		"BANNER_REDIRECT" => 'Y',
		"BANNER_USHOW" => 'Y',
		"BANNER_USHOW_TYPE" => 'C',
		"BANNER_USHOW_COOKIE_TIME" => 3600
	),
	"SHOW_FIRST" => time()
);

$arBanTypes["TOP"]["ITEMS"][] = array(
	"NAME" => GetMessage('BANNER_TOP_3_NAME'),
	"ACTIVE" => "Y",
	"PATH" => $bannersPath.'top/live.jpg',
	"SID" => serialize(array($wizIDS=>'Y')),
	"SHOW_TYPE" => 'image',
	"WEIGHT" => 1000,
	"URL" => '',
	"MODIFIED_BY" => $USER->GetID(),
	"INFO" => array(
		"TARGET" => '_blank',
		"TITLE" => GetMessage('BANNER_TOP_3_NAME'),
		"INC_SHOW_COUNT" => 'Y',
		"INC_CLICK_COUNT" => 'Y',
		"BANNER_REDIRECT" => 'Y',
		"BANNER_USHOW" => 'Y',
		"BANNER_USHOW_TYPE" => 'C',
		"BANNER_USHOW_COOKIE_TIME" => 3600
	),
	"SHOW_FIRST" => time()
);

$arBanTypes["TOP"]["ITEMS"][] = array(
	"NAME" => GetMessage('BANNER_TOP_4_NAME'),
	"ACTIVE" => "Y",
	"PATH" => $bannersPath.'top/thebest.jpg',
	"SID" => serialize(array($wizIDS=>'Y')),
	"SHOW_TYPE" => 'image',
	"WEIGHT" => 1000,
	"URL" => '',
	"MODIFIED_BY" => $USER->GetID(),
	"INFO" => array(
		"TARGET" => '_blank',
		"TITLE" => GetMessage('BANNER_TOP_4_NAME'),
		"INC_SHOW_COUNT" => 'Y',
		"INC_CLICK_COUNT" => 'Y',
		"BANNER_REDIRECT" => 'Y',
		"BANNER_USHOW" => 'Y',
		"BANNER_USHOW_TYPE" => 'C',
		"BANNER_USHOW_COOKIE_TIME" => 3600
	),
	"SHOW_FIRST" => time()
);

/** нижние баннеры **/

$arBanTypes["BOTTOM"]["ITEMS"][] = array(
	"NAME" => GetMessage('BANNER_TOP_1_NAME'),
	"ACTIVE" => "Y",
	"PATH" => $bannersPath.'bottom/advertising.jpg',
	"SID" => serialize(array($wizIDS=>'Y')),
	"SHOW_TYPE" => 'image',
	"WEIGHT" => 1000,
	"URL" => '',
	"MODIFIED_BY" => $USER->GetID(),
	"INFO" => array(
		"TARGET" => '_blank',
		"TITLE" => GetMessage('BANNER_TOP_1_NAME'),
		"INC_SHOW_COUNT" => 'Y',
		"INC_CLICK_COUNT" => 'Y',
		"BANNER_REDIRECT" => 'Y',
		"BANNER_USHOW" => 'Y',
		"BANNER_USHOW_TYPE" => 'C',
		"BANNER_USHOW_COOKIE_TIME" => 3600
	),
	"SHOW_FIRST" => time()
);

$arBanTypes["BOTTOM"]["ITEMS"][] = array(
	"NAME" => GetMessage('BANNER_TOP_2_NAME'),
	"ACTIVE" => "Y",
	"PATH" => $bannersPath.'bottom/e-commerce.jpg',
	"SID" => serialize(array($wizIDS=>'Y')),
	"SHOW_TYPE" => 'image',
	"WEIGHT" => 1000,
	"URL" => '',
	"MODIFIED_BY" => $USER->GetID(),
	"INFO" => array(
		"TARGET" => '_blank',
		"TITLE" => GetMessage('BANNER_TOP_2_NAME'),
		"INC_SHOW_COUNT" => 'Y',
		"INC_CLICK_COUNT" => 'Y',
		"BANNER_REDIRECT" => 'Y',
		"BANNER_USHOW" => 'Y',
		"BANNER_USHOW_TYPE" => 'C',
		"BANNER_USHOW_COOKIE_TIME" => 3600
	),
	"SHOW_FIRST" => time()
);

$arBanTypes["BOTTOM"]["ITEMS"][] = array(
	"NAME" => GetMessage('BANNER_TOP_3_NAME'),
	"ACTIVE" => "Y",
	"PATH" => $bannersPath.'bottom/live.jpg',
	"SID" => serialize(array($wizIDS=>'Y')),
	"SHOW_TYPE" => 'image',
	"WEIGHT" => 100,
	"URL" => '',
	"MODIFIED_BY" => $USER->GetID(),
	"INFO" => array(
		"TARGET" => '_blank',
		"TITLE" => GetMessage('BANNER_TOP_3_NAME'),
		"INC_SHOW_COUNT" => 'Y',
		"INC_CLICK_COUNT" => 'Y',
		"BANNER_REDIRECT" => 'Y',
		"BANNER_USHOW" => 'Y',
		"BANNER_USHOW_TYPE" => 'C',
		"BANNER_USHOW_COOKIE_TIME" => 3600
	),
	"SHOW_FIRST" => time()
);

$arBanTypes["BOTTOM"]["ITEMS"][] = array(
	"NAME" => GetMessage('BANNER_TOP_4_NAME'),
	"ACTIVE" => "Y",
	"PATH" => $bannersPath.'bottom/thebest.jpg',
	"SID" => serialize(array($wizIDS=>'Y')),
	"SHOW_TYPE" => 'image',
	"WEIGHT" => 100,
	"URL" => '',
	"MODIFIED_BY" => $USER->GetID(),
	"INFO" => array(
		"TARGET" => '_blank',
		"TITLE" => GetMessage('BANNER_TOP_4_NAME'),
		"INC_SHOW_COUNT" => 'Y',
		"INC_CLICK_COUNT" => 'Y',
		"BANNER_REDIRECT" => 'Y',
		"BANNER_USHOW" => 'Y',
		"BANNER_USHOW_TYPE" => 'C',
		"BANNER_USHOW_COOKIE_TIME" => 3600
	),
	"SHOW_FIRST" => time()
);

/**  column_banner ***/

$arBanTypes["COLUMN"]["ITEMS"][] = array(
		"NAME" => GetMessage('BANNER_COLUMN_1_NAME'),
		"ACTIVE" => "Y",
		"PATH" => $bannersPath.'column/iphone_column.jpg',
		"SID" => serialize(array($wizIDS=>'Y')),
		"SHOW_TYPE" => 'image',
		"WEIGHT" => 100,
		"URL" => WIZARD_SITE_DIR.'catalog/smartfony/apple-iphone-6-64gb/',
		"MODIFIED_BY" => $USER->GetID(),
		"INFO" => array(
			"TARGET" => '_self',
			"TITLE" => GetMessage('BANNER_COLUMN_1_NAME'),
			"INC_SHOW_COUNT" => 'Y',
			"INC_CLICK_COUNT" => 'Y',
			"BANNER_REDIRECT" => 'Y',
			"BANNER_USHOW" => 'Y',
			"BANNER_USHOW_TYPE" => 'C',
			"BANNER_USHOW_COOKIE_TIME" => 3600
		),
		"SHOW_FIRST" => time()
);

/**  catalog_top_banner ***/

$arBanTypes["CATALOG_TOP_INNER"]["ITEMS"][] = array(
		"NAME" => GetMessage('BANNER_CATALOG_INNER_TOP_1_NAME'),
		"ACTIVE" => "Y",
		"PATH" => $bannersPath.'catalog/lens_catalog_inner.jpg',
		"SID" => serialize(array($wizIDS=>'Y')),
		"SHOW_TYPE" => 'image',
		"WEIGHT" => 100,
		"URL" => WIZARD_SITE_DIR.'catalog/binokli/nikon-aculon-t01-8x21/',
		"MODIFIED_BY" => $USER->GetID(),
		"INFO" => array(
			"TARGET" => '_self',
			"TITLE" => GetMessage('BANNER_CATALOG_INNER_TOP_1_NAME'),
			"INC_SHOW_COUNT" => 'Y',
			"INC_CLICK_COUNT" => 'Y',
			"BANNER_REDIRECT" => 'Y',
			"BANNER_USHOW" => 'Y',
			"BANNER_USHOW_TYPE" => 'C',
			"BANNER_USHOW_COOKIE_TIME" => 3600
		),
		"SHOW_FIRST" => time()
);

$arBanTypes["CATALOG_TOP_INNER"]["ITEMS"][] = array(
	"NAME" => GetMessage('BANNER_CATALOG_INNER_TOP_2_NAME'),
	"ACTIVE" => "Y",
	"PATH" => $bannersPath.'catalog/video_catalog_inner.jpg',
	"SID" => serialize(array($wizIDS=>'Y')),
	"SHOW_TYPE" => 'image',
	"WEIGHT" => 100,
	"URL" => WIZARD_SITE_DIR.'catalog/videokamery/canon-legria-hf-g30/',
	"MODIFIED_BY" => $USER->GetID(),
	"INFO" => array(
		"TARGET" => '_self',
		"TITLE" => GetMessage('BANNER_CATALOG_INNER_TOP_2_NAME'),
		"INC_SHOW_COUNT" => 'Y',
		"INC_CLICK_COUNT" => 'Y',
		"BANNER_REDIRECT" => 'Y',
		"BANNER_USHOW" => 'Y',
		"BANNER_USHOW_TYPE" => 'C',
		"BANNER_USHOW_COOKIE_TIME" => 3600
	),
	"SHOW_FIRST" => time()
);

/**  catalog_bottom_banner ***/


$arBanTypes["CATALOG_BOTTOM_INNER"]["ITEMS"][] = array(
	"NAME" => GetMessage('BANNER_CATALOG_INNER_TOP_1_NAME'),
	"ACTIVE" => "Y",
	"PATH" => $bannersPath.'catalog/lens_catalog_inner.jpg',
	"SID" => serialize(array($wizIDS=>'Y')),
	"SHOW_TYPE" => 'image',
	"WEIGHT" => 100,
	"URL" => WIZARD_SITE_DIR.'catalog/binokli/nikon-aculon-t01-8x21/',
	"MODIFIED_BY" => $USER->GetID(),
	"INFO" => array(
		"TARGET" => '_self',
		"TITLE" => GetMessage('BANNER_CATALOG_INNER_TOP_1_NAME'),
		"INC_SHOW_COUNT" => 'Y',
		"INC_CLICK_COUNT" => 'Y',
		"BANNER_REDIRECT" => 'Y',
		"BANNER_USHOW" => 'Y',
		"BANNER_USHOW_TYPE" => 'C',
		"BANNER_USHOW_COOKIE_TIME" => 3600
	),
	"SHOW_FIRST" => time()
);

$arBanTypes["CATALOG_BOTTOM_INNER"]["ITEMS"][] = array(
	"NAME" => GetMessage('BANNER_CATALOG_INNER_TOP_2_NAME'),
	"ACTIVE" => "Y",
	"PATH" => $bannersPath.'catalog/video_catalog_inner.jpg',
	"SID" => serialize(array($wizIDS=>'Y')),
	"SHOW_TYPE" => 'image',
	"WEIGHT" => 100,
	"URL" => WIZARD_SITE_DIR.'catalog/videokamery/canon-legria-hf-g30/',
	"MODIFIED_BY" => $USER->GetID(),
	"INFO" => array(
		"TARGET" => '_self',
		"TITLE" => GetMessage('BANNER_CATALOG_INNER_TOP_2_NAME'),
		"INC_SHOW_COUNT" => 'Y',
		"INC_CLICK_COUNT" => 'Y',
		"BANNER_REDIRECT" => 'Y',
		"BANNER_USHOW" => 'Y',
		"BANNER_USHOW_TYPE" => 'C',
		"BANNER_USHOW_COOKIE_TIME" => 3600
	),
	"SHOW_FIRST" => time()
);

$arWeekday = Array(
	"SUNDAY" => Array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23),
	"MONDAY" => Array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23),
	"TUESDAY" => Array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23),
	"WEDNESDAY" => Array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23),
	"THURSDAY" => Array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23),
	"FRIDAY" => Array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23),
	"SATURDAY" => Array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23)
);
$newContractName = "MultimagDefault";
$arContractFields = array(
	"ACTIVE" => 'Y',
    "NAME" => $newContractName,
    "DESCRIPTION" => '',
    "KEYWORDS" => '',
    "ADMIN_COMMENTS" => '',
    "WEIGHT" => 100,
    "SORT" => 10,
    "DEFAULT_STATUS_SID" => 'PUBLISHED',
    "arrSHOW_PAGE" => Array(),
    "arrNOT_SHOW_PAGE" => Array(),
    "arrTYPE" => Array('ALL'),
    "arrWEEKDAY" => $arWeekday,
    "arrUSER_VIEW" => '',
    "arrUSER_ADD" => '',
    "arrUSER_EDIT" => '',
    "arrSITE" => Array(WIZARD_SITE_ID)
);

$contractCreated = false;
foreach ($arBanTypes as $typeCode => $arType) {
	$arFields = array(
		"ACTIVE"			=> $arType["ACTIVE"],
		"SORT"				=> $arType["SORT"],
		"NAME"				=> $arType["NAME"],
		"DESCRIPTION"		=> $arType["DESCRIPTION"]
	);
    if(CModule::IncludeModule('advertising')){

		//create new contract if not created yet and not exists
//		if(!$contractCreated){
//			$dbResult = CAdvContract::GetList($b,$o,array("NAME"=>$newContractName));
//			if (!$arContract = $dbResult->Fetch()){
//				$contractId = CAdvContract::Set($arContractFields,"","N");
//				$contractCreated = true;
//			}else{
//
//                            $contractId = $arContract["ID"];
//                            CAdvContract::Set($arContractFields,$contractId,"N");
//			}
//		}

		//create banner type if not exist
		$rsCheck = CAdvType::GetByID($typeCode);


		if($rsCheck && $arTypeFromDB = $rsCheck->Fetch()){
			$banTypeId = $arTypeFromDB["SID"];
		}else{
			$arFields["SID"] = $typeCode;
			$banTypeId = CAdvType::Set($arFields,"","N");
		}

		if($banTypeId && $contractId){
			foreach ($arType["ITEMS"] as $arBanner) {
				$arFields = array(
					"CONTRACT_ID" => $contractId,
					"TYPE_SID" => $banTypeId,
					"STATUS_SID" => 'PUBLISHED',
					"NAME" => $arBanner["NAME"],
					"ACTIVE" => $arBanner["ACTIVE"],
					"WEIGHT" => $arBanner["WEIGHT"],
					"FIX_CLICK" => 'Y',
					"FIX_SHOW" => 'N',
					"FLYUNIFORM" => 'N',
					"IMAGE_ALT" => $arBanner["INFO"]["TITLE"],
					"URL" => $arBanner["URL"],
					"URL_TARGET" => $arBanner["INFO"]["TARGET"],
					"STAT_EVENT_1" => 'banner',
					"STAT_EVENT_2" => 'click',
					"STAT_EVENT_3" => '#CONTRACT_ID# / "#BANNER_ID#" "#TYPE_SID#" #BANNER_NAME#',
					"SHOW_USER_GROUP" => 'N',
					"arrSHOW_PAGE" => Array(),
					"arrNOT_SHOW_PAGE" => Array(),
					"arrWEEKDAY" => $arWeekday,
					"arrSITE" => Array(WIZARD_SITE_ID),
					"SEND_EMAIL" => 'Y',
					"AD_TYPE" => $arBanner["SHOW_TYPE"],
					"arrCOUNTRY" => Array(),
					"STAT_TYPE" => 'COUNTRY',
					"FLASH_JS" => 'N'
				);
                                
                                $arFields["arrIMAGE_ID"] = CFile::MakeFileArray($arBanner["PATH"]);
                                $arFields["arrIMAGE_ID"]["MODULE_ID"] = 'advertising';

				if($arBanner["SHOW_TYPE"] == "flash"){
					$arFields["NO_URL_IN_FLASH"] = $arBanner["FLASH_LINK"] == "Y"?"Y":"N";
					$arFields["FLASH_TRANSPARENT"] = $arBanner["FLASH_TRANSPARENT"];
				}
                                //echo "22<pre>"; print_r($arFields["arrIMAGE_ID"]);echo "</pre>";
                                //echo "22<pre>"; print_r($arBanner["PATH"]);echo "</pre>";
                                
				CAdvBanner::Set($arFields,"","N");
                                //echo "22<pre>"; print_r($arBanner["PATH"]);echo "</pre>";die();
			}
		}
		//banner create


	}elseif(CModule::IncludeModule('alexkova.rklite'))
            {

		$obRklite = new CKuznica_rklite();
		//check if this bantype already exists
		$rsCheck = $obRklite->GetTypeList(array(),array('CODE'=>$typeCode));
		if($arTypeFromDB = $rsCheck->Fetch()){
			$banTypeId = $arTypeFromDB["ID"];
		}else{//if bantype not exists, create it
			$arFields["CODE"] = $typeCode;
			$banTypeId =  $obRklite->AddType($arFields);
		}
                
                //echo "22<pre>"; print_r($arFields);echo "</pre>";die();
                
		if($banTypeId>0){
			foreach($arType["ITEMS"] as $arBanner){
				$arBannerFields = $arBanner;
				$arBannerFields["BANTYPE"] = $banTypeId;
				//$image = CFile::MakeFileArray($arBanner["PATH"]);
				//$arBannerFields["IMAGE_ID"] = $image["ID"];
				$arBannerFields["IMAGE_ID"] = CFile::MakeFileArray($arBanner["PATH"]);
				unset($arBannerFields["PATH"]);
				unset($arBannerFields["FLASH_LINK"]);
                                
                                //echo "22<pre>"; print_r($arBannerFields);echo "</pre>";die();
                                
				$bannerId = $obRklite->Add($arBannerFields);
			}
		}
	}
        //echo "22<pre>"; print_r($arBanTypes["MULTIMAG_TOP"]["ITEMS"]);echo "</pre>";die();
}

COption::SetOptionString("alexkova.emarket", 'top_banner_type', 'FIXED');
COption::SetOptionString("alexkova.emarket", 'bottom_banner_type', 'FIXED');
COption::SetOptionString("alexkova.emarket", 'column_banner_type', 'RESPONSIVE');
COption::SetOptionString("alexkova.emarket", 'catalog_top_banner_type', 'FIXED');
COption::SetOptionString("alexkova.emarket", 'catalog_bottom_banner_type', 'FIXED');

COption::SetOptionString("alexkova.emarket", 'slider_type', 'TYPE_1');
COption::SetOptionString("alexkova.emarket", 'slider_type_mode', 'TYPE_1');


?>