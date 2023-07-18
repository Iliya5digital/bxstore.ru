<?
define("NEED_AUTH", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords_inner", "Восстановление пароля");
$APPLICATION->SetPageProperty("title", "Восстановление пароля");
$APPLICATION->SetPageProperty("keywords", "Восстановление пароля");
$APPLICATION->SetPageProperty("description", "Восстановление пароля");
$APPLICATION->SetTitle("Восстановление пароля");
?>




<?$APPLICATION->IncludeComponent(
	"bitrix:main.auth.forgotpasswd",
	"flat",
	Array(
		"AUTH_AUTH_URL" => "index.php",
		"AUTH_REGISTER_URL" => "registration.php"
	)
);?>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>