<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("О компании");
?><?
										$APPLICATION->IncludeComponent(
											'bitrix:catalog.item',
											'bootstrap_v4',
											array(
												'RESULT' => array(
													'ITEM' => $item,
													'AREA_ID' => $areaIds[$item['ID']],
													'TYPE' => $rowData['TYPE'],
													'BIG_LABEL' => 'N',
													'BIG_DISCOUNT_PERCENT' => 'N',
													'BIG_BUTTONS' => 'N',
													'SCALABLE' => 'N'
												),
												'PARAMS' => $generalParams + $itemParameters[$item['ID']],
											),
											//$component,
											array('HIDE_ICONS' => 'Y')
										);
										?>




<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>