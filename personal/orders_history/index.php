<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("История заказов");
?>


<?$APPLICATION->IncludeComponent("bitrix:sale.personal.order", "", Array(

	),
	false
);?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>