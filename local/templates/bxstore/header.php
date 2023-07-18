<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$CurDir = $APPLICATION->GetCurDir();
$CurUri = $APPLICATION->GetCurUri();
?>
<!doctype html>
<html xml:lang="<?= LANGUAGE_ID ?>" lang="<?= LANGUAGE_ID ?>">
<head>
    <?

    use Bitrix\Main\Page\Asset;

    // CSS;
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/bootstrap.min.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/fonts/Roboto/stylesheet.min.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/fonts/fontAwesome/font-awesome.min.css'); // TODO удалить когда будут svg спрайты
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/js/fancy/jquery.fancybox.min.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/js/slick_slider/slick.min.css');
    // JS
    CJSCore::Init(array("jquery3"));
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/fancy/jquery.fancybox.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/myscripts.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/slick_slider/slick.min.js');
    // HEADERS
    $APPLICATION->ShowHead();
    ?>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="apple-touch-icon" sizes="57x57" href="/local/ico/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/local/ico/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/local/ico/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/local/ico/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/local/ico/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/local/ico/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/local/ico/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/local/ico/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/local/ico/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/local/ico/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/local/ico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/local/ico/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/local/ico/favicon-16x16.png">
    <link rel="manifest" href="/local/ico/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/local/ico/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <title><? $APPLICATION->ShowTitle() ?></title>
</head>
<body>
<? $APPLICATION->ShowPanel(); ?>


<div class="top_header">
    <div class="container">
        <div class="top_header_content">

            <? // Меню - http://dev.1c-bitrix.ru/user_help/settings/settings/components_2/navigation/menu.php
            $APPLICATION->IncludeComponent("bitrix:menu", "top_header_aside_menu", array(
                "ROOT_MENU_TYPE" => "main",    // Тип меню для первого уровня
                "MENU_CACHE_TYPE" => "A",    // Тип кеширования
                "MENU_CACHE_TIME" => "3600",    // Время кеширования (сек.)
                "MENU_CACHE_USE_GROUPS" => "Y",    // Учитывать права доступа
                "MENU_CACHE_GET_VARS" => "",    // Значимые переменные запроса
                "MAX_LEVEL" => "2",    // Уровень вложенности меню
                "CHILD_MENU_TYPE" => "section",    // Тип меню для остальных уровней
                "USE_EXT" => "N",    // Подключать файлы с именами вида .тип_меню.menu_ext.php
                "DELAY" => "N",    // Откладывать выполнение шаблона меню
                "ALLOW_MULTI_SELECT" => "N",    // Разрешить несколько активных пунктов одновременно
                "COMPONENT_TEMPLATE" => "top_header_catalog_nav"
            ),
                false
            ); ?>


            <? // Меню - http://dev.1c-bitrix.ru/user_help/settings/settings/components_2/navigation/menu.php
            $APPLICATION->IncludeComponent("bitrix:menu", "top_header_catalog_nav", array(
                "ROOT_MENU_TYPE" => "top_catalog",    // Тип меню для первого уровня
                "MENU_CACHE_TYPE" => "A",    // Тип кеширования
                "MENU_CACHE_TIME" => "3600",    // Время кеширования (сек.)
                "MENU_CACHE_USE_GROUPS" => "Y",    // Учитывать права доступа
                "MENU_CACHE_GET_VARS" => "",    // Значимые переменные запроса
                "MAX_LEVEL" => "2",    // Уровень вложенности меню
                "CHILD_MENU_TYPE" => "section",    // Тип меню для остальных уровней
                "USE_EXT" => "Y",    // Подключать файлы с именами вида .тип_меню.menu_ext.php
                "DELAY" => "N",    // Откладывать выполнение шаблона меню
                "ALLOW_MULTI_SELECT" => "N",    // Разрешить несколько активных пунктов одновременно
                "COMPONENT_TEMPLATE" => "horizontal_multilevel"
            ),
                false
            ); ?>
            <? // Поиск по заголовкам - http://dev.1c-bitrix.ru/user_help/settings/search/components_2/search_title.php
            $APPLICATION->IncludeComponent(
                "bitrix:search.title",
                "top_header_search",
                array(
                    "NUM_CATEGORIES" => "1",
                    "TOP_COUNT" => "5",
                    "ORDER" => "date",
                    "USE_LANGUAGE_GUESS" => "Y",
                    "CHECK_DATES" => "N",
                    "SHOW_OTHERS" => "N",
                    "PAGE" => "#SITE_DIR#search/index.php",
                    "CATEGORY_0_TITLE" => "",
                    "CATEGORY_0" => array(
                        0 => "iblock_catalog",
                    ),
                    "COMPONENT_TEMPLATE" => "top_header_search",
                    "SHOW_INPUT" => "Y",
                    "INPUT_ID" => "title-search-input",
                    "CONTAINER_ID" => "title-search",
                    "CATEGORY_0_iblock_catalog" => array(
                        0 => "10",
                    )
                ),
                false
            ); ?>
            <div class="top_header_content_phone">
                <a href="tel:8900000000" rel="nofollow">+7 900 000 00 00</a>
                <button type="button" class="top_header_content_phone_button">
                    Перезвоните мне
                </button>
            </div>
            <div class="top_header_content_user">
                <a href="" class="top_header_content_user_auth">
                    <i class="fa fa-user"></i>
                </a>
                <a href="" class="top_header_content_user_wishlist">
                    <i class="fa fa-heart"></i>
                </a>
                <?
                $APPLICATION->IncludeComponent(
                    "bitrix:sale.basket.basket.line",
                    "top_header_basker",
                    array(
                        "COMPONENT_TEMPLATE" => "top_header_basker",
                        "PATH_TO_BASKET" => "/personal/cart/",
                        "PATH_TO_ORDER" => "/personal/order/make/",
                        "SHOW_NUM_PRODUCTS" => "Y",
                        "SHOW_TOTAL_PRICE" => "Y",
                        "SHOW_EMPTY_VALUES" => "Y",
                        "SHOW_PERSONAL_LINK" => "N",
                        "PATH_TO_PERSONAL" => SITE_DIR . "personal/",
                        "SHOW_AUTHOR" => "N",
                        "PATH_TO_AUTHORIZE" => "",
                        "SHOW_REGISTRATION" => "N",
                        "PATH_TO_REGISTER" => "",
                        "PATH_TO_PROFILE" => SITE_DIR . "personal/",
                        "SHOW_PRODUCTS" => "N",
                        "SHOW_DELAY" => "N",
                        "SHOW_NOTAVAIL" => "N",
                        "SHOW_IMAGE" => "Y",
                        "SHOW_PRICE" => "Y",
                        "SHOW_SUMMARY" => "Y",
                        "POSITION_FIXED" => "N",
                        "HIDE_ON_BASKET_PAGES" => "N",
                        "MAX_IMAGE_SIZE" => "70"
                    ),
                    false
                ); ?>
            </div>
        </div>
    </div>
</div>


<?
if ($CurDir === '/') {
    $APPLICATION->IncludeComponent(
        "bitrix:news.line",
        "slider_main",
        array(
            "ACTIVE_DATE_FORMAT" => "d.m.Y",
            "CACHE_GROUPS" => "Y",
            "CACHE_NOTES" => "",
            "CACHE_TIME" => "300",
            "CACHE_TYPE" => "A",
            "COMPONENT_TEMPLATE" => ".default",
            "DETAIL_URL" => "",
            "FIELD_CODE" => array(0 => "NAME", 1 => "PREVIEW_TEXT", 2 => "PREVIEW_PICTURE", 3 => "DETAIL_TEXT", 4 => "",),
            "IBLOCKS" => array(0 => "12",),
            "IBLOCK_TYPE" => "sale",
            "NEWS_COUNT" => "20",
            "SORT_BY1" => "ACTIVE_FROM",
            "SORT_BY2" => "SORT",
            "SORT_ORDER1" => "DESC",
            "SORT_ORDER2" => "ASC"
        )
    );
} else {
    ?>
    <?// Навигационная цепочка - http://dev.1c-bitrix.ru/user_help/settings/settings/components_2/navigation/breadcrumb.php
    $APPLICATION->IncludeComponent(
    	"bitrix:breadcrumb",
    	".default",
    	array(
    		// region Дополнительные настройки
    		"START_FROM"  =>  "0",  // Номер пункта, начиная с которого будет построена навигационная цепочка
    		"PATH"        =>  "",   // Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
    		"SITE_ID"     =>  "-",  // Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный) : array ( '-' => '', 's1' => '[s1] Интернет-магазин (Сайт по умолчанию)', )
    		// endregion
    	)
    );?>
    <h1><?$APPLICATION->ShowTitle(false);?></h1>
    <?
} ?>

<div class="container">

