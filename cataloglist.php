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

?>
<div class="category">

	<?
	$total = count($arResult["SECTIONS"]);
	$counter = 0;
	$icons = 0;
	foreach($arResult["SECTIONS"] as $key => $arSection)
	{
		$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
		$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));
		$counter++;
	?>


<?if($arSection["DEPTH_LEVEL"]==1):
$icons++;
?>
<div class="category-col">
<div class="category-item category<?=$icons;echo ($arResult['SECTIONS'][$key+1]['DEPTH_LEVEL']==2 ?' category-with-links':'');?>">
<?=$arSection['DESCRIPTION']?>
<div class="category-inner">
<div class="category-name"><a href="<?=$arSection["~SECTION_PAGE_URL"]?>"><?=$arSection['NAME']?></a></div>

<?if($arResult["SECTIONS"][$key+1]['DEPTH_LEVEL']==2 || $counter == $total):?>
<ul class="category-list">
<?else:?>
</div>
</div>
</div>
<?endif?>

<?endif?>

<?if($arSection["DEPTH_LEVEL"]==2):
?>
<li>
<a href="<?=$arSection["~SECTION_PAGE_URL"]?>"><?=$arSection['NAME']?></a>
</li>

<?if($arResult["SECTIONS"][$key+1]['DEPTH_LEVEL']==1 || $counter == $total):?>
</ul>
</div>
</div>
</div>
<?endif?>

<?endif;?>

	
	<?
	}

	?>
</div>

