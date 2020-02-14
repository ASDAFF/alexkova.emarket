<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arResult = array();

function setNewSort($arSort)
{
    global $APPLICATION;
    $arrayExclude = array();
    
    foreach($arSort as $cell=>$val)
    {
        $_SESSION["USER_SORTPANEL"][$cell] = $val;
    }
}

$defaultSortState = array(
    "SORT"=>true,
    "PAGES"=>true,
    "SHOW_PLITKA"=>true,
    "SHOW_SPISOK"=>true,
    "SHOW_TABLE"=>true,
);

$defaultSort = array(
    "SORT"=>array("name"=>"asc"),
    "PAGEN"=>array("products_on_page"=>15),
    "DISPLAY"=>array("view"=>"grid"),
);

$userValues = array();

if (isset($_REQUEST["sort"]) && isset($_REQUEST["order"]))
    setNewSort(array("sort"=>$_REQUEST["sort"], "order"=>$_REQUEST["order"]));
if (isset($_REQUEST["products_on_page"]))
    setNewSort(array("products_on_page"=>intval($_REQUEST["products_on_page"])));
if (isset($_REQUEST["view"]))
    setNewSort(array("view"=>$_REQUEST["view"]));

//echo "<pre>"; print_r($_SESSION); echo "</pre>";
if (isset($_SESSION["USER_SORTPANEL"]) && is_array($_SESSION["USER_SORTPANEL"]) && count($_SESSION["USER_SORTPANEL"]>0))
{
    foreach ($_SESSION["USER_SORTPANEL"] as $cell=>$val)
    {
        $_REQUEST[$cell] = $val;
    }
}


$arResult = array(
    "MODE"=>$systemSortState,
    "USER"=>$defaultSort,
);

$this->IncludeComponentTemplate();



?>