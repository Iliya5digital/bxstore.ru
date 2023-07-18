<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if ($arResult["PHONE_REGISTRATION"]) {
    CJSCore::Init('phone_auth');
}
?>

<div class="bx-auth">

    <?
    ShowMessage($arParams["~AUTH_RESULT"]);
    ?>

    <? if ($arResult["SHOW_FORM"]): ?>

        <form method="post" action="<?= $arResult["AUTH_URL"] ?>" name="bform">
            <? if ($arResult["BACKURL"] <> ''): ?>
                <input type="hidden" name="backurl" value="<?= $arResult["BACKURL"] ?>"/>
            <? endif ?>
            <input type="hidden" name="AUTH_FORM" value="Y">
            <input type="hidden" name="TYPE" value="CHANGE_PWD">


            <?= GetMessage("AUTH_CHANGE_PASSWORD") ?>




            <? if ($arResult["PHONE_REGISTRATION"]): ?>
                <tr>
                    <td><? echo GetMessage("sys_auth_chpass_phone_number") ?></td>
                    <td>
                        <input type="text" value="<?= htmlspecialcharsbx($arResult["USER_PHONE_NUMBER"]) ?>"
                               class="bx-auth-input" disabled="disabled"/>
                        <input type="hidden" name="USER_PHONE_NUMBER"
                               value="<?= htmlspecialcharsbx($arResult["USER_PHONE_NUMBER"]) ?>"/>
                    </td>
                </tr>
                <tr>
                    <td><span class="starrequired">*</span><? echo GetMessage("sys_auth_chpass_code") ?></td>
                    <td><input type="text" name="USER_CHECKWORD" maxlength="50"
                               value="<?= $arResult["USER_CHECKWORD"] ?>" class="bx-auth-input" autocomplete="off"/>
                    </td>
                </tr>
            <? else: ?>


                <div style="display: none;">
                    <span class="starrequired">*</span><?= GetMessage("AUTH_LOGIN") ?>
                    <input type="text" name="USER_LOGIN" maxlength="50" value="<?= $arResult["LAST_LOGIN"] ?>"
                           class="bx-auth-input"/>
                </div>


                <?
                if ($arResult["USE_PASSWORD"]):
                    ?>
                    <div>
                        <span class="starrequired">*</span><? echo GetMessage("sys_auth_changr_pass_current_pass") ?>

                        <input type="password" name="USER_CURRENT_PASSWORD" maxlength="255"
                               value="<?= $arResult["USER_CURRENT_PASSWORD"] ?>" class="bx-auth-input"
                               autocomplete="new-password"/></td>
                    </div>

                <?
                else:
                    ?>
                    <div style="display: none;">
                        <span class="starrequired">*</span><?= GetMessage("AUTH_CHECKWORD") ?>
                        <input type="text" name="USER_CHECKWORD" maxlength="50"
                               value="<?= $arResult["USER_CHECKWORD"] ?>" class="bx-auth-input"
                               autocomplete="off"/>
                    </div>
                <?
                endif
                ?>
            <? endif ?>
            <div>
                <span class="starrequired">*</span><?= GetMessage("AUTH_NEW_PASSWORD_REQ") ?>
                <input type="password" name="USER_PASSWORD" maxlength="255"
                       value="<?= $arResult["USER_PASSWORD"] ?>" class="bx-auth-input"
                       autocomplete="new-password"/>
            </div>

            <br>
            <div>
                <span class="starrequired">*</span><?= GetMessage("AUTH_NEW_PASSWORD_CONFIRM") ?>
                <input type="password" name="USER_CONFIRM_PASSWORD" maxlength="255"
                       value="<?= $arResult["USER_CONFIRM_PASSWORD"] ?>" class="bx-auth-input"
                       autocomplete="new-password"/>
            </div>


            <? if ($arResult["USE_CAPTCHA"]): ?>

                <input type="hidden" name="captcha_sid" value="<?= $arResult["CAPTCHA_CODE"] ?>"/>
                <img src="/bitrix/tools/captcha.php?captcha_sid=<?= $arResult["CAPTCHA_CODE"] ?>"
                     width="180" height="40" alt="CAPTCHA"/><br>

                <span class="starrequired">*</span><? echo GetMessage("system_auth_captcha") ?><br>


                <input type="text" name="captcha_word" maxlength="50" value="" autocomplete="off"/>

                <br><br>
            <? endif ?>
            <input type="submit" name="change_pwd" value="<?= GetMessage("AUTH_CHANGE") ?>"/>

        </form>

        <p><? echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"]; ?></p>
        <p><span class="starrequired">*</span><?= GetMessage("AUTH_REQ") ?></p>

    <? if ($arResult["PHONE_REGISTRATION"]): ?>

        <script type="text/javascript">
            new BX.PhoneAuth({
                containerId: 'bx_chpass_resend',
                errorContainerId: 'bx_chpass_error',
                interval: <?=$arResult["PHONE_CODE_RESEND_INTERVAL"]?>,
                data:
                    <?=CUtil::PhpToJSObject([
                        'signedData' => $arResult["SIGNED_DATA"]
                    ])?>,
                onError:
                    function (response) {
                        var errorDiv = BX('bx_chpass_error');
                        var errorNode = BX.findChildByClassName(errorDiv, 'errortext');
                        errorNode.innerHTML = '';
                        for (var i = 0; i < response.errors.length; i++) {
                            errorNode.innerHTML = errorNode.innerHTML + BX.util.htmlspecialchars(response.errors[i].message) + '<br>';
                        }
                        errorDiv.style.display = '';
                    }
            });
        </script>

        <div id="bx_chpass_error" style="display:none"><? ShowError("error") ?></div>

        <div id="bx_chpass_resend"></div>

    <? endif ?>

    <? endif ?>

    <p><a href="<?= $arResult["AUTH_AUTH_URL"] ?>"><b><?= GetMessage("AUTH_AUTH") ?></b></a></p>

</div>