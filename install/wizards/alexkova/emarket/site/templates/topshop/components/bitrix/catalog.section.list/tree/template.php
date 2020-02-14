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

$strTitle = "";
?>
<div class="wrapper xs-hide">
	<div class="container">
		<div class="span_5_of_5">

<div id="horizontal-multilevel-menu">
	<?
	$TOP_DEPTH = $arResult["SECTION"]["DEPTH_LEVEL"];
	$CURRENT_DEPTH = $TOP_DEPTH;

	$firstClass='top-menu';
	$firstElement = true;

	foreach($arResult["SECTIONS"] as $arSection)
	{
		$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
		$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));
		if($CURRENT_DEPTH < $arSection["DEPTH_LEVEL"])
		{
			echo "\n",str_repeat("\t", $arSection["DEPTH_LEVEL"]-$TOP_DEPTH),'<ul class="'.$firstClass.'">';
		}
		elseif($CURRENT_DEPTH == $arSection["DEPTH_LEVEL"])
		{
			echo "</li>";
		}
		else
		{
			while($CURRENT_DEPTH > $arSection["DEPTH_LEVEL"])
			{
				echo "</li>";
				echo "\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH),"</ul>","\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH-1);
				$CURRENT_DEPTH--;
			}
			echo "\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH),"</li>";
		}

		$count = $arParams["COUNT_ELEMENTS"] && $arSection["ELEMENT_CNT"] ? "&nbsp;(".$arSection["ELEMENT_CNT"].")" : "";

		if ($_REQUEST['SECTION_ID']==$arSection['ID'])
		{
			$link = '<b>'.$arSection["NAME"].$count.'</b>';
			$strTitle = $arSection["NAME"];
		}
		else
		{
			if($arSection["DEPTH_LEVEL"] == "1"){
				$link = '<a href="'.$arSection["SECTION_PAGE_URL"].'"><span>'.$arSection["NAME"].$count.'</span></a>';
			}else{
				$link = '<a href="'.$arSection["SECTION_PAGE_URL"].'">'.$arSection["NAME"].$count.'</a>';
			}

		}

		$addClass= "";
		if ($firstElement) {
			$addClass = "first";
			$firstElement = false;
		}

		$addClass .=" l-".$arSection["DEPTH_LEVEL"];

		echo "\n",str_repeat("\t", $arSection["DEPTH_LEVEL"]-$TOP_DEPTH);
		?><li class="<?=$addClass?>" id="<?=$this->GetEditAreaId($arSection['ID']);?>"><?=$link?><?

		$CURRENT_DEPTH = $arSection["DEPTH_LEVEL"];
		$firstClass='';
	}

	while($CURRENT_DEPTH > $TOP_DEPTH+1)
	{
		echo "</li>";
		echo "\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH),"</ul>","\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH-1);
		$CURRENT_DEPTH--;
	}
		echo '<li class="other" id="flex-menu-li"><a href="#"><span>&nbsp;</span></a></li>';
		echo '</ul>';
	?>
</div>
		</div>
		<div class="clear"></div>
	</div>
</div>
<?=($strTitle?'<br/><h2>'.$strTitle.'</h2>':'')?>
