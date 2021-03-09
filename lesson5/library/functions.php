<?php

use app\core\Db;

function clearString($string)
{
    return strip_tags(htmlspecialchars($string));
}
