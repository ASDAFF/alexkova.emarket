<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach ($arResult["GRID"]["ROWS"] as $k => $arItem):
    $parent = CCatalogProduct::GetByIDEx($arItem["PRODUCT_ID"]);
    $parentId = $parent["PROPERTIES"]["CML2_LINK"]["VALUE"];
    if ($parentId) {
        $arParent = CCatalogProduct::GetByIDEx($parentId);
        $arResult["GRID"]["ROWS"][$k]["PARENT"]["DETAIL_PAGE_URL"] = $arParent["DETAIL_PAGE_URL"];
    }
endforeach;