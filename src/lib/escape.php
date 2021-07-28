<?php

//セキュリティのための変数
function escape($strings)
{
    return htmlspecialchars($strings, ENT_QUOTES, 'UTF-8');
}
