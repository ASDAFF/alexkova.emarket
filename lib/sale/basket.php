<?php

namespace Alexkova\Emarket\Sale;

class Basket {

    static public function addToBasket($pid, $quantity = 1, $delayed = false, $props = array()) {
        $arProductProps = array();
        $quantity = $quantity > 0 ? $quantity : 1;
        $addData = array();
        if ($delayed) {
            $addData["DELAY"] = "Y";
        }

        if (
                \CModule::IncludeModule('iblock') && \CModule::IncludeModule('sale') && \CModule::IncludeModule('catalog')
        )
            return Add2BasketByProductID($pid, $quantity, $addData, $arProductProps);
        else
            return false;
    }

    static function getPorductInfoByProductId($pid) {
        if (!\CModule::IncludeModule('iblock') || !\CModule::IncludeModule('sale') || !\CModule::IncludeModule('catalog') || intval($pid) <= 0)
            return false;
        
        $result = array();
        
        $isSKU = \CCatalogSKU::GetProductInfo($pid);

        $res = \CIBlockElement::GetByID($pid);
        if($ar_res = $res->GetNext())
            $result = $ar_res;

        if (is_array($isSKU)) {
            $result["PARENT_ID"] = $isSKU["ID"];
            $res = \CIBlockElement::GetByID($isSKU["ID"]);
            if($ar_res = $res->GetNext())
                $result["DETAIL_PARENT"] = $ar_res;
        }
        
        return $result;
    }

    static function getModalWindow($title, $content, $buttons) {
        // Параметры кнопки
        $arDialogParams = array(
            'title' => $title,
            'content' => $content,
            'width' => 500,
            'height' => 200,
            'buttons' => $buttons,
        );

        // преобразоваqние в объект и замена кавычек
        $strParams = \CUtil::PhpToJsObject($arDialogParams);
        $strParams = str_replace('\'[code]', '', $strParams);
        $strParams = str_replace('[code]\'', '', $strParams);

        // ссылка для открытия окна
        $url = '(new BX.CDialog('.$strParams.')).Show()';
//        $url = str_replace("'", "\'", $url);
        
        return $url;
    }
    
    static public function delayItem($pid) {
        $arNewFields['DELAY'] = "Y";
        \CSaleBasket::Update($pid, $arNewFields);
    }

    static public function toCart($pid) {
        $arNewFields['DELAY'] = "N";
        \CSaleBasket::Update($pid, $arNewFields);
    }

    static public function newQty($pid, $qty) {
        if ($qty > 0) {
            $arNewFields['QUANTITY'] = $qty;
            \CSaleBasket::Update($pid, $arNewFields);
        }
    }

}
