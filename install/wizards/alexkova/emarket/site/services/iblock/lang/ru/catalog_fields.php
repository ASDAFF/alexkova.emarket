<?
$MESS["CATALOG_IBLOCK"] = array(
	"IBLOCK_TYPE_ID" => 'catalog',
	"CODE" => "catalog",
	"NAME" => "Товары",
	"ACTIVE" => "Y",
	"SORT" => 100,
	"LIST_PAGE_URL" => "#SITE_DIR#/catalog/",
	"DETAIL_PAGE_URL" => "#SITE_DIR#/catalog/#SECTION_CODE#/#ELEMENT_CODE#/",
	"SECTION_PAGE_URL" => "#SITE_DIR#/catalog/#SECTION_CODE#/",
	"DESCRIPTION" => "emarket_catalog",
	"DESCRIPTION_TYPE" => "html",
	"RSS_TTL" => "24",
	"RSS_ACTIVE" => "Y",
	"RSS_FILE_ACTIVE" => "N",
	"RSS_FILE_LIMIT" =>"",
	"RSS_FILE_DAYS" =>"",
	"RSS_YANDEX_ACTIVE" => "N",
	"INDEX_ELEMENT" => "Y",
	"INDEX_SECTION" => "Y",
	"WORKFLOW" => "N",
	"BIZPROC" => "N",
	"SECTION_CHOOSER" => "L",
	"LIST_MODE" =>"",
	"RIGHTS_MODE" => "S",
	"SECTION_PROPERTY" => "Y",
	"VERSION" => "2",
	"LAST_CONV_ELEMENT" => "0",
	"SECTIONS_NAME" => "Разделы",
	"SECTION_NAME" => "Раздел",
	"ELEMENTS_NAME" => "Элементы",
	"ELEMENT_NAME" => "Элемент"
);

$MESS["CATALOG_FIELDS"] = array (
	'IBLOCK_SECTION' =>
		array (
			'NAME' => 'Привязка к разделам',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'ACTIVE' =>
		array (
			'NAME' => 'Активность',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'Y',
		),
	'ACTIVE_FROM' =>
		array (
			'NAME' => 'Начало активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'ACTIVE_TO' =>
		array (
			'NAME' => 'Окончание активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SORT' =>
		array (
			'NAME' => 'Сортировка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '0',
		),
	'NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'PREVIEW_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'PREVIEW_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип описания для анонса',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'PREVIEW_TEXT' =>
		array (
			'NAME' => 'Описание для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'DETAIL_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип детального описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'DETAIL_TEXT' =>
		array (
			'NAME' => 'Детальное описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'N',
					'TRANSLITERATION' => 'Y',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'TAGS' =>
		array (
			'NAME' => 'Теги',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_DESCRIPTION_TYPE' =>
		array (
			'NAME' => 'Тип описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'SECTION_DESCRIPTION' =>
		array (
			'NAME' => 'Описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'Y',
					'TRANSLITERATION' => 'Y',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'LOG_SECTION_ADD' =>
		array (
			'NAME' => 'LOG_SECTION_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_EDIT' =>
		array (
			'NAME' => 'LOG_SECTION_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_DELETE' =>
		array (
			'NAME' => 'LOG_SECTION_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_ADD' =>
		array (
			'NAME' => 'LOG_ELEMENT_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_EDIT' =>
		array (
			'NAME' => 'LOG_ELEMENT_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_DELETE' =>
		array (
			'NAME' => 'LOG_ELEMENT_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'XML_IMPORT_START_TIME' =>
		array (
			'NAME' => 'XML_IMPORT_START_TIME',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '2014-09-12 14:13:56',
			'VISIBLE' => 'N',
		),
);

$MESS["OFFER_IBLOCK"] = array (
	'IBLOCK_TYPE_ID' => 'offers',
	'CODE' => 'offers',
	'NAME' => 'Предложения',
	'ACTIVE' => 'Y',
	'SORT' => '200',
	'LIST_PAGE_URL' => '#SITE_DIR#/offers/index.php?ID=#IBLOCK_ID#',
	'DETAIL_PAGE_URL' => '#SITE_DIR#/offers/detail.php?ID=#ELEMENT_ID#',
	'SECTION_PAGE_URL' => NULL,
	'PICTURE' => NULL,
	'DESCRIPTION' => '',
	'DESCRIPTION_TYPE' => 'text',
	'RSS_TTL' => '24',
	'RSS_ACTIVE' => 'Y',
	'RSS_FILE_ACTIVE' => 'N',
	'RSS_FILE_LIMIT' => NULL,
	'RSS_FILE_DAYS' => NULL,
	'RSS_YANDEX_ACTIVE' => 'N',
	'XML_ID' => '2',
	'TMP_ID' => NULL,
	'INDEX_ELEMENT' => 'N',
	'INDEX_SECTION' => 'N',
	'WORKFLOW' => 'N',
	'BIZPROC' => 'N',
	'SECTION_CHOOSER' => 'L',
	'LIST_MODE' => '',
	'RIGHTS_MODE' => 'S',
	'SECTION_PROPERTY' => 'Y',
	'VERSION' => '2',
	'LAST_CONV_ELEMENT' => '0',
	'SOCNET_GROUP_ID' => NULL,
	'EDIT_FILE_BEFORE' => '',
	'EDIT_FILE_AFTER' => '',
	'SECTIONS_NAME' => NULL,
	'SECTION_NAME' => NULL,
	'ELEMENTS_NAME' => 'Элементы',
	'ELEMENT_NAME' => 'Элемент',
);


$MESS["OFFER_FIELDS"] = array (
	'IBLOCK_SECTION' =>
		array (
			'NAME' => 'Привязка к разделам',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'ACTIVE' =>
		array (
			'NAME' => 'Активность',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'Y',
		),
	'ACTIVE_FROM' =>
		array (
			'NAME' => 'Начало активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'ACTIVE_TO' =>
		array (
			'NAME' => 'Окончание активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SORT' =>
		array (
			'NAME' => 'Сортировка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '0',
		),
	'NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'PREVIEW_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'PREVIEW_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип описания для анонса',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'PREVIEW_TEXT' =>
		array (
			'NAME' => 'Описание для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'DETAIL_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип детального описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'DETAIL_TEXT' =>
		array (
			'NAME' => 'Детальное описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'N',
					'TRANSLITERATION' => 'N',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'TAGS' =>
		array (
			'NAME' => 'Теги',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_DESCRIPTION_TYPE' =>
		array (
			'NAME' => 'Тип описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'SECTION_DESCRIPTION' =>
		array (
			'NAME' => 'Описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'N',
					'TRANSLITERATION' => 'N',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'LOG_SECTION_ADD' =>
		array (
			'NAME' => 'LOG_SECTION_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_EDIT' =>
		array (
			'NAME' => 'LOG_SECTION_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_DELETE' =>
		array (
			'NAME' => 'LOG_SECTION_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_ADD' =>
		array (
			'NAME' => 'LOG_ELEMENT_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_EDIT' =>
		array (
			'NAME' => 'LOG_ELEMENT_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_DELETE' =>
		array (
			'NAME' => 'LOG_ELEMENT_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'XML_IMPORT_START_TIME' =>
		array (
			'NAME' => 'XML_IMPORT_START_TIME',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
			'VISIBLE' => 'N',
		),
) ;
?>
