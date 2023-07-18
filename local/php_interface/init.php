<?php
AddEventHandler("main", "OnEndBufferContent", "removeType");
function removeType(&$content)
{
    $content = replace_output($content);
}
function replace_output($d)
{
    return str_replace(' type="text/javascript"', "", $d);
}
