<?
$MESS[emarket_news_FIELDS] = array (
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
			'DEFAULT_VALUE' => NULL,
			'VISIBLE' => 'N',
		),
);

$MESS[emarket_news_DATA] = array (
	'TIMESTAMP_X' => '03.12.2014 14:12:49',
	'IBLOCK_TYPE_ID' => 'content',
	'CODE' => 'emarket_news',
	'NAME' => 'Новости',
	'ACTIVE' => 'Y',
	'SORT' => '500',
	'LIST_PAGE_URL' => '#SITE_DIR#/news/',
	'DETAIL_PAGE_URL' => '#SITE_DIR#/news/#ELEMENT_CODE#/',
	'SECTION_PAGE_URL' => '#SITE_DIR#/news/',
	'PICTURE' => NULL,
	'DESCRIPTION' => '',
	'DESCRIPTION_TYPE' => 'text',
	'RSS_TTL' => '24',
	'RSS_ACTIVE' => 'Y',
	'RSS_FILE_ACTIVE' => 'N',
	'RSS_FILE_LIMIT' => NULL,
	'RSS_FILE_DAYS' => NULL,
	'RSS_YANDEX_ACTIVE' => 'N',
	'XML_ID' => 'emarket_news',
	'TMP_ID' => 'fe0ff2ea91e11a7bb2719f88408749b0',
	'INDEX_ELEMENT' => 'Y',
	'INDEX_SECTION' => 'Y',
	'WORKFLOW' => 'N',
	'BIZPROC' => 'N',
	'SECTION_CHOOSER' => 'L',
	'LIST_MODE' => '',
	'RIGHTS_MODE' => 'S',
	'SECTION_PROPERTY' => 'N',
	'VERSION' => '1',
	'LAST_CONV_ELEMENT' => '0',
	'SOCNET_GROUP_ID' => NULL,
	'EDIT_FILE_BEFORE' => '',
	'EDIT_FILE_AFTER' => '',
	'SECTIONS_NAME' => 'Разделы',
	'SECTION_NAME' => 'Раздел',
	'ELEMENTS_NAME' => 'Элементы',
	'ELEMENT_NAME' => 'Элемент',
	'EXTERNAL_ID' => 'emarket_news',
	'LANG_DIR' => '/',
	'SERVER_NAME' => 'shop.bxready.ru',
);

$MESS[emarket_articles_FIELDS] = array (
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
			'DEFAULT_VALUE' => NULL,
			'VISIBLE' => 'N',
		),
);

$MESS[emarket_articles_DATA] = array (
	'TIMESTAMP_X' => '03.12.2014 14:12:50',
	'IBLOCK_TYPE_ID' => 'content',
	'CODE' => 'emarket_articles',
	'NAME' => 'Статьи',
	'ACTIVE' => 'Y',
	'SORT' => '500',
	'LIST_PAGE_URL' => '#SITE_DIR#/info/',
	'DETAIL_PAGE_URL' => '#SITE_DIR#/info/#SECTION_CODE#/#ELEMENT_CODE#/',
	'SECTION_PAGE_URL' => '#SITE_DIR#/info/#SECTION_CODE#/',
	'PICTURE' => NULL,
	'DESCRIPTION' => '',
	'DESCRIPTION_TYPE' => 'text',
	'RSS_TTL' => '24',
	'RSS_ACTIVE' => 'Y',
	'RSS_FILE_ACTIVE' => 'N',
	'RSS_FILE_LIMIT' => NULL,
	'RSS_FILE_DAYS' => NULL,
	'RSS_YANDEX_ACTIVE' => 'N',
	'XML_ID' => 'emarket_articles',
	'TMP_ID' => 'e8a1fc44aec314554cd230b6b21c2c99',
	'INDEX_ELEMENT' => 'Y',
	'INDEX_SECTION' => 'N',
	'WORKFLOW' => 'N',
	'BIZPROC' => 'N',
	'SECTION_CHOOSER' => 'L',
	'LIST_MODE' => '',
	'RIGHTS_MODE' => 'S',
	'SECTION_PROPERTY' => 'N',
	'VERSION' => '2',
	'LAST_CONV_ELEMENT' => '0',
	'SOCNET_GROUP_ID' => NULL,
	'EDIT_FILE_BEFORE' => '',
	'EDIT_FILE_AFTER' => '',
	'SECTIONS_NAME' => 'Разделы',
	'SECTION_NAME' => 'Раздел',
	'ELEMENTS_NAME' => 'Элементы',
	'ELEMENT_NAME' => 'Элемент',
	'EXTERNAL_ID' => 'emarket_articles',
	'LANG_DIR' => '/',
	'SERVER_NAME' => 'shop.bxready.ru',
);

$MESS[emarket_actions_FIELDS] = array (
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
);

$MESS[emarket_actions_DATA] = array (
	'TIMESTAMP_X' => '03.12.2014 14:12:50',
	'IBLOCK_TYPE_ID' => 'content',
	'CODE' => 'emarket_actions',
	'NAME' => 'Акции',
	'ACTIVE' => 'Y',
	'SORT' => '500',
	'LIST_PAGE_URL' => '#SITE_DIR#/actions/',
	'DETAIL_PAGE_URL' => '#SITE_DIR#/actions/#ELEMENT_CODE#/',
	'SECTION_PAGE_URL' => '#SITE_DIR#/actions/',
	'PICTURE' => NULL,
	'DESCRIPTION' => '',
	'DESCRIPTION_TYPE' => 'text',
	'RSS_TTL' => '24',
	'RSS_ACTIVE' => 'Y',
	'RSS_FILE_ACTIVE' => 'N',
	'RSS_FILE_LIMIT' => NULL,
	'RSS_FILE_DAYS' => NULL,
	'RSS_YANDEX_ACTIVE' => 'N',
	'XML_ID' => 'emarket_action',
	'TMP_ID' => NULL,
	'INDEX_ELEMENT' => 'Y',
	'INDEX_SECTION' => 'N',
	'WORKFLOW' => 'N',
	'BIZPROC' => 'N',
	'SECTION_CHOOSER' => 'L',
	'LIST_MODE' => '',
	'RIGHTS_MODE' => 'S',
	'SECTION_PROPERTY' => 'N',
	'VERSION' => '2',
	'LAST_CONV_ELEMENT' => '0',
	'SOCNET_GROUP_ID' => NULL,
	'EDIT_FILE_BEFORE' => '',
	'EDIT_FILE_AFTER' => '',
	'SECTIONS_NAME' => 'Разделы',
	'SECTION_NAME' => 'Раздел',
	'ELEMENTS_NAME' => 'Элементы',
	'ELEMENT_NAME' => 'Элемент',
	'EXTERNAL_ID' => 'emarket_action',
	'LANG_DIR' => '/',
	'SERVER_NAME' => 'shop.bxready.ru',
);

$MESS[emarket_services_FIELDS] = array (
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
			'DEFAULT_VALUE' => NULL,
			'VISIBLE' => 'N',
		),
);

$MESS[emarket_services_DATA] = array (
	'TIMESTAMP_X' => '03.12.2014 14:12:50',
	'IBLOCK_TYPE_ID' => 'content',
	'CODE' => 'emarket_services',
	'NAME' => 'Услуги',
	'ACTIVE' => 'Y',
	'SORT' => '500',
	'LIST_PAGE_URL' => '#SITE_DIR#/company/service/',
	'DETAIL_PAGE_URL' => '#SITE_DIR#/company/service/#SECTION_CODE#/#ELEMENT_CODE#/',
	'SECTION_PAGE_URL' => '#SITE_DIR#/company/service/#SECTION_CODE#/',
	'PICTURE' => NULL,
	'DESCRIPTION' => '',
	'DESCRIPTION_TYPE' => 'text',
	'RSS_TTL' => '24',
	'RSS_ACTIVE' => 'Y',
	'RSS_FILE_ACTIVE' => 'N',
	'RSS_FILE_LIMIT' => NULL,
	'RSS_FILE_DAYS' => NULL,
	'RSS_YANDEX_ACTIVE' => 'N',
	'XML_ID' => 'emarket_service',
	'TMP_ID' => '2810a673e09fef7af244088c2b18e673',
	'INDEX_ELEMENT' => 'Y',
	'INDEX_SECTION' => 'Y',
	'WORKFLOW' => 'N',
	'BIZPROC' => 'N',
	'SECTION_CHOOSER' => 'L',
	'LIST_MODE' => '',
	'RIGHTS_MODE' => 'S',
	'SECTION_PROPERTY' => 'N',
	'VERSION' => '2',
	'LAST_CONV_ELEMENT' => '0',
	'SOCNET_GROUP_ID' => NULL,
	'EDIT_FILE_BEFORE' => '',
	'EDIT_FILE_AFTER' => '',
	'SECTIONS_NAME' => 'Разделы',
	'SECTION_NAME' => 'Раздел',
	'ELEMENTS_NAME' => 'Элементы',
	'ELEMENT_NAME' => 'Элемент',
	'EXTERNAL_ID' => 'emarket_service',
	'LANG_DIR' => '/',
	'SERVER_NAME' => 'shop.bxready.ru',
);

$MESS[emarket_slider_FIELDS] = array (
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
);

$MESS[emarket_slider_DATA] = array (
	'TIMESTAMP_X' => '03.12.2014 14:12:49',
	'IBLOCK_TYPE_ID' => 'content',
	'CODE' => 'emarket_slider',
	'NAME' => 'Слайдер на главной',
	'ACTIVE' => 'Y',
	'SORT' => '500',
	'LIST_PAGE_URL' => '#SITE_DIR#/content/index.php?ID=#IBLOCK_ID#',
	'DETAIL_PAGE_URL' => '#SITE_DIR#/content/detail.php?ID=#ELEMENT_ID#',
	'SECTION_PAGE_URL' => '#SITE_DIR#/content/list.php?SECTION_ID=#SECTION_ID#',
	'PICTURE' => NULL,
	'DESCRIPTION' => '',
	'DESCRIPTION_TYPE' => 'text',
	'RSS_TTL' => '24',
	'RSS_ACTIVE' => 'Y',
	'RSS_FILE_ACTIVE' => 'N',
	'RSS_FILE_LIMIT' => NULL,
	'RSS_FILE_DAYS' => NULL,
	'RSS_YANDEX_ACTIVE' => 'N',
	'XML_ID' => '11',
	'TMP_ID' => NULL,
	'INDEX_ELEMENT' => 'Y',
	'INDEX_SECTION' => 'Y',
	'WORKFLOW' => 'N',
	'BIZPROC' => 'N',
	'SECTION_CHOOSER' => 'L',
	'LIST_MODE' => '',
	'RIGHTS_MODE' => 'S',
	'SECTION_PROPERTY' => NULL,
	'VERSION' => '2',
	'LAST_CONV_ELEMENT' => '0',
	'SOCNET_GROUP_ID' => NULL,
	'EDIT_FILE_BEFORE' => '',
	'EDIT_FILE_AFTER' => '',
	'SECTIONS_NAME' => 'Разделы',
	'SECTION_NAME' => 'Раздел',
	'ELEMENTS_NAME' => 'Элементы',
	'ELEMENT_NAME' => 'Элемент',
	'EXTERNAL_ID' => '11',
	'LANG_DIR' => '/',
	'SERVER_NAME' => 'shop.bxready.ru',
);

$MESS[emarket_bestsellers_FIELDS] = array (
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
);

$MESS[emarket_bestsellers_DATA] = array (
	'TIMESTAMP_X' => '04.12.2014 10:00:32',
	'IBLOCK_TYPE_ID' => 'content',
	'CODE' => 'emarket_bestsellers',
	'NAME' => 'Группы рекомендуемых товаров',
	'ACTIVE' => 'Y',
	'SORT' => '500',
	'LIST_PAGE_URL' => '#SITE_DIR#/adv/index.php?ID=#IBLOCK_ID#',
	'DETAIL_PAGE_URL' => '#SITE_DIR#/adv/detail.php?ID=#ELEMENT_ID#',
	'SECTION_PAGE_URL' => '#SITE_DIR#/adv/list.php?SECTION_ID=#SECTION_ID#',
	'PICTURE' => NULL,
	'DESCRIPTION' => '',
	'DESCRIPTION_TYPE' => 'text',
	'RSS_TTL' => '24',
	'RSS_ACTIVE' => 'Y',
	'RSS_FILE_ACTIVE' => 'N',
	'RSS_FILE_LIMIT' => NULL,
	'RSS_FILE_DAYS' => NULL,
	'RSS_YANDEX_ACTIVE' => 'N',
	'XML_ID' => '4',
	'TMP_ID' => '25ecec4e5607a5baffff07a9f51a1782',
	'INDEX_ELEMENT' => 'N',
	'INDEX_SECTION' => 'N',
	'WORKFLOW' => 'N',
	'BIZPROC' => 'N',
	'SECTION_CHOOSER' => 'L',
	'LIST_MODE' => '',
	'RIGHTS_MODE' => 'S',
	'SECTION_PROPERTY' => 'N',
	'VERSION' => '2',
	'LAST_CONV_ELEMENT' => '0',
	'SOCNET_GROUP_ID' => NULL,
	'EDIT_FILE_BEFORE' => '',
	'EDIT_FILE_AFTER' => '',
	'SECTIONS_NAME' => 'Разделы',
	'SECTION_NAME' => 'Раздел',
	'ELEMENTS_NAME' => 'Элементы',
	'ELEMENT_NAME' => 'Элемент',
	'EXTERNAL_ID' => '4',
	'LANG_DIR' => '/',
	'SERVER_NAME' => 'shop.bxready.ru',
);
?>