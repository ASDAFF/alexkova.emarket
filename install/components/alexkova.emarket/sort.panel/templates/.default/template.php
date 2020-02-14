<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$this->createFrame()->begin('sortpanel');

function number_key($array, $desired_key)
{
	if (!isset($array[$desired_key])) {
		return false;
	}
	$i = 1;
	foreach ($array as $key => $value) {
		if ($key == $desired_key) {
			return $i;
		}else{
			$i++;
		}
	}
}

global $arSortGlobal;

$arAvailableSort = array(
	"name" => Array("name", "asc", GetMessage("SORT_BY_NAME")),
	"price" => Array('PROPERTY_MINIMUM_PRICE', "asc",GetMessage("SORT_BY_PRICE")),
	"rating" => Array('PROPERTY_RATING', 'desc',GetMessage("SORT_BY_RATING"), 'xs-hide sm-hide'),
);

$sort = array_key_exists("sort", $_REQUEST) && array_key_exists(ToLower($_REQUEST["sort"]), $arAvailableSort) ? $arAvailableSort[ToLower($_REQUEST["sort"])][0] : "name";
$sort_order = array_key_exists("order", $_REQUEST) && in_array(ToLower($_REQUEST["order"]), Array("asc", "desc")) ? ToLower($_REQUEST["order"]) : $arAvailableSort[$sort][1];

$arSortGlobal = array(
	"sort" => $sort,
	"sort_order" => $sort_order,
);
?>
<div class="container-full">
	<div class="span_5_of_5">
		<div class="emarket-sort-panel">
			<div class="emarket-sort-panel-buttons">
				<?foreach ($arAvailableSort as $key => $val):
					$className = ($sort == $val[0]) ? ' active' : '';
					if ($className)
						$className .= ($sort_order == 'asc') ? ' asc' : ' desc';

					if (strlen($val[3])>0){
						$className .= " ".$val[3];
					}

					$newSort = ($sort == $val[0]) ? ($sort_order == 'desc' ? 'asc' : 'desc') : $arAvailableSort[$key][1];
					?>
					<a href="<?=$APPLICATION->GetCurPageParam('sort='.$key.'&order='.$newSort, 	array('sort', 'order'))?>" class="sortbutton<?=$className?> <?if(number_key($arAvailableSort,$key)==count($arAvailableSort)) echo "last";?>" rel="nofollow"><?=$val[2]?><?if ($sort == $val[0]):?><span></span><?endif?></a>
				<?endforeach;?>
			</div>


			<div class="emarket-sort-panel-view">
				<a href="<?=$APPLICATION->GetCurPageParam('view=grid',array('view'));?>" title="<?=GetMessage('VIEW_PLITKA')?>" class="present-plitka <?=($_REQUEST['view'] == 'grid' || !$_REQUEST['view']) ? 'active' : '';?>"></a>
				<a href="<?=$APPLICATION->GetCurPageParam('view=list',array('view'));?>" title="<?=GetMessage('VIEW_LIST')?>" class="xs-hide present-list <?=($_REQUEST['view'] == 'list') ? 'active' : '';?>"></a>
				<a href="<?=$APPLICATION->GetCurPageParam('view=table',array('view'));?>" title="<?=GetMessage('VIEW_TABLE')?>" class="present-table <?=($_REQUEST['view'] == 'table') ? 'active' : '';?>"></a>
			</div>
		<div class="clear"></div>

		</div>
	</div>
	<div class="clear"></div>
</div>