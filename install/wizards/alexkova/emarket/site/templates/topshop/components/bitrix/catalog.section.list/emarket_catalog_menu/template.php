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

$firstUL = true;
$firstElement = true;

$strTitle = "";
?>
<div class="wrapper xs-hide">
	<div class="container">
		<div class="span_5_of_5">

	<?
	$TOP_DEPTH = $arResult["SECTION"]["DEPTH_LEVEL"];
	$CURRENT_DEPTH = $TOP_DEPTH;
	$stackOverflowIndicator = false;

	foreach($arResult["SECTIONS"] as $arSection)
	{
		if($arSection["DEPTH_LEVEL"]>3
			|| $stackOverflowIndicator && $arSection["DEPTH_LEVEL"]>3){
			$stackOverflowIndicator = true;
			continue ;
		}
		else{
			$stackOverflowIndicator = false;
		}

		$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
		$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));
		if($CURRENT_DEPTH < $arSection["DEPTH_LEVEL"])
		{
			$strUl = '';
			if ($firstUL){
				$strUl = '<ul class="top-menu" data-smart="smart">';
				$firstUL = false;
			}

			if ($arSection["DEPTH_LEVEL"] == 2){
				$strUl = '<ul>';
			}

			if ($arSection["DEPTH_LEVEL"] == 2){
				$strUl = '<div class="sub-menu">'.$strUl;
			}

			echo "\n",str_repeat("\t", $arSection["DEPTH_LEVEL"]-$TOP_DEPTH),$strUl;
		}
		elseif($CURRENT_DEPTH == $arSection["DEPTH_LEVEL"])
		{
			echo "</li>";
			if ($arSection["DEPTH_LEVEL"] == 2){
				$strUl = '</ul><ul>';
			}
		}
		else
		{
			while($CURRENT_DEPTH > $arSection["DEPTH_LEVEL"])
			{

				$strULClose = "";


				if ($arSection["DEPTH_LEVEL"] == 1){
					$strULClose = '</ul>';
					echo "</li>";
					//print_r($CURRENT_DEPTH);
					//print_r($arSection);
					$strULClose .= '</div>';
				}

				echo "\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH),$strULClose,"\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH-1);
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
			$link = '<a href="'.$arSection["SECTION_PAGE_URL"].'"><span>'.$arSection["NAME"].$count.'</span></a>';
		}

		echo "\n",str_repeat("\t", $arSection["DEPTH_LEVEL"]-$TOP_DEPTH);

		$addClass="";
		if ($firstElement) {
			$addClass = 'class="first"';
			$firstElement = false;
		}

		if ($arSection["DEPTH_LEVEL"] == 2){
			$addClass = 'class="tmt"';
		}

		?><li <?=$addClass?> id="<?=$this->GetEditAreaId($arSection['ID']);?>"><?=$link?><?

		$CURRENT_DEPTH = $arSection["DEPTH_LEVEL"];
	}

	while($CURRENT_DEPTH > $TOP_DEPTH+1)
	{
		echo "</li>";
		echo "\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH),"</ul>","\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH-1);
		$CURRENT_DEPTH--;
	}
	echo '<li class="other" id="flex-menu-li"><a href="#"><span>&nbsp;</span></a><div class="sub-menu" id="flex-menu"></div></li>';
	echo '<div class="clear"></div></ul>';
	?>
		</div>
		<div class="clear"></div>
	</div>
</div>
<?=($strTitle?'<br/><h2>'.$strTitle.'</h2>':'')?>
